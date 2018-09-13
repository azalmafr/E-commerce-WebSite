<?php
session_start();
include 'navBar.php';
include 'hostConnection.php';
//start a new session with user login 

if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $algo = "haval160,4";
    $hashedPass = hash($algo, $password);

    //See if the user exists
    $sql = "SELECT * FROM User WHERE Username='$username'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_num_rows($result);
    if ($row === 0) {
        echo  "<div class='row'><div class='col-md-12'>"
            . "<h2 class='message'>Sorry, we couldn't find a user with that name.</h2></div>"
            . "<div class='col-md-12 link'>"
            . "<a href='newUser.php' class='message'><h3>Create a new account</h3></a>"
            . "</div></div>";
    } else { //if they do exists, make sure the username and password match the hashed password
        $sql = "SELECT * FROM User WHERE Username='$username' and Password = '$hashedPass'";
        $res = mysqli_query($con, $sql);
        $row = mysqli_num_rows($res);
        if ($row === 0) {
//If the username and password were not returned the password is incorrect
            echo "<div class='row'><div class='col-md-12'>"
            . "<h2 class='message>The username or password is incorrect.</div>"
            . "</h2></div>";
        } else {
            //register the username with the session and set session variable
            $_SESSION['login_user'] = $username;
            //redirect to the welcome page. 
            echo "<h1 class='text-center'>Welcome $username! Click on products to start shopping now!</h1>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ACME company</title>
        <link rel="stylesheet" type="text/css" href="acme.css">
        <script>

            function back() {
                window.history.back();
            }

            function hide() {
               document.getElementById("myDIV").style.display = "none";
               
                }
            }

        </script>
    </head>
    <body>

        <div id="myDIV" onsubmit="hide()">
            <h1 class='message' id="banner">Login to your Acme Account</h1>
            <h4 class='message smallStuff' id="littleBanner">Login to begin shopping now!</h4>
        
        <!--LOGIN FORM-->
        <div class="form-group" id="loginDiv">
            <form class="form-horizontal" method="post" name="loginForm" id="loginForm" onsubmit="hide()">
                <!--USERNAME-->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="username">Username:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
                    </div>
                </div>
                <!--PASSWORD-->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pass">Password:</label>
                    <div class="col-sm-6"> 
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                    </div>
                </div>
                <!--SUBMIT BUTTON-->
                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-6">
                        <button type="submit" class="btn btn-default" id="submit" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        </div>
    </body>
</html>



