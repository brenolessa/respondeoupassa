<?php defined('BASEPATH') or exit('No direct script access allowed');

if (!$this->session->has_userdata('usuario_pr')) {
    // redirect('login', 'refresh');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Passa ou Repassa
  </title>
  <!-- Favicon -->
  <link href="<?php echo base_url('assets/img/brand/favicon.png'); ?>" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?php echo base_url('assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet'); ?>" />
  <link href="<?php echo base_url('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?php echo base_url('assets/css/argon-dashboard.css?v=1.1.0'); ?>" rel="stylesheet" />
</head>

<body class="">