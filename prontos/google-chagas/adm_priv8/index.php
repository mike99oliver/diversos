<?php session_start(); ?>
<!DOCTYPE html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Login - ADMIN</title>
   <link rel="icon" href="./assets/icons/lock.png" type="image/png">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link rel="stylesheet" href="./assets/css/style.css">
   <link rel="stylesheet" href="./assets/css/loginform.css">
</head>
<body >
   <div id="particles-js" >
         <div class="animated bounceInDown">
            <div class="container">
               <form action="valida.php" method="post" name="form" class="box">
                  <h4><i class="fab fa-phoenix-framework"></i> Phoenix<span> Painel</span></h4>
                  <div>
                     <img class="currently-loading" src="./assets/icons/password.gif">
                  </div>
                  <input id="uname" type="text" name="nome" placeholder="Usuário" autocomplete="off">
                  <input id="pass" type="password" name="senha" placeholder="Senha" autocomplete="off">
                  <input type="submit" value="Entrar" class="btn1">
               </form>
            </div>
         </div>
   </div>
   <script src="./assets/js/particle.js"></script>
   <script src="./assets/js/script.js"></script>
</body>
</html>