<?php defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_Controller.php');
class Createvideocall extends REST_Controller
{
	
  public function __construct(){

    parent::__construct();
    //load database
    $this->load->database();
    $this->load->model(array("Question_Api_Model"));
    $this->load->library(array("form_validation"));
    $this->load->helper("security");
  }

  /*
    INSERT: POST REQUEST TYPE
    UPDATE: PUT REQUEST TYPE
    DELETE: DELETE REQUEST TYPE
    LIST: Get REQUEST TYPE
  */

  // POST: <project_url>/index.php/student
  public function index_post(){
    // insert data method

    //print_r($this->input->post());die;
    // collecting form data inputs
    $q_id = $this->security->xss_clean($this->input->post("q_id"));
    $user_id = $this->security->xss_clean($this->input->post("user_id"));
    $expert_id = $this->security->xss_clean($this->input->post("expert_id"));
    $room_id = $this->security->xss_clean($this->input->post("room_id"));
	$status = $this->security->xss_clean($this->input->post("status"));
	$start_datetime = $this->security->xss_clean($this->input->post("start_datetime"));
	$end_datetime = $this->security->xss_clean($this->input->post("end_datetime"));
	
    // form validation for inputs
    $this->form_validation->set_rules("q_id", "q_id", "required");
    $this->form_validation->set_rules("user_id", "user_id", "required|valid_email");
    $this->form_validation->set_rules("expert_id", "expert_id", "required");
	$this->form_validation->set_rules("room_id", "room_id", "required");
    $this->form_validation->set_rules("status", "status", "required");
	$this->form_validation->set_rules("start_datetime", "start_datetime", "required");
	$this->form_validation->set_rules("end_datetime", "end_datetime", "required");

    // checking form submittion have any error or not
    if($this->form_validation->run() === FALSE){

      // we have some errors
      $this->response(array(
        "status" => 0,
        "message" => "All fields are needed"
      ) , REST_Controller::HTTP_NOT_FOUND);
    }else{

      if(!empty($q_id) && !empty($user_id) && !empty($expert_id) && !empty($status) && !empty($room_id) && !empty(start_datetime) && !empty(end_datetime)){
        // all values are available
        $data = array(
          "q_id" => $q_id,
          "user_id" => $user_id,
          "expert_id" => $expert_id,
          "status" => $status,
		  "room_id"=>$room_id,
		  "start_datetime"=>$start_datetime,
		  "end_datetime"=>$end_datetime
        );
        if($this->Question_Api_Model->insert_videocall($data)){
          $this->response(array(
            "status" => 1,
            "message" => "Video has been Activate"
          ), REST_Controller::HTTP_OK);
        }else{

          $this->response(array(
            "status" => 0,
            "message" => "Failed to create Video"
          ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
      }else{
        // we have some empty field
        $this->response(array(
          "status" => 0,
          "message" => "All fields are needed"
        ), REST_Controller::HTTP_NOT_FOUND);
      }
    }

    /*$data = json_decode(file_get_contents("php://input"));

    $name = isset($data->name) ? $data->name : "";
    $email = isset($data->email) ? $data->email : "";
    $mobile = isset($data->mobile) ? $data->mobile : "";
    $course = isset($data->course) ? $data->course : "";*/


  }

  // PUT: <project_url>/index.php/student
  public function index_put(){
    // updating data method
    //echo "This is PUT Method";
    $data = json_decode(file_get_contents("php://input"));

    if(isset($data->id) && isset($data->name) && isset($data->email) && isset($data->mobile) && isset($data->course)){

      $student_id = $data->id;
      $student_info = array(
        "name" => $data->name,
        "email" => $data->email,
        "mobile" => $data->mobile,
        "course" => $data->course
      );

      if($this->student_model->update_student_information($student_id, $student_info)){

          $this->response(array(
            "status" => 1,
            "message" => "Student data updated successfully"
          ), REST_Controller::HTTP_OK);
      }else{

        $this->response(array(
          "status" => 0,
          "messsage" => "Failed to update student data"
        ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
      }
    }else{

      $this->response(array(
        "status" => 0,
        "message" => "All fields are needed"
      ), REST_Controller::HTTP_NOT_FOUND);
    }
  }

  // DELETE: <project_url>/index.php/student
  public function index_delete(){
    // delete data method
    $data = json_decode(file_get_contents("php://input"));
    $student_id = $this->security->xss_clean($data->student_id);

    if($this->student_model->delete_student($student_id)){
      // retruns true
      $this->response(array(
        "status" => 1,
        "message" => "Student has been deleted"
      ), REST_Controller::HTTP_OK);
    }else{
      // return false
      $this->response(array(
        "status" => 0,
        "message" => "Failed to delete student"
      ), REST_Controller::HTTP_NOT_FOUND);
    }
  }
  // GET: <project_url>/index.php/student
  public function index_get(){
    // list data method
    //echo "This is GET Method";
    // SELECT * from tbl_students;
	//$data = json_decode(file_get_contents("php://input"));
	$user_id = $this->security->xss_clean($_GET['user_id']);
	$advice_mode = $this->security->xss_clean($_GET['advice_mode']);
	if(isset($user_id) && isset($advice_mode)){
    $expert_question = $this->Question_Api_Model->userqrow_single($user_id,$advice_mode);
	} else{
		$expert_question=array();
		$this->response(array(
        "status" => 0,
        "message" => "Expert_Id And Advice_mode Required",
        "data" => $expert_question
      ), REST_Controller::HTTP_NOT_FOUND);
	}
    if(count($expert_question) > 0){

      $this->response(array(
        "status" => 1,
        "message" => "Question found",
        "data" => $expert_question
      ), REST_Controller::HTTP_OK);
    }else{
      $expert_question=array();
      $this->response(array(
        "status" => 0,
        "message" => "No Question found",
        "data" => $expert_question
      ), REST_Controller::HTTP_NOT_FOUND);
    }



  }
}