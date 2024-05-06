<?php
include '../global/css/style.php';
$alert_message = '';
$alert_class = '';

if (isset($_GET['sucesso']) && $_GET['sucesso'] === "sucesso") {
    $alert_message = "  Cadastrado.";
    $alert_class = "alert-success ";
} elseif (isset($_GET['error']) && $_GET['error'] === "error") {
    $alert_message = "Essa cidade já está cadastrada.";
    $alert_class = "alert-danger ";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login_view.css">
</head>

<body>
    <?php if (!empty($alert_message)) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12" id="toast-menu-div" style="margin-top: -307px;">
                        <div class="toast-alert-div">
                            <div class="alert <?php echo $alert_class; ?> alert-dismissible fade show" role="alert">
                                <?php echo $alert_message; ?>
                                <button class="bin-button">
                                    <svg class="bin-top" viewBox="0 0 39 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line y1="5" x2="39" y2="5" stroke="white" stroke-width="4"></line>
                                        <line x1="12" y1="1.5" x2="26.0357" y2="1.5" stroke="white" stroke-width="3"></line>
                                    </svg>
                                    <svg class="bin-bottom" viewBox="0 0 33 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <mask id="path-1-inside-1_8_19" fill="white">
                                            <path d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z"></path>
                                        </mask>
                                        <path d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z" fill="white" mask="url(#path-1-inside-1_8_19)"></path>
                                        <path d="M12 6L12 29" stroke="white" stroke-width="4"></path>
                                        <path d="M21 6V29" stroke="white" stroke-width="4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            <div class="tela-de-login">
                <form class="form_main" action="login_verificacao.php" method="POST">
                    <p class="heading">Login</p>
                    <div class="inputContainer">
                        <svg viewBox="0 0 16 16" fill="#2e2e2e" height="16" width="16" xmlns="http://www.w3.org/2000/svg" class="inputIcon">
                            <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z">
                            </path>
                        </svg>
                        <input name="nickname" placeholder="Usuario" id="username" class="inputField" type="text" required>
                    </div>

                    <div class="inputContainer">
                        <svg viewBox="0 0 16 16" fill="#2e2e2e" height="16" width="16" xmlns="http://www.w3.org/2000/svg" class="inputIcon">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z">
                            </path>
                        </svg>
                        <input name="senha" placeholder="Senha" id="password" class="inputField" type="password" required>
                    </div>

                    <button id="button" type="submit" name="submit" value="Enviar">Entrar</button>

                    <div class="signupContainer">
                        <p>Não possuí conta?</p>
                        <a href="login_registro.php">Cadastre-se</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (document.cookie.indexOf("cookies_accepted=true") === -1) {
                var cookieNotice = document.getElementById("cookie-notice");
                if (cookieNotice) {
                    cookieNotice.style.display = "block";
                }
            }
        });


        document.addEventListener('DOMContentLoaded', function() {
            var binButtons = document.querySelectorAll('.bin-button');
            binButtons.forEach(function(binButton) {
                binButton.addEventListener('click', function() {
                    var toastMenuDiv = document.getElementById('toast-menu-div');
                    if (toastMenuDiv) {
                        toastMenuDiv.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>

</html>