<!DOCTYPE html>
<html>

<head>
    <title>Keypress Validation</title>
    <script>
    function validateInput(event) {
        const inputText = event.target.value;
        if (validateCPF(inputText) || validateCNPJ(inputText)) {
            alert('campo valido');
        } else {
            event.preventDefault();
            alert('campo invalido');
            $('#input-text').val("");
        }
    }

    function validateCPF(cpf) {
        cpf = cpf.replace(/[^\d]+/g, '');
        if (cpf == '') return false;
        // Eliminate known invalid CPFs
        if (cpf.length != 11 ||
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999")
            return false;
        // Validate CPF
        let i;
        let j;
        let add = 0;
        for (i = 0; i < 9; i++) {
            add += parseInt(cpf.charAt(i)) * (10 - i);
        }
        add = 11 - (add % 11);
        if (add > 9) {
            add = 0;
        }
        if (parseInt(cpf.charAt(9)) != add) {
            return false;
        }
        add = 0;
        for (i = 0; i < 10; i++) {
            add += parseInt(cpf.charAt(i)) * (11 - i);
        }
        add = 11 - (add % 11);
        if (add > 9) {
            add = 0;
        }
        if (parseInt(cpf.charAt(10)) != add) {
            return false;
        }
        return true;
    }

    function validateCNPJ(cnpj) {
        cnpj = cnpj.replace(/[^\d]+/g, '');
        if (cnpj == '') return false;
        if (cnpj.length != 14) return false;
        // Eliminate known invalid CNPJs
        if (cnpj == "00000000000000" ||
            cnpj == "11111111111111" ||
            cnpj == "22222222222222" ||
            cnpj == "33333333333333" ||
            cnpj == "44444444444444" ||
            cnpj == "55555555555555" ||
            cnpj == "66666666666666" ||
            cnpj == "77777777777777") {
            return false;
        }

        // Validate CNPJ
        let i;
        let j;
        let add = 0;
        let multiplicador = 2;
        for (i = 0; i < 12; i++) {
            add += parseInt(cnpj.charAt(i)) * multiplicador;
            if (multiplicador < 9) {
                multiplicador++;
            } else {
                multiplicador = 2;
            }
        }
    }
    </script>
</head>

<body>
    <label for="input-text">Enter CPF, CNPJ, or Phone number:</label>
    <input type="tel" id="input-text" name="input-text" onfocusout="validateInput(event)">
</body>

</html>