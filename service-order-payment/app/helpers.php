<?php

use Illuminate\Support\Facades\Http;

function createPremiumAccess($data){
    $url = env('SERVICE_COURSE_URL').'api/mycourses/premium';
    
    
    try {
        $response = Http::post($url, $data);
        $data = $response->json();
        $data['http_code'] = $response->getStatusCode();
        return $data;
    } catch (\Throwable $th) {
        //throw $th;
        return [
            'status' => 'error',
            'http_code' => 500,
            'message' => 'service course unavaliable'
        ];
    }
}