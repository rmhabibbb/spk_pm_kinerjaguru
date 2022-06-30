<?php 
class Penilaian_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'id';
    $this->data['table_name'] = 'penilaian';
  }


  public function get_guru($id_kinerja){
  		$query = $this->db->query('SELECT id_guru FROM `penilaian` WHERE id_kinerja = '.$id_kinerja.' GROUP by id_guru ' );
		return $query->result();
  	
  }

  public function ProfileMatching($id_kinerja){

  	$kinerja = $this->Kinerja_m->get_row(['id_kinerja'=> $id_kinerja]);
  	$list_kriteria = $this->Kriteria_m->get(); 
  	//$data = $this->Penilaian_m->get(['id_kinerja' => $id_kinerja]); 
  	$list_guru = $this->get_guru($id_kinerja);

  	$nilai_awal_gap = array();
  	foreach ($list_guru as $g) {
  		$a = array();
  		foreach ($list_kriteria as $k) {

	 		$b = array();
	  		$c = array();
	  		$list_sub = $this->Subkriteria_m->get(['id_kriteria' => $k->id_kriteria]);
	 		
	  		foreach ($list_sub as $s) {
	  			$nilai = $this->Penilaian_m->get_row(['id_kinerja' => $id_kinerja, 'id_guru' => $g->id_guru, 'id_sub' => $s->id_sub])->nilai;

	  			$gap = $nilai - $s->nilai_standar;

	  			$z = [
	  				'id_sub' => $s->id_sub,
	  				'jenis' => $s->jenis,
	  				'awal' => $nilai,
	  				'gap' => $gap
	  			];
	  			
	  			array_push($b, $z);  
	  		}
	  		array_push($a, ['id_kriteria' => $k->id_kriteria, 'bk' => $k->bobot_kriteria,'nk' => $k->nama_kriteria, 'nilai' => $b, 'gap' => $c]);
	  	}
	  	array_push($nilai_awal_gap, ['id_guru' => $g->id_guru, 'data' => $a]);
  	}
 	 
  	$bobot_gap = array();

  	for ($i=0; $i < sizeof($nilai_awal_gap) ; $i++) {  
  		$b = array();
  		for ($j=0; $j < sizeof($nilai_awal_gap[$i]['data']) ; $j++) { 
	  	$c = array();
  			for ($k=0; $k < sizeof($nilai_awal_gap[$i]['data'][$j]['nilai']) ; $k++) { 
  				if ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == 0) {
	  				$x = 5;
	  			}elseif ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == 1) {
	  				$x = 4.5;
	  			}elseif ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == -1) {
	  				$x = 4;
	  			}elseif ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == 2) {
	  				$x = 3.5;
	  			}elseif ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == -2) {
	  				$x = 3;
	  			}elseif ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == 3) {
	  				$x = 2.5;
	  			}elseif ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == -3) {
	  				$x = 2;
	  			}elseif ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == 4) {
	  				$x = 1.5;
	  			}elseif ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == -4) {
	  				$x = 1;
	  			}
	  			$z = [
	  				'id_sub' => $nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['id_sub'],
	  				'jenis' => $nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['jenis'],
	  				'bobot_gap' => $x 
	  			];
	  			array_push($c, $z);
  			}
	  		array_push($b, ['id_kriteria' => $nilai_awal_gap[$i]['data'][$j]['id_kriteria'], 'bk' => $nilai_awal_gap[$i]['data'][$j]['bk'], 'nk' => $nilai_awal_gap[$i]['data'][$j]['nk'], 'nilai' => $c]); 
  		}
	  	array_push($bobot_gap, ['id_guru' => $nilai_awal_gap[$i]['id_guru'], 'data' => $b]);
  	}
 
  	$kelompok_bobot_gap = array();
  	for ($i=0; $i < sizeof($bobot_gap) ; $i++) {  
  		$b = array();
  		for ($j=0; $j < sizeof($bobot_gap[$i]['data']) ; $j++) { 
	  	$core = 0;
	  	$x_core = 0;
	  	$secondary = 0;
	  	$x_secondary = 0;
  			for ($k=0; $k < sizeof($bobot_gap[$i]['data'][$j]['nilai']) ; $k++) { 

  				if ($bobot_gap[$i]['data'][$j]['nilai'][$k]['jenis'] == 'Core Factor') {
  					$core = $core + $bobot_gap[$i]['data'][$j]['nilai'][$k]['bobot_gap'];
  					$x_core++;
  				}
  				else{ 
		  			$secondary = $secondary + $bobot_gap[$i]['data'][$j]['nilai'][$k]['bobot_gap'];
		  			$x_secondary++;
	  			}
	  		}
	  		array_push($b, ['id_kriteria' => $bobot_gap[$i]['data'][$j]['id_kriteria'],'bk' => $bobot_gap[$i]['data'][$j]['bk'],'nk' => $bobot_gap[$i]['data'][$j]['nk'], 'core' => $core/$x_core, 'secondary' => $secondary/$x_secondary]); 
  			
  		}
	  	array_push($kelompok_bobot_gap, ['id_guru' => $bobot_gap[$i]['id_guru'], 'data' => $b]);
  	}

  	$nilai_total_kompetensi = array();
  	for ($i=0; $i < sizeof($kelompok_bobot_gap) ; $i++) {  
  		$b = array();
  		for ($j=0; $j < sizeof($kelompok_bobot_gap[$i]['data']) ; $j++) { 
	  	 
  			$total = (($kinerja->persen_NCF/100)*$kelompok_bobot_gap[$i]['data'][$j]['core'])+(($kinerja->persen_NSF/100)*$kelompok_bobot_gap[$i]['data'][$j]['secondary']);
	  		array_push($b, ['id_kriteria' => $kelompok_bobot_gap[$i]['data'][$j]['id_kriteria'],'bk' => $kelompok_bobot_gap[$i]['data'][$j]['bk'],'nk' => $kelompok_bobot_gap[$i]['data'][$j]['nk'], 'total' => $total]); 
  			
  		}
	  	array_push($nilai_total_kompetensi, ['id_guru' => $kelompok_bobot_gap[$i]['id_guru'], 'data' => $b]);
  	}

  	$hasil_akhir = array();
  	for ($i=0; $i < sizeof($nilai_total_kompetensi) ; $i++) {  
  		$b = array();
  		$ha = 0;
  		for ($j=0; $j < sizeof($nilai_total_kompetensi[$i]['data']) ; $j++) { 
	  	  	$o = (($nilai_total_kompetensi[$i]['data'][$j]['bk']/100)*$nilai_total_kompetensi[$i]['data'][$j]['total']);
	  	  	$ha = $ha + $o;
  			array_push($b, $o);
  		}

  		$d = [
  			'ha' => $ha,
			'id_guru' => $nilai_total_kompetensi[$i]['id_guru'], 
			'n' => $b
  		];
	  	array_push($hasil_akhir, $d);
  	}

  	//var_dump($bobot_gap[4]['data'][0] );
  	//var_dump($nilai_total_kompetensi[4] );
  	//var_dump($hasil_akhir[4] );
  	//var_dump($kelompok_bobot_gap[4] );

	//var_dump($nilai_awal_gap[0]['data'][0]['nilai'][0]['gap']);
  	 

  	$this->data['nilai_awal_gap'] = $nilai_awal_gap;
  	$this->data['bobot_gap'] = $bobot_gap;
  	$this->data['kelompok_bobot_gap'] = $kelompok_bobot_gap;
  	$this->data['nilai_total_kompetensi'] = $nilai_total_kompetensi;
  	$this->data['hasil_akhir'] = $hasil_akhir;
  	rsort($hasil_akhir);
  	$this->data['rank'] = $hasil_akhir;
  	$this->data['list_guru'] = $list_guru;
 

	
  	return $this->data;
  	

  }
}

 ?>
