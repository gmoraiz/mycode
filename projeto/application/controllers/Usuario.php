<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	public function index(){
		if(!$this->sessao()){
			$data['main'] = 'login';
			$data['nome'] = $this->session->userdata('admin');
			$data['sessao'] = $this->sessao();
			$this->load->view('templates/html',$data);
		} else {
			 redirect('/', 'refresh');
		}
	}
	
	public function logar(){
		if($this->validacao()){
			$email = $this->input->post('email');
			$senha = $this->input->post('senha');
			$query = $this->db->query("SELECT * FROM Usuario where ds_email = '".$email."' and ds_senha = '".$senha."';");
			$data = $query->result_array();
			if($data !== []){
				$nome = "";
				foreach ($data as $a){
					$nome = $a['nm_usuario'];
				}
				$this->session->set_userdata("admin",$nome); //Criando sessão
				$this->res($data,200);
			}else{
				$this->res(array("Msg" => "Dados inválidos.", "Error" => 1),400);
			}
		} else {
			$this->res(array("Msg" => "Preencha os campos corretamente!", "Error" => 2),400);
		}
	}
	
	private function validacao(){
		$this->form_validation->set_rules('email', 'Email', 'required|max_length[60]');
    	$this->form_validation->set_rules('senha', 'Senha', 'required|max_length[30]');
    	return $this->form_validation->run();
	}
	
	private function res($data,$codigo){
		$this->output->set_content_type('application/json')->set_status_header($codigo)->set_output(json_encode($data));
	}
	
	public function deslogar(){
		 $this->session->unset_userdata("admin");
		 redirect('/', 'refresh');
	}
	
	public function sessao(){
		$sessao = $this->session->userdata("admin");
		return isset($sessao) ? true : false;
	}
}