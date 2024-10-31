<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Tymon\JWTAuth\Facades\JWTAuth;
    use Tymon\JWTAuth\Exceptions\TokenExpiredException;
    use Tymon\JWTAuth\Exceptions\TokenInvalidException;

    class JwtMiddleware
    {
        /**
         * Handle an incoming request.
         *
         * @param \Closure(Request): (Response) $next
         */
        public function handle(Request $request, Closure $next): Response
        {
            $token = session('jwt_token');

            if (!$token) {
                return redirect()->route('login');
            }

            try {
                JWTAuth::setToken($token)->authenticate();
            } catch (TokenExpiredException|TokenInvalidException $e) {
                return redirect()->route('login')->withErrors(['error' => 'Phiên làm việc đã kết thúc. Vui lòng đăng nhập lại']);
            }

            return $next($request);
        }
    }
