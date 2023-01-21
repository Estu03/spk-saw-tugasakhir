<?php
namespace App\Controllers;
use App\Models\Databasemodel;
class Skema extends BaseController{

	public function index(){
		if(session()->get('admin')){
			$data['tahun'] = date('Y');
			return view('admin/skema',$data);
		}else{
			return redirect()->to(base_url(''));
		}
	}

	public function tampildata(){
		$data['tahun'] = $this->request->getPost('tahun');
		return view('admin/skema',$data);
	}

	public function simpandata(){
		$db = db_connect();
		$mod = new Databasemodel();
		$p = $this->request->getPost('periode');
		$kriteria = $this->request->getPost('kriteria');
		$mod->deleting("skema",['periode' => $p]);
		for ($i=0; $i < count($kriteria) ; $i++) {
			$data = array(
				'kodeskema' => null,
				'periode' => $p,
				'kodekriteria' => $kriteria[$i]
			);
			$mod->inserting("skema",$data);
		}
		$data['tahun'] = $this->request->getPost('tahun');
		return view('admin/skema',$data);
	}
}
?>