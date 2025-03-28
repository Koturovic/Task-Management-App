<?php
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id'])){ 
	include "db_conn.php";
    include "app/Model/User.php";
    $users = get_all_users($conn);
    
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    
    <!-- Font Awesome (najnovija verzija) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <?php include"inc/header.php"?>

    <div class="body">
        <?php  include "inc/nav.php"?>

        <section class="section-1">
             <h4 class="tittle">Manage Users <a href="add-user.php">Add User</a></h4>
             <?php if($users!=0) { ?>

             

             <table class="main-table">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>role</th>
                    <th>Action</th>
                </tr>
                <?php $i = 0; foreach($users as $user){ ?>

                
                <tr>
                    <td><?=++$i?></td>
                    <td><?=$user['full_name']?></td>
                    <td><?=$user['username']?></td>
                    <td><?=$user['role']?></td>
                    <td>
                        <a href="delite-user.php?id=<?=$user['id']?>" class="delete-btn">Delete</a>
                        <a href="edit-user.php?id=<?=$user['id']?>" class="edit-btn">Edit</a>
                    </td>
                </tr>
                <?php } ?>
             </table>
        <?php } else{ ?>
            <h3>Empty</h3>

         <?php } ?>
        </section>
    </div>

    <script type="text/javascript">
        var active = document.querySelector("#navList li:nth-child(2)");
        active.classList.add("active");
    </script>

    <!-- jQuery (uvek pre Bootstrap JS) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

<?php } else{
	$em = "First login";
	header("Location: login.php?error=$em");
	exit();
}
?>
