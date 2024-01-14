<div class="page-content">
	<div class="container-fluid">

			<!-- start page title -->
			<div class="row align-items-center">
					<div class="col-sm-6">
							<div class="page-title-box">
									<h4 class="font-size-18"> Change Password</h4>
									<ol class="breadcrumb mb-0">
											<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
											<li class="breadcrumb-item active"> Change Password </li>
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
										<input type="hidden" name="id" value="<?php echo $ticket_result['id']?>">
										
										 
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
													<label for="example-text-input" class="col-form-label">Old Password <span class="text-danger">*</span></label>
													</div>
													<div class="col-sm-10">
															<input class="form-control" type="password" name="old_password" value="" maxlength="15" required>
													</div>
											</div>
											
											<div class="form-group row">
													<div class="col-sm-2">
													<label for="example-text-input" class="col-form-label">New Password <span class="text-danger">*</span></label>
													</div>
													<div class="col-sm-10">
															<input class="form-control" type="password" name="new_password" value="" maxlength="15" required>
													</div>
											</div>
											
											<div class="form-group row">
													<div class="col-sm-2">
													<label for="example-text-input" class="col-form-label">Confirm Password <span class="text-danger">*</span></label>
													</div>
													<div class="col-sm-10">
															<input class="form-control" type="password" name="confirm_password" value="" maxlength="15" required>
													</div>
											</div>
											
											 <div class="form-group row">
													<div class="col-sm-2">
													</div>
													<div class="col-sm-10">
															<button class="btn btn-primary w-md waves-effect waves-light" type="submit">Submit</button>
													</div>
											</div>
										</form>	
										
									</div>
							</div>
					</div> <!-- end col -->
			</div> <!-- end row -->

			

	</div> <!-- container-fluid -->
</div>