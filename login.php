
<?php require 'pages/header.php'; ?>

<div class="container">
  <h1>Login de usúario</h1>

  <?php  
    require 'classes/usuarios.class.php';
    
    $u = new Usuarios();
    if(isset($_POST['email']) && !empty($_POST['email'])){
      $email = addslashes($_POST['email']);  
      $senha = $_POST['senha']; 
      
      if($u->login($email, $senha)){
        ?>
          <script type="text/javascript">
            console.log("chegou aqui no login")
            window.location.href="./";
          </script>
        <?php
      }else{
        ?>
        <div class="alert alert-danger">
          Usúario e/ou senha errados!
        </div>
        <?php
      }
    }
  ?>

  <form action="" method="POST">    
    <div class="form-group">
      <label for="email">E-mail:</label>
      <input type="text" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
      <label for="senha">Senha:</label>
      <input type="password" name="senha" id="senha" class="form-control">
    </div>    
    <input type="submit" value="Login" class="btn btn-default=" />
  </form>

</div>

<?php require 'pages/footer.php'; ?>
