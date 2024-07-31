<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class ServiceController extends Controller
{
    public function index(): JsonResponse
    {
        $services = Service::all();
        return response()->json($services, 200);
    }

    public function showServices()
    {
        $services = Service::all();
        return view('services.allServices', compact('services'));
    }

    public function servicesPage()
    {
        $services = Service::all();
        return view('services', compact('services'));
    }
}
