<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Auth {

	private $CI;

	public function __construct() {
		$this->CI =& get_instance();
		$this->CI->load->library('session');
	}

	public function criarAuth($login, $permissao, $id) {
		$newdata = array('login' => $login, 'permissao'=>$permissao, 'logged_in' => TRUE);
		$this->CI->session->set_userdata($newdata);
	}

	public function validarAuth($url) {
		if (!$this->CI->session->userdata('logged_in')) {
			$this->CI->session->set_flashdata('sistemMsg', '<div class="alert alert-danger" role="alert">Efetue o login.</div>');
			redirect($url);
		}
	}

	public function getLogin() {
		if ($this->CI->session->userdata('login')) {
			return $this->CI->session->userdata('login');
		} else {
			return FALSE;
		}
	}

	public function eliminarAuth() {
		$this->CI->session->sess_destroy();
	}

}
