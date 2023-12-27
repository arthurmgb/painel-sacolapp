$(document).ready(function () {
    $("#cadastroForm").submit(function (event) {

        event.preventDefault();

        $("#cadBtn").prop("disabled", true);
        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "controllers/auth/cadastrar",
            data: formData,
            success: function (response) {
                if (response == 'success') {
                    let mensagem = $("<p class='text-success'>").text('Novo usuário cadastrado com sucesso!');
                    $("#msg").empty().append(mensagem);
                    $("#cadastroForm")[0].reset();
                } else {
                    let mensagem = $("<p class='text-danger'>").text(response);
                    $("#msg").empty().append(mensagem);
                }

                $("#cadBtn").prop("disabled", false);
            }
        });
    });
    $("#loginForm").submit(function (event) {

        event.preventDefault();

        $("#logBtn").prop("disabled", true);
        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "controllers/auth/logar",
            data: formData,
            success: function (response) {
                if (response == 'success') {
                    $("#loginForm")[0].reset();
                    window.location.href = './';
                } else {
                    let mensagem = $("<p class='text-danger'>").text(response);
                    $("#msg").empty().append(mensagem);
                }

                $("#logBtn").prop("disabled", false);
            }
        });
    });
    $("#updateUserInfo").submit(function (event) {
        event.preventDefault();

        $("#btnUpdateUserInfo").prop("disabled", true);
        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "../controllers/profile/editar_perfil",
            data: formData,
            dataType: "json",
            success: function (response) {

                if (response.message == 'success') {
                    let mensagem = $("<p class='text-success mb-2'>").text('Perfil atualizado com sucesso!');
                    $("#msg").empty().append(mensagem);
                    $('#titleNome').text(response.sessionNome);
                    $('#nomeNav').text('Olá, ' + response.sessionNome);
                } else {
                    let mensagem = $("<p class='text-danger mb-2'>").text(response.message);
                    $("#msg").empty().append(mensagem);
                }

                $("#btnUpdateUserInfo").prop("disabled", false);
            }
        });
    });
    $("#updateUserPass").submit(function (event) {
        event.preventDefault();
        $("#btnUpdateUserPass").prop("disabled", true);
        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "../controllers/profile/editar_senha",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.message == 'success') {
                    let mensagem = $("<p class='text-success mb-2'>").text('Senha atualizada com sucesso!');
                    $("#msgPass").empty().append(mensagem);
                    $('#updateUserPass')[0].reset();
                } else {
                    let mensagem = $("<p class='text-danger mb-2'>").text(response.message);
                    $("#msgPass").empty().append(mensagem);
                }

                $("#btnUpdateUserPass").prop("disabled", false);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
});