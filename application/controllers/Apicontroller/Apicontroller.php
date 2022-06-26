<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Apicontroller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/login_model");
        $this->load->model("admin/base_model");
    }


    // ==================================== Home Components =========================================================


    //.Slider


    // ===============  Slider =============

    public function get_slider()
    {
        $this->db->select('*');
        $this->db->from('tbl_slider');
        $this->db->where('is_active', 1);
        $sliderdata= $this->db->get();
        $slider=[];
        foreach ($sliderdata->result() as $data) {
            $slider[] = array(
'name'=> $data->title,
'image'=> base_url().$data->slider_image,
'app_image'=> base_url().$data->app_image
);
        }
        header('Access-Control-Allow-Origin: *');
        $res = array('message'=>"success",
'status'=>200,
'data'=>$slider
);

        echo json_encode($res);
    }


    // ========  Category =========

    public function get_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('is_active', 1);
        $categorydata= $this->db->get();
        $category=[];
        foreach ($categorydata->result() as $data) {
            $category[] = array(
'categoryname'=> $data->category

);
        }
        header('Access-Control-Allow-Origin: *');
        $res = array('message'=>"success",
'status'=>200,
'data'=>$category
);

        echo json_encode($res);
    }

    //=============  subcategory ================

    public function get_subcategory()
    {
        $this->db->select('*');
        $this->db->from('tbl_subcategory');
        $this->db->where('category_id', $id);
        $this->db->where('is_active', 1);
        $subcategorydata= $this->db->get();
        $subcategory=[];
        foreach ($subcategorydata->result() as $data) {
            $subcategory[] = array(
'subcategory'=> $data->subcategory,


);
        }
        header('Access-Control-Allow-Origin: *');
        $res = array('message'=>"success",
'status'=>200,
'data'=>$subcategory
);

        echo json_encode($res);
    }


    //  ========== Product Api minorcategory =============

    public function get_minorcategory_products()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            // print_r($this->input->post());
            // exit;
            // $this->form_validation->set_rules('category_id', 'category_id', 'required|xss_clean|trim');
            // $this->form_validation->set_rules('subcategory_id', 'subcategory_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('minorcategory_id', 'minorcategory_id', 'required|xss_clean|trim');


            if ($this->form_validation->run()== true) {
                // $category_id=$this->input->post('category_id');
                // $subcategory_id=$this->input->post('subcategory_id');
                $minorcategory_id=$this->input->post('minorcategory_id');

                $this->db->select('*');
                $this->db->from('tbl_products');
                $this->db->where('is_active', 1);
                // $this->db->where('category_id',$category_id);
                // $this->db->where('subcategory_id',$subcategory_id);
                $this->db->where('minorcategory_id', $minorcategory_id);
                $product_data= $this->db->get();


                $this->db->select('*');
                $this->db->from('tbl_minorcategory');
                $this->db->where('is_active', 1);
                $this->db->where('id', $minorcategory_id);
                $get_minorcategory= $this->db->get()->row();
                if (!empty($get_minorcategory)) {
                    $minor_name=$get_minorcategory->minorcategoryname;
                }

                $product=[];
                foreach ($product_data->result() as $data) {
                    $product[] = array(
'product_id'=>$data->id,
'product_name'=>$data->productname,
'description'=> $data->productdescription,
'mrp'=> $data->mrp,
'price'=>$data->sellingprice,
'image'=>base_url().$data->image,

);
                }

                header('Access-Control-Allow-Origin: *');
                $res = array('message'=>"success",
'status'=>200,
'data'=>$product,
'minorcategory_name'=>$minor_name
);

                echo json_encode($res);
            }
        }
    }

    //-------------------product api category ----------------

    public function get_category_products()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            // print_r($this->input->post());
            // exit;
            $this->form_validation->set_rules('category_id', 'category_id', 'required|xss_clean|trim');
            // $this->form_validation->set_rules('subcategory_id', 'subcategory_id', 'required|xss_clean|trim');
            // $this->form_validation->set_rules('minorcategory_id', 'minorcategory_id', 'required|xss_clean|trim');


            if ($this->form_validation->run()== true) {
                $category_id=$this->input->post('category_id');
                // $subcategory_id=$this->input->post('subcategory_id');
                // $minorcategory_id=$this->input->post('minorcategory_id');

                $this->db->select('*');
                $this->db->from('tbl_products');
                $this->db->where('category_id', $category_id);
                $this->db->where('is_active', 1);

                // $this->db->where('subcategory_id',$subcategory_id);
                // $this->db->where('minorcategory_id',$minorcategory_id);
                $product_data= $this->db->get();

                $this->db->select('*');
                $this->db->from('tbl_category');
                $this->db->where('is_active', 1);
                $this->db->where('id', $category_id);
                $get_category_id= $this->db->get()->row();
                if (!empty($get_category_id)) {
                    $category_name=$get_category_id->category;
                }


                $product=[];
                foreach ($product_data->result() as $data) {
                    $product[] = array(
'product_id'=>$data->id,
'product_name'=>$data->productname,
'description'=> $data->productdescription,
'mrp'=> $data->mrp,
'price'=>$data->sellingprice,
'image'=>base_url().$data->image,
// 'image1'=>$data->image1

);
                }

                header('Access-Control-Allow-Origin: *');
                $res = array('message'=>"success",
'status'=>200,
'data'=>$product,
'category'=>$category_name
);

                echo json_encode($res);
            }
        }
    }





    //-------------

    //-------------------product api subcategory----------------


    public function get_subcategory_products()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            // print_r($this->input->post());
            // exit;
            // $this->form_validation->set_rules('category_id', 'category_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('subcategory_id', 'subcategory_id', 'required|xss_clean|trim');
            // $this->form_validation->set_rules('minorcategory_id', 'minorcategory_id', 'required|xss_clean|trim');


            if ($this->form_validation->run()== true) {
                // $category_id=$this->input->post('category_id');
                $subcategory_id=$this->input->post('subcategory_id');
                // $minorcategory_id=$this->input->post('minorcategory_id');

                $this->db->select('*');
                $this->db->from('tbl_products');
                // $this->db->where('category_id',$category_id);

                $this->db->where('subcategory_id', $subcategory_id);
                // $this->db->where('minorcategory_id',$minorcategory_id);
                $this->db->where('is_active', 1);
                $product_data= $this->db->get();

                $this->db->select('*');
                $this->db->from('tbl_subcategory');
                $this->db->where('id', $subcategory_id);
                $this->db->where('is_active', 1);
                $get_subcategory_data= $this->db->get()->row();

                if (!empty($get_subcategory_data)) {
                    $subcategory_name=$get_subcategory_data->subcategory;
                }

                $product=[];
                foreach ($product_data->result() as $data) {
                  if ($data->inventory>0) {
                      $stock = 1;
                  } else {
                      $stock = 0;
                  }
                    $product[] = array(
'modelno'=>$data->modelno,
'product_id'=>$data->id,
'product_name'=>$data->productname,
'description'=> $data->productdescription,
'mrp'=> $data->mrp,
'price'=>$data->sellingprice,
'image'=>base_url().$data->image,
'stock'=>$stock
);
                }

                header('Access-Control-Allow-Origin: *');
                $res = array('message'=>"success",
'status'=>200,
'data'=>$product,
'subcategory_name'=>$subcategory_name
);

                echo json_encode($res);
            }
        }
    }




    //---------------------

    // ========= Get Product Details =========================
    public function get_productdetails($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('id', $id);
        $this->db->where('is_active', 1);
        $productsdata= $this->db->get()->row();
        if (!empty($productsdata)) {
            if ($productsdata->inventory>0) {
                $stock = 1;
            } else {
                $stock =0;
            }


            $products[] = array(
'id'=> $productsdata->id,
'productname'=> $productsdata->productname,
'productimage1'=> base_url().$productsdata->image,
'productimage2'=> base_url().$productsdata->image1,
'productvideo1'=> base_url().$productsdata->image2,
'productvideo2'=> base_url().$productsdata->image3,
'mrp'=> $productsdata->mrp,
'price'=> $productsdata->sellingprice,
'productdescription'=> $productsdata->productdescription,
'modelno'=> $productsdata->modelno,
'stock'=> $stock,
);


            header('Access-Control-Allow-Origin: *');
            $res = array('message'=>"success",
'status'=>200,
'data'=>$products
);

            echo json_encode($res);
        } else {
            header('Access-Control-Allow-Origin: *');
            $res = array('message'=>"Invalid",
'status'=>201,
);
            echo json_encode($res);
        }
    }

    //get all category
    public function get_allcategory()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('is_active', 1);
        $categorydata= $this->db->get();
        $category=[];
        foreach ($categorydata->result() as $data) {
            $c_id=$data->id;
            $this->db->select('*');
            $this->db->from('tbl_subcategory');
            $this->db->where('category_id', $data->id);
            $this->db->where('is_active', 1);
            $sub= $this->db->get();
            $subcategory=[];
            foreach ($sub->result() as $data2) {
                $subcategory[] = array(
'sub_id' => $data2->id,
'name'=> $data2->subcategory,

);
            }
            // $catt=array('name'=> $data->categoryname,'sub_name'=>$subcategory);

            $cat[] = array(
'id' =>$data->id,
'name' =>$data->category,
'sub_category' =>$subcategory

);
        }
        header('Access-Control-Allow-Origin: *');
        $res = array('message'=>"success",
'status'=>200,
'data'=>$cat,
);

        echo json_encode($res);
    }


    // ================= Most popular product ====================

//
    // public function most_popular_product(){
//
//              $this->db->select('*');
    //  $this->db->from('tbl_most_popular_product');
    //  //$this->db->where('id',$usr);
    //  $popular_product_data= $this->db->get();
    //  $popular_product_data=[];
//
    //  foreach($popular_product_data->result() as $data) {
//
//    $most_popular_product[]= array(
//
    //   'p_id'=>$data->id,
    //   'image'=>base_url().$data->image,
    //   'image1'=>base_url().$data->image1,
    //   'image2'=>base_url().$data->image2,
    //   'image3'=>base_url().$data->image3,
    //   'productdescription'=>$data->productdescription
    // );
//
//
    // }
