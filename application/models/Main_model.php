<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main_model extends CI_Model { 
 public function __Construct(){
      parent::__Construct();
 }
       public function check_expert($id){
	    $this->db->select("*");
	    $this->db->from('expert');
		$this->db->join('expert_subcat_table','expert_subcat_table.expert_id=expert.expert_id');
		$where = "expert.expert_id='".$id."' and (expert_status='1' or expert_status='0')";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_prodcast_byexpertidandsubcatid($expert_id,$subcat_id){
	    $this->db->select('prodcast_id');
	    $this->db->from('expert_subcat_table');
	    $this->db->where('expert_id',$expert_id);
	    $this->db->where('expert_subcat_id',$subcat_id);
	    $qry = $this->db->get();
	     if($qry->num_rows() > 0){
	        $result =  $qry->result();
	        if($result[0]->prodcast_id>0){
	           $res =  $this->select_prodcast_by_id($result[0]->prodcast_id);
	           if(!empty($res)){
	               return $res;
	           } else{ return false; }
	        }
	    } else{
	        return false;
	    }
	}
	public function select_prodcast_by_id($prodid){
	    $this->db->select("*");
	    $this->db->from('expert_prodcast');
	    $this->db->where('id',$prodid);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result_array();
	    } else{
	        return false;
	    }
	}
	public function insert_slider_image($data){
	    	if($this->db->insert("images",$data)){
		    return $this->db->insert_id();
	        } else{ return false; }
	}
	public function delete_images($id){
	    $where = "id='".$id."'";
		$this->db->where($where);
		if($this->db->delete("images")){
			return true;
		} else{ return false; }	
	}
	public function select_images($id){
	    $this->db->select("*");
	    $this->db->from('images');
	    $this->db->where('id',$id);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function single_podcast_detail($expert_id,$subcat_id,$cat_id){
	    $this->db->select("*");
	    $this->db->from('expert_prodcast as prod');
	    $this->db->join('expert as ex','ex.expert_id = prod.expert_id');
	    $this->db->join('subcategory as sub','sub.subcat_id=prod.subcat_id');
	    $this->db->join('tbl_category as cat','cat.cat_id=prod.cat_id');
	    if($expert_id>0){
	    $this->db->where('prod.expert_id',$expert_id);
	    }
	    $this->db->where('prod.subcat_id',$subcat_id);
	    $this->db->where('prod.cat_id',$cat_id);
	    $this->db->order_by('prod.created_at','ASC');
	    $qry = $this->db->get();
	    //echo $this->db->last_query();
	    if($qry->num_rows() >0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	    
	}
	public function slider_detail(){
	    $this->db->select('exp.expert_name,exp.slider_status,exp.expert_image,exp.expert_mobile,exp.expert_id,exp.expert_exp_yr,exp.consulting_language,
	                       sub.subcat_name as subcategory_name,cat.cat_name as category_name,exp_acd.academic_name,sub.subcat_id');
	    $this->db->from('expert as exp');
	    $this->db->join('expert_subcat_table as exp_subcat','exp_subcat.expert_id=exp.expert_id');
	    $this->db->join('expert_academic as exp_acd','exp.expert_id=exp_acd.expert_id');
	    $this->db->join('subcategory as sub','sub.subcat_id=exp_subcat.expert_subcat_id');
	    $this->db->join('tbl_category as cat','cat.cat_id=sub.cat_id');
	    $this->db->where('exp.slider_status',1);
	    $this->db->where('exp_subcat.slider_status',1);
	    $this->db->group_by('exp.expert_id');
	    $this->db->order_by('cat.cat_id','ASC');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function slider_row_count(){
	     $this->db->select('*');
	     $this->db->from('expert as exp');
	     $this->db->where('exp.slider_status',1);
	     $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
	}
	public function expert_article_detail($cat_id){
	     $this->db->select('*');
	     $this->db->from('expert_article as exp_art');
	     $this->db->join('expert as ex','exp_art.expert_id=ex.expert_id');
	     $this->db->join('subcategory as sub','exp_art.article_subcat_id=sub.subcat_id');
	     $this->db->join('tbl_category as cat','cat.cat_id=sub.cat_id');
	     $this->db->order_by('exp_art.article_id','DESC');
	     $this->db->group_by('ex.expert_id');
	     $this->db->where('exp_art.status',1);
	     $this->db->where('ex.expert_status',1);
	     $this->db->where('cat.cat_id',$cat_id);
	     $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        //print_r($qry->result()); die();
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	
	public function chat_view($user_id,$expert_id){
		
	}
	public function subcat_duration_detail($subcat_id,$advice_mode){
	    if($advice_mode =='Text'){
	    $this->db->select("duration_days_text as duration_days"); }
	    if($advice_mode =='Voice' || $advice_mode =='GroupText'){
	    $this->db->select("duration_days_voice  as duration_days"); }
	    if($advice_mode =='Phone'){
	    $this->db->select("duration_days_call  as duration_days"); }
	    if($advice_mode =='Video'){
	    $this->db->select("duration_days_video  as duration_days"); }
	    $this->db->from('subcategory');
	    $where = "subcat_status='1' and subcat_id='".$subcat_id."'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	   // echo $this->db->last_query();
	    if($qry->num_rows()>0){
			return $qry->result();
		} else{
			return false;
		}
	}
	public function email_template($email_for){
		$this->db->select("*");
		$this->db->from('email_template');
		$where = "email_for='".$email_for."' and status='Active'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows()>0){
			return $qry->result();
		} else{
			return false;
		}
	}
	public function answer_no_row_subcat($var,$type){
		$this->db->select("*");
		$this->db->from('answer_tbl');
		$this->db->join('subcategory','answer_tbl.subcat_id=subcategory.subcat_id');
		$this->db->join('tbl_category','subcategory.cat_id = tbl_category.cat_id');
		$this->db->join('question_tbl','answer_tbl.qust_id=question_tbl.qust_id');
		$this->db->join('user_detail','answer_tbl.user_id=user_detail.user_id');
		$this->db->join('expert','answer_tbl.expert_id=expert.expert_id');
		if($var !='' && $type=='Subcat'){
     	$where = "answer_tbl.status='1' and answer_tbl.subcat_id='".$var."' group by answer_tbl.qust_id";
		} if($var !='' && $type=='Expert'){
		$where = "answer_tbl.status='1' and answer_tbl.expert_id='".$var."' group by answer_tbl.qust_id";	
		}
		if($var =='' && $type="Home"){
     	$where = "answer_tbl.status='1' group by answer_tbl.qust_id";	
		}
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() >0){
			return $qry->num_rows();
		} else{
			return false; 
		}
	}
	public function chat_detail_user($var,$type){
		$this->db->select("*");
		$this->db->from('answer_tbl');
		$this->db->join('question_tbl','answer_tbl.qust_id=question_tbl.qust_id');
		$this->db->join('user_detail','answer_tbl.user_id=user_detail.user_id');
		$this->db->join('subcategory','answer_tbl.subcat_id=subcategory.subcat_id');
		$this->db->join('expert','answer_tbl.expert_id=expert.expert_id');
		$this->db->join('tbl_category','subcategory.cat_id = tbl_category.cat_id');
        if($var =='' && $type="Home"){
          $where = "answer_tbl.status='1' and question_tbl.question_status='2' group by answer_tbl.expert_id  ORDER BY answer_tbl.datetime, answer_tbl.ans_id DESC";
        } if($var !='' && $type == 'Expert'){
          $where = "answer_tbl.expert_id='".$var."' and answer_tbl.status='1' group by answer_tbl.expert_id order by answer_tbl.datetime";
        }
        if($var !='' && $type == 'Subcat'){
          $where = "answer_tbl.subcat_id='".$var."' and answer_tbl.status='1' group by answer_tbl.expert_id order by answer_tbl.datetime";
        }
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		if($qry->num_rows() >0){
			return $qry->result();
		} else{
			return false; 
		}	
	}
	public function expert_question_data_datetimewise($data){
	    $this->db->select("q_id,question_text,qust_id,question_datetime,advice_mode");
	    $this->db->from('question_tbl as qtbl');
	    $where = "qtbl.expert_id='".$data['expert_id']."' and qtbl.user_id='".$data['user_id']."' and qtbl.subcat_id='".$data['subcat_id']."' and qtbl.question_datetime BETWEEN '".$data['question_start_datetime']."' and LAST_DAY('".$data['question_end_datetime']."') order by qtbl.qust_id asc";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    //echo $this->db->last_query();
	    if($qry->num_rows() >0){
			return $qry->result();
		} else{
			return false; 
		}	
	}
	public function expert_question_table($expert_id){
		$this->db->select("end_date,q_id,question_datetime");
		$this->db->from('question_tbl');
		$where = "expert_id = '".$expert_id."' and payment_status='1' and advice_mode='Text'";
		$this->db->where($where);
		$qry = $this->db->get();
		// $this->db->last_query();
		if($qry->num_rows() >0){
			return $qry->result();
		} else{ return false; }
	}
	public function user_text_question_detail_groupchat($chat_name,$user_id,$expert_id,$subcat_id,$q_id){
		$this->db->select("*");
		$this->db->from('question_tbl');
			/*
		$where = "question_tbl.user_id='".$user_id."' and question_tbl.payment_status='1' and question_tbl.advice_mode='".$chat_name."' and question_tbl.subcat_id='".$subcat_id."' and question_tbl.expert_id='".$expert_id."' and question_tbl.subadmin_id is null and question_tbl.qust_id='".$qust_id."'  order by question_tbl.qust_id";
	*/
		$where = "question_tbl.user_id='".$user_id."' and question_tbl.advice_mode='".$chat_name."' and question_tbl.subcat_id='".$subcat_id."' and question_tbl.expert_id='".$expert_id."' and question_tbl.q_id='".$q_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
	public function total_question($chat_name,$expert_id){
	    $current_date = date("Y-m-d");
		$this->db->select("*");
		$this->db->from("question_tbl");
		$this->db->join('expert','expert.expert_id = question_tbl.expert_id');
		$this->db->join('subcategory','subcategory.subcat_id = question_tbl.subcat_id');
		$this->db->join('user_detail','user_detail.user_id = question_tbl.user_id');
		$this->db->join('payment_table','payment_table.QUESTION_ID=question_tbl.q_id');
		$where = "question_tbl.question_status='1' and question_tbl.advice_mode='".$chat_name."' and expert.expert_id='".$expert_id."' group by question_tbl.q_id";
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		 if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
	}
	public function total_question_history($chat_name,$expert_id){
		$this->db->select("*");
		$this->db->from("question_tbl");
		$this->db->join('expert','expert.expert_id = question_tbl.expert_id');
		$this->db->join('subcategory','subcategory.subcat_id = question_tbl.subcat_id');
		$this->db->join('user_detail','user_detail.user_id = question_tbl.user_id');
		$this->db->join('payment_table','payment_table.QUESTION_ID = question_tbl.q_id');
		$where = "question_tbl.question_status='2' and question_tbl.payment_status='1' and question_tbl.advice_mode='".$chat_name."' and expert.expert_id='".$expert_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		 if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
	}
	public function expert_question_data($chat_name,$expert_id,$status){
	    $current_date = date("d-m-Y");
		$this->db->select("*");
		$this->db->from("question_tbl");
		$this->db->join('expert','expert.expert_id = question_tbl.expert_id');
		$this->db->join('subcategory','subcategory.subcat_id = question_tbl.subcat_id');
		$this->db->join('user_detail','user_detail.user_id = question_tbl.user_id');
		$where = "question_tbl.question_status='".$status."' and expert.expert_id='".$expert_id."' and question_tbl.advice_mode='".$chat_name."'";
		$this->db->where($where);
		$qry = $this->db->get();
	//	echo $this->db->last_query();
		 if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	/*
	public function expert_question_history_update($chat_name,$expert_id){
	    $current_date = date("Y-m-d");
	   $data['question_status']="2";
	   $where = "question_tbl.question_status='1' and question_tbl.expert_id='".$expert_id."' and question_tbl.advice_mode='".$chat_name."' and question_tbl.end_date<'".$current_date."'";
	  // $this->db->join('expert','expert.expert_id=question_tbl.expert_id');
	    $this->db->where($where);
		$res = $this->db->update("question_tbl",$data);
		if($res == true){
			return true;
		} else{ return false; }
	   
	}
	*/
	public function expert_question_data_history($chat_name,$expert_id){
		$this->db->select("*");
		$this->db->from("question_tbl");
		$this->db->join('expert','expert.expert_id = question_tbl.expert_id');
		$this->db->join('subcategory','subcategory.subcat_id = question_tbl.subcat_id');
		$this->db->join('user_detail','user_detail.user_id = question_tbl.user_id');
		$where = "question_tbl.question_status='2' and expert.expert_id='".$expert_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		 if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	function all_expert_group_chat($chat_name,$q_id){
		$this->db->select("*");
		$this->db->from('expert');
	$this->db->join('question_tbl','expert.expert_id=question_tbl.expert_id');
	$where = "question_tbl.q_id='".$q_id."' group by question_tbl.expert_id";
		$this->db->where($where);
	
		$qry = $this->db->get();
		//echo $this->db->last_query();
		if($qry->num_rows() >0){
			return $qry->result();
		} else{ return false; }
	}
	public function file_delete($file_id){
		$file_row = $this->select_file_detail($file_id);
		$file_name = $file_row[0]->file_name;
		$path = $_SERVER['DOCUMENT_ROOT']."/assets/chatfile/".$file_name;
		if(unlink($path)){
		$where = "file_id='".$file_id."'";
		$this->db->where($where);
		if($this->db->delete('files_tbl')){
			return true;
		} else{ return false; }
		}
		
	}
	public function select_file_detail($file_id){
		$this->db->select("*");
		$this->db->from('files_tbl');
		$this->db->where("file_id",$file_id);
		$qry = $this->db->get();
		 if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_answer_insert($expert_answer){
		if($this->db->insert("answer_tbl",$expert_answer)){
		   return true;
	   } else{ return false; }
	}
	public function subcat_article_detail($subcat_id){
		$this->db->select("*");
		$this->db->from("expert_article");
		$this->db->join("subcategory",'subcategory.subcat_id=expert_article.article_subcat_id');
		$this->db->join("expert",'expert.expert_id=expert_article.expert_id');
		$where = "expert_article.article_subcat_id='".$subcat_id."' and expert_article.status='1'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{
			return false;
		}
	}
	public function article_detail_single($expert_id,$article_id){
		$this->db->select("*");
	    $this->db->from('expert_article');
	    $where = "expert_id='".$expert_id."' and (status='0' OR status='1') and article_id='".$article_id."'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function article_update($data,$article_id){
     $this->db->where("article_id",$article_id);
		$res = $this->db->update("expert_article",$data);
		if($res == true){
			return true;
		} else{ return false; }
		
	}
	public function cat_idbyname($cat_name){
		 $this->db->select("cat_id");
	    $this->db->from('tbl_category');
	    $this->db->where('cat_name',$cat_name);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
   public function total_cat_row(){
	   $this->db->select("*");
	    $this->db->from('tbl_category');
	    $this->db->where('status',1);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
   }
    public function total_subcat_row(){
	   $this->db->select("*");
	    $this->db->from('subcategory');
	    $this->db->where('subcat_status',1);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
   }
   public function support_submit($data){
	   if($this->db->insert("support",$data)){
		   return true;
	   } else{ return false; }
   }
   public function subcat_namebysubctaid($subcat_name){
	    $this->db->select("subcat_id");
	    $this->db->from('subcategory');
		$this->db->where('subcat_name',$subcat_name);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
   }
    public function total_expert_row2(){
	    $this->db->select("*");
	    $this->db->from('expert');
		$this->db->where('expert_status','1');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
   }
	public function check_expert_rowinchattpe($expert_id){
		$this->db->select("*");
	    $this->db->from('chat_type');
	    $this->db->where('expert_id',$expert_id);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
	}
	public function expert_chat_fee($data){
		if($this->db->insert("chat_type",$data));
		return true;
		}
	public function expert_chat_fee_update($data,$condition){
		//print_r($data[0]['chat_name']); die();
	    $where = $condition;
		$this->db->where($where);
		if($this->db->update("chat_type",$data)){
			return true;
		} else{ return false; }	
	}	
	public function expert_chat_fee_delete($expert_id){
	    $where = "expert_id='".$expert_id."'";
		$this->db->where($where);
		if($this->db->delete("chat_type")){
			return true;
		} else{ return false; }	
	}	
	public function chatmode_singlerow($tab_id,$tab_name){
		$this->db->select("*");
	    $this->db->from('chat_type');
	    $where = "tab_id='".$tab_id."' and chat_name='".$tab_name."'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function tab_id_usingexpert_id($expert_id,$advice_mode){
		$this->db->select("*");
	    $this->db->from('chat_type');
	    if($advice_mode>0){
		$where = "expert_id='".$expert_id."' and chat_name='".$advice_mode."'";
	    } else{
	   	$where = "expert_id='".$expert_id."'";
	    }
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	/*
	public function subcat_fee_tab_id($subcat_id,$advice_mode){
	    $this->db->from('subcategory');
		$where = "subcat_id='".$subcat_id."'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	*/
	public function tab_id_usingexpert_id2($expert_id,$advice_mode){
		$this->db->select("tab_id");
	    $this->db->from('chat_type');
		$where = "expert_id='".$expert_id."' and chat_name='".$advice_mode."'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function question_table_update($question_id,$status,$question_status){
		$data = array('payment_status'=>$status,'question_status'=>$question_status);
		$this->db->where("q_id",$question_id);
		$res = $this->db->update("question_tbl",$data);
		if($res == true){
			return true;
		} else{ return false; }
	}
	public function update_question_table($table,$data,$q_id){
	   $this->db->where('q_id',$q_id);
	   $res = $this->db->update($table,$data);
	   if($res == true){
	       return true;
	   } else{ false; }
	}
	public function question_table_update2($question_id,$status,$question_status){
		$data = array('payment_status'=>$status,"question_status"=>$question_status);
		$this->db->where("q_id",$question_id);
		$res = $this->db->update("question_tbl",$data);
		if($res == true){
			return true;
		} else{ return false; }
	}
	public function expert_id_using_tabid($tab_id){
		$this->db->select("*");
	    $this->db->from('chat_type');
	    $this->db->join('expert','expert.expert_id = chat_type.expert_id');
		$where = "chat_type.tab_id='".$tab_id."'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function user_detail_usinguserid($userid){
		$this->db->select("*");
	    $this->db->from('user_detail');
		$where = "user_id='".$userid."'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function payment_fill($data){
		if($this->db->insert("payment_table",$data)){
			return true;
		} else{ return false; }
	}
	public function chat_mode_list($expert_id){
		$this->db->select("*");
	    $this->db->from('chat_type');
		$this->db->where("expert_id",$expert_id);
		$this->db->order_by("tab_id",'asc');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function subcat_name_bysubcat_id($subcat_id){
		$this->db->select("*");
		$this->db->from("subcategory");
		$this->db->where("subcat_id",$subcat_id);
		$qry = $this->db->get();
		if($qry->num_rows() >0){
			return $qry->result();
		} else{ return false; }
	}
	public function question_detail_for_invoice($user_id,$subcat_id,$expert_id,$type){
	    if($type =='expert'){
		$this->db->select("*");
		$this->db->from("question_tbl");
		$this->db->join("user_detail",'user_detail.user_id=question_tbl.user_id');
		$this->db->join("expert",'expert.expert_id=question_tbl.expert_id');
		$this->db->join("subcategory",'subcategory.subcat_id=question_tbl.subcat_id');
		$this->db->join("tbl_category",'tbl_category.cat_id=subcategory.cat_id');
		$where = "question_tbl.subcat_id='".$subcat_id."' and question_tbl.user_id='".$user_id."' and question_tbl.expert_id='".$expert_id."' and question_tbl.payment_status='1' order by question_tbl.qust_id asc limit 1";
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		if($qry->num_rows() >0){
			return $qry->result();
		} else{ return false; }
	    } else{
	    $this->db->select("*");
		$this->db->from("question_tbl");
		$this->db->join("user_detail",'user_detail.user_id=question_tbl.user_id');
		$this->db->join("admin",'admin.admin_id=question_tbl.subadmin_id');
		$this->db->join("subcategory",'subcategory.subcat_id=question_tbl.subcat_id');
		$this->db->join("tbl_category",'tbl_category.cat_id=subcategory.cat_id');
		$where = "question_tbl.subcat_id='".$subcat_id."' and question_tbl.user_id='".$user_id."' and admin.admin_id='".$expert_id."' and question_tbl.payment_status='1' order by question_tbl.qust_id asc limit 1";
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		if($qry->num_rows() >0){
			return $qry->result();
		} else{ return false; }

	    }
	}
	public function expert_transaction($expert_id){
		$this->db->select("*");
		$this->db->from("payment_table");
		$this->db->join("question_tbl",'question_tbl.q_id=payment_table.QUESTION_ID');
		$where = "question_tbl.payment_status='1' and question_tbl.expert_id='".$expert_id."' group by question_tbl.q_id";
		//echo $this->db->last_query();
		$this->db->where($where);
		$qry = $this->db->get();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function user_transaction($user_id){
		$this->db->select("*");
		$this->db->from("payment_table");
		$this->db->join("question_tbl",'question_tbl.q_id=payment_table.QUESTION_ID');
		$where = "question_tbl.payment_status='1' and question_tbl.question_status='2' and payment_table.USER_ID='".$user_id."' group by question_tbl.q_id";
		$this->db->where($where);
		
		$qry = $this->db->get();
	//	echo $this->db->last_query();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function subadmin_detail_cat_wise($cat_id){
		$this->db->select("*");
		$this->db->from("admin");
        $where = "admin.admin_cat_id='".$cat_id."' and admin.admin_role='subadmin'";
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
		
	}
	public function cat_name_using_subcatid($subcat_id){
		$this->db->select("tbl_category.cat_name,subcategory.subcat_name,tbl_category.cat_id");
		$this->db->from("tbl_category");
		$this->db->join("subcategory",'subcategory.cat_id = tbl_category.cat_id');
		$where = "subcategory.subcat_id='".$subcat_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}


	
	public function expert_detail_inquestion($subcat_id,$user_id,$q_id){
		$this->db->select("*");
		$this->db->from("question_tbl");
		$this->db->join("expert",'expert.expert_id = question_tbl.expert_id');
		$where = "question_tbl.subcat_id='".$subcat_id."' and question_tbl.user_id='".$user_id."' and question_tbl.q_id='".$q_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_detail_inquestion2($subcat_id,$user_id,$qust_id){
		$this->db->select("*");
		$this->db->from("question_tbl");
		$this->db->join("expert",'expert.expert_id = question_tbl.expert_id');
		$where = "question_tbl.subcat_id='".$subcat_id."' and question_tbl.user_id='".$user_id."' and question_tbl.q_id='".$qust_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_detail_inanswerview($subcat_id,$user_id,$question_id){
		$this->db->select("*");
		$this->db->from("question_tbl");
		$this->db->join("expert",'expert.expert_id = question_tbl.expert_id');
		$where = "question_tbl.subcat_id='".$subcat_id."' and question_tbl.user_id='".$user_id."' and question_tbl.qust_id='".$question_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_detail_inquestion_group($subcat_id,$user_id,$advice_mode,$q_id,$expert_id){
		$this->db->select("*");
		$this->db->from("question_tbl");
		$this->db->join("expert",'expert.expert_id = question_tbl.expert_id');
		$this->db->join("answer_tbl",'answer_tbl.expert_id = expert.expert_id');
		$where = "question_tbl.subcat_id='".$subcat_id."' and question_tbl.user_id='".$user_id."' and question_tbl.expert_id='".$expert_id."' and answer_tbl.q_id='".$q_id."' and question_tbl.advice_mode='".$advice_mode."' and question_tbl.q_id='".$q_id."' and answer_tbl.status='1' group by question_tbl.q_id";
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	
	public function user_question_detail_text($user_id,$subcat_id,$chat_name,$q_id){
		 $this->db->select("*");
		 $this->db->from("question_tbl");
		// $this->db->join("payment_table",'payment_table.QUESTION_ID=question_tbl.q_id');
		 $where = "question_tbl.user_id = '".$user_id."' and question_tbl.payment_status='1' and question_tbl.question_status='1'
		           and question_tbl.subcat_id='".$subcat_id."' and question_tbl.q_id='".$q_id."' and question_tbl.advice_mode='".$chat_name."'";
		 $this->db->where($where);
		 $qry = $this->db->get();
		 //echo $this->db->last_query();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function user_question_detail_text_history($user_id,$subcat_id,$chat_name,$q_id){
		 $this->db->select("*");
		 $this->db->from("question_tbl");
		// $this->db->join("payment_table",'payment_table.QUESTION_ID=question_tbl.q_id');
		 $where = "question_tbl.user_id = '".$user_id."' and question_tbl.payment_status='1' and question_tbl.question_status='2'
		           and question_tbl.subcat_id='".$subcat_id."' and question_tbl.q_id='".$q_id."' and question_tbl.advice_mode='".$chat_name."'";
		 $this->db->where($where);
		 $qry = $this->db->get();
		// echo $this->db->last_query();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_academic_detail($expert_id){
		 $this->db->select("*");
		 $this->db->from("expert_academic");
		 $where = "expert_academic.expert_id = '".$expert_id."' order by academic_id desc limit 1";
		 $this->db->where($where);
		 $qry = $this->db->get();
		 //echo $this->db->last_query();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function answer_data($user_id,$subcat_id,$qust_id,$advice_mode,$expert_id){
	     $this->db->select("*");
		 $this->db->from("answer_tbl");
		 $this->db->join("user_detail",'user_detail.user_id = answer_tbl.user_id');
		 $where = "answer_tbl.user_id = '".$user_id."' and answer_tbl.subcat_id='".$subcat_id."' and answer_tbl.advice_mode='".$advice_mode."' and answer_tbl.qust_id='".$qust_id."' and answer_tbl.expert_id='".$expert_id."'";
		 $this->db->where($where);
		 $qry = $this->db->get();
		// echo $this->db->last_query();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function answer_data_grouptext($user_id,$subcat_id,$advice_mode,$q_id,$expert_id){
	     $this->db->select("*");
		 $this->db->from("answer_tbl");
		 $this->db->join("user_detail",'user_detail.user_id = answer_tbl.user_id');
		 $where = "answer_tbl.user_id = '".$user_id."' and answer_tbl.subcat_id='".$subcat_id."' and answer_tbl.advice_mode='".$advice_mode."' and answer_tbl.q_id='".$q_id."' and answer_tbl.expert_id='".$expert_id."'";
		 $this->db->where($where);
		 $qry = $this->db->get();
		  //echo $this->db->last_query();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function total_question_row_history($user_id,$subcat_id,$expert_id){
	     $this->db->select("*");
		 $this->db->from("question_tbl");
		 $this->db->join("user_detail",'question_tbl.user_id=user_detail.user_id');
		 $where = "question_tbl.user_id = '".$user_id."' and question_tbl.subcat_id='".$subcat_id."' and question_tbl.expert_id='".$expert_id."' and question_tbl.question_status='2'";
		 $this->db->where($where);
		 $qry = $this->db->get();
	   // echo  $this->db->last_query();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function total_question_row($user_id,$subcat_id,$expert_id){
		 $this->db->select("*");
		 $this->db->from("question_tbl");
		 $this->db->join("user_detail",'question_tbl.user_id=user_detail.user_id');
		 $where = "question_tbl.user_id = '".$user_id."' and question_tbl.subcat_id='".$subcat_id."' and question_tbl.question_status='1'";
		 $this->db->where($where);
		 $qry = $this->db->get();
	   // echo  $this->db->last_query();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function total_question_row_groupchat($user_id,$subcat_id,$expert_id,$advice_mode,$q_id){
	     $this->db->select("*");
		 $this->db->from("question_tbl");
		 $this->db->join("user_detail",'question_tbl.user_id=user_detail.user_id');
		 $where = "question_tbl.user_id = '".$user_id."' and question_tbl.subcat_id='".$subcat_id."' and question_tbl.payment_status='1' and question_tbl.expert_id='".$expert_id."' and question_tbl.q_id='".$q_id."'";
		 $this->db->where($where);
		 $qry = $this->db->get();
	//	echo $this->db->last_query();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }	
	}
	public function answer_data_groupchat_page($user_id,$subcat_id,$advice_mode,$q_id){
		 $this->db->select("user_detail.username,answer_tbl.answer,answer_tbl.qust_id,answer_tbl.expert_id,answer_tbl.answer_status,answer_tbl.status,user_detail.user_id,answer_tbl.user_id,answer_tbl.subcat_id,answer_tbl.datetime,answer_tbl.advice_mode,answer_tbl.status,user_detail.username,expert.expert_name,expert.nationality,expert.expert_image,expert.consulting_language");
		 $this->db->from("answer_tbl");
		 $this->db->join("user_detail",'user_detail.user_id = answer_tbl.user_id');
		 $this->db->join("expert",'expert.expert_id = answer_tbl.expert_id');
		 $where = "answer_tbl.user_id = '".$user_id."' and answer_tbl.subcat_id='".$subcat_id."' and answer_tbl.advice_mode='".$advice_mode."' and answer_tbl.q_id='".$q_id."' group by answer_tbl.expert_id";
		 $this->db->where($where);
	//	echo  $this->db->last_query();
		 $qry = $this->db->get();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_detail_groupchat_page($subcat_id,$q_id){
	    $this->db->select("*");
	    $this->db->from("expert");
	    $this->db->join('question_tbl','expert.expert_id=question_tbl.expert_id');
	    $where = "question_tbl.q_id='".$q_id."' and question_tbl.subcat_id='".$subcat_id."' and question_tbl.advice_mode='GroupText' and question_tbl.question_status='1' and expert.group_question='1'";
	    $this->db->where($where);
	     $qry = $this->db->get();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	    
	}
	/*
	public function question_data($expert_id,$user_id,$subcat_id,$chat_name,$q_id){
	     $this->db->select("*");
		 $this->db->from("question_tbl");
		 $this->db->join("user_detail",'user_detail.user_id = question_tbl.user_id');
		 $where = "question_tbl.user_id = '".$user_id."' and question_tbl.subcat_id='".$subcat_id."' 
		 and question_tbl.payment_status='1' and question_tbl.advice_mode='".$chat_name."' and question_tbl.expert_id='".$expert_id."' and question_tbl.q_id='".$q_id."' group by q_id order by qust_id asc";
		 $this->db->where($where);
		 $qry = $this->db->get();
		// echo $this->db->last_query();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	*/
	public function question_data($expert_id,$user_id,$subcat_id,$chat_name,$q_id){
	     $this->db->select("*");
		 $this->db->from("question_tbl");
		 $this->db->join("user_detail",'user_detail.user_id = question_tbl.user_id');
		 $where = "question_tbl.user_id = '".$user_id."' and question_tbl.subcat_id='".$subcat_id."' 
		  and question_tbl.advice_mode='".$chat_name."' and question_tbl.expert_id='".$expert_id."' and question_tbl.question_status='1' group by q_id order by qust_id asc";
		 $this->db->where($where);
		 $qry = $this->db->get();
		// echo $this->db->last_query();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
		public function question_data_history($expert_id,$user_id,$subcat_id,$chat_name,$q_id){
	     $this->db->select("*");
		 $this->db->from("question_tbl");
		 $this->db->join("user_detail",'user_detail.user_id = question_tbl.user_id');
		 $where = "question_tbl.user_id = '".$user_id."' and question_tbl.subcat_id='".$subcat_id."' 
		 and question_tbl.payment_status='1' and question_tbl.advice_mode='".$chat_name."' and question_tbl.expert_id='".$expert_id."' and question_tbl.question_status='2' group by q_id order by qust_id asc";
		 $this->db->where($where);
		 $qry = $this->db->get();
		// echo $this->db->last_query(); die();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	
	public function user_question_detail_phone($user_id,$subcat_id){
		 $this->db->select("*");
		 $this->db->from("question_tbl");
		 $this->db->join("payment_table",'payment_table.QUESTION_ID=question_tbl.q_id');
		 $where = "question_tbl.user_id = '".$user_id."' and payment_table.USER_ID='".$USER_ID."' and question_tbl.payment_status='1' and question_tbl.subcat_id='".$subcat_id."' and question_tbl.advice_mode='Phone' order by question_tbl.qust_id asc limit 1";
		 $this->db->where($where);
		 $qry = $this->db->get();
		   if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_row_for_chat($expert_id,$user_id,$advice_mode,$q_id,$subcat_id){
		$this->db->select("expert.expert_email,question_tbl.advice_mode");
		$this->db->from("expert");
		$this->db->join("question_tbl",'question_tbl.expert_id = expert.expert_id');
		$where = "question_tbl.payment_status='1' and question_tbl.expert_id='".$expert_id."' and question_tbl.user_id='".$user_id."' 
		          and question_tbl.advice_mode='".$advice_mode."' and question_tbl.q_id='".$q_id."' and question_tbl.subcat_id='".$subcat_id."'";
		$this->db->where($where);
		$this->db->group_by(array("question_tbl.expert_id","question_tbl.q_id"));
		$qry = $this->db->get();
		//echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
	public function expert_detail_groupchat($cat_id,$subcat_id){
		$this->db->select("expert.expert_id,expert_subcat_table.expert_subcat_id");
		$this->db->from("expert");
		$this->db->join("expert_subcat_table",'expert.expert_id = expert_subcat_table.expert_id');
		$where = "expert_subcat_table.expert_subcat_id='".$subcat_id."' and expert_subcat_table.expert_cat_id='".$cat_id."' and expert.group_question>0 and expert.expert_status>0";
		$this->db->where($where);
		$this->db->group_by("expert.expert_id");
		$qry = $this->db->get();
		//echo $this->db->last_query();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_detail_insubcat($cat_id,$subcat_id){
		$this->db->select("*");
		$this->db->from("expert_subcat_table");
		$this->db->join("expert",'expert.expert_id = expert_subcat_table.expert_id');
	//	$this->db->join("expert_academic",'expert_academic.expert_id = expert_subcat_table.expert_id');
		$where = "expert_subcat_table.expert_subcat_id='".$subcat_id."' and expert_subcat_table.expert_cat_id='".$cat_id."' and expert.expert_status='1'";
		$this->db->where($where);
	
		 $qry = $this->db->get();
		//	echo $this->db->last_query();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function academic_data_expert($expert_id){
	   $this->db->select("*");
		$this->db->from("expert_academic");
		$where = "expert_academic.expert_id='".$expert_id."'";
		$this->db->where($where);
	//	$this->db->group_by("expert.expert_id");
		//echo $this->db->last_query();
		 $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    } 
	}
	
	public function expert_check_academic($expert_id){
		$this->db->select("*");
		$this->db->from("expert_academic");
		$this->db->where("expert_id",$expert_id);
		$res = $this->db->get();
		if($res->num_rows() >0){
			return $res->num_rows();
		} else{ return false; }
	}
	public function set_expert_subcat_detail($expert_id){
	    $this->db->select("expert_subcat_id");
	    $this->db->from('set_expert');
	    $this->db->where('expert_id',$expert_id);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
		         $result = $qry->result();
		        return $getsubcat = $this->subcat_name_bysubcat_id($result[0]->expert_subcat_id);
		} else{ return false; }
	}
	public function expert_detail_incatid($cat_id){
		$this->db->select("*");
		$this->db->from("set_expert");
		$this->db->join("expert",'expert.expert_id=set_expert.expert_id');
		$this->db->join("expert_academic",'expert.expert_id=expert_academic.expert_id');
		$where = "set_expert.expert_cat_id='".$cat_id."' and expert.expert_status='1' group by expert.expert_id";
		$this->db->where($where);
		$qry = $this->db->get();
	//	echo $this->db->last_query(); die();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
	public function expert_detail_incatid2($cat_id){
	    $this->db->select("*");
		$this->db->from("expert");
		$this->db->join("expert_academic",'expert.expert_id=expert_academic.expert_id');
		$this->db->join("expert_subcat_table",'expert_subcat_table.expert_id=expert.expert_id');
		$where = "expert.expert_status='1' and expert_subcat_table.expert_cat_id='".$cat_id."' group by expert.expert_id";
		$this->db->where($where);
		$qry = $this->db->get();
	//	echo $this->db->last_query(); die();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	    
	}
		public function prodcast_likers_no($prodcast_id){
		$this->db->select("likers");
		$this->db->from("expert_prodcast");
		$where = "id='".$prodcast_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result_array();
		} else{ return false; }
	}
	public function update_prodcast_likers($data,$prodcast_id){
		$this->db->where("id",$prodcast_id);
		$res = $this->db->update("expert_prodcast",$data);
		if($res == true){
			return true;
		} else{ return false; }
	}
	public function article_likers_no($article_id){
		$this->db->select("likers");
		$this->db->from("expert_article");
		$where = "article_id='".$article_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result_array();
		} else{ return false; }
	}
	public function update_article_likers($data,$article_id){
		$this->db->where("article_id",$article_id);
		$res = $this->db->update("expert_article",$data);
		if($res == true){
			return true;
		} else{ return false; }
	}
	public function articlerow_incatwise($cat_id){
		$this->db->select("*");
		$this->db->from("expert_article");
		$this->db->join("subcategory","expert_article.article_subcat_id=subcategory.subcat_id");
		$where = "subcategory.cat_id='".$cat_id."' and expert_article.status='1'";
		$this->db->where($where);
		$res = $this->db->get();
		if($res->num_rows() > 0){
			return $res->num_rows();
		} else{ return false; }
	}
	public function podcastrow_insubcatwise($subcat_id){
		$this->db->select("*");
		$this->db->from("expert_prodcast");
		$this->db->join("subcategory","expert_prodcast.subcat_id=subcategory.subcat_id");
		$where = "subcategory.subcat_id='".$subcat_id."' and expert_prodcast.status='1'";
		$this->db->where($where);
		$res = $this->db->get();
		if($res->num_rows() > 0){
			return $res->num_rows();
		} else{ return false; }
	}
		public function podcastrow_incatwise($cat_id){
		$this->db->select("*");
		$this->db->from("expert_prodcast");
		$this->db->join("subcategory","expert_prodcast.subcat_id=subcategory.subcat_id");
		$where = "subcategory.cat_id='".$cat_id."' and expert_prodcast.status='1'";
		$this->db->where($where);
		$res = $this->db->get();
		if($res->num_rows() > 0){
			return $res->num_rows();
		} else{ return false; }
	}
	public function articlerow_insubcatwise($subcat_id){
		$this->db->select("*");
		$this->db->from("expert_article");
		$this->db->join("subcategory","expert_article.article_subcat_id=subcategory.subcat_id");
		$where = "subcategory.subcat_id='".$subcat_id."' and expert_article.status='1'";
		$this->db->where($where);
		$res = $this->db->get();
		if($res->num_rows() > 0){
			return $res->num_rows();
		} else{ return false; }
	}
	public function articledetail_insubcatwise($subcat_id){
		
		$this->db->select("*");
		$this->db->from("expert_article");
		$this->db->join("subcategory","expert_article.article_subcat_id=subcategory.subcat_id");
		$this->db->join("expert","expert_article.expert_id=expert.expert_id");
		$where = "subcategory.subcat_id='".$subcat_id."' and expert_article.status='1'";
		$this->db->where($where);
		$res = $this->db->get();
		if($res->num_rows() > 0){
			return $res->result();
		} else{ return false; }
	}
	public function podcastdetail_insubcatwise($subcat_id){
		
		$this->db->select("*");
		$this->db->from("expert_prodcast");
		$this->db->join("subcategory","expert_prodcast.subcat_id=subcategory.subcat_id");
		$this->db->join("expert","expert_prodcast.expert_id=expert.expert_id");
		$where = "subcategory.subcat_id='".$subcat_id."' and expert_prodcast.status='1'";
		$this->db->where($where);
		$res = $this->db->get();
		if($res->num_rows() > 0){
			return $res->result();
		} else{ return false; }
	}
	public function Article_full_detail($article_id){
		$this->db->select("*");
		$this->db->from("expert_article");
		$this->db->join("subcategory",'expert_article.article_subcat_id=subcategory.subcat_id');
		$this->db->join("expert",'expert_article.expert_id=expert.expert_id');
		$where = "expert_article.article_id='".$article_id."' and expert_article.status='1'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }	
	}
	public function Podcast_full_detail($podcast_id){
		$this->db->select("*");
		$this->db->from("expert_prodcast as prod");
		$this->db->join("subcategory as sub",'prod.subcat_id=sub.subcat_id');
		$this->db->join("expert as exp",'exp.expert_id=prod.expert_id');
		$where = "prod.id='".$podcast_id."' and prod.status='1'";
		$this->db->where($where);
		$qry = $this->db->get();
	//	echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }	
	}
	public function check_article_ip($article_id,$ip){
		$this->db->select("*");
		$this->db->from("expert_article");
		$where = "article_id='".$article_id."' and ip_address='".$ip."'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->num_rows();
		} else{ return false; }
	}
    public function check_prodcast_ip($prodcast_id,$ip){
		$this->db->select("*");
		$this->db->from("expert_prodcast");
		$where = "id='".$prodcast_id."' and ip_address='".$ip."'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->num_rows();
		} else{ return false; }
	}
	public function expert_article_cat_id($cat_id){
		$this->db->select("*");
		$this->db->from("expert_article");
		$this->db->join("subcategory",'subcategory.subcat_id=expert_article.article_subcat_id');
		$this->db->join("expert",'expert.expert_id=expert_article.expert_id');
		$where = "subcategory.cat_id='".$cat_id."' and expert_article.status='1'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
public function expert_catinsert($data){
	if($this->db->insert("expert_subcat_table",$data)){
		return true;
	} else{ return false; }
}
public function expert_password_update($data){
	$expert_id = $data['expert_id'];
	$this->db->where("expert_id",$expert_id);
	$res = $this->db->update("expert",$data);
	if($res == true){
		return true;
	} else{
		return false;
	}
	
}
public function expert_cat_id_subcat_table($exp_id){
	$this->db->select("expert_cat_id");
	$this->db->from("expert_subcat_table");
	$this->db->where("expert_id",$exp_id);
	$res = $this->db->get();
	if($res->num_rows() >0){
		return $res->result_array();
	} else{ return false; }
	
}	
  
  public function membership_insert($data){
	   if($this->db->insert("expert_membership",$data)){
		   return true;
	   } else{ return false; }
	                 
}
  public function expert_subcat_row($data){
	    $this->db->select("*");
	    $this->db->from('expert_subcat_table');
	    $this->db->where('expert_id',$data['expert_id']);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
  }
  public function expert_subcat_delete($expert_id){
	  $where = "expert_id='".$expert_id."'";
	  $this->db->where($where);
	  if($this->db->delete('expert_subcat_table')){
		  return true;
	  } else{
		  return false;
	  }
  }
  public function check_user_status($user_id){		
  $this->db->select("status");		
  $this->db->from("user_detail");		
  $this->db->where("user_id",$user_id);		
  $qry = $this->db->get();		
  if($qry->num_rows() > 0){	return $qry->result();		}	}
	public function delete_academic_record($academic_id){
		$where = "academic_id ='".$academic_id."'";
		$this->db->where($where);
		if($this->db->delete("expert_academic")){
			return true;
		} else{ return false; }
	}
	public function delete_conference_record($conference_id){
		$where = "conference_id ='".$conference_id."'";
		$this->db->where($where);
		if($this->db->delete("expert_conference")){
			return true;
		} else{ return false; }
	}
	public function delete_award_record($award_id){
		$where = "awardid ='".$award_id."'";
		$this->db->where($where);
		if($this->db->delete("expert_award")){
			return true;
		} else{ return false; }
	}
	public function total_academic_row(){
    $this->db->select("*");
	$this->db->from("expert_academic");
	$qry = $this->db->get();
	if($qry->num_rows() >0){
		return $qry->num_rows();
	}
  }
	public function work_exp_row($expert_id){
	$this->db->select("*");
	$this->db->from("expert_conference");
	$this->db->where("expert_id",$expert_id);
	$qry = $this->db->get();
	if($qry->num_rows() >0){
		return $qry->result();
	}
  }
  public function prodcast_data($expert_id,$subcat_id){
    $this->db->select("*");
	$this->db->from("expert_prodcast");
	$this->db->where("expert_id",$expert_id);
	$this->db->where('status',1);
	$this->db->where('slider_status',1);
	$this->db->where('subcat_id',$subcat_id);
	$this->db->order_by('id','DESC');
	$this->db->limit('1');
	$qry = $this->db->get();
	if($qry->num_rows() >0){
		return $qry->result();
	}
  }
  public function prodcast_detail_expert_wise($expert_id){
    $this->db->select("*");
	$this->db->from("expert_prodcast as exp");
	$this->db->join('expert as ex','ex.expert_id=exp.expert_id');
	$this->db->join('subcategory as subcat','subcat.subcat_id=exp.subcat_id');
	$this->db->join('tbl_category as cat','cat.cat_id=subcat.cat_id');
	$this->db->where('exp.status',1);
	$this->db->where('ex.expert_status',1);
	$this->db->where('ex.expert_id',$expert_id);
	$qry = $this->db->get();
//	echo $this->db->last_query(); 
	if($qry->num_rows() >0){
		return $qry->result();
	} 
  }
  public function prodcast_detail_all($cat_id){
    $this->db->select("*");
	$this->db->from("expert_prodcast as exp");
	$this->db->join('expert as ex','ex.expert_id=exp.expert_id');
	$this->db->join('subcategory as subcat','subcat.subcat_id=exp.subcat_id');
	$this->db->join('tbl_category as cat','cat.cat_id=subcat.cat_id');
	$this->db->where('exp.status',1);
	$this->db->where('exp.set_status',1);
	$this->db->where('ex.expert_status',1);
	$this->db->where('cat.cat_id',$cat_id);
	$this->db->order_by('exp.id','DESC');
	$this->db->group_by('exp.expert_id');
	$qry = $this->db->get();
//	echo $this->db->last_query(); 
	if($qry->num_rows() >0){
		return $qry->result();
	}

  }
	public function award_row($expert_id){
		 $this->db->select("*");
	    $this->db->where("expert_id",$expert_id);
	    $this->db->order_by('awardid','DESC');
	    $this->db->limit('1');
	    $qry = $this->db->get('expert_award');
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{ return false; }
	}
public function expert_award_data($expert_id){
	$this->db->select("*");
	$this->db->from("expert_award");
	$this->db->where("expert_id",$expert_id);
	$qry = $this->db->get();
	if($qry->num_rows() >0){
		return $qry->result();
	}
}
public function academic_update($academic_update){
	    $res = array();
	    $data = array();
		//print_r($academic_update); die();
		if(isset($academic_update['academic_name'])){
	    $countnum = count($academic_update['academic_name']); 
		//print_r($academic_update); 
		//die();
	    for($i=0;$i<$countnum;$i++){
			if(isset($academic_update['academic_id'])){
			 $data["academic_name"]   = $academic_update['academic_name'][$i];
			 $data["academic_year"]= $academic_update['academic_year'][$i];
			 $data["academic_certificat_no"] = $academic_update['academic_certificat_no'][$i];
			 $data["academic_image"] = $academic_update['academic_image'];
			 $data["academic_id"] = $academic_update['academic_id'];
                $this->db->where("academic_id",$data['academic_id']);
	            $res[$i] =  $this->db->update("expert_academic",$data);
			}
	    }
		} else{
		return false;	
		}
	    if(!empty($res)){
	    return $res;
	    } else{ return false; }
		
}
public function conference_update($conference_update){
	    $res = array();
	    $data = array();
	    $countnum = count($conference_update['conference_name']);
	    for($i=0;$i<$countnum;$i++){
			if(isset($conference_update['conference_id'])){
			 $data   = array("conference_name"=>$conference_update['conference_name'][$i],
			               "conference_date"=>$conference_update['conference_date'][$i],
						   "conference_activity"=>$conference_update['conference_activity'][$i],
						   "conference_image"=>$conference_update['conference_image'],
						   "conference_id"=>$conference_update['conference_id']);
                   $this->db->where("conference_id",$conference_update['conference_id']);
	            $res[$i] =  $this->db->update("expert_conference",$data);
			}
	    }
	    if(!empty($res)){
	    return $res;
	    } else{ return false; }
}
public function award_update($award_update){
	    $res = array();
	    $data = array();
		if($award_update['award_name']){
	    $countnum = count($award_update['award_name']);
		} else{ $countnum ='0'; }
	    for($i=0;$i<$countnum;$i++){
			if(isset($award_update['award_id'])){
			 $data   = array("award_name"=>$award_update['award_name'][$i],
			               "award_date"=>$award_update['award_date'][$i],
						   "award_occassion"=>$award_update['award_occassion'][$i],
						   "award_image"=>$award_update['award_image'],
						   "awardid"=>$award_update['award_id']);
                           $this->db->where("awardid",$award_update['award_id']);
	            $res[$i] =  $this->db->update("expert_award",$data);
			}
	    }
	    if(!empty($res)){
	    return $res;
	    } else{ return false; }
}
public function membership_update($membership_update){
	   
		if($membership_update['membership_name']){
			 $data   = array("membership_name"=>$membership_update['membership_name']);
                           $this->db->where("membership_id",$membership_update['membership_id']);
	         $res =  $this->db->update("expert_membership",$membership_update);
			}
	    if(!empty($res)){
	    return $res;
	    } else{ return false; }
}
public function expert_academic_data($expert_id){
	$this->db->select("academic_name,academic_year,academic_certificat_no,academic_image,academic_id");
	$this->db->from("expert_academic");
	$this->db->where("expert_id",$expert_id);
	$qry = $this->db->get();
	if($qry->num_rows() >0){
		return $qry->result();
	}
}

public function expert_work_exp($expert_id){
	$this->db->select('conference_name,conference_date,conference_activity');
    $this->db->from('expert_conference');
    $this->db->where('expert_id',$expert_id);
    $qry = $this->db->get();
    if($qry->num_rows() >0){
        return($qry->result());
    } else { return false; }
}	
public function category_id_usingname($catname){
    $this->db->select('cat_id');
    $this->db->from('tbl_category');
    $this->db->where('cat_name',$catname);
    $qry = $this->db->get();
    if($qry->num_rows() >0){
        return($qry->result());
    } else { return false; }
}
public function expert_id_usingname($expert_name,$cat_id,$subcat_id){
    $this->db->select('expert.expert_id');
    $this->db->from('expert');
	$this->db->join('expert_subcat_table','expert.expert_id=expert_subcat_table.expert_id');
	$where = "expert.expert_name='".$expert_name."' and expert_subcat_table.expert_cat_id='".$cat_id."' and expert_subcat_table.expert_subcat_id='".$subcat_id."'";
    $this->db->where($where);
    $qry = $this->db->get();
   // echo $this->db->last_query(); die();
    if($qry->num_rows() >0){
        return($qry->result());
    } else { return false; }
}
public function subcat_id_usingname($subcat_name,$cat_id){
    $this->db->select('subcat_id,subcat_name');
    $this->db->from('subcategory');
    $where = "subcat_name='".$subcat_name."' and cat_id='".$cat_id."'";
    $this->db->where($where);
    $qry = $this->db->get();
    if($qry->num_rows() >0){
        return($qry->result());
    } else { return false; }
}
public function expert_email_check($expert_email){
    $this->db->select("expert_email,expert_name,expert_id");
     $this->db->from('expert');
     $this->db->where('expert_email',$expert_email);
     $qry = $this->db->get();
     if($qry->num_rows() > 0){
         return $qry->result();
     } else{
         return false;
     }
}
    public function user_email_check($useremail){
    $this->db->select("useremail,username,user_id");
     $this->db->from('user_detail');
     $this->db->where('useremail',$useremail);
     $qry = $this->db->get();
     if($qry->num_rows() > 0){
         return $qry->result();
     } else{
         return false;
     }
}
   public function user_reg($data){
	   $this->db->where('user_id', $data['user_id']);
	    $res = $this->db->update("user_detail",$data);
       if($res == true){
           return true;
       } else{ return false; }
	}
	public function expert_verify_update($data,$expert_id){
	   $this->db->where('expert_id', $expert_id);
	    $res = $this->db->update("expert",$data);
       if($res == true){
           return true;
       } else{ return false; }
	}
	public function user_verify_update($data,$user_id){
	   $this->db->where('user_id', $user_id);
	    $res = $this->db->update("user_detail",$data);
       if($res == true){
           return true;
       } else{ return false; }
	}
	public function Expert_enc_key_update($data,$expert_id){
	    $this->db->where('expert_id', $expert_id);
	    $res = $this->db->update("expert",$data);
       if($res == true){
           return true;
       } else{ return false; }
  
	}
	public function User_enc_key_update($data,$user_id){
	    $this->db->where('user_id', $user_id);
	    $res = $this->db->update("user_detail",$data);
       if($res == true){
           return true;
       } else{ return false; }
  
	}
	public function check_expert_enc_key($data){
	    $expert_id = $data['expert_id'];
	    $enc_key = $data['enc_key'];
	    $this->db->select('expert_id');
	    $this->db->from('expert');
	    $where ="expert_id='".$expert_id."' and enc_key='".$enc_key."'";
	    $this->db->where($where);
	    $res = $this->db->get();
       if($res == true){
           return true;
       } else{ return false; }
	}
	public function check_user_enc_key($data){
	    $user_id = $data['user_id'];
	    $enc_key = $data['enc_key'];
	    $this->db->select('user_id');
	    $this->db->from('user_detail');
	    $where ="user_id='".$user_id."' and enc_key='".$enc_key."'";
	    $this->db->where($where);
	    $res = $this->db->get();
       if($res == true){
           return true;
       } else{ return false; }
	}
    public function expert_pass_update($data,$expert_id,$enc_key){
        $where = "expert_id='".$expert_id."'  AND enc_key='".$enc_key."'";
        $where1 = "expert_id='".$expert_id."'";
        $this->db->select('expert_id');
        $this->db->from('expert');
        $this->db->where($where);
        $qry = $this->db->get();
        if($qry->num_rows() > 0){
        $this->db->where($where1);
	    $res = $this->db->update("expert",$data);
        if($res == true){
            $data2['enc_key'] = '';
            $where2 = "expert_id='".$expert_id."' AND enc_key='".$enc_key."'";
            $this->db->where($where2);
	        if($this->db->update("expert",$data2)){
            return true;
	        }
       } else{ return false; }
        } else{ return false; }
    }
    public function user_pass_update($data,$user_id,$enc_key){
        $where = "user_id='".$user_id."'  AND enc_key='".$enc_key."'";
        $where1 = "user_id='".$user_id."'";
        $this->db->select('user_id');
        $this->db->from('user_detail');
        $this->db->where($where);
        $qry = $this->db->get();
        if($qry->num_rows() > 0){
        $this->db->where($where1);
	    $res = $this->db->update("user_detail",$data);
        if($res == true){
            $data2['enc_key'] = '';
            $where2 = "user_id='".$user_id."' AND enc_key='".$enc_key."'";
            $this->db->where($where2);
	        if($this->db->update("user_detail",$data2)){
            return true;
	        }
       } else{ return false; }
        } else{ return false; }
    }
	 public function check_user($id){
	    $this->db->select("*");
	    $this->db->from('user_detail');
	    $this->db->where('user_id',$id);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_otp_row($expert_id){
	    $this->db->select("otp,expert_email,expert_name,exp_pass");
	    $this->db->from('expert');
	    $where = "expert_id='".$expert_id."' and mobile_verify='0'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function user_otp_row($user_id){
	    $this->db->select("*");
	    $this->db->from('user_detail');
	    $where = "user_id='".$user_id."' and mobile_verify='1'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_otp_row2($expert_id){
	    $this->db->select("otp,expert_email");
	    $this->db->from('expert');
	    $where = "expert_id='".$expert_id."' and mobile_verify='1' and expert_status !='3'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_text_question($chat_name,$expert_id){
		$this->db->select("*");
		$this->db->from('question_tbl');
		$this->db->join('payment_table','payment_table.QUESTION_ID=question_tbl.q_id');
		$where = "question_tbl.advice_mode='".$chat_name."' and question_tbl.expert_id='".$expert_id."' and question_tbl.payment_status='1' and question_tbl.question_status='1' group by question_tbl.q_id";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
	public function expert_text_question_history($chat_name,$expert_id){
		$this->db->select("*");
		$this->db->from('question_tbl as qt');
		$this->db->join('user_detail as ud','ud.user_id=qt.user_id');
		$this->db->join('payment_table as pt','pt.QUESTION_ID=qt.q_id');
		$where = "qt.advice_mode='".$chat_name."' and qt.expert_id='".$expert_id."' and qt.payment_status='1' and qt.question_status='2' order by qt.question_datetime desc";
		$this->db->where($where);
		$qry = $this->db->get();
	//	echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
	public function user_text_question($chat_name,$user_id){
		$this->db->select("*");
		$this->db->from('question_tbl as q');
		$this->db->join('payment_table as pay','pay.QUESTION_ID=q.q_id');
		if($chat_name == "GroupText"){
		 $where = "q.advice_mode='".$chat_name."' and q.user_id='".$user_id."' and q.payment_status='1' and q.question_status='1' and q.expert_id <>'0' group by q.q_id";
		} else{
		  $where = "q.advice_mode='".$chat_name."' and q.user_id='".$user_id."' and q.payment_status='1' and q.question_status='1' and q.expert_id <>'0' group by q.q_id";
		}
		$this->db->where($where);
		$qry = $this->db->get();
	//	echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
	public function user_text_answer($chat_name,$user_id){
		$this->db->select("answer_tbl.ans_id,answer_tbl.answer,answer_tbl.answer_status,answer_tbl.user_id,answer_tbl.subcat_id,answer_tbl.advice_mode,question_tbl.q_id,question_tbl.question_text,question_tbl.cat_id,question_tbl.expert_id,expert.expert_name,question_tbl.question_datetime,question_tbl.question_status,question_tbl.end_date");
		$this->db->from('answer_tbl');
		$this->db->join('expert','expert.expert_id=answer_tbl.expert_id');
		$this->db->join('subcategory','subcategory.subcat_id=answer_tbl.subcat_id');
		$this->db->join('question_tbl','question_tbl.user_id=answer_tbl.user_id');
		$where = "answer_tbl.user_id='".$user_id."' and question_tbl.question_status='1' and (answer_tbl.status='1' or answer_tbl.status='0') order by answer_tbl.ans_id desc";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
	public function update_answer_groupchat($data,$update_data){
		$where = "expert_id !='".$data['expert_id']."' and q_id='".$data['q_id']."' and advice_mode='".$data['advice_mode']."'";
		 $this->db->where($where);
	    $res = $this->db->update("answer_tbl",$update_data);
       if($res == true){
           return true;
       } else{ return false; }
	}
	public function history_text_question($advice_mode,$user_id){
		$current_date = date("d-m-Y");
		$this->db->select("*");
		$this->db->from('question_tbl');
		$this->db->join('expert','expert.expert_id=question_tbl.expert_id');
		$this->db->join('payment_table','payment_table.QUESTION_ID=question_tbl.q_id');
		$where = "question_tbl.advice_mode='".$advice_mode."' and question_tbl.user_id='".$user_id."' and question_tbl.payment_status='1' 
		          and question_tbl.question_status='2' GROUP BY question_tbl.q_id";
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }

	}
	public function user_text_question_detail($chat_name,$user_id,$expert_id,$subcat_id,$qust_id){
		$this->db->select("*");
		$this->db->from('question_tbl');
	/*
		$where = "question_tbl.user_id='".$user_id."' and question_tbl.payment_status='1' and question_tbl.advice_mode='".$chat_name."' and question_tbl.subcat_id='".$subcat_id."' and question_tbl.expert_id='".$expert_id."' and question_tbl.subadmin_id is null and question_tbl.qust_id='".$qust_id."'  order by question_tbl.qust_id";
	*/
		$where = "question_tbl.user_id='".$user_id."' and question_tbl.advice_mode='".$chat_name."' and question_tbl.subcat_id='".$subcat_id."' and question_tbl.expert_id='".$expert_id."' and question_tbl.qust_id='".$qust_id."'  order by question_tbl.qust_id";
	
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
	
	public function user_text_question_detail_history($chat_name,$user_id,$expert_id,$subcat_id,$qust_id){
		$this->db->select("*");
		$this->db->from('question_tbl');
	/*
		$where = "question_tbl.user_id='".$user_id."' and question_tbl.payment_status='1' and question_tbl.advice_mode='".$chat_name."' and question_tbl.subcat_id='".$subcat_id."' and question_tbl.expert_id='".$expert_id."' and question_tbl.subadmin_id is null and question_tbl.qust_id='".$qust_id."'  order by question_tbl.qust_id";
	*/
		$where = "question_tbl.user_id='".$user_id."' and question_tbl.advice_mode='".$chat_name."' and question_tbl.subcat_id='".$subcat_id."' and question_tbl.expert_id='".$expert_id."' and question_tbl.qust_id='".$qust_id."'  order by question_tbl.qust_id";
	
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
	public function user_text_question_detail_subcat($chat_name,$user_id,$expert_id,$subcat_id,$qust_id,$subadmin_id){
		$this->db->select("*");
		$this->db->from('question_tbl');
		$where = "question_tbl.user_id='".$user_id."' and question_tbl.advice_mode='".$chat_name."' and question_tbl.subcat_id='".$subcat_id."' and question_tbl.expert_id='".$expert_id."' and question_tbl.qust_id='".$qust_id."' and question_tbl.subadmin_id='".$subadmin_id."' order by question_tbl.qust_id";
		$this->db->where($where);
		$qry = $this->db->get();
		//echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
	public function user_text_question_detail_single($chat_name,$user_id,$qust_id,$expert_id,$subcat_id){
		$this->db->select("*");
		$this->db->from('question_tbl');
			/*
		$where = "question_tbl.user_id='".$user_id."' and question_tbl.payment_status='1' and question_tbl.advice_mode='".$chat_name."' and question_tbl.subcat_id='".$subcat_id."' and question_tbl.expert_id='".$expert_id."' and question_tbl.subadmin_id is null and question_tbl.qust_id='".$qust_id."'  order by question_tbl.qust_id";
	*/
		$where = "question_tbl.user_id='".$user_id."' and question_tbl.advice_mode='Text' and question_tbl.subcat_id='".$subcat_id."'  and question_tbl.qust_id='".$qust_id."' and question_tbl.expert_id='".$expert_id."' order by question_tbl.qust_id asc";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
	public function expert_single_question($question_id){
		$this->db->select("*");
		$this->db->from('question_tbl');
		$where = "q_id='".$question_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
	//	echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
	public function total_answer_row($q_id){
		$this->db->select("*");
		$this->db->from('answer_tbl');
		$where = "q_id='".$q_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
	//	echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->num_rows();
		} else{ return false; }
	}
	public function expert_single_question2($qust_id){
		$this->db->select("*");
		$this->db->from('question_tbl');
		$where = "qust_id='".$qust_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
	//	echo $this->db->last_query();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
	public function user_otp_row2($user_id){
	    $this->db->select("otp,useremail");
	    $this->db->from('user_detail');
	    $where = "user_id='".$user_id."' and mobile_verify='1'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function register_user($data){
	     $mobile_check = $this->mobile_check_user($data['usermobile']);
	     $email_check = $this->email_check_user($data['useremail']);
	     if($mobile_check == false &&  $email_check == false){
	    $res = $this->user_registration($data);
	     } else{ $res = false; }
       if($res >0){
           return $res;
       } else{ return false; }
	}
	public function user_registration($data){
		$res = $this->db->insert("user_detail",$data);
		return $this->db->insert_id();
	}
	public function email_check_user($email){
	    $this->db->select("user_id");
	    $this->db->where("useremail",$email);
	    $this->db->where('status',1);
	    $qry = $this->db->get('user_detail');
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{ return false; }
	}
	public function mobile_check_user($mobile){
	    $this->db->select("user_id");
	    $this->db->where("usermobile",$mobile);
	    $this->db->where('status',1);
	    $qry = $this->db->get('user_detail');
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{ return false; }
	}
	public function expert_cat_id($expert_id){
	    $this->db->select("*");
	    $this->db->where("expert_id",$expert_id);
	   $qry =  $this->db->get('expert_subcat_table');
	   if($qry->num_rows() > 0){
	       return $qry->result_array();
	   } else{ return  false; }
	}
	 public function expert_subcat_id($expert_id){
	     $this->db->select("expert_subcat_id");
	    $this->db->where("expert_id",$expert_id);
	   $qry =  $this->db->get('expert_subcat_table');
	   if($qry->num_rows() > 0){
	       return $qry->result();
	   } else{ return  false; }
	 }
	public function expert_video($id){
	    $this->db->select("*");
	    $this->db->from('expert_video');
	    $where ="expert_id='".$id."' and (status='0' OR status='1')";
	    $this->db->where($where);
	    $this->db->order_by('video_id');
	    $this->db->limit('4');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }

	}
	public function expert_video_catidwise($catid){
	    $this->db->select("*");
	    $this->db->from('expert_video');
	    $this->db->join('expert_subcat_table','expert_video.expert_id=expert_subcat_table.expert_id');
	    $where ="expert_subcat_table.expert_cat_id='".$catid."' group by expert_subcat_table.expert_id";
	    $this->db->where($where);
	    $this->db->order_by('expert_video.video_id');
	    $this->db->limit('4');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }

	}
	public function Artical_detail_catwise(){
	    $this->db->select("expert_cat_id");
	    $this->db->from('expert_subcat_table');
	    $this->db->join('expert','left');
	    $where = "expert_subcat_table.expert_id=expert.expert_id and expert.expert_status='1'";
	    $this->db->where($where);
	    $data = $this->db->get();
	    
	}
	public function expert_video_single($id){
	    $this->db->select("*");
	    $this->db->from('expert_video');
	    $where ="video_id='".$id."' and status='1'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
   public function expert_article_single($id){
	    $this->db->select("*");
	    $this->db->from('expert_article');
	    $where ="article_id='".$id."' and status='1'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_article_limited($id,$subcat_id){
	    $this->db->select("*");
	    $this->db->from('expert_article');
	    $where ="expert_id='".$id."' and status='1' and article_subcat_id='".$subcat_id."'";
	    $this->db->where($where);
	    $this->db->order_by('article_id');
	    $this->db->limit('4');
	    $qry = $this->db->get();
	    //echo $this->db->last_query();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_article_limited_catwise($catid){
	    $this->db->select("*");
	    $this->db->from('expert_article');
	    $this->db->join('expert_subcat_table','expert_article.expert_id=expert_subcat_table.expert_id');
	    $where ="expert_subcat_table.expert_cat_id='".$catid."' group by expert_subcat_table.expert_id";
	    $this->db->where($where);
	    $this->db->order_by('expert_article.article_id');
	    $this->db->limit('4');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function allsubcat_in_expert($expert_id){
		   $this->db->select("expert_subcat_id");
		   $this->db->where("expert_id",$expert_id);
		   $qry = $this->db->get('expert_subcat_table');
		   if($qry->num_rows() > 0){
			  return $subcat_id = $qry->result();
		   }
	}
	public function article_detail($id){
	    $this->db->select("*");
	    $this->db->from('expert_article');
	    $where = "expert_id='".$id."' and (status='0' OR status='1')";
	    $this->db->where('expert_id',$id);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	
   public function expert_article($id){
	    $this->db->select("*");
	    $this->db->from('expert_article');
	    $this->db->where('expert_id',$id);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_submit($data){
	    $this->db->where('expert_id', $data['expert_id']);
	    $res = $this->db->update("expert",$data);
       if($res == true){
           return true;
       } else{ return false; }             
	}
	public function expert_signup($data){
	     $res = $this->db->insert("expert",$data);
	     if($res == true){
           return true;
       } else{ return false; }
	}
	public function mobile_check($mobile){
	    $this->db->select("expert_id");
		$where = "expert_mobile='".$mobile."' and (mobile_verify='1' or expert_status !='3')";
	    $this->db->where($where);
	    $qry = $this->db->get('expert');
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{ return false; }
	}
	public function email_check($email){
	    $this->db->select("expert_id");
		$where = "expert_email='".$email."' and expert_status !='3'";
	    $this->db->where($where);
	    $qry = $this->db->get('expert');
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{ return false; }
	}
	
	public function expert_membership($expert_id){
		 $this->db->select("*");
	    $this->db->where("expert_id",$expert_id);
	    $qry = $this->db->get('expert_membership');
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{ return false; }
	}
	public function academic_insert($academic){
	    $res = array();
	    $data = array();
	    $countnum = count($academic['academic_name']);
		for($i=0;$i<$countnum;$i++){
			if($academic['academic_name'][$i]){
	        $data['academic_name'] = $academic['academic_name'][$i];
	        $data['academic_year'] = $academic['academic_year'][$i];
	        $data['academic_certificat_no'] = $academic['academic_certificat_no'][$i];
	        $data['academic_image'] = $academic['academic_image'][$i];
	        $data['expert_id'] = $academic['expert_id'];
	       $res[$i] =  $this->db->insert("expert_academic",$data);
	    }
		else {
			$res[$i] = '';
		}
		} 
	    if(!empty($res)){
	    return $res;
	    } else{ return false; }
	}
	public function conference_insert($conference){
	    $res = array();
	    $data = array();
	    $countnum = count($conference['conference_name']);
	    for($i=0;$i<$countnum;$i++){
			if($conference['conference_name'][$i]){
	        $data['conference_name'] = $conference['conference_name'][$i];
	        $data['conference_date'] = $conference['conference_date'][$i];
	        $data['conference_activity'] = $conference['conference_activity'][$i];
	        $data['conference_image'] = $conference['conference_image'][$i];
	        $data['expert_id'] = $conference['expert_id'];
	       $res[$i] =  $this->db->insert("expert_conference",$data);
			} else{ $res[$i] = ''; }
	    }
	    if(!empty($res)){
	    return $res;
	    } else{ return false; }
	}
	
	public function video_insert($video){
	    $res = array();
	    $data = array();
	        $data['video_name'] = $video['video_name'];
	        $data['video_title'] = $video['video_title'];
			$data['video_subcat_id'] = $video['video_subcat_id'];
	        $data['video_comment'] = $video['video_comment'];
	        $data['video_date'] = $video['video_date'];
	        $data['expert_id'] = $video['expert_id'];
	        $data['status'] = $video['status'];
			$data['video_name2'] = $video['video_name2'];
	       $res =  $this->db->insert("expert_video",$data);
	    
	    if(!empty($res)){
	    return $res;
	    } else{ return false; }
	}
	
	public function article_insert($article){
	       $res =  $this->db->insert("expert_article",$article);
	    if(!empty($res)){
	    return $res;
	    } else{ return false; }
	}
	public function video_delete($expert_id,$video_id){
	    $where ="expert_id=".$expert_id." and video_id=".$video_id."";
		$this->db->where($where);
		if($this->db->delete("expert_video")){
			return true;
		} else{ return false; }
	}
	public function article_delete($expert_id,$article_id){
	     $where ="expert_id=".$expert_id." and article_id=".$article_id."";
		$this->db->where($where);
		if($this->db->delete("expert_article")){
			return true;
		} else{ return false; }
	}
	
	
   public function award_insert($award){
	    $res = array();
	    $data=array();
	    $countnum = count($award['award_name']);
	    for($i=0; $i<$countnum; $i++){
			if($award['award_name'][$i]){
	        $data['award_name'] = $award['award_name'][$i];
	        $data['award_date'] = $award['award_date'][$i];
	        $data['award_occassion'] = $award['award_occassion'][$i];
	        $data['award_image'] = $award['award_image'][$i];
	        $data['expert_id'] = $award['expert_id'];
	       $res[$i] =  $this->db->insert("expert_award",$data);
			} else{
				$res[$i] ='';
			}
	    }
	    if(!empty($res)){
	    return $res;
	    } else{ return false; }
	}
	public function other_detail_update($data){
	    $this->db->where('expert_id', $data['expert_id']);
	    $res = $this->db->update("expert",$data);
       if($res == true){
           return true;
       } else{ return false; }
	}
	public function expert_subcat_id_array($expert_id){
		$this->db->select("expert_subcat_id");
	    $this->db->where("expert_id",$expert_id);
	   $qry =  $this->db->get('expert_subcat_table');
	   if($qry->num_rows() > 0){
	       return $qry->result_array();
	   } else{ return  false; }
	}
	public function expert_register($data){
	    $this->db->where('expert_id', $data['expert_id']);
	    $res = $this->db->update("expert",$data);
       if($res == true || $res[$i] == true){
           return true;
       } else{ return false; }
	}
	 public function expert_subcat_insert($data2){
	     $count = count($data2['expert_subcat_id']);
	        for($i=0;$i<$count;$i++){
	         $data['expert_subcat_id'] = $data2['expert_subcat_id'][$i];
	         $data['expert_cat_id'] = $data2['expert_cat_id'];
	         $data['expert_id'] = $data2['expert_id'];
	        //echo      $data2['expert_subcat_id'] = $data2['expert_subcat_id'][$i];
	       // $qry ="insert into expert_subcat_table column(expert_id,expert_cat_id,expert_subcat_id) values(".$data2['expert_id'].",".$data2['expert_cat_id'].",".$data['expert_subcat_id'].")";
	        $res[$i] = $this->db->insert("expert_subcat_table",$data);
	                                }
       if($res == true || $res[$i] == true){
           return true;
       } else{ return false; }
	 }
	 public function delete_expert_subcat($expert_id){
	       $this->db->where('expert_id', $expert_id);
           if($this->db->delete('expert_subcat_table')){
               return true;
           } else{ return false; }
	 }
	public function total_expert_row($expert_id){
	    $this->db->select('expert_id');
	    $this->db->from('expert');
	    $this->db->where('expert_id',$expert_id);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
	}
	public function last_expert_desc($expert_id){
	    $this->db->select("expert_subcat_id");
	    $this->db->from('expert');
	    $this->db->where('expert_id',$expert_id);
	    $this->db->order_by("expert_id", "DESC");
        $this->db->limit('1');
        $qry = $this->db->get();
        if($qry->num_rows() > 0){
         $expert_subcat_id =  $qry->result_array();
          $this->db->where('expert_subcat_id', $expert_subcat_id[0]['expert_subcat_id']);
       if($this->db->delete('expert')){
           return true;
           }
        }
	}
	public function last_expert(){
	    $this->db->select("expert_id");
	    $this->db->from('expert');
	    $this->db->order_by("expert_id", "DESC");
        $this->db->limit('1');
        $qry = $this->db->get();
        if($qry->num_rows() > 0){
         return $expert_id =  $qry->result_array();
        } else { return false; }
	}
	public function last_user(){
	    $this->db->select("user_id");
	    $this->db->from('user_detail');
	    $this->db->order_by("user_id", "DESC");
        $this->db->limit('1');
        $qry = $this->db->get();
        if($qry->num_rows() > 0){
         return $user_id =  $qry->result_array();
        } else { return false; }
	}

   public function expert_update($data){
            $this->db->where('expert_id', $data['expert_id']);
	        $res = $this->db->update("expert",$data);
			//echo $this->db->last_query();
       if($res == true){
           return true;
       } else{ return false; }
	}
	public function expert_max_id(){
	    $this->db->select_max('expert_id');
	     $res1 = $this->db->get('expert');
	      if ($res1->num_rows() > 0)
    {
        $res2 = $res1->result_array();
 return $result = $res2[0]['expert_id']+1;
    }
	    
	}
	public function update_expert_image($data){
	    $this->db->where('expert_id', $data['expert_id']);
	    $res = $this->db->update("expert",$data);
       if($res == true){
           return true;
       } else{ return false; }
	}
	public function update_user_image($data){
	    $this->db->where('user_id', $data['user_id']);
	    $res = $this->db->update("user_detail",$data);
       if($res == true){
           return true;
       } else{ return false; }
	}
	public function expert_login($data){
	    $this->db->select("expert_name,expert_email,expert_id,expert_mobile");
	    $where  = "expert_email='".$data['expert_email']."' and exp_pass='".$data['exp_pass']."' and (expert_status='1' or expert_status='0') and mobile_verify='1'";
	    $this->db->where($where);
	    $qry =  $this->db->get('expert');
	   if($qry->num_rows() > 0){
	       return $qry->result();
	   }
	}
	public function user_login($data){
	    $this->db->select("username,useremail,user_id,usermobile");
	    $where  = "useremail='".$data['useremail']."' and userpass='".$data['userpass']."'";
	    $this->db->where($where);
	   $qry =  $this->db->get('user_detail');
	   if($qry->num_rows() > 0){
	       return $qry->result();
	   }
	}
	public function academic_register($data){
	    $res = $this->db->insert("expert_academic",$data);
	    if($res == true){
	        return true;
	    } else{
	        return false;
	    }
	}
	public function confrence_register($data){
	    $res = $this->db->insert("expert_content",$data);
	    if($res == true){
	        return true;
	    } else{
	        return false;
	    }
	}
	public function award_registration($data){
	    $res = $this->db->insert("expert_award",$data);
	    if($res == true){
	        return true;
	    } else{
	        return false;
	    }
	}
	public function refer_submit($data){
	    $count = count($data['refer_name']);
	    $data2 = array();
	    //print_r($count); die();
	    for($i=0;$i<$count;$i++){
	        $data2['refer_name'] = $data['refer_name'][$i];
	        $data2['cat_id'] = $data['cat_id'][$i];
	        $data2['refer_mobile'] = $data['refer_mobile'][$i];
	        $data2['expert_id'] = $data['expert_id'];
	        $data2['status'] = $data['status'];
	        $data2['datetime'] = $data['datetime'];
	        $data2['expert_cat_id'] = $data['expert_cat_id'];
			$data2['refer_city'] = $data['refer_city'][$i];
	        $res[$i] = $this->db->insert('expert_referance',$data2);
	    }
	    if(isset($res)){
	        return true;
	    } else{ return false; }
	}
	public function subadmin_detail(){
	    $this->db->select("*");
	    $this->db->from('admin');
	    $this->db->where('admin_status','1');
	    $this->db->where('admin_role','subadmin');
	    $this->db->or_where('admin_status','0');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function all_subadmin(){
	    $this->db->select("*");
	    $this->db->from('admin');
	    $this->db->where('admin_status','1');
	    $this->db->where('admin_role','subadmin');
	    $this->db->or_where('admin_status','0');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
	}
	public function login_admin($data)
	{
	     $email = $data['email'];
	     $pass = $data['password'];
	     $this->db->select('*');
	     $this->db->from('admin');
	     $this->db->where('admin_email',$email);
	     $this->db->where('admin_pass',$pass);
	     $this->db->where('admin_status','1');
	     $qry = $this->db->get();
	     if($qry->num_rows() >0){
	         return $qry->result();
	     } else{
	           return false;
	     }
	}
	public function category_data(){
	    $this->db->select("*");
	    $this->db->from('tbl_category');
	    $this->db->where('status','1');
	    $this->db->or_where('status','0');
	    $this->db->order_by("cat_id",'DESC');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	} 
	public function category_data_asc(){
	    $this->db->select("*");
	    $this->db->from('tbl_category');
	    $this->db->where('status','1');
	   // $this->db->or_where('status','0');
	    $this->db->order_by("cat_id",'ASC');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	} 
	public function category_data_desc(){
	    $this->db->select("*");
	    $this->db->from('tbl_category');
	    $this->db->where('status','1');
	    $this->db->or_where('status','0');
	    $this->db->order_by("cat_id",'DESC');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	} 
	 
		public function category_detail(){
	    $this->db->select("*");
	    $this->db->from('tbl_category');
	    $this->db->where('status','1');
	    $this->db->order_by("cat_id",'DESC');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function single_cat_data($cat_id){
	    $this->db->select("*");
	    $this->db->from('tbl_category');
	    $this->db->where('cat_id',$cat_id);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result_array();
	    } else{
	        return false;
	    }
	}
	public function subcat_data_single($subcatid){
	    $this->db->select("*");
	    $this->db->from('subcategory');
	    $this->db->where('subcat_id',$subcatid);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function subcat_detail_subcatidwise($subcatid){
	    $this->db->select("*");
	    $this->db->from('subcategory');
	    $this->db->where('subcat_id',$subcatid);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result_array();
	    } else{
	        return false;
	    }
	}
	public function subcat_data($catid){
	    $this->db->select("*");
	    $this->db->from('subcategory');
	    $this->db->where('cat_id',$catid);
	    $this->db->order_by('subcat_name');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_subcat_data($catid){
	    $this->db->select("expert_subcat_id");
	    $this->db->from('expert');
	    $this->db->where('cat_id',$catid);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function subcat_namesubcatidwise($subcat_id){
	    $this->db->select("subcat_name");
	    $this->db->from('subcategory');
		$where = "subcat_id='".$subcat_id."' order by subcat_name";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function single_subcat_data($subcat_name){
	    $this->db->select("*");
	    $this->db->from('subcategory');
	    $this->db->where('subcat_name',$subcat_name);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result_array();
	    } else{
	        return false;
	    }
	}
	 public function delete_subcat_row($subcat_id){
      $this->db->where('subcat_id', $subcat_id);
       if($this->db->delete('subcategory')){
           return true;
           }
       }
   
	public function subcat_data_row($cat_id){
	    $this->db->select("*");
	    $this->db->from('subcategory');
		$where = "subcat_status='1' and cat_id='".$cat_id."'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
	}
	
	public function subcat_data_row_limitwise($min_limit,$max_limit,$cat_id){
	    $this->db->select("subcat_name,subcat_id");
	    $this->db->from('subcategory');
	    $where = "cat_id='".$cat_id."' and subcat_status = '1'";
	    $this->db->where($where);
	    $this->db->order_by("subcat_name");
        $this->db->limit($max_limit,$min_limit);
	    $qry = $this->db->get();
	    if($qry){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	
	public function subcat_data_row_limitwise2($min_limit,$max_limit,$cat_id){
	    $this->db->select("subcat_name,subcat_id");
	    $this->db->from('subcategory');
	    $where = "cat_id='".$cat_id."' and subcat_status = '1'";
	    $this->db->where($where);
	    $this->db->order_by("subcat_name");
        $this->db->limit($max_limit, $min_limit);
	    $qry = $this->db->get();
	    if($qry){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_data_row($cat_id){
	    $this->db->select("*");
	    $this->db->from('expert');
	    $this->db->where('cat_id',$cat_id);
	    $qry = $this->db->get();
	    if($qry){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
	}
	public function all_subcat_according_catid($cat_id){
	    $this->db->select("*");
	    $this->db->from('subcategory');
	    $this->db->where('cat_id',$cat_id);
	    $qry = $this->db->get();
	    if($qry){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	
  public function category_status2($id){
                    $this->db->set('status', '1');  
                    $this->db->where("cat_id", $id);  
                    if($this->db->update("tbl_category")){
                       return true;
                       } else{ return false; }
     }
 public function category_status($id){
                    $this->db->set('status', '0');  
                    $this->db->where("cat_id", $id);  
                    if($this->db->update("tbl_category")){
                        if($this->subadmin_satus($id) == true){
                       return true; }
                       } else{ return false; }
     }
     
   public function category_add($data){
       $res = $this->db->insert("tbl_category",$data);
       if($res == true){
           return true;
       } else{ return false; }
   }
   public function update_cat($data){
                    $this->db->where('cat_id', $data['cat_id']); 
                    $dbdata = array(
                              "cat_name" => $data['cat_name'],
                              "cat_title" => $data['cat_title'],
                              "status" => $data['status']); 
                    if($this->db->update("tbl_category",$dbdata)){
                       return true;
                       } else{ return false; }
                }
                
    public function subadmin_update($data){
                    $this->db->where('admin_id', $data['admin_id']); 
                    $dbdata = array(
                              "admin_cat_id" => $data['admin_cat_id'],
                              "admin_email" =>  $data['admin_email'],
                              "admin_status" => $data['admin_status'],
                              "admin_pass"=> $data['admin_pass']); 
                    if($this->db->update("admin",$dbdata)){
                       return true;
                       } else{ return false; }
                }
                
  public function delete_cat_row($id){
       $this->db->where('cat_id', $id);
       if($this->db->delete('tbl_category')){
           if(($this->subadmin_delete($id))){
           return true;
           }
       }
  }
  public function subadmin_delete($cat_id){
      $this->db->where('admin_cat_id', $cat_id);
      $this->db->where('admin_role', 'subadmin');
       if($this->db->delete('admin')){
           return true;
           }
       }
  public function subadmin_insert($data){
      if($this->db->insert("admin",$data)){
          return true;
      }
  }
  
  
  //suadmin function
  public function subcat_detail($catid){
	    $this->db->select("*");
	    $this->db->from('subcategory');
	    $where = '(subcat_status="1" or subcat_status="0")';
	    $this->db->where($where);
	    $this->db->where('cat_id',$catid);
	    $this->db->order_by("subcat_id",'DESC');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function subadmin_single($adminid){
	     $this->db->select("*");
	    $this->db->from('admin');
	    $this->db->where('admin_id',$adminid);
	    $this->db->where('admin_role','subadmin');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }

	}
	public function subadmin_satus($id){
	                $this->db->set('admin_status', '0');  
                    $this->db->where("admin_cat_id", $id);
                    $this->db->where("admin_role", 'subadmin');
                    if($this->db->update("admin")){
                       return true;
                       } else{ return false; }

	    
	}
	public function subadmin_status_change($adminid){
	     $this->db->set('admin_status', '0');  
                    $this->db->where("admin_id", $adminid);
                    $this->db->where("admin_role", 'subadmin');
                    if($this->db->update("admin")){
                       return true;
                       } else{ return false; }
	}
   public function subadmin_status_cahnge2($adminid){
	                $this->db->set('admin_status', '1');
                    $where = "admin_id='".$adminid."' and admin_role='subadmin'";				
                    $this->db->where($where);
                    if($this->db->update("admin")){
                       return true;
                       } else{ return false; }
	}

 public function expert_data_row_subcat($subcat_id){
	    $this->db->select("*");
	    $this->db->from('expert_subcat_table');
		$this->db->join('expert','expert.expert_id = expert_subcat_table.expert_id');
	    //$this->subcat_array($subcat_id);
		$where = "expert_subcat_table.expert_subcat_id='".$subcat_id."' and expert.expert_status='1'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
	}
 public function expert_data_row_subcat_copy($subcat_id){
	    $this->db->select("*");
	    $this->db->from('expert');
	    //$this->subcat_array($subcat_id);
	    $this->db->where('expert_subcat_id',$subcat_id);
	    $qry = $this->db->get();
	    if($qry){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
	}	
	 public function subcategory_add($data){
       $res = $this->db->insert("subcategory",$data);
       if($res == true){
           return true;
       } else{ return false; }
   }
   
   public function  subcat_status_active($subcatid){
	     $this->db->set('subcat_status', '0');  
                    $this->db->where("subcat_id", $subcatid);
                    if($this->db->update("subcategory")){
                       return true;
                       } else{ return false; }
	}
   public function  subcat_status_inactive($subcatid){
	     $this->db->set('subcat_status', '1');  
                    $this->db->where("subcat_id", $subcatid);
                    if($this->db->update("subcategory")){
                       return true;
                       } else{ return false; }
	}
public function cat_name_in_subcat($subcat_id){
    
          $this->db->select("cat_id");
          $this->db->where('subcat_id',$subcat_id);
          $qry =  $this->db->get('subcategory');
          if($qry->num_rows() > 0){
              $data = $qry->result();
             return $category_name = $this->single_cat_data($data[0]->cat_id);
          } else{ return false; }
}
  
   
   //expert function 
    
    public function expert_in_subcat($subcat_id){
        $this->db->select("*");
	    $this->db->from('expert_subcat_table');       
	    $this->db->join('expert','expert.expert_id=expert_subcat_table.expert_id');	   
	    $where = "expert.expert_status='1' and expert_subcat_table.expert_subcat_id='".$subcat_id."'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
    }
    public function table_last_id($table,$q_id){
        $this->db->select("*");
	    $this->db->from($table);       
	    $this->db->where('q_id',$q_id);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
    }
    public function table_detail_idwise($table,$q_id){
        $this->db->select("*");
	    $this->db->from($table);       
	    $this->db->where('q_id',$q_id);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
    }
    public function single_expert_row($expert_id){
        $this->db->select("*");
	    $this->db->from('expert');        
		$where = "expert_id='".$expert_id."' and expert_status='1'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	   // echo $this->db->last_query();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
    }
     public function expert_detail($catid){
	    $this->db->select("*");
	    $this->db->from('expert as exp');
	    $this->db->join('expert_subcat_table as subcat','subcat.expert_id=exp.expert_id');
	    //$where = 'exp.expert_status="1" or exp.expert_status="0"';
	   // $this->db->where($where);
	    $this->db->where('subcat.expert_cat_id',$catid);
	    $this->db->order_by("exp.expert_id",'DESC');
	    $qry = $this->db->get();
	    //echo $this->db->last_query();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	 public function delete_expert_row($expertid){
	      $this->db->where('expert_id', $id);
       if($this->db->delete('expert')){
           return true;
           }
	}
	 public function subadmin_delete2($adminid){
	      $this->db->where('admin_id', $adminid);
       if($this->db->delete('admin')){
           return true;
           }
	}
	 public function status_active_expert($id){
                    $this->db->set('expert_status', '1');  
                    $this->db->where("expert_id", $id);  
                    if($this->db->update("expert")){
                       return true;
                       } else{ return false; }
     }
     public function status_inactive_expert($id){
                    $this->db->set('expert_status', '0');  
                    $this->db->where("expert_id", $id);  
                    if($this->db->update("expert")){
                       return true;
                       } else{ return false; }
     }
     
     public function single_expert_data($id){
	    $this->db->select("*");
	    $this->db->from('expert');
	    $this->db->where('expert_id',$id);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	

  
   public function expert_data(){
	    $this->db->select("*");
	    $this->db->from('expert');
	    $this->db->where('expert_status','1');
	    $this->db->or_where('expert_status','0');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
	}
	
	public function expert_data_row_cat($catid){
	    $this->db->select("*");
	    $this->db->from('expert');
	    $this->db->join('expert_subcat_table as exsub','exsub.expert_id=expert.expert_id');
	    $where = '(expert.expert_status="1" or expert.expert_status="0")';
	    $this->db->where($where);
	    $this->db->where('exsub.expert_cat_id',$catid);
	    $this->db->order_by("expert.expert_id",'DESC');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
	}
 public function expert_delete($id){
      $this->db->where('expert_id', $id);
       if($this->db->delete('expert')){
           return true;
           }
       }
   	
	
  //question function
  public function question_login_user($data){
	  $useremail = $data['useremail'];
	  $userpass = $data['userpass'];
	  $this->db->select("*");
	  $this->db->from("user_detail");
	  $where = "useremail='".$useremail."' and userpass='".$userpass."'";
	  $this->db->where($where);
	  $qry = $this->db->get();
	  if($qry->num_rows() >0){
		 return  $qry->result();
	     } else{ return false; }
	  }
  public function insert_question($data){
	  if($this->db->insert("question_tbl",$data)){
	   // echo $this->db->last_query();
		  return true;
	  } else{ return false; }
  }
  public function last_table_id($table){
	  $this->db->select('*');
	  $this->db->from($table);
	  $this->db->order_by('qust_id','desc');
	  $this->db->limit('1');
	  $qry = $this->db->get();
	  if($qry->num_rows()>0){
		  return $qry->result();
	  } else{ return false; }
  }
  public function question_files_select($q_id){
	  $this->db->select("*");
	  $this->db->from("files_tbl");
	  $where = "question_id='".$q_id."'";
	  $this->db->where($where);
	  $qry = $this->db->get();
	  if($qry->num_rows() >0){
		  return $qry->result();
	  } else{ return false; }
  }
  public function question_files_select_group($qust_id){
	  $this->db->select("*");
	  $this->db->from("files_tbl");
	  $where = "qust_id='".$qust_id."'";
	  $this->db->where($where);
	  $qry = $this->db->get();
	  if($qry->num_rows() >0){
		  return $qry->result();
	  } else{ return false; }
  }
  public function last_answer_id(){
	  $this->db->select("ans_id");
	    $this->db->from('answer_tbl');
	    $this->db->order_by("ans_id", "DESC");
        $this->db->limit('1');
        $qry = $this->db->get();
        if($qry->num_rows() > 0){
         return $res =  $qry->result();
        } else { return false; } 
  }
  public function answer_files_select($ans_id){
	  $this->db->select("*");
	  $this->db->from("files_tbl");
	  $where = "answer_id='".$ans_id."'";
	  $this->db->where($where);
	  $qry = $this->db->get();
	  if($qry->num_rows() >0){
		  return $qry->result();
	  } else{ return false; }
  }
  public function insert_question_file($data){
	  if($this->db->insert("files_tbl",$data)){
		  return true;
	  } else{ return false; }
  }
  
  public function all_question(){
        $this->db->select("*");
	    $this->db->from('question_tbl');
		$where = "question_status='1' or question_status='0'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
  }
  public function total_question_incatwise($catid)
  {
       $this->db->select("qust_id");
	    $this->db->from('question_tbl');
	    $this->db->where('cat_id','$catid');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
  }
  
  public function inactiveexpert_catwise($catid){  
        $this->db->select("*");
	    $this->db->from('expert as exp');
	    $this->db->join('expert_subcat_table as subcat','subcat.expert_id=exp.expert_id');
	    $this->db->where('subcat.expert_cat_id',$catid);
	    $this->db->where('exp.expert_status','0');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $res = $qry->result();
	    } else{
	        return false;
	    }
  }
  
  //answer function
  
 public function all_answer(){
        $this->db->select("*");
	    $this->db->from('answer_tbl');
	    $this->db->where('answer_status','1');
	    $this->db->or_where('answer_status','0');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
  }
 //user_detail function
 	public function single_user_detail($userid){
	    $this->db->select("*");
	    $this->db->from('user_detail');
	    $this->db->where('user_id',$userid);
	    $qry = $this->db->get();
	   // echo $this->db->last_query();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
 public function user_delete($id){
      $this->db->where('user_id', $id);
       if($this->db->delete('user_detail')){
           return true;
           }
       }
   
 //text chat content
 
  public function question_send($data){
      $res =  $this->db->insert("question_tbl",$data);
	    if(!empty($res)){
	    return $res;
	    } else{ return false; }
  }

}
