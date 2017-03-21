<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {
	
	public function index(){
		$query = $this->db->query("SELECT * FROM Categoria;");
		$categoria = array();
		foreach ($query->result_array() as $row){
			$categoria[] = $row;
		}
		$data['sessao'] = $this->sessao();
		$data['nome'] = $data['nome'] = $this->session->userdata('admin');
		$data['main'] = 'listarCategorias';
		$data['categoria'] = $categoria;
		$this->load->view('templates/html',$data);
	}
	
	public function inserir(){
        if ($this->validacao()){
        	$this->load->model('CategoriaModel', 'categoria');
			$nome = $this->input->post("nome");
			$ativo = $this->input->post("ativo");
			$this->categoria->__init__($nome,$ativo);
			$this->db->insert('Categoria',$this->categoria->obj());
			$this->db->affected_rows() > 0 ? $this->res(array("Msg" => "Categoria salva!"),200) : $this->res(array("Msg"=>"Categoria já existe!","Error" => 1),400);
        }else{
        	$this->res(array("Msg" => "Preencha os campos corretamente!", "Error" => 2),400);
        }
	}
	
	public function atualizar(){
		if ($this->validacao()){
			$this->load->model('CategoriaModel', 'categoria');
			$codigo = $this->input->post("codigo");
			$nome = $this->input->post("nome");
			$ativo = $this->input->post("ativo");
			$this->categoria->__init__($nome,$ativo,$codigo);
			$this->db->update('Categoria',$this->categoria->obj(), "cd_categoria = $codigo");
			$this->db->affected_rows() > 0 ? $this->res(array("Msg" => "Categoria atualizada!"),200) : $this->res(array("Msg"=>"Não foi possível atualizar.","Error" => 1),400);
		}else{
        	$this->res(array("Msg" => "Preencha os campos corretamente!", "Error" => 2),400);
        }
	}
	
	public function deletar(){
		$codigo = $this->input->post("codigo");
		$this->db->delete('Categoria', array('cd_categoria' => $codigo));
		$this->db->affected_rows() > 0 ? $this->res(array("Msg" => "Categoria deletada!"),200) : $this->res(array("Msg"=>"Não foi possível deletar."),400);
	}
	
	private function res($data,$codigo){
		return $this->output->set_content_type('application/json')->set_status_header($codigo)->set_output(json_encode($data));
	}
	
	private function validacao(){
		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[40]');
    	$this->form_validation->set_rules('ativo', 'Ativo', 'required|integer|in_list[0,1]');
    	return $this->form_validation->run();
	}
	
	public function sessao(){
		$sessao = $this->session->userdata("admin");
		return isset($sessao) ? true : false;
	}
}