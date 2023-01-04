<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Root extends BaseController{
	function __construct(){
		$this->mod = new Databasemodel();
		$this->db = db_connect();
	}

	public function index(){
		if(session()->get('admin')){
			return redirect()->to(base_url('admin'));
		}else{
			$data['tentang'] = $this->db->query("select tentang from admin")->getRowArray()['tentang'];
			return view('situs/landing',$data);
		}
	}

	public function tampilhasil(){
		$bulan = array('1' => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		$periode = $bulan[(int)date('m')]." ".date('Y');
		$data['periode'] = $periode;
		$data['data'] = $this->db->query("select na.na, karyawan.* from na join karyawan on na.kodekaryawan = karyawan.kodekaryawan where na.periode = '".$periode."' order by na.na desc")->getResultArray();
		return view('situs/hasil',$data);
	}

	public function tampillogin(){
		return view('situs/login');
	}

	public function proseslogin(){
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$cek = $this->mod->getSome('admin',['username' => $username, 'password' => md5($password)]);
		if(count($cek) > 0){
			session()->set('admin','Administrator');
			return redirect()->to(base_url(''));
		}else{
			session()->setFlashdata('gagal','Kombinasi inputan tidak sesuai!');
			return view('situs/login');
		}
	}

	public function proseslogout(){
		session_unset();
		session()->destroy();
		return redirect()->to(base_url(''));
	}
}
?>