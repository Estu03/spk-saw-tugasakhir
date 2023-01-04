<?php
namespace App\Controllers;
use App\Models\Databasemodel;
class Kriteria extends BaseController{
	
	public function index(){
		if(session()->get('admin')){
			$mod = new Databasemodel();
			$data['data'] = $mod->getAll("kriteria");
			return view('admin/kriteria',$data);
		}else{
			return view('situs/landing');
		}
	}

	public function tambahdata(){
		return view('admin/kriteriatambah');
	}

	public function simpandata(){
		$mod = new Databasemodel();
		$data = array(
			'kodekriteria' => null,
			'kriteria' => $this->request->getPost('kriteria'),
			'kategori' => $this->request->getPost('kategori'),
			'bobot' => $this->request->getPost('bobot')
		);
		$mod->inserting("kriteria",$data);
		return redirect()->to(base_url('kriteria'));
	}

	public function tampildata($x){
		$mod = new Databasemodel();
		$data['data'] = $mod->getData("kriteria",['kodekriteria' => $x]);
		return view('admin/kriteriadetail',$data);
	}

	public function ubahdata(){
		$mod = new Databasemodel();
		$id = $this->request->getPost('id');
		$data = array(
			'kriteria' => $this->request->getPost('kriteria'),
			'kategori' => $this->request->getPost('kategori'),
			'bobot' => $this->request->getPost('bobot')
		);
		$mod->updating("kriteria",$data,['kodekriteria' => $id]);
		return redirect()->to(base_url('kriteria'));
	}
}
?>