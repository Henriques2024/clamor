<?php 
session_start(); 
include_once "conexao.php";

?>
<?php if(isset($_SESSION["usuarioNome"]) && isset($_SESSION["usuarioId"])): ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editora Clamor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="css/hader.css">
    <link rel="stylesheet" href="css/noticias.css">
    <link rel="stylesheet" href="css/objectivos.css">
    <link rel="stylesheet" href="css/autores_locais.css">
    
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
    /* Estilos responsivos */
    @media (max-width: 991.98px) {
      .navbar-nav {
        flex-direction: column;
        align-items: flex-start;
      }

      .navbar-nav .nav-item {
        margin-right: 0;
        margin-bottom: 1rem;
      }

      .navbar-nav .nav-link {
        padding: 0.5rem 0;
      }

      .navbar-nav.ml-auto {
        margin-left: 0 !important;
      }
    }

  body {
    padding-top: 100px; /* Ajuste conforme necessário para evitar sobreposição do conteúdo */
  }
</style>

<style>
  .espaço {
      margin-left: 15px;
    }
    /* Estilo para o nome do usuário */
    .user-nome i {
      font-weight: bold !important;
      color: #007bff !important; /* Cor personalizada para o nome do usuário */
    }
    .navbar-custom .btn-link {
      text-decoration: none; /* Remove o sublinhado */
    }
</style>

