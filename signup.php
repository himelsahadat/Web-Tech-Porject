<?php
include "db_conn1.php";
if(isset($_GET['signup']))
{
    $name=$_GET['name'];
    $email=$_GET['email'];
    $number=$_GET['number'];
    $pass=$_GET['pass'];

    $error = array();
    
    if (empty($name) || empty($email) || empty($number) || empty($pass)) {
        $error['pass2'] = "Fill all the input";
    }

    else{
        $sql1="INSERT INTO `project` (`NAME`, `EMAIL`, `NUMBER`, `PASS`) VALUES('$name','$email','$number','$pass')";
        mysqli_query($conn,$sql1);
        $error['pass1'] = "Account Create Succesfull";
    }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginstyle.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">

    <title>Document</title>
</head>

<body>
    <div class="container">
    
        <div class="form-box">
        <div class="p">
                <p><?php if(isset($error['pass2'])) echo $error['pass2']; ?></p>
                </div>
            <h1 id="title">Customer Sign Up</h1>
            <form  method="get" action="">
                <div class="input-group">

                
                <div class="input-field" id="nameField">
                <i class="fa-solid fa-user"></i>
                    <input type="text" name="name" placeholder="Enter Your Name"><br>
                </div>

                <div class="input-field">
                <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" placeholder="Enter Your Email"><br>
                </div>

                <div class="input-field" id="numField">
                <i class="fa-solid fa-phone"></i>
                    <input type="number" name="number" placeholder="Enter Your Number"><br>
                </div>

                <div class="input-field">
                <i class="fa-solid fa-lock"></i>
                    <input type="password" name="pass" placeholder="Password" id="myInput">
                    <span class="eye" onclick="myfunction()">
                    <i id="hide1" class="fa-solid fa-eye"></i>
                    <i id="hide2" class="fa-solid fa-eye-slash"></i>

                    </span>
                </div>

                <div class="p">
                <p><?php if(isset($error['pass1'])) echo $error['pass1']; ?></p>
                </div>
                
                <p >Already have account? <a href="signin.php">Click Here</a></p>
                
                <div class="btn-field">
                    <button type="submit" name="signup" id="signupbtn">Sign Up</button>
                    <button type="submit" name="signin" id="signinbtn" class="disable">
                        <a href="signin.php" class="dis">Sign In</a>
                    </button>
                  
                </div>
            </div>
            </form>
        </div>
    </div>

    <script>
 function myfunction(){
    let x = document.getElementById("myInput");
    let y = document.getElementById("hide1");
    let z = document.getElementById("hide2");

    if ( x.type === "password") {
        x.type ="text";
        y.style.display ="block";
        z.style.display ="none";
        
    }
    else{
        x.type = "password"
        y.style.display="none";
        z.style.display="block";
    }
 }

</script>

</body>
</html>