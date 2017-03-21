<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	//Controller do CodeIgniter, é necessário fazer a herança do CI_Controller.
	public function index(){
		//load carrega um arquivo e view printa o código html na tela.
		$this->load->view('welcome_message');
	}
	
	public function olaMundo(){
		$this->load->view('ola');
	}
	//Funcao que exibirá o html do formulario
	public function formulario(){
		$this->load->view('form');
	}
	//Funcao que irá receber o post do formulario
	public function postar(){
		$nome = $this->input->post("nome");
		//No array associativo o nome da chave tem que ser o da coluna no banco.
		$dado['nm_login'] = $nome;
		// o primeiro parametro é a tabela, o segundo o array com os dados.
		$this->db->insert('tb_teste', $dado);
		echo "FOI";
	}
}
