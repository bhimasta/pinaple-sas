<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Financial_report extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		//$this->load->model('m_payments');

		// load portal
		$this->load->helper('text');
		// page title
		$this->page_title();

		// active page
		$active['parent_active'] = "payment_reports";
		$active['child_active'] = "financial_report";
		$this->session->set_userdata($active);		
	}

	public function index()
	{
		// don't forget to give user_auth to every function before
		$this->check_auth('R');

		// two of these is a must
		// menu
		$data['menu']	 = $this->menu();
		// user detail
		$data['user']	 = $this->user;
		//message
		$data['message'] = $this->session->flashdata('message');
		//unit
		//$data['ls_unit'] = $this->m_units->get_all_unit_academic();
		
		// get active school year
		// $data['active_school_year'] = $this->m_school_year->get_active_year();		
		
		$data['layout'] = "payment_reports/financial-report/generate";
		$data['javascript'] = "payment_reports/financial-report/javascript/j_generate";
		$this->load->view('dashboard/admin/template', $data);
	}


	public function result($id)
	{
		// don't forget to give user_auth to every function before
		$this->check_auth('R');

		// two of these is a must
		// menu
		$data['menu']	 = $this->menu();
		// user detail
		$data['user']	 = $this->user;
		//message
		$data['message'] = $this->session->flashdata('message');
		
		$data['id']	= $id;
		// get active school year
		//$data['active_school_year'] = $this->m_school_year->get_active_year();		
		if(($id == 'a01') || ($id == 'a05'))
		{
			$data['layout'] = "payment_reports/financial-report/result_profit_loss";			
		}
		elseif($id == 'a04')
		{
			$data['layout'] = "payment_reports/financial-report/result_cashflow";
		}
		else
		{
			if($id == 'a02')
			{
				$data['report_title'] = 'earns';
			}
			else
			{
				$data['report_title'] = 'loss';
			}
			$data['layout'] = "payment_reports/financial-report/result_single";
		}

		$data['javascript'] = "payment_reports/financial-report/javascript/j_result";
		$this->load->view('dashboard/admin/template', $data);
	}
	
	public function get_now() {
	    $this->load->helper('date');
        $datestring = '%Y-%m-%d %H:%i:%s';
        $time = time();
        $now = mdate($datestring, $time);
        return $now;
	}
	// page title
	public function page_title() {
		$data['page_title'] = 'Budi Utama Financial Report';
		$this->session->set_userdata($data);
	}
}
