<?php defined('BASEPATH') or exit('No direct script access allowed');

class Conteudo extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('conteudo_model');
    }

    public function exibir($view, $dados) {
        $this->load->view('layout/head');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/header');
        $this->load->view('conteudo/' . $view, $dados);
        $this->load->view('layout/footer');
    }

    public function listar() {

        // if ($this->session->userdata['usuariologado']['permissoes']['v_bancos'] != 1) {
        //     redirect('erro/negado');
        // }

        $id_disciplina = $this->uri->segment(3);

        if ($id_disciplina) {
            $this->load->model('disciplina_model');
            $this->disciplina_model->setId($id_disciplina);
            $dados['disciplina'] = $this->disciplina_model->buscar();
            
            $dados['id_disciplina'] = $id_disciplina;
            $this->conteudo_model->setStatus(1);
            $this->conteudo_model->setIdDisciplina($id_disciplina);
            $dados['resultado'] = $this->conteudo_model->listar();
            $this->exibir('listar', $dados);
        } else {
            redirect('disciplina');
        }
    }

    public function cadastrar() {
        
        // if ($this->session->userdata['usuariologado']['permissoes']['c_bancos'] != 1) {
        //     redirect('erro/negado');
        // }

        $id_disciplina = $this->uri->segment(3);

        // $dados['id_disciplina'] = $id_disciplina;

        if ($id_disciplina) {

            $this->load->model('disciplina_model');
            $this->disciplina_model->setId($id_disciplina);
            $dados['disciplina'] = $this->disciplina_model->buscar();

            if (isset($_POST['btn_cadastrar'])) {
            
                $this->conteudo_model->setNome($this->input->post("nome"));
                $this->conteudo_model->setStatus(1);
                $this->conteudo_model->setIdUsuario(1);
                $this->conteudo_model->setIdDisciplina($id_disciplina);
                date_default_timezone_set('America/Bahia');
                $this->conteudo_model->setDataCadastro(date('Y-m_d H:i:s'));

                $result = $this->conteudo_model->cadastrar();

                if ($result) {
                    
                    redirect("conteudo/listar/$id_disciplina");

                } else {

                    $this->session->set_flashdata('msg_titulo', 'ERRO!');
                    $this->session->set_flashdata('msg_conteudo', 'Não foi possível cadastrar.');
                    $this->session->set_flashdata('msg_tipo', 'danger');
                }
            }

            $this->exibir('cadastrar', $dados);

        } else {
            redirect('disciplina');
        }

    }

}
