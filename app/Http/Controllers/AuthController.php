<?php

    namespace App\Http\Controllers;

    use App\Models\Password;
    use App\Models\User;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Random\RandomException;
    use Tymon\JWTAuth\Exceptions\JWTException;
    use Tymon\JWTAuth\Facades\JWTAuth;

    class AuthController extends Controller
    {
        //show login form
        public function showLoginForm(): View|Factory|Application
        {
            return view('auth.login');
        }

        // shoq register form
        public function showRegisterForm(): View|Factory|Application
        {
            return view('auth.register');
        }

        // Login
        public function login(Request $request): RedirectResponse
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
            $email = str_replace("'", "''", htmlspecialchars($request->email));
            $passwordReq = str_replace("'", "''", htmlspecialchars($request->password));

            $user = User::where('email', $email)->first();
            if (!$user) {
                return back()->withErrors(['error' => 'Tài khoản hoặc mật khẩu không chính xác'])->withInput();
            }
            $password = Password::where('user_id', $user->id)->first();
            if (!$password) {
                return back()->withErrors(['error' => 'Tài khoản hoặc mật khẩu không chính xác'])->withInput();
            }

            $hashedPassword = hash('sha256', $passwordReq . $password->salt);
            if ($hashedPassword !== $password->password) {
                return back()->withErrors(['error' => 'Tài khoản hoặc mật khẩu không chính xác'])->withInput();
            }

            try {
                $token = JWTAuth::fromUser($user);
                // Lưu token vào session
                session(['jwt_token' => $token]);
            } catch (JWTException $e) {
                return redirect()->back()->withErrors(['error' => 'Tài khoản hoặc mật khẩu không chính xác'])->withInput();
            }

            return redirect()->route('home');
        }

        // Register

        /**
         * @throws RandomException
         */
        public function register(Request $request): RedirectResponse
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);

            $name = str_replace("'", "''", htmlspecialchars($request->name));
            $email = str_replace("'", "''", htmlspecialchars($request->email));
            $password = str_replace("'", "''", htmlspecialchars($request->password));


            $user = User::create([
                'full_name' => $name,
                'email' => $email,
            ]);


            $salt = bin2hex(random_bytes(16));
            $hashedPassword = hash('sha256', $password . $salt);

            Password::create([
                'user_id' => $user->id,
                'salt' => $salt,
                'password' => $hashedPassword,
            ]);

            auth()->login($user);

            return redirect()->route('home');
        }

        // Logout
        public function logout(): RedirectResponse
        {
            session()->forget('jwt_token');
            return redirect()->route('login');
        }
    }