<style>
    /* Estilos personalizados */
    .navbar {
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand, .nav-link {
      color: #333 !important;
    }

    .nav-link:hover {
      color: #666 !important;
    }

    .dropdown-menu {
      border: none;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .dropdown-item {
      padding: 0.5rem 1.5rem;
    }

    /* Estilos responsivos */
    @media (max-width: 991.98px) {
      .navbar-nav {
        flex-direction: column;
        align-items: flex-start;
      }

      .navbar-nav .nav-item {
        margin-right: 0;
        margin-bottom: 1rem;
      }

      .navbar-nav .nav-link {
        padding: 0.5rem 0;
      }

      .navbar-nav.ml-auto {
        margin-left: 0 !important;
      }
    }

    /* Adicionar espaço entre o título e os links */
    .navbar .container {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .navbar-brand {
      margin-right: 9rem;
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

  </style>
  <style>
  .user-dropdown {
  margin-right: 20px; /* Ajuste o valor conforme necessário */
}
  </style>
  </head>

<body>



<div class="container-fluid navbar-text-container">
  <div class="row">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center mb-0">
        <div class="navbar-text" style="margin-left: 20px; font-family: Arial, sans-serif; font-size: 14px;">Contacto: (+244) 923 135 314</div>
        <div class="navbar-text" style="font-family: Arial, sans-serif; font-size: 14px;">Endereço: Bié-Cuito</div>
        <div style="margin-right: 140px;">
          <a href="https://web.facebook.com/profile.php?id=100090036720471" class="text-white me-4"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-white me-4"><i class="fab fa-google"></i></a>
          <a href="#" class="text-white"><i class="fab fa-whatsapp"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container-fluid">
    <a class="navbar-brand" href="basico.php"> 
      <img src="imag/444470576_409037425440812_464115363682772636_n.jpg" style="width: 40px;" alt="Logo da Editora Clamor"> Editora Clamor
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav" style="gap: 20px;">
        <li class="nav-item">
          <a class="nav-link" onclick="scrollToElement('quemsomos')"><i class="fas fa-users"></i> Sobre Nós</a>
        </li>
        <li class="nav-item dropdown" id="dropdownLiteratura">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLiteratura" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-book"></i> Literatura
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownLiteratura">
            <li><a class="dropdown-item" href="autores_locais.php"> <i class="fas fa-user"></i> Autores Locais</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-globe"></i> Autores Nacionais</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-comment-alt"></i> Crítica Literária</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-newspaper"></i> Revistas/Artigos</a></li>
          </ul>
        </li>   
        <li class="nav-item dropdown" id="DropdownServicos">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownServicos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-tools"></i> Serviços
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownServicos">
            <li><a class="dropdown-item" href="#"><i class="fas fa-user-graduate"></i> Mentoria Literária</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-chalkboard-teacher"></i> Cursos</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-book-open"></i> Edição de Livro</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-spell-check"></i> Revisão Linguística</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-tools"></i> Diagramação</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="galeria.php"><i class="fas fa-images"></i> Galeria</a>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown user-dropdown">
          <a class="nav-link dropdown-toggle user-nome" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user"></i> <?= $_SESSION["usuarioNome"]; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"> Email: <?= $_SESSION["usuarioEmail"]; ?></a>
            <li><hr class="dropdown-divider"></li>
            <li class="d-flex align-items-center justify-content-center">
              <li><a class="dropdown-item" href="sair.php">
                <i class="fas fa-sign-out-alt"></i> Terminar Sessão</a>
              </li>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>

<div class="container">
    <nav aria-label="breadcrumb" class="my-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Autores Locais</li>
        </ol>
    </nav>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card">
                <a href="livros_locais.php">
                <img src="imag/adelino_chicomo.jpg" class="card-img-top img-fluid" alt="Foto do Autor">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Adelino Chicomo</h5>
                    <p class="card-text">
                        Adelino Chicomo é um escritor local, contando com uma obra literária intitulada O Pódio.
                        <a href="#" class="btn btn-link btn-sm read-more" data-index="1">Ver Mais</a>
                    </p>
                    <div class="more-content" id="more-content-1">Sua obra retrata a grandeza escondida por cada ser humano.<br>
                        <a href="#" class="btn btn-link btn-sm read-less" data-index="1">Ver Menos</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card">
                <a href="livros_locais.php">
                <img src="imag/muxima_do_assobio.jpg" class="card-img-top img-fluid" alt="Foto do Autor">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Muxima do Assobio</h5>
                    <p class="card-text">
                        Muxima do Assobio é um escritor local que se destaca por suas poesias.
                        <a href="#" class="btn btn-link btn-sm read-more" data-index="2">Ver Mais</a>
                    </p>
                    <div class="more-content" id="more-content-2">que retratam a vida cotidiana da nossa cidade.<br>
                        <a href="#" class="btn btn-link btn-sm read-less" data-index="2">Ver Menos</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card">
                <a href="livros_locais.php">
                <img src="imag/silvestre.jpg" class="card-img-top img-fluid" alt="Foto do Autor">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Silvestre Sanjúlia</h5>
                    <p class="card-text">
                        Silvestre Sanjúlia é um autor local que escreve principalmente sobre a história e a cultura.
                        <a href="#" class="btn btn-link btn-sm read-more" data-index="3">Ver Mais</a>
                    </p>
                    <div class="more-content" id="more-content-3">da nossa região.<br>
                        <a href="#" class="btn btn-link btn-sm read-less" data-index="3">Ver Menos</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card">
                <a href="livros_locais.php">
                <img src="https://via.placeholder.com/300x150" class="card-img-top img-fluid" alt="Foto do Autor">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Ana Souza</h5>
                    <p class="card-text">
                        Ana é uma autora local que se destaca por seus romances históricos.
                        <a href="#" class="btn btn-link btn-sm read-more" data-index="4">Ver Mais</a>
                    </p>
                    <div class="more-content" id="more-content-4">ambientados na nossa região. Seus livros são muito populares entre os leitores.<br>
                        <a href="#" class="btn btn-link btn-sm read-less" data-index="4">Ver Menos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--====== QUEM SOMOS PART END ======-->

<?php 
include_once "footer.php"; 

?>

    <br> 

  

<!--====== FOOTER PART START ======-->

	<!--====== FOOTER PART ENDS ======-->
</main>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

  <script>
   document.querySelectorAll('.read-more').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const index = this.getAttribute('data-index');
            document.getElementById(`more-content-${index}`).style.display = 'block';
            this.style.display = 'none';
        });
    });

    document.querySelectorAll('.read-less').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const index = this.getAttribute('data-index');
            document.getElementById(`more-content-${index}`).style.display = 'none';
            document.querySelector(`.read-more[data-index="${index}"]`).style.display = 'inline';
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

<?php else: ?>
    <div class="alert alert-danger">
        Você não está logado no sistema.
            </div>   
<?php endif; ?>

