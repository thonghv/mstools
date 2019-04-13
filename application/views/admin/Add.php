<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>New song  - Music Tools</title>
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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/admin/mystyle.css">
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
                            <li><i class="icon-home"></i> <a href="<?php echo base_url();?>">Home</a><span class="divider"><i class="icon-angle-right"></i></span></li>
                            <li class="active">Add</li>
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
<script language=javascript>
 function checkform() {
    if (document.inbox.name.value == '') {
        document.inbox.name.focus();
        return false;
    }
    if (document.inbox.cost.value == '') {
        document.inbox.cost.focus();
        return false;
    }
    if (document.inbox.origin.value == '') {
        document.inbox.origin.focus();
        return false;
    }
    if (document.inbox.profit.value == '') {
        document.inbox.profit.focus();
        return false;
    }
    if (isNaN(document.inbox.origin.value)) 
    {
        document.inbox.origin.focus();
        return false;
    }
    if (isNaN(document.inbox.profit.value)) 
    {
        document.inbox.profit.focus();
        return false;
    }
    return true;
 }

 </script>

<div class="row-fluid">
    <h3 class="header smaller lighter blue"><span style="color:#9a2550">
     <?php
    
                    if($category != null){
                      foreach ($category as $row) :
                      $row=(object)$row;
                      
                        echo $row ->name;

                      endforeach; }?> </span>
    </h3> 
    <form method='post' onsubmit="return checkform()"  class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url();?>category/insertSong" name="inbox">
        <div class="tabbable">
            <table align="left" cellpadding="7" cellspacing="10">
             <tr>
             
                 <?php
                     $categoryId = 0;
                    if($category != null){
                      foreach ($category as $row) :
                      $row=(object)$row;
                        $categoryId = $row ->id;
                       ?>
                       <td colspan="2"><label for="title"></label>
                            <input type="hidden" id="category" name="category" value="<?php echo $categoryId; ?>" class="form-control" style ="width: 500px"/>
                        </td>   

                     <?php endforeach; }?>       
            </tr>
            <tr>
                <td>
                   <label class="col-sm-3 control-label no-padding-right" for="form-field-oldpass">Name</label>
                </td>
                <td colspan="2"><label for="title"></label>
                   <input type="text" id="name" name="name" value="" class="form-control" style ="width: 500px"/>
                </td>            
            </tr>
            <tr>
                <td>
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-oldpass">Author</label>
                </td>
                <td colspan="2"><label for="title"></label>
                   <input type="text" id="cost" name="author" value="" class="form-control" style ="width: 500px"/>
                </td>         
            </tr>
            <tr>
                <td>
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-oldpass">Image URL</label>
                </td>
                <td colspan="2"><label for="title"></label>
                   <input type="text" id="origin" name="image" value="" class="form-control" style ="width: 500px"/>
                </td>            
            </tr>
            <tr>
                <td>
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-oldpass">Stream URL</label>
                </td>
                <td colspan="2"><label for="title"></label>
                   <input type="text" id="profit" name="stream" value="" class="form-control" style ="width: 500px"/>
                </td>            
            </tr>
             <tr>
                <td>
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-oldpass">Likes</label>
                </td>
                <td colspan="2"><label for="title"></label>
                   <input type="text" id="profit" name="like" value="" class="form-control" style ="width: 500px"/>
                </td>            
            </tr>
             <tr>
                <td>
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-oldpass">Views</label>
                </td>
                <td colspan="2"><label for="title"></label>
                   <input type="text" id="profit" name="view" value="" class="form-control" style ="width: 500px"/>
                </td>            
            </tr>
            </table>
        </div>
        <div class="clearfix form-actions" style ="padding-left: 20px">
            <div class="col-md-offset-3 col-md-9 no-marginleft">
                <button class="btn btn-info" type="submit">
                    <i class="icon-ok bigger-110"></i>
                                                Save Change    </button>

                                            &nbsp; &nbsp;
               <a href="<?php echo base_url();?>category/detail?id=<?php echo $categoryId; ?>">
                <input type="button" class="btn"  value=" <<&nbsp; Back"> </a>
            </div>
        </div>
    </form>
    
    <!-- -->
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
    </body>
</html>
