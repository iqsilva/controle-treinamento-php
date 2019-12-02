<!-- Page Content -->
    <div class="container">
      <div class="row">
        <?php foreach ($cursos as $curso) { ?>

          <div class="col-md-12">
            <div class="w3-card-4">
              <header class="w3-container w3-center">
                
                <p><?php echo $curso->Descricao; ?></p>
                <p><?php echo 'Vigência: '.$curso->Vigencia.' Anos.'; ?>
                   <?php echo 'Carga horária: '.$curso->Carga_Horaria.' Horas.'; ?></p>
                <p><button id = "<?php echo $curso->Cod_Curso; ?>" type="button" class="btn btn-primary btn_edicoes">Edições</button></p>
                
                
                <figure class="load_figure" id = "load_<?php echo $curso->Cod_Curso; ?>">
                  <img src="<?php echo base_url('assets/img/loading.gif')?>" height="20" width="20" data-alt="<?php echo base_url('assets/img/loading.gif')?>">
                </figure>
                
                <div class="alert alert-danger" id="alert-danger-<?php echo $curso->Cod_Curso; ?>" role="alert">
                  <strong>Oops!</strong> Não há edições deste curso no momento. Tente novamente mais tarde!
                </div>

              </header>
              <div id="container_<?php echo $curso->Cod_Curso; ?>" class="w3-container edicoes_container">
                <div class="table-responsive">          
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Data de Início</th>
                        <th>Data de Fim</th>
                        <th>Validade</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
            <p class="span"></p>
          </div>
        <?php } ?>
      </div>
    </div>