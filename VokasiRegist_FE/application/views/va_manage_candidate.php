<div id="refresh">
	<script>
		$('.dataTable').DataTable();
	</script>
	<section class="section">
		<div class="section-header">
			<h1>Manage Candidate</h1>
			<!-- Modal -->
		</div>
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-pills">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#candidate" style="border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;">
							<i class="ion ion-ios-people"></i>
							Candidate
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#parent" style="border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;">
							<i class="ion ion-android-people"></i>
							Parent
						</a>
					</li>
				</ul>
				<div class="card card-primary tab-content" style="border-top-left-radius: 0px;">

					<!-- TAB MANAGE CANDIDATE -->
					<div id="candidate" class="tab-pane fade in active show">
						<div class="card-body">
							<div class="flashdatafail" data-flashdata="<?= $this->session->flashdata('msgfail'); ?>"></div>
							<div class="flashdata" data-flashdata="<?= $this->session->flashdata('msg'); ?>"></div>

							<div class="owl-carousel owl-theme" id="products-carousel">
								<table id="example" class="table table-striped table-bordered dataTable" style="width:100%">
									<thead>
										<tr>
											<th>NO</th>
											<th>ID - Username</th>
											<th>Full Name</th>
											<th>Email</th>
											<th>User Identity Number</th>
											<th>Address</th>
											<th style="text-align: center;">Action</th>
										</tr>
									</thead>
									<tbody>
										<? $i = 0?>
										<? foreach ($candidate as $can):?>
										<? $i += 1?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $can['user_name'] ?></td>
											<td><?= $can['name'] ?></td>
											<td><?= $can['email'] ?></td>
											<td><?= $can['nik'] ?></td>
											<td><?= $can['address'] ?></td>
											<td style=" text-align: center;">
												<a href="#" class="btn btn-icon btn-primary has-dropdown" data-toggle="dropdown"><i class="ion ion-ios-person"></i> <span>Manage Candidate</span></a>
												<ul class="dropdown-menu" style="width: 40%; text-align:center">

													<li>
														<a href="#myModal" data-toggle="modal" class="btn btn-icon icon-left btn-dark">
															<i class="far fa-file"></i> Documents
														</a>

														<a href="#myModal" data-toggle="modal" class="btn btn-icon btn-info">
															<i class="fas fa-info-circle"></i> Detail
														</a>

														<a href="#myModal" data-toggle="modal" class="btn btn-icon btn-success" onclick="submit('updateData')">
															<i class="far fa-edit"></i> Update
														</a>

														<a class="btn btn-icon btn-danger" onclick="deleteData(<?= $can['candidate_id'] ?>)">
															<i class="fas fa-times"></i> Delete
														</a>
													</li>

												</ul>
											</td>
										</tr>
										<?endforeach;?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<!-- TAB MANAGE PARENT -->
					<div id="parent" class="tab-pane fade">
						<div class="card-body">
							<div class="flashdatafail" data-flashdata="<?= $this->session->flashdata('msgfail'); ?>"></div>
							<div class="flashdata" data-flashdata="<?= $this->session->flashdata('msg'); ?>"></div>
							<div class="owl-carousel owl-theme" id="products-carousel">
								<table id="example" class="table table-striped table-bordered dataTable" style="width:100%">
									<thead>
										<tr>
											<th>NO</th>
											<th>ID - CandidateName</th>
											<th>Full Name</th>
											<th>Email</th>
											<th>User Identity Number</th>
											<th>Address</th>
											<th style="text-align: center;">Action</th>
										</tr>
									</thead>
									<tbody>
										<? $i = 0?>
										<? foreach ($c_parent as $c):?>
										<? $i += 1?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $c['name'] ?></td>
											<td><?= $c['name'] ?></td>
											<td><?= $c['email'] ?></td>
											<td><?= $c['nik'] ?></td>
											<td><?= $c['address'] ?></td>
											<td style=" text-align: center;">
												<a href="#" class="btn btn-icon btn-primary has-dropdown" data-toggle="dropdown"><i class="ion ion-ios-person"></i> <span>Manage Parent</span></a>
												<ul class="dropdown-menu" style="width: 40%; text-align:center">

													<li>
														<a href="#myModalParent" data-toggle="modal" class="btn btn-icon icon-left btn-dark">
															<i class="far fa-file"></i> Documents
														</a>

														<a href="#myModalParent" data-toggle="modal" class="btn btn-icon btn-info">
															<i class="fas fa-info-circle"></i> Detail
														</a>

														<a href="#myModalParent" data-toggle="modal" class="btn btn-icon btn-success" onclick="submit('updateData',<?= $c['c_parent_id'] ?>)">
															<i class="far fa-edit"></i> Update
														</a>

														<a href="#" class="btn btn-icon btn-danger" onclick="deleteData(<?= $c['c_parent_id'] ?>)">
															<i class="fas fa-times"></i> Delete
														</a>
													</li>

												</ul>
											</td>
										</tr>
										<?endforeach;?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-lg">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body modal-output">
					<div class="row">
						<div class="col-12 col-md-12 col-lg-12">
							<div class="card">
								<div class="card-body">
									<form>
										<div class="form-group">
											<label for="istr_user_id">Username Account</label>
											<input type="text" class="form-control" name="istr_user_id" value="" readonly>
										</div>
										<div class="form-group">
											<label for="istr_name">Fullname</label>
											<input type="text" class="form-control" name="istr_name" value="">
										</div>
										<div class="form-group">
											<label for="istr_email">Email</label>
											<input type="text" class="form-control" name="istr_email" value="">
										</div>
										<div class="form-group">
											<label for="istr_birth_place">Birth Place</label>
											<input type="text" class="form-control" name="istr_birth_place" value="">
										</div>
										<div class="form-group">
											<label for="istr_nik">NIK</label>
											<input type="text" class="form-control" name="istr_nik" value="">
										</div>
										<div class="form-group">
											<label for="istr_no_tlp">Telephone Number</label>
											<input type="text" class="form-control" name="istr_no_tlp" value="">
										</div>
										<div class="form-group">
											<label for="istr_no_hp">Hand Phone Number</label>
											<input type="text" class="form-control" name="istr_no_hp" value="">
										</div>
										<div class="form-group">
											<label for="istr_birth">Birth Date</label>
											<input type="date" class="form-control" name="istr_birth" value="">
										</div>
										<div class="form-group">
											<label for="istr_img_path">Image Path</label>
											<input type="text" class="form-control" name="istr_img_path" value="">
										</div>
										<div class="form-group">
											<label for="istr_address">Address</label>
											<input type="text" class="form-control" name="istr_address" value="">
										</div>
										<div class="form-group">
											<label for="istr_gender_id">Gender</label>
											<select class="form-control form-control-sm" name="istr_gender_id">
												<option value="">Default Choice - </option>
												<? foreach ($gender as $gnd):?>
												<option value="<?= $gnd['p_reference_list_id'] ?>"><?= $gnd['description'] ?></option>
												<?endforeach;?>
											</select>
										</div>
										<div class="form-group">
											<label for="istr_religion_id">Religion</label>
											<select class="form-control form-control-sm" name="istr_religion_id">
												<option value="">Default Choice - </option>
												<? foreach ($religion as $rlg):?>
												<option value="<?= $rlg['p_reference_list_id'] ?>"><?= $rlg['description'] ?></option>
												<?endforeach;?>
											</select>
										</div>
										<div class="form-group">
											<label for="istr_result_id">Result</label>
											<input type="text" class="form-control" name="istr_result_id" value="">
										</div>
										<div class="form-group">
											<label for="">Created Date</label>
											<input type="text" class="form-control" name="" value="" readonly>
										</div>
										<div class="form-group">
											<label for="">Created By</label>
											<input type="text" class="form-control" name="" value="" readonly>
										</div>
										<div class="form-group">
											<label for="">Update Date</label>
											<input type="text" class="form-control" name="" value="" readonly>
										</div>
										<div class="form-group">
											<label for="">Update By</label>
											<input type="text" class="form-control" name="" value="" readonly>
										</div>

										<button type="button" data-dismiss="modal" class="btn btn-icon btn-primary">
											<i class="ion ion-arrow-left-a"></i> Cancel
										</button>
										<button type="button" id="btn-update" onclick="updateData()" class="btn btn-icon btn-success">
											<i class="far fa-edit"></i> Update
										</button>
										<button type="button" id="btn-delete" onclick="deleteData()" class="btn btn-icon btn-danger">
											<i class="fas fa-times"></i> Delete
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="modal fade" id="myModalParent" role="dialog">
		<div class="modal-dialog modal-lg">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body modal-output">
					<div class="row">
						<div class="col-12 col-md-12 col-lg-12">
							<div class="card">
								<div class="card-body">
									<form>
										<div class="form-group">
											<label for="in_candidate_id">CandidateName</label>
											<input id="in_candidate_id" type="text" class="form-control" name="in_candidate_id" value="" readonly>
										</div>
										<div class="form-group">
											<label for="in_name">Fullname</label>
											<input type="text" class="form-control" name="in_name" value="">
										</div>
										<div class="form-group">
											<label for="in_email">Email</label>
											<input type="text" class="form-control" name="in_email" value="">
										</div>
										<div class="form-group">
											<label for="in_job">Job</label>
											<input type="text" class="form-control" name="in_job" value="">
										</div>
										<div class="form-group">
											<label for="in_birth_place">Birth Place</label>
											<input type="text" class="form-control" name="in_birth_place" value="">
										</div>
										<div class="form-group">
											<label for="in_nik">NIK</label>
											<input type="text" class="form-control" name="in_nik" value="">
										</div>
										<div class="form-group">
											<label for="in_no_tlp">Telephone Number</label>
											<input type="text" class="form-control" name="in_no_tlp" value="">
										</div>
										<div class="form-group">
											<label for="in_relation_status_id">Relation Status</label>
											<select class="form-control form-control-sm" name="in_relation_status_id">
												<option value="">Default Choice - </option>
												<? foreach ($p_reference_list as $rlt):?>
												<option value="<?= $rlt['p_reference_list_id'] ?>"><?= $rlt['description'] ?></option>
												<?endforeach;?>
											</select>
										</div>
										<div class="form-group">
											<label for="in_birth">Birth Date</label>
											<input type="date" class="form-control" name="in_birth" value="">
										</div>
										<!-- <div class="form-group">
											<label for="istr_img_path">Image Path</label>
											<input type="text" class="form-control" name="istr_img_path" value="">
										</div> -->
										<div class="form-group">
											<label for="in_address">Address</label>
											<input type="text" class="form-control" name="in_address" value="">
										</div>
										<div class="form-group">
											<label for="in_gender_id">Gender</label>
											<select class="form-control form-control-sm" name="in_gender_id">
												<option value="">Default Choice - </option>
												<? foreach ($gender as $gnd):?>
												<option value="<?= $gnd['p_reference_list_id'] ?>"><?= $gnd['description'] ?></option>
												<?endforeach;?>
											</select>
										</div>
										<div class="form-group">
											<label for="in_religion_id">Religion</label>
											<select class="form-control form-control-sm" name="in_religion_id">
												<option value="">Default Choice - </option>
												<? foreach ($religion as $rlg):?>
												<option value="<?= $rlg['p_reference_list_id'] ?>"><?= $rlg['description'] ?></option>
												<?endforeach;?>
											</select>
										</div>
										<!-- <div class="form-group">
											<label for="istr_result_id">Result</label>
											<input type="text" class="form-control" name="istr_result_id" value="">
										</div> -->
										<div class="form-group">
											<label for="">Created Date</label>
											<input type="text" class="form-control" name="" value="" readonly>
										</div>
										<div class="form-group">
											<label for="">Created By</label>
											<input type="text" class="form-control" name="" value="" readonly>
										</div>
										<div class="form-group">
											<label for="">Update Date</label>
											<input type="text" class="form-control" name="" value="" readonly>
										</div>
										<div class="form-group">
											<label for="">Update By</label>
											<input type="text" class="form-control" name="" value="" readonly>
										</div>

										<button type="button" data-dismiss="modal" class="btn btn-icon btn-primary">
											<i class="ion ion-arrow-left-a"></i> Cancel
										</button>
										<button type="button" id="btn-update" onclick="updateData()" class="btn btn-icon btn-success">
											<i class="far fa-edit"></i> Update
										</button>
										<button type="button" id="btn-delete" onclick="deleteData()" class="btn btn-icon btn-danger">
											<i class="fas fa-times"></i> Delete
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script type="text/javascript">
		function submit(action,id) {

			if (action == 'updateData') {

				$('#btn-update').show();
				$('#btn-delete').hide();
				$('#in_candidate_id').val(id);
			} else if (action == 'deleteData') {
				$('#btn-update').hide();
				$('#btn-delete').show();
			}
		}

		function deleteData(id) {
			// alert('ID =' + id);
			$.ajax({
				type: 'POST',
				data: 'id=' + id,
				url: '<?= base_url() ?>a_manage_candidate/deleteData',
				success: function(data) {
					// window.location.reload();
					$('#refresh').html(data);
					// alert('success');
				}
			});

		}
	</script>

	<!-- <script type="text/javascript">
	$(document).ready(function() {
		//Execute
		ambilDataCandidate();


		//FUNCTIONS
		function ambilDataCandidate() {
			$.ajax({
				type: 'POST',
				url: '<?= base_url('') ?>A_Manage_Candidate/getDataCandidate',
				dataType: 'json',
				success: function(dataJSON) {
					console.log(dataJSON);
					var row = "";
					for (var i = 0; i < dataJSON.length; i++) {
						row += "<tr>" +
							"<td>" + dataJSON[i].candidate_id + "</td>" +
							"<td>" + dataJSON[i].user_name + "</td>" +
							"<td>" + dataJSON[i].name + "</td>" +
							"<td>" + dataJSON[i].email + "</td>" +
							"<td>" + dataJSON[i].nik + "</td>" +
							"<td>" + dataJSON[i].address + "</td>" +
							"<td style=' text-align: center;'>" +
							"<a href='#' class='btn btn-icon btn-primary has-dropdown' data-toggle='dropdown'>" +
							"<i class='ion ion-ios-person'></i> " +
							"<span>Manage Candidate</span>" +
							"</a>" +
							"<ul class='dropdown-menu' style='width: 30%; text-align:center'>" +
							"<li>" +
							"<button data-toggle='modal' data-target='#myModal' data-source='a_candidate' class='btn btn-icon btn-info btn-detail' id='" + dataJSON[i].candidate_id + "'>" +
							"<i class='fas fa-info-circle'></i> Detail" +
							"</button>" +

							"<button data-toggle='modal' data-target='#myModal' data-source='a_candidate' class='btn btn-icon btn-success btn-update' id='" + dataJSON[i].candidate_id + "'>" +
							"<i class='far fa-edit'></i> Update" +
							"</button>" +

							"<a href='" + dataJSON[i].candidate_id + "' class='btn btn-icon btn-danger deleteButton'>" +
							"<i class='fas fa-times'></i> Delete" +
							"</a>" +
							"</li>" +
							"</ul>" +
							"</td>" +
							"</tr>";
					}
					$('#dataCandidate').html(row);
				}
			});
		}
	});
		</script> -->


		

</div>
