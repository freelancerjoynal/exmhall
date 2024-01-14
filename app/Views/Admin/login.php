<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | <?php echo $site_details['app_full_name'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="<?php echo $site_details['app_full_name'];?> Admin login" name="description" />
    <!--<meta content="Themesbrand" name="author" />-->
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('public/assets/images/favicon.ico')?>">

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url('public/assets/css/bootstrap.min.css')?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url('public/assets/css/icons.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url('public/assets/css/app.min.css')?>" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="home-btn d-none" style="display: none"> <!-- home-btn d-none d-sm-block-->
        <a href="<?php echo base_url('')?>" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20"> Admin Login  </h5>
                                <p class="text-white-50">Login to continue to <?php echo $site_details['app_full_name'];?></p>
                                <a href="<?php echo base_url('')?>" class="logo logo-admin">
                                    <img src="<?php echo base_url('public/assets/frontend/img/logo/Logo.png')?>" width="50" alt="logo">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="form-horizontal mt-4" action="<?php echo $form_action;?>" method="post">
																<?= csrf_field() ?>
																
                                    <?php if(session()->getFlashdata('error') !== NULL) : ?>
																		<div class="form-group">
																			<div class="alert alert-danger custom-alert">
																				<strong>Warning!</strong> <?php echo session()->getFlashdata('error');?>
																			</div>
																		</div>
																		<?php endif; ?>
																		
                                    <div class="form-group">
                                        <label for="user_id">Username</label>
                                        <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Enter username*" maxlength="40" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password*" required>
                                    </div>

                                    <div class="form-group row">
                                        <!--<div class="col-sm-6 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="button" name="admin_login">Back</button>
                                        </div>-->
                                        <div class="col-sm-12 text-right">
																				<a href="<?php echo base_url();?>"><button class="btn btn-primary w-md waves-effect waves-light" type="button" name="admin_login">Back</button></a>
																				&nbsp &nbsp
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="admin_login">Log In</button>
                                        </div>
                                    </div>

                                    <!--<div class="form-group mt-2 mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="pages-recoverpw.html"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    </div>-->

                                </form>

                            </div>
                        </div>

                    </div>

                    <!--<div class="mt-5 text-center">
                        <p>Don't have an account ? <a href="pages-register.html" class="font-weight-medium text-primary"> Signup now </a> </p>
                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>-->


                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url('public/assets/libs/jquery/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?php echo base_url('public/assets/libs/metismenu/metisMenu.min.js')?>"></script>
    <script src="<?php echo base_url('public/assets/libs/simplebar/simplebar.min.js')?>"></script>
    <script src="<?php echo base_url('public/assets/libs/node-waves/waves.min.js')?>"></script>

    <script src="<?php echo base_url('public/assets/js/app.js')?>"></script>
		<script src="<?php echo base_url('public/assets')?>/js/common.js"></script>

</body>

</html>