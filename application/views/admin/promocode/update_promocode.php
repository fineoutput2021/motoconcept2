        <div class="content-wrapper">
        <section class="content-header">
           <h1>
          Update Promocode
          </h1>
          <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dcadmin/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() ?>dcadmin/Promocode/view_promocode"><i class="fa fa-dashboard"></i> View Promocode</a></li>
        </ol>
        </section>
    <section class="content">
    <div class="row">
       <div class="col-lg-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Update Promocode </h3>
                            </div>

                                     <? if(!empty($this->session->flashdata('smessage'))){  ?>
                                          <div class="alert alert-success alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                      <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                     <? echo $this->session->flashdata('smessage');  ?>
                                    </div>
                                       <? }
                                       if(!empty($this->session->flashdata('emessage'))){  ?>
                                       <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                   <? echo $this->session->flashdata('emessage');  ?>
                                  </div>
                                     <? }  ?>


                            <div class="panel-body">
                                <div class="col-lg-10">
                                   <form action=" <?php echo base_url(); ?>dcadmin/Promocode/add_promocode_data/<? echo base64_encode(2); ?>/<?=$id;?>" method="POST" id="slide_frm" enctype="multipart/form-data">
                                <div class="table-responsive">
                                    <table class="table table-hover">
	 <tr>
 <td> <strong>Promocode</strong>  <span style="color:red;">*</span></strong> </td>
 <td> <input type="text" name="promocode"  class="form-control" placeholder="" required value="<?=$promocode_data->promocode;?>" />  </td>
 </tr>
 <tr>
<td> <strong>Promocode Type</strong>  <span style="color:red;">*</span></strong> </td>
<td>
<select class="form-control" required name="ptype">

  <option value="1" <?php if($promocode_data->ptype==1){ echo "selected" ; } ?>>One Time</option>
  <option value="2" <?php if($promocode_data->ptype==2){ echo "selected" ; } ?>>Every Time</option>
</select>
</td>
</tr>
	 <tr>
 <td> <strong>Giftpercent</strong>  <span style="color:red;">*</span></strong> </td>
 <td> <input type="number" name="giftpercent"  class="form-control" placeholder="" required value="<?=$promocode_data->giftpercent;?>" />  </td>
 </tr>
	 <tr>
 <td> <strong>Minorder</strong>  <span style="color:red;">*</span></strong> </td>
 <td> <input type="number" name="minorder"  class="form-control" placeholder="" required value="<?=$promocode_data->minorder;?>" />  </td>
 </tr>
	 <tr>
 <td> <strong>Max</strong>  <span style="color:red;">*</span></strong> </td>
 <td> <input type="number" name="max"  class="form-control" placeholder="" required value="<?=$promocode_data->max;?>" />  </td>
 </tr>
 <tr>
<td> <strong>Expiry</strong>  <span style="color:red;">*</span></strong> </td>
<td> <input type="date" name="expiry"  class="form-control" placeholder="" required value="<?=$promocode_data->expiry?>" />  </td>
</tr>


                          <tr>
                            <td colspan="2" >
                              <input type="submit" class="btn custom_btn" value="save">
                            </td>
                          </tr>
                                        </table>
                                    </div>

                                 </form>

                                    </div>



                                </div>

                            </div>

                        </div>
                        </div>
            </section>
          </div>


<script type="text/javascript" src=" <?php echo base_url()  ?>assets/slider/ajaxupload.3.5.js"></script>
<link href=" <? echo base_url()  ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
