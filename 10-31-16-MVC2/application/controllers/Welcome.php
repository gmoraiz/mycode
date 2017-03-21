<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
		$this->load->model('NomeModel','nome'); // o ultimo parametro representa o nome do objeto que possui referencia de memoria do tipo NomeModel.
        $this->nome->init("lol"); // init é o construtor da classe
		$this->nome->mostrar();
		$this->load->view('welcome_message');
	}
	
	public function teste(){
		echo "Ola mundo do CI!";
		$this->load->model('NomeModel','nome');
        $this->nome->init("Frederico");
        //ORM - Object Relational Mapping
        $b = $this->db->insert('tb_teste',$this->nome->toArray());
        echo "ACABOU! $b";
	}
	
	public function ola(){
		$this->load->view('ola');
		$sess = $this->session->userdata("nome");
		if(isset($sess)){
			echo $sess;
		}else{
			echo "Nao ha session";
		}
	}
	
	public function formulario(){
		$this->load->view('form');	
	}
	
	public function postar(){
		$nome = $this->input->post("nome");
		//HOJE NAO TEMOS MODEL
		$dado["nome"] = $nome;
		$b = $this->db->insert('users',$dado);
		echo "ACABOU! $b";
	}
	
	public function outro(){
		$postagem = $this->input->post("nome");
		echo $postagem;
		$this->session->set_userdata("nome",$postagem); //Criando sessão
		echo $this->session->userdata("nome"); 
	}
}
