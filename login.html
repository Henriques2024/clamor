<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editora Clamor</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<style>
        .error-container {
            color: red;
            margin-top: 10px;
        }
    </style>

<body>
<div class="container">
    <div class="content first-content">
        <div class="first-column">
            <h2 class="title title-primary">EDITORA CLAMOR</h2>
            <p class="description description-primary">Fique conectado</p>
            <p class="description description-primary">Por favor, faça o Login para ter acesso aos outros serviços.</p>
        </div>
        <div class="second-column">
            <h2 class="title title-second">Inicie Sessão</h2>
            <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-facebook-f"></i>        
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-linkedin-in"></i>
                            </li>
                        </a>
                    </ul>
                </div><!-- social media -->
            <div class="error-container"></div>
            
            <p class="description description-second"></p>
            <form class="form" method="post" action="valida.php">
                <label for="email" class="label-input">
                    <i class="fas fa-user icon-modify"></i>
                    <input type="email" name="email" id="email" class="form-control" placeholder=" Email">
                </label>
                <label class="label-input" for="senha">
                    <i class="fas fa-lock icon-modify"></i>
                    <input type="password" name="senha" id="senha" placeholder=" Palavra-passe">
                </label>
                <div class="cadas">
                    Não está cadastrado?
                <a class="password" href="Cadastro_usuario.php"> Clique Aqui!</a>
                </div>
                <label class="password" for="lk">
                    <a id="linka" class="password" href="recuperar_senha.php">Esqueci a palavra-passe </a>
                </label>
                <button type="submit" name="cadvalida" class="btn btn-second">Entrar</button>
            </form>
        </div><!-- second column -->
    </div><!-- first content -->
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector(".form");
        form.addEventListener("submit", function(event) {
            event.preventDefault(); // Impede o envio do formulário padrão
            
            // Captura os valores dos campos de e-mail e senha
            const email = document.getElementById("email").value;
            const senha = document.getElementById("senha").value;
            
            // Cria um objeto FormData para enviar os dados do formulário para o PHP
            const formData = new FormData();
            formData.append("email", email);
            formData.append("senha", senha);
            
            // Envia a requisição AJAX para o PHP
            fetch("valida.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Verifica o status da resposta
                if (data.status === "success") {
                    // Redireciona para a página apropriada
                    window.location.href = data.redirect;
                } else if (data.status === "error") {
                    // Exibe a mensagem de erro no formulário
                    const errorMessage = document.querySelector(".error-container");
                    errorMessage.textContent = data.message;
                }
            })
            .catch(error => {
                console.error("Ocorreu um erro ao processar a solicitação:", error);
            });
        });
    });
</script>

</body>
</html>
