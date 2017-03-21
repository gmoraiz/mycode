<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disciplina extends CI_Controller {
	
	public function cadastro(){
		$this->load->view('formDisciplina');
	}
	
	public function perfil($id){
        $this->load->model('DisciplinaModel','disciplina');
        $query = $this->db->query("SELECT * FROM tb_disciplina where cd_disciplina=$id;");
        $disciplina = $query->result('tb_disciplina');
        $data["nome"] = $disciplina[0]->nm_disciplina;
        $data["desc"] = $disciplina[0]->ds_disciplina;
        $this->load->view('perfil',$data);
    }
	
	public function postar(){
		$this->load->model('DisciplinaModel','disc');
		$nome = $this->input->post("nome");
		$desc = $this->input->post("descricao");
        $this->disc->__init__($nome,$desc);
        $b = $this->db->insert('tb_disciplina',$this->disc->toArray());
        echo "Inserido com sucesso! $b";
	}
	
}
