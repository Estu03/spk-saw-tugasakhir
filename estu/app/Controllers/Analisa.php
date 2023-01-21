<?php
namespace App\Controllers;
use App\Models\Databasemodel;
use App\Libraries\Fpdf\Fpdf;
class Analisa extends BaseController{

	public function index(){
		$bulan = array('1' => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		if(session()->get('admin')){
			$db = db_connect();
			$mod = new Databasemodel();
			$b = date('m');
			$t = date('Y');
			$p1 = $bulan[(int)$b]." ".$t;
			$p2 = $bulan[(int)date('m')]." ".date('Y');
			$cek = $mod->getSome('na',['periode' => $bulan[(int)$b]." ".$t]);
			if(count($cek) > 0){
				$data['data'] = $db->query("select karyawan.*, na.na from na join karyawan on na.kodekaryawan = karyawan.kodekaryawan where na.periode = '".$bulan[(int)$b]." ".$t."' order by na.na desc, karyawan.nama asc")->getResultArray();
				$data['status'] = 'on';
			}else{
				$data['data'] = $db->query("select karyawan.* from nilai join karyawan on nilai.kodekaryawan = karyawan.kodekaryawan where nilai.periode = '".$bulan[(int)$b]." ".$t."' group by karyawan.nama asc")->getResultArray();
				$data['status'] = 'off';
			}
			if($p1 == $p2){
				$data['proses'] = 'on';
			}else{
				$data['proses'] = 'off';
			}
			$data['bulan'] = $b;
			$data['tahun'] = $t;
			return view('admin/analisa',$data);
		}else{
			return redirect()->to(base_url(''));
		}
	}

	public function tampildata(){
		$bulan = array('1' => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		$db = db_connect();
		$mod = new Databasemodel();
		$b = $this->request->getPost('bulan');
		$t = $this->request->getPost('tahun');
		$p1 = $bulan[(int)$b]." ".$t;
		$p2 = $bulan[(int)date('m')]." ".date('Y');
		$cek = $mod->getSome('na',['periode' => $bulan[(int)$b]." ".$t]);
		if(count($cek) > 0){
			$data['data'] = $db->query("select karyawan.*, na.na from na join karyawan on na.kodekaryawan = karyawan.kodekaryawan where na.periode = '".$bulan[(int)$b]." ".$t."' order by na.na desc, karyawan.nama asc")->getResultArray();
			$data['status'] = 'on';
		}else{
			$data['data'] = $db->query("select karyawan.* from nilai join karyawan on nilai.kodekaryawan = karyawan.kodekaryawan where nilai.periode = '".$bulan[(int)$b]." ".$t."' group by karyawan.nama asc")->getResultArray();
			$data['status'] = 'off';
		}
		if($p1 == $p2){
			$data['proses'] = 'on';
		}else{
			$data['proses'] = 'off';
		}
		$data['bulan'] = $b;
		$data['tahun'] = $t;
		return view('admin/analisa',$data);
	}

	public function prosesdata($x){
		$mod = new Databasemodel();
		$db = db_connect();
		$bulan = array('1' => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		$x = explode("_", $x);
		$b = $x[0];
		$t = $x[1];
		$periode = $bulan[$x[0]]." ".$x[1];
		$karyawan = $db->query("select karyawan.kodekaryawan from nilai join karyawan on nilai.kodekaryawan = karyawan.kodekaryawan where nilai.periode = '".$periode."' group by karyawan.kodekaryawan asc")->getResultArray();
		foreach ($karyawan as $ky) {
			$na = 0;
			$kriteria = $db->query("select kriteria.bobot, kriteria.kategori, skema.kodekriteria from skema join kriteria on skema.kodekriteria = kriteria.kodekriteria where skema.periode = '".$periode."'")->getResultArray();
			foreach ($kriteria as $kr) {
				$x = $db->query("select nilai from nilai where periode = '".$periode."' and kodekriteria = '".$kr['kodekriteria']."' and kodekaryawan = '".$ky['kodekaryawan']."'")->getRowArray()['nilai'];
				$n = $db->query("select min(nilai) as min, max(nilai) as max from nilai where periode = '".$periode."' and kodekriteria = '".$kr['kodekriteria']."'")->getRowArray();
				$max = $n['max'];
				$min = $n['min'];
				if($kr['kategori'] == 'Benefit'){
					$na += ($x/$max) * ($kr['bobot']/100);
				}else{
					$na += ($min/$x) * ($kr['bobot']/100);
				}
			}
			$cek = $mod->getSome('na',['periode' => $periode,'kodekaryawan' => $ky['kodekaryawan']]);
			if(count($cek) > 0){
				$cek = $mod->getData('na',['periode' => $periode,'kodekaryawan' => $ky['kodekaryawan']]);
				$mod->updating('na',['na' => $na],['kodena' => $cek['kodena']]);
			}else{
				$data = array(
					'kodena' => null,
					'na' => $na,
					'periode' => $periode,
					'kodekaryawan' => $ky['kodekaryawan']
				);
				$mod->inserting('na',$data);
			}
		}
		$p1 = $bulan[$b]." ".$t;
		$p2 = $bulan[date('m')]." ".date('Y');
		$cek = $mod->getSome('na',['periode' => $bulan[$b]." ".$t]);
		if(count($cek) > 0){
			$data['data'] = $db->query("select karyawan.*, na.na from na join karyawan on na.kodekaryawan = karyawan.kodekaryawan where na.periode = '".$bulan[$b]." ".$t."' order by na.na desc, karyawan.nama asc")->getResultArray();
			$data['status'] = 'on';
		}else{
			$data['data'] = $db->query("select karyawan.* from nilai join karyawan on nilai.kodekaryawan = karyawan.kodekaryawan where nilai.periode = '".$bulan[$b]." ".$t."' group by karyawan.nama asc")->getResultArray();
			$data['status'] = 'off';
		}
		if($p1 == $p2){
			$data['proses'] = 'on';
		}else{
			$data['proses'] = 'off';
		}
		$data['bulan'] = $b;
		$data['tahun'] = $t;
		return view('admin/analisa',$data);
	}

	public function cetakdata($x){
		$dbm = new Databasemodel();
		$db = db_connect();
		$bul = array('1' => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		$x = explode("_", $x);
		$periode = $bul[$x[0]]." ".$x[1];
		$kriteria = $db->query("select kriteria.* from skema join kriteria on skema.kodekriteria = kriteria.kodekriteria where skema.periode = '".$periode."' order by kriteria.kriteria asc")->getResultArray();
		$hasil = $db->query("select karyawan.*, na.na from na join karyawan on na.kodekaryawan = karyawan.kodekaryawan where na.periode = '".$periode."' order by na.na desc")->getResultArray();
		$terpilih = $db->query("select karyawan.*, na.na from na join karyawan on na.kodekaryawan = karyawan.kodekaryawan where na.periode = '".$periode."' order by na.na desc limit 1")->getRowArray();
		$this->pdf = new fpdf('P','mm','A4');

		$this->pdf->AddPage();
		$this->pdf->SetLineWidth(1);
		$this->pdf->Line(10,27,200,27);
		$this->pdf->SetLineWidth(0);
		$this->pdf->SetFont('Times','B',14);
		$this->pdf->Cell(190,6,'PEMERINTAH KOTA PEKALONGAN',0,1,'C');
		$this->pdf->SetFont('Times','B',16);
		$this->pdf->Cell(190,6,'BADAN PERTANAHAH NASIONAL (BPN)',0,1,'C');
		$this->pdf->SetFont('Times','',11);
		$this->pdf->Cell(190,4,'Alamat : Jl. Majapahit No.2, Podosugih, Kota Pekalongan, Jawa Tengah 51111 Telp. : (0285) 421152',0,1,'C');
		$this->pdf->SetFont('Times','BU',12);
		$this->pdf->Ln(9);
		$this->pdf->Cell(190,6,'LAPORAN ANALISA PENILAIAN KARYAWAN TERBAIK',0,1,'C');
		$this->pdf->SetFont('Times','',12);
		$this->pdf->Cell(190,6,"Periode : ".$periode,0,1,'C');
		$this->pdf->Ln(10);

		$this->pdf->SetFont('Times','B',12);
		$this->pdf->Cell(190,7,'1. Kriteria Penilaian',0,1);
		$this->pdf->SetFont('Times','B',11);
		$this->pdf->Cell(5,6,'',0,0);
		$this->pdf->Cell(120,6,'Kriteria',1,0,'C');
		$this->pdf->Cell(20,6,'Kategori',1,0,'C');
		$this->pdf->Cell(15,6,'Bobot',1,0,'C');
		$this->pdf->Cell(30,6,'Inisial',1,1,'C');
		$this->pdf->SetFont('Times','',9);
		$n = 1;
		foreach ($kriteria as $k) {
			$this->pdf->Cell(5,6,'',0,0);
			$this->pdf->Cell(120,6,$k['kriteria'],1,0);
			$this->pdf->Cell(20,6,$k['kategori'],1,0,'C');
			$this->pdf->Cell(15,6,$k['bobot']." %",1,0,'C');
			$this->pdf->Cell(30,6,"K".$n,1,1,'C');
			$n++;
		}
		$this->pdf->Ln(2);
		
		$this->pdf->SetFont('Times','B',12);
		$this->pdf->Cell(190,7,'2. Data Penilaian',0,1);
		$b = 185-(10*count($kriteria));
		$this->pdf->SetFont('Times','B',11);
		$this->pdf->Cell(5,6,'',0,0);
		$this->pdf->Cell($b,6,'Karyawan',1,0,'C');
		for ($i=1; $i <= count($kriteria); $i++) {
			if($i == count($kriteria)){
				$this->pdf->Cell(10,6,'K'.$i,1,1,'C');
			}else{
				$this->pdf->Cell(10,6,'K'.$i,1,0,'C');	
			}
		}
		$this->pdf->SetFont('Times','',9);
		foreach ($hasil as $s) {
			$i = 1;
			$this->pdf->Cell(5,6,'',0,0);
			$this->pdf->Cell($b,6,$s['nama'],1,0);
			foreach ($kriteria as $k) {
				$where = array(
					'periode' => $periode,
					'kodekriteria' => $k['kodekriteria'],
					'kodekaryawan' => $s['kodekaryawan']
				);
				$nilai = $dbm->getData('nilai',$where)['nilai'];
				if($i == count($kriteria)){
					$this->pdf->Cell(10,6,$nilai,1,1,'C');
				}else{
					$this->pdf->Cell(10,6,$nilai,1,0,'C');	
				}
				$i++;
			}
		}
		$this->pdf->Ln(2);

		$this->pdf->SetFont('Times','B',12);
		$this->pdf->Cell(190,7,'3. Nilai Akhir Analisa',0,1);
		$this->pdf->SetFont('Times','B',11);
		$this->pdf->Cell(5,6,'',0,0);
		$this->pdf->Cell(40,6,'NIP',1,0,'C');
		$this->pdf->Cell(65,6,'Nama',1,0,'C');
		$this->pdf->Cell(18,6,'Gol.',1,0,'C');
		$this->pdf->Cell(47,6,'Jabatan',1,0,'C');
		$this->pdf->Cell(15,6,'NA',1,1,'C');
		$this->pdf->SetFont('Times','',9);
		foreach ($hasil as $h) {
			$this->pdf->Cell(5,6,'',0,0);
			$this->pdf->Cell(40,6,$h['nip'],1,0);
			$this->pdf->Cell(65,6,$h['nama'],1,0);
			$this->pdf->Cell(18,6,$h['golongan'],1,0);
			$this->pdf->Cell(47,6,$h['jabatan'],1,0);
			$this->pdf->Cell(15,6,number_format($h['na'],4),1,1,'R');
		}
		$this->pdf->Ln(2);

		$this->pdf->SetFont('Times','B',12);
		$this->pdf->Cell(190,7,'4. Kesimpulan',0,1);
		$this->pdf->SetFont('Times','',11);
		$this->pdf->Cell(5,6,'',0,0);
		$this->pdf->MultiCell(185, 6, "Berdasarkan perhitungan yang telah dilakukan dengan menggunakan algoritma metode Simple Additive Weighting (SAW) pada penilaian Karyawan Terbaik. Diketahui bahwa dari ".count($hasil)." Karyawan, yang terpilih menjadi Karyawan Terbaik periode ".$periode." adalah ".$terpilih['nama']." dengan nilai akhir sebesar : ".number_format($terpilih['na'],4),0,'J');

		$this->pdf->Ln(10);
		$this->pdf->SetFont('Times','',12);
		$this->pdf->Cell(95,7,'',0,0,'C');
		$this->pdf->Cell(95,7,'Pekalongan, '.$this->tanggal_indo(date('Y-m-d')),0,1,'C');
		$this->pdf->SetFont('Times','',12);
		$this->pdf->Cell(95,7,'',0,0,'C');
		$this->pdf->Cell(95,7,'Analis SDM Aparatur Pertama',0,1,'C');
		$this->pdf->Ln(20);
		$this->pdf->SetFont('Times','BU',12);
		$this->pdf->Cell(95,7,'',0,0,'C');
		$this->pdf->Cell(95,5,'HENRY PRIYONO JOHAN, S.H.',0,1,'C');
		$this->pdf->SetFont('Times','',12);
		$this->pdf->Cell(95,7,'',0,0,'C');
		$this->pdf->Cell(95,5,'197208311994031003',0,1,'C');
		$this->pdf->Cell(95,7,'',0,0,'C');

		$this->pdf->Output("Laporan Analisa (".date('dmyHi').").pdf", 'D');
	}

	function tanggal_indo($tanggal, $cetak_hari = false){
		$bulan = array (1 =>   'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		$split    = explode('-', $tanggal);
		$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		return $tgl_indo;
	}
}
?>