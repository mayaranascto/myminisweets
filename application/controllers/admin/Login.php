<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Login_model', 'login');

  }

  public function index(){

    $this->load->view('myminisweets/admin/login');
  }

  public function autentica(){

    if($this->input->post()){
      //var_dump($this->input->post());
      $login = $this->input->post('login');
      if($this->input->post('senha') == ""){
        $senha = NULL;
      }else{
        $senha = md5($this->input->post('senha'));
      }

      if($this->login->verificaDados($login, $senha)){
          $this->auth->criarAuth($login);
          redirect('admin/Dashboard');
      }else{
          $this->session->set_flashdata('loginFail', 'Login ou Senha incorretos');
          redirect('admin/Login');
      }
    }
  }

  public function logout(){
    $this->auth->eliminarAuth();
    redirect('admin/Login');
  }

}
