<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax_req extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
	  }
	public function status_data()
	{
	    $id = $this->input->post('table_id');
	    $tablename = $this->input->post('tablename');
	    $columnname = $this->input->post('columnname');
	    $value = $this->input->post('value');
	    return $response = $this->Main_model->status_fetch($id,$tablename,$columnname,$value);
	}

}
