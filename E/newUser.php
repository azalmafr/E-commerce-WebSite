<?php
include 'navBar.php';
include 'hostConnection.php';
//IF THE SUBMIT BUTTON WAS PRESSED = TRUE
if (isset($_POST['submitButton'])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordConfirm = $_POST["confirmPass"];
    $algo = "haval160,4";

    //CHECK IF USER ALREADY EXISTS 
    $sql = "SELECT * FROM User WHERE Username='$username'";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        echo"Error: " . mysqli_error($con);
    }
    $row = mysqli_fetch_row($result);
    //SHOULD RETURN ZERO ROWS IF USER DOESN'T EXIST
    //PROVIDE A TRY AGAIN BUTTON AND A LOGIN BUTTON
    if ($row > 0) {
        echo("<h2 class='message'>" . $username . " already exists.</h2>");
        echo("<button class='btn btn-default' id='tryAgain' onclick='back()'>Try Again</button>");
    } else {
        //MAKE SURE PASSWORD & CONFIRM PASSWORD MATCH. 
        if ($password == $passwordConfirm) {
            //HASH THE PASSWORD USING THE ALGORITHM
            $hashedPass = hash($algo, $password);
            if (!$hashedPass) {
                echo"<h3 class='message'>The password was not hashed</h3>";
            }
            $sql = "INSERT INTO User (Username, Password) VALUES ('$username','$hashedPass')";
            $result = mysqli_query($con, $sql);

            //INSERT THE NEW USER AND HASHED PASSWORD INTO THE  DATABASE;
            if ($result) {
                echo "<h1 class='message'>Thank you for registering, $username!</h1>";
            } else {
                echo "<h1 class='message' style='color: red'>There was an Error: </h1>\n" . "<h3>" . mysqli_error($con) . "</h3>";
            }
        } else {
            echo"<h2 class='message'>The passwords you entered don't match. Please try again.</h2>";
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

            function hideForm() {
                var form = document.getElementById("newUserForm");
                form.style.display = "none";
            }
            
        </script>
    </head>
    <body>
        <h1 class='message'>Create a new account</h1>
        <h4 class='message smallStuff'><span class='message'>Pick a username and a password to begin.</span></h4>
        <!--NEW USER FORM-->
        <div class="form-group" id="newUserForm">
            <form class="form-horizontal" action="" method="post">
                <!--USERNAME-->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="user">Username</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="user" placeholder="New Username" name="username">
                    </div>
                </div>
                <!--PASSWORD-->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Password:</label>
                    <div class="col-sm-8"> 
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                    </div>
                </div>
                <!--CONFIRM PASSWORD-->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
                    <div class="col-sm-8"> 
                        <input type="password" class="form-control" id="password" placeholder="Confirm Password" name="confirmPass">
                    </div>
                </div>
                <!--SUBMIT BUTTON-->
                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" name="submitButton" id="submit" onclick="hideForm()">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>