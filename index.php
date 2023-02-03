<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title id="titulo">Pasantias DAE</title>
    <link rel="icon" href="img/icono.png">

    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta name="theme-color" content="#7952b3">

    <!-- CDN jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <link rel="stylesheet" media="all" href="css/style.css">
    <style>@import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Libre+Baskerville:ital@1&family=Ms+Madi&family=Oswald&family=Source+Sans+Pro&family=Source+Serif+Pro&family=Stint+Ultra+Condensed&display=swap');</style>
    <link href="css/animaciones.css" rel="stylesheet">
</head>

<!-- Estilos -->
<style>
    @media (max-width: 800px) {
        body {
            padding: 0;
        }
        .content {
            width: 85%;
        }
        .btn-ingresar {
            width: 7rem !important;
        }
    }
</style>

<body class="text-center" style="background: rgb(105,148,163);
  background: linear-gradient(0deg, rgba(105,148,163,1) 28%, rgba(117,159,182,1) 44%, rgba(161,213,231,1) 98%);">

<!--CARTA-->
<div class="content" style="box-shadow: 0 0 10px gray; border-radius: 30px;">

    <main class="form-signin">
        <form id="loginform" method="post">
            <img class="mb-6" src="img/logo-sin-fondo.png" width="90" height="50">
            
            <h1 class="h3 mb-3 fw-normal" style="color:#000; margin-top: 15px; margin-bottom: 30px !important; font-family: Oswald;">Dirección de Educación y Asuntos Universitarios</h1>

            <div class="form-floating font-family-oswald">
                <input type="email" class="form-control" autocomplete="off" style="background-color:#F8F8F8;" id="username" name="username" placeholder="name@example.com">
                <label for="floatingInput">Correo electrónico</label>
            </div>
            <div class="form-floating font-family-oswald">
                <input type="password" class="form-control" autocomplete="off" style="background-color:#F8F8F8;" id="password" name="password" placeholder="Password">
                <label for="floatingPassword">Contraseña</label>
            </div>
            <div id="resp"></div>
            <br>

            <button id="btn" class="w-50 btn btn-lg text-white font-family-oswald boton-modelo zoom btn-ingresar" 
            type="submit">Ingresar</button>
            
            <p class="mt-4 mb-3 text-muted;" style="font-family: Oswald;">&copy; 2023</p>
        </form>
    </main>

</div>

    <script>
    $(document).ready(function() {
        $('#loginform').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'php/logins.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    //console.log(response);
                    var jsonData = JSON.parse(response);
                    console.log(jsonData);
                    // user is logged in successfully in the back-end
                    // let's redirect
                    //console.log("jsonData");

                    if(jsonData.success == "0"){
                    	Swal.fire({
                            text: 'Correo electrónico o Contraseña Incorrecta',
                            confirmButtonText: 'Aceptar',
                            confirmButtonColor: '#286E86',
                            width: '50%'
                    	});
                    	
                    	document.getElementById("username").value = "";
                    	document.getElementById("password").value = "";
                    }

                    if (jsonData.success == "1"){
                        let timerInterval

                        Swal.fire({
                            title: '¡Bienvenido!',
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                        willClose: () => {
                            clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                                document.location.href="dashboard.php";
                            }
                        });
                    }

                    if(jsonData.success == "2"){
                    	Swal.fire({
                            text: 'Todos los campos son requeridos',
                            confirmButtonText: 'Aceptar',
                            confirmButtonColor: '#286E86',
                            width: '50%'
                    	});
                    	
                    	document.getElementById("username").value = "";
                    	document.getElementById("password").value = "";
                    }
               },
               error: function(xhr, status) {
                document.getElementById("resp").innerHTML = 'No connect to server';
                //console.log(xhr);
                },
           });
         });
    });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>