<?php

    namespace App\Http\Middleware;

    use Closure;

    class AuthApi
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  \Closure $next
         * @return mixed
         */
        public function handle($request, Closure $next)
        {
            $this->initCookieCode($request);
//            $this->initTimeStartSession($request);

            return $next($request);
        }

        private function initTimeStartSession($request)
        {
            $time_start_session = $request->session('time_start');
            if (empty($time_start_session)) {
                $time_start_session = time();
            }

            if (!defined('TIME_START')) {
                define('TIME_START', $time_start_session);
            }
            dd(TIME_START);
        }

        private function initCookieCode($request)
        {
            $cookie_code = $request->cookie('cookie_code');
            if (empty($cookie_code)) {
                $cookie_code = str_random(30) . time();
            }

            if (!defined('COOKIE_CODE')) {
                define('COOKIE_CODE', $cookie_code);
            }
        }
    }
