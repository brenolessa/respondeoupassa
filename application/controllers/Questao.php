<?php defined('BASEPATH') or exit('No direct script access allowed');

class Questao extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('questao_model');
    }

    public function exibir($view, $dados) {
        $this->load->view('layout/head');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/header');
        $this->load->view('questao/' . $view, $dados);
        $this->load->view('layout/footer');
    }

    public function listar() {

        // if ($this->session->userdata['usuariologado']['permissoes']['v_bancos'] != 1) {
        //     redirect('erro/negado');
        // }
        $id_disciplina = $this->uri->segment(3);
        $id_conteudo = $this->uri->segment(4);
        

        if ($id_conteudo) {

            $this->load->model('disciplina_model');
            $this->disciplina_model->setId($id_disciplina);
            $dados['disciplina'] = $this->disciplina_model->buscar();

            $this->load->model('conteudo_model');
            $this->conteudo_model->setId($id_conteudo);
            $dados['conteudo'] = $this->conteudo_model->buscar();

            // $dados['id_conteudo'] = $id_conteudo;
            // $dados['id_disciplina'] = $id_disciplina;

            $this->questao_model->setStatus(1);
            $this->questao_model->setIdDisciplina($id_disciplina);
            $this->questao_model->setIdConteudo($id_conteudo);
            $dados['resultado'] = $this->questao_model->listar();
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
        $id_conteudo = $this->uri->segment(4);
        
        // $dados['id_disciplina'] = $id_disciplina;

        if ($id_disciplina) {

            $this->load->model('disciplina_model');
            $this->disciplina_model->setId($id_disciplina);
            $dados['disciplina'] = $this->disciplina_model->buscar();

            $this->load->model('conteudo_model');
            $this->conteudo_model->setId($id_conteudo);
            $dados['conteudo'] = $this->conteudo_model->buscar();

            if (isset($_POST['btn_cadastrar'])) {
            
                $this->questao_model->setNome($this->input->post("descricao"));
                $this->questao_model->setStatus(1);
                $this->questao_model->setIdUsuario(1);
                $this->questao_model->setIdDisciplina($id_disciplina);
                $this->questao_model->setIdConteudo($id_conteudo);
                date_default_timezone_set('America/Bahia');
                $this->questao_model->setDataCadastro(date('Y-m_d H:i:s'));

                $id_questao = $this->questao_model->cadastrar();

                if ($id_questao) {

                    $alfabeto = ['a', 'b', 'c', 'd', 'e'];
                    for ($i=0; $i < 5; $i++) { 
                        $alternativa = $this->input->post($alfabeto[$i]);
                        $correta = $alfabeto[$i] == $this->input->post($resposta) ? 1 : 0;
                        $result = $this->questao_model->cadastrar_alternativas($alternativa, $id_questao, $correta);
                    }
                    
                    redirect("questao/listar/$id_disciplina/$id_conteudo");

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

    public function alternativas() {

        // if ($this->session->userdata['usuariologado']['permissoes']['v_bancos'] != 1) {
        //     redirect('erro/negado');
        // }
        $id_questao = $this->uri->segment(3);        

        if ($id_questao) {

            $dados['dados'] = $this->questao_model->dados_questao($id_questao);

            $dados['alternativas'] = $this->questao_model->listar_alternativas($id_questao);

            $this->exibir('listar_alternativas', $dados);
        } else {
            redirect('disciplina');
        }
    }

}
