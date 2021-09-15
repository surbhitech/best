<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model {
 public function __Construct(){
      parent::__Construct();
 }
	public function user_detail(){
	    $this->db->select("*");
	    $this->db->from('user_detail');
	    $this->db->where('status','1');
	    $this->db->or_where('status','0');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function update_set_prodcast_subcat($data,$data2){
	    $this->db->where("expert_id",$data['expert_id']);
	    $this->db->where("expert_subcat_id",$data['subcat_id']);
		$res = $this->db->update("expert_subcat_table",$data2);
		if($res == true){
		    return true;
		} else{ return false; }          
	}
   public function delete_prod($id){
       $this->db->where('id',$id);
       if($this->db->delete("expert_prodcast")){
           return true;
       } else{ return false; }
   }
	public function prodcast_detail(){
	    $this->db->select("exp.expert_name,exp.expert_id,prod.prodcast_title,prod.image_link,subcat.subcat_name,prod.created_at,prod.status,prod.id,prod.set_status");
	    $this->db->from('expert_prodcast as prod');
	    $this->db->join('expert as exp','exp.expert_id=prod.expert_id');
	    $this->db->join('subcategory as subcat','prod.subcat_id=subcat.subcat_id');
	    $this->db->where('prod.status','1');
	    $this->db->order_by('prod.created_at','DESC');
	   // $this->db->where('exp.slider_status','1');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function prodcast_detail_by_id($p_id){
	    $this->db->select("*");
	    $this->db->from('expert_prodcast as prod');
	    $this->db->where('prod.status','1');
	    $this->db->where('prod.id',$p_id);
	   // $this->db->where('exp.slider_status','1');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function prodcast_insert($data){
	    if($this->db->insert("expert_prodcast",$data)){
	        return true;
	    } else{ return false; }
	}
	public function slider_detail(){
	    $this->db->select('exp.expert_name,exp.slider_status,exp.expert_image,exp.expert_mobile,exp.expert_id,exp_subcat.expert_subcat_id,sub.subcat_name as subcategory_name,cat.cat_name as category_name');
	    $this->db->from('expert as exp');
	    $this->db->join('expert_subcat_table as exp_subcat','exp_subcat.expert_id=exp.expert_id');
	    $this->db->join('subcategory as sub','sub.subcat_id=exp_subcat.expert_subcat_id');
	    $this->db->join('tbl_category as cat','cat.cat_id=sub.cat_id');
	    $this->db->where('exp.slider_status',1);
	    $this->db->where('exp_subcat.slider_status',1);
	    $this->db->group_by('exp.expert_id');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function slider_status_update($expert_id,$subcat_id){
	    $this->db->set('slider_status',0);
	    $this->db->where('expert_id',$expert_id);
	    $this->db->where('slider_status',1);
	    if($this->db->update('expert')){
	    $this->db->set('slider_status',0);
	    $this->db->where('expert_subcat_id',$subcat_id);
	    if($this->db->update('expert_subcat_table')) return true; else return false;
	    }
	}
	public function update_expert_data($data,$expert_id){
	    $this->db->where("expert_id",$expert_id);
		$res = $this->db->update("expert",$data);
		if($res == true){
		    return true;
		} else{ return false; }
	}
	public function podcast_update($data,$id){
	    $this->db->where("id",$id);
		$res = $this->db->update("expert_prodcast",$data);
		if($res == true){
		    return true;
		} else{ return false; }
	}
	public function email_template($email_for){
	   	$this->db->select("*");
	    $this->db->from('email_template');
	    $where = "status='Active' and email_for='".$email_for."'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function all_email_detail(){
		$this->db->select("*");
	    $this->db->from('email_template');
	    $this->db->where('status','Active');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function submit_form($table,$data){
		if($this->db->insert($table,$data)){
			return true;
		} else{ return false; }
	}
	public function single_expert_row($expert_id){
	    $this->db->select("*");
	    $this->db->from('expert');
	    $where = "expert_id='".$expert_id."'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    //echo $this->db->last_query();
	    if($qry->num_rows() >0){
	        return $qry->result();
	    } else{ return false; }
	}
	public function question_single_chat($cat_id){
		$this->db->select("qst.qust_id,qst.q_id,qst.question_text,qst.cat_id,qst.subcat_id,qst.user_id,
		                  qst.expert_id,qst.question_status,qst.payment_status,qst.advice_mode,
						  qst.question_datetime,qst.end_date,sub.subcat_name,qst.subadmin_id");
	    $this->db->from('question_tbl as qst');
		$this->db->join('subcategory as sub','sub.subcat_id=qst.subcat_id');
		$where = "qst.payment_status='1' and (qst.question_status='1' or qst.question_status='2') and qst.cat_id='".$cat_id."' and qst.advice_mode='Text' and qst.subadmin_id is not null";
	    $this->db->where($where);
	    $qry = $this->db->get();
		//echo $this->db->last_query();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function single_user_assign($qust_id){
		$this->db->select("qst.qust_id,qst.q_id,qst.question_text,qst.expert_id,qst.cat_id,qst.subcat_id,qst.user_id,
		                   qst.question_datetime,qst.question_status,
						   qst.payment_status,qst.advice_mode,
						   qst.end_date,usr.user_id,usr.username,usr.usermobile,
						   usr.user_image,sub.subcat_id,sub.subcat_name");
						   $this->db->from('question_tbl as qst');
						   $this->db->join('user_detail as usr','usr.user_id=qst.user_id');
						   $this->db->join('subcategory as sub','sub.subcat_id=qst.subcat_id');
						   $where = "qst.question_status='0' and qst.payment_status='1' and qst.expert_id='0'
						             and qst.qust_id='".$qust_id."'";
						   $qry = $this->db->where($where);
                           $qry = $this->db->get();

                           if($qry->num_rows() > 0){
	                       return $qry->result();
	                        } else{
	                        return false;
	                        }
	}

		public function single_user_assign2($qust_id){
		$this->db->select("qst.qust_id,qst.q_id,qst.question_text,qst.expert_id,qst.cat_id,qst.subcat_id,qst.user_id,
		                   qst.question_datetime,qst.question_status,
						   qst.payment_status,qst.advice_mode,
						   qst.end_date,usr.user_id,usr.username,usr.usermobile,
						   usr.user_image,sub.subcat_id,sub.subcat_name");
						   $this->db->from('question_tbl as qst');
						   $this->db->join('user_detail as usr','usr.user_id=qst.user_id');
						   $this->db->join('subcategory as sub','sub.subcat_id=qst.subcat_id');
						   $where = "qst.payment_status='1' and qst.qust_id='".$qust_id."'";
						   $qry = $this->db->where($where);
                           $qry = $this->db->get();
                        // echo $this->db->last_query();
                           if($qry->num_rows() > 0){
	                       return $qry->result();
	                        } else{
	                        return false;
	                        }
	}


	public function update_single_chat_assign($qust_id,$expert_id){
		$data['expert_id'] = $expert_id;
		$data['question_status'] ='1';
		$this->db->where('qust_id',$qust_id);
		if($this->db->update('question_tbl',$data)){
			return true;
		} else{ return false; }
	}
	public function article_update_image($data,$article_id){
		$this->db->where('article_id',$article_id);
		if($this->db->update("expert_article",$data)){
			return true;
		} else{ return false; }
	}
	public function reference_delete($data,$refer_id){
		$this->db->where('referance_id',$refer_id);
		if($this->db->update("expert_referance",$data)){
			return true;
		} else{ return false; }
	}
	public function expert_refer_detail($cat_id){
		 $this->db->select("*");
	    $this->db->from('expert_referance');
	    $this->db->join('expert','expert.expert_id=expert_referance.expert_id');
		$where = "expert_referance.cat_id='".$cat_id."' and expert_referance.status='1'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_subcat_id($expert_id){
		$this->db->select("subcategory.subcat_id,subcategory.subcat_name");
		$this->db->from("expert_subcat_table");
		$this->db->join("subcategory",'expert_subcat_table.expert_subcat_id=subcategory.subcat_id');
		$where = "expert_subcat_table.expert_id='".$expert_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() >0){
			return $qry->result();
		} else{ return false; }
	}
	public function expert_detailbyexp_id($expert_id){
		$this->db->select("*");
		$this->db->from("expert");
		$where = "expert.expert_id='".$expert_id."' and expert_status='1'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() >0){
			return $qry->result();
		} else{ return false; }
	}
	public function check_subcat_expert($expert_id){
		$this->db->select("*");
		$this->db->from("expert_subcat_table");
		$where = "expert_id='".$expert_id."' and expert_subcat_id !=''";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() >0){
			return $qry->num_rows();
		} else{ return false; }
	}
	public function image_subcat($subcat_id){
		$this->db->select("subcat_image_link,subcat_image_name");
		$this->db->from('subcategory');
		$this->db->where("subcat_id",$subcat_id);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
	public function expert_all_video($cat_id){
	    $this->db->select("*");
	    $this->db->from('expert_video');
		 $this->db->join('expert_subcat_table','expert_subcat_table.expert_subcat_id=expert_video.video_subcat_id');
	    $this->db->join('subcategory','expert_video.video_subcat_id=subcategory.subcat_id');
	    $this->db->join('expert','expert.expert_id=expert_video.expert_id');
		$where = "subcategory.cat_id='".$cat_id."'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function article_delete($article_id){
		$this->db->where('article_id',$article_id);
		if($this->db->delete('expert_article')){
			return true;
		} else{ return false; }
	}
	public function video_delete($video_id){
		$this->db->where('video_id',$video_id);
		if($this->db->delete('expert_video')){
			return true;
		} else{ return false; }
	}
	public function article_view_detail($article_id,$cat_id){
		$this->db->select("*");
		$this->db->from("expert_article");
		$this->db->join("expert_subcat_table",'expert_subcat_table.expert_subcat_id=expert_article.article_subcat_id');
		$this->db->join("subcategory",'expert_article.article_subcat_id=subcategory.subcat_id');
		$this->db->join('expert','expert.expert_id=expert_article.expert_id');
		$where ="subcategory.cat_id='".$cat_id."' and expert_article.article_id='".$article_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
	public function video_view_detail($video_id,$cat_id){
		$this->db->select("*");
		$this->db->from("expert_video");
		$this->db->join("expert_subcat_table",'expert_subcat_table.expert_subcat_id=expert_video.video_subcat_id');
		$this->db->join("subcategory",'expert_video.video_subcat_id=subcategory.subcat_id');
		$this->db->join('expert','expert.expert_id=expert_video.expert_id');
		$where ="subcategory.cat_id='".$cat_id."' and expert_video.video_id='".$video_id."'";
		$this->db->where($where);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->result();
		} else{ return false; }
	}
	public function all_expert_detail(){
		 $this->db->select("*");
	    $this->db->from('expert');
	    $this->db->join('expert_subcat_table','expert_subcat_table.expert_id=expert.expert_id');
		$this->db->group_by("expert.expert_id");
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_all_article($cat_id){
	    $this->db->select("*");
	    $this->db->from('expert_article');
	    $this->db->join('subcategory','expert_article.article_subcat_id=subcategory.subcat_id');
	    $this->db->join('expert','expert.expert_id=expert_article.expert_id');
		$where = "subcategory.cat_id='".$cat_id."'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){

	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function all_users(){
	    $this->db->select("*");
	    $this->db->from('user_detail');
	    $this->db->where('status','1');
	    $this->db->or_where('status','0');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
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

	public function category_detail_slider(){
        $this->db->select("*");
	    $this->db->from('tbl_category as tbl_cat');
	    $this->db->where('tbl_cat.status','1');
	    $this->db->order_by("tbl_cat.cat_id",'ASC');
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
	   // echo $this->db->last_query();
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
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function subcat_namesubcatidwise($subcat_id){
	    if($subcat_id != null){
	    $subcat_row = count($subcat_id);
	    for($i=0;$i<2;$i++){
	    $this->db->select("subcat_name");
	    $this->db->from('subcategory');
	    $this->db->where('subcat_id',$subcat_id[$i]);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	   }
	    } else{ return false; }
	}
	public function expert_academic_detail($exp_id){
	    $this->db->select("*");
	    $this->db->from('expert_academic');
	    $this->db->where('expert_id',$exp_id);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function expert_confrence_detail($exp_id){
	    $this->db->select("*");
	    $this->db->from('expert_conference');
	    $this->db->where('expert_id',$exp_id);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}

	public function expert_award_detail($exp_id){
	    $this->db->select("*");
	    $this->db->from('expert_award');
	    $this->db->where('expert_id',$exp_id);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
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

	public function expert_data_row($cat_id){
	    $this->db->select("expert_subcat_table.expert_id");
	    $this->db->from('expert_subcat_table');
	    $this->db->join('expert','expert.expert_id=expert_subcat_table.expert_id');
	    $this->db->where('expert_subcat_table.expert_cat_id',$cat_id);
	    $this->db->group_by('expert_subcat_table.expert_id');
	    $qry = $this->db->get();
	    //echo $this->db->last_query();
	    if($qry){
	        return $qry->num_rows();
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
     public function update_subcat($data){
                    $this->db->where('subcat_id', $data['subcat_id']);
                    $dbdata = array(
                      "subcat_name" => $data['subcat_name'],
                      "text_price"=> $data['text_price'],
	                  "duration_days_text"=>$data['text_duration_days'],
	                  "call_price"=>$data['call_price'],
	                  "duration_days_call"=>$data['call_duration_days'],
	                  "video_price"=>$data['video_price'],
					  "voice_price" =>$data['voice_price'],
	                  "duration_days_video"=>$data['video_duration_days'],
					  "duration_days_voice" => $data['duration_days_voice'],
	                  "subcat_box1" =>$data['subcat_box1'],
	                  "subcat_box2" => $data['subcat_box2'],
					  "subcat_box3" => $data['subcat_box3'],
	                  "subcat_status"=>$data['status'],
	                  "subcat_image_link"=>$data['subcat_image_link'],
	                  "subcat_image_name"=>$data['subcat_image_name']);
                    if($this->db->update("subcategory",$dbdata)){
                       return true;
                       } else{ return false; }
                }

    public function subadmin_update($data){
                    $this->db->where('admin_id', $data['admin_id']);
                    $dbdata = array(
                              "admin_cat_id" => $data['admin_cat_id'],
                              "admin_email" =>  $data['admin_email'],
                              "admin_name" => $data['admin_name'],
                              "admin_mobile" => $data['admin_mobile'],
                              "admin_status" => $data['admin_status'],
                              "admin_pass"=> $data['admin_pass'],
							  "email_address"=>$data['email_address']);
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

  public function subadmin_in_cat($cat_id){
         $this->db->select("admin.admin_name as expert_name,admin.admin_email as expert_email,admin.profile_image as expert_image");
	    $this->db->from('admin');
	    $where = "admin_cat_id='".$cat_id."' admin_status='1'";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
  }
  //suadmin function
  public function subcat_detail($catid){
	    $this->db->select("*");
	    $this->db->from('subcategory');
	    $where = '(subcat_status="1" or subcat_status="0")';
	    $this->db->where($where);
	    $this->db->where('cat_id',$catid);
	    $this->db->order_by("subcat_name",'ASC');
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
                    $this->db->where("admin_id", $adminid);
                    $this->db->where("admin_role", 'subadmin');
                    if($this->db->update("admin")){
                       return true;
                       } else{ return false; }
	}

 public function expert_data_row_subcat($subcat_id){
	    $this->db->select("*");
	    $this->db->from('expert_subcat_table');
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

   //expert function

     public function expert_detail($catid){
	    $this->db->select("*");
	    $this->db->from('expert');
	    $this->db->join('expert_subcat_table','expert.expert_id = expert_subcat_table.expert_id');
	    $where = "(expert_subcat_table.expert_cat_id ='".$catid."') and (expert_subcat_table.expert_subcat_id !='') and expert.expert_status='1' group by expert_subcat_table.expert_id";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	 public function expert_detail2($catid,$subcatid){
	    $this->db->select('exp.expert_name,exp.expert_id,exp.expert_mobile');
	    $this->db->from('expert as exp');
	    $this->db->join('expert_subcat_table as exp_subcat','exp_subcat.expert_id=exp.expert_id');
	    $this->db->join('expert_academic as exp_acd','exp.expert_id=exp_acd.expert_id');
	    $this->db->join('subcategory as sub','sub.subcat_id=exp_subcat.expert_subcat_id');
	    $this->db->join('tbl_category as cat','cat.cat_id=sub.cat_id');
	    $this->db->where('exp_subcat.expert_cat_id',$catid);
	    $this->db->where('exp_subcat.expert_subcat_id',$subcatid);
	    $this->db->where('exp.expert_status',1);
	    $this->db->group_by('exp_subcat.expert_id');
	    $this->db->order_by('exp.expert_name','ASC');
	   $qry = $this->db->get();
	  // echo $this->db->last_query(); die();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function prodcast_data_expert($expert_id,$subcat_id){
	    $this->db->select("prod.prodcast_title,prod.image_link,subcat.subcat_name,prod.file_link,prod.id,prod.slider_status");
	    $this->db->from('expert_prodcast as prod');
	    $this->db->join('expert as exp','exp.expert_id=prod.expert_id');
	    $this->db->join('subcategory as subcat','prod.subcat_id=subcat.subcat_id');
	    $this->db->where('prod.status','1');
	    $this->db->where('prod.expert_id',$expert_id);
	     $this->db->where('prod.subcat_id',$subcat_id);
	    $this->db->order_by('prod.created_at','DESC');
	   // $this->db->where('exp.slider_status','1');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }

	}
	 public function expert_detail_catwise($catid){
	    $this->db->select('exp.expert_name,exp.expert_id');
	    $this->db->from('expert as exp');
	    $this->db->join('expert_subcat_table as exp_subcat','exp_subcat.expert_id=exp.expert_id');
	    $this->db->join('expert_academic as exp_acd','exp.expert_id=exp_acd.expert_id');
	    $this->db->join('subcategory as sub','sub.subcat_id=exp_subcat.expert_subcat_id');
	    $this->db->join('tbl_category as cat','cat.cat_id=sub.cat_id');
	    $this->db->where('exp_subcat.expert_cat_id',$catid);
	    $this->db->where('exp.expert_status',1);
	    $this->db->group_by('exp_subcat.expert_id');
	    $this->db->order_by('exp.expert_name','ASC');
	   $qry = $this->db->get();
	  //echo $this->db->last_query(); die();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function subcat_load_using_expid($expert_id){
	    $this->db->select('exp_subcat.expert_subcat_id,sub.subcat_name');
	    $this->db->from('expert as exp');
	    $this->db->join('expert_subcat_table as exp_subcat','exp_subcat.expert_id=exp.expert_id');
	    $this->db->join('subcategory as sub','sub.subcat_id=exp_subcat.expert_subcat_id');
	    $this->db->where('exp.expert_id',$expert_id);
	    $this->db->where('exp.expert_status',1);
	    $this->db->group_by('exp_subcat.expert_subcat_id');
	    $this->db->order_by('exp.expert_name','ASC');
	    $qry = $this->db->get();
	  // echo $this->db->last_query(); die();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}


	 public function expert_detail3($expert_id,$catid){
	    $this->db->select("*");
	    $this->db->from('expert as exp');
	    $this->db->join('expert_subcat_table as subcat','exp.expert_id = subcat.expert_id');
	    $where = "subcat.expert_id ='".$expert_id."' and subcat.expert_cat_id ='".$catid."' group by subcat.expert_subcat_id";
	    $this->db->where($where);
	    $qry = $this->db->get();
	   // echo $this->db->last_query();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	public function email_template_detail($id){
	    $this->db->select("*");
	    $this->db->from('email_template');
	    $this->db->where('id',$id);
	    $qry  = $this->db->get();
	    if($qry->num_rows() >0){
	        return $data = $qry->result();
	    } else{ return false; }

	}
	public function submit_edit_form($data){

	     $this->db->where('id',$data['id']);
	    if($this->db->update('email_template',$data)){
	        return true;
	    } else{ return false; }
	}
	public function  update_set_prodcast_status($data){
	                    $this->db->set('set_status',$data['set_status']);
	           	        $this->db->where('id',$data['prod_id']);
	           	        if($this->db->update('expert_prodcast')){
	           	           // echo $this->db->last_query();
	           	            return true;
	           	        } else{ return false; }
	}
	public function update_slider_status($data){
	    $this->db->select("exp.expert_id");
	    $this->db->from('expert as exp');
	    $this->db->join('expert_subcat_table as subcat','exp.expert_id=subcat.expert_id');
	    $where="subcat.expert_cat_id='".$data['cat_id']."' and exp.slider_status='1'";
	    $this->db->where($where);
	    $this->db->group_by('subcat.expert_id');
	    $qry = $this->db->get();
	     if($qry->num_rows() > 0){
	           $data2 = $qry->result();
	           $this->db->set("slider_status",'0');
	           $this->db->where("expert_id",$data2[0]->expert_id);
	           	if($this->db->update('expert')){
	           	$this->db->set('slider_status',0);
	           	$this->db->where('expert_id',$data['expert_id']);
	           	if($this->db->update('expert_subcat_table')){
	           	   $this->db->set('slider_status',0);
	           	   $this->db->where('cat_id',$data['cat_id']);
	           	   $this->db->update('expert_prodcast');
	           	    }
	           	}
	    }
	   	$this->db->set("slider_status",1);
	    $this->db->where("expert_id",$data['expert_id']);
		if($this->db->update('expert')){
		            $this->db->set('slider_status',1);
	           	    $this->db->where('expert_subcat_id',$data['subcat_id']);
	           	    $this->db->where('expert_id',$data['expert_id']);
	           	    if($this->db->update('expert_subcat_table')){
	           	        //echo $this->db->last_query(); die();
	           	        $this->db->set('slider_status',1);
	           	        $this->db->where('id',$data['prod_id']);
	           	        $this->db->where('expert_id',$data['expert_id']);
	           	        $this->db->where('subcat_id',$data['subcat_id']);
	           	        $this->db->update('expert_prodcast');

	           	    }
		     //echo $this->db->last_query(); die();
		     return true;
			}else{ $res = false; }


	}
	public function expert_detail_slider($expert_id,$subcat_id){
	     $this->db->select("exp.slider_status,exp.expert_mobile,exp.expert_image");
	    $this->db->from('expert as exp');
	    $this->db->join('expert_subcat_table as sub','sub.expert_id=exp.expert_id');
	    $where = "exp.expert_id='".$expert_id."' and sub.expert_subcat_id='".$subcat_id."' and exp.expert_status='1'";
	    $this->db->where($where);
	    $this->db->group_by('exp.expert_id');
	    $qry = $this->db->get();
	    //echo $this->db->last_query(); die();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}

	public function expert_view_status_update($data,$view_status){
            if($view_status == 1){ $this->db->set('expert_view','1');
            $this->db->where('expert_id',$data['expert_id']);
            if($this->db->update('expert')){
				if($this->db->insert("set_expert",$data)){
					return true;
				}

			}else{ $res = false; }

 			}
	}
	public function set_expert_row($cat_id){
		$this->db->select('*');
		$this->db->from('set_expert');
		$this->db->where('expert_cat_id',$cat_id);
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
			return $qry->num_rows();
		}else{ return false; }
	}
	public function unset_expert_in_view($expert_id){
		$this->db->set("expert_view",'0');
		$this->db->where("expert_id",$expert_id);
		 if($this->db->update('expert')){
			     $this->db->where("expert_id",$expert_id);
				if($this->db->delete("set_expert")){
					return true;
				}
			}else{ $res = false; }
	}
	 public function delete_expert_row($expertid){
		  $data = array("expert_status"=>'3',"mobile_verify"=>'0');
	      $this->db->where('expert_id', $expertid);
          if($this->db->update('expert',$data)){
          $res = true;
          } else{ $res = false; }
		  if($res == true){
		   $where ="expert_id='".$expertid."'";
		   $this->db->where($where);
           if($this->db->delete('expert_subcat_table')){
               $this->db->where($where);
               $this->db->delete('question_tbl');
               $this->db->where($where);
               $this->db->delete("answer_tbl");
               $this->db->where($where);
               $this->db->delete('expert_academic');
           $res2 = true;
           } else{
			$res2 = false;
		   }
		  }
		  if($res == true || $res2 == true){
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
                        //echo $this->db->last_query(); die();
                       return true;
                       } else{ return false; }
     }
     public function status_active_expert_video($id){
                    $this->db->set('status', '1');
                    $this->db->where("video_id", $id);
                    if($this->db->update("expert_video")){
                       return true;
                       } else{ return false; }
     }
     public function status_active_expert_article($id){
                    $this->db->set('status', '1');
                    $this->db->where("article_id", $id);
                    if($this->db->update("expert_article")){
                       return true;
                       } else{ return false; }
     }
      public function status_inactive_expert_article($id){
                    $this->db->set('status', '0');
                    $this->db->where("article_id", $id);
                    if($this->db->update("expert_article")){
                       return true;
                       } else{ return false; }
     }
      public function status_inactive_expert_video($id){
                    $this->db->set('status', '0');
                    $this->db->where("video_id", $id);
                    if($this->db->update("expert_video")){
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

     public function single_expert_data($id,$cat_id=0){
	    $this->db->select("*");
	    $this->db->from('expert');
		$this->db->join('expert_subcat_table','expert.expert_id=expert_subcat_table.expert_id');
		if($cat_id>0){
		$where = "expert.expert_id='".$id."' and expert_subcat_table.expert_cat_id='".$cat_id."' and (expert.expert_status='0' or expert.expert_status='1')";
		} else{
		$where = "expert.expert_id='".$id."' and (expert.expert_status='0' or expert.expert_status='1')";
		}
	    $this->db->where($where);
	    $qry = $this->db->get();
	   // echo $this->db->last_query(); die();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
	 public function single_expert_data2($id,$cat_id=0){
	    $this->db->select("*");
	    $this->db->from('expert');
		$this->db->join('expert_subcat_table','expert.expert_id=expert_subcat_table.expert_id');
		if($cat_id>0){
		$where = "expert.expert_id='".$id."' and expert_subcat_table.expert_cat_id='".$cat_id."' and (expert.expert_status='0' or expert.expert_status='1')";
		} else{
		$where = "expert.expert_id='".$id."' and (expert.expert_status='0' or expert.expert_status='1')";
		}
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}

	public function expert_subcatcatid_and_expert_wise($cat_id,$expert_id){
	    $this->db->select("*");
	    $this->db->from('expert');
	    $this->db->join('expert_subcat_table','expert.expert_id=expert_subcat_table.expert_id');
	    $where = "expert_subcat_table.expert_id='".$expert_id."' and expert_subcat_table.expert_cat_id='".$cat_id."' order by expert.expert_id DESC";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	}
 public function expert_delete($expert_id){
      $this->db->where('expert_id', $expert_id);
       if($this->db->delete('expert')){
        $row1 = $this->expert_subcat_table_row($expert_id);
        $row2 = $this->expert_video_row($expert_id);
        $row3 = $this->expert_article_row($expert_id);
          if($row1>0){
        $del1 = $this->delete_subcat_table($expert_id);
      } else{
           if($row2>0){
         $del2 = $this->expert_video_delete($expert_id);
      } else{
          if($row3>0){
         $del3 = $this->expert_article_delete($expert_id);
          }
      }
      }
        return true;
           }
       }
       public function expert_subcat_table_row($expert_id){
           $this->db->select('expert_id');
           $this->db->where('expert_id',$expert_id);
           $qry = $this->db->get('expert_subcat');
           return $qry->num_rows();
       }
        public function expert_video_row($expert_id){
           $this->db->select('expert_id');
           $this->db->where('expert_id',$expert_id);
           $qry = $this->db->get('expert_video');
           return $qry->num_rows();
       }
        public function expert_article_row($expert_id){
           $this->db->select('expert_id');
           $this->db->where('expert_id',$expert_id);
           $qry = $this->db->get('expert_article');
           return $qry->num_rows();
       }

 public function delete_subcat_table($expert_id){
    $this->db->where('expert_id', $expert_id);
    if($this->db->delete('expert_subcat_table')){
           return true;
           }
}
public function expert_video_delete($expert_id){
    $this->db->where('expert_id', $expert_id);
    if($this->db->delete('expert_video')){
           return true;
           }
}
public function expert_article_delete($expert_id){
    $this->db->where('expert_id', $expert_id);
    if($this->db->delete('expert_article')){
           return true;
           }
}


  //question function
  public function all_question(){
        $this->db->select("*");
	    $this->db->from('question_tbl');
	    $this->db->where('question_status','1');
	    $this->db->or_where('question_status','0');
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
	    $this->db->where('cat_id',$catid);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
  }

  public function inactiveexpert_catwise($catid){
        $this->db->select("*");
	    $this->db->from('expert');
	    $this->db->join("expert_subcat_table","expert.expert_id=expert_subcat_table.expert_id");
	    $where = "expert_subcat_table.expert_cat_id='".$catid."' and expert.expert_status='0' group by expert.expert_id";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $res = $qry->result();
	    } else{
	        return false;
	    }
  }

//user_detail function

 	   public function accountadmin_detail(){
		$this->db->select("*");
	    $this->db->from('admin');
	    $this->db->where('admin_role','Account');
	    $this->db->order_by("admin_id",'DESC');
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result();
	    } else{
	        return false;
	    }
	   }



}
