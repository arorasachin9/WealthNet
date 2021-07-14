
<?php

session_start();

$error = "";
$success = "";

if(array_key_exists("logout", $_GET)){

    unset($_SESSION);
    session_destroy();
    setcookie("id", "", time() - 60*60*24*356 );
    setcookie("id", "", time() - 60*60*24*356 );
    $_COOKIE["id"] = "";
    header("Location: index.php");

}else if((array_key_exists("id", $_SESSION)  AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'] )){

    header("Location: loggedinpage.php");

}



include("connection.php");

if(array_key_exists('email', $_POST) OR array_key_exists('password', $_POST)){

    if($_POST['email'] == ''){

        $error = "<p>Enter Your Email</p>";

    }else if($_POST['password'] == ''){

        $error = "<p>Enter Your Password</p>";

    }else{

        if($_POST['sign'] == '1'){
            $email = mysqli_real_escape_string($link,$_POST['email']);
            $pass = mysqli_real_escape_string($link,$_POST['password']);



            if($_POST['password'] != $_POST['ConfirmPassword']){

                $error = "<p> Password does't match</p>";
            }else{

                $query = "SELECT `id` FROM `diary` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if($result AND mysqli_num_rows($result) > 0){
            
                    $error = "<p>Email already registered..</p>";

                }else{

                    
                    $query = "INSERT INTO `diary`(`email`, `password`) VALUES ('$email','$pass')";
                    echo "3";
$result = mysqli_query($link, $query);
$ids = mysqli_insert_id($link);
                    if($result){
                        echo "2";
                        $query = "SELECT * FROM `diary` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'LIMIT 1";

            
                        $hashed = md5(md5($ids).$_POST['password']);
                
                        $query = "UPDATE `diary` SET password = '$hashed' WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'LIMIT 1" ;

                        if(mysqli_query($link, $query)){

                            $success = "<p>Sign up successful please log in your account.</p>";
                        }
echo "3";

                        $_SESSION['id'] = mysqli_insert_id($link);


                    }else{

                         $error = "<p> Could not sign you up- Please try again ";
                    }
                }
            }		

        }else if($_POST['sign'] == '0'){


            $query = "SELECT * FROM `diary` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'LIMIT 1";

            $result = mysqli_query($link, $query); 
            $row = mysqli_fetch_array($result);

            if(isset($row)){
                echo $row['id']."<br>";
                echo md5(md5($row['id']).$_POST['password']);

                $codedPassword = md5(md5($row['id']).$_POST['password']);

                if($codedPassword == $row['password']){

                    $_SESSION['id'] = $row['id'];

                        if(isset($_POST['stayloggedin']) AND $_POST['stayloggedin'] == '1'){

                            setcookie('id', mysqli_insert_id($link), time() + 60*60*24*365 );

                        }

                        header("Location: loggedinpage.php");
                }else{

                     $error = "<p> Invalid Password or Email id..</p> ";
                }
            }else{

                     $error = "<p> Invalid Password or Email id..</p> ";
            }

        }else if($_POST['sign'] == '2'){


                $query = "SELECT `id` FROM `diary` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'LIMIT 1";

                        $result = mysqli_query($link, $query);

                        if(mysqli_num_rows($result) > 0){

                            $row = mysqli_fetch_array($result);
                            $id = $row['id'];
                    
                            $query = "UPDATE `diary` SET password = '". md5(md5($id).$_POST['password'])."' WHERE id = '".$id."' LIMIT 1";

                            if(mysqli_query($link, $query)){

                                $success = "<p>password change successful please log in your account.</p>";
                            }

                        }else{

                            $error = "<p>Email does't exist..please sign up</p>";
                        }

            }

        }		


}


?>



<!DOCTYPE html>
<html>
<head>
<title></title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="jquery.min.js"></script>	

</head>
<body>

<div class="container col-md-6" id="header">
    <div id="heading">
        <h1 class="display-4">Invest Today for Tomorrow</h1>
    </div>

    <div id="error" >

        <?php 
            if($error != ""){
                echo "<div id='error' class='alert alert-danger' role='alert'><strong>".$error."</strong></div>" ;
            }else if($success !=""){
                echo "<div id='error' class='alert alert-success' role='alert'><strong>".$success."</strong></div>" ;	
            }
        ?>		

    </div>

    <div id="signUp">	
            <small id="emailHelp" class="form-text text-muted">Intrested ? Please sign up</small>
            <form method="post">
                  <div class="form-group">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>

                  <div class="form-group">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" minlength="6" placeholder="Password">
                  </div>

                  <div class="form-group">
                    <input type="password" name="ConfirmPassword" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
                  </div>
                  <input type="hidden" name="sign" value="1" >
                  <button type="submit" name="submit" class="btn btn-success">Sign Up</button>
            </form>
            <p><b>Already registered </b></h1><a href="#" class="clickLogIn"> Log in</a></p>
    </div>

    <div id="logIn">	
            <small id="emailHelp" class="form-text text-muted">Please Log in</small>
            <form method="post">
                  <div class="form-group">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>

                  <div class="form-group">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" minlength="6" placeholder="Password">
                  </div>

                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" name="stayloggedin" value="1" class="form-check-input">
                      Remember me
                    </label>
                  </div>
                  <input type="hidden" name="sign" value="0" >
                  <button type="submit" name="submit" class="btn btn-success">Log In</button>
            </form>

            <p><a href="#" id="changePassword"> Forget password</a></p>
            <br>
            <p><b>Interested! Sign up now </b></h1><a href="#" class="clickLogIn"> Sign up</a></p>

    </div>
    <div id="forgetpassword">
            <small id="emailHelp" class="form-text text-muted">Forget password</small>		
            <form method="post" >
                  <div class="form-group">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                   </div> 
                   <div class="form-group">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" minlength="6" placeholder="New Password">
                  </div>
                  <input type="hidden" name="sign" value="2" >
                  <button type="submit" name="forgetSubmit" class="btn btn-success">Submit</button>
            </form>	
    </div>				
</div>


<script src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
$("#signUp").toggle();
        $("#logIn").toggle();


    $(".clickLogIn").click(function(){

        $("#signUp").toggle();
        $("#logIn").toggle();

    })

    $("#changePassword").click(function(){

        $("#logIn").toggle();
        $("#forgetpassword").toggle();

    })

</script>

</body>
</html>
