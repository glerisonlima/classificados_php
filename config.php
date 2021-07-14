<?php 
  session_start();

  global $pdo;

  $dsn = "mysql:dbname=classificados;host=localhost";
  $dbuser = "root";
  $dbpass = "root";

  try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    /*
    $sql = "SELECT * FROM usuarios";
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0){
      foreach($sql->fetchAll() as $usuario){
        echo "Nome: ".$usuario["nome"];
      }
    }else{
      echo "Não foi encontrado cadastro!";
    }*/
  }catch(PDOException $e) {
    echo "FALHOU: ".$e->getMessage();
    exit;
  }
?>