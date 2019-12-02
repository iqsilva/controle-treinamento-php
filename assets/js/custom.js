function setEditionTable(data,courseId){
  var innerTable; 
  $.each(data.edicao, function(key, value){
    //MONTA A TABELA E FORMATANDO OS CAMPOS
    innerTable += '<tr><td>'+data.edicao[key].dataInicio,"dd/MM/yyyy"+'</td>\n';
    innerTable += '<td>'+data.edicao[key].dataFim,"dd/MM/yyyy"+'</td>\n';
    innerTable += '<td>'+data.edicao[key].validade,"dd/MM/yyyy"+'</td>\n';
    innerTable += "<td><button type='button' class='btn btn-primary btn_inscrever' id = '"+data.edicao[key].edicaoId+"' value = '"+data.edicao[key].edicaoId+"'>Solictar</button></td></tr>";
  });

  //ESCREVE AS LINHAS NA TABELA
  $('#container_'+courseId+' .table-responsive .table > tbody').append(innerTable);
  
  //FAZ A CHAMADA PARA FUNÇÃO QUE CADASTRA SOLICIAÇÕES
  $(".btn_inscrever").on("click", function(){
    subscribeEdition(this.id);      
  });
};

function subscribeEdition(editionId){
  $(".btn_inscrever#"+editionId).attr('disabled','disabled');
  $.ajax({
      type: 'POST',
      data:{editionId : editionId},
      url: 'edicoes/inscrever',
      dataType: 'json',
      success: function(result){
        
      },
      error: function(result) {
        
      },
      complete: function(result) {
        $(".btn_inscrever#"+editionId).prop('disabled',false); 
      }
    });
}

function cleanTable(courseId){
  $('#container_'+courseId+' .table-responsive .table > tbody').empty();
}
//RELIAZA AS FUNÇÕES ABAIXO NO LOAD DA PAGE
$(document).ready(function(){
  $(".edicoes_container").hide(),
  $(".load_figure").hide(),
  $(".alert").hide(),

  $(".btn_edicoes").on("click",function() {
    $(".alert").hide();
    //pega o id do curso
    var courseId = this.id;

    //desligar o botão para evitar duplo clique
    this.disabled = true;

    //da o loading no gif do curso
    $("#load_"+courseId).show();

    //limpa a tabela caso esta já tenha sido carregada
    cleanTable(courseId);

    //seta o lugar aonde as edições entrarão
    var editionPlace = $('#container_'+courseId);

    //esconde a div caso esta já esteja na tela
    editionPlace.hide();

    //faz a chamada assíncrona
    $.ajax({
      type: 'POST',
      data:{courseId : courseId},
      url: 'edicoes',
      dataType: 'json',
      success: function(result){
        setEditionTable(result, courseId);
        $(".load_figure").hide();
        editionPlace.slideDown("slow");
        $("#"+courseId).prop('disabled',false);
      },
      error: function(result) {
        var alertError = $("#alert-danger-"+courseId);
        alertError.slideDown("slow");
        alertError.delay(3500);
        alertError.slideUp("slow");
      },
      complete: function(result) {
        $(".load_figure").hide();
        $("#"+courseId).prop('disabled',false); 
      }
    })
  });
});