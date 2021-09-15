<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Question_Api_Model extends CI_Model
{
	public function expertqrow_single($expert_id,$advice_mode){
		$this->db->select("*");
		$this->db->from('question_tbl');
		$where = "expert_id='".$expert_id."' and advice_mode='".$advice_mode."' and question_status='0' and payment_status='1'";
		$this->db->where($where);
		$res = $this->db->get();
		if($res->num_rows() >0 ){
			return $res->result_array();
		}else{ return false; }
	}
		public function userqrow_single($user_id,$advice_mode){
		$this->db->select("*");
		$this->db->from('question_tbl');
		$where = "user_id='".$user_id."' and advice_mode='".$advice_mode."' and question_status='0' and payment_status='1'";
		$this->db->where($where);
		$res = $this->db->get();
		if($res->num_rows() >0 ){
			return $res->result_array();
		}else{ return false; }
	}
	public function insert_videocall($data){
		if($this->db->insert("video_chat",$data)){
			return true;
		} else{ return false; }
	}
	
public function userread(){
   
       $this->db->select("*");
	   $this->db->from('question_tbl');
	   $where ="advice_mode='Video'";
	   $this->db->where($where);
	   $res = $this->db->get();
	   if($res->num_rows() >0 ){
       return $query->result_array();
	   } else{ return false; }
   }
   
   public function expertread(){
       $query = $this->db->query("select * from `expert`");
       return $query->result_array();
   }
   public function insert($data){
       
       $this->user_name    = $data['name']; // please read the below note
       $this->user_password  = $data['pass'];
       $this->user_type = $data['type'];
       if($this->db->insert('tbl_user',$this))
       {    
           return 'Data is inserted successfully';
       }
         else
       {
           return "Error has occured";
       }
   }
   public function update($id,$data){
   
      $this->user_name    = $data['name']; // please read the below note
       $this->user_password  = $data['pass'];
       $this->user_type = $data['type'];
       $result = $this->db->update('tbl_user',$this,array('user_id' => $id));
       if($result)
       {
           return "Data is updated successfully";
       }
       else
       {
           return "Error has occurred";
       }
   }
   public function delete($id){
   
       $result = $this->db->query("delete from `tbl_user` where user_id = $id");
       if($result)
       {
           return "Data is deleted successfully";
       }
       else
       {
           return "Error has occurred";
       }
   }
}