<?php

// namespace App\Http\Middleware;

// use Closure;

// class Cors
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure  $next
//      * @return mixed
//      */
//     public function handle($request, Closure $next)
//     {
//         header('Access-Control-Allow-Origin: *');

//         $headers = [
//             'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
//             'Access-Control-Allow-Headers' => 'X-Requested-With, Content-Type, X-Auth-Token, Origin, Authorization'
//         ];

//         if ($request->getMethod() == "OPTIONS") {
//             return Response::make('OK', 200, $headers);
//         }

//         $response = $next($request);
//         foreach ($headers as $key => $value)
//             $response->header($key, $value);
//         return $response;
        
//         // return $next($request)
//         //         ->header('Access-Control-Allow-Origin', '*')
//         //         ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
//     }
// }
