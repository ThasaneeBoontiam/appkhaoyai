<?php
    require_once "includes/connect.php";
    if(isset($_POST)& !empty($_POST)){
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
        $sql = "SELECT * FROM `tb_user` WHERE Email = '$Email'";
        $query = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($query);
        if($count == 1){
            $q = mysqli_fetch_assoc($query);
            $password = $q['password'];
            $to = $q['Email'];
            $subject = "Your Recovered Password";

            $message = "Please use this password to login " . $password;
            $headers = "From : admin@phpflow.com";////
            if(mail($to, $subject, $message, $headers)){
                echo "Your Password has been sent to your email id";
            }else{
                echo "Failed to Recover your password, try again";
            }
        }else{
            echo "Email does not exist in database";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    <div class="container">
                        <h3>ลืมรหัสผ่าน?</h3>
                            <form id="register-form" role="form" autocomplete="off" class="form" method="post">    
                            <div class="form-group">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                            </div>
                            
                            <!-- <input type="hidden" class="hide" name="token" id="token" value="">  -->
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>