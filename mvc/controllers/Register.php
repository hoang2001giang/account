<?php
class Register extends Controller {
    
    public function __construct() {
        
        
    }

    function first() {
        $this->view(
            "master1",
            [
                "page" => "register"
            ]
        );
    }

    function register() {
        // get data
        if (isset($_POST['btn_register'])) {
            $user = $this->model("User");

            $user->email = $_POST['email'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->password = $_POST['password'];

            if (!empty($user->email) && !empty($user->first_name) && !empty($user->last_name) && !empty($user->password)) {

                // response code
                http_response_code(200);

                $res = $user->create();
            } else {
                http_response_code(400);
            }

            // show "ok"
            $this->view(
                "master1",
                [
                    'page' => 'register',
                    'res' => $res
                ]
            );
        } else {
            echo "Register failed.";
        }
        
    }
}


?>