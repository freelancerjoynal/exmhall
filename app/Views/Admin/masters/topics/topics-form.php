
<div class="page-content">
	<div class="container-fluid">

			<!-- start page title -->
			<div class="row align-items-center">
					<div class="col-sm-6">
							<div class="page-title-box">
									<h4 class="font-size-18"> <?php echo isset($topic_details['id']) ? 'Edit Topic' : 'Add Topics';?> </h4>
									<ol class="breadcrumb mb-0">
											<li class="breadcrumb-item"><a href="<?php echo base_url('control/dashboard');?>">Home</a></li>
											<li class="breadcrumb-item"><a href="javascript:void(0);">Topics</a></li>
											<li class="breadcrumb-item active"> <?php echo isset($topic_details['id']) ? 'Edit' : 'Add';?> </li>
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
										<input type="hidden" name="id" value="<?php echo isset($topic_details['id']) ? $topic_details['id'] : '';?>">
										
										 
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
													<option value=""> Select any item </option>
													<?php if(!empty($all_classes)) { ?>
													<?php foreach($all_classes as $class_data) { ?>
													<?php 
														$is_selected = '';
														if(isset($topic_details['class_id']) && $topic_details['class_id'] == $class_data["id"]) {
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
												<label for="example-text-input" class="col-form-label"> Subjects <span class="text-danger">*</span></label>
												</div>
												<div class="col-sm-10">
												
													<select class="form-control" name="subject_id" data-subject="<?php echo isset($topic_details['subject_id']) ? $topic_details['subject_id'] : ''?>" required>
														<option value=""> Select any item </option>
												   </select>
												</div>
											</div>
										
										
											<div class="form-group row">
													<div class="col-sm-2">
													<label for="example-text-input" class="col-form-label">Topics Name <span class="text-danger">*</span></label>
													</div>
													<div class="col-sm-10">
															<input class="form-control" type="text" name="topic_name" value="<?php echo isset($topic_details['topic_name']) ? $topic_details['topic_name'] : '';?>" maxlength="200" required>
															
													</div>
											</div>
											
											 <div class="form-group row container-product-buttons ">
													<div class="col-sm-2">
													</div>
													<div class="col-sm-10">
															<?php if(isset($topic_details['id'])) : ?>
															<button class="btn btn-primary w-md waves-effect waves-light" type="submit">Update</button>
															<?php else: ?>
															<button class="btn btn-primary w-md waves-effect waves-light" type="submit">Insert</button>
															<?php endif; ?>
															<a href="<?php echo base_url('admin/masters/topics');?>">
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
