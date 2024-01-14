<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title> Admin | <?php echo $site_details['app_full_name'];?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('public/favicon.ico')?>">
				
				<!-- DataTables ( User List page ) -->
        <link href="<?php echo base_url('public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('public/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples ( User List page ) -->
        <!--<link href="<?php echo base_url('public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />-->
				
				<link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
				
				
        <link href="<?php echo base_url('public/assets/libs/chartist/chartist.min.css')?>" rel="stylesheet">

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url('public/assets/css/bootstrap.min.css')?>"  rel="stylesheet" type="text/css" />
        <!-- Sweet Alert -->
				<link href="<?php echo base_url('public/assets/libs/sweetalert2/sweetalert2.min.css')?>"  rel="stylesheet" type="text/css" />
				
				<!--	Bootstrap Tags Input	-->
				<link href="<?php echo base_url('public/assets/bootstrap-tags-input/bootstrap-tagsinput.css')?>"  rel="stylesheet" type="text/css" />
				
        <!-- Icons Css -->
        <link href="<?php echo base_url('public/assets/css/icons.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url('public/assets/css/app.min.css')?>" rel="stylesheet" type="text/css" />
				
				<!-- Custom Css-->
        <link href="<?php echo base_url('public/assets/css/custom.css')?>" rel="stylesheet" type="text/css" />
				<!-- End custom Css-->
				
				<script src="<?php echo base_url('public/assets/libs/jquery/jquery.min.js')?>"></script>
				
    </head>
			
    <body data-sidebar="dark">
				<script> 
					var baseURL = '<?php echo base_url();?>/'; 
					var pageName = '<?php echo $page_name;?>'; 
				</script>
        <!-- Begin page -->
        <div id="layout-wrapper">

          <!-- START HEADER -->
						<?php if(isset($header)) echo $header; ?>
					<!-- END HEADER -->

					<!-- ========== Left Sidebar Start ========== -->
					<?php if(isset($left_side_bar)) echo $left_side_bar; ?>
					<!-- Left Sidebar End -->

					<!-- ============================================================== -->
					<!-- Start right Content here -->
					<!-- ============================================================== -->
					<div class="main-content">
							
						<!-- Page-content -->
						<?php if(isset($content)) echo $content; ?>
						<!-- End Page-content -->
						
						<!-- FOOTER -->
						<?php if(isset($footer)) echo $footer; ?>
						<!-- END FOOTER -->

					</div>
					<!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
				<?php if(isset($right_side_bar)) echo $right_side_bar;?>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
        <script src="<?php echo base_url('public/assets/libs/metismenu/metisMenu.min.js')?>"></script>
        <script src="<?php echo base_url('public/assets/libs/simplebar/simplebar.min.js')?>"></script>
        <script src="<?php echo base_url('public/assets/libs/node-waves/waves.min.js')?>"></script>
				
				<!-- Required datatable js ( User List page ) -->
        <!--<script src="<?php echo base_url('public/assets/libs/datatables.net/js/jquery.dataTables.min.js')?>"></script>
        <script src="<?php echo base_url('public/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')?>"></script>-->
				
        <!-- Peity chart-->
        <script src="<?php echo base_url('public/assets/libs/peity/jquery.peity.min.js')?>"></script>

        <!-- Plugin Js-->
        <script src="<?php echo base_url('public/assets/libs/chartist/chartist.min.js')?>"></script>
        <script src="<?php echo base_url('public/assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js')?>"></script>

       
				
				<!-- Responsive examples ( User List page ) -->
        <script src="<?php echo base_url('public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')?>"></script>
        <script src="<?php echo base_url('public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')?>"></script>
				
				<!-- Datatable init js ( User List page ) -->
        <!--<script src="<?php echo base_url('public/assets/js/pages/datatables.init.js')?>"></script>-->
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        
        		<!-- CKeditor -->
				<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
				
				<!-- Sweet Alert -->
        <script src="<?php echo base_url('public/assets/libs/sweetalert2/sweetalert2.min.js')?>"></script> 
				
				<!--	Bootstrap Tags Input	-->
				<script src="<?php echo base_url('public/assets/bootstrap-tags-input/bootstrap-tagsinput.js')?>"></script> 
				
				 <script src="<?php echo base_url('public/assets/js/pages/dashboard.init.js')?>"></script>
				 
        <script src="<?php echo base_url('public/assets/js/app.js')?>"></script>
				
				<!-- Admin Custom js-->
        <script src="<?php echo base_url('public/assets/js/admin-custom.js')?>"></script>
				<!-- End Admin Custom js-->
				
				<!-- Common js-->
        <script src="<?php echo base_url('public/assets/js/common.js')?>"></script>
				<!-- End common js-->

    </body>

</html>