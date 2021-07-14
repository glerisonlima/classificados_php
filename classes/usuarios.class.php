<?php 

  class Usuarios {
    public function cadastrar($nome, $email, $senha, $telefone){

      global $pdo;

      $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
      $sql->bindValue(":email", $email);
      $sql->execute();

      if($sql->rowCount() == 0){
        $sql = $pdo->prepare("INSERT INTO usuarios SET email = :email,senha = :senha,nome = :nome,telefone = :telefone");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->bindValue(":telefone", $telefone);
        $sql->execute();

        return true;
      }else {
        return false;
      }
    }

    public function login($email, $senha){

      global $pdo;

      $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
      $sql->bindvalue(":email", $email);
      $sql->bindvalue(":senha", md5($senha));
      $sql->execute();

      if($sql->rowCount() > 0){
        $dado = $sql->fetch();
        $_SESSION['cLogin'] = $dado['id'];
        return true;
      }else{
        return false;
      }
    }
  }
?>