<?php
include("config.php");
session_start();
// variable declaration
$username ="";
$mobile="";
$email ="";
$errors = array();


// calling reg function 

if(isset($_POST['register_btn'])){
    register();
}
// calling login function 

if(isset($_POST['login_btn'])){
    login();
}

if(isset($_POST['recpassword_btn'])){
    sendmail();
}





// user login function
function login(){
    global $conn, $username ,$errors;

     // grap values
    $emailid = e($_POST['emailid']);
    $password =e($_POST['password']);

    // validation
    if(empty($emailid)){
        array_push($errors, "Email id is required");
    }
    if(empty($password)){
        array_push($errors, "Password is required");
    }

    if(count($errors) == 0){
        $password = md5($password);

        $sql = "SELECT * FROM users WHERE emailid='$emailid' AND password='$password' LIMIT 1";
        $results = mysqli_query($conn, $sql);
        if(mysqli_num_rows($results) == 1 ){
            $login_user = mysqli_fetch_assoc($results);
            if($login_user['mrole'] == 'Admin'){
                $_SESSION['user'] = $login_user;
                $_SESSION['success'] = "You are now logged in";
                $_SESSION['username'] = $login_user['username'];
                header("Location: admin/index.php");

            }else{
                $_SESSION['id'] = session_id();
                $_SESSION['user'] = $login_user;
                $_SESSION['success'] = "You are now logged in";
                $_SESSION['username'] = $login_user['username'];
                $_SESSION['userid'] = $login_user['userid'];
                $_SESSION['cerstatus'] = $login_user['cerstatus'];
                $_SESSION['proup'] = $login_user['proup'];
                header("Location: user/index.php");
                
            }
        }else{
            array_push($errors,"wrong username/password combination");
        }
    }

}

// user login function
function register(){
    global $conn ,$errors;
    $username = e($_POST['username']);
    $email = e($_POST['email']);
    $mobile = e($_POST['mobile']);
    $pass1 = e($_POST['password_1']);
    $pass2 = e($_POST['password_2']);


    // validation

    if(empty($username)){
        array_push($errors, "Username is required");
    }
    
    if(empty($mobile)){
        array_push($errors, "Mobile no. is required is required");
    }else{
        UserMobExist($mobile);
    }
    
    if(!preg_match('/^\d{10}+$/',$mobile)){
        array_push($errors, "Enter 10 digits only");
    }
    if(empty($email)){
        array_push($errors, "Email is required");
    }else{
        UserExist($email);
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Invaild email formate");
    }
    if(empty($pass1)){
        array_push($errors, "Password is required");
    }
    if($pass1 != $pass2){
        array_push($errors, "Password does not match");
    }
   

    if(count($errors) == 0){
        $password = md5($pass1);
        $max_id = Userid();

        $sql = "INSERT INTO users (username,userid,sponsorid,mobileno,emailid,mrole,password,regdate) VALUES('$username','$max_id','1001','$mobile','$email','User','$password',NOW())";
        
        mysqli_query($conn, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are logged in now";
        header("location: login.php");
    }
}


function sendmail(){
    global $conn, $dmessage;
    $dmessage = "Enter your email id below";
    if(isset($_POST) & !empty($_POST)){
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $sql = "SELECT * FROM `users` WHERE emailid = `$email`";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        
        if($count == 1)
        {
            $row = mysqli_fetch_assoc($res);
            $password = $row['password'];
            $to = $row['emailid'];
            $subject = "Your Recoverd Password";

            $message = "Please use this password to login " . md5($password);
            $headers = "From : noreply@ucb.com";
            if(mail($to, $subject, $message, $headers)){
                $dmessage = "Your password has been sent to your email id";
                header("location: forget_password.php");
            }else{
                $dmessage= "Failed to recover your password, try again";
            }
        }
    }else{
        $dmessage = "Email does not exist in database";
    }
}


function UserMobExist($mobile){
    global $conn, $errors;
    $sql = "SELECT mobileno FROM users WHERE mobileno ='$mobile'";
    $results = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($results);
    if($mobile==$row['mobileno']){
        array_push($errors, "Mobile no already registerd");
    }
    
}

function UserExist($email){
    global $conn, $errors;
    $sql = "SELECT emailid FROM users WHERE emailid ='$email'";
    $results = mysqli_query($conn, $sql);
    $row =  mysqli_fetch_assoc($results);
    if($email==$row['emailid']){
        array_push($errors, "Email already registerd");
    }
    
}

function Userid(){
    global $conn;
    $sql = "SELECT MAX(`userid`) AS maximum FROM `users`";
    $results = mysqli_query($conn, $sql);
    $row =   mysqli_fetch_assoc($results);
    $row1=$row['maximum']+1;
    return $row1;

    
}

function islogin(){
   if(isset($_SESSION['user'])){
    return true;
   }else{
    return false;
   }
}
function isUser(){
    if(isset($_SESSION['user']) && $_SESSION['user']['mrole'] =='User'){
     return true;
    }else{
     return false;
    }
 }
 function isAdmin(){
    if(isset($_SESSION['user']) && $_SESSION['user']['mrole'] =='Admin'){
     return true;
    }else{
     return false;
    }
 }

function e($val){
    global $conn;
    return mysqli_real_escape_string($conn,trim($val));
}
function display_error(){
    global $errors;

    if(count($errors) > 0){
        echo '<div class= "alert alert-info">';
        foreach($errors as $error){
            echo $error .'<br>';
        }
        echo '</div>';
    }
}
?>