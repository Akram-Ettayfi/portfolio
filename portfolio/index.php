
 <?php
require "dashbord/database.php";
//  


$db = Database::connect();
$sql = "SELECT * FROM `projets` ORDER BY id  DESC LIMIT 3";
$stmt = $db->query($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
Database::disconnect();

?> 





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <title>Portfolio responsive complete</title>
</head>

<body>
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

    <main class="l-main">
        <!--===== HOME =====-->
        <section class="home" id="home">
            <div class="home__container bd-grid">
                <h1 class="home__title"><span>HE</span><br>LLO.</h1>

                <div class="home__scroll">
                    <a href="#about" class="home__scroll-link"><i class='bx bx-up-arrow-alt' ></i>Scroll down</a>
                </div>

                <img src="assets/img/akram.jpg" alt="" class="home__img">
            </div>
        </section>

        <!--===== ABOUT =====-->
        <section class="about section" id="about">
            <h2 class="section-title">About</h2>

            <div class="about__container bd-grid">
                <div class="about__img">
                    <img src="assets/img/akram.jpg" alt="">
                </div>

                <div>
                    <h2 class="about__subtitle">I'am Akram Ettayfi</h2>
                    <span class="about__profession">Web designer</span>
                    <p class="about__text">I am an ambitious person who has developed a mature and responsible approach to any task I undertake based on the situation I am facing. As a graduate with two years of experience in web development, I acquired an excellent level in project management with the agile method. I also got used to working in a team in order to achieve a certain goal with excellence.</p>

                    <div class="about__social">
                        <a href="https://www.linkedin.com/in/akram-ettayfi-4959b8199/" class="about__social-icon"><i class='bx bxl-linkedin' ></i></a>
                        <a href="https://github.com/Akram-Ettayfi" class="about__social-icon"><i class='bx bxl-github' ></i></a>
                        <a href="https://www.facebook.com/akram.ettayfi.58/" class="about__social-icon"><i class='bx bxl-facebook' ></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!--===== SKILLS =====-->
        <section class="skills section" id="skills">
            <h2 class="section-title">Skills</h2>

            <div class="skills__container bd-grid">
                <div class="skills__box">
                    <h3 class="skills__subtitle">Development</h3>
                    <span class="skills__name">Html</span>
                    <span class="skills__name">Css</span>
                    <span class="skills__name">Javascript</span>
                    <span class="skills__name">Scss</span>
                    <span class="skills__name">React</span>
                    <span class="skills__name">Vue</span>

                    <h3 class="skills__subtitle">Design</h3>
                    <span class="skills__name">Figma</span>
                    <span class="skills__name">Adobe XD</span>
                    <span class="skills__name">Photoshop</span>
                </div>

                <div class="skills__img">
                    <img src="assets/img/skill.jpg" alt="">
                </div>
            </div>
        </section>

        <!--===== PORTFOLIO =====-->
        <section class="portfolio section" id="portfolio">
            <h2 class="section-title">Portfolio</h2>

            <div class="portfolio__container bd-grid">
            <?php foreach ($rows as $row) : ?>

                <div class="portfolio__img">
                <form action="show.php" method="GET">
                <a href="#">
                    <img src="dashbord/img/<?= $row['imgprojet'] ?>" alt="'<?= $row['nomprojet'] ?>'">
                    <div class="portfolio__link">

                    <button id="butt" type="submit">
                    <h3> <?= $row['nomprojet'] ?></h3>
                    <br>
                    <input type="hidden" name="projet" value="<?= $row['id'] ?>">
                        <!-- <a href="#" class="portfolio__link-name">View details</a> -->
                        </a>
                       </button>
            
                    </div>
                </form>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!--===== CONTACT =====-->
        <section class="contact section" id="contact">
            <h2 class="section-title">Contact</h2>

            <div class="contact__container bd-grid">
                <div class="contact__info">
                    <h3 class="contact__subtitle">EMAIL</h3>
                    <span class="contact__text">akramettayfi@gmail.com</span>

                    <h3 class="contact__subtitle">PHONE</h3>
                    <span class="contact__text">+212 698-880222</span>

                    <h3 class="contact__subtitle">ADRESS</h3>
                    <span class="contact__text">Qu Laghdir N°35 YOUSSOUFIA</span>
                </div>

                <form action="sendmail.php" method="POST" class="contact__form">
                    <div class="contact__inputs">
                        <input type="text" placeholder="Name"  name="object" class="contact__input">
                        <input type="mail" placeholder="Email" name="useremail" class="contact__input">
                    </div>

                    <textarea name="Message" id="" cols="0" rows="10" class="contact__input"></textarea>

                    <input type="submit" value="Envoyer" class="contact__button">
                </form>
            </div>
        </section>
    </main>

    <!--===== FOOTER =====-->
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

    <!--===== SCROLL REVEAL =====-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--===== MAIN JS =====-->
    <script src="assets/js/main.js"></script>
</body>

</html>