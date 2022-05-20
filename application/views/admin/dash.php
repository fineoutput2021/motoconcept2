
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
          </h1>
          <ol class="breadcrumb">
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">TOTAL VENDORS</span>
                  <span class="info-box-number">0</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">NEW VENDOR REQUESTS</span>
                  <span class="info-box-number">
                    <?
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date=date("Y-m-d H:i:s");
                    $this->db->select('*');
                    $this->db->from('tbl_user_temp');
                    $this->db->where('date', $cur_date);
                    $tot_vendors= $this->db->count_all_results();
                    echo $tot_vendors;
                    ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">APPROVED VENDORS</span>
                  <span class="info-box-number">
                    <?$this->db->select('*');
                    $this->db->from('tbl_users');
                    $this->db->where('is_active', 1);
                    $app_vendors= $this->db->count_all_results();
                    echo $app_vendors;
                    ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">PENDING VENDORS</span>
                  <span class="info-box-number"><?$this->db->select('*');
                  $this->db->from('tbl_user_temp');
                  $tot_vendors= $this->db->count_all_results();
                  echo $tot_vendors;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">TOTAL ORDERS</span>
                  <span class="info-box-number"><?$this->db->select('*');
                  $this->db->from('tbl_order1');
                  $tot_orders= $this->db->count_all_results();
                  echo $tot_orders;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">ON HOLD ORDERS</span>
                    <span class="info-box-number"><?$this->db->select('*');
                    $this->db->from('tbl_order1');
                    $this->db->where('order_status', 6);
                    $tot_orders= $this->db->count_all_results();
                    echo $tot_orders;?></span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">New Orders</span>
                  <span class="info-box-number"><?
                  date_default_timezone_set("Asia/Calcutta");
                  $cur_date=date("Y-m-d H:i:s");
                  $this->db->select('*');
                  $this->db->from('tbl_order1');
                  $this->db->like('date', $cur_date);
                  $new_order_count= $this->db->count_all_results();
                  echo $new_order_count;
                  ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-white"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">TOTAL PRODUCTS</span>
                  <span class="info-box-number">
                    <?$this->db->select('*');
                    $this->db->from('tbl_products');
                    $pro_count= $this->db->count_all_results(); echo $pro_count;?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-white"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">OUT OF STOCK PRODUCTS</span>
                  <span class="info-box-number"><?$this->db->select('*');
                  $this->db->from('tbl_products');
                  $this->db->where('inventory', 0);
                  $out_of_stock= $this->db->count_all_results(); echo $out_of_stock;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

          </div><!-- /.row -->


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


    </div><!-- ./wrapper -->
