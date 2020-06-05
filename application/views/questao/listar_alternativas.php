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
              <h3 class="mb-0">Questão</h3>
              <h5 class="mb-0">DISCIPLINA: <?php echo $dados->disciplina; ?> <br> CONTEÚDO: <?php echo $dados->conteudo; ?></h5>
              <hr>
              <h5 class="mb-0">DESCRIÇÃO: <?php echo $dados->descricao; ?></h5>
            </div>            
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" width="90%">Descrição</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($alternativas as $d) { ?>
                <tr>
                  <th scope="row">
                    <?php echo $d->descricao; ?>
                  </th>
                  <th scope="row">
                    <?php if($d->correta){ echo '<span class="badge badge-pill badge-success">RESPOSTA CORRETA</span>'; } ?>
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




