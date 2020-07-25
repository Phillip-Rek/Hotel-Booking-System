<?php

    include_once '../db_connection/db_connection.php';

    $book_id = trim(htmlspecialchars($_REQUEST['book_id']));
    $firstname = trim(htmlspecialchars($_REQUEST['firstname']));
    $lastname = trim(htmlspecialchars($_REQUEST['lastname']));
    $phone = trim(htmlspecialchars($_REQUEST['phone']));
    $email = trim(htmlspecialchars($_REQUEST['email']));

    $sql = "UPDATE future_visitors SET 
    firstname = '$firstname',
    lastname = '$lastname',
    email = '$email',
    phone = '$phone' 
    WHERE book_id = $book_id";

    if(mysqli_query($conn, $sql)){ 
        header('location: index.php');
    }

?>