<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <style>
        button {
            margin: 10px;
            padding: 8px;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <button onclick="adicionarQuantidade(5)">Adicionar 5</button>
    <button onclick="adicionarQuantidade(10)">Adicionar 10</button>
    <button onclick="adicionarQuantidade(50)">Adicionar 50</button>
    <button onclick="adicionarQuantidade(100)">Adicionar 100</button>

    <p>Quantidade: <span id="QUANTIDADE">30</span></p>
    <p>Resultado: <span id="RESULTADO">0</span></p>

    <script>
        // Inicializando a quantidade
        let quantidade = 30;

        // Função para adicionar quantidade
        function adicionarQuantidade(valor) {
            quantidade += valor;
            document.getElementById('QUANTIDADE').innerText = quantidade;

            // Calculando o resultado
            const resultado = quantidade * 0.09;
            document.getElementById('RESULTADO').innerText = resultado.toFixed(2);
        }
    </script>

</body>
</html>
