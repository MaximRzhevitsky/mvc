$(document).ready(function () {
    $("#preg-view").click(function () {

        var comment = $("#comment").val().trim();
        var email = $("#email").val().trim();
        var name = $("#name").val().trim();
        var image = $('#image')[0].files[0].name;

        var currentdate = new Date();
        var datetime = currentdate.getFullYear() + "-"
            + (currentdate.getMonth() + 1) + "-"
            + currentdate.getDate() + "      "
            + currentdate.getHours() + ":"
            + currentdate.getMinutes() + ":"
            + currentdate.getSeconds();


        if (comment == "") {
            $("#error-message").text("Введите текст");
            return false;
        } else if (email == "") {
            $("#error-message").text("Введите почту");
            return false;
        } else if (name == "") {
            $("#error-message").text("Введите имя");
            return false;
        }
        if (comment.length < 5) {
            $("#error-message").text("Введите сообщение не менее 5 символов");
            return false;
        }
        $("#error-message").text(" ");
        // $("#saccess").text("Ваше письмо отправлено, спасибо!");

        $('#table> tbody:last-child').append('<tr><td></td><td>' + comment + '</td><td>' + name + '</td><td>' + datetime + '</td><td>' + image + '</td></tr>');

        $(this).attr('disabled', true);
    });
});
