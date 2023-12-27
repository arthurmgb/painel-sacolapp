<script src="js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="js/ajax_auth.js?ver=1.0"></script>
<script>
    let toggle = document.querySelector("#toggle-pass");
    let user_pass = document.querySelector("#user_pass");
    let isEnabled = true;
    toggle.addEventListener("click", () => {
        if (isEnabled) {
            toggle.textContent = 'Ocultar';
            user_pass.setAttribute('type', 'text');
        } else {
            toggle.textContent = 'Mostrar';
            user_pass.setAttribute('type', 'password');
        }
        isEnabled = !isEnabled;
    });
</script>