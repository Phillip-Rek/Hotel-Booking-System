<style>
    .content{ 
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        justify-content: center;
        align-content: center; 
    }
    h3{ 
        text-align: center;
    }
</style>
<?php 
    include_once '../db_connection/db_connection.php';

    $firstname = trim(htmlspecialchars($_POST['firstname']));
    $lastname = trim(htmlspecialchars($_POST['lastname']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $email = trim(htmlspecialchars($_POST['email']));
    $email_2 = trim(htmlspecialchars($_POST['email_2']));

    if($email == $email_2){ 
        if(isset($firstname) && isset($lastname) && isset($phone) && isset($email) && isset($email_2)){ 
            $sql = "INSERT INTO future_visitors(firstname, lastname, phone, email) 
            VALUES('$firstname', '$lastname', '$phone', '$email')";

            $query = mysqli_query($conn, $sql);
            if($query){ 
                echo "<div class='content'><h3>You have successfully booked </h3> <br>";
                echo "return to homepage <a href='index.html'>home</a></div>";
            }else{ 
                echo 'Ooops something went wrong';
            }
        }
        else{ 
            header("location: check_availability.php");
        }
    }else{ 
        header("location: check_availability.php");
    }

?>