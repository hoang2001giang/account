<?php
class Home extends Controller {
    function first() {
        $user = $this->model("User");
        $stmt = $user->readAll();
        $num = $stmt->rowCount();

        if ($num > 0) {
            $users_arr = array();
            $users_arr['records'] = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $user_items = array(
                    "id" => $id,
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "email" => $email,
                );

                array_push($users_arr['records'], $user_items);
            }

            // set response code - 200 OK
            http_response_code(200);
        
            // show citizens data in json format
            echo '<pre>';
            echo json_encode($users_arr);
            echo '</pre>';
        }
        
        else {
        
            // set response code - 404 Not found
            http_response_code(404);
        
            // tell the user no citizens found
            echo json_encode(
                array("message" => "No users found.")
            );
        }

        // view

    }
}


?>
        
