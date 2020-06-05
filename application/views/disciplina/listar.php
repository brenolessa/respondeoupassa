<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid">
    <div class="header-body">
      
    </div>
  </div>
</div>
<div class="container-fluid mt--7">
  <div class="row">
    
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Disciplinas</h3>
            </div>
            <a style="color: #FFFFFF;" class="btn btn-primary" href="<?php echo base_url('disciplina/cadastrar'); ?>">Nova Disciplina</a>
            
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($disciplinas as $d) { ?>
                <tr>
                  <th scope="row">
                    <?php echo $d->nome; ?>
                  </th>
                  <th scope="row">
                    <a href="<?php echo base_url("conteudo/listar/$d->id"); ?>">
                      <i class="ni ni-archive-2" style="font-size: 1.5rem;" title="CONTEÚDOS"></i>
                    </a>

                    <!-- <a href="<?php echo base_url("questao/listar/$d->id"); ?>">
                      <i class="ni ni-collection" style="font-size: 1.5rem;" title="QUESTÕES"></i>
                    </a> -->
                  </th>
                </tr>
              <?php } ?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
</div>




