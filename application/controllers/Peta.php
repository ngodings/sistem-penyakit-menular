<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PasienM', '', true);
        $this->load->library('form_validation');

    }
    public function index()
    {
		$data = [
			'penyakit' => $this->PasienM->view_penyakit()
		 ];
        


        $this->load->view('template/header', $data);
        $this->load->view('data/index', $data);
        $this->load->view('template/footer');
    }

    public function Data()
    {
        $data['judul'] = "Data Penyakit Menular";


        $this->load->view('template/head', $data);
        $this->load->view('front/data', $data);
        $this->load->view('template/footer');
    }
	public function TBC()
    {
        $data['judul'] = "Data Penyakit Menular";


        $this->load->view('front/tbc', $data);
        
    }

    public function bidang_detail($id_kec=null)
    {
        $data['id_kec'] = $id_kec;
        $data['kec'] = $this->db->get_where('kecamatan', array('id_kec'=>$id_kec))->result();
		
		
        
        $this->load->view('front/kecamatan', $data);
    }

    public function corona($id_kec=null)
    {
		// $data =  // jumlah pasien
        // $data_nama=$this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id_kec))->row()->nama_kecamatan;

		$data = [
			'jumlah_pasien' => $this->PasienM->get_all_corona($id_kec),
			'aktif' => $this->PasienM->get_all_corona_aktif($id_kec),
			'sembuh' => $this->PasienM->get_all_corona_sembuh($id_kec),
			'die' => $this->PasienM->get_all_corona_die($id_kec),
			
			'nama_kecamatan' => $this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id_kec))->row()->nama_kecamatan
		];
        echo json_encode($data);
    }

	public function corona_kel($id_kel=null)
    {
		$tgl=date('Y-m-d');

		$data = [
			'jumlah_pasien' => $this->PasienM->get_covid_kel($id_kel),
			'jumlah_pasien_aktif' => $this->PasienM->covid_kel($id_kel, 'Dalam Perawatan'),
			'jumlah_pasien_sembuh' => $this->PasienM->covid_kel($id_kel, 'Sembuh'),
			'jumlah_pasien_die' => $this->PasienM->covid_kel($id_kel, 'Meninggal'),
		
		//dalam perawatan
		'pr_aktif_balita' => $this->PasienM->covid_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '2016-01-01', $tgl),
		'lk_aktif_balita' => $this->PasienM->covid_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '2016-01-01', $tgl),
		'pr_aktif_anak' => $this->PasienM->covid_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '2009-01-01', '2017-01-01'),
		'lk_aktif_anak' => $this->PasienM->covid_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '2009-01-01', '2017-01-01'),
		'pr_aktif_remaja' => $this->PasienM->covid_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '1997-01-01', '2008-01-01'),
		'lk_aktif_remaja' => $this->PasienM->covid_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '1997-01-01', '2008-01-01'),
		'pr_aktif_dewasa' => $this->PasienM->covid_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '1976-01-01', '1996-01-01'),
		'lk_aktif_dewasa' => $this->PasienM->covid_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '1976-01-01', '1996-01-01'),
		'pr_aktif_lansia' => $this->PasienM->covid_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '1940-01-01', '1975-01-01'),
		'lk_aktif_lansia' => $this->PasienM->covid_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '1940-01-01', '1975-01-01'),
		//sembuh
		'pr_sembuh_balita' => $this->PasienM->covid_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '2016-01-01', $tgl),
		'lk_sembuh_balita' => $this->PasienM->covid_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '2016-01-01', $tgl),
		'pr_sembuh_anak' => $this->PasienM->covid_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '2009-01-01', '2017-01-01'),
		'lk_sembuh_anak' => $this->PasienM->covid_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '2009-01-01', '2017-01-01'),
		'pr_sembuh_remaja' => $this->PasienM->covid_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '1997-01-01', '2008-01-01'),
		'lk_sembuh_remaja' => $this->PasienM->covid_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '1997-01-01', '2008-01-01'),
		'pr_sembuh_dewasa' => $this->PasienM->covid_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '1976-01-01', '1996-01-01'),
		'lk_sembuh_dewasa' => $this->PasienM->covid_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '1976-01-01', '1996-01-01'),
		'pr_sembuh_lansia' => $this->PasienM->covid_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '1940-01-01', '1975-01-01'),
		'lk_sembuh_lansia' => $this->PasienM->covid_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '1940-01-01', '1975-01-01'),
		//meninggal
		'pr_die_balita' => $this->PasienM->covid_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '2016-01-01', $tgl),
		'lk_die_balita' => $this->PasienM->covid_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '2016-01-01', $tgl),
		'pr_die_anak' => $this->PasienM->covid_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '2009-01-01', '2017-01-01'),
		'lk_die_anak' => $this->PasienM->covid_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '2009-01-01', '2017-01-01'),
		'pr_die_remaja' => $this->PasienM->covid_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '1997-01-01', '2008-01-01'),
		'lk_die_remaja' => $this->PasienM->covid_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '1997-01-01', '2008-01-01'),
		'pr_die_dewasa' => $this->PasienM->covid_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '1976-01-01', '1996-01-01'),
		'lk_die_dewasa' => $this->PasienM->covid_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '1976-01-01', '1996-01-01'),
		'pr_die_lansia' => $this->PasienM->covid_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '1940-01-01', '1975-01-01'),
		'lk_die_lansia' => $this->PasienM->covid_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '1940-01-01', '1975-01-01'),
		'nama_kelurahan' => $this->db->limit(1)->get_where('kelurahan', array('id_kel'=>$id_kel))->row()->nama_kelurahan
		];
        echo json_encode($data);
    }

    public function getCountKecamatan()
    {
		$data = $this->PasienM->Percobaan();
		echo json_encode($data);
    }


	//TBC DAN DETAIL TBC
	public function get_tbc($id_kec=null)
    {
	

		$data = [
			'jumlah_pasien' => $this->PasienM->get_all_tbc($id_kec),
			'aktif' => $this->PasienM->get_all_tbc_aktif($id_kec),
			'sembuh' => $this->PasienM->get_all_tbc_sembuh($id_kec),
			'die' => $this->PasienM->get_all_tbc_die($id_kec),
			
			'nama_kecamatan' => $this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id_kec))->row()->nama_kecamatan
		];
        echo json_encode($data);
    }
	public function get_detail_tbc($id_kec=null)
    {
	
        $data['id_kec'] = $id_kec;
        $data['kec'] = $this->db->get_where('kecamatan', array('id_kec'=>$id_kec))->result();
		
		
        
        $this->load->view('front/detail-tbc', $data);
    }

	public function tbc_kel($id_kel=null)
    {
		$tgl=date('Y-m-d');

		$data = [
			'jumlah_pasien' => $this->PasienM->get_tbc_kel($id_kel),
			'jumlah_pasien_aktif' => $this->PasienM->tbc_kel($id_kel, 'Dalam Perawatan'),
			'jumlah_pasien_sembuh' => $this->PasienM->tbc_kel($id_kel, 'Sembuh'),
			'jumlah_pasien_die' => $this->PasienM->tbc_kel($id_kel, 'Meninggal'),
			
			//dalam perawatan
			'pr_aktif_balita' => $this->PasienM->tbc_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '2016-01-01', $tgl),
			'lk_aktif_balita' => $this->PasienM->tbc_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '2016-01-01', $tgl),
			'pr_aktif_anak' => $this->PasienM->tbc_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '2009-01-01', '2017-01-01'),
			'lk_aktif_anak' => $this->PasienM->tbc_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '2009-01-01', '2017-01-01'),
			'pr_aktif_remaja' => $this->PasienM->tbc_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '1997-01-01', '2008-01-01'),
			'lk_aktif_remaja' => $this->PasienM->tbc_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '1997-01-01', '2008-01-01'),
			'pr_aktif_dewasa' => $this->PasienM->tbc_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '1976-01-01', '1996-01-01'),
			'lk_aktif_dewasa' => $this->PasienM->tbc_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '1976-01-01', '1996-01-01'),
			'pr_aktif_lansia' => $this->PasienM->tbc_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '1940-01-01', '1975-01-01'),
			'lk_aktif_lansia' => $this->PasienM->tbc_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '1940-01-01', '1975-01-01'),
			//sembuh
			'pr_sembuh_balita' => $this->PasienM->tbc_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '2016-01-01', $tgl),
			'lk_sembuh_balita' => $this->PasienM->tbc_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '2016-01-01', $tgl),
			'pr_sembuh_anak' => $this->PasienM->tbc_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '2009-01-01', '2017-01-01'),
			'lk_sembuh_anak' => $this->PasienM->tbc_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '2009-01-01', '2017-01-01'),
			'pr_sembuh_remaja' => $this->PasienM->tbc_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '1997-01-01', '2008-01-01'),
			'lk_sembuh_remaja' => $this->PasienM->tbc_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '1997-01-01', '2008-01-01'),
			'pr_sembuh_dewasa' => $this->PasienM->tbc_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '1976-01-01', '1996-01-01'),
			'lk_sembuh_dewasa' => $this->PasienM->tbc_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '1976-01-01', '1996-01-01'),
			'pr_sembuh_lansia' => $this->PasienM->tbc_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '1940-01-01', '1975-01-01'),
			'lk_sembuh_lansia' => $this->PasienM->tbc_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '1940-01-01', '1975-01-01'),
			//meninggal
			'pr_die_balita' => $this->PasienM->tbc_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '2016-01-01', $tgl),
			'lk_die_balita' => $this->PasienM->tbc_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '2016-01-01', $tgl),
			'pr_die_anak' => $this->PasienM->tbc_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '2009-01-01', '2017-01-01'),
			'lk_die_anak' => $this->PasienM->tbc_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '2009-01-01', '2017-01-01'),
			'pr_die_remaja' => $this->PasienM->tbc_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '1997-01-01', '2008-01-01'),
			'lk_die_remaja' => $this->PasienM->tbc_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '1997-01-01', '2008-01-01'),
			'pr_die_dewasa' => $this->PasienM->tbc_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '1976-01-01', '1996-01-01'),
			'lk_die_dewasa' => $this->PasienM->tbc_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '1976-01-01', '1996-01-01'),
			'pr_die_lansia' => $this->PasienM->tbc_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '1940-01-01', '1975-01-01'),
			'lk_die_lansia' => $this->PasienM->tbc_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '1940-01-01', '1975-01-01'),

			'nama_kelurahan' => $this->db->limit(1)->get_where('kelurahan', array('id_kel'=>$id_kel))->row()->nama_kelurahan
		];
        echo json_encode($data);
    }

		//IMS DAN DETAIL IMS
		public function IMS()
    	{
        $data['judul'] = "Data Penyakit Menular";


        $this->load->view('front/ims', $data);
        
    	}
		public function get_ims($id_kec=null)
		{
		
	
			$data = [
				'jumlah_pasien' => $this->PasienM->get_ims($id_kec),
				'aktif' => $this->PasienM->get_all_ims($id_kec, 'Dalam Perawatan'),
				'sembuh' => $this->PasienM->get_all_ims($id_kec, 'Sembuh'),
				'die' => $this->PasienM->get_all_ims($id_kec, 'Meninggal'),
				
				'nama_kecamatan' => $this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id_kec))->row()->nama_kecamatan
			];
			echo json_encode($data);
		}
		public function get_detail_ims($id_kec=null)
		{
			$data['id_kec'] = $id_kec;
			$data['kec'] = $this->db->get_where('kecamatan', array('id_kec'=>$id_kec))->result();
			
			
			$this->load->view('front/detail-ims', $data);
		}
		public function ims_kel($id_kel=null)
    	{

			$tgl=date('Y-m-d');

		
		$data = [
			'jumlah_pasien' => $this->PasienM->get_ims_kel($id_kel),
			'jumlah_pasien_aktif' => $this->PasienM->get_ims_status($id_kel, 'Dalam Perawatan'),
			'jumlah_pasien_sembuh' => $this->PasienM->get_ims_status($id_kel, 'Sembuh'),
			'jumlah_pasien_die' => $this->PasienM->get_ims_status($id_kel, 'Meninggal'),

			//dalam perawatan
			'pr_aktif_balita' => $this->PasienM->ims_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '2016-01-01', $tgl),
			'lk_aktif_balita' => $this->PasienM->ims_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '2016-01-01', $tgl),
			'pr_aktif_anak' => $this->PasienM->ims_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '2009-01-01', '2017-01-01'),
			'lk_aktif_anak' => $this->PasienM->ims_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '2009-01-01', '2017-01-01'),
			'pr_aktif_remaja' => $this->PasienM->ims_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '1997-01-01', '2008-01-01'),
			'lk_aktif_remaja' => $this->PasienM->ims_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '1997-01-01', '2008-01-01'),
			'pr_aktif_dewasa' => $this->PasienM->ims_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '1976-01-01', '1996-01-01'),
			'lk_aktif_dewasa' => $this->PasienM->ims_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '1976-01-01', '1996-01-01'),
			'pr_aktif_lansia' => $this->PasienM->ims_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '1940-01-01', '1975-01-01'),
			'lk_aktif_lansia' => $this->PasienM->ims_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '1940-01-01', '1975-01-01'),
			//sembuh
			'pr_sembuh_balita' => $this->PasienM->ims_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '2016-01-01', $tgl),
			'lk_sembuh_balita' => $this->PasienM->ims_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '2016-01-01', $tgl),
			'pr_sembuh_anak' => $this->PasienM->ims_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '2009-01-01', '2017-01-01'),
			'lk_sembuh_anak' => $this->PasienM->ims_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '2009-01-01', '2017-01-01'),
			'pr_sembuh_remaja' => $this->PasienM->ims_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '1997-01-01', '2008-01-01'),
			'lk_sembuh_remaja' => $this->PasienM->ims_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '1997-01-01', '2008-01-01'),
			'pr_sembuh_dewasa' => $this->PasienM->ims_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '1976-01-01', '1996-01-01'),
			'lk_sembuh_dewasa' => $this->PasienM->ims_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '1976-01-01', '1996-01-01'),
			'pr_sembuh_lansia' => $this->PasienM->ims_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '1940-01-01', '1975-01-01'),
			'lk_sembuh_lansia' => $this->PasienM->ims_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '1940-01-01', '1975-01-01'),
			//meninggal
			'pr_die_balita' => $this->PasienM->ims_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '2016-01-01', $tgl),
			'lk_die_balita' => $this->PasienM->ims_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '2016-01-01', $tgl),
			'pr_die_anak' => $this->PasienM->ims_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '2009-01-01', '2017-01-01'),
			'lk_die_anak' => $this->PasienM->ims_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '2009-01-01', '2017-01-01'),
			'pr_die_remaja' => $this->PasienM->ims_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '1997-01-01', '2008-01-01'),
			'lk_die_remaja' => $this->PasienM->ims_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '1997-01-01', '2008-01-01'),
			'pr_die_dewasa' => $this->PasienM->ims_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '1976-01-01', '1996-01-01'),
			'lk_die_dewasa' => $this->PasienM->ims_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '1976-01-01', '1996-01-01'),
			'pr_die_lansia' => $this->PasienM->ims_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '1940-01-01', '1975-01-01'),
			'lk_die_lansia' => $this->PasienM->ims_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '1940-01-01', '1975-01-01'),

			'nama_kelurahan' => $this->db->limit(1)->get_where('kelurahan', array('id_kel'=>$id_kel))->row()->nama_kelurahan
		];
        echo json_encode($data);
    }

		//Diare DAN DETAIL Diare
		public function Diare()
		{
		$data['judul'] = "Data Penyakit Menular";


		$this->load->view('front/diare', $data);
		
		}

		public function get_diare($id_kec=null)
		{
		
	
			$data = [
				'jumlah_pasien' => $this->PasienM->get_diare($id_kec),
				'aktif' => $this->PasienM->get_all_diare($id_kec, 'Dalam Perawatan'),
				'sembuh' => $this->PasienM->get_all_diare($id_kec, 'Sembuh'),
				'die' => $this->PasienM->get_all_diare($id_kec, 'Meninggal'),
				
				'nama_kecamatan' => $this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id_kec))->row()->nama_kecamatan
			];
			echo json_encode($data);
		}
		public function get_detail_diare($id_kec=null)
		{
			$data['id_kec'] = $id_kec;
			$data['kec'] = $this->db->get_where('kecamatan', array('id_kec'=>$id_kec))->result();
			
			
			$this->load->view('front/detail-diare', $data);
		}
		public function diare_kel($id_kel=null)
    	{
			$tgl=date('Y-m-d');
		$data = [
			'jumlah_pasien' => $this->PasienM->get_diare_kel($id_kel),
			'jumlah_pasien_aktif' => $this->PasienM->diare_kel_status($id_kel, 'Dalam Perawatan'),
			'jumlah_pasien_sembuh' => $this->PasienM->diare_kel_status($id_kel, 'Sembuh'),
			'jumlah_pasien_die' => $this->PasienM->diare_kel_status($id_kel, 'Meninggal'),
			//dalam perawatan
			'pr_aktif_balita' => $this->PasienM->diare_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '2016-01-01', $tgl),
			'lk_aktif_balita' => $this->PasienM->diare_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '2016-01-01', $tgl),
			'pr_aktif_anak' => $this->PasienM->diare_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '2009-01-01', '2017-01-01'),
			'lk_aktif_anak' => $this->PasienM->diare_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '2009-01-01', '2017-01-01'),
			'pr_aktif_remaja' => $this->PasienM->diare_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '1997-01-01', '2008-01-01'),
			'lk_aktif_remaja' => $this->PasienM->diare_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '1997-01-01', '2008-01-01'),
			'pr_aktif_dewasa' => $this->PasienM->diare_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '1976-01-01', '1996-01-01'),
			'lk_aktif_dewasa' => $this->PasienM->diare_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '1976-01-01', '1996-01-01'),
			'pr_aktif_lansia' => $this->PasienM->diare_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '1940-01-01', '1975-01-01'),
			'lk_aktif_lansia' => $this->PasienM->diare_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '1940-01-01', '1975-01-01'),
			//sembuh
			'pr_sembuh_balita' => $this->PasienM->diare_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '2016-01-01', $tgl),
			'lk_sembuh_balita' => $this->PasienM->diare_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '2016-01-01', $tgl),
			'pr_sembuh_anak' => $this->PasienM->diare_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '2009-01-01', '2017-01-01'),
			'lk_sembuh_anak' => $this->PasienM->diare_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '2009-01-01', '2017-01-01'),
			'pr_sembuh_remaja' => $this->PasienM->diare_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '1997-01-01', '2008-01-01'),
			'lk_sembuh_remaja' => $this->PasienM->diare_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '1997-01-01', '2008-01-01'),
			'pr_sembuh_dewasa' => $this->PasienM->diare_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '1976-01-01', '1996-01-01'),
			'lk_sembuh_dewasa' => $this->PasienM->diare_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '1976-01-01', '1996-01-01'),
			'pr_sembuh_lansia' => $this->PasienM->diare_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '1940-01-01', '1975-01-01'),
			'lk_sembuh_lansia' => $this->PasienM->diare_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '1940-01-01', '1975-01-01'),
			//meninggal
			'pr_die_balita' => $this->PasienM->diare_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '2016-01-01', $tgl),
			'lk_die_balita' => $this->PasienM->diare_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '2016-01-01', $tgl),
			'pr_die_anak' => $this->PasienM->diare_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '2009-01-01', '2017-01-01'),
			'lk_die_anak' => $this->PasienM->diare_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '2009-01-01', '2017-01-01'),
			'pr_die_remaja' => $this->PasienM->diare_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '1997-01-01', '2008-01-01'),
			'lk_die_remaja' => $this->PasienM->diare_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '1997-01-01', '2008-01-01'),
			'pr_die_dewasa' => $this->PasienM->diare_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '1976-01-01', '1996-01-01'),
			'lk_die_dewasa' => $this->PasienM->diare_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '1976-01-01', '1996-01-01'),
			'pr_die_lansia' => $this->PasienM->diare_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '1940-01-01', '1975-01-01'),
			'lk_die_lansia' => $this->PasienM->diare_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '1940-01-01', '1975-01-01'),
			
			'nama_kelurahan' => $this->db->limit(1)->get_where('kelurahan', array('id_kel'=>$id_kel))->row()->nama_kelurahan
		];
        echo json_encode($data);
    }


	//DBD DAN DETAIL DBD
	public function DBD()
	{
	$data['judul'] = "Data Penyakit Menular";


	$this->load->view('front/dbd', $data);
	
	}

	public function get_dbd($id_kec=null)
	{
	

		$data = [
			'jumlah_pasien' => $this->PasienM->get_dbd($id_kec),
			'aktif' => $this->PasienM->get_all_dbd($id_kec, 'Dalam Perawatan'),
			'sembuh' => $this->PasienM->get_all_dbd($id_kec, 'Sembuh'),
			'die' => $this->PasienM->get_all_dbd($id_kec, 'Meninggal'),
			
			'nama_kecamatan' => $this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id_kec))->row()->nama_kecamatan
		];
		echo json_encode($data);
	}
	public function get_detail_dbd($id_kec=null)
	{
		$data['id_kec'] = $id_kec;
		$data['kec'] = $this->db->get_where('kecamatan', array('id_kec'=>$id_kec))->result();
		
		
		$this->load->view('front/detail-dbd', $data);
	}
	public function dbd_kel($id_kel=null)
	{
		$tgl=date('Y-m-d');
	
	$data = [
		'jumlah_pasien' => $this->PasienM->get_dbd_kel($id_kel),
		'jumlah_pasien_aktif' => $this->PasienM->dbd_kel_status($id_kel, 'Dalam Perawatan'),
		'jumlah_pasien_sembuh' => $this->PasienM->dbd_kel_status($id_kel, 'Sembuh'),
		'jumlah_pasien_die' => $this->PasienM->dbd_kel_status($id_kel, 'Meninggal'),
		

		

		
		//dalam perawatan
		'pr_aktif_balita' => $this->PasienM->dbd_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '2016-01-01', $tgl),
		'lk_aktif_balita' => $this->PasienM->dbd_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '2016-01-01', $tgl),
		'pr_aktif_anak' => $this->PasienM->dbd_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '2009-01-01', '2017-01-01'),
		'lk_aktif_anak' => $this->PasienM->dbd_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '2009-01-01', '2017-01-01'),
		'pr_aktif_remaja' => $this->PasienM->dbd_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '1997-01-01', '2008-01-01'),
		'lk_aktif_remaja' => $this->PasienM->dbd_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '1997-01-01', '2008-01-01'),
		'pr_aktif_dewasa' => $this->PasienM->dbd_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '1976-01-01', '1996-01-01'),
		'lk_aktif_dewasa' => $this->PasienM->dbd_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '1976-01-01', '1996-01-01'),
		'pr_aktif_lansia' => $this->PasienM->dbd_kel_usia ($id_kel, 'Dalam Perawatan', 'Perempuan', '1940-01-01', '1975-01-01'),
		'lk_aktif_lansia' => $this->PasienM->dbd_kel_usia ($id_kel, 'Dalam Perawatan', 'Laki-laki', '1940-01-01', '1975-01-01'),
		//sembuh
		'pr_sembuh_balita' => $this->PasienM->dbd_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '2016-01-01', $tgl),
		'lk_sembuh_balita' => $this->PasienM->dbd_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '2016-01-01', $tgl),
		'pr_sembuh_anak' => $this->PasienM->dbd_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '2009-01-01', '2017-01-01'),
		'lk_sembuh_anak' => $this->PasienM->dbd_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '2009-01-01', '2017-01-01'),
		'pr_sembuh_remaja' => $this->PasienM->dbd_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '1997-01-01', '2008-01-01'),
		'lk_sembuh_remaja' => $this->PasienM->dbd_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '1997-01-01', '2008-01-01'),
		'pr_sembuh_dewasa' => $this->PasienM->dbd_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '1976-01-01', '1996-01-01'),
		'lk_sembuh_dewasa' => $this->PasienM->dbd_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '1976-01-01', '1996-01-01'),
		'pr_sembuh_lansia' => $this->PasienM->dbd_kel_usia ($id_kel, 'Sembuh', 'Perempuan', '1940-01-01', '1975-01-01'),
		'lk_sembuh_lansia' => $this->PasienM->dbd_kel_usia ($id_kel, 'Sembuh', 'Laki-laki', '1940-01-01', '1975-01-01'),
		//meninggal
		'pr_die_balita' => $this->PasienM->dbd_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '2016-01-01', $tgl),
		'lk_die_balita' => $this->PasienM->dbd_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '2016-01-01', $tgl),
		'pr_die_anak' => $this->PasienM->dbd_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '2009-01-01', '2017-01-01'),
		'lk_die_anak' => $this->PasienM->dbd_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '2009-01-01', '2017-01-01'),
		'pr_die_remaja' => $this->PasienM->dbd_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '1997-01-01', '2008-01-01'),
		'lk_die_remaja' => $this->PasienM->dbd_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '1997-01-01', '2008-01-01'),
		'pr_die_dewasa' => $this->PasienM->dbd_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '1976-01-01', '1996-01-01'),
		'lk_die_dewasa' => $this->PasienM->dbd_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '1976-01-01', '1996-01-01'),
		'pr_die_lansia' => $this->PasienM->dbd_kel_usia ($id_kel, 'Meninggal', 'Perempuan', '1940-01-01', '1975-01-01'),
		'lk_die_lansia' => $this->PasienM->dbd_kel_usia ($id_kel, 'Meninggal', 'Laki-laki', '1940-01-01', '1975-01-01'),
		'nama_kelurahan' => $this->db->limit(1)->get_where('kelurahan', array('id_kel'=>$id_kel))->row()->nama_kelurahan
	];
	echo json_encode($data);
}

	public function countFilter($id, $tahun1, $tahun2)
	{
		$tahun1 = $this->db->get('tahun_awal');
		$tahun2 = $this->db->get('tahun_akhir');
        $id = $this->db->get('id_kec');

		
		$data = [
			'covid_all' => $this->Peta-> penyakit_kec($id, $tahun1, $tahun2, 'COVID-19'),
			'covid_aktif' => $this->Peta-> penyakit_kec_tahun($id, 'Dalam Perawatan', $tahun1, $tahun2, 'COVID-19'),
			'covid_sembuh' => $this->Peta-> penyakit_kec_tahun($id, 'Sembuh', $tahun1, $tahun2, 'COVID-19'),
			'covid_die' => $this->Peta-> penyakit_kec_tahun($id, 'Meninggal', $tahun1, $tahun2, 'COVID-19'),

			'TBC_all' => $this->Peta-> penyakit_kec($id, $tahun1, $tahun2, 'TBC'),
			'TBC_aktif' => $this->Peta-> penyakit_kec_tahun($id, 'Dalam Perawatan', $tahun1, $tahun2, 'TBC'),
			'TBC_sembuh' => $this->Peta-> penyakit_kec_tahun($id, 'Sembuh', $tahun1, $tahun2, 'TBC'),
			'TBC_die' => $this->Peta-> penyakit_kec_tahun($id, 'Meninggal', $tahun1, $tahun2, 'TBC'),


			'IMS_all' => $this->Peta-> penyakit_kec($id, $tahun1, $tahun2, 'IMS'),
			'IMS_aktif' => $this->Peta-> penyakit_kec_tahun($id, 'Dalam Perawatan', $tahun1, $tahun2, 'IMS'),
			'IMS_sembuh' => $this->Peta-> penyakit_kec_tahun($id, 'Sembuh', $tahun1, $tahun2, 'IMS'),
			'IMS_die' => $this->Peta-> penyakit_kec_tahun($id, 'Meninggal', $tahun1, $tahun2, 'IMS'),
			

			'Diare_all' => $this->Peta-> penyakit_kec($id, $tahun1, $tahun2, 'Diare'),
			'Diare_aktif' => $this->Peta-> penyakit_kec_tahun($id, 'Dalam Perawatan', $tahun1, $tahun2, 'Diare'),
			'Diare_sembuh' => $this->Peta-> penyakit_kec_tahun($id, 'Sembuh', $tahun1, $tahun2, 'Diare'),
			'Diare_die' => $this->Peta-> penyakit_kec_tahun($id, 'Meninggal', $tahun1, $tahun2, 'Diare'),

			'DBD_all' => $this->Peta-> penyakit_kec($id, $tahun1, $tahun2, 'DBD'),
			'DBD_aktif' => $this->Peta-> penyakit_kec_tahun($id, 'Dalam Perawatan', $tahun1, $tahun2, 'DBD'),
			'DBD_sembuh' => $this->Peta-> penyakit_kec_tahun($id, 'Sembuh', $tahun1, $tahun2, 'DBD'),
			'DBD_die' => $this->Peta-> penyakit_kec_tahun($id, 'Meninggal', $tahun1, $tahun2, 'DBD'),
			
			'nama_kecamatan' => $this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id))->row()->nama_kecamatan
		];
		echo json_encode($data);
	}


	

}
