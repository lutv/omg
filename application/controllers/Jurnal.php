<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends CI_Controller {
	//Nama:  Lutfi Muhamad Majid
	//NPM:   17111100090
	//Kelas: 17B

	public function index()
	{
		$data['judul']='Jurnal';
		$data['header']='layout/header';
		$data['footer']='layout/footer';
		$data['isi']='isi/memori';
		$data['page']='memori';
		//$data['fakultas']=$this->saint->tampil_fakultas();
		$this->load->view('layout/template',$data);
	}

	public function simpan_jurnal()
	{
		//$this->load->model('saint'); moved in autoload.php
		$this->saint->simpan_fakultas();
		redirect('home');
	}
	public function kasbank()
	{
		$data['judul']='Kas Bank';
		$data['header']='layout/header';
		$data['footer']='layout/footer';
		$data['isi']='isi/kasbank';
		$data['page']='kasbank';
		$this->load->view('layout/template',$data);
	}
	public function ajax_list_kas(){
		//$this->load->model('jurnal');
		$list=$this->jrnl->get_datatables();
		$data=array();
		$no=$_POST['start'];
		foreach ($list as $key) {
			$no++;
			$row=array();
			$row[]='<div class="text-center">'.$no.'</div>';
			$row[]='<div class="text-center">'.$key->tbjurnalmemori_no.'</div>';
			$row[]='<div class="text-center">'.$key->tbjurnalmemori_diubah.'</div>';
			$row[]='<div class="text-center">'.$key->tbjurnalmemori_ket.'</div>';
			$row[]='<div class="text-center">'.$key->tbjurnalmemori_balanced.'</div>';
			$row[]='<div class="text-center">'.$key->tbjurnalmemori_nilai.'</div>';
			$row[]='<div class="text-center"><a href="'.base_url().'jurnal/edit_kas/'.$key->tbjurnalmemori_no.'"><button type="button" class="btn btn-success"><i class="glyphicon glyphicon-pencil"> </i></button></a>
        			<a href="javascript:void(0)"><button type="button" onclick="hapus_akun('."'".$key->tbjurnalmemori_no."'".')" class="btn btn-danger"><i class="glyphicon glyphicon-remove"> </i></button></a></div>';
        	$data[]=$row;
		}
		$output=array(
			'draw'=>$_POST['draw'],
			'recordsTotal'=>$this->jrnl->count_all(),
			'recordsFiltered'=>$this->jrnl->count_filtered(),
			'data'=>$data
		);
		echo json_encode($output);
	}
	public function kas()
	{
		$kode=$this->input->post('tipe');
        $tgl=date('dm',strtotime($this->input->post('tanggal')));
        $yer=date('y',strtotime($this->input->post('tanggal')));
        $data['generated_number']=$this->auto_code($kode,$tgl,$yer);
		$data['judul']='Jurnal Kas';
		$data['header']='layout/header';
		$data['footer']='layout/footer';
		$data['isi']='isi/jurnalkas';
		$data['page']='kas';
		$data['pg']='KBM';
		$this->load->view('layout/template',$data);
	}
	public function acc(){
		if (isset($_GET['term'])) {
		$this->db->from('tb_ma');
		$this->db->where('level','4');
		$this->db->like('KDAC', $_GET['term']);
		$this->db->or_like('NMAC', $_GET['term']);
		$query=$this->db->get();
		foreach ($query->result() as $key) {
			$data[]=array(
						'kode' => $key->KDAC,
						'nama' => $key->NMAC,
						'label' => $key->KDAC." - ".$key->NMAC,
						'value' => $key->KDAC
			);
		}
		$matches=array();
		$matches=array_slice($data, 0, 15);
		echo json_encode($matches);
		}
	}
	private function auto_code($kode, $tgl, $yer){
		$this->db->from('tbjurnalmemori');
		$this->db->like('tbjurnalmemori_no',$kode.'-'.$tgl);
		$this->db->order_by('tbjurnalmemori_no','DESC');
		$this->db->limit('1');
		$query=$this->db->get();
		if ($query){
			$key=$query->row_array();
			$count=substr($key['tbjurnalmemori_no'],11,4);
			$count= $count+1;
			$code_no= str_pad($count, 4, "0", STR_PAD_LEFT);
		}
		$generated_number=$kode.'-'.$tgl."-".$yer.$code_no;
		return $generated_number;
	}
	public function simpan_jurnal_kas()
	{
		$this->saint->simpan_jurnal_kas();
		redirect('jurnal/kasbank');
	}
	public function edit_kas($id)
	{
		$data['judul']='Edit Kas';
		$data['header']='layout/header';
		$data['footer']='layout/footer';
		$data['page']='kas';
		$data['isi']='isi/editkas';
		$data['jurnal']=$this->saint->ambil_jurnal($id);
		$data['isi_jual']=$this->saint->ambil_penjualan($id);
		$this->load->view('layout/template',$data);
	}
	public function simpan_prodi()
	{
		$this->saint->simpan_prodi();
		redirect('home/prodi');
	}
	public function lihat_prodi($id_prodi){
		$data['judul']='Update Fakultas';
		$data['header']='layout/header';
		$data['footer']='layout/footer';
		$data['isi']='isi/update_prodi';
		$data['fakultas']=$this->saint->tampil_fakultas_prodi();
		$data['prodi']=$this->saint->ambil_prodi($id_prodi);
		$this->load->view('layout/template',$data);
	}
	public function update_prodi()
	{
		$this->saint->update_prodi();
		redirect('home/prodi');
	}
	public function hapus_prodi($id_prodi)
	{
		$this->saint->hapus_prodi($id_prodi);
		redirect('home/prodi');
	}
}
