<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->model('LaporanM', '', true);
        $this->load->library('form_validation');

        $data['user'] = $this->db->get_where('user', [
            'username' => $this->session->userdata('username')
        ])->row_array();
        $auth = $data['user'];

        if ($auth['level'] != 'admin') {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', [
            'username' => $this->session->userdata('username')
        ])->row_array();
        // var_dump($data['user']);
        // die;
		//$data['hasil']=$this->LaporanM->Kecamatan();
        $data = array(
                    'title' => 'Laporan Data Rekam Medis',
					'penyakit' =>  $this->LaporanM->view_penyakit(),
					'kec' => $this->LaporanM->Kecamatan(),
                    'isi' => 'laporan/index'
					
        );
        
        //SELECT DATA PASIEN
       // $data['penyakit'] =  $this->LaporanM->view_penyakit();
        // var_dump($data);
        // die;
		$this->load->view('template/wrappers', $data, FALSE);
    }
	public function testing($penyakit){

		$data = $this->LaporanM->getJoin($penyakit);
		var_dump($data);
		die;
	}
	function get_kelurahan()
    {
        $id_kec=$this->input->post('id_kec');
        $data=$this->LaporanM->Kelurahan($id_kec);
        echo json_encode($data);
    }
	public function tabelkuFilter($id_penyakit, $tahun1, $tahun2, $jk)
	{

		 // Datatables Variables
		 $draw = intval($this->input->get("draw"));
		 $start = intval($this->input->get("start"));
		 $length = intval($this->input->get("length"));


		 $tabels = $this->LaporanM->getDataFilter($id_penyakit, $tahun1, $tahun2, $jk);
		 $data['penyakit'] = $this->LaporanM->get_penyakit_by_id($id_penyakit);
	   
		 $data = array();

		 foreach($tabels->result() as $r) {

			  $data[] = array(
				   $r->nama_kecamatan,
				   $r->total,
				   $r->sembuh,
				   $r->meninggal,
				   $r->aktif
			  );
		 }

		 $output = array(
			  "draw" => $draw,
				"recordsTotal" => $tabels->num_rows(),
				"recordsFiltered" => $tabels->num_rows(),
				"data" => $data
		   );
		 echo json_encode($output);
		 exit();
	}
	public function myTabelFilter($id_penyakit, $status, $tgl1, $tgl2)
	{

		 // Datatables Variables
		 $draw = intval($this->input->get("draw"));
		 $start = intval($this->input->get("start"));
		 $length = intval($this->input->get("length"));


		 $tabels = $this->LaporanM->getJoin($id_penyakit, $status, $tgl1, $tgl2);
		 $data['penyakit'] = $this->LaporanM->get_penyakit_by_id($id_penyakit);
	   
		 $data = array();

		 foreach($tabels->result() as $r) {

			  $data[] = array(
				   $r->nik,
				   $r->nama,
				   $r->nama_kecamatan,
				   $r->nama_kelurahan,
				   $r->nama_penyakit,
				   $r->status,
				   
			  );
		 }

		 $output = array(
			  "draw" => $draw,
				"recordsTotal" => $tabels->num_rows(),
				"recordsFiltered" => $tabels->num_rows(),
				"data" => $data
		   );
		 echo json_encode($output);
		 exit();
	}
}
