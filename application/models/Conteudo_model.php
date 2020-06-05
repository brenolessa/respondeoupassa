<?php defined('BASEPATH') or exit('No direct script access allowed');

class Conteudo_model extends CI_model {

	private $id;
	private $nome;
	private $id_disciplina;
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
	
	public function cadastrar() {
		$dados = array(
			'nome' => $this->getNome(),
			'status' => $this->getStatus(),
			'id_disciplina' => $this->getIdDisciplina(),
			'id_usuario' => $this->getIdUsuario(),
			'data_cadastro' => $this->getDataCadastro(),
		);

		if ($this->db->insert('conteudos', $dados)) {
			return true;
		} else {
			return false;
		}
	}

	public function listar() {
		$this->db->select('id, nome');
		$this->db->where("status", 1);
		$this->db->where("id_disciplina", $this->getIdDisciplina());
		return $this->db->get('conteudos')->result();
	}

	public function buscar() {
		$this->db->select('id, nome');
		$this->db->where("id", $this->getId());
		return $this->db->get('conteudos')->row();
	}

}
