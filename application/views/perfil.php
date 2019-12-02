<!-- Page Content -->
    <div class="container">
      <div class="row">     
          <div class="col-md-12">
              <center><img src="assets/img/azul.png" width="30%" height="auto"></center>
            <p class="span"></p>
            <br>
          </div>
      <div class="row">     
          <div class="col-md-6 col-md-offset-3">
              <form action="<?php echo base_url('alterprofile')?>" method="post">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" placeholder=<?php echo $this->session->userdata['usuario']; ?> name="usuario" disabled="disabled">
              </div>
              <p class="span"></p>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input type="text" class="form-control" placeholder=<?php echo $this->session->userdata['nome']; ?> name="nome" disabled="disabled">
              </div>
              <p class="span"></p>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                <input type="text" class="form-control" placeholder=<?php echo $this->session->userdata['funcao']; ?> name="funcao" disabled="disabled">
              </div>
              <p class="span"></p>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                <input type="text" class="form-control" placeholder=<?php echo $this->session->userdata['registro']; ?> name="registro" disabled="disabled">
              </div>
              <p class="span"></p>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="text" class="form-control" placeholder=<?php echo $this->session->userdata['email']; ?> name="email">
              </div>
              <p class="span"></p>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" class="form-control" placeholder="******" name="password">
              </div>
              <p class="span"></p>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" class="form-control" placeholder="******" name="newpassword">
              </div>
              <p class="span"></p>
              <br>
              <center><p><button type="submit" class="btn btn-primary">Atualizar Informações</button></p></center>
              </form>
            <p class="span"></p>
          </div>        

          <?php
        if(!empty($this->session->flashdata('alterError'))){
          $error = $this->session->flashdata('alterError');
      ?>
        <div class="col-md-0">
            <div class="w3-card-5 w3-center">
              <header class="w3-container w3-center">
                <p><?php$error?> Dados Inválidos ou senha incorreta!</p>
              </header>
            </div>
            <p class="span"></p>
          </div>
      <?php
        }
      ?>
         <?php
        if(!empty($this->session->flashdata('alter'))){
          $alter = $this->session->flashdata('alterError');
      ?>
        <div class="col-md-0">
            <div class="w3-card-5 w3-center">
              <header class="w3-container w3-center">
                <p><?php $alter ?>Dados alterados com Sucesso!</p>
              </header>
            </div>
            <p class="span"></p>
          </div>
      <?php
        }
      ?>
      </div>
    </div>




<?php
/*
       print_r($this->session->userdata);
       ↓↓↓↓
       
       [id] => 3 
       [usuario] => andre.neves 
       [nome] => André Neves da Silva 
       [funcao] => Diretor Executivo 
       [email] => andre.neves@azul.com.br 
       [registro] => 0000003 )

*/
?>