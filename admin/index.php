<?php include_once '../db_connection/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        h3{ 
            color: white;
            text-align: center;
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
<body>
    <div class="body-container" style="background-color: lightgrey; padding: 20px; margin: 20px; border: 1px solid grey;">
        <h3>Admin Panel</h3>
        <hr>
        <?php $sql = "SELECT * FROM future_visitors"; 
            $query = mysqli_query($conn, $sql);
            $results = mysqli_num_rows($query);
        ?>
        <?php if ($results > 0): ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th><?php echo 'First Name'; ?></th>
                        <th><?php echo 'Last Name'; ?></th>
                        <th><?php echo 'Phone'; ?></th>
                        <th><?php echo 'E-Mail'; ?></th>
                        <th>action</th>
                    </tr>
                </thead>
                <?php while ($row = mysqli_fetch_assoc($query) ): ?>
                    <form action="update_visitor.php" method="POST">
                        <tr>
                            <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                            <td class="field" name='firstname'><?php  echo $row['firstname']; ?></td>
                            <td class="field" name='lastname'><?php  echo $row['lastname']; ?></td>
                            <td class="field" name='phone'><?php  echo $row['phone']; ?></td>
                            <td class="field" name='email'><?php  echo $row['email']; ?></td>
                            <?php  $id = $row['book_id']; ?>
                            <td class="buttons">
                                <?php echo "<button type='submit'><img src='../images/pen.svg' alt='edit'></button>"; ?>
                                </form>
                                <?php echo "<button onclick=actions('$id')><img src='../images/trash.svg' alt='delete'></button>"; ?>
                            </td>
                        </tr>
                <?php endwhile; ?>
            </table>
        <?php endif; ?>
        
    </div>
    <script>
        //document.getElementById('test').click();  clicking a button using javascript
        function actions(a){ 
            let xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){ 
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    location.reload();
                    console.log('deleted successfully');
                }
            }

            xmlhttp.open('POST', 'delete_visitor.php?book_id=' + a, true);
            xmlhttp.send();
        };

        function checkNewApplicangts(){ location.reload(); };
        //setInterval(function(){checkNewApplicangts()}, 2000);
    </script>
</body>
</html>