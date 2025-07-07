<?php


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    http_response_code(200);
    echo json_encode([
        $_GET
    ]);
}else{
    http_response_code(404);
    echo json_encode([
        'error' => 'Method not allowed',
        'method' => $_SERVER['REQUEST_METHOD']
    ]);
}

/**
 
GET -> http://localhost:3000/get.php?name=Jose&edad=28
 */