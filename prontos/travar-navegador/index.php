<html>

<head>
    <title>Loop FOR - Devmedia</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script>
        function makeid(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
             return result;
        }

      
        for (let index = 0; index < 100; index++) {
            console.log(index + makeid(1000000000));
            
        }


        
    </script>
</head>

<body>
</body>

</html>