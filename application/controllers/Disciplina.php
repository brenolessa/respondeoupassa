<?php defined('BASEPATH') or exit('No direct script access allowed');

class Disciplina extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('disciplina_model');
        // $this->load->library('Encrypt');
        // $this->encript = new Encrypt($this->config->item('key'));
    }

    public function exibir($view, $dados) {
        $this->load->view('layout/head');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/header');
        $this->load->view('disciplina/' . $view, $dados);
        $this->load->view('layout/footer');
    }

    public function index() {

        // if ($this->session->userdata['usuariologado']['permissoes']['v_bancos'] != 1) {
        //     redirect('erro/negado');
        // }

        $this->disciplina_model->setStatus(1);
        // if ($this->session->userdata['usuariologado']['empresa']) {
        //     $this->disciplina_model->setIdEmpresa($this->session->userdata['usuariologado']['empresa']);
        // } else {
        //     $this->disciplina_model->setIdEmpresa($this->session->userdata['usuariologado']['id_empresa']);
        // }
        $disciplinas = $this->disciplina_model->listar();
        foreach ($disciplinas as $d) {
            $d->id_encript = $d->id;
        }
        $dados['disciplinas'] = $disciplinas;

        $this->exibir('listar', $dados);
    }

    public function cadastrar() {
        
        // if ($this->session->userdata['usuariologado']['permissoes']['c_bancos'] != 1) {
        //     redirect('erro/negado');
        // }

        if (isset($_POST['btn_cadastrar'])) {
            
            $this->disciplina_model->setNome($this->funcoes->validar_input($this->input->post("nome")));
            $this->disciplina_model->setStatus(1);
            // if ($this->session->userdata['usuariologado']['empresa']) {
            //     $this->banco_model->setIdEmpresa($this->session->userdata['usuariologado']['empresa']);
            // } else {
            //     $this->banco_model->setIdEmpresa($this->session->userdata['usuariologado']['id_empresa']);
            // }$this->session->userdata['usuariologado']['id']
            $this->disciplina_model->setIdUsuario(1);
            date_default_timezone_set('America/Bahia');
            $this->disciplina_model->setDataCadastro(date('Y-m_d H:i:s'));

            $result = $this->disciplina_model->cadastrar();

            if ($result) {
                
                redirect('disciplina');

            } else {

                $this->session->set_flashdata('msg_titulo', 'ERRO!');
                $this->session->set_flashdata('msg_conteudo', 'Não foi possível cadastrar.');
                $this->session->set_flashdata('msg_tipo', 'danger');
            }
        }

        $this->exibir('cadastrar', '');

    }


    public function editar()
    {
        /*Bloqueando acesso de acordo com a permissao*/
        if ($this->session->userdata['usuariologado']['permissoes']['e_bancos'] != 1) {
            redirect('erro/negado');
        }
        /*Fim do bloqueio de acesso*/

        $id_encript = $this->uri->segment(3);
        $id = $this->encript->decriptar($id_encript);

        if ($id) {

            $dados['msg'] = '';
            if (isset($_POST['btn_salvar'])) {

                $this->banco_model->setId($id);
                $this->banco_model->setNome($this->funcoes->validar_input($this->input->post("nome")));
                //$this->banco_model->setIdEmpresa($this->session->userdata['usuariologado']['empresa']);
                $this->banco_model->setIdAlteracao($this->session->userdata['usuariologado']['id']);
                date_default_timezone_set('America/Bahia');
                $this->banco_model->setDataAlteracao(date('Y-m-d H:i:s'));

                $result = $this->banco_model->editar();

                if ($result) {

                    $this->session->set_flashdata('msg_alerta', 2);

                    $this->log_model->setIdUsuario($this->session->userdata['usuariologado']['id']);
                    date_default_timezone_set('America/Bahia');
                    $this->log_model->setDataHoraAcao(date('Y-m-d H:i:s'));
                    $this->log_model->setAcaoExecutada("Editou Banco");
                    $ip_do_usuario = $this->funcoes->getUserIP();
                    $this->log_model->setIpAcesso($ip_do_usuario);
                    $result = $this->log_model->acao();

                    redirect('bancos/editar/' . $id_encript);
                } else {

                    $this->session->set_flashdata('msg_titulo', 'ERRO!');
                    $this->session->set_flashdata('msg_conteudo', 'Não foi possível editar.');
                    $this->session->set_flashdata('msg_tipo', 'danger');
                }

                redirect('bancos');
            } else {

                $this->log_model->setIdUsuario($this->session->userdata['usuariologado']['id']);
                date_default_timezone_set('America/Bahia');
                $this->log_model->setDataHoraAcao(date('Y-m-d H:i:s'));
                $this->log_model->setAcaoExecutada("Tela de Editar Banco");
                $ip_do_usuario = $this->funcoes->getUserIP();
                $this->log_model->setIpAcesso($ip_do_usuario);
                $result = $this->log_model->acao();
            }


            $this->banco_model->setId($id);
            $dados['banco'] = $this->banco_model->pesquisar_banco_id();
            $dados['id'] = $id_encript;

            $this->exibir('banco_editar', $dados);
        } else {
            redirect('bancos');
        } //fim if else verificacao id
    } //fim function editar

    public function excluir()
    {

        /*Bloqueando acesso de acordo com a permissao*/
        if ($this->session->userdata['usuariologado']['permissoes']['r_bancos'] != 1) {
            redirect('erro/negado');
        }
        /*Fim do bloqueio de acesso*/

        $this->log_model->setIdUsuario($this->session->userdata['usuariologado']['id']);
        date_default_timezone_set('America/Bahia');
        $this->log_model->setDataHoraAcao(date('Y-m-d H:i:s'));
        $this->log_model->setAcaoExecutada("Clicou em Excluir Banco");
        $ip_do_usuario = $this->funcoes->getUserIP();
        $this->log_model->setIpAcesso($ip_do_usuario);
        $result = $this->log_model->acao();

        $id_encript = $this->uri->segment(3);
        $id = $this->encript->decriptar($id_encript);
        $this->banco_model->setStatus(0);
        $this->banco_model->setId($id);
        $this->banco_model->setIdAlteracao($this->session->userdata['usuariologado']['id']);
        date_default_timezone_set('America/Bahia');
        $this->banco_model->setDataAlteracao(date('Y-m-d H:i:s'));

        $result = $this->banco_model->excluir();

        if ($result) {

            $this->session->set_flashdata('msg_titulo', 'SUCESSO!');
            $this->session->set_flashdata('msg_conteudo', 'O Banco foi excluído.');
            $this->session->set_flashdata('msg_tipo', 'success');

            redirect('bancos');
        } else {
            $this->session->set_flashdata('msg_titulo', 'ERRO!');
            $this->session->set_flashdata('msg_conteudo', 'Não foi possível excluir.');
            $this->session->set_flashdata('msg_tipo', 'danger');

            redirect('bancos');
        }
    } //fim function excluir

    public function visualizar()
    {
        /*Bloqueando acesso de acordo com a permissao*/
        if ($this->session->userdata['usuariologado']['permissoes']['v_bancos'] != 1) {
            redirect('erro/negado');
        }
        /*Fim do bloqueio de acesso*/

        $id_encript = $this->uri->segment(3);
        $id = $this->encript->decriptar($id_encript);

        if ($id) {

            $this->banco_model->setId($id);
            $dados['banco'] = $this->banco_model->pesquisar_banco_id();
            $dados['id'] = $id;

            $this->exibir('banco_visualizar', $dados);
        } else {
            redirect('bancos');
        }
    } //fim function visualizar

    public function checar_input()
    {
        $valor = $this->input->post('valor');
        $coluna = $this->input->post('coluna');
        $id = $this->input->post('id');

        $this->banco_model->setStatus(1);

        if ($this->session->userdata['usuariologado']['empresa']) {
            $this->banco_model->setIdEmpresa($this->session->userdata['usuariologado']['empresa']);
        } else {
            $this->banco_model->setIdEmpresa($this->session->userdata['usuariologado']['id_empresa']);
        }
        $bancos = $this->banco_model->listar();

        foreach ($bancos as $key => $banco) {
            $banco = (array)$banco;

            if ($id == null) {
                if ($banco[$coluna] == $valor) {
                    $response['status'] = true;
                    echo json_encode($response);
                    return true;
                }
            } else {
                if ($banco[$coluna] == $valor && $banco['id'] != $id) {
                    $response['status'] = true;
                    echo json_encode($response);
                    return true;
                }
            } //fim if else verificao id null

        } //fim foreach

        $response['status'] = false;
        echo json_encode($response);
    } //fim function checar_input

}//fim controller Bancos
