<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Professional;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return response()->json($appointments, 200);
    }


    public function getAppointmentsByUser($userId): JsonResponse
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $appointments = $user->appointments()
            ->with(['professional', 'service'])
            ->where('date_time', '>', now())
            ->orderBy('date_time', 'asc')
            ->get();

        return response()->json($appointments);
    }

    public function createAppointment(Request $request, $userId): JsonResponse
    {
        // Validate the request data
        $validator = FacadesValidator::make($request->all(), [
            'date_time' => 'required|date_format:Y-m-d H:i:s',
            'service_id' => 'required|exists:services,id',
            'professional_id' => 'required|exists:professionals,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Ensure the professional offers the requested service
        $professional = Professional::find($request->input('professional_id'));
        if (!$professional->services()->where('services.id', $request->input('service_id'))->exists()) {
            return response()->json(['error' => 'The professional does not offer the specified service.'], 400);
        }

        // Find the user
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Create the appointment
        $appointment = new Appointment([
            'date_time' => $request->input('date_time'),
            'service_id' => $request->input('service_id'),
            'professional_id' => $request->input('professional_id'),
            'user_id' => $user->id,
        ]);

        // Save the appointment
        $appointment->save();

        return response()->json($appointment, 201);
    }

    public function updateAppointment(Request $request, $userId, $appointmentId): JsonResponse
    {
        // Validate the request data
        $validator = FacadesValidator::make($request->all(), [
            'date_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //Find the user
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }


        // Find the appointment
        $appointment = Appointment::find($appointmentId);
        if (!$appointment) {
            return response()->json(['error' => 'Appointment not found'], 404);
        }

        // Update the appointment date and time
        $appointment->date_time = $request->input('date_time');
        $appointment->save();

        return response()->json($appointment, 200);
    }

    public function deleteAppointment($userId, $appointmentId): JsonResponse
    {

        //Find the user
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Find the appointment
        $appointment = Appointment::find($appointmentId);
        if (!$appointment) {
            return response()->json(['error' => 'Appointment not found'], 404);
        }

        // Delete the appointment
        $appointment->delete();

        return response()->json(['message' => 'Appointment deleted'], 200);
    }

    public function createForm(Service $service, Professional $professional)
    {
        $availableSlots = $this->getAvailableSlots($professional);
        return view('appointments.schedule', compact('service', 'professional', 'availableSlots'));
    }

    private function getAvailableSlots(Professional $professional)
    {
        date_default_timezone_set('America/Toronto');

        $slots = [];
        $startDate = now();
        $endDate = $startDate->copy()->addDays(5);
        while ($startDate->startOfDay() <= $endDate->startOfDay()) {
            $isToday = $startDate->isToday();
            $currentHour = $isToday ? max(now()->hour, 9) : 9; // Start from 9 AM or current hour, whichever is later

            for ($hour = $currentHour; $hour < 17; $hour++) {
                $dateTime = $startDate->copy()->setTime($hour, 0);

                // Skip if the time has already passed
                if ($dateTime->isToday() && $dateTime <= now()) {
                    continue;
                }

                if (!$this->isSlotBooked($professional, $dateTime)) {
                    $slots[] = $dateTime->format('Y-m-d H:i:s');
                }
            }
            $startDate->addDay();
        }

        return $slots;
    }


    private function isSlotBooked(Professional $professional, $dateTime)
    {
        return Appointment::where('professional_id', $professional->id)
            ->where('date_time', $dateTime)
            ->exists();
    }

    public function store(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'date_time' => 'required|date_format:Y-m-d H:i:s',
            'service_id' => 'required|exists:services,id',
            'professional_id' => 'required|exists:professionals,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $professional = Professional::find($request->input('professional_id'));
        if (!$professional->services()->where('services.id', $request->input('service_id'))->exists()) {
            return redirect()->back()->withErrors(['error' => 'The professional does not offer the specified service.'])->withInput();
        }

        $user = auth()->user();
        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'User not found'])->withInput();
        }

        $appointment = new Appointment([
            'date_time' => $request->input('date_time'),
            'service_id' => $request->input('service_id'),
            'professional_id' => $request->input('professional_id'),
            'user_id' => $user->id,
        ]);

        $appointment->save();

        return redirect()->route('user.appointments')
            ->with('success', 'Appointment booked successfully! You can view all your appointments below.');
    }



    public function userAppointments()
    {
        $userId = auth()->id();
        $response = $this->getAppointmentsByUser($userId);

        $appointments = json_decode($response->getContent());

        return view('appointments.user-appointments', compact('appointments'));
    }

    public function edit(Appointment $appointment)
    {
        $professional = $appointment->professional;
        $availableSlots = $this->getAvailableSlots($professional);

        // Add the current appointment time to available slots if it's not already there
        $currentAppointmentTime = $appointment->date_time instanceof \DateTime
            ? $appointment->date_time->format('Y-m-d H:i:s')
            : $appointment->date_time;
        if (!in_array($currentAppointmentTime, $availableSlots)) {
            $availableSlots[] = $currentAppointmentTime;
        }

        sort($availableSlots);

        return view('appointments.edit', compact('appointment', 'availableSlots'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'date_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $appointment->date_time = $request->date_time;
        $appointment->save();

        return redirect()->route('user.appointments')
            ->with('success', 'Appointment updated successfully.');
    }

    public function destroy(Appointment $appointment)
    {
        // Add authorization check here if needed
        $appointment->delete();

        return redirect()->route('user.appointments')
            ->with('success', 'Appointment cancelled successfully.');
    }
}
