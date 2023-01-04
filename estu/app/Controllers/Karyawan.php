<?php
namespace App\Controllers;
use App\Models\Databasemodel;
class Karyawan extends BaseController{
	
	public function index(){
		if(session()->get('admin')){
			$mod = new Databasemodel();
			$data['data'] = $mod->getAll("karyawan");
			return view('admin/karyawan',$data);
		}else{
			return view('situs/landing');
		}
	}

	public function tambahdata(){
		$db = db_connect();
		$data['jabatan'] = $db->query("select jabatan from karyawan group by jabatan asc")->getResultArray();
		$data['golongan'] = $db->query("select golongan from karyawan group by golongan asc")->getResultArray();
		return view('admin/karyawantambah',$data);
	}

	public function simpandata(){
		$mod = new Databasemodel();
		$data = array(
			'kodekaryawan' => null,
			'nip' => $this->request->getPost('nip'),
			'nama' => $this->request->getPost('nama'),
			'golongan' => $this->request->getPost('golongan'),
			'jabatan' => $this->request->getPost('jabatan'),
			'status' => '1'
		);
		$mod->inserting("karyawan",$data);
		return redirect()->to(base_url('karyawan'));
	}

	public function tampildata($x){
		$mod = new Databasemodel();
		$db = db_connect();
		$data['jabatan'] = $db->query("select jabatan from karyawan group by jabatan asc")->getResultArray();
		$data['golongan'] = $db->query("select golongan from karyawan group by golongan asc")->getResultArray();
		$data['data'] = $mod->getData("karyawan",['kodekaryawan' => $x]);
		return view('admin/karyawandetail',$data);
	}

	public function ubahdata(){
		$mod = new Databasemodel();
		$id = $this->request->getPost('id');
		$data = array(
			'nip' => $this->request->getPost('nip'),
			'nama' => $this->request->getPost('nama'),
			'golongan' => $this->request->getPost('golongan'),
			'jabatan' => $this->request->getPost('jabatan'),
			'status' => $this->request->getPost('status')
		);
		$mod->updating("karyawan",$data,['kodekaryawan' => $id]);
		return redirect()->to(base_url('karyawan'));
	}
}
?>