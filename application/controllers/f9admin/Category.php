<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Category extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }


    public function view_category()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;

            $this->db->select('*');
            $this->db->from('tbl_category');
            //$this->db->where('id',$usr);
            $data['category_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/category/view_category');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }








    public function add_category()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/category/add_category');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function add_category_data($t, $iw="")
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('category', 'category', 'required|xss_clean|trim|customAlpha');

                if ($this->form_validation->run()== true) {
                    $category=$this->input->post('category');

                    // Load library
                    $this->load->library('upload');

                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date=date("Y-m-d H:i:s");

                    $addedby=$this->session->userdata('admin_id');

                    $typ=base64_decode($t);
                    if ($typ==1) {
                      $img1='fileToUpload1';

                      $file_check=($_FILES['fileToUpload1']['error']);
                      if ($file_check!=4) {
                          $image_upload_folder = FCPATH . "assets/uploads/category/";
                          if (!file_exists($image_upload_folder)) {
                              mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                          }
                          $new_file_name="category".date("Ymdhms");
                          $this->upload_config = array(
                                                              'upload_path'   => $image_upload_folder,
                                                              'file_name' => $new_file_name,
                                                              'allowed_types' =>'jpg|jpeg|png',
                                                              'max_size'      => 25000
                                                      );
                          $this->upload->initialize($this->upload_config);
                          if (!$this->upload->do_upload($img1)) {
                              $upload_error = $this->upload->display_errors();
                              // echo json_encode($upload_error);

                                         $this->session->set_flashdata('emessage',$upload_error);
                                           redirect($_SERVER['HTTP_REFERER']);
                          } else {
                              $file_info = $this->upload->data();

                              $videoNAmePath = "assets/uploads/category/".$new_file_name.$file_info['file_ext'];
                              $file_info['new_name']=$videoNAmePath;
                              // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                              //$nnnn=$file_info['file_name'];
                              $nnnn2=$videoNAmePath;
                              // echo json_encode($file_info);
                          }
                      }
                      $img2='fileToUpload2';

                      $file_check2=($_FILES['fileToUpload2']['error']);
                      if ($file_check2!=4) {
                          $image_upload_folder2 = FCPATH . "assets/uploads/category/";
                          if (!file_exists($image_upload_folder2)) {
                              mkdir($image_upload_folder2, DIR_WRITE_MODE, true);
                          }
                          $new_file_name2="category2".date("Ymdhms");
                          $this->upload_config = array(
                                                      'upload_path'   => $image_upload_folder2,
                                                      'file_name' => $new_file_name2,
                                                      'allowed_types' =>'jpg|jpeg|png',
                                                      'max_size'      => 25000
                                              );
                          $this->upload->initialize($this->upload_config);
                          if (!$this->upload->do_upload($img2)) {
                              $upload_error2 = $this->upload->display_errors();
                              // echo json_encode($upload_error);
                              echo $upload_error2;
                                         $this->session->set_flashdata('emessage',$upload_error);
                                           redirect($_SERVER['HTTP_REFERER']);
                          } else {
                              $file_info2 = $this->upload->data();

                              $videoNAmePath2= "assets/uploads/category/".$new_file_name2.$file_info2['file_ext'];
                              $file_info2['new_name']=$videoNAmePath2;
                              // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                              //$nnnn5=$file_info2['file_name'];
                              $nnnn3=$videoNAmePath2;
                              // echo json_encode($file_info);
                          }
                      }
                        $data_insert = array('category'=>$category,
                    'image'=>$nnnn3,
                                        'image2'=>$nnnn2,
                    'added_by' =>$addedby,
                    'is_active' =>1,
                    'date'=>$cur_date
                    );





                        $last_id=$this->base_model->insert_table("tbl_category", $data_insert, 1) ;
												if ($last_id!=0) {
		                        $this->session->set_flashdata('smessage', 'Category inserted successfully');
		                        redirect("dcadmin/Category/view_category", "refresh");
		                    } else {
		                        $this->session->set_flashdata('emessage', 'Sorry error occured');
		                        redirect($_SERVER['HTTP_REFERER']);
		                    }
                    }
                    if ($typ==2) {
                        $idw=base64_decode($iw);

                        $img1='fileToUpload1';
                        if(!empty($_FILES['fileToUpload1']['name'])){

                        $file_check=($_FILES['fileToUpload1']['error']);
                        if ($file_check!=4) {
                            $image_upload_folder = FCPATH . "assets/uploads/category/";
                            if (!file_exists($image_upload_folder)) {
                                mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                            }
                            $new_file_name="category".date("Ymdhms");
                            $this->upload_config = array(
                                                                'upload_path'   => $image_upload_folder,
                                                                'file_name' => $new_file_name,
                                                                'allowed_types' =>'jpg|jpeg|png',
                                                                'max_size'      => 25000
                                                        );
                            $this->upload->initialize($this->upload_config);
                            if (!$this->upload->do_upload($img1)) {
                                $upload_error = $this->upload->display_errors();
                                // echo json_encode($upload_error);

                                           $this->session->set_flashdata('emessage',$upload_error);
                                             redirect($_SERVER['HTTP_REFERER']);
                            } else {
                                $file_info = $this->upload->data();

                                $videoNAmePath = "assets/uploads/category/".$new_file_name.$file_info['file_ext'];
                                $file_info['new_name']=$videoNAmePath;
                                // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                                //$nnnn=$file_info['file_name'];
                                $nnnn2=$videoNAmePath;
                                // echo json_encode($file_info);
                            }
                        }
                      }
                        $img2='fileToUpload2';
                        if(!empty($_FILES['fileToUpload2']['name'])){

                        $file_check2=($_FILES['fileToUpload2']['error']);
                        if ($file_check2!=4) {
                            $image_upload_folder2 = FCPATH . "assets/uploads/category/";
                            if (!file_exists($image_upload_folder2)) {
                                mkdir($image_upload_folder2, DIR_WRITE_MODE, true);
                            }
                            $new_file_name2="category2".date("Ymdhms");
                            $this->upload_config = array(
                                                        'upload_path'   => $image_upload_folder2,
                                                        'file_name' => $new_file_name2,
                                                        'allowed_types' =>'jpg|jpeg|png',
                                                        'max_size'      => 25000
                                                );
                            $this->upload->initialize($this->upload_config);
                            if (!$this->upload->do_upload($img2)) {
                                $upload_error2 = $this->upload->display_errors();
                                // echo json_encode($upload_error);
                                echo $upload_error2;
                                           $this->session->set_flashdata('emessage',$upload_error);
                                             redirect($_SERVER['HTTP_REFERER']);
                            } else {
                                $file_info2 = $this->upload->data();

                                $videoNAmePath2= "assets/uploads/category/".$new_file_name2.$file_info2['file_ext'];
                                $file_info2['new_name']=$videoNAmePath2;
                                // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                                //$nnnn5=$file_info2['file_name'];
                                $nnnn3=$videoNAmePath2;
                                // echo json_encode($file_info);
                            }
                        }
                      }
                        $this->db->select('*');
                        $this->db->from('tbl_category');
                        $this->db->where('id', $idw);
                        $dsa= $this->db->get();
                        $da=$dsa->row();

                        if (!empty($nnnn3)) {
                            $n1=$nnnn3;
                        } else {
                            $n1=$da->image;
                        }

                        if (!empty($nnnn2)) {
                            $n2=$nnnn2;
                        } else {
                            $n2=$da->image2;
                        }

                        $data_insert = array('category'=>$category,
                    'image'=>$n1,
                                        'image2'=>$n2,
                    );




                        $this->db->where('id', $idw);
                        $last_id=$this->db->update('tbl_category', $data_insert);
												if ($last_id!=0) {
		                        $this->session->set_flashdata('smessage', 'Category updated successfully');

		                        redirect("dcadmin/Category/view_category", "refresh");
		                    } else {
		                        $this->session->set_flashdata('emessage', 'Sorry error occured');
		                        redirect($_SERVER['HTTP_REFERER']);
		                    }
                    }



                } else {
                    $this->session->set_flashdata('emessage', validation_errors());
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect("login/admin_login", "refresh");
        }
    }




    public function update_category($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;

            $id=base64_decode($idd);
            $data['id']=$idd;

            $this->db->select('*');
            $this->db->from('tbl_category');
            $this->db->where('id', $id);
            $dsa= $this->db->get();
            $data['category']=$dsa->row();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/category/update_category');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function delete_category($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $id=base64_decode($idd);

            if ($this->load->get_var('position')=="Super Admin") {

                $this->db->select('*');
                $this->db->from('tbl_products');
                $this->db->where('category_id', $id);
                $pro_data= $this->db->get();
                foreach($pro_data->result() as $pro){
                  $this->db->select('*');
                  $this->db->from('tbl_cart');
                  $this->db->where('product_id', $pro->id);
                  $cart_data = $this->db->get()->row();
                  $zapak=$this->db->delete('tbl_cart', array('product_id' => $cart_data->id));
                  $zapak=$this->db->delete('tbl_wishlist', array('product_id' => $cart_data->id));

                }
                $zapak1=$this->db->delete('tbl_products', array('category_id' => $id));
                $zapak=$this->db->delete('tbl_subcategory', array('category_id' => $id));
                $zapak2=$this->db->delete('tbl_category', array('id' => $id));
                if ($zapak!=0) {
									$this->session->set_flashdata('smessage', 'Category deleted successfully');

                    redirect("dcadmin/Category/view_category", "refresh");
                } else {
                    echo "Error";
                    exit;
                }
            } else {
                $data['e']="Sorry You Don't Have Permission To Delete Anything.";
                // exit;
                $this->load->view('errors/error500admin', $data);
            }
        } else {
            $this->load->view('admin/login/index');
        }
    }



    public function updatecategoryStatus($idd, $t)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $id=base64_decode($idd);

            if ($t=="active") {
                $data_update = array(
         'is_active'=>1

         );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_category', $data_update);

                if ($zapak!=0) {
									$this->session->set_flashdata('smessage', 'Category status updated successfully');

                    redirect("dcadmin/Category/view_category", "refresh");
                } else {
                    echo "Error";
                    exit;
                }
            }
            if ($t=="inactive") {
                $data_update = array(
          'is_active'=>0

          );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_category', $data_update);

                if ($zapak!=0) {
									$this->session->set_flashdata('smessage', 'Category status updated successfully');

                    redirect("dcadmin/Category/view_category", "refresh");
                } else {
                    $data['e']="Error Occured";
                    // exit;
                    $this->load->view('errors/error500admin', $data);
                }
            }
        } else {
            $this->load->view('admin/login/index');
        }
    }
}
