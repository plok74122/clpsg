<?php
class Clpsg_model extends CI_Model {

	public function __construct()
	{
		$this->DB_clpsg = $this->load->database('clpsg',TRUE);
	}
	public function login_check($input_array)
	{
		$query = $this->DB_clpsg->get_where('user',$input_array);
		return $query->first_row('array');
	}
}
?>