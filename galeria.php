<?php 
session_start(); 
include "header.php";
?>
<?php if(isset($_SESSION["usuarioNome"])): ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Editora Clamor</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link rel="shortcut icon" href="imag/logo1.png"/>  
   <link rel="stylesheet" href="galeria/style.css">
	<!-- My CSS -->
</head>
<body>
</header>
  
<main>
<br>
<br>
        <section class="recent">
         <div class="activity-grid">
          <div class="activity-card"> 
                <table>
                    <thead>                            
                    <main>
        <div class="gallery-container">
            <a href="#chick-hicks" class="gallery-items">
                <img src="imag/441954804_392863460391542_8981101261735246036_n.jpg" alt="Chick Hicks">
            </a>
            <a href="img/doctor hudson.jpg" class="gallery-items">
                <img src="imag/441291239_389239970753891_95913772145838666_n.jpg" alt="Doctor Hudson">
            </a>
            <a href="img/Fillmore.jpg" class="gallery-items">
                <img src="imag/321465098_697747088655773_2470840586456751141_n.jpg" alt="Fillmore">
            </a>
            <a href="img/flo.jpg" class="gallery-items">
                <img src="imag/347117463_193144653668335_299206564346406187_n.jpg" alt="Flo">
            </a>
            <a href="img/Guido.png" class="gallery-items">
                <img src="imag/361413845_1448082809312943_1986850793477701712_n.jpg" alt="Guido">
            </a>
            <a href="img/lightning-mcqueen.jpg" class="gallery-items">
                <img src="imag/392879160_361356153542273_667378413789145777_n.jpg" alt="lightning-mcqueen">
            </a>
            <a href="img/Lizzie.jpg" class="gallery-items">
                <img src="imag/417577423_361358193542069_8021374882069445925_n.jpg" alt="Lizzie">
            </a>
            <a href="img/Luigi.png" class="gallery-items">
                <img src="imag/417571082_361356363542252_3287393692038505459_n.jpg" alt="Luigi">
            </a>
            <a href="img/Mack.jpg" class="gallery-items">
                <img src="imag/418985513_361358626875359_4691478860748567892_n.jpg" alt="Mack">
            </a>
            <a href="img/Ramone.jpg" class="gallery-items">
                <img src="imag/419039150_362266746784547_2952245412800398980_n.jpg" alt="Ramone">
            </a>
            <a href="img/Ruivo.jpg" class="gallery-items">
                <img src="imag/420198595_361633886847833_7046646802944388593_n.jpg" alt="Ruivo">
            </a>
            <a href="img/Sally Carrera.jpg" class="gallery-items">
                <img src="imag/428147192_341539588857263_1965017890938854647_n.jpg" alt="Sally">
            </a>
            <a href="img/Sheriff.jpg" class="gallery-items">
                <img src="imag/438172700_394785113532710_1871002910401293641_n.jpg" alt="Sheriff">
            </a>
            <a href="img/sven.jpg" class="gallery-items">
                <img src="imag/441147131_394778670200021_1155212563870172043_n.jpg" alt="Sven">
            </a>
            <a href="img/The King.jpg" class="gallery-items">
                <img src="imag/441291239_389239970753891_95913772145838666_n.jpg" alt="The King">
            </a>
            <a href="img/Tow Mater.jpg" class="gallery-items">
                <img src="imag/123931149_3520089181384839_5843479097535344899_n.jpg" alt="Tow Mater">
            </a>
        </div>        
    </main>


<br>


<br>
<br>
<br>



                    
                    </thead>
                    
                </table>
           
            
        </section>


</main>

</div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
       <script src="js/custom_bilhete.js"></script>    

       <script>
        function toggleDropdown() {
            var dropdownMenu = document.querySelector('.dropdown-menu');
            dropdownMenu.classList.toggle('show');
        }

    </script>


</body> 
</html> 

<?php else: ?>
    <div class="alert alert-danger">
        Você não está logado no sistema.
            </div>   
<?php endif; ?>