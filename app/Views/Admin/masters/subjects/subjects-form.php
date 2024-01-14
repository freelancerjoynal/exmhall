
<div class="page-content">
	<div class="container-fluid">

			<!-- start page title -->
			<div class="row align-items-center">
					<div class="col-sm-6">
							<div class="page-title-box">
									<h4 class="font-size-18"> <?php echo isset($subject_details['id']) ? 'Edit Subjects' : 'Add Subjects';?> </h4>
									<ol class="breadcrumb mb-0">
											<li class="breadcrumb-item"><a href="<?php echo base_url('control/dashboard');?>">Home</a></li>
											<li class="breadcrumb-item"><a href="javascript:void(0);">Subjects</a></li>
											<li class="breadcrumb-item active"> <?php echo isset($subject_details['id']) ? 'Edit' : 'Add';?> </li>
									</ol>
							</div>
					</div>
			</div>     
			<!-- end page title -->

			<div class="row">
					<div class="col-12">
							<div class="card">
									<div class="card-body">
										
										<form action="<?php echo $form_action;?>" method="post" enctype='multipart/form-data'>
										<?= csrf_field();?>
										<input type="hidden" name="id" value="<?php echo isset($subject_details['id']) ? $subject_details['id'] : '';?>">
										
										 
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
												<label for="example-text-input" class="col-form-label"> Classes <span class="text-danger">*</span></label>
												</div>
												<div class="col-sm-10">
												
													<select class="form-control" name="class_id" required>
													<?php if(!empty($all_classes)) { ?>
													<?php foreach($all_classes as $class_data) { ?>
													<?php 
														$is_selected = '';
														if(isset($subject_details['class_id']) && $subject_details['class_id'] == $class_data["id"]) {
															$is_selected = 'selected';
														}
													?>
													  <option value="<?php echo $class_data["id"]?>" <?php echo $is_selected?>> <?php echo $class_data["class_name"]?> </option>
													<?php } ?>
													<?php } ?>
													  
												   </select>	
												</div>
											</div>
											
											<div class="form-group row">

													<div class="col-sm-2">
													<label for="example-text-input" class="col-form-label"> Subjects Name <span class="text-danger">*</span></label>
													</div>
													<div class="col-sm-10">
															<input class="form-control" type="text" name="subject_name" value="<?php echo isset($subject_details['subject_name']) ? $subject_details['subject_name'] : '';?>" maxlength="200" required>
													</div>
											</div>
											
											 <div class="form-group row container-product-buttons ">
													<div class="col-sm-2">
													</div>
													<div class="col-sm-10">
															<?php if(isset($subject_details['id'])) : ?>
															<button class="btn btn-primary w-md waves-effect waves-light" type="submit">Update</button>
															<?php else: ?>
															<button class="btn btn-primary w-md waves-effect waves-light" type="submit">Insert</button>
															<?php endif; ?>
															<a href="<?php echo base_url('admin/masters/subjects');?>">
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
