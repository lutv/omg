<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['judul']='Home';
		$data['header']='layout/header';
		$data['footer']='layout/footer';
		$data['isi']='isi/form_login';
		$this->load->view('layout/template',$data);
	}
}
