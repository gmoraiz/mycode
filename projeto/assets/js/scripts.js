$(function(){
    //LOGIN AJAX
	$("#login").submit(function(e){
		$.ajax({
			type : 'POST',
			url  : 'logar',
			data : $("#login").serialize(),
			dataType: 'json',
			beforeSend: function(){
				$("#btnLogin").html('Verificando os dados... ');
			},
			success :  function(response){
			    window.location.href = "https://php-gmoraiz.c9users.io/projeto";
		    },
		    error: function(response){
		    	console.log(response);
		        alert("Não foi possivel logar");
			}
		});
	    e.preventDefault();
    });
    
    //SERIAO NECESSARIOS MAIS 8 AJAX, SENDO CADA UM PARA O CRUD DE NOTICIA E CATEGORIA!
});