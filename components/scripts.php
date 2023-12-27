<script src="<?php echo $url; ?>js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json"></script>
<script>
    let userAdm = "<?php echo $_SESSION['is_admin']; ?>";
</script>
<script>
    document.querySelector("#toggleMenu").addEventListener("click", () => {

        const sidebar = document.querySelector("#sidebar");

        const isCollapsed = sidebar.classList.contains("collapsed");

        localStorage.setItem("sidebarCollapsed", !isCollapsed);
    });

    document.addEventListener("DOMContentLoaded", () => {
        const sidebar = document.querySelector("#sidebar");
        const isCollapsed = localStorage.getItem("sidebarCollapsed") === "true";

        if (isCollapsed) {
            sidebar.classList.add("collapsed");
        }
    });
</script>
<script>
    //<![CDATA[
    $(window).on('load', function() {
        $('#preloader .inner').fadeOut();
        $('#preloader').delay(50).fadeOut();
        $('body').delay(50).css({
            'overflow': 'visible'
        });
    })
    //]]>
</script>