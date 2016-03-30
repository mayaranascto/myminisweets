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
    $this->load->helper('html');
    $this->auth->validarAuth(base_url('admin'));
}

  public function index(){
    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('templates/footer');
  }

  public function cadastroCliente(){

    if($this->input->post()){

      $this->form_validation->set_message('required', 'O campo %s é obrigatório');
      $this->form_validation->set_message('is_unique', 'Esse %s já se encontra cadastrado no nosso sistema');

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
      $this->form_validation->set_rules('login', 'Login', 'required|trim|is_unique[clientes.login]');
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

    $dados['clientes'] = $this->telas->getAllClientes()->result();


    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('admin/clientes/cadastroCliente');
    $this->load->view('admin/clientes/selectCliente', $dados);
    $this->load->view('templates/footer');

  }

  public function updateCliente($id){

    if($id==NULL){
      redirect(base_url('admin/Telas/cadastroCliente'));
    }

    if($this->input->post()){
      $this->form_validation->set_message('required', 'O campo %s é obrigatório');
      //$this->form_validation->set_message('is_unique', 'Esse CPF já se encontra cadastrado no nosso sistema');

      $this->form_validation->set_rules('primeiro_nome', 'Primeiro Nome', 'required|trim');
      $this->form_validation->set_rules('ultimo_nome', 'Último Nome', 'required|trim');
      //$this->form_validation->set_rules('cpf', 'CPF', 'required|trim|is_unique[clientes.cpf]');
      $this->form_validation->set_rules('fixo', 'Telefone Fixo', 'trim');
      $this->form_validation->set_rules('celular', 'Celular', 'required|trim');
      $this->form_validation->set_rules('rua', 'Rua', 'required|trim');
      $this->form_validation->set_rules('num_casa', 'Número', 'required|trim');
      $this->form_validation->set_rules('bairro', 'Bairro', 'required|trim');
      $this->form_validation->set_rules('complemento', 'complemento', 'trim');
      $this->form_validation->set_rules('cidade', 'Cidade', 'required|trim');
      $this->form_validation->set_rules('cep', 'CEP', 'required|trim');
      //$this->form_validation->set_rules('login', 'Login', 'required|trim');
      //$this->form_validation->set_rules('senha', 'Senha', 'required|trim');
      //$this->form_validation->set_rules('repita_senha', 'Repita Senha', 'required|trim');

      if($this->form_validation->run()==TRUE){


        $data = elements(array('primeiro_nome', 'ultimo_nome', 'fixo', 'celular', 'rua', 'num_casa', 'bairro', 'complemento', 'cidade', 'cep'), $this->input->post());
        // var_dump($data);
        // die();
        if($this->telas->alterarCliente($id,$data)){
          $this->session->set_flashdata('updateOk', 'O Cliente foi cadastrado com sucesso');
        }else{
          $this->session->set_flashdata('updateFail', 'Ocorreu um erro com o cadastro');
        }

      }
    }

    $dados['cliente'] = $this->telas->getById($id)->row();

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('admin/clientes/updateCliente', $dados);
    $this->load->view('templates/footer');
  }

  public function deleteCliente($id){

    if($id==NULL){
      redirect(base_url('admin/Telas/cadastroCliente'));
    }

    if($this->input->post('sim')){
      if($this->telas->excluirCliente($id)){
          $this->telas->excluirCliente($id);
          $this->session->set_flashdata('deleteOk', 'O Cliente foi excluído com sucesso');
          redirect('admin/Telas/cadastroCliente');
      }else{
          $this->session->set_flashdata('deleteFail', 'Ocorreu um erro no processo de exclusão');
          redirect('admin/Telas/cadastroCliente');
      }

    }else if($this->input->post('nao')){
      redirect(base_url('admin/Telas/cadastroCliente'));
    }

    $dados['cliente'] = $this->telas->getById($id)->row();

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('admin/clientes/deleteCliente', $dados);
    $this->load->view('templates/footer');
  }

  public function cadastroProduto(){

    if($this->input->post()){

      $this->form_validation->set_message('required', 'O campo %s é obrigatório');

      $this->form_validation->set_rules('nome_produto', 'Nome', 'required|trim');
      $this->form_validation->set_rules('descricao', 'Descrição', 'required|trim');
      $this->form_validation->set_rules('preco', 'Preço', 'required|trim');
      if($_FILES['img_url']['size']==0){
        $this->form_validation->set_rules('img_url', 'Imagem do Produto', 'required');
      }

      if($this->form_validation->run()==TRUE){
        $data = elements(array('nome_produto', 'descricao', 'preco'), $this->input->post());

        $config['upload_path']          = PATHDEFAULT.'assets'.DS.'img'.DS.'produtos';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);
        if($this->upload->do_upload('img_url')){
          $data['img_url'] = $this->upload->data('file_name');
        }

        if($this->telas->cadastroProduto($data)){
          $this->session->set_flashdata('cadastroOk', 'O Produto foi cadastrado com sucesso');
        }else{
          $this->session->set_flashdata('cadastroFail', 'Ocorreu um erro com o cadastro');
        }
      }
    }

    $dados['produtos'] = $this->telas->getAllProducts()->result();

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('admin/produtos/cadastroProduto');
    $this->load->view('admin/produtos/selectProduto', $dados);
    $this->load->view('templates/footer');
  }

  public function verProduto($idProduto){

    if($idProduto==NULL){
      redirect(base_url('admin/Telas/cadastroProduto'));
    }

    $dados['produto'] = $this->telas->getProductById($idProduto)->row();

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('admin/produtos/verProduto', $dados);
    $this->load->view('templates/footer');
  }

  public function updateProduto($idProduto){

    if($idProduto==NULL){
      redirect(base_url('admin/Telas/cadastroProduto'));
    }

    if($this->input->post()){

      $this->form_validation->set_message('required', 'O campo %s é obrigatório');

      $this->form_validation->set_rules('nome_produto', 'Nome', 'required|trim');
      $this->form_validation->set_rules('descricao', 'Descrição', 'required|trim');
      $this->form_validation->set_rules('preco', 'Preço', 'required|trim');

      if($this->form_validation->run()==TRUE){
        $data = elements(array('nome_produto', 'descricao', 'preco'), $this->input->post());

        $config['upload_path']          = PATHDEFAULT.'assets'.DS.'img'.DS.'produtos';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);
        if($this->upload->do_upload('img_url')){
          $data['img_url'] = $this->upload->data('file_name');
        }

        if($this->telas->updateProduto($idProduto, $data)){
          $this->session->set_flashdata('updateOk', 'O produto foi atualizado com sucesso');
          redirect(base_url('admin/Telas/cadastroProduto'));
        }else{
          $this->session->set_flashdata('updateFail', 'Ocorreu um erro com a atualização');
          redirect(base_url('admin/Telas/cadastroProduto'));
        }
      }
    }

    $dados['produto'] = $this->telas->getProductById($idProduto)->row();

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('admin/produtos/updateProduto', $dados);
    $this->load->view('templates/footer');
  }

  public function deleteProduto($idProduto){

    if($idProduto==NULL){
      redirect('admin/Telas/cadastroProduto');
    }

    if($this->input->post('sim')){
      if($this->telas->deleteProduto($idProduto)){
        $this->telas->deleteProduto($idProduto);
        $this->session->set_flashdata('deleteOk', 'O produto foi excluido com sucesso');
        redirect('admin/Telas/cadastroProduto');
      }else{
        $this->session->set_flashdata('deleteFail', 'Ocorreu um erro na exclusão do produto');
        redirect('admin/Telas/cadastroProduto');
      }

    }elseif($this->input->post('nao')){
      redirect('admin/Telas/cadastroProduto');
    }

    $dados['produto'] = $this->telas->getProductById($idProduto)->row();

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('admin/produtos/deleteProduto', $dados);
    $this->load->view('templates/footer');

  }

}
