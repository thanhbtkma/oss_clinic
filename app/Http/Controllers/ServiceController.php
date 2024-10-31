<?php

    namespace App\Http\Controllers;

    use App\Models\Doctor;
    use App\Models\Service;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;
    use Illuminate\Http\Request;

    class ServiceController extends Controller
    {
        public function index(): View|Factory|Application
        {
            $services = Service::all();
            $doctors = Doctor::all();
            return view('service.index', compact('services', 'doctors'));
        }

    }
