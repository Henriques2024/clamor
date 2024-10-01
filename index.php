<?php 
session_start(); 
include_once "header.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editora Clamor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/noticias.css">
    <link rel="stylesheet" href="css/objectivos.css">
    <link rel="stylesheet" href="css/upgrade.css">

    <style>
      /* Estilo personalizado para ajustar o tamanho do carrossel */
      .half-height-carousel {
            height: 50vh; /* Define a altura do carrossel como 50% da altura da tela */
        }

        .carousel-item img {
            height: 500px; /* Reduz a altura das imagens dentro dos itens do carrossel */
            object-fit: cover; /* Garante que as imagens mantenham suas proporções ao redimensionar */
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.0); /* Adiciona um fundo escuro semi-transparente para legibilidade do texto */
            color: #fff; /* Cor do texto */
            border-radius: 5px; /* Borda arredondada */
            padding: 20px; /* Espaçamento interno */
            position: absolute; /* Posicionamento absoluto para sobrepor a imagem */
            bottom: 0; /* Alinha a legenda na parte inferior */
            right: 0; /* Alinha a legenda à direita */
            top: 50%; /* Alinha a legenda na parte superior */
            left: 50%; /* Alinha a legenda à esquerda */
            transform: translate(-50%, -50%); /* Centraliza vertical e horizontalmente */
       
        }

        .carousel-caption h2 {
            font-size: 32px; /* Tamanho da fonte do título */
            margin-bottom: 10px; /* Espaçamento inferior do título */
        }

        .carousel-caption p {
            font-size: 20px; /* Tamanho da fonte do texto */
            margin-bottom: 20px; /* Espaçamento inferior do texto */
        }

        .carousel-caption .main-btn {
            background-color: #084B8A; /* Cor de fundo do botão */
            color: #fff; /* Cor do texto do botão */
            padding: 10px 25px; /* Espaçamento interno do botão */
            border-radius: 5px; /* Borda arredondada do botão */
            text-decoration: none; /* Remove o sublinhado padrão */
        }
        .vertical-center {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
</style>
<style>
        .frase {
            text-align: right;
            margin-right: 20px;
        }

        .frase .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .frase .card h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .frase .card p {
            font-size: 18px;
            color: #555;
        }
    </style>
<style>
  .navbar-text-container {
    position: fixed;
    top: 0;
    width: 100%;
    background-color: #333; /* Ajuste conforme necessário */
    color: white;
    z-index: 1030;
    padding: 5px 0;
  }

  .navbar-custom {
    position: fixed;
    top: 50px; /* Ajuste conforme necessário */
    width: 100%;
    z-index: 1020;
    background-color: #FFFFFF; /* Ajuste conforme necessário */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
  }

  body {
    padding-top: 100px; /* Ajuste conforme necessário para evitar sobreposição do conteúdo */
  }
</style>

<style>
    .footer {
      background-color: #333;
      color: #fff;
      padding: 20px 0;
    }
    .footer a {
        color: #007bff; /* Azul */
      text-decoration: none;
    }
    .footer a:hover {
      color: #fff;
      text-decoration: underline;
    }
    .footer img {
      max-width: 100px;
      display: block;
      margin: 0 auto;
    }
    .footer .contact-info {
      margin-bottom: 10px;
    }
    .footer .subscription-form {
      margin-top: 20px;
    }
    .footer .copyright {
      text-align: center;
      margin-top: 10px;
      border-top: 1px solid #444;
      padding-top: 10px;
    }
  </style>

<style>
    .card-title {
      font-size: 1.5rem;
    }
    .card-price {
      font-size: 2rem;
      margin: 20px 0;
    }
    .card {
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
  </style>
  </head>

<body>



<br>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div id="meuCarrossel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="imag/estudando-9.jpg" class="d-block w-100" alt="Imagem 1">
            <div class="carousel-caption d-none d-md-block text-center">
              <div style="background-color: rgba(0, 0, 0, 0.2); display: inline-block; padding: 10px; border-radius: 10px;">
                <h2>Bem-vindo ao nosso portal</h2>
                <p>"A minha palavra é o meu tesouro"</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img src="imag/livro_concurso1.jpg" class="d-block w-100" alt="Imagem 2">
            <div class="carousel-caption d-none d-md-block text-center">
              <div style="background-color: rgba(0, 0, 0, 0.2); display: inline-block; padding: 10px; border-radius: 10px;">
                <h2>Concurso Literário Escolar</h2>
                <p>Inscrições abertas</p>
                <a class="btn btn-outline-primary" href="#" data-bs-toggle="modal" data-bs-target="#inscrevaModal">Inscreva-se</a>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#meuCarrossel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#meuCarrossel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Próximo</span>
        </button>
      </div>
    </div>
  </div>
</div>

<br>
    <main>
<br> <br> 


 <section>

 <div class="container">
    <div class="row">
        <!-- Carrossel de Horários de Viagem -->
        <div class="col-lg-6 order-lg-2">
            <div id="palavrasCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card">
                            <div class="card-header"><h3>Curiosidade</h3></div>
                            <div class="card-body">
                             <p>... um dos primeiros e mais influentes críticos 
                                  literários conhecidos é Aristóteles, 
                                  um filósofo grego que viveu no século IV a.C. <br> <br>
                                Obra: A Poética.</p>
                            </div>
                        </div>
                    </div>
                    </div>
                <a class="carousel-control-prev" href="#palavrasCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#palavrasCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próxima</span>
                </a>
            </div>
        </div>

        <!-- Card com Preços de Cada Classe -->
        <div class="col-lg-6 order-lg-1">
        <div class="frase">
        <div class="card">
       
            <h3>Frase do Dia</h3>
            <p>"A vida é o que acontece enquanto você está ocupado fazendo outros planos." - John Lennon</p>
        </div>
   
        
        
    </div>
</div>

  
  </div>
</div>
<br> <br> <br> 
<div id="livrosdestaque" class="container">
  <h4>LIVROS EM DESTAQUE</h4>
  <hr>  
  <br>
  <div class="row">
    
    <!-- Coluna para o primeiro livro -->
    <div class="col-lg-3 col-md-6 mb-4 text-center">
      <img src="imag/337557694_3539779186347226_7501324818524018132_n.jpg" class="img-fluid shadow" alt="Livro 1" width="194">
      <h6 class="mt-2">O Pódio</h6>
    </div>
    
    <!-- Coluna para o segundo livro -->
    <div class="col-lg-3 col-md-6 mb-4 text-center">
      <img src="imag/enviesadarosa.jpg" class="img-fluid shadow" alt="Livro 2" width="200">
      <h6 class="mt-2">Enviesada Rosa</h6>
    </div>
    
    <!-- Coluna para o terceiro livro -->
    <div class="col-lg-3 col-md-6 mb-4 text-center">
      <img src="imag/317809940_1772446466456458_22781536594591358_n.jpg" class="img-fluid shadow" alt="Livro 3" width="165">
      <h6 class="mt-2">Dose de Caos</h6>
    </div>
    
    <!-- Coluna para o quarto livro -->
    <div class="col-lg-3 col-md-6 mb-4 text-center">
      <img src="imag/337557694_3539779186347226_7501324818524018132_n.jpg" class="img-fluid shadow" alt="Livro 4" width="200">
      <h6 class="mt-2">O Pódio</h6>
    </div>
    
  </div>
</div>

<div id="quemsomos" style="margin: 10px;">
  <section class="">
    <div class="container mt-5">
        <div class="card shadow-lg border-primary"> <!-- Adiciona sombra com 'shadow-lg' e borda azul com 'border-primary' -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <h2 class="mb-4" style="font-size: 20px; text-align:justify; font-family:'Arial', sans-serif"></h2>
                <p style="font-size: 22px; text-align:justify; font-family:'Arial', sans-serif;  line-height: 1.5;">
                 <br> <br> Somos uma empresa de prestação de serviço, com a missão de dar voz a novas 
                  perspectivas e incentivar a diversidade literária, 
                  temos nos dedicado a descobrir e promover talentos emergentes, 
                  bem como a publicação de obras que desafiam e enriquecem o panorama literário.</p>
                            </div>
              <div class="col-md-6">
                <img src="imag/abertura_oficial.jpg" class="img-fluid" width="400">
              </div>
            </div>
          </div>
        </div>
      </div>
	</section>
  </div>

</section>
<br>
<br>
<br> 


 <section class="features-section pt-100 pb-50 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="features-title text-center mb-50">
                        <h3 class="heading-1 font-weight-700">NOSSOS SERVIÇOS</h3>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature-wrapper">
                        <div class="feature-icon">
                        <i class="fas fa-book-open fs-4"></i> <!-- Ícone de Smartphone --> <!-- Ícone de Telefone -->

                        </div>
                        <div class="feature-content">
                            <h5 class="heading-5 font-weight-500 mb-10">Edição de Livro</h5>
                            <p>é um tipo de telefone celular avançado que oferece funcionalidades
                               além das tradicionais. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature-wrapper">
                        <div class="feature-icon">
                        <i class="fas fa-spell-check fs-4"></i> <!-- Ícone de Computador -->

                        </div>
                        <div class="feature-content">
                            <h5 class="heading-5 font-weight-500 mb-10">Revisão Literária</h5>
                            <p>Um laptop, também conhecido como notebook ou computador portátil.</p>
                        </div>
                    </div>
                </div>          
               
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature-wrapper">
                        <div class="feature-icon">
                        <i class="fas fa-pencil-ruler fs-4"></i> <!-- Ícone de Impressora -->

                        </div>
                        <div class="feature-content">
                            <h5 class="heading-5 font-weight-500 mb-10">Diagramação</h5>
                            <p>Sistema operativo desenvolvido pela empresa Microsoft</p>
                        </div>
                    </div>
                </div>
                
                
                
            </div>
        </div>
    </section>
<br> <br> 

  <div class="card-container">
    <div class="card_p">
    <div class="card-header"> Avançado</div>
    <div class="card_p-body">
      <div class="card-feature">Pacote Semanal </div>
      <div class="card-discount">0% DE DESCONTO</div>
      <div class="card-price">
        <span class="price">2.000 AKZ</span>
      </div>
      <div class="card-description">
        <ul>
           <li>Adesão à biblioteca virtual</li>
          
        </ul>
      </div>
      <a href="comprar.php">
      <button type="button" class="card-button">COMPRAR</button>
      </a>
    </div>
  </div>
  </div>
  
 
<br> <br>

<div class="container">
<h4>NOTÍCIAS</h4>
<hr>
<br>
  <section class="noticias">
    <div class="noticia">
      <img src="imag/BCC_Aje_Sul3.jpg" alt="Notícia 1">
        <h2></h2>
        <p>NO ÂMBITO DO PROJECTO BIÉ LÊ, BIÉ ESCREVE, A ASSOCIAÇÃO DE JOVENS ESCRITORES DO SUL INAUGUROU UMA BIBLIOTECA COMUNITÁRIA NA CIDADE DO CUITO, NO DIA 25 DE ABRIL DE 2024.</p>
      
     
    </div>
    <div class="noticia">
      <img src="imag/podio_adelino_chicomo.jpg" alt="Notícia 2">
        <h2></h2>
        <p>O ESCRITOR ADELINO CHICOMO, ESTREIA-SE NA LITERATURA COM A OBRA INTITULADA O PÓDIO, PUBLICADA NA SALA DE CONFERÊNCIAS DA MEDIATECA ABEL ABRAÃO.</p>
      
    </div>
    <!-- Adicione mais notícias conforme necessário -->
  </section>
</div>
 
<section class="welcome-area pt-60 pb-110">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="welcome-img">
						<img src="imag/393920576_777498407511078_318397203321371098_n.jpg" alt="" class="image">
						<img src="assets/images/about/dot-shape.svg" alt="" class="dot-shape">
					</div>
				</div>

      <br> <br> <br> <br>
  <div class="contar">
        <div class="cardo">
            <h2>Missão</h2>
            <p>Publicar livros que inspirem, eduquem e emocionem nossos leitores. 
              Valorizamos a originalidade e a qualidade literária.</p>
        </div>
        <div class="cardo">
            <h2>Visão</h2>
            <p>Ser reconhecida como uma referência no mundo editorial. 
             </p>
        </div>
        <div class="cardo">
            <h2>Valores</h2>
            <p>Diversidade; <br>Qualidade; <br> Inovação. </p>
        </div>
    </div>    
    </div>
   
		</div>
    
	</section>
	<!--====== WELCOME PART END ======-->
<br> <br> <br> <br> <hr>




<!--====== MODAL DE CANDIDATURA CONCURSO LITERÁRIO ======-->
<!-- Modal -->
<div class="modal fade" id="inscrevaModal" tabindex="-1" aria-labelledby="inscrevaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inscrevaModalLabel">Inscreva-se</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Conteúdo do formulário de inscrição -->
        <form>
          <div class="row mb-3">
            <div class="col">
              <label for="nomeCompleto" class="form-label">Nome Completo</label>
              <input type="text" class="form-control" id="nomeCompleto" required>
            </div>
            <div class="col">
              <label for="pseudonimo" class="form-label">Pseudónimo</label>
              <input type="text" class="form-control" id="pseudonimo" required>
            </div>
          </div>
          <div class="row mb-3">
          <div class="col">
            <label for="tituloObra" class="form-label">Título da Obra</label>
            <input type="text" class="form-control" id="tituloObra" required>
          </div>
          <div class="col">
            <label for="instituicao" class="form-label">Instituição de Ensino</label>
            <input type="text" class="form-control" id="instituicao" required>
          </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="dataNascimento" class="form-label">Data de Nascimento</label>
              <input type="date" class="form-control" id="dataNascimento" required>
            </div>
            <div class="col">
              <label for="telefone" class="form-label">Telefone</label>
              <input type="tel" class="form-control" id="telefone" required>
            </div>
          </div>
           <div class="mb-3">
            
              <label for="dataNascimento" class="form-label">Submeta o livro</label>
              <input type="file" class="form-control" id="dataNascimento" required>
            </div>
          <button type="submit" class="btn btn-primary">Submeter</button>
        </form>
      </div>
    </div>
  </div>
</div>




<div class="quemsomos">
   
  </div>

<!--====== QUEM SOMOS PART END ======-->

<?php 
include_once "footer.php"; 

?>

    <br> 

  

<!--====== FOOTER PART START ======-->

	<!--====== FOOTER PART ENDS ======-->
</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
            } else {
                if (data.msg === 'Nenhum assento disponível na classe no momento.') {
                    // Exibir a mensagem de erro no formulário
                    $('#classeError').text(data.msg).show();
                } else {
                    // Se houver algum erro, mostrar SweetAlert com mensagem de erro
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: data.msg // Utiliza a mensagem retornada do backend
                    });
                }
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
<script>
    // Função para rolar para um elemento na página
    function scrollToElement(elementId) {
      const element = document.getElementById(elementId);
      if (element) {
        element.scrollIntoView({ behavior: "smooth" });
      }
    }
  </script>
<script>
$(document).ready(function() {
  $('#dropdownLiteratura').hover(function() {
    $(this).addClass('show');
    $('ul.dropdown-menu', this).addClass('show');
  }, function() {
    $(this).removeClass('show');
    $('ul.dropdown-menu', this).removeClass('show');
  });
});


$(document).ready(function() {
  $('#DropdownServicos').hover(function() {
    $(this).addClass('show');
    $('ul.dropdown-menu', this).addClass('show');
  }, function() {
    $(this).removeClass('show');
    $('ul.dropdown-menu', this).removeClass('show');
  });
});
</script>

</body>

</html>