
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
                <p class="description description-primary"></p>
                <p class="description description-primary">Já tem uma conta? </p>
                <br>
                <a href="login.php" class="btn btn-primary">Iniciar Sessão</a>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Preencha o formulário</h2>
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
                <p class="description">Por favor! Preencha os dados correctamente. </p>

                <div class="error-container"></div>

                <p class="description description-second"></p>
                <form class="form" method="post" action="abrirConta.php">
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" name="nome" id="nome" placeholder="Nome">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email" id="email" placeholder="Email">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" id="senha" placeholder="Senha">
                    </label>
                    
                    
                    <button type="submit" name="cadUsuario" class="btn btn-second">cadastrar</button>        
                </form>
            </div><!-- second column -->
        </div><!-- first content -->
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".form");

    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Impede o envio do formulário padrão

        // Captura os valores dos campos de nome, email e senha
        const nome = document.getElementById("nome").value;
        const email = document.getElementById("email").value;
        const senha = document.getElementById("senha").value;

        // Cria um objeto FormData para enviar os dados do formulário para o PHP
        const formData = new FormData();
        formData.append("nome", nome);
        formData.append("email", email);
        formData.append("senha", senha);

        // Envia a requisição AJAX para o PHP
        fetch("abrirConta.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Verifica o status da resposta
            if (data.status === "success") {
                // Exibe uma mensagem de sucesso usando SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 7000 // 5 segundos
                }).then(function() {
                    // Redireciona para a página de início de sessão
                    window.location.href = 'login.php';
                });
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

<script>
    // Função para ocultar as mensagens após trinta segundos
    setTimeout(function() {
        var messages = document.querySelectorAll('.alert-success, .alert-danger');
        messages.forEach(function(message) {
            message.style.display = 'none';
        });
    }, 5000); // 5 segundos
</script>
<script>
        // Verificar se há uma mensagem de sucesso após o cadastro
        var successMessage = document.querySelector('.alert-success');
        
        // Se houver uma mensagem de sucesso
        if (successMessage) {
            // Aguardar 3 segundos e redirecionar para a página de início de sessão
            setTimeout(function() {
                window.location.href = 'login.php';
            }, 3000); // Tempo em milissegundos (3 segundos)
        }
    </script>
</body>
</html>