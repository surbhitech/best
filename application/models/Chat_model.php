<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chat_model extends CI_Model { 
 public function __Construct(){
      parent::__Construct();
	  
 }
 public function last_row($user_id){
	    $this->db->select("*");
		$this->db->from("question_tbl");
		$where = "question_tbl.user_id='".$user_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{
			return false;
		}
 }
 public function total_users_row($expert_id){
     $this->db->select("*");
     $this->db->from("question_tbl as q");
     $this->db->join("user_detail as u",'q.user_id=u.user_id');
     $where = "q.expert_id='".$expert_id."'";
     $this->db->where($where);
     $qry = $this->db->get();
     if($qry->num_rows() > 0){
         return $qry->num_rows();
     } else{ return false; }  
 }
 public function expert_review_detail($expert_id){
     $this->db->select("*");
     $this->db->from("reviews as rev");
     $this->db->join("expert as exp",'exp.expert_id=rev.expert_id');
     $this->db->join('expert_academic as acd','acd.expert_id=rev.expert_id');
     $this->db->join('token as tok','tok.token=rev.token');
     $this->db->join("user_detail as usr",'usr.user_id=tok.user_id');
     $where = "rev.expert_id='".$expert_id."'";
     $this->db->where($where);
     $qry = $this->db->get();
     if($qry->num_rows() > 0){
         return $qry->result();
     } else{ return false; }
 }
 public function total_rating($table,$expert_id){
        $this->db->select("SUM(review_point_expert) as total_review");
        $this->db->from($table);
        $where = "expert_id='".$expert_id."'";
        $this->db->where($where);
        $qry = $this->db->get();
      // echo  $this->db->last_query();
        if($qry->num_rows() > 0){
            return $qry->result();
        } else{
            return false;
        }
 }
 public function total_rating_row($table,$expert_id){
        $this->db->select("*");
        $this->db->from($table);
        $where = "expert_id='".$expert_id."'";
        $this->db->where($where);
        $qry = $this->db->get();
        if($qry->num_rows() > 0){
            return $qry->num_rows();
        } else{
            return false;
        }  
 }
 public function rating_point($table,$expert_id,$user_id){
        $this->db->select("rev.review_point_expert");
        $this->db->from("reviews as rev");
        $this->db->join('token as tok','tok.token=rev.token');
        $where = "rev.expert_id='".$expert_id."' and tok.user_id='".$user_id."'";
        $this->db->where($where);
        $qry = $this->db->get();
        if($qry->num_rows() > 0){
            return $qry->result();
        } else{
            return false;
        }   
 }
 public function review_submit($table,$data){
     $check_token = $this->check_token($table,$data['token']);
     if($check_token< 1){
     if($this->db->insert($table,$data)){
         return 1;
     } else{ return 0; }
  } else{ return 2; }
 }
 public function check_token($table,$token){
     $this->db->select("*");
     $this->db->from($table);
     $where = "token='".$token."'";
     $this->db->where($where);
     $qry = $this->db->get();
     if($qry->num_rows() >0){
         return $qry->num_rows();
     } else{ return false; }
 }
 public function update_question($q_id,$status){
	 $data = array('review_status'=>$status);
	  $this->db->where("q_id",$q_id);
	 if($this->db->update('question_tbl',$data)){
		 return true;
	 } else{ return false; }
 }
 public function history_data_update($val){
     date_default_timezone_set('asia/kolkata');
	 $cur_date = date('Y-m-d');
	 $question_status = array("question_status"=>$val);
	 $this->db->where("end_date<'".$cur_date."'");
	 $qry = $this->db->update('question_tbl',$question_status);
	// $this->db->last_query();
	 if($qry == true){
			  return true;
		  } else{ return false; }
 } 
 public function review_data(){
       	  $this->db->select("usr.useremail,pay.payment_id,usr.user_id,ex.expert_id,usr.username,q.q_id,ex.expert_name,q.cat_id,q.subcat_id,q.question_datetime,q.end_date");
		  $this->db->from('user_detail as usr');
		  $this->db->join('question_tbl as q','usr.user_id=q.user_id');
		  $this->db->join('expert as ex','ex.expert_id=q.expert_id');
		  $this->db->join('payment_table as pay','pay.QUESTION_ID=q.q_id');
		  $where = "q.question_status='2'";
		  $this->db->where($where);
		  $qry = $this->db->get();
		//echo  $this->db->last_query(); die();
		  if($qry->num_rows()>0){
			  return $qry->result();
		  } else{ return false; }
 }
 public function check_question_token($q_id){
         $this->db->select("*");
         $this->db->from('token');
         $this->db->where('q_id',$q_id);
         $qry  = $this->db->get();
         if($qry->num_rows()>0){
             return $qry->num_rows();
         } else{ return false; }
 }
 public function insert_token($table,$data){
	 if($this->db->insert($table,$data)){
		 return true;
	 } else{ return false; }
 }
 public function select_chat_detail($q_id){
     $this->db->select("*");
     $this->db->from('question_tbl');
     $where="q_id='".$q_id."' group by q_id";
     $this->db->where($where);
     $qry = $this->db->get();
     if($qry->num_rows() > 0){
             return $qry->result();
     }
 }
 public function select_token_home($table,$token,$status,$con){
	    $this->db->select("*");
		$this->db->from($table);
		$where = "token='".$token."' and status='".$status."'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			if($con =='1'){
			return $qry->num_rows();
			} else{ return $qry->result(); }
		} else{
			return false;
		} 
 }
 public function select_token($table,$token,$user_id,$status){
	 $this->db->select("*");
		$this->db->from($table);
		$where = "token='".$token."' and user_id='".$user_id."' and status='".$status."'";
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->num_rows();
		} else{
			return false;
		} 
 }
 
 public function update_token($table,$status,$access_token){
	 $data = array("status"=>$status);
	  $this->db->where("token",$access_token);
		$res = $this->db->update("token",$data);
		if($res == true){
			return true;
		} else{ return false; }
 }
 public function check_privacy($q_id){
	    $this->db->select("q_id,privacy_status");
		$this->db->from("question_tbl");
		$where = "question_tbl.q_id='".$q_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{
			return false;
		}  
 }
 public function user_privacy_update($var,$q_id){
	  $data = array("privacy_status"=>$var);
	  $this->db->where("q_id",$q_id);
		$res = $this->db->update("question_tbl",$data);
		if($res == true){
			return true;
		} else{ return false; }
 }
 public function get_answer_group($user_id,$expert_id,$subcat_id,$q_id,$qust_id,$advice_mode){
	    $this->db->select("*");
		$this->db->from("answer_tbl");
		$where = "answer_tbl.user_id='".$user_id."' and answer_tbl.expert_id='".$expert_id."' and answer_tbl.subcat_id='".$subcat_id."' and answer_tbl.q_id='".$q_id."' and answer_tbl.qust_id='".$qust_id."' and answer_tbl.advice_mode='".$advice_mode."' and answer_tbl.status='1'";
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{
			return false;
		}
 }
 public function total_answer($q_id){
	    $this->db->select("*");
		$this->db->from("answer_tbl");
		$where = "answer_tbl.q_id='".$q_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->num_rows();
		} else{
			return false;
		}
 }
 public function question_no_row($user_id){
	    $current_date = date("Y-m-d");
	    $this->db->select("q_id");
		$this->db->from("question_tbl as q");
		$this->db->join('payment_table as pay','pay.QUESTION_ID=q.q_id');
		$where = "q.user_id='".$user_id."' and q.payment_status='1' and q.question_status='1' and q.expert_id <>'0' 
		          and q.advice_mode='Text' and q.end_date >='".$current_date."' group by q.q_id";
		$this->db->where($where);
		$qry = $this->db->get();
	    //echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->num_rows();
		} else{
			return false;
		}
 }
 public function check_history_question($q_id,$end_date){
	 $current_date = date("Y-m-d");
	 $this->db->select("qust_id");
	 $this->db->from("question_tbl");
	 $where="q_id='".$q_id."' and end_date<'".$current_date."' and payment_status='1'";
	 $this->db->where($where);
	 $qry = $this->db->get();
	 //echo $this->db->last_query();
	 if($qry->num_rows() >0){
		 return $this->update_history_status($q_id);
	 } else{ return false; }
 }
 public function update_history_status($q_id){
	  $data = array("question_status"=>'2');
	  $this->db->where("q_id",$q_id);
		$res = $this->db->update("question_tbl",$data);
		if($res == true){
			return true;
		} else{ return false; }

 }
 public function question_no_row_history($user_id){
	  $current_date = date("Y-m-d");
	    $this->db->select("q_id");
		$this->db->from("question_tbl");
		$where = "question_tbl.user_id='".$user_id."' and question_tbl.payment_status='1' and question_tbl.question_status='2' and question_tbl.expert_id <>'0' and question_tbl.advice_mode='Text' and question_tbl.end_date<'".$current_date."' group by question_tbl.expert_id";
		$this->db->where($where);
		$qry = $this->db->get();
	    //$this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->num_rows();
		} else{
			return false;
		}

 }
 public function question_no_row_group_history($user_id){
	 $current_date = date("Y-m-d");
	    $this->db->select("q_id");
		$this->db->from("question_tbl");
		$where = "question_tbl.user_id='".$user_id."' and question_tbl.payment_status='1' and advice_mode='GroupText' and question_status='2' and question_tbl.end_date<'".$current_date."' and expert_id <>'0' group by question_tbl.q_id";
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->num_rows();
		} else{
			return false;
		}
 }
 public function question_no_row_group($user_id){
	    $current_date = date("Y-m-d");
	    $this->db->select("q_id");
		$this->db->from("question_tbl");
		$where = "question_tbl.user_id='".$user_id."' and question_tbl.payment_status='1' and advice_mode='GroupText' and question_status='1' and question_tbl.end_date>'".$current_date."' and expert_id <>'0' group by question_tbl.q_id";
		$this->db->where($where);
		$qry = $this->db->get();
	//	echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->num_rows();
		} else{
			return false;
		}
 }
 public function last_row2(){
	    $this->db->select("qust_id,q_id");
		$this->db->from("question_tbl");
		$this->db->order_by('qust_id', 'desc');
		$this->db->limit('1');
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{
			return false;
		}
 }
 public function question_selectbyuserid($user_id,$expert_id,$subcat_id){
	    $this->db->select("*");
		$this->db->from("question_tbl");
		$where = "user_id='".$user_id."' and expert_id='".$expert_id."' and subcat_id='".$subcat_id."' and payment_status='1'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{
			return false;
		}
 }
 public function question_status_cahange($qust_id){
	 $data = array("question_status"=>1);
	 $this->db->where("qust_id",$qust_id);
		$res = $this->db->update("question_tbl",$data);
		if($res == true){
			return true;
		} else{ return false; }
 }
 public function question_answerusingq_id2($q_id,$user_id,$expert_id,$subcat_id){
	$this->db->select("*");
		$this->db->from("answer_tbl");
		$this->db->join('expert','expert.expert_id=answer_tbl.expert_id');
		$this->db->join('subcategory','subcategory.subcat_id=answer_tbl.subcat_id');
		$where = "answer_tbl.user_id='".$user_id."' and answer_tbl.q_id='".$q_id."' and answer_tbl.subcat_id='".$subcat_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{
			return false;
		}  
 }
 public function question_answerusingq_id($qust_id,$user_id,$expert_id,$subcat_id){
	    $this->db->select("*");
		$this->db->from("answer_tbl");
		$this->db->join('expert','expert.expert_id=answer_tbl.expert_id');
		$this->db->join('subcategory','subcategory.subcat_id=answer_tbl.subcat_id');
		$where = "answer_tbl.user_id='".$user_id."' and answer_tbl.qust_id='".$qust_id."' and answer_tbl.subcat_id='".$subcat_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{
			return false;
		} 
 }
}