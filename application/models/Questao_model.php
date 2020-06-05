<?php defined('BASEPATH') or exit('No direct script access allowed');

class Questao_model extends CI_model {

	private $id;
	private $nome;
	private $id_disciplina;
	private $id_conteudo;
	private $status;
	private $id_usuario;
	private $data_cadastro;
	private $data_alteracao;

	public function __construct() {
		parent::__construct();
	}

	/*Inicio dos getters e setters*/
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
		return $this->id;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
		return $this->nome;
	}

	public function getDataCadastro()
	{
		return $this->data_cadastro;
	}

	public function setDataCadastro($data_cadastro)
	{
		$this->data_cadastro = $data_cadastro;
		return $this->data_cadastro;
	}

	public function getDataAlteracao()
	{
		return $this->data_alteracao;
	}

	public function setDataAlteracao($data_alteracao)
	{
		$this->data_alteracao = $data_alteracao;
		return $this->data_alteracao;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function setStatus($status)
	{
		$this->status = $status;
		return $this->status;
	}

	public function getIdUsuario()
	{
		return $this->id_usuario;
	}

	public function setIdUsuario($id_usuario)
	{
		$this->id_usuario = $id_usuario;

		return $this;
	}

	public function getIdDisciplina()
	{
		return $this->id_disciplina;
	}

	public function setIdDisciplina($id_disciplina)
	{
		$this->id_disciplina = $id_disciplina;

		return $this;
	}

	public function getIdConteudo()
	{
		return $this->id_conteudo;
	}

	public function setIdConteudo($id_conteudo)
	{
		$this->id_conteudo = $id_conteudo;

		return $this;
	}
	
	public function cadastrar() {
		$dados = array(
			'descricao' => $this->getNome(),
			// 'status' => $this->getStatus(),
			'id_disciplina' => $this->getIdDisciplina(),
			'id_conteudo' => $this->getIdConteudo(),
			'id_usuario' => $this->getIdUsuario(),
			'data_cadastro' => $this->getDataCadastro(),
		);

		if ($this->db->insert('questoes', $dados)) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function listar() {
		$this->db->select('id, descricao');
		// $this->db->where("status", 1);
		$this->db->where("id_disciplina", $this->getIdDisciplina());
		return $this->db->get('questoes')->result();
	}

	public function cadastrar_alternativas($alternativa, $id_questao, $correta) {
		$dados = array(
			'descricao' => $alternativa,
			'id_questao' => $id_questao,
			'correta' => $correta
		);

		if ($this->db->insert('alternativas', $dados)) {
			return true;
		} else {
			return false;
		}
	}

	public function dados_questao($id_questao) {
		$this->db->select('q.id, q.descricao, conteudos.nome as conteudo, disciplinas.nome as disciplina');
		$this->db->from("questoes q");
		$this->db->join("disciplinas", 'disciplinas.id = q.id_disciplina');
		$this->db->join("conteudos", 'conteudos.id = q.id_conteudo');
		$this->db->where("q.id", $id_questao);
		return $this->db->get()->row();
	}

	public function listar_alternativas($id_questao) {
		$this->db->select('a.id, a.descricao, a.correta');
		$this->db->from("alternativas a");
		$this->db->where("id_questao", $id_questao);
		return $this->db->get()->result();
	}

}
