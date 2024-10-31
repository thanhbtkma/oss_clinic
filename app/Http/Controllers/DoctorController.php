<?php

    namespace App\Http\Controllers;

    use App\Models\Doctor;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;
    use Illuminate\Http\Request;

    class DoctorController extends Controller
    {
        public array $qualifications = [];
        public function index(): View|Factory|Application
        {
            $doctors = Doctor::all();
            $qualifications = $this->qualifications;
            return view('doctor.index', compact('doctors', 'qualifications'));
        }

        public function addQualification(Request $request): View|Factory|Application
        {
            $degree = $request->degree;
            $university = $request->university;
            $year = $request->year;

            $this->qualifications->app = [
                'degree' => $degree,
                'university' => $university,
                'year' => $year
            ];
            $doctor = Doctor::all();
            $qualifications = $this->qualifications;
            return view('doctor.index', compact('doctor', 'qualifications'));
        }

    }
