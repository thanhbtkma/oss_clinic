<?php

    namespace App\Http\Controllers;

    use App\Models\Doctor;
    use App\Models\Service;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;

    class ServiceController extends Controller
    {
        public function index(): View|Factory|Application
        {
            $services = Service::all();
            $doctors = Doctor::all();
            return view('service.index', compact('services', 'doctors'));
        }

        public function store(Request $request): View|Factory|Application|RedirectResponse
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
            ]);

            $name = $request->input('name');
            $description = $request->input('description');
            $price = $request->input('price');
            $doctorId = $request->input('doctor');
            if ($doctorId === null) {
                return back()->withErrors(['error' => 'Vui lòng chọn bác sĩ'])->withInput();
            }

            $doctor = Doctor::find($doctorId);

            if ($doctor === null) {
                return back()->withErrors(['error' => 'Vui lòng chọn bác sĩ'])->withInput();
            }
            Service::create(
                [
                    'name' => $name,
                    'description' => $description,
                    'price' => $price,
                    'doctor_id' => $doctorId,
                    'status' => 'active',
                ]
            );

            $services = Service::all();
            $doctors = Doctor::all();
            return view('service.index', compact('services', 'doctors'));
        }
    }
