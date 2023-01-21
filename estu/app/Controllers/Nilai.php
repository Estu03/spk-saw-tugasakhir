<?php
namespace App\Controllers;
use App\Models\Databasemodel;
class Nilai extends BaseController{

	public function index(){
		if(session()->get('admin')){
			$mod = new Databasemodel();
			$data['bulan'] = date('m');
			$data['tahun'] = date('Y');
			$data['data'] = $mod->getAll("karyawan");
			return view('admin/nilai',$data);
		}else{
			return view('situs/landing');
		}
	}

	public function tampildata(){
		$mod = new Databasemodel();
		$data['bulan'] = $this->request->getPost('bulan');
		$data['tahun'] = $this->request->getPost('tahun');
		$data['data'] = $mod->getAll("karyawan");
		return view('admin/nilai',$data);
	}

	public function simpandata(){
		$db = db_connect();
		$mod = new Databasemodel();
		$pr = $this->request->getPost('periode');
		$kr = $this->request->getPost('karyawan');
		$kriteria = $mod->getAll("kriteria");
		$mod->deleting("nilai",['periode' => $pr,'kodekaryawan' => $kr]);
		foreach ($kriteria as $k) {
			$x = "krt".$k['kodekriteria'];
			$x = $this->request->getPost($x);
			$data = array(
				'kodenilai' => null,
				'nilai' => $x,
				'periode' => $pr,
				'kodekriteria' => $k['kodekriteria'],
				'kodekaryawan' => $kr
			);
			$mod->inserting("nilai",$data);
		}
		$data['bulan'] = $this->request->getPost('bulan');
		$data['tahun'] = $this->request->getPost('tahun');
		$data['data'] = $mod->getAll("karyawan");
		return view('admin/nilai',$data);
	}
}
?>