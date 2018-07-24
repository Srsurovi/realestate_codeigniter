<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('model_vehicle');
        $this->load->model('model_manufacturer');
        $this->load->model('model_car_model');
	}

	public function index()
	{	
		 $data['vehicles'] = $this->model_vehicle->getAll();
		$data['vehicles'] = $this->model_vehicle->getLatest();
		 $data['featured'] = $this->model_vehicle->getFeatured();
		 $data['manufacturers'] = $this->model_manufacturer->getAllManufacturers();
		$data['models'] = $this->model_car_model->getAllModels();
		
		// $this->parser->parse('public/view_index', $data);   

        $this->load->view('home/index', $data);
	}

	
	
	public function show($vehicle_id)
	{
		$data['vehicle'] = $this->model_vehicle->getById($vehicle_id);
		
		$this->parser->parse('home/blogdetail', $data);
	}	
	public function property(){
		
		$this->load->view('home/property-detail');
	}	
	public function buysalerent(){
		
		$this->load->view('home/buysalerent');
	}
	public function about(){
		
		$this->load->view('home/about');
	}
	public function agents(){
		
		$this->load->view('home/agents');
	}
	public function contact(){
		
		$this->load->view('home/contact');
	}	
	
	public function blogdetail(){
		
		$this->load->view('home/blogdetail');
	}



}