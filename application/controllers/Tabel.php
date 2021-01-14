<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabel extends CI_Controller {

	public function perkiraan()
	{
		$data['judul']='Tabel Perkiraan';
		$data['header']='layout/header';
		$data['footer']='layout/footer';
		$data['isi']='isi/tabel_perkiraan';
		$data['page']='perkiraan';
		//$data['fakultas']=$this->saint->tampil_fakultas();
		$this->load->view('layout/template',$data);
	}
	public function simpan_jurnal()
	{
		$this->validate();
		date_default_timezone_set('Asia/Jakarta');
		$kode=date('YmdHis');
		$data = array(
			'waktu' => date('Y-m-d H:i:s') ,
			'KDAC' => $this->input->post('nomer_akun') ,
			'NMAC' => $this->input->post('nama_akun') ,
			'dk' => $this->input->post('dk') ,
			'level' => $this->input->post('level') ,
			'induk' => $this->input->post('induk') ,
		);
		$this->db->insert('tb_ma',$data);
		echo json_encode(array("status"=>TRUE));
	}
	public function update_akun(){
	$this->validate();
	date_default_timezone_set('Asia/Jakarta');
	$data = array(
			'waktu' => date('Y-m-d H:i:s') ,
			'NMAC' => $this->input->post('nama_akun') ,
			'dk' => $this->input->post('dk') ,
			'level' => $this->input->post('level') ,
			'induk' => $this->input->post('induk') ,
		);
		$this->db->where('KDAC',$this->input->post('nomer_akun'));
		$this->db->update('tb_ma',$data);
		echo json_encode(array("status"=>TRUE));
	}
	public function ajax_list_akun(){
		$list=$this->modelmodel->get_datatables();
		$data=array();
		$no=$_POST['start'];

		foreach ($list as $key) {
			$no++;
			$row=array();
			$row[]='<div class="text-center">'.$no.'</div>';
			$row[]='<div class="text-center">'.$key->KDAC.'</div>';
			$row[]='<div class="text-center">'.$key->NMAC.'</div>';
			$row[]='<div class="text-center">'.$key->debet.'</div>';
			$row[]='<div class="text-center">'.$key->kredit.'</div>';
			$row[]='<div class="text-center"><a href="javascript:void(0)"><button type="button" onclick="edit_soal('."'".$key->KDAC."'".')" class="btn btn-success"><i class="glyphicon glyphicon-pencil"> </i></button></a>
        			<a href="javascript:void(0)"><button type="button" onclick="hapus_akun('."'".$key->KDAC."'".')" class="btn btn-danger"><i class="glyphicon glyphicon-remove"> </i></button></a></div>';
        	$data[]=$row;
		}
		$output=array(
			'draw'=>$_POST['draw'],
			'recordsTotal'=>$this->modelmodel->count_all(),
			'recordsFiltered'=>$this->modelmodel->count_filtered(),
			'data'=>$data
		);
		echo json_encode($output);
	}
	public function lihat_induk($level){
		$list=$this->modelmodel->get_parent($level);
		$data=array();
		$no=0;
		foreach ($list as $key ) {
			$row=array(
				'id' =>$key->KDAC,
				'label' =>$key->KDAC.' - '.$key->NMAC,
			);
			$data[]=$row;
		}
		echo json_encode($data);
	}
	public function ajax_edit($id_soal){
		$data=$this->modelmodel->get_by_id($id_soal);
		echo json_encode($data);
	}
	public function ajax_delete($id_soal)
	{
		$this->db->where('KDAC',$id_soal);
		$this->db->delete('tb_ma');
	//	array_map('unlink', glob(FCPATH."dist/upload/soal/$id_soal.*"));
		echo json_encode(array("status"=>TRUE));
	}
	public function tampil_akun(){
		$list=$this->modelmodel->get_akun();
		$data=array();
		$no=0;
		foreach ($list as $key ) {
			$row=array(
				'id' =>$key->KDAC,
				'label' =>$key->KDAC.' - '.$key->NMAC,
			);
			$data[]=$row;
		}
		echo json_encode($data);
	}
	public function subacc()
	{
		$data['judul']='Tabel Sub Akun';
		$data['header']='layout/header';
		$data['footer']='layout/footer';
		$data['isi']='isi/tabel_sub';
		$data['page']='subacc';
		//$data['fakultas']=$this->saint->tampil_fakultas();
		$this->load->view('layout/template',$data);
	}
	public function simpan_sub()
	{
		$this->validate();
		date_default_timezone_set('Asia/Jakarta');
		$kode=date('YmdHis');
		$data = array(
			'waktu' => date('Y-m-d H:i:s') ,
			'subacc_id' => $this->input->post('nomer_akun') ,
			'nama' => $this->input->post('nama_akun') ,
			'dk' => $this->input->post('dk') ,
			'level' => $this->input->post('level') ,
			'induk' => $this->input->post('induk') ,
		);
		$this->db->insert('tb_ma',$data);
		echo json_encode(array("status"=>TRUE));
	}
	public function update_sub(){
	$this->validate();
	date_default_timezone_set('Asia/Jakarta');
	$data = array(
			'waktu' => date('Y-m-d H:i:s') ,
			'NMAC' => $this->input->post('nama_akun') ,
			'dk' => $this->input->post('dk') ,
			'level' => $this->input->post('level') ,
			'induk' => $this->input->post('induk') ,
		);
		$this->db->where('KDAC',$this->input->post('nomer_akun'));
		$this->db->update('tb_ma',$data);
		echo json_encode(array("status"=>TRUE));
	}
	public function ajax_list_sub(){
		$list=$this->modelmodel->get_datatables2();
		$data=array();
		$no=$_POST['start'];

		foreach ($list as $key) {
			$no++;
			$row=array();
			$row[]='<div class="text-center">'.$no.'</div>';
			$row[]='<div class="text-center">'.$key->subacc_id.'</div>';
			$row[]='<div class="text-center">'.$key->nama.'</div>';
			$row[]='<div class="text-center">'.$key->rek_gl.'</div>';
			$row[]='<div class="text-center">'.$key->debet.'</div>';
			$row[]='<div class="text-center">'.$key->kredit.'</div>';
			$row[]='<div class="text-center"><a href="javascript:void(0)"><button type="button" onclick="edit_soal('."'".$key->subacc_id."'".')" class="btn btn-success"><i class="glyphicon glyphicon-pencil"> </i></button></a>
        			<a href="javascript:void(0)"><button type="button" onclick="hapus_akun('."'".$key->subacc_id."'".')" class="btn btn-danger"><i class="glyphicon glyphicon-remove"> </i></button></a></div>';
        	$data[]=$row;
		}
		$output=array(
			'draw'=>$_POST['draw'],
			'recordsTotal'=>$this->modelmodel->count_all(),
			'recordsFiltered'=>$this->modelmodel->count_filtered(),
			'data'=>$data
		);
		echo json_encode($output);
	}
	public function ajax_edit_sub($id_soal){
		$data=$this->modelmodel->get_by_id($id_soal);
		echo json_encode($data);
	}
	public function ajax_delete_sub($id_soal)
	{
		$this->db->where('KDAC',$id_soal);
		$this->db->delete('tb_ma');
	//	array_map('unlink', glob(FCPATH."dist/upload/soal/$id_soal.*"));
		echo json_encode(array("status"=>TRUE));
	}
	private function validate()
	{
		$data=array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		
		if($this->input->post('nomer_akun') == '')
		{
			$data['inputerror'][] = 'nomer_akun';
			$data['error_string'][] = 'Akun tidak boleh kosong';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('nama_akun') == '')
		{
			$data['inputerror'][] = 'nama_akun';
			$data['error_string'][] = 'Nama Akun tidak boleh kosong';
			$data['status'] = FALSE;
		}
		if($this->input->post('dk') == '')
		{
			$data['inputerror'][] = 'dk';
			$data['error_string'][] = 'DK tidak boleh kosong';
			$data['status'] = FALSE;
		}
		if($this->input->post('level') == '')
		{
			$data['inputerror'][] = 'level';
			$data['error_string'][] = 'Level tidak boleh kosong';
			$data['status'] = FALSE;
		}
		if($data['status'] == FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}
