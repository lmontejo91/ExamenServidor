<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        let last_connection = Date.now(); //time();
        let nav = navigator.appCodeName; //$_SERVER['HTTP_REFERER']
        let so = navigator.appVersion;
        let gps = navigator.geolocation;
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./styleCSS.css">
    <title>login</title>
</head>
<body>

    <?php

        $date = date("F j, Y, g:i a");

         //Create cookies
         setcookie("ultima_conexion", $date, time() + (86400 * 30));
         setcookie("navegador", $_SERVER['HTTP_USER_AGENT'], time() + (86400 * 30));
         setcookie("SO", "<script>so</script>", time() + (86400 * 30));
         setcookie("GPS", "<script>gps</script>", time() + (86400 * 30));

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "Entra";
            $_SESSION['userName'] = $_POST['userName'];
            $_SESSION['mail'] = $_POST['mail'];
            $_SESSION['contadorPreguntas']=0;
            $_SESSION['n_preguntas']=0;
            header('Location: ./principal.php');
        }

    ?>

    <p id="demo"></p>
    <section class="vh-100">
        <!-- DIV Contenedor -->
        <div class="container-fluid h-100 row d-flex justify-content-center align-items-center">
            
            <!-- DIV Formulario -->
            <div class="col-md-6 col-lg-5 col-xl-4 offset-xl-1 px-4 py-4 bg-light bg-opacity-75">
                <form name='form_login' id="form_login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="d-flex justify-content-center align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Register With Us</p>
                    </div>

                    <!-- UserName input -->
                    <div class="form-outline mb-4">
                        <label for="input_userName">Username</label>
                        <input type="text" name="userName" id="input_userName" minlength="3" class="form-control form-control-md"
                        placeholder="Enter username" title="Must be at least 3 characters"/>
                        <span class="error"></span>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label for="input_mail">Enter email</label>
                        <input type="email" name="mail" id="input_mail"  pattern="[a-z0-9._%+-]+@educa.madrid.org$" class="form-control form-control-md"
                        placeholder="Enter user name" title="Email is not be valid"/>
                        <span class="error"></span>
                    </div>

                    <!-- Password input -->
                    <!-- <div class="form-outline mb-3">
                        <label for="input_password">Enter Password</label>
                        <input type="password" id="input_password" name="password" minlength="6" class="form-control form-control-md"
                        placeholder="Enter password" title="Must be at least 6 characters"/>
                        <span class="error"></span>
                    </div> -->

                    <!-- Confirm Password input -->
                    <!-- <div class="form-outline mb-3">
                        <label for="input_confirmPassword">Confirm Password</label>
                        <input type="password" id="input_confirmPassword" name="confirm_password" minlength="6" class="form-control form-control-md"
                        placeholder="Enter password again" title="Password2 is required)"/>
                        <span class="error"></span>
                    </div> -->

                    <!-- Input Entrar (botón) -->
                    <div class="d-flex justify-content-center align-items-center text-center text-lg-start mt-4 pt-3">   
                        <input type='submit' id="boton_submit" value='Submit' name='evento_LogIn' class="btn btn-success btn-lg">
                    </div>
                </form>
            </div>
        </div>

        <!-- DIV Footer -->
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-dark">
            <!-- Copyright -->
            <div class="text-warning mb-3 mb-md-0">
            Copyright © 2020. All rights reserved.
            </div>
        </div>
    </section>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>

