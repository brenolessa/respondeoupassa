<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid">
    <div class="header-body">
      
    </div>
  </div>
</div>
<div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Cadastrar Conteúdo</h3>
              <h5><?php echo 'DISCIPLINA: '.$disciplina->nome; ?></h5>
            </div>
            <div class="card-body">
              <div class="row">                

                <form class="col" method="POST" action="<?php echo base_url("conteudo/cadastrar/$disciplina->id"); ?>">

                  <div class="row">

                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nome" name="nome" required>
                      </div>
                    </div>

                    <div class="col-md-12" style="text-align: right;">
                      <button type="submit" class="btn btn-default" name="btn_cadastrar">Cadastrar</button>
                    </div>

                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>