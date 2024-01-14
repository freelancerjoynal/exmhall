<?php //pre($classes_list);?>
<div class="page-content">
		<div class="container-fluid">

				<!-- start page title -->
				<div class="row align-items-center">
						<div class="col-sm-6">
								<div class="page-title-box">
										<h4 class="font-size-18"> Topics </h4>
										<ol class="breadcrumb mb-0">
												<li class="breadcrumb-item"><a href="<?php echo base_url('control/dashboard');?>">Home</a></li>
												<li class="breadcrumb-item"><a href="javascript:void(0);">Topics</a></li>
												<li class="breadcrumb-item active"> List </li>
										</ol>
								</div>
						</div>
				</div>     
				<!-- end page title -->

			 

				<div class="row">
						<div class="col-12">
								<div class="card">
										<div class="card-body">
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
											
												<table id="masters_classes_table" class="table table-striped table-bordered  nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 12px;">
													<thead>
													<tr>
													    <th> Class </th>
													    <th> Subject </th>
															<th> Topic </th>
															<th> Last Update</th>
															<th> Action</th>
															
													</tr>
													</thead>
													<tbody>
														<?php 
															if(!empty($topics_list)) {
																
																$count = 1;
																foreach($topics_list as $details) {
														?>
														<tr>
														  <td> <?php echo $details['class_name'];?>  </td>
														  <td> <?php echo $details['subject_name'];?>  </td>
															<td> <?php echo $details['topic_name'];?>  </td>
															<td> <?php echo get_formatted_date($details['last_update']);?>  </td>
															<td> 
																<a href="<?php echo base_url('/admin/masters/topic-edit/' . $details['id'])?>">Edit </a>
																&nbsp / &nbsp
																<a href="<?php echo base_url('/admin/masters/topic-delete/' . $details['id'])?>">Delete</a>
															</td>

														</tr>
														<?php
																$count++;
																}
															}
														?>
													</tbody>
											</table>
										</div>
								</div>
						</div> <!-- end col -->
				</div> <!-- end row -->

				

		</div> <!-- container-fluid -->
</div>
