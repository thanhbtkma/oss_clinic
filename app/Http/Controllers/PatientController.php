<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //
    public function index(): View|Factory|Application
    {
        $patients = User::where('role', 'patient')->get();
        return view('patient.index', compact('patients'));
    }
}
