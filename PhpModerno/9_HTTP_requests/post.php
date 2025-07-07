<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    http_response_code(201);
   
    // echo file_get_contents('php://input');
   $json = file_get_contents('php://input');
   // $data = json_decode($json, true); para convertirlo a un array 
   $data = json_decode($json);
//    echo json_encode([
//     'data' => $data
//    ]);
   //$name = $data->name;
  // $age = $data->age;
   extract((array)$data);
   echo json_encode([
    "message" => "User created successfully",
    "name" => $name,
    "age" => $age
   ]);

}else{
    http_response_code(404);
    echo json_encode([
        'error' => 'Method not allowed should be POST',
        'method' => $_SERVER['REQUEST_METHOD']
    ]);
}


/*

POST -> http://localhost:3000/post.php
El body vienen los datos que envian los clientes para la creacion
de un nuevo recurso,  
RAW significa los datos en formato JSON, bruto
{
    "name":"Jose",
    "age": 28
} 


response
{
    "message": "User created successfully",
    "name": "Jose",
    "age": 28
}
*/