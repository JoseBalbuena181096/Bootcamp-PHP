<?php

require_once __DIR__ . '/autoload.php';

$request = $_SERVER['REQUEST_METHOD'];

use App\business\Add;
use App\business\Get;
use App\business\Update;
use App\business\Delete;
use App\data\Repository;
use App\validators\Validator;
use App\exceptions\ValidationException;
use App\exceptions\DataException;

$repository = new Repository();
$validator = new Validator();

try {
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $get = new Get($repository);
            echo json_encode($get->get());
            break;
        case 'POST':
            $body = json_decode(file_get_contents('php://input'), true);
            $add = new Add($repository, $validator);
            $add->add($body);
            break;
        case 'PUT':
            $body = json_decode(file_get_contents('php://input'), true);
            $update = new Update($repository, $validator);
            $update->update($body);
            break;
        case 'DELETE':
            $body = json_decode(file_get_contents('php://input'), true);
            $delete = new Delete($repository);
            $delete->delete($body['id']);
            break;
        default:
            http_response_code(405);
            break;
    }
}
catch (ValidationException $e) {
    http_response_code(400);
    echo json_encode([
        'error' => $e->getMessage()
    ]);
}
catch (DataException $e) {
    http_response_code(404);
    echo json_encode([
        'error' => $e->getMessage()
    ]);
}
catch (\Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => $e->getMessage()
    ]);
}