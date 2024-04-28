<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Status dos Domínios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .online { color: green; }
        .offline { color: red; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Status dos Domínios</h2>
        <ul id="listaDominios" class="list-group mt-3"></ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function atualizarStatus() {
            // Faz uma requisição AJAX para o script PHP
            fetch('verificarDominios.php')
                .then(response => response.json())
                .then(data => {
                    const listaDominios = document.getElementById('listaDominios');
                    listaDominios.innerHTML = ''; // Limpa a lista antes de adicionar os novos itens

                    data.forEach(dominio => {
                        const statusClass = dominio.status === 'Online' ? 'online' : 'offline';
                        const listItem = document.createElement('li');
                        listItem.className = `list-group-item ${statusClass}`;
                        listItem.innerHTML = `${dominio.url}: ${dominio.status}`;
                        listaDominios.appendChild(listItem);
                    });
                });
        }

        // Atualiza o status a cada 5 minutos
        setInterval(atualizarStatus, 10000); // 300000 milissegundos = 5 minutos

        // Chama a função imediatamente para carregar os status
        atualizarStatus();
    </script>

</body>

</html>
