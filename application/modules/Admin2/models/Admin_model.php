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
		$where = "expert.expert_id='".$expert_id."'";
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
	public function expert_detailbyid($id){
		 $this->db->select("*");
	    $this->db->from('expert');
	    $this->db->join('expert_subcat_table','expert_subcat_table.expert_id=expert.expert_id');
		$where = 'expert.expert_id="'.$id.'"';
		$this->db->where($where);
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
	public function subadmin_detail(){
	    $this->db->select("*");
	    $this->db->from('admin');
	    $this->db->where('admin_role','subadmin');
	    $this->db->order_by("admin_id",'DESC');
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
	public function single_subcat_data($subcat_id){
	    $this->db->select("*");
	    $this->db->from('subcategory');
	    $this->db->where('subcat_id',$subcat_id);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->result_array();
	    } else{
	        return false;
	    }
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
   
	public function subcat_data_row($cat_id){
	    $this->db->select("*");
	    $this->db->from('subcategory');
	    $this->db->where('cat_id',$cat_id);
	    $qry = $this->db->get();
	    if($qry){
	        return $qry->num_rows();
	    } else{
	        return false;
	    }
	}
	public function expert_data_row($cat_id){
	    $this->db->select("expert_subcat_table.expert_id");
	    $this->db->from('expert_subcat_table');
	    $this->db->join('expert','expert.expert_id=expert_subcat_table.expert_id');
	    $this->db->where('expert_subcat_table.expert_cat_id',$cat_id);
	    $this->db->group_by('expert_subcat_table.expert_id');
	    $qry = $this->db->get();
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
	    $where = "(expert_subcat_table.expert_cat_id ='".$catid."') and (expert_subcat_table.expert_subcat_id !='') and (expert.expert_status='0' or expert.expert_status='1') group by expert_subcat_table.expert_id";
	    $this->db->where($where);
	    $qry = $this->db->get();
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
     
     public function single_expert_data($id,$cat_id){
	    $this->db->select("*");
	    $this->db->from('expert');
		$this->db->join('expert_subcat_table','expert.expert_id=expert_subcat_table.expert_id');
		$where = "expert.expert_id='".$id."' and expert_subcat_table.expert_cat_id='".$cat_id."' and (expert.expert_status='0' or expert.expert_status='1')";
	    $this->db->where($where);
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
	public function expert_data_row_cat($catid){
	    $this->db->select("expert_id");
	    $this->db->from('expert_subcat_table');
	    $where = "expert_subcat_table.expert_cat_id='".$catid."' and expert_subcat_table.expert_subcat_id !='' group by expert_subcat_table.expert_id";
	    $this->db->where($where);
	    $qry = $this->db->get();
	    if($qry->num_rows() > 0){
	        return $qry->num_rows();
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
  
  //answer function
  
 public function all_answer(){
        $this->db->select("*");
	    $this->db->from('answer_tbl');
		$where = "answer_status='1' or answer_status='0'";
	    $this->db->where($where);
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
