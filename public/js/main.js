$(document).ready(function(){
   $('.delete').click(function(e){
      if(!confirm('Deseja realmente excluir?')){
         return false;
      }
   });
});