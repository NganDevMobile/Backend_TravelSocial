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

//$title, $content, $picture, $user_id
 $title = $data->title;
 $content = $data->content;
 $picture = $data->picture;
 $user_id = $data->user_id;
 $id = $data->id;
$status = (new PostController())->update($id, $title, $content, $picture, $user_id);
if($status){
    http_response_code(200);
    echo json_encode(array("status" => true));
}else{
    http_response_code(404);
    echo json_encode(array("status" => false));
}


?>