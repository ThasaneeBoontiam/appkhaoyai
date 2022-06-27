<?php
    require_once "includes/connect.php";
    session_start();

    $password = $confirm_password = "";
    $password_err = $confirm_password_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        // Validate password
        if(empty(trim($_POST["Password"]))){
            $password_err = "Please enter a password.";     
        } elseif(strlen(trim($_POST["Password"])) < 6){
            $password_err = "Password must have atleast 6 characters.";
        } else{
            $password = trim($_POST["Password"]);
        }
        
        // Validate confirm password
        if(empty(trim($_POST["ConPassword"]))){
            $confirm_password_err = "Please confirm password.";     
        } else{
            $confirm_password = trim($_POST["ConPassword"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Password did not match.";
            }
        }

        if(empty($password_err) && empty($confirm_password_err)){

            // Prepare an insert statement
            $sql = "UPDATE `tb_user` SET `Password`= '$password' WHERE `UserName` = '{$_SESSION["username"]}'";
            mysqli_query($conn, $sql);

            header("location: login.php");
        }else{
            // echo '<script>alert("'.$username_err.''.$password_err.''.$confirm_password_err.'");</script>';
            $password_err = "รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่";
        }

        // Close connection
        mysqli_close($conn);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Register</title>
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
        
    </style>
</head>
<body>

<div class="d-flex justify-content-center">
    <div class="wrapper">
        <div class="card bg-light">
            <div class="card-body">
                <h2>เปลี่ยนรหัสผ่านใหม่</h2>
                <!-- <p>กรุณากรอกรหัสผ่านใหม่</p> -->
                    <?php 
                        if(!empty($password_err)){
                            echo '<div class="alert alert-danger">' . $password_err . '</div>';
                        }        
                        ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label >รหัสผ่านใหม่</label>
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="รหัสผ่าน">
                    </div>
                    <div class="form-group">
                        <label >ยืนยันรหัสผ่านใหม่</label>
                        <input type="password" class="form-control" id="ConPassword" name="ConPassword" placeholder="ยืนยันรหัสผ่าน">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <button type="submit" class="btn btn-primary">ยืนยัน</button><br><br>
                    
                </form>
            </div>
        </div>
    </div>
</div>   
</body>
</html>