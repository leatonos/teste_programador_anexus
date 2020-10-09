<?php
require('config_db.php');

    /* Campos do formulario */
    $login_acesso = $_POST['login_acesso'];
    $codigo_utilizado = $_POST['codigo_utilizado'];
    

    $sqla = "SELECT `pontos` FROM `usuarios_arvore` WHERE `usuarios_arvore`.`codigo_promo` = '$codigo_utilizado'";

    $querya = mysqli_query($conn,$sql);

    if ($querya == 200){
        $sql = "UPDATE `usuarios_arvore` SET `pontos` = '300' WHERE `usuarios_arvore`.`codigo_promo` = '$codigo_utilizado';";

    $query = mysqli_query($conn,$sql);
    
    $numrows = mysqli_num_rows($query);
    
    $result = array();
    
    if($numrows > 0)
    {
        while($rows = mysqli_fetch_assoc($query))
        {
            $id = $rows['id'];
            $nome_usuario = $rows['nome_usuario'];
            $senha_usuario = $rows['senha_usuario'];
            $lista_indicados= $rows['lista_indicados'];
            $codigo_promo = $rows['codigo_promo'];
            $codigo_utilizado = $rows['codigo_utilizado'];
    
            $result['dados'][] = array('id' => $id, 'nome_usuario' => utf8_encode($nome_usuario), 'senha_usuario' => utf8_encode($senha_usuario), 'lista_indicados' => utf8_encode($lista_indicados), 'codigo_promo' => utf8_encode($codigo_promo), 'codigo_utilizado' => utf8_encode($codigo_utilizado));
            
        }
        echo json_encode($result);

        echo "adicionamos 200 pontos"
    }
    else
    {
        $result[] = 'Nenhum usuario cadastrado';
        echo 'Nenhum usuario cadastrado';
    }
    }else{

    $sql = "UPDATE `usuarios_arvore` SET `pontos` = '200' WHERE `usuarios_arvore`.`codigo_promo` = '$codigo_utilizado';";

    $query = mysqli_query($conn,$sql);
    
    $numrows = mysqli_num_rows($query);
    
    $result = array();
    
    if($numrows > 0)
    {
        while($rows = mysqli_fetch_assoc($query))
        {
            $id = $rows['id'];
            $nome_usuario = $rows['nome_usuario'];
            $senha_usuario = $rows['senha_usuario'];
            $lista_indicados= $rows['lista_indicados'];
            $codigo_promo = $rows['codigo_promo'];
            $codigo_utilizado = $rows['codigo_utilizado'];
    
            $result['dados'][] = array('id' => $id, 'nome_usuario' => utf8_encode($nome_usuario), 'senha_usuario' => utf8_encode($senha_usuario), 'lista_indicados' => utf8_encode($lista_indicados), 'codigo_promo' => utf8_encode($codigo_promo), 'codigo_utilizado' => utf8_encode($codigo_utilizado));
            
        }
        echo json_encode($result);
    }
    else
    {
        $result[] = 'Nenhum usuario cadastrado';
        echo 'Nenhum usuario cadastrado';
    }
        echo "adicionamos 100 pontos"
    }
  

?>