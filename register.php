<?php
    require_once "includes/connect.php";	

    // $Firstname = $_POST['Firstname'];
    // $Lasttname = $_POST['Lasttname'];
    // $Usertname = $_POST['Usertname'];
    // $Password = $_POST['Password'];
    // $ConPassword = $_POST['ConPassword'];
    // $Agency = $_POST['Agency'];
    

    $username = $password = $Firstname = $Lastname = $Email = $Agency = $Rank = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
 
        // Validate username
        if(empty(trim($_POST["Usertname"]))){
            $username_err = "Please enter a username.";
        } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["Usertname"]))){
            $username_err = "Username can only contain letters, numbers, and underscores.";
        } else{
            // Prepare a select statement
            $sql = "SELECT id FROM tb_user WHERE UserName = ?";
            
            if($stmt = mysqli_prepare($conn, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                // Set parameters
                $param_username = trim($_POST["Usertname"]);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "This username is already taken.";
                    } else{
                        $username = trim($_POST["Usertname"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
    
                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
        
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
        
        
        // Check input errors before inserting in database
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

            $Firstname =trim($_POST["Firstname"]);
            $Lastname = trim($_POST["Lastname"]);
            $Email = trim($_POST["Email"]);
            $Agency = trim($_POST["Agency"]);
            $Rank = trim($_POST["Rank"]);
            // $password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Prepare an insert statement
            $sql = "INSERT INTO tb_user (First_name, Last_name, UserName, Email, Password, Agency, Rank, Status) VALUES ('$Firstname', '$Lastname', '$username', '$Email', '$password', '$Agency', '$Rank', 'User')";
            mysqli_query($conn, $sql);

            header("location: login.php");
            // if($stmt = mysqli_prepare($conn, $sql)){
            //     // Bind variables to the prepared statement as parameters
            //     mysqli_stmt_bind_param($stmt, "ss", $param_Firstname, $param_Lastname, $param_username, $param_password, $param_Agency);
                
            //     // Set parameters
            //     $param_Firstname = $Firstname; 
            //     $param_Lastname  = $Lastname; 
            //     $param_username = $username;
            //     $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            //     $param_Agency    = $Agency;
                
            //     // Attempt to execute the prepared statement
            //     if(mysqli_stmt_execute($stmt)){
            //         // Redirect to login page
            //         header("location: login.php");
            //     } else{
            //         echo "Oops! Something went wrong. Please try again later.";
            //     }
    
            //     // Close statement
            //     mysqli_stmt_close($stmt);
            // }
        }else{
            echo '<script>alert("'.$username_err.''.$password_err.''.$confirm_password_err.'");</script>';
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
                <h2>ลงทะเบียน</h2>
                <p>กรุณากรอกแบบฟอร์มนี้เพื่อสร้างบัญชี</p>
                
                <form method="post">
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" id="Firstname" name="Firstname" aria-describedby="emailHelp" placeholder="ชื่อ">
                    </div>
                    <div class="form-group">
                        <label >นามสกุล</label>
                        <input type="text" class="form-control" id="Lastname" name="Lastname" aria-describedby="emailHelp" placeholder="นามสกุล">
                    </div>
                    <div class="form-group">
                        <label >ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="Usertname" name="Usertname" aria-describedby="emailHelp" placeholder="ชื่อผู้ใช้">
                    </div>
                    <div class="form-group">
                        <label >อีเมล</label>
                        <input type="email" class="form-control" id="Email" name="Email" aria-describedby="emailHelp" placeholder="อีเมล">
                    </div>
                    <div class="form-group">
                        <label >รหัสผ่าน</label>
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="รหัสผ่าน">
                    </div>
                    <div class="form-group">
                        <label >ยืนยันรหัสผ่าน</label>
                        <input type="password" class="form-control" id="ConPassword" name="ConPassword" placeholder="ยืนยันรหัสผ่าน">
                    </div>
                    <div class="form-group">
                        <label >หน่วยงาน</label>
                        <input type="text" class="form-control" id="Agency" name="Agency" placeholder="ชื่อหน่วยงาน">
                    </div>
                    <div class="form-group">
                        <label >ตำแหน่ง</label>
                        <input type="text" class="form-control" id="Rank" name="Rank" placeholder="ตำแหน่ง">
                    </div>
                    <button type="submit" class="btn btn-primary">ยืนยัน</button><br><br>
                    <p>มีบัญชีอยู่แล้ว? <a href="login.php">เข้าสู่ระบบ</a></p>
                </form>
            </div>
        </div>
    </div>
</div>


    
</body>
</html>