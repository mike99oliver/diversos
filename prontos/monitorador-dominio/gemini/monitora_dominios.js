$(document).ready(function() {
    // Atualizar a cada 5 segundos
    setInterval(function() {
        $.ajax({
            url: "verifica_dominios.php",
            success: function(data) {
                // Atualizar a interface com os novos status
                for (var i = 0; i < data.length; i++) {
                    var dominio = data[i].dominio;
                    var status = data[i].status;
                    
                    // Exemplo de atualização da interface
                    $("#status_" + dominio).html(status ? "Online" : "Offline");
                }
            }
        });
    }, 5000);
});