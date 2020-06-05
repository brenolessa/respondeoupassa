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
              <h3 class="mb-0">Cadastrar Questão</h3>
              <h5 class="mb-0">DISCIPLINA: <?php echo $disciplina->nome; ?> <br> CONTEÚDO: <?php echo $conteudo->nome; ?></h5>
            </div>
            <div class="card-body">
              <div class="row">                

                <form class="col" method="POST" action="<?php echo base_url("questao/cadastrar/$disciplina->id/$conteudo->id"); ?>">

                  <div class="row">

                    <div class="col-md-10">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Questão" name="descricao" required maxlength="300" autocomplete="off">
                      </div>
                    </div>

                    <div class="col-md-10">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="a)" name="a" required maxlength="150" autocomplete="off">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="custom-control custom-radio mb-3">
                        <input name="resposta" value="a" class="custom-control-input" id="5" type="radio">
                        <label class="custom-control-label" for="5">Alternativa Correta?</label>
                      </div>
                    </div>

                    <div class="col-md-10">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="b)" name="b" required maxlength="150" autocomplete="off">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="custom-control custom-radio mb-3">
                        <input name="resposta" value="b" class="custom-control-input" id="4" type="radio">
                        <label class="custom-control-label" for="4">Alternativa Correta?</label>
                      </div>
                    </div>

                    <div class="col-md-10">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="c)" name="c" required maxlength="150" autocomplete="off">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="custom-control custom-radio mb-3">
                        <input name="resposta" value="c" class="custom-control-input" id="3" type="radio">
                        <label class="custom-control-label" for="3">Alternativa Correta?</label>
                      </div>
                    </div>

                    <div class="col-md-10">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="d)" name="d" required maxlength="150" autocomplete="off">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="custom-control custom-radio mb-3">
                        <input name="resposta" value="d" class="custom-control-input" id="2" type="radio">
                        <label class="custom-control-label" for="2">Alternativa Correta?</label>
                      </div>
                    </div>

                    <div class="col-md-10">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="e)" name="e" required maxlength="150" autocomplete="off">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="custom-control custom-radio mb-3">
                        <input name="resposta" value="e" class="custom-control-input" id="1" type="radio">
                        <label class="custom-control-label" for="1">Alternativa Correta?</label>
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