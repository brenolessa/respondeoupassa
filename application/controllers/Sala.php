<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sala extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->load->model('sala_model');
	}

	public function exibir($view, $dados) {
        $this->load->view('layout/head');
        // $this->load->view('layout/sidebar');
        // $this->load->view('layout/header');
        $this->load->view('sala/' . $view, $dados);
        $this->load->view('layout/footer');
    }

	public function index() {
		$this->exibir('index', '');
	}
}
