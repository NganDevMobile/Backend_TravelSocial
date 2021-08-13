<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// header("Content-Type: application/x-www-form-urlencoded; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data = json_decode(file_get_contents("php://input"));

include_once '../controllers/post.php';

//$name, $price, $quantity, $material, $image_url, $category_id
$status = (new PostController())->delete($data->id);
if($status){
    http_response_code(200);
    echo json_encode(array("status" => true));
}else{
    http_response_code(404);
    echo json_encode(array("status" => false));
}


?>