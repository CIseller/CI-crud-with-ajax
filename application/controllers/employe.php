<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employe extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('employe_model');
	}

	function index(){
		$getdata = $this->employe_model->SelectData();
		$countrydata = $this->employe_model->fetch_country();
		$statedata = $this->employe_model->fetch_stateData();
		$data['employee'] = $getdata;
		$data['country'] = $countrydata;
		$data['state'] = $statedata;
		$this->load->view('emp_view',$data);

		
	}

	function fetchState(){
		if ($this->input->post('country_id')) {
			$states = $this->employe_model->fetch_state($this->input->post('country_id'));
			echo $states;

		}

	}

	function AddnewEMP(){
		$countrydata = $this->employe_model->fetch_country();
		$datas['country'] = $countrydata;
		$this->load->view('emp_insert',$datas);

		if($this->input->post('submit')){
		 if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['image']['name'];
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('image')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }

			$hobby = implode(',', $this->input->post('hobby'));
			$data = array(
				'f_name' => $this->input->post('f_name'),
				'l_name' => $this->input->post('l_name'),
				'email' => $this->input->post('email'),
				'hobby'   => $hobby,
				'gender' => $this->input->post('gender'),
				'country_id' => $this->input->post('country'),
				'state_id'  => $this->input->post('state'),
				'city'		=> $this->input->post('city'),
				'image'		=> $picture
			);
			$this->employe_model->insertData($data);
			redirect('employe/index');
		}

	}


	function UpdateData($emp_id){
		$update = $this->employe_model->Getwheredata($emp_id);
		$datas['employee'] = $update;
		$datas['country'] = $this->employe_model->fetch_country();
		$datas['state'] = $this->employe_model->fetch_stateData();
		if ($this->input->post('country_id')) {
			$states = $this->employe_model->fetch_state($this->input->post('country_id'));
			echo $states;
		}
		$this->load->view('emp_update',$datas);

		if($this->input->post('update')){
			if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['image']['name'];
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('image')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                   $picture = '';
                }
            	}else{
                    $picture = $this->input->post('image1');
                }
			$hobby = implode(',', $this->input->post('hobby'));
			$data = array(
				'f_name' => $this->input->post('f_name'),
				'l_name' => $this->input->post('l_name'),
				'email' => $this->input->post('email'),
				'hobby' => $hobby,
				'gender' => $this->input->post('gender'),
				'country_id' => $this->input->post('country'),
				'state_id'  => $this->input->post('state'),
				'city'		=> $this->input->post('city'),
				'image'		=> $picture
			);
			$this->employe_model->Updatedata($emp_id,$data);
			redirect('employe/index');
		}
	}

	function Delete($emp_id){
        $this->employe_model->DeleteData($emp_id);
        redirect('employe/index');
	}

}

?>