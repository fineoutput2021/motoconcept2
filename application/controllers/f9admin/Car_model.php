<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
       require_once(APPPATH . 'core/CI_finecontrol.php');
       class Car_model extends CI_finecontrol{
       function __construct()
           {
             parent::__construct();
             $this->load->model("login_model");
             $this->load->model("admin/base_model");
             $this->load->library('user_agent');
             $this->load->library('upload');
           }

         public function view_car_model($idd){

            if(!empty($this->session->userdata('admin_data'))){


              $data['user_name']=$this->load->get_var('user_name');

              // echo SITE_NAME;
              // echo $this->session->userdata('image');
              // echo $this->session->userdata('position');
              // exit;
               $id=base64_decode($idd);
              $data['id']=$idd;

                           $this->db->select('*');
               $this->db->from('tbl_car_model');
               $this->db->where('brand_id',$id);
               $data['car_model_data']= $this->db->get();

              $this->load->view('admin/common/header_view',$data);
              $this->load->view('admin/car_model/view_car_model');
              $this->load->view('admin/common/footer_view');

          }
          else{

             redirect("login/admin_login","refresh");
          }

          }

              public function add_car_model($id){

                 if(!empty($this->session->userdata('admin_data'))){
                    // $id=base64_decode($id);
                   $data['id']=$id;

                   $this->load->view('admin/common/header_view',$data);
                   $this->load->view('admin/car_model/add_car_model');
                   $this->load->view('admin/common/footer_view');

               }
               else{

                  redirect("login/admin_login","refresh");
               }

               }

               public function update_car_model($idd){

                   if(!empty($this->session->userdata('admin_data'))){


                     $data['user_name']=$this->load->get_var('user_name');

                     // echo SITE_NAME;
                     // echo $this->session->userdata('image');
                     // echo $this->session->userdata('position');
                     // exit;

                      $id=base64_decode($idd);
                     $data['id']=$idd;

                            $this->db->select('*');
                            $this->db->from('tbl_car_model');
                            $this->db->where('id',$id);
                            $data['car_model_data']= $this->db->get()->row();


                     $this->load->view('admin/common/header_view',$data);
                     $this->load->view('admin/car_model/update_car_model');
                     $this->load->view('admin/common/footer_view');

                 }
                 else{

                    redirect("login/admin_login","refresh");
                 }

                 }

             public function add_car_model_data($t,$iw="")

               {

                 if(!empty($this->session->userdata('admin_data'))){


             $this->load->helper(array('form', 'url'));
             $this->load->library('form_validation');
             $this->load->helper('security');
             if($this->input->post())
             {
               // print_r($this->input->post());
               // exit;
  $this->form_validation->set_rules('brand_id', 'brand_id');
  $this->form_validation->set_rules('name', 'name', 'required');





               if($this->form_validation->run()== TRUE)
               {
  $brand_id=$this->input->post('brand_id');
  $name=$this->input->post('name');

                   $ip = $this->input->ip_address();
                   date_default_timezone_set("Asia/Calcutta");
                   $cur_date=date("Y-m-d H:i:s");
                   $addedby=$this->session->userdata('admin_id');

           $typ=base64_decode($t);
           $last_id = 0;
           if($typ==1){



           $data_insert = array(
                  'brand_id'=>base64_decode($brand_id),
  'name'=>$name,

                     'ip' =>$ip,
                     'added_by' =>$addedby,
                     'is_active' =>1,
                     'date'=>$cur_date
                     );


           $last_id=$this->base_model->insert_table("tbl_car_model",$data_insert,1) ;
           $this->db->select('*');
           $this->db->from('tbl_car_model');
           $this->db->where('id',$last_id);
           $dsa=$this->db->get();
           $da=$dsa->row();
           }
           if($typ==2){

    $idw=base64_decode($iw);


 $this->db->select('*');
 $this->db->from('tbl_car_model');
 $this->db->where('id',$idw);
 $dsa=$this->db->get();
 $da=$dsa->row();





           $data_insert = array(
  'name'=>$name,

                     );
             $this->db->where('id', $idw);
             $last_id=$this->db->update('tbl_car_model', $data_insert);
           }
           // echo base64_encode($da->brand_id);die();
                       if($last_id!=0){
                               $this->session->set_flashdata('smessage','Data inserted successfully');
                               redirect("dcadmin/Car_model/view_car_model/".base64_encode($da->brand_id),"refresh");
                              }
                               else
                                   {

                                    $this->session->set_flashdata('emessage','Sorry error occured');
                                    redirect($_SERVER['HTTP_REFERER']);
                                  }
               }
             else{

        $this->session->set_flashdata('emessage',validation_errors());
      redirect($_SERVER['HTTP_REFERER']);

             }

             }
           else{

 $this->session->set_flashdata('emessage','Please insert some data, No data available');
      redirect($_SERVER['HTTP_REFERER']);

           }
           }
           else{

       redirect("login/admin_login","refresh");


           }

           }

               public function updatecar_modelStatus($idd,$t){

                        if(!empty($this->session->userdata('admin_data'))){


                          $data['user_name']=$this->load->get_var('user_name');

                          // echo SITE_NAME;
                          // echo $this->session->userdata('image');
                          // echo $this->session->userdata('position');
                          // exit;
                          $id=base64_decode($idd);

                          $this->db->from('tbl_car_model');
                          $this->db->where('id',$id);
                          $dsa= $this->db->get();
                          $da=$dsa->row();

                          if($t=="active"){

                            $data_update = array(
                        'is_active'=>1

                        );

                        $this->db->where('id', $id);
                       $zapak=$this->db->update('tbl_car_model', $data_update);

                            if($zapak!=0){
                            redirect("dcadmin/Car_model/view_car_model/".base64_encode($da->brand_id),"refresh");
                                    }
                                    else
                                    {
        $this->session->set_flashdata('emessage','Sorry error occured');
          redirect($_SERVER['HTTP_REFERER']);
                                    }
                          }
                          if($t=="inactive"){
                            $data_update = array(
                         'is_active'=>0

                         );

                         $this->db->where('id', $id);
                         $zapak=$this->db->update('tbl_car_model', $data_update);

                             if($zapak!=0){
                             redirect("dcadmin/Car_model/view_car_model/".base64_encode($da->brand_id),"refresh");
                                     }
                                     else
                                     {

                $this->session->set_flashdata('emessage','Sorry error occured');
                  redirect($_SERVER['HTTP_REFERER']);
                                     }
                          }



                      }
                      else{

                         redirect("login/admin_login","refresh");

                      }

                      }



               public function delete_car_model($idd){

                      if(!empty($this->session->userdata('admin_data'))){

                        $data['user_name']=$this->load->get_var('user_name');

                        // echo SITE_NAME;
                        // echo $this->session->userdata('image');
                        // echo $this->session->userdata('position');
                        // exit;
                        $id=base64_decode($idd);

                       if($this->load->get_var('position')=="Super Admin"){

                     $this->db->from('tbl_car_model');
                     $this->db->where('id',$id);
                     $dsa= $this->db->get();
                     $da=$dsa->row();

 $zapak=$this->db->delete('tbl_car_model', array('id' => $id));
 if($zapak!=0){
                redirect("dcadmin/Car_model/view_car_model/".base64_encode($da->brand_id),"refresh");
                }
                else
                {
                   $this->session->set_flashdata('emessage','Sorry error occured');
                   redirect($_SERVER['HTTP_REFERER']);
                }
            }
            else{
             $this->session->set_flashdata('emessage','Sorry you not a super admin you dont have permission to delete anything');
               redirect($_SERVER['HTTP_REFERER']);
            }


                            }
                            else{

                        redirect("login/admin_login","refresh");

                            }

                            }
                      }

      ?>
