<?php 

    include_once '../db_connection/db_connection.php';

    $id = $_REQUEST['book_id'];

    $sql = "DELETE FROM future_visitors WHERE book_id = $id ";

    $query = mysqli_query($conn, $sql);

    if($query){ 
        echo 'deleted successfully';
        header('location: http://localhost:8080/hotel-web/admin/index.php');
    }
    else{ 
        echo 'failed to delete';
        exit;
    }

?>