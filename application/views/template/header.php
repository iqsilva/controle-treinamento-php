<nav class="navbar sticky-top"></nav>
<nav class="navbar navbar-fixed-top">
  <div class="header">
    <div class="container">    
      <div class="col-md-3">
          <div class="logo">              
                <p class="span"></p>
                <a href="<?php echo base_url('courses')?>">
                  <img src="assets/img/logo.png" width="100px" alt="Azul Controle de Treinamentos" />
                </a>
          </div>
      </div>
      <div class="col-md-8">
        <ul class="nav navbar-nav">
          <!-- Menu Principal -->
          <li class="current"><a href="<?php echo base_url('courses')?>">Cursos</a></li>
          <li><a href="<?php echo base_url('onhold')?>">Espera</a></li>
          <li><a href="<?php echo base_url('ongoing')?>">Andamento</a></li>
          <li><a href="<?php echo base_url('finished')?>">Concluídos</a></li>
          <li><a href="<?php echo base_url('profile')?>">Perfil</a></li>
          <li><a href="<?php echo base_url('logout')?>">Sair</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>