<?php

namespace App\Http\Middleware;

use Closure;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Illuminate\Support\Facades\Log;

class RequestLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $arr      = parse_url($request->fullUrl());
        $path     = array_get($arr, 'path', '');
        $log_file = 'logs/'.trim($path, '/').'/'.date("Y-m-d").'.log';
        
        // create a log channel
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler(storage_path($log_file), Logger::INFO));

        // add records to the log
        $log->info(json_encode([
            'path'     => $path,
            'method'   => $request->method(),
            'request'  => $request->all(),
            'response' => $response->original,
        ], JSON_UNESCAPED_UNICODE));

        return $response;
    }
}
