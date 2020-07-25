<head>
    <style>
        h3{ 
            color: white;
            text-align: center;
        }
        input{ 
            min-width: 10mm;
        }
    </style>
    <link rel="stylesheet" href="../bootstrap.min.css" type="text/css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="../jquery.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="../bootstrap.min.js" charset="utf-8"></script>
</head>

<?php 
    include_once '../db_connection/db_connection.php';
    $book_id = $_REQUEST['book_id'];
    
    // redirecting to the index page in case there is no id posted
    if($book_id == null){ header('location: index.php'); };  

    $sql = "SELECT * FROM future_visitors WHERE book_id = $book_id";
    
    $query = mysqli_query($conn, $sql);
    $result = mysqli_num_rows($query);

?>

<div class="body-container" style="background-color: lightgrey; padding: 20px; margin: 20px; border: 1px solid grey;">
        <h3>Admin Panel</h3>
        <hr>
    <?php if ($result > 0): ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    
                    <th><?php echo 'Last Name'; ?></th>
                    <th><?php echo 'Phone'; ?></th>
                    <th><?php echo 'E-Mail'; ?></th>
                    <th>action</th>
                </tr>
            </thead>
            <?php while ($row = mysqli_fetch_assoc($query) ): ?>
                <form action="save_visitor.php" method="POST">
                    <tr>
                        <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                        <th><?php echo 'First Name'; ?></th>
                        <td><input type="text" name="firstname" value="<?php echo $row['firstname']; ?>"></td>
                        <td><input type="text" name="lastname" value="<?php echo $row['lastname']; ?>"></td>
                        <td><input type="phone" name="phone" value="<?php echo $row['phone']; ?>"></td>
                        <td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
                        <td class="buttons">
                            <?php echo "<button type='submit' class='btn btn-success'>save</button>"; ?>
                        </td>
                    </tr>
                </form>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>
</div>