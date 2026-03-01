<?php
    $SECRET_KEY = "Asdfg123";

    $header = json_encode(['alg' => 'HS256', 'typ' => 'JWT']);

    $payload = json_encode(['userId'=> 8,'roll'=> 0,'exp' => time() + 3600]);

    function base64UrlEncode($data) {
        return str_replace(['+','/','='],['-','_',''], base64_encode($data));
    }

    $base64UrlHeader = base64UrlEncode($header);
    $base64UrlPayload = base64UrlEncode($payload);

    $signature = hash_hmac('sha256',$base64UrlHeader . "." . $base64UrlPayload, $SECRET_KEY, true);
    $base64UrlSignature = base64UrlEncode($signature);

    $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

    echo $jwt;
?>