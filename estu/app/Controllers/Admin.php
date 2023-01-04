<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Admin extends BaseController{
	public function index(){
		if(session()->get('admin')){
			return view('admin/landing');
		}else{
			return redirect()->to(base_url(''));
		}
	}

	public function tampilprofil(){
		$db = db_connect();
		$data['data'] = $db->query("select * from admin")->getRowArray();
		return view('admin/profil',$data);
	}

	public function ubahprofil(){
		$mod = new Databasemodel();
		$password = $this->request->getPost('password');
		if($password == ''){
			$data = array(
				'username' => $this->request->getPost('username'),
				'tentang' => $this->request->getPost('tentang')
			);
		}else{
			$data = array(
				'password' => md5($password),
				'username' => $this->request->getPost('username'),
				'tentang' => $this->request->getPost('tentang')
			);
		}
		$mod->updateAll('admin',$data);
		return redirect()->to(base_url('profil'));
	}
}
?>