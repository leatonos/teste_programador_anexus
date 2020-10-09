$(document).ready(function(){
  
  var codigo_validado = false;

  //Consulta Usuários
  var users;

        var users_req = $.post("php/db_connect.php", function() {
          //alert( users_req.responseText );
          users = JSON.parse(users_req.responseText);
        })
          .done(function() {
            console.log(users)
          })
          .fail(function() {
            //alert( "error" );
          });

  //Login

  $("#fazendo_login").submit(function(){

    var data_login = {
      login: $("#login").val(),
      senha:$("#senha").val(),
    }
          var fazendo_login = $.ajax({
            url: "php/login.php",
            method: "POST",
            dataType:"text",
            data: data_login
          });
          fazendo_login.done(function(msg) {
              console.log("Login Feito com Sucesso");
              console.log(" ");
              console.log("Dados do Usuário:");
              console.log(msg);
          });
          fazendo_login.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
            return false;
          });

     return false;
  
    });
  
  //Criando conta

  $("#criando_conta").submit(function(){
    var data_criar_conta = {
      login_acesso: $("#login_criar").val(),
      senha_criada:$("#senha_criar").val(),
      codigo_utilizado:$("#codigo_promo").val()
    }
          var criando_conta = $.ajax({
            url: "php/criar_conta.php",
            method: "POST",
            dataType:"text",
            data: data_criar_conta
          });
          criando_conta.done(function(msg) {
              //console.log(msg)
          });
          criando_conta.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
            return false;
          });
    if(codigo_validado){

      var data_validado = {
        login_acesso: $("#login_criar").val(),
        codigo_utilizado:$("#codigo_promo").val()
      }
            var adicionar_pontos = $.ajax({
              url: "php/adicionar_pontos.php",
              method: "POST",
              dataType:"text",
              data: data_validado
            });
            criando_conta.done(function(msg) {
                console.log("cheque o banco agora")
            });
            criando_conta.fail(function( jqXHR, textStatus ) {
              alert( "Request failed: " + textStatus );
              return false;
            });
    }
     return false;
  });

  //Validar Código Promocional

  $("#verifica_btn").click(function(){
    

    var codigo_procurado = {
      codigo_utilizado: $("#codigo_promo").val()
    }
          var validando_codigo = $.ajax({
            url: "php/valida_codigo.php",
            method: "POST",
            dataType:"text",
            data: codigo_procurado
          });
          validando_codigo.done(function(msg) {
              console.log(msg);
              if(msg != "Código Invalido"){
                codigo_validado = true;
                $("#status_codigo").text("Código validado")
              }else{
                codigo_validado = false;
                $("#status_codigo").text("Código não existe")
              }
          });
          validando_codigo.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
            return false;
          });
     return false;

    


  });


  $("#codigo_promo").keyup(function(){
    if ($("#codigo_promo").val() < 5){
      $("#status_codigo").text("")
    }

  });


  



});