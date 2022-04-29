<html>
        <head>
            <title>
                User Registration
            </title>
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="style.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>
        <body>
            <div>
                <?php
                    if(isset($_POST['create'])){
                        include('config.php');
                        $firstname      = $_POST['firstname'];
                        $lastname       = $_POST['lastname'];
                        $email          = $_POST['email'];
                        $phonenumber    = $_POST['phonenumber'];
                        $password       = md5($_POST['password']);

                        $sql = "INSERT INTO users(firstname, lastname, email, phonenumber, password) VALUES('$firstname','$lastname','$email','$phonenumber','$password')";
                        $result = mysqli_query($con,$sql);
                        if($result){
                            echo 'Successfully saved';
                        }else{
                            echo 'There were error in saving the details';
                        }

                    }
                if(!empty($res)){
                    if($res["email"] == $email) header("Location:index2.html");
                }else{
                    echo "Failed to login";
                }
                ?>
            </div>

            <section id="nav-bar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="#bottom">
                        <div class="navbar-header" font face="cursive">
                            <h2>MATRIX <i class="fa fa-tv"></i></h2>
                        </div>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link"style="color: azure" href="#top">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"style="color: azure" href="index2.html">ABOUT US</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"style="color: azure" href="index2.html">TESTIMONIALS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"style="color: azure" href="index2.html">Our Team</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"style="color: azure" href="index2.html">CONTACT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"style="color: azure" href="index2.html">COURSES</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </section>

            <form action="registration.php" method="POST">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <h1>Registration</h1>
                                    <p>Fill Up The Form With Correct Values</p>
                                         <hr class="mb-3">
                                     <label for="firstname"><b>First Name</b>:</label>
                                     <input class="form-control" id="firstname" type="text" name="firstname" required>

                                      <label for="lastname"><b>Last Name</b>:</label>
                                      <input  class="form-control" id="lastname" type="text" name="lastname" required>

                                      <label for="email"><b>Email Address</b>:</label>
                                      <input class="form-control" id="email" type="email" name="email" required>

                                      <label for="phonenumber"><b>Phone No.</b>:</label>
                                      <input class="form-control" id="phonenumber" type="number" name="phonenumber" required>

                                      <label for="password"><b>Password</b>:</label>
                                      <input class="form-control" id="password" type="password" name="password" required>
                                          <hr class="mb-3">
                                      <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
                            </div>
                        </div>
                    </div>
                </form>

        </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            <script type="text/javascript">
                $(function(){
                    $('#register').click(function(e){

                        if (valid) {

                            var valid = this.form.checkValidity();
                            var firstname    = $('#firstname').val();
                            var lastname     = $('#lastname').val();
                            var email        = $('#email').val();
                            var phonenumber  = $('#phonenumber').val();
                            var password     = $('#password').val();

                            e.preventDefault();
                            $.ajax({
                               type: 'POST',
                                url: 'process.php',
                                data: {firstname: firstname, lastname: lastname, email: email, phonenumber: phonenumber, password: password}
                                success: function(data){
                                    Swal.fire({
                                        title: 'Success',
                                        text: 'Successfuly Registered',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    })
                                },
                                error: function(data){
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'There is error while registering',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    })
                                }
                            });
                            alert('True');
                        }else {
                            alert('False');
                        }

                    });

                });
            </script>
        </body>
    </html>
