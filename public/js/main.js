$(document).ready(function(){

   /* Máscaras */
   $('.date').mask('00/00/0000');
   $('.cel_phone').mask('(00) 00000-0000');
   $('.cpf').mask('000.000.000-00', {reverse: true});
   $('.cnpj').mask('00.000.000/0000-00', {reverse: true});

   /* Calendário */ 
   $( ".datepicker" ).datepicker({
      dateFormat: "dd/mm/yy",
      dayNames: [ "Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado" ],
      dayNamesMin: [ "D", "S", "T", "Q", "Q", "S", "S" ],
      dayNamesShort: [ "Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab" ],
      monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ],
      monthNamesShort: [ "Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez" ]
   });

   /* Confirmação de delete */
   $('.delete').click(function(e){
      if(!confirm('Deseja realmente excluir?')){
         return false;
      }
   });

   $(".states").change(function(){

		console.log(window.base_url);

		var uf = $(this).val();

		$.ajax({
			type: 'get',
			url: '../js/cities.json',
			dataType: 'json',

			success: function(response){
				options = "<option>Selecione</option>";
				estados = response.estados;

				Object.keys(estados).forEach(function(k){
					if(estados[k].sigla == uf){
						cidades = estados[k].cidades;
						Object.keys(cidades).forEach(function(k){
							options += "<option value='"+ cidades[k] +"'>"+ cidades[k] +"</option>"
						});
					}
				});

				$(".cities").html(options);
			},

			error: function(){
				alert("Erro ao carregar lista de estados");
			}

		});

	});

});