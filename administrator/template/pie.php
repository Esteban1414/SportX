<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>

    <footer class="footer p-2 text-center">
        <div class="container">
            <div class="siguenos-footer siguenos-footer">
            </div>
            <div class="data-footer">
                <a id="terminos" class="sections-footer">Terminos y condiciones  |</a>
                <a id="support" class="sections-footer">Support |</a>
                <a id="politicas" class="sections-footer">Politicas de privacidad</a>
                <h3 id="regist-mark">SPORTX&copy; 2023</h3>
            </div>
        </div>
    </footer>
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script src="../JS/jquery-3.7.0.min.js"></script>
    <script src="../JS/bootstrap.min.js"></script>
    <script src="../JS/dark-mode.js"></script>
    <script src="../JS/function.js"></script>
    <script src="../JS/buscador.js"></script>
    <script src="../JS/aside.js"></script>
    <script src="../JS/sweetalert2@11.js"></script>
    <script src="../JS/btn-function.js"></script>
    <script src="../JS/politicas.js"></script>
    <script>
        // const sectionElements = document.querySelector("[data-header]");
        const searchInput = document.querySelector("[data-search]")
        const titleElement = document.querySelectorAll("[data-title]")

        searchInput.addEventListener("input", e => {
            const value = e.target.value.toLowerCase()
            titleElement.forEach(title => {
                const ti = title.querySelector("h1").textContent.toLowerCase()
                const header = Array.from(title.querySelectorAll("h2")).map(h => h.textContent.toLowerCase())
                const isVisible = ti.includes(value) || header.some(h => h.includes(value))
                title.classList.toggle("hide", !isVisible)
            })
        })
    </script>

</body>

</html>