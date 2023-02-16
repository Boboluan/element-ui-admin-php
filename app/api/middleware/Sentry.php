<?php

namespace app\api\middleware;

class Sentry
{
    public function handle($request, \Closure $next): object
    {
//        dump($request->request()['id']);
//        die();
        $requestData = $request->request();
        $response = $next($request);
        return $response;
    }
}
