<!-- Page Content -->
    <div class="container">
      <div class="row">
        <?php 
          if(!empty($andamento)){
            foreach ($andamento as $key) { 
        ?>
            <div class="col-md-12">
              <div class="w3-card-4">
                <header class="w3-container w3-center">
                  <p><?php echo ($key->descricao); ?></p>
                  <p><?php echo 'Data de Inicio: '.$key->dataInicio; ?></p>
                </header>
              </div>
              <p class="span"></p>
            </div>
        <?php 
            } 
          }else{
        ?>
            <div class="col-md-0">
              <div id="erro" style="margin:0 auto; width:70%;"> 
                <center><img src="assets/img/erroCurso.png" width="30%"></center>
                <span><h2 style='color: #ff0000; text-align:center'>Não há cursos em andamento!</h2>
              </div>
            </div>
        <?php
          }
        ?>
      </div>
    </div>

