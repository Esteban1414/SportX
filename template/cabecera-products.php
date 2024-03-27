<?php
require '../config/db.php';
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
    <section class="header header-inicio scroll-animation">
        <!-- <img class="scroll-animation" src="../assets/logo sportX-2.png" alt=""> -->
        <img class="scroll-animation img-cabecera" src="../assets/logo sportX-2.png" alt="">
        <nav class="nav-inicio">
            <div class="nav-links nav-links-2" id="navlinks">
                <div class="dropdown">
                    <ul class="links-cabecera">
                        <!-- <li class="text-primary"><a href="inicio.php">HOME</a></li> -->
                        <li class="dropdown soccer"><a href="../products-pages/soccer.php">Soccer</a>
                            <div class="dropdown-content ver-1">
                                <ul>
                                    <div class="parte-izquierda">
                                        <li class="temas"><a href="#footwear"></a>Footwear</li>
                                        <li class="subtemas"><a href="#footman">Man</a></li>
                                        <li class="subtemas"><a href="#footwoman">Woman</a></li>
                                        <li class="subtemas"><a href="#footkid">Kids</a></li>
                                        <li class="temas"><a href="#jerseys"></a>Jerseys</li>
                                        <li class="subtemas"><a href="#jerseysman">Man</a></li>
                                        <li class="subtemas"><a href="#jerseyswoman">Woman</a></li>
                                        <li class="subtemas"><a href="#jerseyskid">Kids</a></li>
                                    </div>
                                    <div class="parte-derecha">
                                        <li class="temas"><a href="#bottom"></a>Bottoms</li>
                                        <li class="subtemas"><a href="#bottoman">Man</a></li>
                                        <li class="subtemas"><a href="#bottowoman">Woman</a></li>
                                        <li class="subtemas"><a href="#bottomkid">Kids</a></li>
                                        <li class="temas"><a href="#balls"></a>Balls</li>
                                        <li class="temas"><a href="#accessories"></a>Accesories</li>
                                    </div>
                                    <!-- <li><a href="#"></a></li> -->.


                                </ul>
                                <div class="imagen-dropdown-soccer-1">
                                    <div class="imagen-soccer-1">
                                        <img src="../assets/futbol/tacos-1.0.jpeg" alt="">
                                        <img src="../assets/futbol/tacos-2.0.webp" alt="">
                                    </div>
                                    <div class="imagen-soccer-2">
                                        <img src="../assets/futbol/jersey-cabecera.webp" alt="">
                                        <img src="../assets/futbol/jersey-cabecera-espalda.webp" alt="">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown basketball"><a href="../products-pages/basket.php">Basketball</a>
                            <div class="dropdown-content ver-2">
                                <ul>
                                    <div class="parte-izquierda">
                                        <li class="temas"><a href="#footwear"></a>Footwear</li>
                                        <li class="subtemas"><a href="#footman">Man</a></li>
                                        <li class="subtemas"><a href="#footwoman">Woman</a></li>
                                        <li class="subtemas"><a href="#footkid">Kids</a></li>
                                        <li class="temas"><a href="#jerseys"></a>Jerseys</li>
                                        <li class="subtemas"><a href="#jerseysman">Man</a></li>
                                        <li class="subtemas"><a href="#jerseyswoman">Woman</a></li>
                                        <li class="subtemas"><a href="#jerseyskid">Kids</a></li>
                                    </div>
                                    <div class="parte-derecha">
                                        <li class="temas"><a href="#bottom"></a>Bottoms</li>
                                        <li class="subtemas"><a href="#bottoman">Man</a></li>
                                        <li class="subtemas"><a href="#bottowoman">Woman</a></li>
                                        <li class="subtemas"><a href="#bottomkid">Kids</a></li>
                                        <li class="temas"><a href="#balls"></a>Balls</li>
                                        <li class="temas"><a href="#accessories"></a>Accesories</li>
                                    </div>
                                </ul>
                                <div class="imagen-dropdown-soccer-1 imagen-dropdown-basket-1">
                                    <div class="imagen-soccer-1">
                                        <img src="../assets/futbol/jordan-2.1.webp" alt="">
                                        <img src="../assets/futbol/jordan-2.webp" alt="">
                                    </div>
                                    <div class="imagen-soccer-2 imagen-basket-2">
                                        <img src="../assets/futbol/jersey-basket-1.webp" alt="">
                                        <img src="../assets/futbol/jersey-basket-2.webp" alt="">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown tennis"><a href="../products-pages/tennis.php">Tennis</a>
                            <div class="dropdown-content ver-3">
                                <ul>
                                    <div class="parte-izquierda">
                                        <li class="temas"><a href="#footwear"></a>Footwear</li>
                                        <li class="subtemas"><a href="#footman">Man</a></li>
                                        <li class="subtemas"><a href="#footwoman">Woman</a></li>
                                        <li class="subtemas"><a href="#footkid">Kids</a></li>
                                        <li class="temas"><a href="#clothes"></a>Clothes</li>
                                        <li class="subtemas"><a href="#clothesman">Man</a></li>
                                        <li class="subtemas"><a href="#clotheswoman">Woman</a></li>
                                        <li class="subtemas"><a href="#clotheskid">Kids</a></li>
                                    </div>
                                    <div class="parte-derecha">
                                        <li class="temas"><a href="#rackets"></a>Rackets</li>
                                        <li class="subtemas"><a href="#racketsadult">Adults</a></li>
                                        <li class="subtemas"><a href="#racketskid">Kids</a></li>
                                        <li class="temas"><a href="#balls"></a>Balls</li>
                                        <li class="temas"><a href="#accessories"></a>Accessories</li>
                                    </div>
                                </ul>
                                <div class="imagen-dropdown-soccer-1 imagen-dropdown-tennis-1">
                                    <div class="imagen-soccer-1">
                                        <img src="../assets/futbol/raqueta-1.webp" alt="">
                                        <img src="../assets/futbol/raqueta-2.webp" alt="">
                                    </div>
                                    <div class="imagen-soccer-2">
                                        <img src="../assets/futbol/mochila-tenis-2.1.webp" alt="">
                                        <img src="../assets/futbol/mochila-tenis-1.webp" alt="">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown swimming"><a href="../products-pages/swimming.php">Swimming</a>
                            <div class="dropdown-content ver-4">
                                <ul>
                                    <div class="parte-izquierda">
                                        <li class="temas"><a href="#footwear">Footwear</a></li>
                                        <li class="subtemas"><a href="#footman">Man</a></li>
                                        <li class="subtemas"><a href="#footwoman">Woman</a></li>
                                        <li class="subtemas"><a href="#footkid">Kids</a></li>
                                        <li class="temas"><a href="swimsuit"></a>Swimsuit</li>
                                        <li class="subtemas"><a href="#swimsuitman">Man</a></li>
                                        <li class="subtemas"><a href="#swimsuitwoman">Woman</a></li>
                                        <li class="subtemas"><a href="#swimsuitkid">Kids</a></li>
                                    </div>
                                    <div class="parte-derecha">
                                        <li class="temas"><a href="#googles"></a>Googles</li>
                                        <li class="subtemas"><a href="#googlesadult">Adults</a></li>
                                        <li class="subtemas"><a href="#googleskid">Kids</a></li>
                                        <li class="temas"><a href="#accessories"></a>Accessories</li>
                                    </div>
                                </ul>
                                <div class="imagen-dropdown-soccer-1 imagen-dropdown-swimming-1">
                                    <div class="imagen-soccer-1">
                                        <img src="../assets/futbol/googles-1.webp" alt="">
                                        <img src="../assets/futbol/googles-2.webp" alt="">
                                    </div>
                                    <div class="imagen-soccer-2">
                                        <img src="../assets/futbol/traje-natacion-1.webp" alt="">
                                        <img src="../assets/futbol/traje-natacion-2.webp" alt="">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown baseball"><a href="../products-pages/baseball.php">Baseball</a>
                            <div class="dropdown-content ver-5">
                                <ul>
                                    <div class="parte-izquierda">
                                        <li class="temas"><a href="#footwear"></a>Footwear</li>
                                        <li class="subtemas"><a href="#footman">Man</a></li>
                                        <li class="subtemas"><a href="#footwoman">Woman</a></li>
                                        <li class="subtemas"><a href="#footkid">Kids</a></li>
                                        <li class="temas"><a href="#jerseys"></a>Jerseys</li>
                                        <li class="subtemas"><a href="#jerseysman">Man</a></li>
                                        <li class="subtemas"><a href="#jerseyswoman">Woman</a></li>
                                        <li class="subtemas"><a href="#jerseyskid">Kids</a></li>
                                    </div>
                                    <div class="parte-derecha">
                                        <li class="temas"><a href="#bats"></a>Bats</li>
                                        <li class="subtemas"><a href="#batsadult">Adults</a></li>
                                        <li class="subtemas"><a href="#batskid">Kids</a></li>
                                        <li class="temas"><a href="#ball<s"></a>Balls</li>
                                        <li class="temas"><a href="#accessories"></a>Accesories</li>
                                    </div>
                                </ul>
                                <div class="imagen-dropdown-soccer-1 imagen-dropdown-baseball-1">
                                    <div class="imagen-soccer-1">
                                        <img src="../assets/futbol/jersey-beisbol-1.webp" alt="">
                                        <img src="../assets/futbol/jersey-beisbol-2.webp" alt="">
                                    </div>
                                    <div class="imagen-soccer-2">
                                        <img src="../assets/futbol/gorra-1.webp" alt="">
                                        <img src="../assets/futbol/gorra-2.webp" alt="">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown football"><a href="../products-pages/football.php">Football</a>
                            <div class="dropdown-content ver-6">
                                <ul>
                                    <div class="parte-izquierda">
                                        <li class="temas"><a href="#footwear"></a>Footwear</li>
                                        <li class="subtemas"><a href="#footman">Man</a></li>
                                        <li class="subtemas"><a href="#footwoman">Woman</a></li>
                                        <li class="subtemas"><a href="#footkid">Kids</a></li>
                                        <li class="temas"><a href="#jerseys"></a>Jerseys</li>
                                        <li class="subtemas"><a href="#jerseysman">Man</a></li>
                                        <li class="subtemas"><a href="#jerseyswoman">Woman</a></li>
                                        <li class="subtemas"><a href="#jerseyskid">Kids</a></li>
                                    </div>
                                    <div class="parte-derecha">
                                        <li class="temas"><a href="#bottom"></a>Bottoms</li>
                                        <li class="subtemas"><a href="#bottoman">Man</a></li>
                                        <li class="subtemas"><a href="#bottowoman">Woman</a></li>
                                        <li class="subtemas"><a href="#bottomkid">Kids</a></li>
                                        <li class="temas"><a href="#balls"></a>Balls</li>
                                        <li class="temas"><a href="#protections"></a>Protections</li>
                                        <li class="subtemas"><a href="#protecadults">Adults</a></li>
                                        <li class="subtemas"><a href="#proteckid">Kids</a></li>
                                        <li class="temas"><a href="#accessories"></a>Accesories</li>
                                    </div>
                                </ul>
                                <div class="imagen-dropdown-soccer-1 imagen-dropdown-football-1">
                                    <div class="imagen-soccer-1">
                                        <img src="../assets/futbol/jersey-futbol-americano-1.webp" alt="">
                                        <img src="../assets/futbol/jersey-futbol-americano-2.webp" alt="">
                                    </div>
                                    <div class="imagen-soccer-2">
                                        <img src="../assets/futbol/bufanda-1.webp" alt="">
                                        <img src="../assets/futbol/bufanda-2.webp" alt="">
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="iconos-cabecera">
                    <div class="search-icon" id="searchIcon">
                        <i class="bi bi-search"></i>
                    </div>
                    <?php
                    if (!empty($_SESSION["id"])) { ?>
                        <li><a href="../administrator/index.php"><i class="bi bi-person-circle"></i></li></a>
                        <li><a href="../config/logout.php"><i class="bi bi-box-arrow-right"></i></li></a>
                    <?php } ?>
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