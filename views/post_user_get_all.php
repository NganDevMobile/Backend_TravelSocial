<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// header("Content-Type: application/x-www-form-urlencoded; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data = json_decode(file_get_contents("php://input"));

// include_once '../helpers/getBearerToken.php';

// $access_token = getBearerToken();

// if($access_token){

// }
// else{
//     http_response_code(401);
// }
include_once '../controllers/post.php';

$user = (new PostController())->getAllUser();
echo json_encode($user);

?>