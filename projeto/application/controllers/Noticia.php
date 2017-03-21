<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Sao_Paulo');
class Noticia extends CI_Controller {
	
	public function index(){
		$query = $this->db->query("SELECT nm_noticia, cd_noticia, nm_categoria, ds_imagem, DATE_FORMAT(N.dt_noticia, '%d/%m/%Y %H:%m:%s') as dt_noticia FROM Noticia as N inner join Categoria as C on N.cd_categoria = C.cd_categoria order by STR_TO_DATE(dt_noticia, '%d/%m/%Y');");
		$noticia = array();
		foreach ($query->result_array() as $row){
			$noticia[] = $row;
		}
		$data['sessao'] = $this->sessao();
		$data['nome'] = $data['nome'] = $this->session->userdata('admin');
		$data['main'] = 'listarNoticias';
		$data['noticia'] = $noticia;
		$this->load->view('templates/html',$data);
	}
	
	public function inserir(){ 
        if ($this->validacao()){
			$nome = $this->input->post("nome");
			$descricao = $this->input->post("descricao");
			$data = date('Y-m-d H:i');
			$codigoUsuario = $this->input->post("codigoUsuario");
			$codigoCategoria = $this->input->post("codigoCategoria");
			$imagem = isset($_FILES['imagem']['name']) ? $_FILES['imagem']['name'] : "";
			if($imagem !== ""){
				if(!$this->validaImagem($imagem)){
					$this->res(array("Msg" => "Erro no envio da imagem!", "Error" => 3),400);
					break;
				}
			}
			$this->load->model('NoticiaModel', 'noticia');
			$this->noticia->__init__($nome, $descricao, $data, $imagem, $codigoUsuario, $codigoCategoria);
			$this->db->insert('Noticia',$this->noticia->obj());
			$this->db->affected_rows() > 0 ? $this->res(array("Msg" => "Noticia salva!"),200) : $this->res(array("Msg"=>"Não foi possível salvar a noticia!","Error" => 1),400);
        }else{
        	$this->res(array("Msg" => "Preencha os campos corretamente!", "Error" => 2),400);
        }
	}
	
	public function view(){
		$this->load->view('listarNoticias');
	}
	
	public function exibir($codigo){
		$query = $this->db->query("SELECT * FROM Noticia as N inner join Categoria as C on N.cd_categoria = C.cd_categoria where cd_noticia = $codigo;");
		$noticia = $query->result_array();
		$data['sessao'] = $this->sessao();
		$data['nome'] = $data['nome'] = $this->session->userdata('admin');
		$data['noticia'] = $noticia;
		$data['main'] = 'exibirNoticia';
		$this->load->view('templates/html',$data);
	}
	
	public function pesquisar(){
		$codigo = $this->input->get("categoria");
		$nome = $this->input->get("nome");
		$query = $this->db->query("SELECT * FROM Noticia as N inner join Categoria as C on N.cd_categoria = C.cd_categoria where cd_categoria =  $codigo or nm_noticia like '".$nome."' order by dt_noticia;");
		$data = array();
		foreach ($query->result() as $row){
			$data[] = array("cd_noticia" => $row->cd_noticia, "nm_noticia" => $row->nm_noticia, "dt_noticia" => $row->dt_noticia, 
			"ds_imagem" => $row->ds_imagem, "cd_usuario" => $row->cd_usuario, "nm_categoria" => $row->nm_categoria, "cd_categoria" => $row->cd_categoria);
		}
		$data !== [] ?$this->res($data,200) : $this->res(array("Msg" => "Nenhuma noticia encontrada."),400);
	}
	
	public function atualizar(){
		if ($this->validacao()){
			$codigo = $this->input->post("codigo");
			$nome = $this->input->post("nome");
			$descricao = $this->input->post("descricao");
			$data = $this->input->post("data");
			$codigoUsuario = $this->input->post("codigoUsuario");
			$codigoCategoria = $this->input->post("codigoCategoria");
			$imagem = isset($_FILES['imagem']['name']) ? $_FILES['imagem']['name'] : "";
			if($imagem !== ""){
				if(!$this->validaImagem($imagem)){
					$this->res(array("Msg" => "Erro no envio da imagem!", "Error" => 3),400);
					break;
				}
			}
			$this->load->model('NoticiaModel', 'noticia');
			$this->noticia->__init__($nome, $descricao, $data, $imagem, $codigoUsuario, $codigoCategoria, $codigo);
			$this->db->update('Noticia',$this-> noticia->obj(), "cd_noticia = $codigo");
			$this->db->affected_rows() > 0 ? $this->res(array("Msg" => "Noticia atualizada!"),200) : $this->res(array("Msg"=>"Não foi possível atualizar.","Error" => 1),400);
		}else{
        	$this->res(array("Msg" => "Preencha os campos corretamente!", "Error" => 2),400);
        }
	}
	
	public function deletar(){
		$codigo = $this->input->post("codigo");
		$this->db->delete('Noticia', array('cd_noticia' => $codigo));
		$this->db->affected_rows() > 0 ? $this->res(array("Msg" => "Noticia deletada!"),200) : $this->res(array("Msg"=>"Não foi possível deletar."),400);
	}
	
	private function res($data,$codigo){
		return $this->output->set_content_type('application/json')->set_status_header($codigo)->set_output(json_encode($data));
	}
	
	private function validacao(){
		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[70]');
    	$this->form_validation->set_rules('descricao', 'Descricao', 'required');
    	$this->form_validation->set_rules('codigoCategoria','CodigoCategoria','required|integer');
    	$this->form_validation->set_rules('codigoUsuario','CodigoUsuario','required|integer');
    	return $this->form_validation->run();
	}
	
	private function validaImagem($imagem){
        $config['upload_path'] = '/home/ubuntu/workspace/projeto/uploads';
        $config['allowed_types'] = 'jpg|png';
        $config['file_name']= $imagem;
        $config['max_size']   = 4096;
        $config['max_width']  = 1920;
        $config['max_height']  = 1080;
        $this->upload->initialize($config);
        if($this->upload->do_upload("imagem")){
            return true;
        } else{
        	return false;
        }
	}
	
	public function sessao(){
		$sessao = $this->session->userdata("admin");
		return isset($sessao) ? true : false;
	}
}