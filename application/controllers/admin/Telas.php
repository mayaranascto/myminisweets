<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telas extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Telas_model', 'telas');
    $this->load->helper('array');
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->load->library('table');
    $this->load->helper('url');
}

  public function index(){
    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('templates/footer');
  }

  public function cadastroCliente(){

    if($this->input->post()){

      $this->form_validation->set_message('required', 'O campo %s é obrigatório');
      $this->form_validation->set_message('is_unique', 'Esse CPF já se encontra cadastrado no nosso sistema');

      $this->form_validation->set_rules('primeiro_nome', 'Primeiro Nome', 'required|trim');
      $this->form_validation->set_rules('ultimo_nome', 'Último Nome', 'required|trim');
      $this->form_validation->set_rules('cpf', 'CPF', 'required|trim|is_unique[clientes.cpf]');
      $this->form_validation->set_rules('fixo', 'Telefone Fixo', 'trim');
      $this->form_validation->set_rules('celular', 'Celular', 'required|trim');
      $this->form_validation->set_rules('rua', 'Rua', 'required|trim');
      $this->form_validation->set_rules('num_casa', 'Número', 'required|trim');
      $this->form_validation->set_rules('bairro', 'Bairro', 'required|trim');
      $this->form_validation->set_rules('complemento', 'complemento', 'trim');
      $this->form_validation->set_rules('cidade', 'Cidade', 'required|trim');
      $this->form_validation->set_rules('cep', 'CEP', 'required|trim');
      $this->form_validation->set_rules('login', 'Login', 'required|trim');
      $this->form_validation->set_rules('senha', 'Senha', 'required|trim');
      $this->form_validation->set_rules('repita_senha', 'Repita Senha', 'required|trim');

      if($this->form_validation->run()==TRUE){
        // var_dump($this->input->post());
        // die();
        $data = elements(array('primeiro_nome', 'ultimo_nome', 'cpf', 'fixo', 'celular', 'rua', 'num_casa', 'bairro', 'complemento', 'cidade', 'cep', 'login', 'senha'), $this->input->post());
        $data['senha'] = md5($data['senha']);
        if($this->telas->inserirCliente($data)){
          $this->session->set_flashdata('cadastroOk', 'O Cliente foi cadastrado com sucesso');
        }else{
          $this->session->set_flashdata('cadastroFail', 'Ocorreu um erro com o cadastro');
        }
        redirect(base_url('admin/Telas/cadastroCliente'));
      }
    }

    $dados['clientes'] = $this->telas->getClientes()->result();


    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('admin/cadastroCliente');
    $this->load->view('admin/selectCliente', $dados);
    $this->load->view('templates/footer');

  }

  public function updateCliente($id){

    

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('admin/updateCliente');
    $this->load->view('templates/footer');
  }

  public function deleteCliente($id){
    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('admin/deleteCliente');
    $this->load->view('templates/footer');
  }

  public function cadastroProduto(){
    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('admin/cadastroProduto');
    $this->load->view('templates/footer');
  }

}
