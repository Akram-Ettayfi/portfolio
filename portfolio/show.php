<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <title>Portfolio responsive complete</title>
</head>
  <!--===== HEADER =====-->
  <header class="l-header">
        <nav class="nav bd-grid">
            <div>
                <a href="#" class="nav__logo">Akram Ettayfi</a>
            </div>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="#home" class="nav__link active">Home</a></li>
                    <li class="nav__item"><a href="#about" class="nav__link">About</a></li>
                    <li class="nav__item"><a href="#skills" class="nav__link">Skills</a></li>
                    <li class="nav__item"><a href="#portfolio" class="nav__link">Portfolio</a></li>
                    <li class="nav__item"><a href="#contact" class="nav__link">Contact</a></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

<!--/ Intro Single End /-->

<!--/ Property Single Star /-->
<?php
    
    $s = $_GET['projet'];


    require "dashbord/database.php";


$db = Database::connect();
$sql = "SELECT *  FROM projets WHERE id = $s";
$stmt = $db->query($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
Database::disconnect();
    // $c = "nomprojet";
    // $m = 'description';
// 
    ?>

    <?php foreach ($rows as $row) : ?>


<!-- Card -->
<div class="card card-cascade wider reverse">

  <!-- Card image -->
  <div class="view view-cascade overlay text-center">
    <img class="card-img-top" src="dashbord/img/<?= $row['imgprojet'] ?>"
    alt="'<?= $row['nomprojet'] ?>'">
    <a href="#!">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body card-body-cascade text-center">

    <!-- Title -->
    <h4 class="card-title"><strong> <?= $row['nomprojet'] ?></strong></h4>
    <!-- Subtitle -->
    <h6 class="font-weight-bold indigo-text py-2"> <?= $row['techno'] ?></h6>
    <!-- Text -->
    <p class="card-text"> <?= $row['description'] ?>
    </p>

    <!-- Linkedin -->
    <a href=" <?= $row['git'] ?>" class="px-2 fa-lg li-ic"><i class="fab fa-github"></i></a>
    <!-- Twitter -->
    
    <!-- Dribbble -->
    

  </div>

</div>
<!-- Card -->












<?php endforeach; ?>



   
      
<!--/ Property Single End /-->
<footer class="footer section">
        <div class="footer__container bd-grid">
            <div class="footer__data">
                <h2 class="footer__title">AKRAM ETTAYFI</h2>
                <p class="footer__text">I'm Akram Ettayfi and this is my personal website</p>
            </div>

            <div class="footer__data">
                <h2 class="footer__title">EXPLORE</h2>
                <ul>
                    <li><a href="#home" class="footer__link">Home</a></li>
                    <li><a href="#about" class="footer__link">About</a></li>
                    <li><a href="#skills" class="footer__link">Skills</a></li>
                    <li><a href="#portfolio" class="footer__link">Portfolio</a></li>
                    <li><a href="#Contact" class="footer__link">Contact</a></li>
                </ul>
            </div>

            <div class="footer__data">
                <h2 class="footer__title">FOLLOW</h2>
                <a href="#" class="footer__social"><i class='bx bxl-facebook' ></i></a>
                <a href="#" class="footer__social"><i class='bx bxl-instagram' ></i></a>
                <a href="#" class="footer__social"><i class='bx bxl-twitter' ></i></a>
            </div>


        </div>
    </footer>