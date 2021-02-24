<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Log;

class LogRequest
{
    protected $end;

    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
        // Convert from UNIX to miliseconds
        $response_time = microtime(true) - LARAVEL_START;
        $response_time = round($response_time, 3);
        $response_time *= 1000;

        // Call the log method
        $this->log($request, $response_time);
    }

    public function log($request, $response_time) {
        // Put the logged data into the database
        $data = new Log;
        $data->uri = $request->getUri();
        $data->method = $request->getMethod();
        $data->request_time = $response_time;
        $data->save();
    }
}
