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
              <h3 class="mb-0">Questões</h3>
              <h5 class="mb-0">DISCIPLINA: <?php echo $disciplina->nome; ?> <br> CONTEÚDO: <?php echo $conteudo->nome; ?></h5>
            </div>
            <a style="color: #FFFFFF;" class="btn btn-primary" href="<?php echo base_url("questao/cadastrar/$disciplina->id/$conteudo->id"); ?>">Nova Questão</a>
            
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Descrição</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($resultado as $d) { ?>
                <tr>
                  <th scope="row">
                    <?php echo $d->descricao; ?>
                  </th>
                  <th scope="row">
                    <a href="<?php echo base_url("questao/alternativas/$d->id"); ?>">
                      <i class="ni ni-align-left-2" style="font-size: 1.5rem;" title="ALTERNATIVAS"></i>
                    </a>
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




