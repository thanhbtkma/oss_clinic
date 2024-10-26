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
            } catch (TokenExpiredException $e) {
                return redirect()->route('login')->withErrors(['error' => 'Session expired. Please log in again.']);
            } catch (TokenInvalidException $e) {
                return redirect()->route('login')->withErrors(['error' => 'Invalid session. Please log in again.']);
            }

            return $next($request);
        }
    }
