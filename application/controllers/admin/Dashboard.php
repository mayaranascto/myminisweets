<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->auth->validarAuth(base_url('admin/Login'));
    $this->load->model('Dashboard_model', 'dash');
    $this->load->helper('array');
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->load->library('table');
    $this->load->helper('url');
    $this->load->helper('html');

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
        if($this->dash->inserirCliente($data)){
          //$this->session->set_flashdata('cadastroOk', 'O Cliente foi cadastrado com sucesso');
          $config = Array(
             'protocol' => 'smtp',
             'smtp_host' => 'ssl://smtp.gmail.com',
             'smtp_port' => 465,
             'smtp_user' => 'mayaranasctolima@gmail.com', // change it to yours
             'smtp_pass' => 'maya33ibiza', // change it to yours
             'mailtype' => "html",
             'newline' => "\r\n",
             'charset' => 'utf-8',
             'wordwrap' => TRUE,
          );
          $this->load->library('email', $config);

          $this->email->from('lucasdocetec@gmail.com', 'Lucas');
          $this->email->to($data['login']);
          $this->email->subject('Email Test');
          $this->email->message('<html><body>Testing the email class.</body></html>');
          if($this->email->send()){
            $this->session->set_flashdata('cadastroOk', 'O Cliente foi cadastrado com sucesso');
          }else{
            var_dump($this->email->print_debugger());
            die();
          }
        }else{
          $this->session->set_flashdata('cadastroFail', 'Ocorreu um erro com o cadastro');
        }
        redirect(base_url('admin/Dashboard/cadastroCliente'));
      }
    }

    $dados['clientes'] = $this->dash->getAllClientes()->result();


    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('myminisweets/admin/clientes/cadastroCliente');
    $this->load->view('myminisweets/admin/clientes/selectCliente', $dados);
    $this->load->view('templates/footer');

  }

  public function updateCliente($id){

    if($id==NULL){
      redirect(base_url('admin/Dashboard/cadastroCliente'));
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
        if($this->dash->alterarCliente($id,$data)){
          $this->session->set_flashdata('updateOk', 'O Cliente foi cadastrado com sucesso');
        }else{
          $this->session->set_flashdata('updateFail', 'Ocorreu um erro com o cadastro');
        }

      }
    }

    $dados['cliente'] = $this->dash->getById($id)->row();

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('myminisweets/admin/clientes/updateCliente', $dados);
    $this->load->view('templates/footer');
  }

  public function deleteCliente($id){

    if($id==NULL){
      redirect(base_url('admin/Dashboard/cadastroCliente'));
    }

    if($this->input->post('sim')){
      if($this->dash->excluirCliente($id)){
          $this->dash->excluirCliente($id);
          $this->session->set_flashdata('deleteOk', 'O Cliente foi excluído com sucesso');
          redirect('admin/Dashboard/cadastroCliente');
      }else{
          $this->session->set_flashdata('deleteFail', 'Ocorreu um erro no processo de exclusão');
          redirect('admin/Dashboard/cadastroCliente');
      }

    }else if($this->input->post('nao')){
      redirect(base_url('admin/Dashboard/cadastroCliente'));
    }

    $dados['cliente'] = $this->dash->getById($id)->row();

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('myminisweets/admin/clientes/deleteCliente', $dados);
    $this->load->view('templates/footer');
  }

  public function cadastroProduto(){

    if($this->input->post()){
//      var_dump($this->input->post());
//      die();

      $this->form_validation->set_message('required', 'O campo %s é obrigatório');

      $this->form_validation->set_rules('nome_produto', 'Nome', 'trim|required');
      $this->form_validation->set_rules('descricao', 'Descrição', 'trim|required');
      $this->form_validation->set_rules('preco', 'Preço', 'trim|required');
      $this->form_validation->set_rules('categoria', 'categoria', 'trim|required');
      if($_FILES['img_url']['size']==0){
        $this->form_validation->set_rules('img_url', 'Imagem do Produto', 'required');
      }

      if($this->form_validation->run()==TRUE){
        $data = elements(array('nome_produto', 'categoria', 'descricao', 'preco'), $this->input->post());

        $config['upload_path'] = PATHDEFAULT.'assets'.DS.'developer'.DS.'imgs'.DS.'produtosbd';
        $config['allowed_types'] = 'gif|jpg|png';

        if($this->load->library('upload', $config)){
          echo 'teste';

        }else{
          echo "erro";
        }
        if($this->upload->do_upload('img_url')){


          $data['img_url'] = $this->upload->data('file_name');

        }

        if($this->dash->cadastroProduto($data)){
          $this->session->set_flashdata('cadastroOk', 'O Produto foi cadastrado com sucesso');
        }else{
          $this->session->set_flashdata('cadastroFail', 'Ocorreu um erro com o cadastro');
        }
      }
    }

    $dados['produtos'] = $this->dash->getAllProducts()->result();

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('myminisweets/admin/produtos/cadastroProduto');
    $this->load->view('myminisweets/admin/produtos/selectProduto', $dados);
    $this->load->view('templates/footer');
  }

  public function verProduto($idProduto){

    if($idProduto==NULL){
      redirect(base_url('admin/Dashboard/cadastroProduto'));
    }

    $dados['produto'] = $this->dash->getProductById($idProduto)->row();

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('myminisweets/admin/produtos/verProduto', $dados);
    $this->load->view('templates/footer');
  }

  public function updateProduto($idProduto){

    if($idProduto==NULL){
      redirect(base_url('admin/Dashboard/cadastroProduto'));
    }

    if($this->input->post()){

      $this->form_validation->set_message('required', 'O campo %s é obrigatório');

      $this->form_validation->set_rules('nome_produto', 'Nome', 'trim|required');
      $this->form_validation->set_rules('descricao', 'Descrição', 'trim|required');
      $this->form_validation->set_rules('preco', 'Preço', 'trim|required');
      $this->form_validation->set_rules('categoria', 'Categoria', 'trim|required');

      if($this->form_validation->run()==TRUE){
        $data = elements(array('nome_produto', 'categoria', 'descricao', 'preco'), $this->input->post());

        $config['upload_path']          = PATHDEFAULT.'assets'.DS.'img'.DS.'produtos';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);
        if($this->upload->do_upload('img_url')){
          $data['img_url'] = $this->upload->data('file_name');
        }

        if($this->dash->updateProduto($idProduto, $data)){
          $this->session->set_flashdata('updateOk', 'O produto foi atualizado com sucesso');
          redirect(base_url('admin/Dashboard/cadastroProduto'));
        }else{
          $this->session->set_flashdata('updateFail', 'Ocorreu um erro com a atualização');
          redirect(base_url('admin/Dashboard/cadastroProduto'));
        }
      }
    }

    $dados['produto'] = $this->dash->getProductById($idProduto)->row();

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('myminisweets/admin/produtos/updateProduto', $dados);
    $this->load->view('templates/footer');
  }

  public function deleteProduto($idProduto){

    if($idProduto==NULL){
      redirect('admin/Dashboard/cadastroProduto');
    }

    if($this->input->post('sim')){
      if($this->dash->deleteProduto($idProduto)){
        $this->dash->deleteProduto($idProduto);
        $this->session->set_flashdata('deleteOk', 'O produto foi excluido com sucesso');
        redirect('admin/Dashboard/cadastroProduto');
      }else{
        $this->session->set_flashdata('deleteFail', 'Ocorreu um erro na exclusão do produto');
        redirect('admin/Dashboard/cadastroProduto');
      }

    }elseif($this->input->post('nao')){
      redirect('admin/Dashboard/cadastroProduto');
    }

    $dados['produto'] = $this->dash->getProductById($idProduto)->row();

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('myminisweets/admin/produtos/deleteProduto', $dados);
    $this->load->view('templates/footer');

  }

  public function addProduto(){

  }

}
