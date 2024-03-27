<?php
require './config/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SportX</title>
    <link rel="stylesheet" href="css/style.css" />
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Playfair:ital,wght@1,500&display=swap" rel="stylesheet" /> -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" /> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <link rel="shortcut icon" href="./assets/logo sportX-2.png">
</head>

<body>
    <section class="header header-inicio">
        <img src="./assets/logo sportX-2.png" alt="">
        <nav class="nav-inicio">
            <div class="nav-links nav-links-2" id="navlinks">
                <div class="dropdown">
                    <ul>
                        <!-- <li class="text-primary"><a href="inicio.php">HOME</a></li> -->
                        <li class="dropdown soccer"><a href="./products-pages/soccer.php">Soccer</a>
                            <div class="dropdown-content ver-1">
                                <ul>
                                    <div class="parte-izquierda">
                                        <li><a class="temas" href="./products-pages/soccer.php#-s">Footwear</a></li>
                                        <li class="subtemas"><a href="./products-pages/soccer.php#footwear-man-s">Man</a></li>
                                        <li class="subtemas"><a href="./products-pages/soccer.php#footwear-woman-s">Woman</a></li>
                                        <li class="subtemas"><a href="./products-pages/soccer.php#footwear-kids-s">Kids</a></li>
                                        <li><a class="temas" href="./products-pages/soccer.php#jerseys-s">Jerseys</a></li>
                                        <li class="subtemas"><a href="./products-pages/soccer.php#jerseys-man-s">Man</a></li>
                                        <li class="subtemas"><a href="./products-pages/soccer.php#jerseys-woman-s">Woman</a></li>
                                        <li class="subtemas"><a href="./products-pages/soccer.php#jerseys-kids-s">Kids</a></li>
                                    </div>
                                    <div class="parte-derecha">
                                        <li><a class="temas" href="./products-pages/soccer.php#bottom-s">Bottoms</a></li>
                                        <li class="subtemas"><a href="./products-pages/soccer.php#bottom-man-s">Man</a></li>
                                        <li class="subtemas"><a href="./products-pages/soccer.php#bottom-woman-s">Woman</a></li>
                                        <li class="subtemas"><a href="./products-pages/soccer.php#bottom-kids-s">Kids</a></li>
                                        <li><a class="temas" href="./products-pages/soccer.php#balls-s">Balls</a></li>
                                        <li><a class="temas" href="./products-pages/soccer.php#accessories-s">Accessories</a></li>
                                    </div>
                                    <!-- <li><a href="#"></a></li> -->
                                </ul>
                                <div class="imagen-dropdown-soccer-1">
                                    <div class="imagen-soccer-1">
                                        <img src="./assets/futbol/tacos-1.0.jpeg" alt="">
                                        <img src="./assets/futbol/tacos-2.0.webp" alt="">
                                    </div>
                                    <div class="imagen-soccer-2">
                                        <img src="./assets/futbol/jersey-cabecera.webp" alt="">
                                        <img src="./assets/futbol/jersey-cabecera-espalda.webp" alt="">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown basketball"><a href="./products-pages/basket.php">Basketball</a>
                            <div class="dropdown-content ver-2">
                                <ul>
                                    <div class="parte-izquierda">
                                        <li><a class="temas" href=="./products-pages/basketball.php#footwear-b">Footwear</a></li>
                                        <li class="subtemas"><a href=="./products-pages/basketball.php#footwear-man-b">Man</a></li>
                                        <li class="subtemas"><a href=="./products-pages/basketball.php#footwear-woman-b">Woman</a></li>
                                        <li class="subtemas"><a href=="./products-pages/basketball.php#footwear-kids-b">Kids</a></li>
                                        <li><a class="temas" href=="./products-pages/basketball.php#jerseys-b">Jerseys</a></li>
                                        <li class="subtemas"><a href=="./products-pages/basketball.php#jerseys-man-b">Man</a></li>
                                        <li class="subtemas"><a href=="./products-pages/basketball.php#jerseys-woman-b">Woman</a></li>
                                        <li class="subtemas"><a href=="./products-pages/basketball.php#jerseys-kids-b">Kids</a></li>
                                    </div>
                                    <div class="parte-derecha">
                                        <li><a class="temas" href=="./products-pages/basketball.php#bottoms-b">Bottoms</a></li>
                                        <li class="subtemas"><a href=="./products-pages/basketball.php#bottoms-man-b">Man</a></li>
                                        <li class="subtemas"><a href=="./products-pages/basketball.php#bottoms-woman-b">Woman</a></li>
                                        <li class="subtemas"><a href=="./products-pages/basketball.php#bottom-kids-b">Kids</a></li>
                                        <li><a class="temas" href="./products-pages/basketball.php#balls-b"">Balls</a></li>
                                        <li><a class=" temas" href=="./products-pagesbasketballr.php#balls-b">Accesories</a></li>
                                    </div>
                                </ul>
                                <div class="imagen-dropdown-soccer-1 imagen-dropdown-basket-1">
                                    <div class="imagen-soccer-1">
                                        <img src="./assets/futbol/jordan-2.1.webp" alt="">
                                        <img src="./assets/futbol/jordan-2.webp" alt="">
                                    </div>
                                    <div class="imagen-soccer-2 imagen-basket-2">
                                        <img src="./assets/futbol/jersey-basket-1.webp" alt="">
                                        <img src="./assets/futbol/jersey-basket-2.webp" alt="">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown tennis"><a href="./products-pages/tennis.php">Tennis</a>
                            <div class="dropdown-content ver-3">
                                <ul>
                                    <div class="parte-izquierda">
                                        <li><a class="temas" href="./products-pages/tennis.php#footwear-t">Footwear</a></li>
                                        <li class="subtemas"><a href="./products-pages/tennis.php#footwear-man-t">Man</a></li>
                                        <li class="subtemas"><a href="./products-pages/tennis.php#footwear-woman-t">Woman</a></li>
                                        <li class="subtemas"><a href="./products-pages/tennis.php#footwear-kids-t">Kids</a></li>
                                        <li><a class="temas" href="./products-pages/tennis.php#clothes-t">Clothes</a></li>
                                        <li class="subtemas"><a href="./products-pages/tennis.php#clothes-man-t">Man</a></li>
                                        <li class="subtemas"><a href="./products-pages/tennis.php#clothes-woman-t">Woman</a></li>
                                        <li class="subtemas"><a href="./products-pages/tennis.php#clothes-kids-t">Kids</a></li>
                                    </div>
                                    <div class="parte-derecha">
                                        <li><a class="temas" href="./products-pages/tennis.php#rackets-t">Rackets</a></li>
                                        <li class="subtemas"><a href="./products-pages/tennis.php#rackets-adult-t">Adults</a></li>
                                        <li class="subtemas"><a href="./products-pages/tennis.php#rackets-kids-t">Kids</a></li>
                                        <li><a class="temas" href="./products-pages/tennis.php#balls-t">Balls</a></li>
                                        <li><a class="temas" href="./products-pages/tennis.php#accessories-t">Accessories</a></li>
                                    </div>
                                </ul>
                                <div class="imagen-dropdown-soccer-1 imagen-dropdown-tennis-1">
                                    <div class="imagen-soccer-1">
                                        <img src="./assets/futbol/raqueta-1.webp" alt="">
                                        <img src="./assets/futbol/raqueta-2.webp" alt="">
                                    </div>
                                    <div class="imagen-soccer-2">
                                        <img src="./assets/futbol/mochila-tenis-2.1.webp" alt="">
                                        <img src="./assets/futbol/mochila-tenis-1.webp" alt="">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown swimming"><a href="./products-pages/swimming.php">Swimming</a>
                            <div class="dropdown-content ver-4">
                                <ul>
                                    <div class="parte-izquierda">
                                        <li><a class="temas" href="./products-pages/swimming.php#footwear-sw">Footwear</a></li>
                                        <li class="subtemas"><a href="./products-pages/swimming.php#footwear-man-sw">Man</a></li>
                                        <li class="subtemas"><a href="./products-pages/swimming.php#footwear-woman-sw">Woman</a></li>
                                        <li class="subtemas"><a href="./products-pages/swimming.php#footwear-kids-sw">Kids</a></li>
                                        <li><a class="temas" href="./products-pages/swimming.php#swimsuit-sw">Swimsuit</a></li>
                                        <li class="subtemas"><a href="./products-pages/swimming.php#swimsuit-man-sw">Man</a></li>
                                        <li class="subtemas"><a href="./products-pages/swimming.php#swimsuit-woman-sw">Woman</a></li>
                                        <li class="subtemas"><a href="./products-pages/swimming.php#swimsuit-kids-sw">Kids</a></li>
                                    </div>
                                    <div class="parte-derecha">
                                        <li><a class="temas" href="./products-pages/swimming.php#googles-sw">Googles</a></li>
                                        <li class="subtemas"><a href="./products-pages/swimming.php#googles-adult-sw">Adults</a></li>
                                        <li class="subtemas"><a href="./products-pages/swimming.php#googles-kids-sw">Kids</a></li>
                                        <li><a class="temas" href="./products-pages/swimming.php#accessories-sw">Accessories</a></li>
                                    </div>
                                </ul>
                                <div class="imagen-dropdown-soccer-1 imagen-dropdown-swimming-1">
                                    <div class="imagen-soccer-1">
                                        <img src="./assets/futbol/googles-1.webp" alt="">
                                        <img src="./assets/futbol/googles-2.webp" alt="">
                                    </div>
                                    <div class="imagen-soccer-2">
                                        <img src="./assets/futbol/traje-natacion-1.webp" alt="">
                                        <img src="./assets/futbol/traje-natacion-2.webp" alt="">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown baseball"><a href="./products-pages/baseball.php">Baseball</a>
                            <div class="dropdown-content ver-5">
                                <ul>
                                    <div class="parte-izquierda">
                                        <li><a class="temas" href="./products-pages/baseball.php#footwear-ba">Footwear</a></li>
                                        <li class="subtemas"><a href="./products-pages/baseball.php#footwear-man-ba">Man</a></li>
                                        <li class="subtemas"><a href="./products-pages/baseball.php#footwear-woman-ba">Woman</a></li>
                                        <li class="subtemas"><a href="./products-pages/baseball.php#footwear-kids-ba">Child</a></li>
                                        <li><a class="temas" href="./products-pages/baseball.php#jerseys-ba">Jerseys</a></li>
                                        <li class="subtemas"><a href="./products-pages/baseball.php#jerseys-man-ba">Man</a></li>
                                        <li class="subtemas"><a href="./products-pages/baseball.php#jerseys-woman-ba">Woman</a></li>
                                        <li class="subtemas"><a href="./products-pages/baseball.php#jerseys-kids-ba">Kids</a></li>
                                    </div>
                                    <div class="parte-derecha">
                                        <li><a class="temas" href="./products-pages/baseball.php#bats-ba">Bats</a></li>
                                        <li class="subtemas"><a href="./products-pages/baseball.php#bats-adults-ba">Adults</a></li>
                                        <li class="subtemas"><a href="./products-pages/baseball.php#bats-kids-ba">Kids</a></li>
                                        <li><a class="temas" href="./products-pages/baseball.php#balls-ba">Balls</a></li>
                                        <li><a class="temas" href="./products-pages/baseball.php#accessories-ba">Accesories</a></li>
                                    </div>
                                </ul>
                                <div class="imagen-dropdown-soccer-1 imagen-dropdown-baseball-1">
                                    <div class="imagen-soccer-1">
                                        <img src="./assets/futbol/jersey-beisbol-1.webp" alt="">
                                        <img src="./assets/futbol/jersey-beisbol-2.webp" alt="">
                                    </div>
                                    <div class="imagen-soccer-2">
                                        <img src="./assets/futbol/gorra-1.webp" alt="">
                                        <img src="./assets/futbol/gorra-2.webp" alt="">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown football"><a href="./products-pages/football.php">Football</a>
                            <div class="dropdown-content ver-6">
                                <ul>
                                    <div class="parte-izquierda">
                                        <li><a class="temas" href="./products-pages/football.php#footwear-f">Footwear</a></li>
                                        <li class="subtemas"><a href="./products-pages/football.php#footwear-man-f">Man</a></li>
                                        <li class="subtemas"><a href="./products-pages/football.php#footwear-woman-f">Woman</a></li>
                                        <li class="subtemas"><a href="./products-pages/football.php#footwear-kids-f">Kids</a></li>
                                        <li><a class="temas" href="./products-pages/football.php#jerseys-f">Jerseys</a></li>
                                        <li class="subtemas"><a href="./products-pages/football.php#jerseys-man-f">Man</a></li>
                                        <li class="subtemas"><a href="./products-pages/football.php#jerseys-woman-f">Woman</a></li>
                                        <li class="subtemas"><a href="./products-pages/football.php#jerseys-kids-f">Kids</a></li>
                                    </div>
                                    <div class="parte-derecha">
                                        <li><a class="temas" href="./products-pages/football.php#bottom-f">Bottoms</a></li>
                                        <li class="subtemas"><a href="./products-pages/football.php#bottom-man-f">Man</a></li>
                                        <li class="subtemas"><a href="./products-pages/football.php#bottom-woman-f">Woman</a></li>
                                        <li class="subtemas"><a href="./products-pages/football.php#bottom-kids-f">Kids</a></li>
                                        <li><a class="temas" href="./products-pages/football.php#balls-f">Balls</a></li>
                                        <li><a class="temas" href="./products-pages/football.php#protections-f">Accesories</a></li>
                                        <li class="subtemas"><a href="./products-pages/football.php#protections-adult-f">Adults</a></li>
                                        <li class="subtemas"><a href="./products-pages/football.php#protections-kids-f">Kids</a></li>
                                        <li><a class="temas" href="./products-pages/football.php#accessories -f">Accesories</a></li>
                                    </div>
                                </ul>
                                <div class="imagen-dropdown-soccer-1 imagen-dropdown-football-1">
                                    <div class="imagen-soccer-1">
                                        <img src="./assets/futbol/jersey-futbol-americano-1.webp" alt="">
                                        <img src="./assets/futbol/jersey-futbol-americano-2.webp" alt="">
                                    </div>
                                    <div class="imagen-soccer-2">
                                        <img src="./assets/futbol/bufanda-1.webp" alt="">
                                        <img src="./assets/futbol/bufanda-2.webp" alt="">
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="iconos-cabecera iconos-cabecera-2">
                    <li><a href="#"><i class="bi bi-search"></i></li></a>
                    <?php
                    if (!empty($_SESSION["id"])) { ?>
                        <li><a href="./administrator/index.php"><i class="bi bi-person-circle"></i></li></a>
                        <li><a href="./config/logout.php"><i class="bi bi-box-arrow-right"></i></li></a>
                    <?php } ?>
                </div>
            </div>
            </div>
        </nav>
    </section>

    <script>
        // Función para ocultar el enlace
        function hideLink(e) {
            // Obtener el elemento <li> que se hizo clic
            const li = e.target;

            // Ocultar el enlace
            li.querySelector("a").style.display = "none";
        }

        // Asignar el evento onclick al elemento <li>
        document.querySelector(".subtemas").addEventListener("click", hideLink);

        function checkScrollAnimation() {
            const elements = document.querySelectorAll('.scroll-animation');
            elements.forEach((element) => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenHeight = window.innerHeight;
                if (elementPosition < screenHeight * 0.8) {
                    element.classList.add('animate');
                }
            });
        }

        // Ejecutar la función cuando se carga la página y se desplaza
        window.addEventListener('load', checkScrollAnimation);
        window.addEventListener('scroll', checkScrollAnimation);
    </script>