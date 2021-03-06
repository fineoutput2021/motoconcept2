<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Slider extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }


    public function view_slider()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;

            $this->db->select('*');
            $this->db->from('tbl_slider');
            //$this->db->where('id',$usr);
            $data['slider_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/slider/view_slider');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function add_slider()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/slider/add_slider');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function add_slider_data($t, $iw="")
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            // if ($this->input->post()) {
                // $this->form_validation->set_rules('title', 'title', 'required|xss_clean|trim');

                // if ($this->form_validation->run()== true) {
                    // $title=$this->input->post('title');

                    // Load library
                    $this->load->library('upload');

                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date=date("Y-m-d H:i:s");

                    $addedby=$this->session->userdata('admin_id');

                    $typ=base64_decode($t);
                    if ($typ==1) {
                        $img1='slider_image';

                        $file_check=($_FILES['slider_image']['error']);
                        if ($file_check!=4) {
                            $image_upload_folder = FCPATH . "assets/uploads/slider/";
                            if (!file_exists($image_upload_folder)) {
                                mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                            }
                            $new_file_name="slider".date("Ymdhms");
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
                                $this->session->set_flashdata('emessage', $upload_error);
                                redirect($_SERVER['HTTP_REFERER']);
                            } else {
                                $file_info = $this->upload->data();

                                $image = "assets/uploads/slider/".$new_file_name.$file_info['file_ext'];
                                $nnn=$image;
                                // echo json_encode($file_info);
                            }
                        }


                        $data_insert = array(
                          // 'title'=>$title,
                    'slider_image'=>$image,
                    // 'app_image'=>$image2,
                    'added_by' =>$addedby,
                    'is_active' =>1,
                    'date'=>$cur_date
                    );





                        $last_id=$this->base_model->insert_table("tbl_slider", $data_insert, 1) ;
                        if ($last_id!=0) {
                            $this->session->set_flashdata('smessage', 'Slider inserted successfully');

                            redirect("dcadmin/Slider/view_slider", "refresh");
                        } else {
                            $this->session->set_flashdata('emessage', 'Sorry error occured');
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    }
                    if ($typ==2) {
                        $idw=base64_decode($iw);


                        $img1='slider_image';

                        if (!empty($_FILES['slider_image']['name'])) {
                            $file_check=($_FILES['slider_image']['error']);
                            if ($file_check!=4) {
                                $image_upload_folder = FCPATH . "assets/uploads/slider/";
                                if (!file_exists($image_upload_folder)) {
                                    mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                                }
                                $new_file_name="slider".date("Ymdhms");
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
                                    $this->session->set_flashdata('emessage', $upload_error);
                                    redirect($_SERVER['HTTP_REFERER']);
                                } else {
                                    $file_info = $this->upload->data();

                                    $image = "assets/uploads/slider/".$new_file_name.$file_info['file_ext'];
                                    $nnn=$image;
                                    // echo json_encode($file_info);
                                }
                            }
                        }

                        $this->db->select('*');
                        $this->db->from('tbl_slider');
                        $this->db->where('id', $idw);
                        $data= $this->db->get()->row();

                        if (!empty($nnn)) {
                            $d1=$nnn;
                        } else {
                            $d1=$data->slider_image;
                        }



                        $data_insert = array(
                          // 'title'=>$title,
          'slider_image'=>$d1,
          // 'app_image'=>$d2,
          );


                        $this->db->where('id', $idw);
                        $last_id=$this->db->update('tbl_slider', $data_insert);
                        if ($last_id!=0) {
                            $this->session->set_flashdata('smessage', 'Slider updated successfully');

                            redirect("dcadmin/Slider/view_slider", "refresh");
                        } else {
                            $this->session->set_flashdata('emessage', 'Sorry error occured');
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    }
            //     } else {
            //         $this->session->set_flashdata('emessage', validation_errors());
            //         redirect($_SERVER['HTTP_REFERER']);
            //     }
            // } else {
            //     $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
            //     redirect($_SERVER['HTTP_REFERER']);
            // }
        } else {
            redirect("login/admin_login", "refresh");
        }
    }


    public function update_slider($idd)
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
            $this->db->from('tbl_slider');
            $this->db->where('id', $id);
            $dsa= $this->db->get();
            $data['slider']=$dsa->row();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/slider/update_slider');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function delete_slider($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $id=base64_decode($idd);

            if ($this->load->get_var('position')=="Super Admin") {
                $zapak=$this->db->delete('tbl_slider', array('id' => $id));
                if ($zapak!=0) {
                    $this->session->set_flashdata('smessage', 'Slider Deleted successfully');
                    redirect($_SERVER['HTTP_REFERER']);
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

    public function updatesliderStatus($idd, $t)
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
                $zapak=$this->db->update('tbl_slider', $data_update);

                if ($zapak!=0) {
                    $this->session->set_flashdata('smessage', 'Slider status Updated successfully');
                    redirect($_SERVER['HTTP_REFERER']);
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
                $zapak=$this->db->update('tbl_slider', $data_update);

                if ($zapak!=0) {
                    $this->session->set_flashdata('smessage', 'Slider status Updated successfully');
                    redirect($_SERVER['HTTP_REFERER']);
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
