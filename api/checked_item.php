<?php

if(isset($_POST['idx'])){
    require '../db_connection.php';

    $id = $_POST['idx'];

    if(empty($id)){
       echo 'error';
    }else {
        $todos = $conn->prepare("SELECT idx, checked FROM todos WHERE idx=?");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $uId = $todo['idx'];
        $checked = $todo['checked'];

        $uChecked = $checked ? 0 : 1;

        $res = $conn->query("UPDATE todos SET checked=$uChecked WHERE idx=$uId");

        if($res){
            echo $checked;
        }else {
            echo "error";
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}