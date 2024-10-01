<?php 
session_start(); 
include_once "conexao.php";
include "header.php";
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
  <title>Formulário de Três Etapas</title>
 
  <style>
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #fff; /* Cor cinza do texto */
    background-color: #007bff; /* Cor cinza do fundo */
    border-color: #007bff; /* Cor cinza da borda */
    }

    .containerin {
    max-width: 1000px; /* Defina a largura máxima desejada */
    margin: 0px auto; /* Centralize o elemento na página */
    border: 1px solid #ced4da; /* Cor da borda */
    border-radius: 5px; /* Raio da borda */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.4); /* Sombra */
    padding: 25px; /* Espaçamento interno */

}
.bg-custom-image {
    background-image: url('imag/.jpg'); /* Substitua pelo caminho da sua imagem */
    background-size: cover; /* Ajusta o tamanho da imagem para cobrir todo o contêiner */
    background-position: center; /* Centraliza a imagem horizontalmente e verticalmente */
    background-repeat: no-repeat; /* Evita a repetição da imagem */
}

.bg-custom-color {
    background-color: #f0f0f0; /* Substitua #f0f0f0 pela cor desejada */
}
.inputI {
    display: block;
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ccc;
    border-radius: 0.25rem;
    margin-bottom: 10px;
}

  </style>
</head>
<body>
<br> <br> <br> <br> <br>

<div class="containerin bg-custom-image">
    <ul class="nav nav-tabs nav-fill">
        <li class="nav-item">
            <a class="nav-link active" href="#step1">Dados do Passageiro</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#step2">Revisão dos Dados</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#step3">Comprovativo de Pagamento</a>
        </li>
    </ul>
    
    <form method="POST" id="formulario" enctype="multipart/form-data" action="consulta3.php" class="form-adm bg-custom-color">
    <div class="tab-content">
        <!-- Etapa 1: Dados do Passageiro -->
        <div id="step1" class="tab-pane fade show active">
            <div class="card">
                <div class="card-body">
                  <div id="formStep1">
                    <br>    
                    <div class="form-row row bg-custom-color">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome:</label>
                            
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" required>
                            <div class="invalid-feedback" id="nomeError" style="display: none;">Campo obrigatório, preencha o Nome.</div>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="nome">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                            <div class="invalid-feedback" id="emailError" style="display: none;">Campo obrigatório, selecione o email.</div>
                        </div>
                        
                    </div>
                    <br> 
                    <h6>Nota: Certifique-se de que já descarregou o comprovativo bancário (<span style="color:red">MulticaixaExpress/BAI Direct</span>) para anexar e fazer a reserva.</h6>
                   
                    <button type="button" class="btn btn-primary next">Próximo</button>
                  </div>
                </div>
            </div>
        </div>
        
        <!-- Etapa 2: Revisão dos Dados -->
        <div id="step2" class="tab-pane fade">
            <div class="card">
                <div class="card-body">
                    <div id="dadosRevisao"></div>
                    <br>
                    <div id="precoRevisao" style="display: none;">
                      </div>
                    <button type="button" class="btn btn-secondary prev">Anterior</button>
                    <button type="button" class="btn btn-primary next">Próximo</button>
                </div>
            </div>
        </div>
        
        <!-- Etapa 3: Validar Comprovativo de Pagamento -->
        <div id="step3" class="tab-pane fade">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="comprovativo" class="col-sm-10 col-form-label">Comprovativo de Pagamento:</label>
                        <div class="col-sm-20">
                            <input type="file" name="comprovativo" accept="application/pdf" class="form-control" id="comprovativo" required>
                        </div>
                    </div>
                    <br>
                    <button type="button" class="btn btn-secondary prev">Anterior</button>
                    <button type="submit" class="btn btn-primary" value="comprovativo">Validar</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script>

$(document).ready(function(){
    var currentStep = 1;
    // Manipuladores de eventos para ocultar mensagens de erro quando os campos são preenchidos
    $("#formStep1 input, #formStep1 select").change(function() {
        var fieldId = $(this).attr('id') + 'Error';
        $("#" + fieldId).hide(); // Oculta a mensagem de erro para o campo atual
    });
    $(".next").click(function(){
        if (currentStep < 3 && validateStep(currentStep)) {
            $(".invalid-feedback").hide(); // Oculta todas as mensagens de erro se estiverem sendo exibidas
            currentStep++;
            updateStep();
        }
    });
    $(".prev").click(function(){
        if (currentStep > 1) {
            currentStep--;
            updateStep();
        }
    });

    function updateStep() {
        $(".nav-link").removeClass("active");
        $(".nav-link").eq(currentStep - 1).addClass("active");

        $(".tab-pane").removeClass("show active");
        $("#step" + currentStep).addClass("show active");

        if (currentStep === 2) {
            var nome = $("#nome").val();
            var email = $("#email").val();
                    
            // Adicione outros campos conforme necessário
            var dadosRevisaoHtml = "<h3></h3>";
            dadosRevisaoHtml += "<p><strong>Nome:</strong> " + nome + "</p>";
            dadosRevisaoHtml += "<p><strong>Email:</strong> " + email + "</p>";     
            // Adicione outros campos conforme necessário
            $("#dadosRevisao").html(dadosRevisaoHtml);
        }
    }
    function validateStep(step) {
        var isValid = true;
        if (step === 1) {
            $("#formStep1 input[required], #formStep1 select[required]").each(function(){
                if (!$(this).val()) {
                    isValid = false;
                    var fieldId = $(this).attr('id') + 'Error';
                    $("#" + fieldId).show(); // Exibe a mensagem de erro para o campo atual
                }
            });
        }
        return isValid;
    }
});

</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 // Capturando o formulário
var formPagamento = document.getElementById('formulario');

// Adicionando um evento de submissão ao formulário
formPagamento.addEventListener('submit', function(event) {
    // Prevenir o comportamento padrão do formulário
    event.preventDefault();

    // Mostrar mensagem de carregamento enquanto a solicitação é processada
    Swal.fire({
        title: 'Validando',
        html: '<i class="fas fa-spinner fa-spin fa-3x"></i>',
        allowOutsideClick: false,
        showConfirmButton: false, // Remover o botão OK
        showCancelButton: false, // Remover o botão Cancelar
        onBeforeOpen: () => {
            Swal.showLoading();
        }
    });

    // Enviar o formulário usando Fetch API
    fetch('consulta3.php', {
            method: 'POST',
            body: new FormData(formPagamento)
        })
        .then(response => response.json()) // Convertendo a resposta para JSON
        .then(data => {
            // Fechar o SweetAlert de carregamento
            Swal.close();

            if (data.status === 'success') {
                // Se a inserção no banco de dados for bem-sucedida, mostrar SweetAlert de sucesso
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: data.msg // Utiliza a mensagem retornada do backend
                }).then((result) => {
                    // Após o usuário clicar em "OK", redirecionar para listar_bilhete.php
                    if (result.isConfirmed || result.isDismissed) {
                        window.location.href = 'index.php';
                    }
                });
            } 
        })
        .catch(error => {
            // Em caso de erro, mostrar SweetAlert com mensagem de erro genérica
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'Ocorreu um erro ao processar sua solicitação.'
            });
            console.error('Erro:', error);
        })
        .finally(() => {
            // Esconder a mensagem após 3 segundos, independentemente do resultado
            setTimeout(() => {
                Swal.close();
            }, 5000); // 3000 milissegundos = 3 segundos
        });
});

</script>


</body>
</html>

