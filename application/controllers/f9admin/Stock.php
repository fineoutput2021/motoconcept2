<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Stock extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }
    public function view_stock()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $this->db->select('*');
            $this->db->from('tbl_stock');
            //$this->db->where('id',$usr);
            $data['stock_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/stock/view_stock');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    public function add_stock()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/stock/add_stock');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    public function add_stock_data($t, $iw="")
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                // print_r($this->input->post());
                // exit;
                $this->form_validation->set_rules('link1', 'link1', 'required|xss_clean');
                $this->form_validation->set_rules('link2', 'link2', 'required|xss_clean');

                if ($this->form_validation->run()== true) {
                    $link1=$this->input->post('link1');
                    $link2=$this->input->post('link2');
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
	                        $image_upload_folder = FCPATH . "assets/uploads/stock/";
	                        if (!file_exists($image_upload_folder)) {
	                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
	                        }
	                        $new_file_name="stock".date("Ymdhms");
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

	                            $videoNAmePath = "assets/uploads/stock/".$new_file_name.$file_info['file_ext'];
	                            $file_info['new_name']=$videoNAmePath;
	                            // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
	                            //$nnnn=$file_info['file_name'];
	                            $nnnn=$videoNAmePath;
	                            // echo json_encode($file_info);
	                        }
	                    }

	                    $img2='fileToUpload2';


	                    $file_check=($_FILES['fileToUpload2']['error']);
	                    if ($file_check!=4) {
	                        $image_upload_folder = FCPATH . "assets/uploads/stock/";
	                        if (!file_exists($image_upload_folder)) {
	                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
	                        }
	                        $new_file_name="stock2".date("Ymdhms");
	                        $this->upload_config = array(
	                                                                                    'upload_path'   => $image_upload_folder,
	                                                                                    'file_name' => $new_file_name,
	                                                                                    'allowed_types' =>'jpg|jpeg|png',
	                                                                                    'max_size'      => 25000
	                                                                            );
	                        $this->upload->initialize($this->upload_config);
	                        if (!$this->upload->do_upload($img2)) {
	                            $upload_error = $this->upload->display_errors();
	                            // echo json_encode($upload_error);
															$this->session->set_flashdata('emessage',$upload_error);
									              redirect($_SERVER['HTTP_REFERER']);
	                        } else {
	                            $file_info = $this->upload->data();

	                            $videoNAmePath = "assets/uploads/stock/".$new_file_name.$file_info['file_ext'];
	                            $file_info['new_name']=$videoNAmePath;
	                            // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
	                            //$nnnn=$file_info['file_name'];
	                            $nnnn2=$videoNAmePath;
	                            // echo json_encode($file_info);
	                        }
	                    }

                        $data_insert = array(
                                          'image1'=>$nnnn,
                                          'image2'=>$nnnn2,
                                          'link1'=>$link1,
                                          'link2'=>$link2,
                                          'ip' =>$ip,
                                          'added_by' =>$addedby,
                                          'is_active' =>1,
                                          'date'=>$cur_date

                                          );





                        $last_id=$this->base_model->insert_table("tbl_stock", $data_insert, 1) ;
                    }
                    if ($typ==2) {
                        $idw=base64_decode($iw);

												$img1='fileToUpload1';

												if(!empty($_FILES['image']['name'])){

												$file_check=($_FILES['fileToUpload1']['error']);
												if ($file_check!=4) {
														$image_upload_folder = FCPATH . "assets/uploads/stock/";
														if (!file_exists($image_upload_folder)) {
																mkdir($image_upload_folder, DIR_WRITE_MODE, true);
														}
														$new_file_name="stock".date("Ymdhms");
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

																$videoNAmePath = "assets/uploads/stock/".$new_file_name.$file_info['file_ext'];
																$file_info['new_name']=$videoNAmePath;
																// $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
																//$nnnn=$file_info['file_name'];
																$nnnn=$videoNAmePath;
																// echo json_encode($file_info);
														}
												}
											}
												$img2='fileToUpload2';


												if(!empty($_FILES['image']['name'])){

												$file_check=($_FILES['fileToUpload2']['error']);
												if ($file_check!=4) {
														$image_upload_folder = FCPATH . "assets/uploads/stock/";
														if (!file_exists($image_upload_folder)) {
																mkdir($image_upload_folder, DIR_WRITE_MODE, true);
														}
														$new_file_name="stock2".date("Ymdhms");
														$this->upload_config = array(
																																												'upload_path'   => $image_upload_folder,
																																												'file_name' => $new_file_name,
																																												'allowed_types' =>'jpg|jpeg|png',
																																												'max_size'      => 25000
																																								);
														$this->upload->initialize($this->upload_config);
														if (!$this->upload->do_upload($img2)) {
																$upload_error = $this->upload->display_errors();
																// echo json_encode($upload_error);
																$this->session->set_flashdata('emessage',$upload_error);
																	redirect($_SERVER['HTTP_REFERER']);
														} else {
																$file_info = $this->upload->data();

																$videoNAmePath = "assets/uploads/stock/".$new_file_name.$file_info['file_ext'];
																$file_info['new_name']=$videoNAmePath;
																// $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
																//$nnnn=$file_info['file_name'];
																$nnnn2=$videoNAmePath;
																// echo json_encode($file_info);
														}
												}
											}
                        $this->db->select('*');
                        $this->db->from('tbl_stock');
                        $this->db->where('id', $idw);
                        $dsa= $this->db->get();
                        $da=$dsa->row();
                        if (!empty($nnnn)) {
                            $n1=$nnnn;
                        } else {
                            $n1=$da->image1;
                        }
                        if (!empty($nnnn2)) {
                            $n2=$nnnn2;
                        } else {
                            $n2=$da->image2;
                        }


                        $data_insert = array(
                                                                        'image1'=>$n1,
                                                                        'image2'=>$n2,
                                                                        'link1'=>$link1,
                                                                        'link2'=>$link2,


                                          );




                        $this->db->where('id', $idw);
                        $last_id=$this->db->update('tbl_stock', $data_insert);
                    }


                    if ($last_id!=0) {
                        $this->session->set_flashdata('smessage', 'Data inserted successfully');

                        redirect("dcadmin/Stock/view_stock", "refresh");
                    } else {
                        $this->session->set_flashdata('emessage', 'Sorry error occured');
                        redirect($_SERVER['HTTP_REFERER']);
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
    public function update_stock($idd)
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
            $this->db->from('tbl_stock');
            $this->db->where('id', $id);
            $data['data']= $this->db->get()->row();

            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/stock/update_stock');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    public function updatestockStatus($idd, $t)
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
                $zapak=$this->db->update('tbl_stock', $data_update);

                if ($zapak!=0) {
                    redirect("dcadmin/Stock/view_stock", "refresh");
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
                $zapak=$this->db->update('tbl_stock', $data_update);

                if ($zapak!=0) {
                    redirect("dcadmin/Stock/view_stock", "refresh");
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
    public function delete_stock($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $id=base64_decode($idd);

            if ($this->load->get_var('position')=="Super Admin") {
                $this->db->select('image1');
                $this->db->from('tbl_stock');
                $this->db->where('id', $id);
                $dsa= $this->db->get();
                $da=$dsa->row();
                $img=$da->image1;

                $zapak=$this->db->delete('tbl_stock', array('id' => $id));
                if ($zapak!=0) {
                    $path = FCPATH .$img;
                    unlink($path);
                    redirect("dcadmin/Stock/view_stock", "refresh");
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
}
