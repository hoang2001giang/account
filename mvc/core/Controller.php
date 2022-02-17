<?php
class Controller{

    public function model($model){
        require_once "./mvc/models/". $model .".php";
        $database = new Database();
        $conn = $database->getConnection();
        return new $model($conn);
    }

    public function view($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
    }

}
?>