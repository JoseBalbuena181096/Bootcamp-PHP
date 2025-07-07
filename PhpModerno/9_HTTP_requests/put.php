<?php

header('Content-Type: application/json');

$arr = [
    [
        "name" => "Jose",
        "id" => 1
    ],
    [
        "name" => "Maria",
        "id" => 2
    ]
    ];


if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    extract((array)$data);

    if($data !== null && isset($id) && isset($name)){
        $index = get($id, $arr);
        if($index >= 0){
            $arr[$index]['name'] = $name;
            http_response_code(200);
            echo json_encode([
                'message' => 'User updated successfully',
                'users' => $arr
            ]);
        }
        else{
            http_response_code(404);
            echo json_encode([
                'error' => 'User not found',
                'id' => $id
            ]);
        }
    }
    else{
        http_response_code(400);
        echo json_encode([
            'error' => 'Bad request',
            'message' => 'Missing id or name'
        ]);
    }


}else{
    http_response_code(405);
    echo json_encode([
        'error' => 'Method not allowed should be PUT',
        'method' => $_SERVER['REQUEST_METHOD']
    ]);
}


function get($id, $arr){
    for($i = 0; $i < count($arr); $i++){
        if($arr[$i]['id'] == $id){
            return $i;
        }
    }
    return -1;
}

/**


PUT -> http://localhost:3000/put.php 
 Body raw 
{
    "id": 1,
    "name": "Jose Angel"
}
 **/