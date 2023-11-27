<?php 
session_start(); 
include('config/config.php');

if (isset($_POST['create_account'])) {

    $name = $_POST['name']; 
    $national_id = $_POST['national_id']; 
    $user_number = $_POST['user_number']; 
    $phone = $_POST['phone']; 
    $address = $_POST['address']; 
    $email = $_POST['email']; 
    $password = $_POST['password']; 


    $query = "INSERT INTO users (name, national_id, user_number, email, phone, password, address) VALUES (?, ?, ?, ?, ?,?, ?)"; 

    $stmt = $mysqli->prepare($query);  
    if (!$stmt) { 
        die("error in query:  " . $mysqli->error); 

    }
    $rc = $stmt->bind_param('sssssss', $name, $national_id, $user_number, $phone, $email, $password, $address );
    
    if(!$rc){ 
        die("there is an error with the binding parameters: " . $stmt->error); 
    }
    $stmt->execute(); 


    if($stmt->affected_rows > 0){ 
        $success = "Account Created Successfully"; 
    } else { 
        $err = "Something went wrong, please try again " . $stmt->error; 
    }

    $stmt->close(); 
    $mysqli->close(); 

}   
?>
// $ret  = " SELECT *  FROM  `system_settings`"; 
// $stmt = $mysqli->prepare($ret);
// $stmt->execute(); 
// $res = $stmt->get_result(); 
// while ($auth = $res->fetch_object()) 



<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Your Account - Online Banking</title>


 <!-- include ("dist/_partials/head.php"); -->
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <p>Online Banking - Sign Up</p>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="register-box-msg"> Sign Up on our innovative platform</p>
                <form method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="name" required class="form-control" placeholder="Enter your name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="national_id" required class="form-control" placeholder="National ID Number">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-tag"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3" style="display: none">
                        <?php 
                        $length = 4; 
                        $_Number = substr( str_shuffle('0123456789'),1, $length);
                        ?>
                        <input type="text" name="user_number" value="Bank-USER- <?php echo $_Number;?>" class="form-control" placeholder="User dedicated Number">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <!-- <span class="fas fa-tag"></span> -->
                                </div>
                            </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="phone" required class="form-control" placeholder="Your email address">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="email" required class="form-control" placeholder="Your email address">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="address" required class="form-control" placeholder="Your home address">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-map-marker"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" required class="form-control" placeholder="Enter a secured password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                        </div>

                        <div class="col-4">
                            <button type="submit" name="create_account" class="btn btn-success btn-block"> Register Now</button>
                        </div>
                    </div>
                </form>

                <p class="mb-0"> Already have an account? <br>
                    <a href="user_index.php" class="text-center">Login</a>

                </p>
            </div>
        </div>
    </div>
    

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>


</body>
</html>
