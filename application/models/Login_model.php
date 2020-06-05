<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public function logar($login, $senha)
    {

        $this->db->select("u.id, u.id_empresa, u.nome, u.id_grupo_permissoes, u.status, u.visao_unidade, u.todos_unidade, u.visao_motorista, u.todos_motorista, u.visao_setor_almoxarifado, u.todos_setor_almoxarifado, u.visao_setor_financeiro, u.todos_setor_financeiro, u.visao_dashboard, u.todos_dashboard, u.id_setor, h.id as hierarquia, h.tipo_hierarquia, h.status as status_hierarquia, h.id_empresa as empresa_hierarquia, u.login, u.senha, u.ultimo_acesso, a.permissoes as permissoes, cd.id as id_caixa_dia, cde.id as id_caixa_dia_empresa, e.id as id_estabelecimento, uc.id_caixa_setor as id_caixa_setor, cs.visualiza_contas_receber_cobrador as permissao_cobrador ,cs.visualiza_contas_receber_agencia_propria as permissao_agencia_propria, cs.visualiza_contas_receber_agencia_terceirizada as permissao_agencia_terceirizada, cs.visualiza_contas_receber_proprio as permissao_caixa_proprio");
        $this->db->from('usuarios u');
        $this->db->join('grupo_permissoes a', 'u.id_grupo_permissoes = a.id', 'left');
        $this->db->join('hierarquias h', 'u.id = h.id_usuario', 'left');
        $this->db->join('usuarios_caixa uc', 'u.id = uc.id_usuario', 'left');
        $this->db->join('caixa_dia cd', 'uc.id_caixa_setor = cd.id_caixa_setor and cd.status = 1', 'left');   
        $this->db->join('caixa_dia_empresa cde', 'cd.id = cde.id_caixa_dia and cde.status = 1', 'left');        
		$this->db->join('caixas_setores as cs', 'uc.id_caixa_setor = cs.id', 'left');
		$this->db->join('setores as s', 'cs.id_setor = s.id', 'left');
		$this->db->join('estabelecimentos as e', 's.id_estabelecimento = e.id', 'left');
        $this->db->where("login", $login);
        $this->db->where_in("u.status", [1, 2]);
        $this->db->limit(1);

        $user = $this->db->get();

        if ($user->num_rows() == 0) {

            return 'invalido';
        }

        if ($user->result_array()[0]['status'] == 2) {
            return "bloqueado";
        }

        if (!password_verify($senha, $user->result_array()[0]['senha'])) {
            return 'invalido';
        } else {
            $u = $user->result_array();
            // REGISTRA ACESSO
            date_default_timezone_set('America/Bahia');
            $data = date("Y-m-d H:i:s");
            $this->atualizar_acesso($data, $u[0]['id']);
            return $u[0];
        }
    }

    public function atualizar_acesso($data, $id)
    {
        $ip_do_usuario = $this->funcoes->getUserIP();
        $dados = array(
            'ultimo_acesso' => $data,
            'ip_acesso' => $ip_do_usuario
        );
        $this->db->update('usuarios', $dados, "id={$id}");
    }
}
