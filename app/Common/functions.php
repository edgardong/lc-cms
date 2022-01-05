<?php

use Illuminate\Support\Facades\Http;

/**
 * http get request
 * @param string $url
 * @param array $params
 * @return mixed
 */
if (!function_exists("http_get")) {
    function http_get($url, $params)
    {
        $response = Http::get($url, $params);
        return $response;
    }
}

/**
 * http post request
 * @param string url
 * @param array params
 * @return mixed
 */
if (!function_exists("http_post")) {
    function http_post(string $url, array $params)
    {
        $response = Http::post($url, $params);
        return $response;
    }
}
