<?php //functions for the register form

if(isset($_POST['register'])){

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    include '../db.php';
    include '../functions.php';
    echo 'works';

    //for some reason these are returning as !==false so my error handling doesn't work yet

    if(emptyInputSingup($user_name,$email,$password,$password2)== false){
        header('location: ../register.php?error=emptyinput');
        exit();
    }
    if(invalidUid($user_name) !== false){
        header('location: ../register.php?error=invaliduid');
        exit();
    }
    if(invalidEmail($email)!== false){
        header('location: ../register.php?error=invalidemail');
        exit();
    }
    if(pwdMatch($password,$password2)== false){
        header('location: ../register.php?error=passwordsdontmatch');
        exit();
    }
    if(uidExist($conn,$user_name,$email)!== false){
        header('location: ../register.php?error=usernametaken');
        exit();
    } 

    createUser($conn,$user_name,$email,$password);
}
else{
    header('location: ../register.php');
    exit();
}

