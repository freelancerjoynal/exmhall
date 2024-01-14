
<div class="page-content">
	<div class="container-fluid">

			<!-- start page title -->
			<div class="row align-items-center">
					<div class="col-sm-6">
							<div class="page-title-box">
									<h4 class="font-size-18"> Edit Site Settings </h4>
									<ol class="breadcrumb mb-0">
											<li class="breadcrumb-item"><a href="<?php echo base_url('control/dashboard');?>">Home</a></li>
											<li class="breadcrumb-item"><a href="javascript:void(0);">Site Settings</a></li>
											<li class="breadcrumb-item active"> Edit </li>
									</ol>
							</div>
					</div>
			</div>     
			<!-- end page title -->

			<div class="row">
					<div class="col-12">
							<div class="card">
									<div class="card-body">
										
										<form action="<?php echo $form_action;?>" method="post">
										<?= csrf_field();?>
										<input type="hidden" name="id" value="<?php echo isset($site_details['id']) ? $site_details['id'] : '';?>">
										
										 
										<?php if(session()->getFlashdata('error') !== NULL) : ?>
										<div class="form-group">
											<div class="alert alert-danger custom-alert">
												<strong>Warning!</strong> <?php echo session()->getFlashdata('error');?>
											</div>
										</div>
										<?php elseif(session()->getFlashdata('success') !== NULL) : ?>
										<div class="form-group">
											<div class="alert alert-success custom-alert">
												<strong>Success!</strong> <?php echo session()->getFlashdata('success');?>
											</div>
										</div>
										<?php endif; ?>
											
											<div class="form-group row">
													<div class="col-sm-2">
													<label for="example-text-input" class="col-form-label">Account Details <span class="text-danger">*</span></label>
													</div>
													<div class="col-sm-10">
															<textarea class="form-control" name="admin_account_details" rows="4"><?php echo isset($site_details['admin_account_details']) ? $site_details['admin_account_details'] : '';?></textarea>
													</div>
											</div>
											
											 <div class="form-group row container-product-buttons ">
													<div class="col-sm-2">
													</div>
													<div class="col-sm-10">
															<button class="btn btn-primary w-md waves-effect waves-light" type="submit">Update</button>
															<a href="<?php echo base_url('admin/dashboard');?>">
																<button class="btn btn-primary w-md waves-effect waves-light" type="button">Cancel</button>
															</a>
															
															
													</div>
											</div>
											
										</form>	
									
									</div>
							</div>
					</div> <!-- end col -->
			</div> <!-- end row -->

			

	</div> <!-- container-fluid -->
</div>
