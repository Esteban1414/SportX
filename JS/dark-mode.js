document.addEventListener("DOMContentLoaded", function () {
    const d = document;
    const body = d.querySelector("body");
    const cartas = d.querySelectorAll(".card");
    const cartasvg = d.querySelectorAll(".svg-color");
    const crudTitle = d.querySelectorAll("h1");
    const crudInput = d.querySelectorAll("input");
    const crudTable = d.querySelectorAll("tbody td");
    const crudModal = d.querySelectorAll(".modal-body");
    const crudModalTitle = d.querySelectorAll(".modal-header");
    const crudModalInput = d.querySelectorAll(".modal-body input");
    const footer = d.querySelector("footer");
    const footerData = d.querySelectorAll(".data-footer a");
    const switchInput = d.querySelector(".dark-mode input");
    const containerUser = d.getElementById("container-user");

    // Verifica el modo oscuro al cargar la página
    actualizarModo();

    d.addEventListener("click", (e) => {
        if (e.target.matches(".dark-mode") || e.target.matches(".dark-mode input")) {
            // Cambia el modo oscuro al hacer clic en el interruptor
            toggleModoOscuro();
            // Actualiza el modo
            actualizarModo();
        }
    });

    function toggleModoOscuro() {
        // Cambia el valor de modo oscuro en localStorage
        const modoOscuro = obtenerModoOscuro();
        guardarModoOscuro(!modoOscuro);
    }

    function obtenerModoOscuro() {
        // Devuelve true si el modo oscuro está habilitado, false en caso contrario
        return localStorage.getItem("modoOscuro") === "true";
    }

    function guardarModoOscuro(modo) {
        // Guarda el estado del modo oscuro en localStorage
        localStorage.setItem("modoOscuro", modo);
    }

    function actualizarModo() {
        const modoOscuro = obtenerModoOscuro();

        if (modoOscuro) {
            // Modo oscuro
            body.style.backgroundColor = "#222";
            switchInput.style.backgroundColor = "black";
            switchInput.style.border = "2px solid white";
            cartas.forEach((carta) => {
                carta.style.backgroundColor = "rgb(57, 57, 57)";
                carta.style.color = "white";
            });
            cartasvg.forEach((svg) => {
                svg.style.fill = "white";
            });
            crudTitle.forEach(title =>{
                title.style.color ="white"
            })
            crudInput.forEach(input =>{
                input.style.backgroundColor ="rgb(57, 57, 57)"
                input.style.color ="white"
                input.style.border ="rgb(57, 57, 57)"
            })
            crudTable.forEach(td =>{
                td.style.backgroundColor ="rgb(57, 57, 57)"
                td.style.color ="lightgray"
            })
            crudModal.forEach(modal =>{
                modal.style.backgroundColor ="rgb(57, 57, 57)"
                modal.style.color ="lightgray"
            })
            crudModalTitle.forEach(modalTitle =>{
                modalTitle.style.backgroundColor ="rgb(57, 57, 57)"
                modalTitle.style.color ="lightgray"
            })
            crudModalInput.forEach(modalInput =>{
                modalInput.style.backgroundColor ="rgb(87, 87, 87)"
                modalInput.style.color ="white"
            })
            footer.style.backgroundColor = "rgb(57, 57, 57)";
            footer.style.color ="white"

            footerData.forEach(dataA =>{
                dataA.style.color ="white"
            })
        } else {
            // Modo claro
            body.style.backgroundColor = "white";
            switchInput.style.backgroundColor = "rgb(136, 224, 253)";
            switchInput.style.border = "2px solid rgb(136, 224, 253)";
            // Elimina la transición en modo claro
            switchInput.style.transition = "none";
            cartas.forEach((carta) => {
                carta.style.backgroundColor = "white";
                carta.style.color = "black";
            });
            cartasvg.forEach((svg) => {
                svg.style.fill = "black";
            });
            crudTitle.forEach(title =>{
                title.style.color ="black"
            })
            crudInput.forEach(input =>{
                input.style.backgroundColor ="lightgray"
                input.style.color ="black"
                input.style.border ="white"
            })
            crudTable.forEach(td =>{
                td.style.backgroundColor ="white"
                td.style.color ="black"
            })
            crudModal.forEach(modal =>{
                modal.style.backgroundColor ="white"
                modal.style.color ="black"
            })
            crudModalTitle.forEach(modalTitle =>{
                modalTitle.style.backgroundColor ="white"
                modalTitle.style.color ="black"
            })
            crudModalInput.forEach(modalInput =>{
                modalInput.style.backgroundColor ="white"
                modalInput.style.color ="black"
                modalInput.style.border = "2px solid lightgray"
            })
            footer.style.backgroundColor = "lightgray";
            footer.style.color ="black"

            footerData.forEach(dataA =>{
                dataA.style.color ="black"
            })
            // containerUser.style.backgroundColor = "#white"

        }

        switchInput.checked = modoOscuro;

        // Añade la transición solo si el cambio es de oscuro a claro
        if (!modoOscuro) {
            // Agrega la clase para la animación
            switchInput.classList.add("animacion-color");
            // Elimina la clase después de un tiempo suficiente para la animación
            setTimeout(() => {
                switchInput.classList.remove("animacion-color");
            }, 500); // Ajusta el tiempo según la duración de la animación en milisegundos
        }
    }
});
