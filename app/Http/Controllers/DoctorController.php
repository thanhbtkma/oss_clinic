<?php

    namespace App\Http\Controllers;

    use App\Enums\Gender;
    use App\Enums\Role;
    use App\Models\Doctor;
    use App\Models\Password;
    use App\Models\Qualification;
    use App\Models\User;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;

    class DoctorController extends Controller
    {

        public function index(): View|Factory|Application
        {
            $doctors = Doctor::all();
            return view('doctor.index', compact('doctors'));
        }

        public function store(Request $request): View|RedirectResponse
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:15',
                'birthday' => 'required|date',
                'address' => 'required|string|max:255',
                'specialization' => 'required|string|max:255',
                'experience' => 'required|integer|min:0',
                'gender' => 'required|string|in:male,female,other',
                'status' => 'required|string|in:active,inactive',
                'degree' => 'required|string|max:255',
                'school' => 'required|string|max:255',
                'year' => 'required|integer|min:1900|max:' . date('Y'),
            ]);

            $name = str_replace("'", "''", htmlspecialchars($request->input('name')));
            $email = str_replace("'", "''", htmlspecialchars($request->input('email')));
            $phone = str_replace("'", "''", htmlspecialchars($request->input('phone')));
            $birthday = str_replace("'", "''", htmlspecialchars($request->input('birthday')));
            $address = str_replace("'", "''", htmlspecialchars($request->input('address')));
            $specialization = str_replace("'", "''", htmlspecialchars($request->input('specialization')));
            $experience = str_replace("'", "''", htmlspecialchars($request->input('experience')));
            $gender = new Gender(str_replace("'", "''", htmlspecialchars($request->input('gender'))));
            $status = str_replace("'", "''", htmlspecialchars($request->input('status')));
            $degree = str_replace("'", "''", htmlspecialchars($request->input('degree')));
            $school = str_replace("'", "''", htmlspecialchars($request->input('school')));
            $year = str_replace("'", "''", htmlspecialchars($request->input('year')));
            $role = new Role(Role::DOCTOR);
            $note = str_replace("'", "''", htmlspecialchars($request->input('note')));
            if (User::where('email', $email)->exists()) {
                return back()->withErrors(['error' => 'Email đã tồn tại'])->withInput();
            }
            $user = User::create([
                'full_name' => $name,
                'email' => $email,
                'phone' => $phone,
                'birthday' => $birthday,
                'gender' => $gender,
                'address' => $address,
                'role' => $role,
            ]);
            $salt = bin2hex(random_bytes(16));
            $hashedPassword = hash('sha256', "123456" . $salt);

            Password::create([
                'user_id' => $user->id,
                'salt' => $salt,
                'password' => $hashedPassword,
            ]);

            $doctor = Doctor::create([
                'user_id' => $user->id,
                'specialization' => $specialization,
                'experience' => $experience,
                'status' => $status,
                'note' => $note,
            ]);

            Qualification::create([
                'doctor_id' => $doctor->id,
                'degree' => $degree,
                'school' => $school,
                'Year' => $year,
            ]);

            $doctors = Doctor::all();

            return view('doctor.index', compact('doctors'));
        }

        public function show($id): View|Factory|Application
        {
            $queryId = str_replace("'", "''", htmlspecialchars($id));
            $doctor = Doctor::findOrFail($queryId);
            return view('doctor.show', compact('doctor'));
        }

        public function edit($id): View|Factory|Application
        {
            $queryId = str_replace("'", "''", htmlspecialchars($id));
            $doctor = Doctor::findOrFail($queryId);
            return view('doctor.edit', compact('doctor'));
        }

        public function destroy($id): RedirectResponse
        {
            $queryId = str_replace("'", "''", htmlspecialchars($id));
            $doctor = Doctor::findOrFail($queryId);
            $doctor->delete();

            return redirect()->route('doctor.index')->with('success', 'Doctor deleted successfully');
        }
    }
