<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <link href="<?php echo base_url('assets/img/brand/favicon.png'); ?>" rel="icon" type="image/png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Passa ou Repassa</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="<?php echo base_url('assets/js/plugins/nucleo/css/nucleo.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/argon-dashboard.css?v=1.1.0'); ?>" rel="stylesheet" />
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="../index.html">
          <img src="<?php echo base_url('assets/img/brand/white.png'); ?>" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.html">
                  <img src="<?php echo base_url('assets/img/brand/blue.png'); ?>">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
          <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item">
              <a class="nav-link nav-link-icon" href="../index.html">
                <i class="ni ni-planet"></i>
                <span class="nav-link-inner--text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="../examples/register.html">
                <i class="ni ni-circle-08"></i>
                <span class="nav-link-inner--text">Register</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="../examples/login.html">
                <i class="ni ni-key-25"></i>
                <span class="nav-link-inner--text">Login</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="../examples/profile.html">
                <i class="ni ni-single-02"></i>
                <span class="nav-link-inner--text">Profile</span>
              </a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <!-- <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Bem-Vindo!</h1>
              <p class="text-lead text-light">Realize login para utilizar o ambiente do passa ou repassa.</p>
            </div>
          </div>
        </div>
      </div> -->
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>CADASTRAR NOVO USUÁRIO</small>
              </div>
              <form role="form">

              <div class="row">
                
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="Nome">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="E-mail">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <input type="password" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="Senha">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="Nome da organização">
                  </div>
                </div>

                 <div class="col-md-12">
                  <div class="form-group">
                    <select class="form-control form-control-alternative">
                      <option>Selecionar Perfil</option>
                      <option>Professor</option>
                      <option>Aluno</optProfessorion>
                    </select>
                  </div>
                </div>

              </div>

                <div class="text-center">
                  <button type="button" class="btn btn-primary my-4">Cadastrar</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <!-- <a href="#" class="text-light"><small>Recuperar Senha</small></a> -->
            </div>
            <div class="col-6 text-right">
              <a href="<?php echo base_url('login'); ?>" class="text-light"><small>Entrar</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="py-4">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
            2019 <span class="font-weight-bold ml-1">Breno Lessa</span>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
              	Desenvolvido para a disciplina de TID II - FTC
                <p>Orientador: Fabrício / Docente: Lucas</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core   -->
  <script src="<?php echo base_url('assets/js/plugins/jquery/dist/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="<?php echo base_url('assets/js/argon-dashboard.min.js?v=1.1.0'); ?>"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>