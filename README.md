# New-login-System
New login System using CSS Bootstrap HTML php mysql
<br><br>
<b>Code Explane</b>
<br>

index.php

    <?php
    include("config.php");
    if(isset($_POST['register'])){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $usern = $_POST['user'];
            $email = $_POST['email'];
            $pass1 = $_POST['pass1'];
            $cpass = $_POST['cpass'];

            $check_sql = "SELECT * FROM user_tbl WHERE username = '$usern' || pass1 = '$pass1' || email = '$email'";
            $result_check = mysqli_query($con, $check_sql);
            $nor_check = mysqli_num_rows($result_check);
            
            if($nor_check > 0){
                $error[] = "User Already Exists";
            }
            elseif(empty($usern)){
                $error[] = "Username Cannot be empty";
            }
            elseif(empty($email)){
                $error[] = "Email Cannot be empty";
            }
            elseif(empty($pass1)){
                $error[] = "Password Cannot be empty";
            }
            elseif(empty($cpass)){
                $error[] = "Confirm Password Cannot be empty";
            }
            elseif($pass1 != $cpass){
                $error[] = "Password and Confirm Password does not match";
            }
            else{
                $insert_sql = "INSERT INTO user_tbl(username, email, pass1, user_status) VALUE('$usern','$email','$pass1','1')";
                $result_insert = mysqli_query($con, $insert_sql);
                header("location:admin.php");
            }
        }
    }

    if(isset($_POST['login'])){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $luser = $_POST['luser'];
            $lpass = $_POST['lpass'];

            $check_login_sql = "SELECT username, pass1, user_status FROM user_tbl WHERE username = '$luser' && pass1 = '$lpass'";
            $result_check_login = mysqli_query($con, $check_login_sql);
            $nor_check_login = mysqli_num_rows($result_check_login);

            if($nor_check_login > 0){
                if(empty($luser)){
                    $error_login[] = "Enter Username";
                }
                elseif(empty($lpass)){
                    $error_login[] = "Enter Password";
                }
                else{
                    header("location:admin.php");
                }
            }
        }
    }
          ?>


          <!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Login</title>
              <link rel="stylesheet" href="style.css">
              <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
          </head>
          <body>
              <div class="jk_login">
              <br>
              <h1>Login and Registation System</h1>
              <div class="container">
                  <div class="row">
                      <table border="0">
                          <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                              <td>
                                  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                      <div class="card" style="width: 80%;">
                                          <h4 class="card-header">login</h4>
                                              <?php
                                                  if(isset($error_login)){
                                                      foreach($error_login as $error_login){
                                                          echo("<center>&nbsp<div class='alert alert-danger col-10' role='alert'>".$error_login."</div>&nbsp</center>");
                                                      }
                                                  }
                                              ?>
                                              <div class="card-body">
                                                  <div class="input-group" >
                                                      <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi                                                     bi-person-fill" viewBox="0 0 16 16">
                                                      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                      </svg>Username</span>
                                                      <input type="text" aria-label="First name" class="form-control" name="luser">
                                                  </div>
                                                  <br>
                                                  <div class="input-group" >
                                                      <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi                                                     bi-key-fill" viewBox="0 0 16 16">
                                                      <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0                                                     1 0 0-2 1 1 0 0 0 0 2z"/>
                                                      </svg>&nbspPassword</span>
                                                      <input type="password" aria-label="First name" class="form-control" name="lpass">
                                                  </div>
                                                  <br>
                                                  <input type="submit" value="Login" name="login" class="btn btn-success col-12">
                                          </div>
                                      </div>
                                  </form>
                              </td>
                              <td>

                                  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                      <div class="card" style="width: 80%;">
                                          <h4 class="card-header">Register</h4>
                                              <?php
                                                  if(isset($error)){
                                                      foreach($error as $error){
                                                          echo("<center>&nbsp<div class='alert alert-danger col-10' role='alert'>".$error."</div>&nbsp</center>");
                                                      }
                                                  }
                                              ?>

                                              <div class="card-body">
                                              <div class="input-group">
                                                      <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                      </svg>&nbspUsername</span>
                                                      <input type="text" aria-label="First name" class="form-control" name="user">
                                              </div>
                                              <br>
                                              <div class="input-group">
                                                      <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-at" viewBox="0 0 16 16">
                                                      <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"/>
                                                      </svg>&nbspEmail</span>
                                                      <input type="email" aria-label="First name" class="form-control" name="email">
                                              </div>
                                              <br>
                                              <div class="input-group">
                                                      <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                                      <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                                      </svg>&nbspPassword</span>
                                                      <input type="password" aria-label="First name" class="form-control" name="pass1">
                                              </div>
                                              <br>
                                              <div class="input-group">
                                                      <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                                      <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                                      </svg>&nbspConfirm Password</span>
                                                      <input type="password" aria-label="First name" class="form-control" name="cpass">
                                              </div>
                                              <br>
                                                  <center><input type="reset" value="Clear" class="btn btn-secondary col-5">&nbsp<input type="submit" value="Register" name="register" class="btn btn-success col-6">
                                                  </center>
                                          </div>
                                      </div>
                                  </form>
                              </td>
                          </tr>
                      </table>


                  </div>
              </div>    
              <br><br><br>
                  <center><h6><font color="#fff">BSC/WD/21/31/3 & HDEN/21/19/1 W.A.A.J Jehan Weerasuriya</font></h6></center>
              </div>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
          </body>
          </html>


<br>



***************************************************************************************


<br><br>
According to above code I develop for create interface, input data to the database<br>
and get date from database and validete all data also<br>
<br>
 
 
 
**************************


<br><br>
and then according to above code's php part in top of code I develop like following

    include("config.php");
    
include config.php, in order to config.php file all of the conncetion code goes in it <br>
following is the config.php
    
    <?php
        $server = "localhost";
        $user = "root";
        $pass = "";
        $db = "my_new_login";

        //make connecting
        $con = mysqli_connect($server,$user,$pass,$db);
        //connection Velidation
        if(!$con){
            die("Connection ERROR...!".mysqli_connect_error());
        }
    ?>
