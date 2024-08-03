<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfessionalController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(ServiceController $serviceController, ProfessionalController $professionalController)
    {
        $servicesData = $serviceController->showServices()->getData();
        $services = $servicesData['services'];

        $professionalsData = $professionalController->getAllProfessionals()->getData(true);
        $professionals = $professionalsData['professionals'];

        return view('welcome', compact('services', 'professionals'));
    }
}
