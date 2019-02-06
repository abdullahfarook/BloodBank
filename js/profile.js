
$(document).ready(function() {
    $("#btn").click(function () {
       
        $.ajax({
            Type: "GET",
            url: "profileScript.php",
            datatype: "html",// can return data in jason, html, or plaintext
            success: function (responce) {
                $("#btn").html(responce).attr("disabled", true);
            }           
        });
    });
});