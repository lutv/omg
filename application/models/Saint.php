 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saint extends CI_Model {
/*	Nama 	: Lutfi Muhamad Majid
	NPM 	: 17111100090
	Kelas 	: 17B*/

	public function simpan_jurnal_kas()
	{
		$no=$this->input->post('jurnal');
		//$referensi=$this->input->post('jurnal');
		$keterangan=$this->input->post('ket');
		$sub=$this->input->post('sub');
		$akun=$this->input->post('acc');
		$transaksi=$this->input->post('transaksi');
		$notes=$this->input->post('notes');
		$dk=$this->input->post('dk');
		$nilai=$this->input->post('nilai');
		$debet=$this->input->post('tot_debit');
		$kredit=$this->input->post('tot_kredit');
		$balanced=$debet-$kredit;
		$data = array(
			'tbjurnalmemori_no' =>$no,
			'tbjurnalmemori_ket' =>$keterangan,
			'tbjurnalmemori_debet' =>$debet,
			'tbjurnalmemori_kredit' =>$kredit,
			'tbjurnalmemori_balanced' =>$balanced,
			'tbjurnalmemori_nilai' =>$balanced,
			 );
		$this->db->insert('tbjurnalmemori',$data);
		foreach ($nilai as $key => $val ) {
			$penjualan[]=array(
				'penjualan_jurnal' =>$no,
				'penjualan_tgl' =>date('Y-m-d H:i:s'),
				'penjualan_akun' =>$_POST['acc'][$key],
				'penjualan_notes' =>$_POST['notes'][$key],
				'penjualan_ket' =>$_POST['dk'][$key],
				'penjualan_nilai' =>$_POST['nilai'][$key],
			);
/*			if ($_POST['dk'][]$key=='D') {
				
			}*/
		}
		$this->db->insert_batch('tb_penjualan', $penjualan);
	}
	public function tampil_perkiraan()
	{
		$data=array();
		$this->db->select('*');
		$this->db->order_by('KDAC','ASC');
		$view=$this->db->get('tb_ma');
		foreach ($view->result_array() as $row) {
				$data[]=$row;
			}
		$view->free_result();
		return $data;

	}
	public function ambil_jurnal($id_jurnal){
		$data=array();
		$this->db->select('*');
		$this->db->where('tbjurnalmemori_no',$id_jurnal);
		$view=$this->db->get('tbjurnalmemori');
				$data=$view->row_array();
		$view->free_result();
		return $data;
	}
	public function ambil_penjualan($id_jurnal){
		$data=array();
		$this->db->select('*');
		$this->db->where('penjualan_jurnal',$id_jurnal);
		$view=$this->db->get('tb_penjualan');
		foreach ($view->result_array() as $row) {
				$data[]=$row;
			}
		$view->free_result();
		return $data;
	}
	public function update_fakultas()
	{
		$data = array(
			'nama_fakultas' =>$this->input->post('nama_fakultas'),
			'status_fakultas' =>$this->input->post('status_fakultas'),
			 );
		$this->db->where('id_fakultas',$this->input->post('id_fakultas'));
		$this->db->update('fakultas_17111100090',$data);
	}
	public function hapus_fakultas($id_fakultas)
	{
		$this->db->where('id_fakultas',$id_fakultas);
		$this->db->delete('fakultas_17111100090');
	}
	public function tampil_fakultas_prodi()
	{
		$data=array();
		$this->db->select('*');
		$this->db->where('status_fakultas','Aktif');
		$this->db->order_by('id_fakultas','DESC');
		$view=$this->db->get('fakultas_17111100090');
		foreach ($view->result_array() as $row) {
				$data[]=$row;
			}
		$view->free_result();
		return $data;

	}
	public function simpan_prodi()
	{
		$data = array(
			'nama_prodi' =>$this->input->post('nama_prodi'),
			'id_fakultas' =>$this->input->post('id_fakultas'),
			'status_prodi' =>$this->input->post('status_prodi'),
			 );
		$this->db->insert('prodi_17111100090',$data);
	}
	public function tampil_prodi()
	{
		$data=array();
		$this->db->select('*');
		$this->db->join('fakultas_17111100090','prodi_17111100090.id_fakultas=fakultas_17111100090.id_fakultas');
		$this->db->order_by('id_prodi','DESC');
		$view=$this->db->get('prodi_17111100090');
		foreach ($view->result_array() as $row) {
				$data[]=$row;
			}
		$view->free_result();
		return $data;
	}
	public function ambil_prodi($id_prodi){
		$data=array();
		$this->db->select('*');
		$this->db->where('id_prodi',$id_prodi);
		$view=$this->db->get('prodi_17111100090');
				$data=$view->row_array();
		$view->free_result();
		return $data;
	}
	public function update_prodi()
	{
		$data = array(
			'nama_prodi' =>$this->input->post('nama_prodi'),
			'id_fakultas' =>$this->input->post('id_fakultas'),
			'status_prodi' =>$this->input->post('status_prodi'),
			 );
		$this->db->where('id_prodi',$this->input->post('id_prodi'));
		$this->db->update('prodi_17111100090',$data);
	}
	public function hapus_prodi($id_prodi)
	{
		$this->db->where('id_prodi',$id_prodi);
		$this->db->delete('prodi_17111100090');
	}
	
}