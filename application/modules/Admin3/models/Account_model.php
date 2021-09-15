<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account_model extends CI_Model { 
 public function __Construct(){
      parent::__Construct();
 }
 public function login_accountadmin($data){
	    $this->db->select("*");
		$this->db->from("admin");
		$where = "admin.admin_email='".$data['email']."' and admin.admin_pass='".$data['password']."' and admin.admin_role='Account'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{
			return false;
		}
 }
 public function account_table_data(){
	$this->db->select("ex.expert_id,ex.expert_name,ex.expert_mobile,u.user_id,u.username,u.usermobile,q.qust_id,q.q_id,q.question_datetime,q.question_status,q.payment_status,q.advice_mode,q.end_date,pay.PAYMENTID,pay.PAY_DATE,pay.PAYMENT_MODE,pay.QUESTION_ID,pay.PAY_TABID,chat.chat_name,chat.chat_price");
    $this->db->from("expert as ex");	
    $this->db->join("question_tbl as q",'q.expert_id=ex.expert_id');	
    $this->db->join("user_detail as u",'u.user_id=q.user_id');	
    $this->db->join("payment_table as pay",'pay.QUESTION_ID=q.q_id');	
    $this->db->join("chat_type as chat",'chat.tab_id=pay.PAY_TABID');
	$where = "pay.PAYMENT_STATUS='1' order by pay.PAY_DATE ASC";
    $this->db->where($where);
	$qry = $this->db->get();
	if($qry->num_rows() >0){
		return $qry->result();
	} else{
		return false;
	}
    	
 }
}