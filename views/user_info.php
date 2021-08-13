<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data = json_decode(file_get_contents("php://input"));



include_once '../controllers/user.php';

$access_token = (new UserController())->login($data->email, $data->password);
if ($access_token) {
    http_response_code(200);
    $info = (new UserController())->getUserInfo();
    echo json_encode($info);

} else {
    http_response_code(401);
    echo json_encode(array(
        "message"=> 'Không tìm thấy token đăng nhập',
      
    ));
}

$info = (new UserController())->getUserInfo();
echo json_encode($info);

?>