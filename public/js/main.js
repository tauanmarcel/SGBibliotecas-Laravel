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
});