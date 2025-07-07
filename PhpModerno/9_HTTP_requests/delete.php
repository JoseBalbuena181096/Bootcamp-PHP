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


if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    extract($_GET);
    if(isset($id)){
        $index = get($id, $arr);
        if($index >= 0){
            unset($arr[$index]);
            $arr = array_values($arr);
            http_response_code(200);
            echo json_encode([
                'message' => 'User deleted successfully',
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
            'message' => 'Missing id'
        ]);
    }
}
else{
    http_response_code(405);
    echo json_encode([
        'error' => 'Method not allowed should be DELETE',
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


DELETE -> http://localhost:3000/delete.php?id=1

 **/
