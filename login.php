<?php
//include("config.php");
if(isset($_POST['email'])){
    $email= $_POST['email'];
    $password= $_POST['passward'];
    $con= new mysqli('localhost', 'root','','user');
    if ($con){
        echo 'Connection successful';
    }else{
        echo 'Connection failed';
    }
    $password = md5($password);
    echo $sql= "SELECT * from users where email='$email' and password='$password'";
    $row = $con->query($sql);

    $res = $row->fetch_assoc();
    print_r($res);
    if(!empty($res)){
        if($res["email"] == $email) header("Location:registration.php");
    }else{
        echo "Failed to login";
    }
}
?>
<link rel="stylesheet" type="text/css" href="styles1.css">
<div class="loginWrap">
    <div class="login-wrap">
        <div class="login-html rounded">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <form action="" class="login-form" method="POST">

                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" type="text" name="email" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" name="passward" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign In">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                              <a href="#forgot">Forgot Password?</a><br>
                                <a href="registration.php" style="font-size: 12px; padding: 10px;">New To MATRIX/ Register Here</a><br>
                        </div>
                        <center>Terms and conditions apply</center>

                    </div>


            </form>
    </div>
    </div>
</div>
