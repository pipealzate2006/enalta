</section>
<script>
    let arrow = document.querySelectorAll(".arrow");
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);

    function openSidebar() {
        sidebar.classList.remove("close");
    }

    function closeSidebar() {
        sidebar.classList.add("close");
    }

    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
        saveSidebarState(sidebar.classList.contains("close"));
    });

    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement;
            arrowParent.classList.toggle("showMenu");
        });
    }

    function saveSidebarState(isClosed) {
        localStorage.setItem("sidebarClosed", isClosed);
    }

    function loadSidebarState() {
        const isClosed = localStorage.getItem("sidebarClosed") === "true";
        if (isClosed) {
            closeSidebar();
        } else {
            openSidebar();
        }
    }

    // Agregar funcionalidad para mostrar/ocultar las opciones al hacer clic en "Mostrar"
    const mostrarOption = document.querySelector('.iocn-link');
    const subMenu = document.querySelector('.sub-menu');

    mostrarOption.addEventListener('click', () => {
        subMenu.classList.toggle('showMenu');
    });

    // Inicializar el estado del sidebar
    window.addEventListener('load', loadSidebarState);
</script>


<script src="https://kit.fontawesome.com/73c11b743b.js" crossorigin="anonymous"></script>
</body>

</html>