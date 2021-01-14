<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	//Nama:  Lutfi Muhamad Majid
	//NPM:   17111100090
	//Kelas: 17B

	public function index()
	{
		$data['judul']='Fakultas';
		$data['header']='layout/header';
		$data['footer']='layout/footer';
		$data['isi']='isi/input_fakultas';
		$data['page']='home';
		//$data['fakultas']=$this->saint->tampil_fakultas();
		$this->load->view('layout/template',$data);
	}

	public function simpan_fakultas()
	{
		//$this->load->model('saint'); moved in autoload.php
		$this->saint->simpan_fakultas();
		redirect('home');
	}
	public function lihat_detail($id_fakultas){
		$data['judul']='Update Fakultas';
		$data['header']='layout/header';
		$data['footer']='layout/footer';
		$data['isi']='isi/update_fakultas';
		$data['fakultas']=$this->saint->ambil_fakultas($id_fakultas);
		$this->load->view('layout/template',$data);
	}
	public function update_fakultas()
	{
		$this->saint->update_fakultas();
		redirect('home');
	}
	public function hapus_fakultas($id_fakultas)
	{
		$this->saint->hapus_fakultas($id_fakultas);
		redirect('home');
	}
		public function prodi()
	{
		$data['judul']='Program Studi';
		$data['header']='layout/header';
		$data['footer']='layout/footer';
		$data['isi']='isi/input_prodi';
		$data['fakultas']=$this->saint->tampil_fakultas_prodi();
		$data['prodi']=$this->saint->tampil_prodi();
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
	public function sig($a,$b){
		$jalan = array();
$jalan['A']['B'] = 7;
$jalan['A']['C'] = 7;
$jalan['A']['H'] = 5;
$jalan['B']['A'] = 7;
$jalan['B']['C'] = 3;
$jalan['B']['D'] = 4;
$jalan['B']['F'] = 5;
$jalan['B']['G'] = 2;
$jalan['C']['A'] = 7;
$jalan['C']['B'] = 3;
$jalan['C']['H'] = 9;
$jalan['C']['I'] = 10;
$jalan['D']['B'] = 4;
$jalan['D']['F'] = 7;
$jalan['D']['E'] = 5;
$jalan['D']['G'] = 11;
$jalan['E']['D'] = 3;
$jalan['E']['F'] = 3;
$jalan['E']['G'] = 6;
$jalan['E']['I'] = 8;
$jalan['E']['K'] = 8;
$jalan['E']['J'] = 4;
$jalan['E']['L'] = 7;
$jalan['F']['B'] = 5;
$jalan['F']['D'] = 7;
$jalan['F']['E'] = 3;
$jalan['F']['K'] = 9;
$jalan['G']['B'] = 2;
$jalan['G']['D'] = 11;
$jalan['G']['E'] = 6;
$jalan['G']['I'] = 5;
$jalan['H']['A'] = 5;
$jalan['H']['C'] = 9;
$jalan['H']['I'] = 8;
$jalan['I']['C'] = 10;
$jalan['I']['E'] = 8;
$jalan['I']['G'] = 4;
$jalan['I']['H'] = 8;
$jalan['I']['J'] = 11;
$jalan['I']['N'] = 2;
$jalan['J']['E'] = 4;
$jalan['J']['I'] = 11;
$jalan['J']['L'] = 5;
$jalan['J']['M'] = 1;
$jalan['J']['N'] = 4;
$jalan['K']['E'] = 8;
$jalan['K']['F'] = 9;
$jalan['K']['L'] = 3;
$jalan['K']['O'] = 2;
$jalan['L']['E'] = 7;
$jalan['L']['J'] = 5;
$jalan['L']['K'] = 3;
$jalan['L']['M'] = 2;
$jalan['L']['0'] = 5;
$jalan['M']['J'] = 1;
$jalan['M']['L'] = 2;
$jalan['M']['N'] = 8;
$jalan['M']['O'] = 3;
$jalan['N']['I'] = 2;
$jalan['N']['J'] = 4;
$jalan['N']['N'] = 7;
$jalan['N']['M'] = 8;
$jalan['O']['K'] = 2;
$jalan['O']['L'] = 9;
$jalan['O']['M'] = 3;

$titik=array();
$titik['A']=5;
$titik['B']=7;
$titik['C']=4;
$titik['D']=8;
$titik['E']=5;
$titik['F']=4;
$titik['G']=4;
$titik['H']=3;
$titik['I']=6;
$titik['J']=7;
$titik['K']=6;
$titik['L']=9;
$titik['M']=5;
$titik['N']=7;
$titik['O']=6;

$S = array();
$Q = array();
foreach(array_keys($jalan) as $val) $Q[$val] = 99999;
$Q[$a] = $titik[$a];


while(!empty($Q)){
    $min = array_search(min($Q), $Q);//cari terkecil
    if($min == $b) break;
    foreach($jalan[$min] as $key=>$val) if(!empty($Q[$key]) && $Q[$min] + ($val+$titik[$key]) < $Q[$key]) {
        $Q[$key] = $Q[$min] + ($val+$titik[$key]);
        $S[$key] = array($min, $Q[$key]);
        echo json_encode($S);
        echo "<br>";
    }
    unset($Q[$min]);
}

$jalur = array();
$pos = $b;
while($pos != $a){
    $jalur[] = $pos;
    $pos = $S[$pos][0];
}
$jalur[] = $a;
$jalur = array_reverse($jalur);

//jalur balik
$c=$b;
$d=$a;

$R = array();
$T = array();
foreach(array_keys($jalan) as $val) {
	$cek=array_search($val, $jalur);
	if(empty($cek)){
	$T[$val] = 99999;
	}
}
$T[$c] = $titik[$c];


while(!empty($T)){
    $min = array_search(min($T), $T);//cari terkecil
    if($min == $d) break;
    foreach($jalan[$min] as $key=>$val) if(!empty($T[$key]) && $T[$min] + ($val+$titik[$key]) < $T[$key]) {
        $T[$key] = $T[$min] + ($val+$titik[$key]);
        $R[$key] = array($min, $T[$key]);
        echo json_encode($R);
        echo "<br>";
    }
    unset($T[$min]);
}

$jalur_pulang = array();
$pos_pulang = $d;
while($pos_pulang != $c){
    $jalur_pulang[] = $pos_pulang;
    $pos_pulang = $R[$pos_pulang][0];
}
$jalur_pulang[] = $c;
$jalur_pulang = array_reverse($jalur_pulang);

$test=array_search('2', $jalur);
$data[]=array();
$data['jalur']=$jalur;
$data['jalur_pulang']=$jalur_pulang;
$data['total_pergi']=$S[$b][1];
$data['total_pulang']=$S[$d][1];
return $data;
	}
}
