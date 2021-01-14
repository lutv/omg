<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jrnl extends CI_Model {
/*	Nama 	: Lutfi Muhamad Majid
	NPM 	: 17111100090
	Kelas 	: 17B*/

	var $table='tbjurnalmemori';
	var $column_order=array(null,'tbjurnalmemori_id',null);
	var $column_search=array('tbjurnalmemori_no','tbjurnalmemori_ket');
	var $order=array('tbjurnalmemori_diubah'=>'desc');

	public function __construct()
	{
		parent:: __construct();
	}

	private function _get_datatables_query(){
		$this->db->from($this->table);
		$i=0;

		foreach ($this->column_search as $key) {
			if ($_POST['search']['value']) {
				if($i===0){
					$this->db->group_start();
					$this->db->like($key, $_POST['search']['value']);
				}else{
					$this->db->or_like($key, $_POST['search']['value']);
				}
				if (count($this->column_search)-1==$i) {
					$this->db->group_end();
				}
				$i++;
			}
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
		}
		else if (isset($this->order)) {
			$order=$this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	function get_datatables(){
		$this->_get_datatables_query();
		if ($_POST['length']!=-1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$this->db->like('tbjurnalmemori_no','KBM');
		$query=$this->db->get();
		return $query->result();
	}
	function count_filtered(){
		$this->_get_datatables_query();
		$this->db->like('tbjurnalmemori_no','KBM');
		$query=$this->db->get();
		return $query->num_rows();
	}
	function count_all(){
		$this->db->like('tbjurnalmemori_no','KBM');
		$query=$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	function get_by_id($id_soal){
		$this->db->from($this->table);
		$this->db->where('KDAC',$id_soal);
		$query=$this->db->get();
		return $query->row();
	}
	function get_gambar(){
		$this->db->from('temp_gambar');
		$this->db->limit(1);
		$this->db->order_by('id_temp','DESC');
		$query=$this->db->get();
		return $query->row();
	}
	function get_parent($level){
		$level=$level-1;
		$this->db->from($this->table);
		$this->db->where('level',$level);
		$query=$this->db->get();
		return $query->result();
	}
	function get_akun(){
		$this->db->from($this->table);
		$query=$this->db->get();
		return $query->result();
	}
	private function _get_datatables_query2(){
		$this->db->from($this->table2);
		$i=0;

		foreach ($this->column_search2 as $key) {
			if ($_POST['search']['value']) {
				if($i===0){
					$this->db->group_start();
					$this->db->like($key, $_POST['search']['value']);
				}else{
					$this->db->or_like($key, $_POST['search']['value']);
				}
				if (count($this->column_search2)-1==$i) {
					$this->db->group_end();
				}
				$i++;
			}
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_order2[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
		}
		/*else if (isset($this->order)) {
			$order=$this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}*/
	}
	function get_datatables2(){
		$this->_get_datatables_query2();
		if ($_POST['length']!=-1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query=$this->db->get();
		return $query->result();
	}
	function count_filtered2(){
		$this->_get_datatables_query2();
		$query=$this->db->get();
		return $query->num_rows();
	}
	function count_all2(){
		$query=$this->db->from($this->table2);
		return $this->db->count_all_results();
	}
	private function _get_datatables_query3(){
		$this->db->from($this->table3);
		$i=0;

		foreach ($this->column_search3 as $key) {
			if ($_POST['search']['value']) {
				if($i===0){
					$this->db->group_start();
					$this->db->like($key, $_POST['search']['value']);
				}else{
					$this->db->or_like($key, $_POST['search']['value']);
				}
				if (count($this->column_search3)-1==$i) {
					$this->db->group_end();
				}
				$i++;
			}
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_order3[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
		}
		/*else if (isset($this->order)) {
			$order=$this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}*/
	}
	function get_datatables3(){
		$this->_get_datatables_query3();
		if ($_POST['length']!=-1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query=$this->db->get();
		return $query->result();
	}
	function count_filtered3(){
		$this->_get_datatables_query3();
		$query=$this->db->get();
		return $query->num_rows();
	}
	function count_all3(){
		$query=$this->db->from($this->table3);
		return $this->db->count_all_results();
	}
}