<?php 
// base_url('http://localhost/CI/');
 ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employe_Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function fetch_country(){
		$this->db->order_by('country_name','ASC');
		$query = $this->db->get('country');
		return $query->result();
	}

	function fetch_stateData(){
		$this->db->order_by('state_name','ASC');
		$query = $this->db->get('state');
		return $query->result();
	}

	function fetch_state($country_id){
		$this->db->where('country_id',$country_id);
		$this->db->order_by('state_name','ASC');
		$query = $this->db->get('state');
		$queryData = '<option value="">Selelct State</option>';
		foreach ($query->result() as $country) {
				$queryData.= '<option value="'.$country->state_id.'">'.$country->state_name.'</option>';
		}
		return $queryData;
	}

	function insertData($data){
		$Query = $this->db->insert('employee',$data);
	}

	function SelectData(){
		$query = $this->db->get('employee');
		return $query->result();

	}

	function Getwheredata($emp_id){
		$query = $this->db->get_where('employee',array('id' => $emp_id));
		if($query->num_rows() > 0){
			return $query->row();
		}

	}

	function Updatedata($emp_id,$data){
		$this->db->where('id', $emp_id)
    	->update('employee', $data);
	}

	function DeleteData($emp_id){
		$row = $this->db->where('id',$emp_id)->get('employee')->row();
    	unlink('./uploads/images/'. $row->image);
    	$this->db->where('id', $emp_id);
    	$this->db->delete('employee'); 
    	return true;
	}

}

?>