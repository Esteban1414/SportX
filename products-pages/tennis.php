<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportX</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/logo sportX-2.png">

</head>

<style>
    .hide {
        display: none;
    }
</style>

<body>
    <!-- **************************************************************************************************** -->
    <main>
        <section class="img-soccer">
            <img src="../assets/tennis.webp" alt="">
            <?php
            include '../template/cabecera-products.php';
            ?>
        </section>
        <aside id="miAside">
            <div class="menu">
                <ul>
                    <li class="temas"><a href="#footwear"></a>Footwear</li>
                    <li class="subtemas"><a href="#footman">Man</a></li>
                    <li class="subtemas"><a href="#footwoman">Woman</a></li>
                    <li class="subtemas"><a href="#footkid">Kids</a></li>
                    <li class="temas"><a href="#clothes"></a>Clothes</li>
                    <li class="subtemas"><a href="#clothesman">Man</a></li>
                    <li class="subtemas"><a href="#clotheswoman">Woman</a></li>
                    <li class="subtemas"><a href="#clotheskid">Kids</a></li>
                    <li class="temas"><a href="#rackets"></a>Rackets</li>
                    <li class="subtemas"><a href="#racketsadult">Adults</a></li>
                    <li class="subtemas"><a href="#racketskid">Kids</a></li>
                    <li class="temas"><a href="#balls"></a>Balls</li>
                    <li class="temas"><a href="#accessories"></a>Accessories</li>
                </ul>
            </div>
        </aside>
        <script>
            window.addEventListener('scroll', function() {
                var aside = document.getElementById('miAside');
                var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

                if (scrollPosition >= 800) {
                    aside.style.position = 'fixed';
                    aside.style.top = '0px';
                } else {
                    aside.style.position = 'absolute';
                    aside.style.top = '800px';
                }
            });
        </script>
        <section class="secciones">
            <form class="form">
                <button>
                    <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search">
                        <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9" stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
                <!-- <input class="input" placeholder="¿Que estas buscando?" required="" type="text"> -->
                <input type="search" id="search" class="input" data-search placeholder="¿Que estas buscando?">
                <button class="reset" type="reset">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </form>
            <h1>Articles</h1>
            <p class="descripcion">Welcome to the soccer section of our sports products warehouse management page.
                On this page, you can find all the information you need about our football products. From technical specifications, to features and available stock.
                To get started, you can browse the different types of products we have available.</p>
            <div class="footwear">
                <div data-title>
                    <h1 id="footwear">Footwear</h1>
                    <div class="splide splide-man">
                        <div class="splide__track">
                            <h2 id="footman">Man</h2>
                            <ul class="splide__list">
                                <?php
                                $sql = $conne->prepare("SELECT * FROM products WHERE category = 'Tennis' AND product_type = 'Footwear' AND section = 'M'");
                                $sql->execute();
                                $img = $sql;
                                foreach ($img as $img_loop) {
                                ?>
                                    <li class="splide__slide" style="width: 250px">
                                        <img class="producto-imagen" src="../administrator/ajax/img/<?php echo $img_loop["image"]; ?>" alt="">
                                        <!-- Añade un atributo de datos con la información del producto -->
                                        <div class="producto-info" data-mark="<?php echo $img_loop['mark']; ?>" data-name="<?php echo $img_loop['name']; ?>" data-size="<?php echo $img_loop['size']; ?>" data-description="<?php echo $img_loop['description']; ?>" data-section="<?php echo $img_loop['section']; ?>" data-price="<?php echo $img_loop['price']; ?>" data-stock="<?php echo $img_loop['stock']; ?>"></div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="splide splide-woman">
                        <div class="splide__track">
                            <h2 id="footwoman">Woman</h2>
                            <ul class="splide__list">
                                <?php
                                $sql = $conne->prepare("SELECT * FROM products WHERE category = 'Tennis' AND product_type = 'Footwear' AND section = 'W'");
                                $sql->execute();
                                $img = $sql;
                                foreach ($img as $img_loop) {
                                ?>
                                    <li class="splide__slide" style="width: 250px">
                                        <img class="producto-imagen" src="../administrator/ajax/img/<?php echo $img_loop["image"]; ?>" alt="">
                                        <!-- Añade un atributo de datos con la información del producto -->
                                        <div class="producto-info" data-mark="<?php echo $img_loop['mark']; ?>" data-name="<?php echo $img_loop['name']; ?>" data-size="<?php echo $img_loop['size']; ?>" data-description="<?php echo $img_loop['description']; ?>" data-section="<?php echo $img_loop['section']; ?>" data-price="<?php echo $img_loop['price']; ?>" data-stock="<?php echo $img_loop['stock']; ?>"></div>
                                    </li>
                                <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                    <div class="splide splide-kids">
                        <div class="splide__track">
                            <h2 id="footkid">Kids</h2>
                            <ul class="splide__list">
                                <?php
                                $sql = $conne->prepare("SELECT * FROM products WHERE category = 'Tennis' AND product_type = 'Footwear' AND section = 'K'");
                                $sql->execute();
                                $img = $sql;
                                foreach ($img as $img_loop) {
                                ?>
                                    <li class="splide__slide" style="width: 250px">
                                        <img class="producto-imagen" src="../administrator/ajax/img/<?php echo $img_loop["image"]; ?>" alt="">
                                        <!-- Añade un atributo de datos con la información del producto -->
                                        <div class="producto-info" data-mark="<?php echo $img_loop['mark']; ?>" data-name="<?php echo $img_loop['name']; ?>" data-size="<?php echo $img_loop['size']; ?>" data-description="<?php echo $img_loop['description']; ?>" data-section="<?php echo $img_loop['section']; ?>" data-price="<?php echo $img_loop['price']; ?>" data-stock="<?php echo $img_loop['stock']; ?>"></div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clothes">
                <div data-title>
                    <h1 id="clothes">Clothes</h1>
                    <div class="splide splide-man">
                        <div class="splide__track">
                            <h2 id="clothesman">Man</h2>
                            <ul class="splide__list">
                                <?php
                                $sql = $conne->prepare("SELECT * FROM products WHERE category = 'Tennis' AND product_type = 'Clothes' AND section = 'M'");
                                $sql->execute();
                                $img = $sql;
                                foreach ($img as $img_loop) {
                                ?>
                                    <li class="splide__slide" style="width: 250px">
                                        <img class="producto-imagen" src="../administrator/ajax/img/<?php echo $img_loop["image"]; ?>" alt="">
                                        <!-- Añade un atributo de datos con la información del producto -->
                                        <div class="producto-info" data-mark="<?php echo $img_loop['mark']; ?>" data-name="<?php echo $img_loop['name']; ?>" data-size="<?php echo $img_loop['size']; ?>" data-description="<?php echo $img_loop['description']; ?>" data-section="<?php echo $img_loop['section']; ?>" data-price="<?php echo $img_loop['price']; ?>" data-stock="<?php echo $img_loop['stock']; ?>"></div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="splide splide-woman">
                        <div class="splide__track">
                            <h2 id="clotheswoman">Woman</h2>
                            <ul class="splide__list">
                                <?php
                                $sql = $conne->prepare("SELECT * FROM products WHERE category = 'Tennis' AND product_type = 'Clothes' AND section = 'W'");
                                $sql->execute();
                                $img = $sql;
                                foreach ($img as $img_loop) {
                                ?>
                                    <li class="splide__slide" style="width: 250px">
                                        <img class="producto-imagen" src="../administrator/ajax/img/<?php echo $img_loop["image"]; ?>" alt="">
                                        <!-- Añade un atributo de datos con la información del producto -->
                                        <div class="producto-info" data-mark="<?php echo $img_loop['mark']; ?>" data-name="<?php echo $img_loop['name']; ?>" data-size="<?php echo $img_loop['size']; ?>" data-description="<?php echo $img_loop['description']; ?>" data-section="<?php echo $img_loop['section']; ?>" data-price="<?php echo $img_loop['price']; ?>" data-stock="<?php echo $img_loop['stock']; ?>"></div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="splide splide-kids">
                        <div class="splide__track">
                            <h2 id="clotheskid">Kids</h2>
                            <ul class="splide__list">
                                <?php
                                $sql = $conne->prepare("SELECT * FROM products WHERE category = 'Tennis' AND product_type = 'Clothes' AND section = 'K'");
                                $sql->execute();
                                $img = $sql;
                                foreach ($img as $img_loop) {
                                ?>
                                    <li class="splide__slide" style="width: 250px">
                                        <img class="producto-imagen" src="../administrator/ajax/img/<?php echo $img_loop["image"]; ?>" alt="">
                                        <!-- Añade un atributo de datos con la información del producto -->
                                        <div class="producto-info" data-mark="<?php echo $img_loop['mark']; ?>" data-name="<?php echo $img_loop['name']; ?>" data-size="<?php echo $img_loop['size']; ?>" data-description="<?php echo $img_loop['description']; ?>" data-section="<?php echo $img_loop['section']; ?>" data-price="<?php echo $img_loop['price']; ?>" data-stock="<?php echo $img_loop['stock']; ?>"></div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div data-title>
                    <h1 id="rackets">Rackets</h1>
                    <div class="splide splide-man">
                        <div class="splide__track">
                            <h2 id="racketsadult">Adults</h2>
                            <ul class="splide__list">
                                <?php
                                $sql = $conne->prepare("SELECT * FROM products WHERE category = 'Tennis' AND product_type = 'Rackets' AND section = 'A'");
                                $sql->execute();
                                $img = $sql;
                                foreach ($img as $img_loop) {
                                ?>
                                    <li class="splide__slide" style="width: 250px">
                                        <img class="producto-imagen" src="../administrator/ajax/img/<?php echo $img_loop["image"]; ?>" alt="">
                                        <!-- Añade un atributo de datos con la información del producto -->
                                        <div class="producto-info" data-mark="<?php echo $img_loop['mark']; ?>" data-name="<?php echo $img_loop['name']; ?>" data-size="<?php echo $img_loop['size']; ?>" data-description="<?php echo $img_loop['description']; ?>" data-section="<?php echo $img_loop['section']; ?>" data-price="<?php echo $img_loop['price']; ?>" data-stock="<?php echo $img_loop['stock']; ?>"></div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="splide splide-kids">
                        <div class="splide__track">
                            <h2 id="racketskid">Kids</h2>
                            <ul class="splide__list">
                                <?php
                                $sql = $conne->prepare("SELECT * FROM products WHERE category = 'Tennis' AND product_type = 'Rackets' AND section = 'K'");
                                $sql->execute();
                                $img = $sql;
                                foreach ($img as $img_loop) {
                                ?>
                                    <li class="splide__slide" style="width: 250px">
                                        <img class="producto-imagen" src="../administrator/ajax/img/<?php echo $img_loop["image"]; ?>" alt="">
                                        <!-- Añade un atributo de datos con la información del producto -->
                                        <div class="producto-info" data-mark="<?php echo $img_loop['mark']; ?>" data-name="<?php echo $img_loop['name']; ?>" data-size="<?php echo $img_loop['size']; ?>" data-description="<?php echo $img_loop['description']; ?>" data-section="<?php echo $img_loop['section']; ?>" data-price="<?php echo $img_loop['price']; ?>" data-stock="<?php echo $img_loop['stock']; ?>"></div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="balls">
                <div data-title>
                    <h1 id="balls">Balls</h1>
                    <div class="splide splide-man">
                        <div class="splide__track">
                            <h2></h2>
                            <ul class="splide__list">
                                <?php
                                $sql = $conne->prepare("SELECT * FROM products WHERE category = 'Tennis' AND product_type = 'Balls'");
                                $sql->execute();
                                $img = $sql;
                                foreach ($img as $img_loop) {
                                ?>
                                    <li class="splide__slide" style="width: 250px">
                                        <img class="producto-imagen" src="../administrator/ajax/img/<?php echo $img_loop["image"]; ?>" alt="">
                                        <!-- Añade un atributo de datos con la información del producto -->
                                        <div class="producto-info" data-mark="<?php echo $img_loop['mark']; ?>" data-name="<?php echo $img_loop['name']; ?>" data-size="<?php echo $img_loop['size']; ?>" data-description="<?php echo $img_loop['description']; ?>" data-section="<?php echo $img_loop['section']; ?>" data-price="<?php echo $img_loop['price']; ?>" data-stock="<?php echo $img_loop['stock']; ?>"></div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accessories">
                <div data-title>
                    <h1 id="accessories">Accessories</h1>
                    <div class="splide splide-man">
                        <div class="splide__track">
                            <h2></h2>
                            <ul class="splide__list">
                                <?php
                                $sql = $conne->prepare("SELECT * FROM products WHERE category = 'Tennis' AND product_type = 'Accessories'");
                                $sql->execute();
                                $img = $sql;
                                foreach ($img as $img_loop) {
                                ?>
                                    <li class="splide__slide" style="width: 250px">
                                        <img class="producto-imagen" src="../administrator/ajax/img/<?php echo $img_loop["image"]; ?>" alt="">
                                        <!-- Añade un atributo de datos con la información del producto -->
                                        <div class="producto-info" data-mark="<?php echo $img_loop['mark']; ?>" data-name="<?php echo $img_loop['name']; ?>" data-size="<?php echo $img_loop['size']; ?>" data-description="<?php echo $img_loop['description']; ?>" data-section="<?php echo $img_loop['section']; ?>" data-price="<?php echo $img_loop['price']; ?>" data-stock="<?php echo $img_loop['stock']; ?>"></div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <div id="miModal" class="my-modal">
        <i id="cerrar" class="bi bi-x-circle-fill"></i>
        <img src="" alt="">
        <h1>Product Information</h1>
        <div class="info">

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const splides = document.querySelectorAll('.splide');
            for (const splide of splides) {
                new Splide(splide, {
                    type: 'loop',
                    height: '10rem',
                    focus: 'center',
                    autoWidth: true,
                }).mount();
            }
        });

        var imagenesProductos = document.querySelectorAll(".producto-imagen");
        var modal = document.getElementById("miModal");
        var fondoModal = document.createElement("div");

        imagenesProductos.forEach(function(imagen) {
            imagen.addEventListener("click", function() {
                modal.style.display = "block";
                fondoModal.className = "modal-fondo";
                document.body.appendChild(fondoModal);
                fondoModal.style.display = "block";

                // Obtén la información del producto del elemento clickeado
                var productoInfo = this.nextElementSibling.dataset;

                // Actualiza el contenido del modal con la información del producto
                modal.querySelector("img").src = this.src;
                modal.querySelector(".info").innerHTML = `
                <p class="gris">Mark <span>${productoInfo.mark}</span></p>
                <p class="blanco">Model <span>${productoInfo.name}</span></p>
                <p class="gris">Description <span>${productoInfo.description}</span></p>
                ${productoInfo.size ? `<p class="blanco">Size <span>${productoInfo.size}</span></p>` : ''}
                ${productoInfo.section ? `<p class="gris">Section <span>${productoInfo.section}</span></p>` : ''}
                <p class="blanco">Price (mx) <span>$${productoInfo.price}</span></p>
                <p class="gris">Stock <span>${productoInfo.stock}/u</span></p>
                `;
            });
        });
        var cerrarIcono = document.getElementById("cerrar");
        cerrarIcono.addEventListener("click", function() {
            modal.style.display = "none";
            fondoModal.style.display = "none";
        });


        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('.light-table-filter');

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const secciones = document.querySelectorAll('.secciones');

                secciones.forEach(function(seccion) {
                    const sectionTitle = seccion.querySelector('h1').textContent.toLowerCase();

                    if (sectionTitle.includes(searchTerm)) {
                        seccion.style.display = 'block';
                    } else {
                        seccion.style.display = 'none';
                    }
                });
            });
        });
    </script>
    <?php
    include '../template/pie.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
</body>

</html>