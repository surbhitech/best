<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Enquiry extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = 0)
	{
        if(!empty($id)){
            $data = $this->db->get_where("Enquiry", ['id' => $id])->row_array();
        }else{
            $data = $this->db->get("Enquiry")->result();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = file_get_contents('php://input');
        $this->response(['Enquiry'=>$input], REST_Controller::HTTP_OK);
        $this->db->insert('Enquiry',json_decode($input));
        $this->response(['Enquiry created successfully.'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('Enquiry', $input, array('id'=>$id));
     
        $this->response(['Enquiry updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('Enquiry', array('id'=>$id));
       
        $this->response(['Enquiry deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}