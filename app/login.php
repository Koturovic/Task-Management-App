<?php
  session_start();
  if(isset($_POST['username']) && isset($_POST['password'])){
    include "../db_conn.php";
    function validate_input($data){
        $data = trim($data);    // uklanja sve praznine
        $data = stripslashes($data);    // sklanja //||\\
        $data = htmlspecialchars($data); // sprecavanje od hakerskog napada putem XSS attack
        return $data;
    }
    $username = validate_input($_POST['username']);
    $password = validate_input($_POST['password']);

    // ovde moramo da proverimo da li su uneti svi podaci pre LOGIN-a
    if(empty($username)){
        $em = "Username is required";
        header("Location: ../login.php?error=$em");
        exit();
    }else if(empty($password)){
        $em = "Password is required";
        header("Location: ../login.php?error=$em");
        exit();

    }else{

        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);

        if($stmt->rowCount()==1){
            $user = $stmt->fetch();
            $usernameDB = $user['username'];
            $passDB = $user['password'];
            $role = $user['role'];
            $id = $user['id'];

            if($username === $usernameDB){
                if(password_verify($password,$passDB)){
                    if($role =="admin"){
                        $_SESSION['role'] = $role;
                        $_SESSION['id'] = $id;
                        $_SESSION['username'] = $usernameDB;
                        header("Location: ../index.php");
                    }else if($role == "employee"){
                        $_SESSION['role'] = $role;
                        $_SESSION['id'] = $id;
                        $_SESSION['username'] = $usernameDB;
                        header("Location: ../index.php");

                    } else {
                        $em = "Unknown error occurred";
                        header("Location: ../login.php?error=$em");
                        exit();
                    }
                }else{
                    $em = "Incorrect username or password";
                    header("Location: ../login.php?error=$em");
                    exit();    
                }
            }else{
                $em = "Incorrect username or password";
                header("Location: ../login.php?error=$em");
                exit();
            }
        }
    }

  }else{
        $em = "unknown error occurred";
        header("Location: ../login.php?error=$em");
        exit();
  }

?>