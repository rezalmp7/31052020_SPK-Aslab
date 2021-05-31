<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengumuman extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('M_admin');
	}
	
	function perhitungan(){
        
            $result = $this->M_admin->select_all('kriteria')->result_array();
            //-- menyiapkan variable penampung berupa array
            $kriteria=array();
            $bobot=array();
            //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
            foreach ($result as $row) {
                $kriteria[$row['id']]=array($row['nama'],$row['tipe']);
                $bobot[$row['id']]=$row['bobot']/100;
            }


            //-- query untuk mendapatkan semua data kriteria di tabel vik_alternatif
            $result =  $this->M_admin->select_all('produk')->result_array();
            //-- menyiapkan variable penampung berupa array
            $alternatif=array();
            //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
            foreach ($result as $row) {
                $alternatif[$row['id']]=$row['nama'];
            }

            //-- query untuk mendapatkan semua data sample penilaian di tabel vik_sample
            $result = $this->M_admin->select_all_order_by('*', 'data_nilai', 'id_kriteria ASC, id_peserta ASC')->result_array();
            //-- menyiapkan variable penampung berupa array
            $sample=array();
            //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
            foreach ($result as $row) {
                //-- jika array $sample[$row['id_alternatif']] belum ada maka buat baru
                //-- $row['id_alternatif'] adalah id kandidat/alternatif
                if (!isset($sample[$row['id']])) {
                    $sample[$row['id_peserta']] = array();
                }
                $sample[$row['id_peserta']][$row['id_kriteria']] = $row['nilai'];

            }

            // //-- melakukan iterasi utk setiap alternatif
            // foreach ($sample as $id_altenatif=>$kriteria) {
            //     echo "<tr>";
            //     //-- melakukan iterasi utk setiap kriteria
            //     foreach($kriteria as $id_kriteria=>$nilai){
            //         echo "<td>{$nilai}</td>";
            //     }
            //     echo "</tr>";
            // }

            $f_plus=$f_min=array();
            //-- melakukan iterasi utk setiap alternatif
            foreach ($sample as $id_altenatif=>$kriteria) {
                //-- melakukan iterasi utk setiap kriteria
                foreach($kriteria as $j=>$nilai){
                    //-- inisialisai nilai f_plus dan f_min
                    if(!isset($f_plus[$j])) {
                        $f_plus[$j]=0;
                        $f_min[$j]=9999999;
                    }
                    $f_plus[$j] = ($f_plus[$j] < $nilai ? $nilai : $f_plus[$j]);
                    $f_min[$j] = ($f_min[$j] > $nilai ? $nilai : $f_min[$j]);
                    
                }
                
            }


            $N=array();
            //-- melakukan iterasi utk setiap alternatif
            foreach ($sample as $i=>$kriteria) {
                $N[$i]=array();
                //-- melakukan iterasi utk setiap kriteria
                foreach($kriteria as $j=>$nilai){
                    $N[$i][$j]=($f_plus[$j] - $nilai)/($f_plus[$j]-$f_min[$j]);
                }
            }

            $F_star=array();
            //-- melakukan iterasi utk setiap alternatif
            foreach ($N as $i=>$kriteria) {
                $F_star[$i]=array();
                //-- melakukan iterasi utk setiap kriteria
                foreach($kriteria as $j=>$nilai){
                    $F_star[$i][$j]=$nilai * $bobot[$j];
                }
            }

            $S=$R=array();
            //-- melakukan iterasi utk setiap alternatif
            foreach ($F_star as $i=>$kriteria) {
                $S[$i]=$R[$i]=0;
                //-- melakukan iterasi utk setiap kriteria
                foreach($kriteria as $j=>$nilai){
                    $S[$i]+=$nilai;
                    $R[$i]=($R[$i]<$nilai ? $nilai : $R[$i]);
                }
            }

            //-- inisialisasi nilai index VKOR (Q)
            $Q=array();
            //-- deklarasi fungsi untuk mencari nilai index VIKOR (Q)
            function get_Q($S,$R,$v=0.5)
            {
                //-- mencari nilai S_plus,S_min,R_plus dan R_min
                $S_plus=max($S);
                $S_min=min($S);
                $R_plus=max($R);
                $R_min=min($R);
                $Q=array();
                foreach($R as $i=>$r){
                    $Q[$i]=$v*(($S[$i]-$S_min)/($S_plus-$S_min))+(1-$v)*(($R[$i]-$R_min)/($R_plus-$R_min));
                }
                return $Q;
            }
            //-- inisiasi nilai v untuk nilai by vote, by consensus, dan voting by majority rule
            $v=array(0.4,0.5,0.6);
            //-- menghitung nilai index VIKOR (Q) untuk v=0.5 (by consensus)
            $Q[$v[1]]=get_Q($S,$R);

            //-- mengurutkan nilai indeks VIKOR Q
            asort($Q[$v[1]]);
            //-- inisialisasi variabel array sQ
            $sQ=array();
            function get_sQ($Q)
            {
                $s_Q=array();
                foreach($Q as $i=>$v)
                    $s_Q[]=array($i,$v);
                return $s_Q;
            }
            $sQ[$v[1]]=get_sQ($Q[$v[1]]);

            //-- inisialisasi kondisi_1
            $kondisi_1=0;
            //-- m adalah jumlah alternatif
            $m = count($sample);
            //-- menghitung nilai DQ
            $DQ = 1 / ($m - 1);
            //-- pengecekan kondisi Acceptable Advantage
            // if( ($sQ[$v[1]][1][1]-$sQ[$v[1]][0][1]) >= $DQ ){
            //     $kondisi_1=1;
            //     echo 'kondisi 1 terpenuhi<br>';
            // }else{
            //     echo 'kondisi 1 tidak terpenuhi<br>';
            // }

            //-- inisialisasi kondisi_2
            $kondisi_2=0;
            //-- menghitung nilai Q untuk v=$V[0] (by vote)
            $Q[$v[0]]=get_Q($S,$R,$v[0]);
            asort($Q[$v[0]]);
            $sQ[$v[0]]=get_sQ($Q[$v[0]]);
            //-- menghitung nilai Q untuk v=$V[2] (voting by majority rule)
            $Q[$v[2]]=get_Q($S,$R,$v[2]);
            asort($Q[$v[2]]);
            $sQ[$v[2]]=get_sQ($Q[$v[2]]);
            //-- pengecekan kondisi Acceptable Stability in Decision Making
            // if(($sQ[$v[1]][0][1]==$sQ[$v[0]][0][1]) && ($sQ[$v[1]][0][1]==$sQ[$v[2]][0][1])){
            //     $kondisi_2=1;
            //     echo 'kondisi 2 terpenuhi<br>';
            // }else{
            //     echo 'kondisi 2 tidak terpenuhi<br>';
            // }
            
            $kondisi_1 = 1;
            $kondisi_2 = 1;
            
            if($kondisi_1==1){
                if($kondisi_2==1){
                    $alternatif[$sQ[$v[1]][0][0]];
                }else{
                    $alternatif[$sQ[$v[1]][0][0]];
                    $alternatif[$Q[$v[1]][1][0]];
                }
            } else{
                if($m>1){
                    $nm=array();
                    for($i=0;$i<$m;$i++) $nm[]=$alternatif[$sQ[$v[1]][$i][0]];
                    $nm_a=array_pop($nm);
                    implode(', ',$nm);
                }else{
                    $alternatif[$sQ[$v[1]][0][0]];
                }
            }

            $hasil_real = array();
            $i = 0;
            foreach ($alternatif as $alt) {
                $hasil_real[] = $alternatif[$sQ[$v[1]][$i][0]];
                $i++;
            }
            
            return $hasil_real;
	}
	public function index()
	{
		$where_cek = array(
			'id' => 3
		);
		$cek_pengumuman = $this->M_admin->select_where('configurasi', $where_cek)->row();
		$data['pengumuman'] = $this->M_admin->select_where('configurasi', $where_cek)->row();
		if($cek_pengumuman->value == 'true')
		{
			$where_jumlah_diterima = array(
				'id' => 2
			);
			$data['max_diterima'] = $this->M_admin->select_where('configurasi', $where_jumlah_diterima)->row();
        	$data['hasil'] = $this->perhitungan();
		}
		else {
			$data['hasil'] = "Tunggu Sampai Hari Pengumuman";
		}
        $this->load->view('layout/header');
        $this->load->view('pengumuman', $data);
        $this->load->view('layout/footer');
	}
}
