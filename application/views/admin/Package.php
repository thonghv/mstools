<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Gói Đầu Tư - Quản Lý Hệ Thống</title>
        <link href="<?php echo base_url();?>public/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <meta name="description" content="overview & stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- basic styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/admin/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/admin/bootstrap-responsive.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/admin/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.0.1/css/font-awesome.css" />

        <!-- page specific plugin styles -->
        
        <!-- bookstore styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/admin/ace.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/admin/ace-responsive.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/admin/ace-skins.min.css">
        
        <!--[if lt IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->
    </head>
    <body>
        
        <?php $this->load->view("admin/layout/header.php");?>

        <?php $this->load->view("admin/layout/menu_body.php");?>
        
            <div id="main-content" class="clearfix">
                    
                    <div id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li><i class="icon-home"></i> <a href="#">Trang Chủ</a><span class="divider"><i class="icon-angle-right"></i></span></li>
                            <li class="active">Gói Đầu Tư</li>
                        </ul><!--.breadcrumb-->

                        <div id="nav-search">
                            <form class="form-search">
                                    <span class="input-icon">
                                        <input autocomplete="off" id="nav-search-input" type="text" class="input-small search-query" placeholder="Tìm kiếm ..." />
                                        <i id="nav-search-icon" class="icon-search"></i>
                                    </span>
                            </form>
                        </div><!--#nav-search-->
                    </div><!--#breadcrumbs-->
                    <div id="page-content" class="clearfix"><!--/page-header-->
                        
                        <div class="row-fluid">
<!-- PAGE CONTENT BEGINS HERE --><!--/row-->

<div class="row-fluid">
    <h3 class="header smaller lighter blue">GÓI ĐẦU TƯ
        <span style ="padding-left:80%"> </span>
    </h3> 
    <?php
    if(!isset( $_SESSION )) 
    { 
        session_start (); 
    } 
    if($this->session->userdata('success')!=NULL)
    {?>                  
    <div class="alert alert-block alert-success">
         <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
         <i class="icon-ok green"></i> Xác nhận tài khoản rút tiền thành công!
    </div>
    <?php }?>
    <div class="box-blue">
        <div class="col-xs-4" style ="padding-bottom: 10px">
            <form id="contact" enctype="multipart/form-data" style ="margin-bottom: 0px" action="<?php echo base_url(); ?>admin/package/search" method="post">
                <span style = "padding: 8px; background-color: #d9edf7; border-color: #bce8f1;">Lọc Theo Ngày &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <input type="date" style ="width: 150px; margin-top: 5px;" name="date_search_from" value="" id="date_search_from" /> 
                -
                <input type="date" style ="width: 150px; margin-top: 5px;" name="date_search_to" value="" id="date_search_to"/> 
                <script src="jquery-ui-1.8.20.custom.min.js">
                </script>
                <script>
                        $('#date_search').datepicker();
                        $('#date_search_to').datepicker();
                </script>
                <input name="inputReport" class='btn btn-mini btn-info' style="padding: 3px 15px !important; margin-bottom: 4px" type="submit" value="Tìm Kiếm">
            </form>
        </div>
        <div class="col-xs-4" style ="padding-bottom: 15px">
            <span style = "padding: 8px; background-color: #d9edf7; border-color: #bce8f1;">Tổnng Giá Trị Các Gói</span>
            <span style = "padding: 8px; background-color: #f3f3f3; border-color: #f3f3f3; padding-right: 386px;"><?php echo $sum; ?> $</span>
        </div>
                    
        <table id="table_report" class="table table-striped table-bordered table-hover">
            <thead>
                    <tr>
                       <th style ="width: 30px;" class="center"> 
                          <label><input type="checkbox" /><span class="lbl"></span></label>
                        </th>
                        <th style ="width: 100px;">Tài Khoản</th>
                        <th style ="width: 150px;">Họ Tên</th>
                        <th style ="width: 130px;">Gói Đầu Tư</th>
                        <th style ="width: 140px;" class="hidden-phone">Lượt Trả Thưởng</th>
                        <th style ="width: 250px;" class="hidden-phone">Ngày Mua</th>
                        <th></th>
                    </tr>
                </thead>
                                        
                <tbody>
                     <?php
                        if($package != null){
                          foreach ($package as $row) :
                          $row=(object)$row;
                          ?>          
                    <tr>
                        <td class='center'>
                            <label><input type='checkbox' /><span class="lbl"></span></label>
                        </td>
                        <td id="masp"><a href='#'><?php echo  $row -> user_name ; ?></a></td>
                        <td><a href='#'><?php echo  $row -> full_name ; ?></a></td>
                        <td>
                            <?php echo ($row->package); ?>
                        </td>
                        <td class='hidden-phone'><?php echo ($row->num_reward); ?> / 25</td>
                        <td class='hidden-480'>
                            <?php
                                $userTimezone = new DateTimeZone('Asia/Ho_Chi_Minh');
                                $gmtTimezone = new DateTimeZone(date_default_timezone_get());
                                $myDateTime = new DateTime($row->updated, $gmtTimezone);
                                $offset = $userTimezone->getOffset($myDateTime);
                                $myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
                                $myDateTime->add($myInterval);
                                $result = $myDateTime->format('Y-m-d H:i');
                                echo $result;
                            ?>
                        </td>
                        <td>
                                 
                            <div class='hidden-phone visible-desktop btn-group'>

                                </div>
                             
                            <div class='hidden-desktop visible-phone'>
                                <div class="inline position-relative">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"><i class="icon-caret-down icon-only"></i></button>
                                    <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                                        <li><a href="#" class="tooltip-success" data-rel="tooltip" title="Edit" data-placement="left"><span class="green"><i class="icon-edit"></i></span></a></li>
                                        <li><a href="#" class="tooltip-warning" data-rel="tooltip" title="Flag" data-placement="left"><span class="blue"><i class="icon-flag"></i></span> </a></li>
                                        <li><a href="#" class="tooltip-error" data-rel="tooltip" title="Delete" data-placement="left"><span class="red"><i class="icon-trash"></i></span> </a></li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>         
                    <?php endforeach; }?></tbody>
            </table>
    </div>
</div>


 
 
<!-- PAGE CONTENT ENDS HERE -->
                         </div><!--/row-->
    
                    </div><!--/#page-content-->
                      

                    <div id="ace-settings-container">
                        <div class="btn btn-app btn-mini btn-warning" id="ace-settings-btn">
                            <i class="icon-cog"></i>
                        </div>
                        <div id="ace-settings-box">
                            <div>
                                <div class="pull-left">
                                    <select id="skin-colorpicker" class="hidden">
                                        <option data-class="default" value="#438EB9">#438EB9</option>
                                        <option data-class="skin-1" value="#222A2D">#222A2D</option>
                                        <option data-class="skin-2" value="#C6487E">#C6487E</option>
                                        <option data-class="skin-3" value="#D0D0D0">#D0D0D0</option>
                                    </select>
                                </div>
                                <span>&nbsp; Choose Skin</span>
                            </div>
                            <div><input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" /><label class="lbl" for="ace-settings-header"> Fixed Header</label></div>
                            <div><input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" /><label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label></div>
                        </div>
                    </div><!--/#ace-settings-container-->


            </div><!-- #main-content -->


        </div><!--/.fluid-container#main-container-->




        <a href="#" id="btn-scroll-up" class="btn btn-small btn-inverse">
            <i class="icon-double-angle-up icon-only"></i>
        </a>


        <!-- basic scripts -->
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo base_url();?>public/js/admin/jquery-1.9.1.min.js'>\x3C/script>");
        </script>
        
        
        <script src="<?php echo base_url();?>/public/js/admin/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->
        
        <script type="text/javascript" src="<?php echo base_url();?>public/js/admin/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>public/js/admin/jquery.dataTables.bootstrap.js"></script>
        
        <!-- ace scripts -->
        <script type="text/javascript" src="<?php echo base_url();?>public/js/admin/ace-elements.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>public/js/admin/ace.min.js"></script>


        <!-- inline scripts related to this page -->
        
        <script type="text/javascript">
        $(function() {


    var oTable1 = $('#table_report').dataTable( {
    "aoColumns": [
      { "bSortable": false },
      null, null, null, null, null, 
      { "bSortable": false }
    ] } );
    
    
    $('table th input:checkbox').on('click' , function(){
        var that = this;
        $(this).closest('table').find('tr > td:first-child input:checkbox')
        .each(function(){
            this.checked = that.checked;
            $(this).closest('tr').toggleClass('selected');
        });
            
    });

    $('[data-rel=tooltip]').tooltip();
})

        </script>
<?php $this->session->unset_userdata('status'); ?>
<?php $this->session->unset_userdata('success'); ?>
    </body>
</html>
