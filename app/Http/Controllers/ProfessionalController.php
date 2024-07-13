<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class ProfessionalController extends Controller
{
    public function index(): JsonResponse
    {
        $professionals = Professional::all();
        return response()->json($professionals, 200);
    }

    public function getProfessionalsByService($serviceName): JsonResponse
    {
        $service = Service::where('name', $serviceName)->first();

        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }

        $professionals = $service->professionals;

        return response()->json($professionals);
    }
}
