<div class="content-wrapper">
  <section class="content-header">
    <h1>
      New Orders
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">View New Order</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <!-- <a class="btn custom_btn" href="<?php echo base_url() ?>admin/home/add_team" role="button" style="margin-bottom:12px;"> Add Order</a> -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View New Orders</h3>
          </div>
          <div class="panel panel-default">

            <?php if (!empty($this->session->flashdata('smessage'))) { ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Alert!</h4>
              <?php echo $this->session->flashdata('smessage'); ?>
            </div>
            <?php }
                                               if (!empty($this->session->flashdata('emessage'))) { ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Alert!</h4>
              <?php echo $this->session->flashdata('emessage'); ?>
            </div>
            <?php } ?>


            <div class="panel-body">
              <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hover table-striped" id="printTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Order_id</th>
                      <th>User</th>
                      <th>Address Name</th>
                      <th>Promocode</th>
                      <th>Discount</th>
                      <th>Total Amount</th>
                      <th>Final Amount</th>
                      <th>User mob.</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Pincode</th>
                      <th>Payment type</th>
                      <th>Payment mode</th>
                      <th>Store</th>
                      <th>Last updated date</th>
                      <th>Order date</th>
                      <th>Bank Receipt</th>
                      <th>Order status</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($order_data->result() as $data) { ?>
                    <tr>
                      <td><?php echo $i ?> </td>
                      <td><?php echo $data->id  ?></td>
                      <td><?php $user_name=$data->user_id;
                               $this->db->select('*');
                                           $this->db->from('tbl_users');
                                           $this->db->where('id', $user_name);
                                           $check_username= $this->db->get()->row();
                                           if (!empty($check_username)) {
                                               echo $check_username->name;
                                           } else {
                                               echo "user_id not exist";
                                           }
                              ?></td>
                              <td><?php echo $data->name  ?></td>
                      <td><?php
                      if(!empty($data->promocode_id)){
                               $this->db->select('*');
                                           $this->db->from('tbl_promocode');
                                           $this->db->where('id', $data->promocode_id);
                                           $promocode_id= $this->db->get()->row();
                                           if (!empty($promocode_id)) {
                                               echo $promocode_id->promocode;
                                         }
                                       } else {
                                               echo "No promocode";
                                           }
                              ?></td>
                      <td><?php
                      if(empty($data->promocode_id)){
                        echo "???0";
                      }else{
                        echo "???".$data->discount;
                      }
                      ?></td>
                      <td>???<?php echo $data->total_amount;  ?></td>
                      <td>???<?php echo $data->final_amount;  ?></td>
                      <td><?php echo $data->phone  ?></td>
                      <td><?php echo $data->street_address  ?></td>
                      <td><?php echo $data->city  ?></td>
                      <td><?php
                                        $this->db->select('*');
                            $this->db->from('all_states');
                            $this->db->where('id', $data->state);
                            $state_data= $this->db->get()->row();
                            if (!empty($state_data)) {
                                echo $state_data->state_name;
                            } else {
                                echo "No state found";
                            }
                             ?></td>
                      <td><?php echo $data->pincode  ?></td>
                      <td><?php $type=$data->payment_type;
                            $n1="";
                            if($type==2){
                              $n1="Bank transfer";
                            }
                            if($type==1){
                              $n1="COD";
                            }
                            echo $n1;



                                       ?></td>
                                       <td>
                                         <?if(!empty($data->store_id)){
                                           echo "Pay at store";
                                         }else{
                                           echo "Pay at place";
                                         }?>
                                       </td>
                                       <td>
                                         <?
                                         if(!empty($data->store_id)){
                                         $this->db->select('*');
                                         $this->db->from('tbl_store');
                                         $this->db->where('id', $data->store_id);
                                         $store= $this->db->get()->row();
                                         if(!empty($store->name)){
                                           echo $store->name;
                                         }else{
                                           echo "Store not found";
                                         }
                                       }else{
                                         echo "-";
                                       }
                                         ?>
                                       </td>
                      <td><?php echo $data->date  ?></td>
                      <td><?php $check_order_date= $data->id;
                            $this->db->select('*');
                                        $this->db->from('tbl_order2');
                                        $this->db->where('main_id', $check_order_date);
                                        $check_order2= $this->db->get()->row();
                                        if (!empty($check_order2)) {
                                            echo $check_order2->date;
                                        } else {
                                            echo "no date found";
                                        }



                              ?></td>
                      <td>
                        <?php
                                if ($data->bank_receipt) {?>
                        <img src="<?=base_url().$data->bank_receipt?>" width="300" height="300">
                        <?} else {
                                    echo  "NA";
                                }
                                ?>
                      </td>
                      <td><?php $status=$data->order_status;
                            if ($status==1) {
                                $status="New Order";
                            }
                            if ($status==2) {
                                $status="Accepted";
                            }
                            if ($status==3) {
                                $status="DISPATCHED";
                            }
                            if ($status==4) {
                                $status="DELIVERED";
                            }
                            if ($status==5) {
                                $status="Cancel order";
                            }
                        echo $status;


                              ?></td>


                      <td>
                        <div class="btn-group" id="btns<?php echo $i ?>">
                          <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu">






                              <li><a href="<?php echo base_url() ?>dcadmin/Orders/update_order_status/<?php echo
base64_encode($data->id) ?>/accept">Accept order</a></li>

                              <li><a href="<?php echo base_url() ?>dcadmin/Orders/update_order_status/<?php echo
base64_encode($data->id) ?>/hold">Hold order</a></li>

                              <!-- <li><a href="<?php echo base_url() ?>dcadmin/Neworder/update_dispatch_status/<?php echo
base64_encode($data->id) ?>/dispatch">Dispatch order</a></li> -->



                              <li><a href="<?php echo base_url() ?>dcadmin/Orders/update_cancel_status/<?php echo
  base64_encode($data->id) ?>/Cancel">Cancel order</a></li>
  <li><a href="<?php echo base_url() ?>dcadmin/Orders/view_order_bill/<?php echo
base64_encode($data->id) ?>">view bill</a></li>

                              <li><a href="<?php echo base_url() ?>dcadmin/Orders/view_product_status/<?php echo
base64_encode($data->id) ?>">view product</a></li>
                              <!-- <li><a href="<?php echo base_url() ?>dcadmin/Neworder/view_order_bill/<?php echo
base64_encode($data->id) ?>">view bill</a></li> -->



                            </ul>
                          </div>
                        </div>

                        <div style="display:none" id="cnfbox<?php echo $i ?>">
                          <p> Are you sure delete this </p>
                          <a href="<?php echo base_url() ?>admin/home/delete_team/<?php echo base64_encode($data->id); ?>" class="btn btn-danger">Yes</a>
                          <a href="javasript:;" class="cans btn btn-default" mydatas="<?php echo $i ?>">No</a>
                        </div>
                      </td>
                    </tr>
                    <?php $i++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>
</div>

<style>
  label {
    margin: 5px;
  }
</style>

<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>


<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<script type="text/javascript">
  // buttons: [
  //     'copy', 'csv', 'excel', 'pdf', 'print'
  // ]
  $(document).ready(function() {
    $('#printTable').DataTable({
      responsive: true,
      "bStateSave": true,
      "fnStateSave": function (oSettings, oData) {
          localStorage.setItem('offersDataTables', JSON.stringify(oData));
      },
      "fnStateLoad": function (oSettings) {
          return JSON.parse(localStorage.getItem('offersDataTables'));
      },
      dom: 'Bfrtip',
      buttons: [{
          extend: 'copyHtml5',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18] //number of columns, excluding # column
          }
        },
        {
          extend: 'csvHtml5',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
          }
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
          }
        },
        {
          extend: 'pdfHtml5',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
          }
        },
        {
          extend: 'print',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
          }
        },

      ]


    });
    $(document.body).on('click', '.dCnf', function() {
      var i = $(this).attr("mydata");
      console.log(i);

      $("#btns" + i).hide();
      $("#cnfbox" + i).show();

    });

    $(document.body).on('click', '.cans', function() {
      var i = $(this).attr("mydatas");
      console.log(i);

      $("#btns" + i).show();
      $("#cnfbox" + i).hide();
    })

  });
</script>