//
    // header('Access-Control-Allow-Origin: *');
    // $res = array('message'=>"success",
//       'status'=>200,
//       'data'=>$most_popular_product
//       );
//
//       echo json_encode($res);
//
//
    // }




    //=============== surveillance  ==========

    public function surveillance()
    {
        $this->db->select('*');
        $this->db->from('tbl_surveillance');
        $surveillance_data= $this->db->get();
        $surveillance=[];
        foreach ($surveillance_data->result() as $data) {
            $surveillance[] = array(
'description'=>$data->description,
'image'=> base_url().$data->image,
// 'image2'=> base_url().$data->Image2

);
        }
        header('Access-Control-Allow-Origin: *');
        $res = array('message'=>"success",
'status'=>200,
'data'=>$surveillance
);

        echo json_encode($res);
    }


    // ==================Biometric Api ================

    // public function set_biometric(){
//
//               $this->db->select('*');
    //   $this->db->from('tbl_biometric');
    //   //$this->db->where('id',$usr);
    //   $biometric_data= $this->db->get();
    //   $biometric=[];
//
    //   foreach($->result() as $data) {
//
//     $biometric[]= array(
//       'description'=>$data->description,
//       'image'=>base_url().$data->image
//     );
    // }
    // header('Access-Control-Allow_Origin: *');
    // $res= array('message'=>succes)


    // =========== Add Cart APi ===================

    public function add_to_cart()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('product_id', 'product_id', 'required|trim');
            $this->form_validation->set_rules('quantity', 'quantity', 'required|trim');
            $this->form_validation->set_rules('phone', 'phone', 'trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'trim');
            $this->form_validation->set_rules('token_id', 'token_id', 'required|trim');

            if ($this->form_validation->run()== true) {
                $product_id=$this->input->post('product_id');
                $quantity=$this->input->post('quantity');
                $phone=$this->input->post('phone');
                $authentication=$this->input->post('authentication');
                $token_id=$this->input->post('token_id');


                // --------------add to cart using email------------


                if (!empty($phone)) {
                    $this->db->select('*');
                    $this->db->from('tbl_users');
                    $this->db->where('phone', $phone);
                    $check_email= $this->db->get();
                    $check_id=$check_email->row();
                    if (!empty($check_id)) {
                        if ($check_id->authentication == $authentication) {
                            $this->db->select('*');
                            $this->db->from('tbl_cart');
                            $this->db->where('user_id', $check_id->id);
                            $this->db->where('product_id', $product_id);
                            $check_cart= $this->db->get();
                            $cart=$check_cart->row();
                            if (empty($cart)) {
                                $ip = $this->input->ip_address();
                                date_default_timezone_set("Asia/Calcutta");
                                $cur_date=date("Y-m-d H:i:s");

                                //----check product_id in product table-------
                                $this->db->select('*');
                                $this->db->from('tbl_products');
                                $this->db->where('id', $product_id);
                                $check_product= $this->db->get();
                                $check_product_id=$check_product->row();

                                if (!empty($check_product_id)) {
                                    if ($check_product_id->inventory >= $quantity) {
                                    } else {
                                        header('Access-Control-Allow-Origin: *');
                                        $res = array('message'=> "$check_product_id->productname Product is out of stock",
                                              'status'=>201
                                              );

                                        echo json_encode($res);
                                        exit;
                                    }




                                    $data_insert = array('product_id'=>$product_id,
'quantity'=>$quantity,
'user_id'=>$check_id->id,
'token_id'=>$token_id,
'ip' =>$ip,
'date'=>$cur_date

);

                                    $last_id=$this->base_model->insert_table("tbl_cart", $data_insert, 1) ;


                                    if (!empty($last_id)) {
                                        header('Access-Control-Allow-Origin: *');
                                        $res = array('message'=>'success',
'status'=>200
);

                                        echo json_encode($res);
                                    } else {
                                        header('Access-Control-Allow-Origin: *');
                                        $res = array('message'=>'Some error occured',
'status'=>201
);

                                        echo json_encode($res);
                                    }
                                } else {
                                    header('Access-Control-Allow-Origin: *');
                                    $res = array('message'=>'product_id does not exist',
'status'=>201
);

                                    echo json_encode($res);
                                }
                            } else {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>'Product is already in your cart.',
'status'=>201
);

                                echo json_encode($res);
                            }
                        } else {
                            header('Access-Control-Allow-Origin: *');
                            $res = array('message'=>'Authentication does not exist',
'status'=>201
);

                            echo json_encode($res);
                        }
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'email not exist ',
'status'=>201
);

                        echo json_encode($res);
                    }
                } else {
                    $this->db->select('*');
                    $this->db->from('tbl_cart');
                    $this->db->where('token_id', $token_id);
                    $this->db->where('product_id', $product_id);
                    $check_cart= $this->db->get();
                    $cart=$check_cart->row();
                    if (empty($cart)) {
                        $ip = $this->input->ip_address();
                        date_default_timezone_set("Asia/Calcutta");
                        $cur_date=date("Y-m-d H:i:s");

                        //----check product_id in product table-------
                        $this->db->select('*');
                        $this->db->from('tbl_products');
                        $this->db->where('id', $product_id);
                        $check_product= $this->db->get();
                        $check_product_id=$check_product->row();

                        if (!empty($check_product_id)) {
                            if ($check_product_id->inventory >= $quantity) {
                            } else {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=> "$check_product_id->productname Product is out of stock",
'status'=>201
);

                                echo json_encode($res);
                                exit;
                            }



                            $data_insert = array('product_id'=>$product_id,
'quantity'=>$quantity,
'token_id'=>$token_id,
'ip' =>$ip,
'date'=>$cur_date

);

                            $last_id=$this->base_model->insert_table("tbl_cart", $data_insert, 1) ;


                            if (!empty($last_id)) {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>'success',
'status'=>200
);

                                echo json_encode($res);
                            } else {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>'Some error occured',
'status'=>201
);

                                echo json_encode($res);
                            }
                        } else {
                            header('Access-Control-Allow-Origin: *');
                            $res = array('message'=>'Product_id does not exist.',
'status'=>201
);

                            echo json_encode($res);
                        }
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Product is already in your cart.',
'status'=>201
);

                        echo json_encode($res);
                    }
                }
            } else {
                header('Access-Control-Allow-Origin: *');
                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');
            $res = array('message'=>"Insert data, No data Available",
'status'=>201
);

            echo json_encode($res);
        }
    }

    // =============view cart data ============
    public function view_cart_data()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'phone', 'xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'xss_clean|trim');
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $phone=$this->input->post('phone');
                $authentication=$this->input->post('authentication');
                $token_id=$this->input->post('token_id');

                //-------add to cart with email----------

                if (!empty($phone)) {
                    $this->db->select('*');
                    $this->db->from('tbl_users');
                    $this->db->where('phone', $phone);
                    $dsa= $this->db->get();
                    $user_data=$dsa->row();
                    if (!empty($user_data)) {
                        if ($user_data->authentication==$authentication) {
                            $this->db->select('*');
                            $this->db->from('tbl_cart');
                            $this->db->where('user_id', $user_data->id);
                            $cart_data= $this->db->get();
                            $cart_check = $cart_data->row();

                            if (!empty($cart_check)) {
                                $total=0;
                                $sub_total=0;
                                $cart_info = [];
                                foreach ($cart_data->result() as $data) {
                                    $this->db->select('*');
                                    $this->db->from('tbl_products');
                                    $this->db->where('id', $data->product_id);
                                    $dsa= $this->db->get();
                                    $product_data=$dsa->row();




                                    $cart_info[] = array('product_id'=>$data->product_id,
'product_name'=>$product_data->productname,
'product_image'=>base_url().$product_data->image,
'quantity'=>$data->quantity,
'price'=>$product_data->sellingprice,
'total='=>$total = $product_data->sellingprice * $data->quantity,

);
                                    $sub_total= $sub_total + $total;
                                }

                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>'success',
'status'=>200,
'data'=>$cart_info,
'subtotal'=>$sub_total
);

                                echo json_encode($res);
                            } else {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>'Your cart is empty',
'status'=>200,
'data'=>[],
'subtotal'=>0
);

                                echo json_encode($res);
                            }
                        } else {
                            header('Access-Control-Allow-Origin: *');
                            $res = array('message'=>'Password does not match',
'status'=>201
);

                            echo json_encode($res);
                        }
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Phone number not found',
'status'=>201
);

                        echo json_encode($res);
                    }
                } else {
                    $this->db->select('*');
                    $this->db->from('tbl_cart');
                    $this->db->where('token_id', $token_id);
                    $cart_data= $this->db->get();
                    $cart_check = $cart_data->row();

                    // print_r($cart_check);
                    // exit;
                    if (!empty($cart_check)) {
                        $total=0;
                        $sub_total=0;
                        $cart_info= [];



                        foreach ($cart_data->result() as $data) {
                            $this->db->select('*');
                            $this->db->from('tbl_products');
                            $this->db->where('id', $data->product_id);
                            $dsa= $this->db->get();
                            $product_data=$dsa->row();





                            $cart_info[] = array('product_id'=>$data->product_id,
'product_name'=>$product_data->productname,
'product_image'=>base_url().$product_data->image,
'quantity'=>$data->quantity,
'price'=>$product_data->sellingprice,
'total='=>$total = $product_data->sellingprice * $data->quantity

);
                            $sub_total= $sub_total + $total;
                        }

                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'success',
'status'=>200,
'data'=>$cart_info,
'subtotal'=>$sub_total
);

                        echo json_encode($res);
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Your cart is empty',
'status'=>201
);

                        echo json_encode($res);
                    }
                }
            } else {
                header('Access-Control-Allow-Origin: *');
                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');
            $res = array('message'=>"Please insert some data, No data available",
'status'=>201
);

            echo json_encode($res);
        }
    }

    //------update product cart-----
    public function update_cart()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            // print_r($this->input->post());
            // exit;
            $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('quantity', 'quantity', 'required|xss_clean|trim');
            $this->form_validation->set_rules('phone', 'phone', 'xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'xss_clean|trim');
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $product_id=$this->input->post('product_id');
                $quantity=$this->input->post('quantity');
                $phone=$this->input->post('phone');
                $authentication=$this->input->post('authentication');
                $token_id=$this->input->post('token_id');

                //-------update with email----------

                if (!empty($phone)) {
                    $this->db->select('*');
                    $this->db->from('tbl_users');
                    $this->db->where('phone', $phone);
                    $dsa= $this->db->get();
                    $user_data=$dsa->row();
                    if (!empty($user_data)) {
                        if ($user_data->authentication==$authentication) {
                            $this->db->select('*');
                            $this->db->from('tbl_products');
                            $this->db->where('id', $product_id);
                            $inventory_data= $this->db->get()->row();

                            // echo $inventory_data->quantity;
                            // exit;
                            //----inventory_check----------

                            if ($inventory_data->inventory >= $quantity) {
                            } else {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=> "Product is out of stock",
'status'=>201
);

                                echo json_encode($res);
                                exit;
                            }



                            $data_insert = array('product_id'=>$product_id,
'quantity'=>$quantity

);


                            $this->db->where(array('user_id'=>  $user_data->id,'product_id'=>$product_id));
                            $last_id=$this->db->update('tbl_cart', $data_insert);


                            if (!empty($last_id)) {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>'success',
'status'=>200
);

                                echo json_encode($res);
                            } else {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>'Some error occured',
'status'=>201
);

                                echo json_encode($res);
                            }
                        } else {
                            header('Access-Control-Allow-Origin: *');
                            $res = array('message'=>'Authentication does not match',
'status'=>201
);

                            echo json_encode($res);
                        }
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Phone does not exist',
'status'=>201
);

                        echo json_encode($res);
                    }
                }
                //-----update with token id------
                else {
                    $this->db->select('*');
                    $this->db->from('tbl_products');
                    $this->db->where('id', $product_id);
                    $inventory_data= $this->db->get()->row();

                    // echo $inventory_data->quantity;
                    // exit;
                    //----inventory_check----------

                    if ($inventory_data->inventory >= $quantity) {
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=> "Product is out of stock",
'status'=>201
);

                        echo json_encode($res);
                        exit;
                    }



                    $data_insert = array('product_id'=>$product_id,
'quantity'=>$quantity

);

                    $this->db->where(array('token_id'=> $token_id,'product_id'=>$product_id));
                    $last_id=$this->db->update('tbl_cart', $data_insert);


                    if (!empty($last_id)) {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'success',
'status'=>200
);

                        echo json_encode($res);
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Some error occured',
'status'=>201
);

                        echo json_encode($res);
                    }
                }
            } else {
                header('Access-Control-Allow-Origin: *');
                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');
            $res = array('message'=>"please insert data",
'status'=>201
);

            echo json_encode($res);
        }
    }

    // ========== cart count==============

    public function cart_count()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('phone', 'phone', 'xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $token_id=$this->input->post('token_id');
                $phone=$this->input->post('phone');
                $authentication=$this->input->post('authentication');

                //-----cart count check with phone
                if (!empty($phone)) {
                    $this->db->select('*');
                    $this->db->from('tbl_users');
                    $this->db->where('phone', $phone);
                    $user_data= $this->db->get()->row();

                    if (!empty($user_data)) {
                        if ($user_data->authentication==$authentication) {
                            $this->db->select('*');
                            $this->db->from('tbl_cart');
                            $this->db->where('user_id', $user_data->id);
                            $count= $this->db->count_all_results();
                            $this->db->select('*');
                            $this->db->from('tbl_wishlist');
                            $this->db->where('user_id', $user_data->id);
                            $wishlist_count= $this->db->count_all_results();

                            if (empty($count)) {
                                $count = 0;
                            }
                            if (empty($wishlist_count)) {
                                $wishlist_count = 0;
                            }

                            header('Access-Control-Allow-Origin: *');
                            $res = array('message'=>"success",
                            'status'=>200,
                            'data'=>$count,
                            'wish_data'=>$wishlist_count,
                            );

                            echo json_encode($res);
                        } else {
                            header('Access-Control-Allow-Origin: *');
                            $res = array('message'=>"Wrong  Authentication",
'status'=>201
);

                            echo json_encode($res);
                        }
                    }
                }
                //----cart check with token_id
                else {
                    $this->db->select('*');
                    $this->db->from('tbl_cart');
                    $this->db->where('token_id', $token_id);
                    $count= $this->db->count_all_results();

                    if (empty($count)) {
                        $count = 0;
                    }
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>"success",
'status'=>200,
'data'=>$count
);

                    echo json_encode($res);
                }
            } else {
                header('Access-Control-Allow-Origin: *');
                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');
            $res = array('message'=>'No data available',
'status'=>201
);

            echo json_encode($res);
        }
    }


    //------delete product cart-----
    public function delete_cart_data()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            // print_r($this->input->post());
            // exit;
            $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('phone', 'phone', 'xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'xss_clean|trim');
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $product_id=$this->input->post('product_id');
                $phone=$this->input->post('phone');
                $authentication=$this->input->post('authentication');
                $token_id=$this->input->post('token_id');

                //-------delete with email----------

                if (!empty($phone)) {
                    $this->db->select('*');
                    $this->db->from('tbl_users');
                    $this->db->where('phone', $phone);
                    $dsa= $this->db->get();
                    $user_data=$dsa->row();
                    if (!empty($user_data)) {
                        if ($user_data->authentication==$authentication) {

//             $this->db->select('*');
                            // $this->db->from('tbl_cart');
                            // $this->db->where('user_id',$user_data->id);
                            // $this->db->where('$product_id',$product_id);
                            // $this->db->where('$type_id',$type_id);
                            // $cart_data= $this->db->get()->row();

                            $zapak=$this->db->delete('tbl_cart', array('user_id' => $user_data->id,'product_id'=>$product_id));

                            // echo $zapak;
                            // exit;
                            if (!empty($zapak)) {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>'success',
'status'=>200
);

                                echo json_encode($res);
                            } else {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>'Some error occured',
'status'=>201
);

                                echo json_encode($res);
                            }
                        } else {
                            header('Access-Control-Allow-Origin: *');
                            $res = array('message'=>'Password does not match',
'status'=>201
);

                            echo json_encode($res);
                        }
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Phone number does not exist',
'status'=>201
);

                        echo json_encode($res);
                    }
                }
                //-----delete with token id------
                else {
                    $zapak=$this->db->delete('tbl_cart', array('token_id' => $token_id,'product_id'=>$product_id));

                    if (!empty($zapak)) {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'success',
'status'=>200
);

                        echo json_encode($res);
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Some error occured',
'status'=>201
);

                        echo json_encode($res);
                    }
                }
            } else {
                header('Access-Control-Allow-Origin: *');
                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');
            $res = array('message'=>"please insert data",
'status'=>201
);

            echo json_encode($res);
        }
    }
    //-----------------most-popular product--------------


    public function most_popular_products()
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('popular_product', 1);
        $this->db->where('is_active', 1);
        $productslimitdata= $this->db->get();
        $products=[];
        foreach ($productslimitdata->result() as $limit) {
          if ($limit->inventory>0) {
                      $stock = 1;
                  } else {
                      $stock = 0;
                  }

//category
            //   $this->db->select('*');
            //   $this->db->from('tbl_category');
            //   $this->db->where('id',$limit->subcategory_id);
            //   $cat= $this->db->get()->row();
            //   if(!empty($cat)){
            //   $c1=$cat->category;
            //   }
            //   else{
            //   $c1="";
            //   }
//
//
            //   //subcategory
            //   $this->db->select('*');
            //   $this->db->from('tbl_subcategory');
            //   $this->db->where('id',$limit->subcategory_id);
            //   $sub= $this->db->get()->row();
            //   if(!empty($sub)){
            //   $s1=$sub->subcategory;
            //   }else{
            //   $s1="";
            //   }
//
            //   //type --
            //   $this->db->select('*');
            //   $this->db->from('tbl_minorcategory');
//     $this->db->where('id',$limit->minorcategory_id);
            //   $minor= $this->db->get()->row();
            //   if(!empty($minor)){
//     $m1=$minor->minorcategoryname;
            // }else{
            //   $m1="";
            // }





            $products[] = array(
'product_id'=>$limit->id,
'productname'=> $limit->productname,
// 'category'=> $c1,
// 'sucategory'=> $s1,
// 'minorcategory'=>$m1,
'productimage'=> base_url().$limit->image,
// 'productimage1'=> base_url().$limit->image1,
// 'productvideo1'=> base_url().$limit->image2,
// 'productvideo2'=> base_url().$limit->image3,
'mrp'=> $limit->mrp,
'price'=>$limit->sellingprice,
'productdescription'=> $limit->productdescription,
'stock'=>$stock
// 'inventory'=> $data->inventory
);
        }

        header('Access-Control-Allow-Origin: *');
        $res = array('message'=>"success",
'status'=>200,
'data'=>$products
);

        echo json_encode($res);
    }
    //--------------------stock_get----------------

    public function stock_get()
    {
        $this->db->select('*');
        $this->db->from('tbl_stock');
        $this->db->where('is_active', 1);
        $data= $this->db->get();
        $stock=[];
        foreach ($data->result() as $value) {
            $stock[]=array(
'image'=>base_url().$value->image1,
'link1'=>$value->link1,
'image2'=>base_url().$value->image2,
'link2'=>$value->link2,


);
        }
        header('Access-Control-Allow-Origin:*');
        $res=array(
'message'=>"success",
'status'=>200,
'data'=>$stock
);
        echo json_encode($res);
    }
    //-----------------------------MOST POPULAR BRANDS-------------

    public function brands_view()
    {
        $this->db->select('*');
        $this->db->from('tbl_brands');
        //$this->db->where('id',$id);
        $this->db->where('is_active', 1);
        $brands= $this->db->get();
        $brands_data=[];
        foreach ($brands->result() as $value) {
            $brands_data[]=array(
'id'=>$value->id,
'name'=>$value->name,
'message'=>$value->message,
'image'=>base_url().$value->image

);
        }
        header('Access-Control-Allow-Origin: *');
        $res = array('message'=>"success",
'status'=>200,
'data'=>$brands_data
);

        echo json_encode($res);
    }
    //-------------show minorcategory---------------------
    public function show_minorcategory()
    {
        $this->db->select('*');
        $this->db->from('tbl_minorcategory');
        $this->db->where('is_active', 1);
        $minor_category= $this->db->get();
        $minorcategory=[];
        foreach ($minor_category->result() as $value) {
            $minorcategory[]=array(
'id'=>$value->id,
'minorcategory'=>$value->minorcategoryname,
'image'=>base_url().$value->image
);
        }
        header('Access-Control-Allow-Origin: *');
        $res=array(
'message'=>"success",
'status'=>200,
'data'=>$minorcategory
);
        echo json_encode($res);
    }

    //-------------------related product------------

    public function related_products($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('id', $id);
        $product_data= $this->db->get()->row();

        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('subcategory_id', $product_data->subcategory_id);
        $related_data= $this->db->get();

        $related_info = [];
        foreach ($related_data->result() as $data) {
            if ($data->id!=$id) {
              if ($data->inventory>0) {
                      $stock = 1;
                  } else {
                      $stock = 0;
                  }
            $related_info[]  = array(
'product_id'=>$data->id,
'productname'=>$data->productname,
'productimage'=>base_url().$data->image,
'productdescription'=>$data->productdescription,
'mrp'=>$data->mrp,
'price'=>$data->sellingprice,
'stock'=>$stock
);
}
        }
        header('Access-Control-Allow-Origin: *');
        $res = array('message'=>"success",
'status'=>200,
'data'=>$related_info

);

        echo json_encode($res);
        exit();
    }

    //------calculate------------
    public function calculate()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'required|xss_clean|trim');
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');


            if ($this->form_validation->run()== true) {
                $phone=$this->input->post('phone');
                $authentication=$this->input->post('authentication');
                $token_id=$this->input->post('token_id');
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where('phone', $phone);
                $user_data= $this->db->get()->row();

                if (!empty($user_data)) {
                    if ($authentication==$user_data->authentication) {
                        $this->db->select('*');
                        $this->db->from('tbl_cart');
                        $this->db->where('user_id', $user_data->id);
                        $cart_data= $this->db->get();
                        $cart_check=$cart_data->row();

                        if (!empty($cart_check)) {
                            $total=0;
                            $sub_total=0;
                            foreach ($cart_data->result() as  $data) {
                                $this->db->select('*');
                                $this->db->from('tbl_products');
                                $this->db->where('id', $data->product_id);
                                $this->db->where('is_active', 1);
                                $product_data= $this->db->get()->row();

                                if (!empty($product_data)) {
                                    $total = $product_data->sellingprice * $data->quantity;

                                    $sub_total = $sub_total + $total;
                                } else {
                                    header('Access-Control-Allow-Origin: *');
                                    $res = array('message'=>"product not found",
'status'=>201,
);

                                    echo json_encode($res);
                                }
                            }//end of foreach
                            $txn_id=bin2hex(random_bytes(10));
                            $order1_insert = array('user_id'=>$user_data->id,
'total_amount'=>$sub_total,
'payment_status'=>0,
'order_status'=>0,
'payment_status'=>0,
'txnid'=>$txn_id,
'ip' =>$ip,
'date'=>$cur_date

);

                            $last_id=$this->base_model->insert_table("tbl_order1", $order1_insert, 1) ;

                            if (!empty($last_id)) {
                                $this->db->select('*');
                                $this->db->from('tbl_cart');
                                $this->db->where('user_id', $user_data->id);
                                $cart_data1= $this->db->get();
                                $cart_check1=$cart_data->row();

                                if (!empty($cart_check1)) {
                                    $total2=0;
                                    foreach ($cart_data1->result() as $data1) {
                                        $this->db->select('*');
                                        $this->db->from('tbl_products');
                                        $this->db->where('id', $data1->product_id);
                                        $inventory_data= $this->db->get()->row();


                                        if (!empty($inventory_data)) {
                                            $this->db->select('*');
                                            $this->db->from('tbl_products');
                                            $this->db->where('id', $data1->product_id);
                                            $product_data1= $this->db->get()->row();

                                            if (!empty($product_data1)) {
                                                if ($inventory_data->inventory >= $data1->quantity) {
                                                    $total2 = $product_data1->sellingprice * $data1->quantity ;
                                                    $order2_insert = array('main_id'=>$last_id,
'product_id'=>$data1->product_id,
'quantity'=>$data1->quantity,
'product_mrp'=>$product_data1->mrp,
// 'gst'=>$product_data1->gst,
// 'gst_percentage'=>$product_data1->gst_percentage,
'total_amount'=>$total2,
'ip' =>$ip,
'date'=>$cur_date

);

                                                    $last_id2=$this->base_model->insert_table("tbl_order2", $order2_insert, 1) ;
                                                } else {
                                                    header('Access-Control-Allow-Origin: *');
                                                    $res = array('message'=>"Product is out of stock! Please remove this ".$product_data1->productname,
'status'=>201,
);

                                                    echo json_encode($res);
                                                    exit;
                                                }
                                            } else {
                                                header('Access-Control-Allow-Origin: *');
                                                $res = array('message'=>"Out of stock",
'status'=>201,
);

                                                echo json_encode($res);
                                                exit;
                                            }
                                        } else {
                                            header('Access-Control-Allow-Origin: *');
                                            $res = array('message'=>"Product not found",
'status'=>201,
);

                                            echo json_encode($res);
                                            exit;
                                        }
                                    }
                                }//end of foreach

                                $this->db->select('*');
                                $this->db->from('tbl_order1');
                                $this->db->where('user_id', $user_data->id);
                                $this->db->where('payment_status', 1);
                                $this->db->order_by('id', "DESC");
                                $address_data= $this->db->get()->row();
                                $address = [];
                                if (!empty($address_data)) {
                                    $address = array(
"name"=>$address_data->name,
"pincode"=>$address_data->pincode,
// "house_no"=>$address_data->house_no,
"street_address"=>$address_data->street_address,
"city"=>$address_data->city,
"state"=>$address_data->state,
"phone"=>$address_data->phone,
);
                                }
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>"success",
'status'=>200,
'total'=>$sub_total,
'subtotal'=>$sub_total,
'txn_id'=>$txn_id,
'address'=>$address
);

                                echo json_encode($res);
                            } else {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>"some error occured",
'status'=>201,
);

                                echo json_encode($res);
                            }
                        } else {
                            header('Access-Control-Allow-Origin: *');
                            $res = array('message'=>"Cart is empty",
'status'=>201,
);

                            echo json_encode($res);
                        }
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>"Wrong Authentication",
'status'=>201,
);

                        echo json_encode($res);
                    }
                } else {
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>"No user found",
'status'=>201,
);

                    echo json_encode($res);
                }
            } else {
                header('Access-Control-Allow-Origin: *');
                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');
            $res = array('message'=>"please insert some data",
'status'=>201
);

            echo json_encode($res);
        }
    }

    //----promocode---
    public function apply_promocode()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'required|xss_clean|trim');
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('txn_id', 'txn_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('promocode', 'promocode', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $phone=$this->input->post('phone');
                $authentication=$this->input->post('authentication');
                $token_id=$this->input->post('token_id');
                $txn_id=$this->input->post('txn_id');
                $promocode=$this->input->post('promocode');

                $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where('phone', $phone);
                $user_data= $this->db->get()->row();

                if (!empty($user_data)) {
                    if ($user_data->authentication==$authentication) {

//--------check_promocode------
                        $discount = 0;
                        $promocode_id=0;

                        $promocode = strtoupper($promocode);
                        // echo $promocode;
                        // exit;
                        $this->db->select('*');
                        $this->db->from('tbl_promocode');
                        $this->db->where('promocode', $promocode);
                        $this->db->where('is_active', 1);
                        $dsa= $this->db->get();
                        $promocode_data=$dsa->row();

                        if (!empty($promocode_data)) {
                            $this->db->select('*');
                            $this->db->from('tbl_order1');
                            $this->db->where('txnid', $txn_id);
                            $order_data= $this->db->get()->row();


                            $final_amount = 0;
                            $promocode_id = $promocode_data->id;
                            date_default_timezone_set("Asia/Calcutta");
                            $cur_date=date("Y-m-d H:i:s");
                            if (strtotime($cur_date) < strtotime($promocode_data->expiry)) {
                                if ($promocode_data->ptype==1) {
                                    $this->db->select('*');
                                    $this->db->from('tbl_order1');
                                    $this->db->where('user_id', $user_data->id);
                                    $this->db->where('promocode_id', $promocode_data->id);
                                    $dsa= $this->db->get();
                                    $promo_check=$dsa->row();

                                    if (empty($promo_check)) {
                                        if ($order_data->total_amount > $promocode_data->minorder) { //----checking minorder for promocode
                                            // echo "hii";

                                            $discount_amt = $order_data->total_amount * $promocode_data->giftpercent/100;
                                            if ($discount_amt > $promocode_data->max) {
                                                // will get max amount
                                                $discount =  $promocode_data->max;
                                            } else {
                                                $discount =  $discount_amt;
                                            }
                                        }//endif of minorder
                                        else {
                                            header('Access-Control-Allow-Origin: *');
                                            $res = array('message'=>'Please add more products for promocode',
'status'=>201
);

                                            echo json_encode($res);
                                            exit;
                                        }
                                    } else {
                                        header('Access-Control-Allow-Origin: *');
                                        $res = array('message'=>'Promocode already used',
'status'=>201
);

                                        echo json_encode($res);
                                        exit;
                                    }
                                }
                                //-----every time promocode---
                                else {
                                    if ($order_data->total_amount > $promocode_data->minorder) { //----checking minorder for promocode
                                        // echo "hii";

                                        $discount_amt = $order_data->total_amount * $promocode_data->giftpercent/100;
                                        if ($discount_amt > $promocode_data->max) {
                                            // will get max amount
                                            $discount =  $promocode_data->max;
                                        } else {
                                            $discount =  $discount_amt;
                                        }
                                    }//endif of minorder
                                    else {
                                        header('Access-Control-Allow-Origin: *');
                                        $res = array('message'=>'Please add more products for promocode',
'status'=>201
);

                                        echo json_encode($res);
                                        exit;
                                    }
                                }
                            } else {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>'Promocode expired',
'status'=>201
);

                                echo json_encode($res);
                                exit;
                            }


                            $final_amount = $order_data->total_amount - $discount;


                            //-------table_order1 entry-------

                            $update_order1_data = array(
'promocode_id'=>$promocode_id,
'discount'=>$discount,
);

                            $this->db->where('txnid', $txn_id);
                            $last_id=$this->db->update('tbl_order1', $update_order1_data);

                            if (!empty($last_id)) {
                                $response  = array(

'total' => $order_data->total_amount,
'sub_total' => $final_amount,
'promocode_discount' => $discount,
'promocode_id' => $promocode_id,

);


                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>'success',
'status'=>200,
'data'=>$response
);

                                echo json_encode($res);
                            } else {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>'some eroor occured! please try again',
'status'=>201
);

                                echo json_encode($res);
                                exit;
                            }
                        } else {
                            header('Access-Control-Allow-Origin: *');
                            $res = array('message'=>'invalid promocode',
'status'=>201
);

                            echo json_encode($res);
                            exit;
                        }
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Wrong Authentication',
'status'=>201
);

                        echo json_encode($res);
                    }
                } else {
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>'Phone number not found',
'status'=>201
);

                    echo json_encode($res);
                }
            } else {
                header('Access-Control-Allow-Origin: *');

                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');

            $res = array('message'=>'No data available',
'status'=>201
);

            echo json_encode($res);
        }
    }


    //----promocode_remove-----
    public function promocode_remove()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'required|xss_clean|trim');
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('txn_id', 'txn_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('promocode_id', 'promocode_id', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $phone=$this->input->post('phone');
                $authentication=$this->input->post('authentication');
                $token_id=$this->input->post('token_id');
                $txn_id=$this->input->post('txn_id');
                $promocode=$this->input->post('promocode');

                $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where('phone', $phone);
                $user_data= $this->db->get()->row();

                if (!empty($user_data)) {
                    if ($user_data->authentication==$authentication) {
                        $data_insert = array('promocode_id'=>0,
'discount'=>0,

);


                        $this->db->where('txnid', $txn_id);
                        $last_id=$this->db->update('tbl_order1', $data_insert);
                        if (!empty($last_id)) {
                            $this->db->select('*');
                            $this->db->from('tbl_order1');
                            $this->db->where('txnid', $txn_id);
                            $order_data= $this->db->get()->row();

                            // $final_amount = $order_data->total_amount + $order_data->delivery_charge;
                            $response  = array(

'sub_total' => $order_data->total_amount,
'promocode_discount' => $order_data->discount,

);
                            header('Access-Control-Allow-Origin: *');
                            $res = array('message'=>'success',
'status'=>200,
'data'=>$response,

);

                            echo json_encode($res);
                        } else {
                            header('Access-Control-Allow-Origin: *');
                            $res = array('message'=>'some error occured',
'status'=>201
);

                            echo json_encode($res);
                        }
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Wrong Password',
'status'=>201
);

                        echo json_encode($res);
                    }
                } else {
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>'Phone number not found',
'status'=>201
);

                    echo json_encode($res);
                }
            } else {
                header('Access-Control-Allow-Origin: *');

                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');

            $res = array('message'=>'No data available',
'status'=>201
);

            echo json_encode($res);
        }
    }


    //----add to wishlist--------
    public function add_to_wishlist()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'required|xss_clean|trim');
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $phone=$this->input->post('phone');
                $authentication=$this->input->post('authentication');
                $token_id=$this->input->post('token_id');
                $product_id=$this->input->post('product_id');
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where('phone', $phone);
                $user_data= $this->db->get()->row();

                if (!empty($user_data)) {
                    if ($user_data->authentication==$authentication) {
                        $this->db->select('*');
                        $this->db->from('tbl_wishlist');
                        $this->db->where('user_id', $user_data->id);
                        $this->db->where('product_id', $product_id);
                        $wishlist_data= $this->db->get()->row();

                        if (empty($wishlist_data)) {
                            $data_insert = array('user_id'=>$user_data->id,
'product_id'=>$product_id,
'ip' =>$ip,
'date'=>$cur_date

);


                            $last_id=$this->base_model->insert_table("tbl_wishlist", $data_insert, 1) ;
                            if (!empty($last_id)) {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>'success',
'status'=>200
);

                                echo json_encode($res);
                            } else {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>'some error occured',
'status'=>201
);

                                echo json_encode($res);
                            }
                        } else {
                            header('Access-Control-Allow-Origin: *');
                            $res = array('message'=>'Product is already in your wishlist',
'status'=>201
);

                            echo json_encode($res);
                        }
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Wrong Authentication',
'status'=>201
);

                        echo json_encode($res);
                    }
                } else {
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>'Phone number not found',
'status'=>201
);

                    echo json_encode($res);
                }
            } else {
                header('Access-Control-Allow-Origin: *');

                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');

            $res = array('message'=>'No data available',
'status'=>201
);

            echo json_encode($res);
        }
    }


    //----remove wishlist product-----
    public function remove_wishlist_product()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'required|xss_clean|trim');
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $phone=$this->input->post('phone');
                $authentication=$this->input->post('authentication');
                $token_id=$this->input->post('token_id');
                $product_id=$this->input->post('product_id');
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where('phone', $phone);
                $user_data= $this->db->get()->row();

                if (!empty($user_data)) {
                    if ($user_data->authentication==$authentication) {
                        $zapak=$this->db->delete('tbl_wishlist', array('user_id' => $user_data->id,'product_id' => $product_id));

                        if (!empty($zapak)) {
                            header('Access-Control-Allow-Origin: *');
                            $res = array('message'=>'success',
'status'=>200
);

                            echo json_encode($res);
                        } else {
                            header('Access-Control-Allow-Origin: *');
                            $res = array('message'=>'some error occured',
'status'=>201
);

                            echo json_encode($res);
                        }
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Wrong Authentication',
'status'=>201
);

                        echo json_encode($res);
                    }
                } else {
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>'Phone number not found',
'status'=>201
);

                    echo json_encode($res);
                }
            } else {
                header('Access-Control-Allow-Origin: *');

                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');

            $res = array('message'=>'No data available',
'status'=>201
);

            echo json_encode($res);
        }
    }


    //----view wishlist-------
    public function view_wishlist()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'required|xss_clean|trim');
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $phone=$this->input->post('phone');
                $authentication=$this->input->post('authentication');
                $token_id=$this->input->post('token_id');

                $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where('phone', $phone);
                $user_data= $this->db->get()->row();

                if (!empty($user_data)) {
                    if ($user_data->authentication==$authentication) {
                        $this->db->select('*');
                        $this->db->from('tbl_wishlist');
                        $this->db->where('user_id', $user_data->id);
                        $wishlist_data= $this->db->get();
                        $wishlist_check= $wishlist_data->row();
                        $wishlist_info = [];
                        foreach ($wishlist_data->result() as $data) {
                            $this->db->select('*');
                            $this->db->from('tbl_products');
                            $this->db->where('id', $data->product_id);
                            $dsa= $this->db->get();
                            $product_data=$dsa->row();


                            $wishlist_info[]=array(
'product_id'=>$product_data->id,
'product_name'=>$product_data->productname,
'product_image'=>base_url().$product_data->image,
'product_mrp'=>$product_data->mrp,
'product_selling_price'=>$product_data->sellingprice,
);
                        }
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'success',
'status'=>200,
'data'=>$wishlist_info,
);

                        echo json_encode($res);
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Wrong Authentication',
'status'=>201
);

                        echo json_encode($res);
                    }
                } else {
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>'Phone number not found',
'status'=>201
);

                    echo json_encode($res);
                }
            } else {
                header('Access-Control-Allow-Origin: *');

                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');

            $res = array('message'=>'No data available',
'status'=>201
);

            echo json_encode($res);
        }
    }


    //---------------search api --------------
    public function search_product()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            // print_r($this->input->post());
            // exit;

            $this->form_validation->set_rules('string', 'string', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $string=$this->input->post('string');

                $this->db->select('*');
                $this->db->from('tbl_products');
                $this->db->like('productname', $string);
                $this->db->or_like('modelno', $string);
                $this->db->where('is_active', 1);
                $search_string= $this->db->get();
                // print_r ($string_check);
                // exit;
                $search_data=[];
                foreach ($search_string->result() as $data) {
                    $search_data[]=array(
'product_id'=>$data->id,
'product_name'=>$data->productname,
'produt_image'=>base_url().$data->image,
'productdescription'=>$data->productdescription,
'product_mrp'=>$data->mrp,
'product_selling_price'=>$data->sellingprice,



);
                }
                header('Access-Control-Allow-Origin: *');
                $res = array('message'=>"success",
'status'=>200,
'data'=>$search_data
);

                echo json_encode($res);
            } else {
                header('Access-Control-Allow-Origin: *');
                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');

            $res = array('message'=>'No data available',
'status'=>201
);

            echo json_encode($res);
        }
    }


    //----view store_details-------
    public function store_details()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'required|xss_clean|trim');
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $phone=$this->input->post('phone');
                $authentication=$this->input->post('authentication');
                $token_id=$this->input->post('token_id');

                $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where('phone', $phone);
                $user_data= $this->db->get()->row();

                if (!empty($user_data)) {
                    if ($user_data->authentication==$authentication) {
                        $this->db->select('*');
                        $this->db->from('tbl_store');
                        $store_data= $this->db->get();
                        $store_info = [];
                        foreach ($store_data->result() as $data) {
                            $store_info[]=array(
'id'=>$data->id,
'name'=>$data->name,
'address'=>$data->address,
'pincode'=>$data->pincode,
'contact1'=>$data->contact1,
'contact2'=>$data->contact2,
);
                        }
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'success',
'status'=>200,
'data'=>$store_info,
);

                        echo json_encode($res);
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Wrong Authentication',
'status'=>201
);

                        echo json_encode($res);
                    }
                } else {
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>'Phone number not found',
'status'=>201
);

                    echo json_encode($res);
                }
            } else {
                header('Access-Control-Allow-Origin: *');

                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');

            $res = array('message'=>'No data available',
'status'=>201
);

            echo json_encode($res);
        }
    }

    //----checkout-------
    public function checkout()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('payment_type', 'payment_type', 'required|xss_clean|trim');
            if (!empty($this->input->post('store_id'))) {
                $this->form_validation->set_rules('name', 'name', 'xss_clean|trim');
                $this->form_validation->set_rules('contact', 'contact', 'xss_clean|trim');
                // $this->form_validation->set_rules('pincode', 'pincode', 'xss_clean|trim');
                $this->form_validation->set_rules('state', 'state', 'xss_clean|trim');
                $this->form_validation->set_rules('city', 'city', 'xss_clean|trim');
                // $this->form_validation->set_rules('house_no', 'house_no', 'xss_clean|trim');
                $this->form_validation->set_rules('street_address', 'street_address', 'xss_clean|trim');
            } else {
                $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
                $this->form_validation->set_rules('contact', 'contact', 'required|xss_clean|trim');
                // $this->form_validation->set_rules('pincode', 'pincode', 'required|xss_clean|trim');
                $this->form_validation->set_rules('state', 'state', 'required|xss_clean|trim');
                $this->form_validation->set_rules('city', 'city', 'required|xss_clean|trim');
                // $this->form_validation->set_rules('house_no', 'house_no', 'required|xss_clean|trim');
                $this->form_validation->set_rules('street_address', 'street_address', 'required|xss_clean|trim');
            }

            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'required|xss_clean|trim');
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('txn_id', 'txn_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('store_id', 'store_id', 'xss_clean|trim');


            if ($this->form_validation->run()== true) {
                $phone=$this->input->post('phone');
                $authentication=$this->input->post('authentication');
                $token_id=$this->input->post('token_id');
                $txn_id=$this->input->post('txn_id');
                $payment_type=$this->input->post('payment_type');
                $name=$this->input->post('name');
                $contact=$this->input->post('contact');
                // $pincode=$this->input->post('pincode');
                $state=$this->input->post('state');
                $city=$this->input->post('city');
                // $house_no=$this->input->post('house_no');
                $street_address=$this->input->post('street_address');
                $store_id=$this->input->post('store_id');

                $this->load->library('upload');

                if (empty($store_id) && $payment_type==2) {
                    $image="";
                    $img1='image';
                    $file_check=($_FILES['image']['error']);
                    if ($file_check!=4) {
                        $image_upload_folder = FCPATH . "assets/uploads/bank_receipts/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name="bank_receipt".date("Ymdhms");
                        $this->upload_config = array(
'upload_path'   => $image_upload_folder,
'file_name' => $new_file_name,
'allowed_types' =>'jpg|jpeg|png',
'max_size'      => 25000
);
                        $this->upload->initialize($this->upload_config);
                        if (!$this->upload->do_upload($img1)) {
                            $upload_error = $this->upload->display_errors();
                            header('Access-Control-Allow-Origin: *');
                            $res = array('message'=>$upload_error,
'status'=>201,
);

                            echo json_encode($res);
                            exit;
                        } else {
                            $file_info = $this->upload->data();

                            $videoNAmePath = "assets/uploads/bank_receipts/".$new_file_name.$file_info['file_ext'];
                            $file_info['new_name']=$videoNAmePath;
                            // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                            $image=$videoNAmePath;
                            // echo json_encode($file_info);
                        }
                    }
                }


                $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where('phone', $phone);
                $user_data= $this->db->get()->row();

                if (!empty($user_data)) {
                    if ($user_data->authentication==$authentication) {
                        $this->db->select('*');
                        $this->db->from('tbl_order1');
                        $this->db->where('txnid', $txn_id);
                        $order1_data= $this->db->get()->row();

                        if (!empty($order1_data)) {
                            $this->db->select('*');
                            $this->db->from('tbl_order2');
                            $this->db->where('main_id', $order1_data->id);
                            $order2_data= $this->db->get();
                            $order2_check= $order2_data->row();

                            if (!empty($order2_check)) {


//----------------inventory check---------
                                foreach ($order2_data->result() as $data) {
                                    $this->db->select('*');
                                    $this->db->from('tbl_products');
                                    $this->db->where('is_active', 1);
                                    $this->db->where('id', $data->product_id);
                                    $product_data= $this->db->get()->row();



                                    if ($product_data->inventory >= $data->quantity) {
                                    } else {
                                        header('Access-Control-Allow-Origin: *');
                                        $res = array('message'=>$product_data->productname.'is out of stock! Please remove this before checkout',
'status'=>201
);

                                        echo json_encode($res);
                                        exit;
                                    }
                                }//end of foreach
                            }//end of order2
$total = $order1_data->total_amount;
                            $discount = $order1_data->discount;

                            if (empty($discount)) {
                                $discount=0;
                            }
                            $final_amount = $total - $discount;

                            //----------order1 entry-------
if ($payment_type==1) {         //------------1 for COD------------------------------------
if (!empty($store_id)) {
    $data_insert = array(
'final_amount'=>$final_amount,
'store_id'=>$store_id,
'payment_status'=>1,
'payment_type'=>1,
'order_status'=>1,
'from'=>'web'
);
} else {
    $data_insert = array(
'name'=>$name,
'phone'=>$phone,
// 'pincode'=>$pincode,
'state'=>$state,
'city'=>$city,
// 'house_no'=>$house_no,
'street_address'=>$street_address,
'final_amount'=>$final_amount,
'payment_status'=>1,
'payment_type'=>1,
'order_status'=>1,
'from'=>'web'
);
}
} elseif ($payment_type==2) {         //------------2 for bank transfer------------------------------------
    if (!empty($store_id)) {
        $data_insert = array(
'final_amount'=>$final_amount,
// 'bank_receipt'=>$image,
'store_id'=>$store_id,
'payment_status'=>1,
'payment_type'=>1,
'order_status'=>1,
'from'=>'web'
);
    } else {
        $data_insert = array(
'name'=>$name,
'phone'=>$phone,
// 'pincode'=>$pincode,
'state'=>$state,
'city'=>$city,
// 'house_no'=>$house_no,
'street_address'=>$street_address,
'final_amount'=>$final_amount,
'bank_receipt'=>$image,     //------compulsary
'payment_status'=>1,
'payment_type'=>2,
'order_status'=>1,
'from'=>'web'
);
    }
}
                            // echo "-----------".$image; die();
                            // print_r($data_insert);die();
                            $this->db->where('txnid', $txn_id);
                            $last_id=$this->db->update('tbl_order1', $data_insert);

                            //----------------inventory update---------

                            if (!empty($order2_check)) {
                                foreach ($order2_data->result() as $data1) {
                                    $this->db->select('*');
                                    $this->db->from('tbl_products');
                                    $this->db->where('is_active', 1);
                                    $this->db->where('id', $data->product_id);
                                    $product_data= $this->db->get()->row();



                                    $updated_inventory = $product_data->inventory - $data1->quantity;


                                    $data_update = array('inventory'=>$updated_inventory);

                                    $this->db->where('id', $product_data->id);
                                    $last_id=$this->db->update('tbl_products', $data_update);
                                }//end of foreach
                            }//end of order2

//------------cart clear--------------
                            $this->db->select('*');
                            $this->db->from('tbl_cart');
                            $this->db->where('user_id', $user_data->id);
                            $cart_data= $this->db->get();
                            $cart_check= $cart_data->row();

                            if (!empty($cart_check)) {
                                foreach ($cart_data->result() as $cart) {
                                    $zapak=$this->db->delete('tbl_cart', array('id' => $cart->id));
                                }
                            }
                        }// end of order1

                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'success',
'status'=>200,
'order_id'=>$order1_data->id,
'amount'=>$final_amount,
);

                        echo json_encode($res);
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Wrong Authentication',
'status'=>201
);

                        echo json_encode($res);
                    }
                } else {
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>'Phone number not found',
'status'=>201
);

                    echo json_encode($res);
                }
            } else {
                header('Access-Control-Allow-Origin: *');

                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');

            $res = array('message'=>'No data available',
'status'=>201
);

            echo json_encode($res);
        }
    }



    public function view_order()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'required|xss_clean|trim');
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $phone=$this->input->post('phone');
                $authentication=$this->input->post('authentication');
                $token_id=$this->input->post('token_id');


                $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where('phone', $phone);
                $user_data= $this->db->get()->row();

                if (!empty($user_data)) {
                    if ($user_data->authentication==$authentication) {
                        $this->db->select('*');
                        $this->db->from('tbl_order1');
                        $this->db->where('user_id', $user_data->id);
                        $check_data= $this->db->get()->row();
                        $viewcart=[];


                        if (!empty($check_data)) {
                            $this->db->select('*');
                            $this->db->from('tbl_order1');
                            $this->db->where('user_id', $user_data->id);
                            $this->db->where('payment_status', 1);
                            $this->db->order_by('id', "desc");
                            $data= $this->db->get();


                            foreach ($data->result() as $value) {
                                if ($value->payment_type == 1) {
                                  $payment_type="Pay at store";
                                } elseif ($value->payment_type == 2) {
                                  $payment_type="Bank Tranfer";
                                } else {
                                    $payment_type = "NA";
                                }

                                if ($value->order_status==1 || $value->order_status==2) {
                                    $cancel_status = 1;
                                } else {
                                    $cancel_status =0;
                                }

                                if ($value->order_status==1) {
                                    $order_status= "Placed";
                                } elseif ($value->order_status==2) {
                                    $order_status= "Confirmed";
                                } elseif ($value->order_status==3) {
                                    $order_status= "Dispatched";
                                } elseif ($value->order_status==4) {
                                    $order_status= "Delivered";
                                } elseif ($value->order_status==5) {
                                    $order_status= "Canceled";
                                }

                                $newdate = new DateTime($value->date);
                                $d2=$newdate->format('d-m-Y');   #d-m-Y  // March 10, 2001, 5:16 pm


                                $viewcart[]=array(
'order_id'=>$value->id,
'order_date'=>$d2,
'total_amount'=>$value->final_amount,
'payment_type'=> $payment_type,
'discount'=>$value->discount,
'order_status'=>$order_status,
'cancel_status'=>$cancel_status,
);
                            }
                        }
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>"success",
'status'=>200,
'data'=>$viewcart
);

                        echo json_encode($res);
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Wrong authentication',
'status'=>201
);

                        echo json_encode($res);
                    }
                } else {
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>'Phone number not found',
'status'=>201
);

                    echo json_encode($res);
                }
            } else {
                header('Access-Control-Allow-Origin: *');
                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');
            $res = array('message'=>"Please insert some data",
'status'=>201
);

            echo json_encode($res);
        }
    }

    //------------------------------------



    //-------------order detail-------------------
    public function orderdetail()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'required|xss_clean|trim');
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('order_id', 'order_id', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $phone=$this->input->post('phone');
                $authentication=$this->input->post('authentication');
                $token_id=$this->input->post('token_id');
                $order_id=$this->input->post('order_id');


                $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where('phone', $phone);
                $user_data= $this->db->get()->row();

                if (!empty($user_data)) {
                    if ($user_data->authentication==$authentication) {
                        $this->db->select('*');
                        $this->db->from('tbl_order2');
                        $this->db->where('main_id', $order_id);
                        $dsa= $this->db->get();
                        $da=$dsa->row();
                        $order2 = [] ;
                        $subtotal= 0 ;
                        foreach ($dsa->result() as $data) {
                            $this->db->select('*');
                            $this->db->from('tbl_products');
                            $this->db->where('id', $data->product_id);
                            $product_data= $this->db->get()->row();


                            $order2[]=array(
'product_id' =>$product_data->id,
'product_name' =>$product_data->productname,
'product_image' =>base_url().$product_data->image,
'quantity'=> $data->quantity,
'price'=>$data->product_mrp,
'total amount'=>$data->total_amount,



);
                            $subtotal = $subtotal + $data->total_amount;
                        }

                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>"success",
'status'=>200,
'data'=>$order2,
'subtotal'=>$subtotal
);

                        echo json_encode($res);
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Wrong authentication',
'status'=>201
);

                        echo json_encode($res);
                    }
                } else {
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>'Phone number not found',
'status'=>201
);

                    echo json_encode($res);
                }
            } else {
                header('Access-Control-Allow-Origin: *');
                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');
            $res = array('message'=>"Please insert some data",
'status'=>201
);

            echo json_encode($res);
        }
    }

    //footer subscription
    public function subscribe_us()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'email', 'required|valid_email|xss_clean');

            if ($this->form_validation->run()== true) {
                $email=$this->input->post('email');

                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                $this->db->select('*');
                $this->db->from('tbl_subscribe_us');
                $this->db->where('email_id', $email);
                $dsa= $this->db->get();
                $da=$dsa->row();
                if (!empty($da)) {
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>"Already applied",
'status'=>201
);

                    echo json_encode($res);
                    exit;
                }

                $data_insert = array('email_id'=>$email,
'ip' =>$ip,
'date' =>$cur_date,


);


                $last_id=$this->base_model->insert_table("tbl_subscribe_us", $data_insert, 1) ;

                if ($last_id!=0) {
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>"success",
'status'=>200
);

                    echo json_encode($res);
                } else {
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>"sorry error occured",
'status'=>201
);

                    echo json_encode($res);
                }
            } else {
                header('Access-Control-Allow-Origin: *');
                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');
            $res = array('message'=>'No data available',
'status'=>201
);

            echo json_encode($res);
        }
    }

    ///cancel_order
    public function cancel_order()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'required|xss_clean|trim');
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('order_id', 'order_id', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $phone=$this->input->post('phone');
                $authentication=$this->input->post('authentication');
                $token_id=$this->input->post('token_id');
                $order_id=$this->input->post('order_id');

                $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where('phone', $phone);
                $user_data= $this->db->get()->row();

                if (!empty($user_data)) {
                    if ($user_data->authentication==$authentication) {
                        $data_insert = array('order_status'=>5,
);

                        $this->db->where('id', $order_id);
                        $last_id=$this->db->update('tbl_order1', $data_insert);

                        $this->db->select('*');
                        $this->db->from('tbl_order2');
                        $this->db->where('main_id', $order_id);
                        $data_order1= $this->db->get();

                        if (!empty($data_order1)) {
                            foreach ($data_order1->result() as $data) {
                                $this->db->select('*');
                                $this->db->from('tbl_products');
                                $this->db->where('id', $data->product_id);
                                $data_inventory= $this->db->get()->row();

                                $total_quantity=$data->quantity + $data_inventory->inventory;



                                $data_update=array(
'inventory'=>$total_quantity
);
                                $this->db->where('id', $data->product_id);
                                $last_id2=$this->db->update('tbl_products', $data_update);
                            }


                            if (!empty($last_id)) {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>'success',
'status'=>200
);

                                echo json_encode($res);
                            } else {
                                header('Access-Control-Allow-Origin: *');
                                $res = array('message'=>'some error occured',
'status'=>201
);

                                echo json_encode($res);
                            }
                        } else {
                            header('Access-Control-Allow-Origin: *');
                            $res = array('message'=>'Order id not found',
'status'=>201
);

                            echo json_encode($res);
                        }
                    } else {
                        header('Access-Control-Allow-Origin: *');
                        $res = array('message'=>'Wrong authantication',
'status'=>201
);

                        echo json_encode($res);
                    }
                } else {
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>'Phone number not found',
'status'=>201
);

                    echo json_encode($res);
                }
            } else {
                header('Access-Control-Allow-Origin: *');

                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');

            $res = array('message'=>'No data available',
'status'=>201
);

            echo json_encode($res);
        }
    }

    //------------filter-----
    public function filter()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('type_id', 'type_id', 'xss_clean|trim');
            $this->form_validation->set_rules('wattage_id', 'wattage_id', 'xss_clean|trim');
            $this->form_validation->set_rules('size_id', 'size_id', 'xss_clean|trim');
            $this->form_validation->set_rules('filter_product_id', 'filter_product_id', 'xss_clean|trim');
            $this->form_validation->set_rules('color_id', 'color_id', 'xss_clean|trim');
            $this->form_validation->set_rules('model', 'model', 'xss_clean|trim');
            $this->form_validation->set_rules('subcategory_id', 'subcategory_id', 'xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $type_id=$this->input->post('type_id');
                $wattage_id=$this->input->post('wattage_id');
                $size_id=$this->input->post('size_id');
                $filter_product_id=$this->input->post('filter_product_id');
                $color_id=$this->input->post('color_id');
                $model=$this->input->post('model');
                $subcategory_id=$this->input->post('subcategory_id');
                // echo $subcategory_id;exit;


                $type_info = explode(',', $type_id);
                $wattage_info = explode(',', $wattage_id);
                $size_info = explode(',', $size_id);
                $filter_product_info = explode(',', $filter_product_id);
                $color_info = explode(',', $color_id);
                $model_info = explode(',', $model);


                $this->db->select('*');
                $this->db->from('tbl_products');
                // print_r($type_info);die();
                if (!empty($subcategory_id)) {
                    $this->db->where('subcategory_id', $subcategory_id);
                }
                $filter_data= $this->db->get();
                // $filter_check = $filter_data->row();
                 $send = [];
                $content = [];
                foreach($filter_data->result() as $filterrr){
                  if($filterrr->is_active == 1){
                  if (!empty($type_info[0])) {
                      foreach ($type_info as $data0) {
                          if($filterrr->type == $data0){
                            //    $send = [];
                            $send[] = array('product_id'=>$filterrr->id,
                            'product_name'=>$filterrr->productname,
                            'product_image'=>base_url().$filterrr->image,
                            'productdescription'=>$filterrr->productdescription,
                            'MRP'=>$filterrr->mrp,
                            'price'=>$filterrr->sellingprice,
                          );
                          //  array_push($content, $send);
                          }
                      }
                  }
                  if (!empty($wattage_info[0])) {
                      foreach ($wattage_info as $data1) {
                          if($filterrr->wattage == $data1){
                            //    $send = [];
                            $send[] = array('product_id'=>$filterrr->id,
                            'product_name'=>$filterrr->productname,
                            'product_image'=>base_url().$filterrr->image,
                            'productdescription'=>$filterrr->productdescription,
                            'MRP'=>$filterrr->mrp,
                            'price'=>$filterrr->sellingprice,
                          );
                          //  array_push($content, $send);
                          }
                      }
                  }
                  if (!empty($size_info[0])) {
                      foreach ($size_info as $data2) {
                          if($filterrr->size == $data2){
                            //    $send = [];
                            $send[] = array('product_id'=>$filterrr->id,
                            'product_name'=>$filterrr->productname,
                            'product_image'=>base_url().$filterrr->image,
                            'productdescription'=>$filterrr->productdescription,
                            'MRP'=>$filterrr->mrp,
                            'price'=>$filterrr->sellingprice,
                          );
                          //  array_push($content, $send);
                          }
                      }
                  }
                  if (!empty($filter_product_info[0])) {
                      foreach ($filter_product_info as $data3) {
                          if($filterrr->filter_product == $data3){
                            //    $send = [];
                            $send[] = array('product_id'=>$filterrr->id,
                            'product_name'=>$filterrr->productname,
                            'product_image'=>base_url().$filterrr->image,
                            'productdescription'=>$filterrr->productdescription,
                            'MRP'=>$filterrr->mrp,
                            'price'=>$filterrr->sellingprice,
                          );
                          //  array_push($content, $send);
                          }
                      }
                  }
                  if (!empty($color_info[0])) {
                      foreach ($color_info as $data4) {
                          if($filterrr->color == $data4){
                            //    $send = [];
                            $send[] = array('product_id'=>$filterrr->id,
                            'product_name'=>$filterrr->productname,
                            'product_image'=>base_url().$filterrr->image,
                            'productdescription'=>$filterrr->productdescription,
                            'MRP'=>$filterrr->mrp,
                            'price'=>$filterrr->sellingprice,
                          );
                          //  array_push($content, $send);
                          }
                      }
                  }
                  if (!empty($model_info[0])) {
                      foreach ($model_info as $data5) {
                          if($filterrr->car_model_id == $data5){
                            //    $send = [];
                            $send[] = array('product_id'=>$filterrr->id,
                            'product_name'=>$filterrr->productname,
                            'product_image'=>base_url().$filterrr->image,
                            'productdescription'=>$filterrr->productdescription,
                            'MRP'=>$filterrr->mrp,
                            'price'=>$filterrr->sellingprice,
                          );
                          //  array_push($content, $send);
                          }
                        }
                      }
                    }
                  }

                // array_unique($content);
                // print_r(json_encode($send));exit;
                $content = [];
              //   $content = array('product_id'=>0);
                $count = 0;
              //   print_r($content);
                foreach ($send as $object) {
                  foreach($content as $pushin){
                if($count > 0){
                 if($object['product_id'] == $pushin['product_id']){
                   // echo "1";
                 }else{
                   $content[] = array('product_id'=>$object['product_id'],
                      'product_name'=>$object['product_name'],
                      'product_image'=>$object['product_image'],
                      'productdescription'=>$object['productdescription'],
                      'MRP'=>$object['MRP'],
                      'price'=>$object['price'],
                      );
                 }
                }
              }
              $count++;
              if($count==1){ $content[] = array('product_id'=>$object['product_id'],
                 'product_name'=>$object['product_name'],
                 'product_image'=>$object['product_image'],
                 'productdescription'=>$object['productdescription'],
                 'MRP'=>$object['MRP'],
                 'price'=>$object['price'],
               );
               }
              }
                //  print_r($content);
                // exit;
                header('Access-Control-Allow-Origin: *');
                $res = array('message'=>'success',
                  'status'=>200,
                  'data'=>$content,
                  );

                echo json_encode($res);
            } else {
                header('Access-Control-Allow-Origin: *');

                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');

            $res = array('message'=>'No data available',
'status'=>201
);

            echo json_encode($res);
        }
    }

    //-----------filter_data-------------------

    public function view_filter($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_subcategory');
        $this->db->where('id', $id);
        $subcategory_data= $this->db->get()->row();

        //type
        $this->db->select('*');
        $this->db->from('tbl_type');
        $this->db->where('is_active', 1);
        $type_id= $this->db->get();
        $type_data=[];
        $type=json_decode($subcategory_data->type);
        if (!empty($type)) {
            foreach ($type_id->result() as $value) {
                $a=0;
                foreach ($type as $data) {
                    if ($data==$value->id) {
                        $a=1;
                    }
                }
                if ($a==1) {
                    $type_data[]=array(
'id'=>$value->id,
'name'=>$value->name
);
                }
            }
        }
        //wattage
        $this->db->select('*');
        $this->db->from('tbl_wattage');
        $this->db->where('is_active', 1);
        $wattage_id= $this->db->get();
        $wattage_data=[];
        $wattage=json_decode($subcategory_data->wattage);
        if (!empty($wattage)) {
            foreach ($wattage_id->result() as $value) {
                $a=0;
                foreach ($wattage as $data) {
                    if ($data==$value->id) {
                        $a=1;
                    }
                }
                if ($a==1) {
                    $wattage_data[]=array(
'id'=>$value->id,
'name'=>$value->name
);
                }
            }
        }
        //size
        $this->db->select('*');
        $this->db->from('tbl_size');
        $this->db->where('is_active', 1);
        $size_id= $this->db->get();
        $size_data=[];
        $size=json_decode($subcategory_data->size);
        if (!empty($size)) {
            foreach ($size_id->result() as $value) {
                $a=0;
                foreach ($size as $data) {
                    if ($data==$value->id) {
                        $a=1;
                    }
                }
                if ($a==1) {
                    $size_data[]=array(
'id'=>$value->id,
'name'=>$value->name
);
                }
            }
        }
        //filter_product
        $this->db->select('*');
        $this->db->from('tbl_filter_product');
        $this->db->where('is_active', 1);
        $filter_product_id= $this->db->get();
        $filter_product_data=[];
        $filter_product=json_decode($subcategory_data->filter_product);
        if (!empty($filter_product)) {
            foreach ($filter_product_id->result() as $value) {
                $a=0;
                foreach ($filter_product as $data) {
                    if ($data==$value->id) {
                        $a=1;
                    }
                }
                if ($a==1) {
                    $filter_product_data[]=array(
'id'=>$value->id,
'name'=>$value->name
);
                }
            }
        }
        //color
        $this->db->select('*');
        $this->db->from('tbl_color');
        $this->db->where('is_active', 1);
        $color_id= $this->db->get();
        $color_data=[];
        $color=json_decode($subcategory_data->color);
        if (!empty($color)) {
            foreach ($color_id->result() as $value) {
                $a=0;
                foreach ($color as $data) {
                    if ($data==$value->id) {
                        $a=1;
                    }
                }
                if ($a==1) {
                    $color_data[]=array(
'id'=>$value->id,
'name'=>$value->name
);
                }
            }
        }



        $filter_name=[];
        $filter_name[]=array(
'type'=>$type_data,
'wattage'=>$wattage_data,
'size'=>$size_data,
'filter_product'=>$filter_product_data,
'color'=>$color_data,
);

        header('Access-Control-Allow-Origin: *');

        $res = array('message'=>'success',
'status'=>200,
'data'=>$filter_name,
);

        echo json_encode($res);
    }

    public function feedback()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
            $this->form_validation->set_rules('contact', 'contact', 'required|xss_clean|trim');
            $this->form_validation->set_rules('message', 'message', 'required|xss_clean|trim');


            if ($this->form_validation->run()== true) {
                $name=$this->input->post('name');
                $contact=$this->input->post('contact');
                $message=$this->input->post('message');

                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                $data_insert = array('name'=>$name,
'contact'=>$contact,
'message'=>$message,
'ip' =>$ip,
'date'=>$cur_date
);

                $last_id=$this->base_model->insert_table("tbl_feedback", $data_insert, 1) ;

                if (!empty($last_id)) {
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>'success',
'status'=>200
);

                    echo json_encode($res);
                } else {
                    header('Access-Control-Allow-Origin: *');
                    $res = array('message'=>'Some error occured',
'status'=>201
);

                    echo json_encode($res);
                }
            } else {
                header('Access-Control-Allow-Origin: *');
                $res = array('message'=>validation_errors(),
'status'=>201
);

                echo json_encode($res);
            }
        } else {
            header('Access-Control-Allow-Origin: *');
            $res = array('message'=>"Please insert some data, No data available",
'status'=>201
);

            echo json_encode($res);
        }
    }
    // ========= gallery =========
    public function get_gallery()
    {
        $this->db->select('*');
        $this->db->from('tbl_gallery');
        $this->db->where('is_active', 1);
        $gallerydata= $this->db->get();
        $gallery=[];
        foreach ($gallerydata->result() as $data) {
            $gallery[] = array(
'name'=> $data->name,
'link'=> $data->link,
'image'=> base_url().$data->image,

);
        }
        header('Access-Control-Allow-Origin: *');
        $res = array('message'=>"success",
'status'=>200,
'data'=>$gallery
);

        echo json_encode($res);
    }

    // ========= Get Two images =============
    public function get_two_images()
    {
        $this->db->select('*');
        $this->db->from('tbl_two_images');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'desc');
        $two_image_data= $this->db->get();
        $two_image=[];
        foreach ($two_image_data->result() as $data) {
            $two_image = array(
'image1'=> base_url().$data->image1,
'image2'=> base_url().$data->image2,
);
        }
        header('Access-Control-Allow-Origin: *');
        $res = array('message'=>"success",
'status'=>200,
'data'=>$two_image
);

        echo json_encode($res);
    }

    //===============get_brands=================================
    public function get_brands()
    {
        $this->db->select('*');
        $this->db->from('tbl_brands');
        $this->db->where('is_active', 1);
        $brand_data= $this->db->get();
        $brands=[];
        foreach ($brand_data->result() as $data) {
            $this->db->select('*');
            $this->db->from('tbl_car_model');
            $this->db->where('brand_id', $data->id);
            $this->db->where('is_active', 1);
            $car_model_data= $this->db->get();
            $car_model=[];
            foreach ($car_model_data->result() as $data2) {
                $car_model[] = array('id'=>$data2->id,
'name'=>$data2->name
);
            }
            $brands[] = array('id'=>$data->id,
'name'=>$data->name,
'car_model'=>$car_model
);
        }
        header('Access-Control-Allow-Origin: *');
        $res = array('message'=>"success",
'status'=>200,
'data'=>$brands
);

        echo json_encode($res);
    }
    //================get_car_model==================
    // public function get_car_model($idd){
