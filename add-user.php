<?php
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id'])){ 
	
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users</title>
    
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
            <h4 class="tittle">Add Users <a href="user.php">User</a></h4>
            <form class="form-1" method="POST" action="app/add-user.php">
                  <?php if(isset($_GET['error'])){?>    
                <div class="danger" role="alert">
                <?php echo stripcslashes($_GET['error']); ?>
            </div>
                <?php } ?>
                <?php if(isset($_GET['success'])){?>    
                    <div class="success" role="alert">
                   <?php echo stripcslashes($_GET['success']); ?>
            </div>
                    <?php } ?>
                <div class="input-holder">
                    <label>
                        Full Name
                    </label>
                    <input type="text" name="full_name" class="input-1" placeholder="Full Name"><br><br>
                </div>
             

             
                <div class="input-holder">
                    <label>
                        Username
                    </label>
                    <input type="text" name="user_name" class="input-1" placeholder="Username"><br><br>
                </div>
             

             
                <div class="input-holder">
                    <label>
                        Password
                    </label>
                    <input type="text" name="password" class="input-1" placeholder="Password"><br><br>
                </div>
            
             <button class="edit-btn">
                Add
             </button>

            </form>
        </section>
    </div>
    <style>
                .danger {
                    background: #FF98AA !important;
                    color: #B20008 !important;
                    padding: 10px !important;
                    margin-top: 10px !important;
                    margin-bottom: 10px !important;
                    border-radius: 5px;
                    font-weight: bold;
                    
                }

                .success{
                    background: #80CE91 !important;
                    color: #009D22 !important;
                    padding: 10px;
                    margin-bottom: 10px;
                }
        
    </style>
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
