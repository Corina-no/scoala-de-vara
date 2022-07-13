<?php
session_start();
require_once "../admin/config.php";
include DIR_BASE . "/admin/connect.php";

?>

<?php

 $comanda=isset($_REQUEST["comanda"])?$_REQUEST["comanda"]:NULL;
 if(isset($comanda)){
    switch($comanda){

        case 'Login':
            $username=isset($_REQUEST["username"])?$_REQUEST["username"]:NULL;
            $password=isset($_REQUEST["password"])?$_REQUEST["password"]:NULL;
            
       
          
            if (empty($username)) {
                echo "Username is required";
            }elseif (empty($password)) {
                echo "Password is required";
            }else{
                $username = mysqli_real_escape_string($conexiune, $_REQUEST['username']);
                $password = mysqli_real_escape_string($conexiune, $_REQUEST['password']);
               
            
            $sql=sprintf("SELECT * FROM `login` WHERE `username`='%s' AND `password`='%s'",
                mysqli_real_escape_string($conexiune, $username),
                mysqli_real_escape_string($conexiune, $password));
            $results=mysqli_query($conexiune,$sql) or die( mysqli_error($conexiune));
            mysqli_store_result($conexiune);

            
            $v=mysqli_num_rows($results);
            
            if ($v == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                $_SESSION['logat']=TRUE;
                header('location: ../Home.php');
            

              }else {
                  echo "Login failed!";
                   
                   
              }
            }
            

     
              
     }
 }
 if(!(isset($_SESSION['logat']) && $_SESSION['logat']==TRUE)){
    echo"<script>alert('Invalid Username or password. Login Failed!');window.location.href=' ../Administrator/login.html';</script>";

     
 }

?>