//
//
//
    //   header('Access-Control-Allow-Origin: *');
    //   $res = array('message'=>"success",
    //   'status'=>200,
    //   'data'=>$car_model
    //   );
//
    //   echo json_encode($res);
    // }

    public function get_rel_products($b_id="", $m_id="")
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('is_active', 1);
        if (!empty($b_id)) {
            $this->db->where('brand_id', $b_id);
        }
        if (!empty($m_id)) {
            $this->db->where('car_model_id', $m_id);
        }
        $products_data= $this->db->get();
        $products=[];
        if (!empty($m_id)) {
            $this->db->select('*');
            $this->db->from('tbl_car_model');
            $this->db->where('is_active', 1);
            $this->db->where('id', $m_id);
            $mdata= $this->db->get()->row();
            $heading= $mdata->name;
        } elseif (!empty($b_id)) {
            $this->db->select('*');
            $this->db->from('tbl_brands');
            $this->db->where('id', $b_id);
            $this->db->where('is_active', 1);
            $bdata= $this->db->get()->row();
            $heading= $bdata->name;
        } else {
            $heading = "Shop By Car";
        }
        foreach ($products_data->result() as $data) {
          if ($data->inventory>0) {
              $stock = 1;
          } else {
              $stock = 0;
          }
            $products[] = array(  'modelno'=>$data->modelno,
'product_id'=>$data->id,
'product_name'=>$data->productname,
'description'=> $data->productdescription,
'mrp'=> $data->mrp,
'price'=>$data->sellingprice,
'image'=>base_url().$data->image,
'stock'=>$stock
);
        }
        header('Access-Control-Allow-Origin: *');
        $res = array('message'=>"success",
'status'=>200,
'data'=>$products,
'heading'=>$heading
);

        echo json_encode($res);
    }
}
