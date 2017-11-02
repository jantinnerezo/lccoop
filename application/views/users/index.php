
<div class="container member">
	<div id="home">
		<?php if($this->session->flashdata('deposited')): ?>
			<div class="alert alert-success text-center"> <?php echo $this->session->flashdata('deposited'); ?> </div>
		<?php endif; ?>
		<?php if($this->session->flashdata('withdrawed')): ?>
			<div class="alert alert-success text-center"> <?php echo $this->session->flashdata('withdrawed'); ?> </div>
		<?php endif; ?>
		<?php if($this->session->flashdata('applied')): ?>
			<div class="alert alert-success text-center"> <?php echo $this->session->flashdata('applied'); ?> </div>
		<?php endif; ?>
		<?php if($this->session->flashdata('not_applied')): ?>
			<div class="alert alert-danger text-center"> <?php echo $this->session->flashdata('not_applied'); ?> </div>
		<?php endif; ?>
		
		

		<div class="row">

			<div class="col-md-4">
					<div class="card">
						<div class="card-body user-header text-center">
						<h5 class="card-title"><span class="oi oi-person"></span> Account Information</h5>
						</div>
					
						<?php foreach($user_data as $user): ?>
							<ul class="list-group list-group-flush">
								<li class="list-group-item"> <p class="lead">First name: <?php echo $user['firstname']; ?> </p> </li>
								<li class="list-group-item"> <p class="lead"> Last name: <?php echo $user['lastname']; ?> </p></li>
								<li class="list-group-item"> <p class="lead"> Age: <?php echo $user['age']; ?> </p></li>
								<li class="list-group-item"> <p class="lead"> E-mail address: <?php echo $user['email']; ?> </p> </li>
								<li class="list-group-item"> <p class="lead"> Department: <?php echo $user['level']; ?> </p>  </li>
								<a href="#" data-toggle="modal" data-id="<?php echo $user['userID'];?>"
								data-firstname="<?php echo $user['firstname'];?>"
								data-lastname="<?php echo $user['lastname'];?>"
								data-middlename="<?php echo $user['middlename'];?>"
								data-email="<?php echo $user['email'];?>"
								data-user_type="<?php echo $user['user_type'];?>"
								data-level_id="<?php echo $user['level_id'];?>"
								data-gender="<?php echo $user['gender'];?>"
								data-birth_date="<?php echo $user['birth_date'];?>"
								data-marital_status="<?php echo $user['marital_status'];?>"
								data-citizenship="<?php echo $user['citizenship'];?>"
								data-age="<?php echo $user['age'];?>"
								data-address="<?php echo $user['address'];?>"
								data-city="<?php echo $user['city'];?>"
								data-zipcode="<?php echo $user['zipcode'];?>"
								data-target="#editModal"
								 class="list-group-item list-group-item-action text-center text-info lead edit" > <strong> <span class="oi oi-pencil"></span> Edit </strong>  </a> 

							
								
							</ul>
						<?php endforeach; ?>
					</div>
			</div>

			<div class="col-md-4">
					<div class="card">
						<div class="card-body user-header text-center">
							<h5 class="card-title"> &#8369; Account Balance </h5>
						</div>
								<ul class="list-group list-group-flush">
									<?php foreach($user_data as $user): ?>
									<li class="list-group-item text-center"> <h3> &#8369; <?php echo number_format($user['balance'], 2,'.', ','); ?> </h3> </li>
									<?php endforeach; ?>

								<?php if($has_loan): ?>

								<?php else:?>
									<a href="<?php echo base_url();?>loan/application" class="list-group-item list-group-item-action text-center text-info lead"> <strong><span class="oi oi-spreadsheet"></span> Loan application</strong>  </a> 
								<?php endif;?>
								
									
								</ul>
					
					</div>
					<?php if($all): ?>
						<div id="accordion" role="tablist">
						  <div class="card">
						    <div class="card-header text-right" role="tab" id="headingOne">
						      <h5 class="mb-0">
						        <a data-toggle="collapse" class="drop_down" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
						          Loan Records <span class="oi oi-caret-bottom"> </span>
						        </a>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
						      <div class="card-body loan-records">
						       	  <?php foreach($all as $loan):?>
						       	  		<div class="card">
										  <div class="card-body">

										  	 <p class="card-subtitle pb-1">  Amount applied: <strong> &#8369; <?php echo number_format($loan['amount_applied'], 2,'.', ','); ?> </strong></p>
										  
										  	 <p class="card-subtitle pb-1"> Purpose: <strong><?php echo $loan['purpose'];?></strong>
										     </p>
										    
										    <?php if($loan['loan_type'] == 1): ?>
										    	<p class="card-subtitle pb-1">Type: <strong>Regular</strong></p>
										    	 <p class="card-subtitle pb-1">Loan term: <strong><?php echo $loan['term'];?></strong></p>

										    <?php else: ?>
										    	<p class="card-subtitle pb-1">Type: <strong>Petty Cash</strong></p>
										    	
										    	
										    <?php endif;?>
										   
										     <?php if($loan['paid'] == 1): ?>
										     	<p class="card-subtitle pb-1">Status: <strong class="text-success">Paid</strong></p>
										    <?php else: ?>
										    	<p class="card-subtitle pb-1">Status: <strong class="text-danger">Not yet paid</strong></p>
										    <?php endif;?>
										    <a href="<?php echo base_url();?>loan/view_loan/<?php echo $loan['userID'];?>/<?php echo $loan['loan_id'];?>" class="card-link btn btn-outline-primary btn-block">View</a>
										  </div>
										</div>
						       	  <?php endforeach;?>
						       	   
						      </div>
						    </div>
						  </div>
						</div>
					<?php endif;?>
						
				
			</div>

			<div class="col-md-4">
					
					<div class="card custom-card">
						<div class="card-body user-header text-center">
							<h5> <span class="oi oi-envelope-closed"></span> Notifications </h5>
						
						</div>
							<div class="list-group list-group-flush notification-card">
							<?php if($notifications): ?>
								<?php foreach($notifications as $notification): ?>
									 <?php $date_sent = date('M d, Y - g:i  A',strtotime($notification['timestamp'])); ?>
									   <a data-date="<?php echo $date_sent; ?>" data-sender="<?php echo $notification['sender'];?>" data-notif="<?php echo $notification['notification'];?>" data-id="<?php echo $notification['notification_id'];?>" href="#notificationModal" data-toggle="modal" class="openModal list-group-item list-group-item-action flex-column align-items-start">
									    <div class="d-flex w-100 justify-content-between">
									     <label><strong><?php echo $notification['sender'];?></strong></label>
									   
									
									    </div>
									      <p class="mb-1"><?php echo word_limiter($notification['notification'],10);?></p>
									    
									    <small class="text-muted"><?php echo $date_sent; ?></small>
									  </a>
								<?php endforeach; ?>
							</div>
						
							<?php else: ?>
								<div class="alert alert-light text-center"><p class="text-muted lead"> No notifications </p></div>
									
							<?php endif; ?>
					</div>
			</div>
		
		</div>
	</div>



	<!-- View notification modal -->
<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span class="oi oi-envelope-closed"></span> Notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	    <?php echo form_open('read'); ?>
		      <div class="modal-body">
		      	<div class="form-group">
		      		<input type="hidden"  name="notification_id" id="notification_id">
		      	</div>
		      	<div class="form-group">
		      		<input type="hidden"  id="base_url" value="<?php echo base_url();?>">
		      	</div>
		  		<div class="form-group">
		      		<h5  id="sender"></h5>
		      	</div>
		      	<div class="form-group ">
		      		<p class="lead"  id="dt"></p>
		      	</div>

		      	<div class="form-group  content-message">
		      		<p class="lead" id="notification"></p>
		      	</div>

		      </div>
		      <div class="modal-footer">
					<button id="read-btn" class="btn btn-info" data-dismiss="modal">Close</button>
		      </div>
	      <?php echo form_close(); ?>
    </div>
</div>
</div>


<!-- View Loan modal -->
<div class="modal fade" id="loanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span class="oi oi-bar-chart"></span> Loan Payment Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	    <?php echo form_open('read'); ?>
		      <div class="modal-body">
		      	  <?php if($loans):?>
                      
                    <hr>
                    <div class="table-responsive">
                            <table class="table"  id="table">
                                <thead>
                                    <th>Date due</th>
                                    <th class="text-right">Amount /Month</th>
                                    <th class="text-center">Paid</th>
                             
                                </thead>
                                <tbody>
																	 <?php $total = 0;?>
                                    <?php foreach($loans as $loan): ?>
                                        <tr>
																					
																						<?php $total += $loan['amount'];?>
                                            <td><?php echo Date('F j, Y',strtotime($loan['date']));?></td>
                                            <td class="text-right"><?php echo '&#8369; ' . number_format($loan['amount'], 2, '.', ',');?></td>
                                           
                                            <?php if($loan['status'] == 1): ?>
                                                <td class="text-center bg-success text-light">Yes</td>
                                            <?php else:?>
                                                <td class="text-center bg-danger text-light">No</td>
                                            <?php endif;?>
 
                                            </tr>

																
                                    <?php endforeach; ?>
                                    
																	
										<tr>
											<td class="text-right"> <strong> Total:</strong>  </td>
											<td class="text-right"> <strong> <?php echo '&#8369; ' . number_format($total, 2, '.', ',');?> </strong> </td>

											<td> </td>
										</tr>
																			
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                            <div class="alert alert-warning text-center">
                                No loan records found
                            </div>
                    <?php endif;?>
		      </div>
		      <div class="modal-footer">
					<button id="read-btn" class="btn btn-info" data-dismiss="modal">Close</button>
		      </div>
	      <?php echo form_close(); ?>
    </div>
  </div>
 </div>



 <!-- View Edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span class="oi oi-pencil"></span> Edit Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	   		<?php echo form_open('profile/update_account'); ?>
		      <div class="modal-body">
					<div class="form-group">
								<input type="hidden" class="form-control" required  name="userID" id="userID"/> 
						</div>
						<div class="form-group">
								<label>Last Name:</label>
								<input type="text" class="form-control" required  name="lastname" id="lastname"/> 
						</div>
						<div class="form-group">
								<label>First Name:</label>
								<input type="text" class="form-control" required name="firstname" id="firstname" /> 
						</div>
						<div class="form-group">
							<label>Middle Name:</label>
							<input type="text" class="form-control" required  name="middlename" id="middlename"  /> 
						</div>
						<div class="form-group">
							<label>Home Address:</label>
							<input type="text" class="form-control" required  name="address" id="address" /> 
						</div>
						<div class="form-group">  
							<label>Department</label>
							<select name="department" id="department" class="form-control">
								<?php foreach($levels as $level): ?>
										<option value="<?php echo $level['id']; ?>"><?php echo $level['description']; ?></option>
								<?php endforeach; ?>  
							</select>
						</div>
						<div class="form-group">  

					<label>Citizenship</label>
					<select name="citizenship" id="citizenship" class="form-control">
						<option value="">-- Select --</option>
						  <option value="afghan">Afghan</option>
						  <option value="albanian">Albanian</option>
						  <option value="algerian">Algerian</option>
						  <option value="american">American</option>
						  <option value="andorran">Andorran</option>
						  <option value="angolan">Angolan</option>
						  <option value="antiguans">Antiguans</option>
						  <option value="argentinean">Argentinean</option>
						  <option value="armenian">Armenian</option>
						  <option value="australian">Australian</option>
						  <option value="austrian">Austrian</option>
						  <option value="azerbaijani">Azerbaijani</option>
						  <option value="bahamian">Bahamian</option>
						  <option value="bahraini">Bahraini</option>
						  <option value="bangladeshi">Bangladeshi</option>
						  <option value="barbadian">Barbadian</option>
						  <option value="barbudans">Barbudans</option>
						  <option value="batswana">Batswana</option>
						  <option value="belarusian">Belarusian</option>
						  <option value="belgian">Belgian</option>
						  <option value="belizean">Belizean</option>
						  <option value="beninese">Beninese</option>
						  <option value="bhutanese">Bhutanese</option>
						  <option value="bolivian">Bolivian</option>
						  <option value="bosnian">Bosnian</option>
						  <option value="brazilian">Brazilian</option>
						  <option value="british">British</option>
						  <option value="bruneian">Bruneian</option>
						  <option value="bulgarian">Bulgarian</option>
						  <option value="burkinabe">Burkinabe</option>
						  <option value="burmese">Burmese</option>
						  <option value="burundian">Burundian</option>
						  <option value="cambodian">Cambodian</option>
						  <option value="cameroonian">Cameroonian</option>
						  <option value="canadian">Canadian</option>
						  <option value="cape verdean">Cape Verdean</option>
						  <option value="central african">Central African</option>
						  <option value="chadian">Chadian</option>
						  <option value="chilean">Chilean</option>
						  <option value="chinese">Chinese</option>
						  <option value="colombian">Colombian</option>
						  <option value="comoran">Comoran</option>
						  <option value="congolese">Congolese</option>
						  <option value="costa rican">Costa Rican</option>
						  <option value="croatian">Croatian</option>
						  <option value="cuban">Cuban</option>
						  <option value="cypriot">Cypriot</option>
						  <option value="czech">Czech</option>
						  <option value="danish">Danish</option>
						  <option value="djibouti">Djibouti</option>
						  <option value="dominican">Dominican</option>
						  <option value="dutch">Dutch</option>
						  <option value="east timorese">East Timorese</option>
						  <option value="ecuadorean">Ecuadorean</option>
						  <option value="egyptian">Egyptian</option>
						  <option value="emirian">Emirian</option>
						  <option value="equatorial guinean">Equatorial Guinean</option>
						  <option value="eritrean">Eritrean</option>
						  <option value="estonian">Estonian</option>
						  <option value="ethiopian">Ethiopian</option>
						  <option value="fijian">Fijian</option>
						  <option value="filipino">Filipino</option>
						  <option value="finnish">Finnish</option>
						  <option value="french">French</option>
						  <option value="gabonese">Gabonese</option>
						  <option value="gambian">Gambian</option>
						  <option value="georgian">Georgian</option>
						  <option value="german">German</option>
						  <option value="ghanaian">Ghanaian</option>
						  <option value="greek">Greek</option>
						  <option value="grenadian">Grenadian</option>
						  <option value="guatemalan">Guatemalan</option>
						  <option value="guinea-bissauan">Guinea-Bissauan</option>
						  <option value="guinean">Guinean</option>
						  <option value="guyanese">Guyanese</option>
						  <option value="haitian">Haitian</option>
						  <option value="herzegovinian">Herzegovinian</option>
						  <option value="honduran">Honduran</option>
						  <option value="hungarian">Hungarian</option>
						  <option value="icelander">Icelander</option>
						  <option value="indian">Indian</option>
						  <option value="indonesian">Indonesian</option>
						  <option value="iranian">Iranian</option>
						  <option value="iraqi">Iraqi</option>
						  <option value="irish">Irish</option>
						  <option value="israeli">Israeli</option>
						  <option value="italian">Italian</option>
						  <option value="ivorian">Ivorian</option>
						  <option value="jamaican">Jamaican</option>
						  <option value="japanese">Japanese</option>
						  <option value="jordanian">Jordanian</option>
						  <option value="kazakhstani">Kazakhstani</option>
						  <option value="kenyan">Kenyan</option>
						  <option value="kittian and nevisian">Kittian and Nevisian</option>
						  <option value="kuwaiti">Kuwaiti</option>
						  <option value="kyrgyz">Kyrgyz</option>
						  <option value="laotian">Laotian</option>
						  <option value="latvian">Latvian</option>
						  <option value="lebanese">Lebanese</option>
						  <option value="liberian">Liberian</option>
						  <option value="libyan">Libyan</option>
						  <option value="liechtensteiner">Liechtensteiner</option>
						  <option value="lithuanian">Lithuanian</option>
						  <option value="luxembourger">Luxembourger</option>
						  <option value="macedonian">Macedonian</option>
						  <option value="malagasy">Malagasy</option>
						  <option value="malawian">Malawian</option>
						  <option value="malaysian">Malaysian</option>
						  <option value="maldivan">Maldivan</option>
						  <option value="malian">Malian</option>
						  <option value="maltese">Maltese</option>
						  <option value="marshallese">Marshallese</option>
						  <option value="mauritanian">Mauritanian</option>
						  <option value="mauritian">Mauritian</option>
						  <option value="mexican">Mexican</option>
						  <option value="micronesian">Micronesian</option>
						  <option value="moldovan">Moldovan</option>
						  <option value="monacan">Monacan</option>
						  <option value="mongolian">Mongolian</option>
						  <option value="moroccan">Moroccan</option>
						  <option value="mosotho">Mosotho</option>
						  <option value="motswana">Motswana</option>
						  <option value="mozambican">Mozambican</option>
						  <option value="namibian">Namibian</option>
						  <option value="nauruan">Nauruan</option>
						  <option value="nepalese">Nepalese</option>
						  <option value="new zealander">New Zealander</option>
						  <option value="ni-vanuatu">Ni-Vanuatu</option>
						  <option value="nicaraguan">Nicaraguan</option>
						  <option value="nigerien">Nigerien</option>
						  <option value="north korean">North Korean</option>
						  <option value="northern irish">Northern Irish</option>
						  <option value="norwegian">Norwegian</option>
						  <option value="omani">Omani</option>
						  <option value="pakistani">Pakistani</option>
						  <option value="palauan">Palauan</option>
						  <option value="panamanian">Panamanian</option>
						  <option value="papua new guinean">Papua New Guinean</option>
						  <option value="paraguayan">Paraguayan</option>
						  <option value="peruvian">Peruvian</option>
						  <option value="polish">Polish</option>
						  <option value="portuguese">Portuguese</option>
						  <option value="qatari">Qatari</option>
						  <option value="romanian">Romanian</option>
						  <option value="russian">Russian</option>
						  <option value="rwandan">Rwandan</option>
						  <option value="saint lucian">Saint Lucian</option>
						  <option value="salvadoran">Salvadoran</option>
						  <option value="samoan">Samoan</option>
						  <option value="san marinese">San Marinese</option>
						  <option value="sao tomean">Sao Tomean</option>
						  <option value="saudi">Saudi</option>
						  <option value="scottish">Scottish</option>
						  <option value="senegalese">Senegalese</option>
						  <option value="serbian">Serbian</option>
						  <option value="seychellois">Seychellois</option>
						  <option value="sierra leonean">Sierra Leonean</option>
						  <option value="singaporean">Singaporean</option>
						  <option value="slovakian">Slovakian</option>
						  <option value="slovenian">Slovenian</option>
						  <option value="solomon islander">Solomon Islander</option>
						  <option value="somali">Somali</option>
						  <option value="south african">South African</option>
						  <option value="south korean">South Korean</option>
						  <option value="spanish">Spanish</option>
						  <option value="sri lankan">Sri Lankan</option>
						  <option value="sudanese">Sudanese</option>
						  <option value="surinamer">Surinamer</option>
						  <option value="swazi">Swazi</option>
						  <option value="swedish">Swedish</option>
						  <option value="swiss">Swiss</option>
						  <option value="syrian">Syrian</option>
						  <option value="taiwanese">Taiwanese</option>
						  <option value="tajik">Tajik</option>
						  <option value="tanzanian">Tanzanian</option>
						  <option value="thai">Thai</option>
						  <option value="togolese">Togolese</option>
						  <option value="tongan">Tongan</option>
						  <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
						  <option value="tunisian">Tunisian</option>
						  <option value="turkish">Turkish</option>
						  <option value="tuvaluan">Tuvaluan</option>
						  <option value="ugandan">Ugandan</option>
						  <option value="ukrainian">Ukrainian</option>
						  <option value="uruguayan">Uruguayan</option>
						  <option value="uzbekistani">Uzbekistani</option>
						  <option value="venezuelan">Venezuelan</option>
						  <option value="vietnamese">Vietnamese</option>
						  <option value="welsh">Welsh</option>
						  <option value="yemenite">Yemenite</option>
						  <option value="zambian">Zambian</option>
						  <option value="zimbabwean">Zimbabwean</option>
					</select>
				</div>

				<div class="form-group">   
					<label>Gender</label>
					<select name="gender" id="gender" class="form-control">
						<option value="male">Male</option>
						<option value="male">Female</option>
					</select>
				</div>

				<div class="form-group">
					<label>Date of Birth</label>
					<input type="date" class="form-control" required name="birth_date" id="birth_date" placeholder="Date of birth" /> 
				</div>	

				<div class="form-group">
					<label>Age</label>
					<input type="number" class="form-control" name="age" id="age">
				</div>

				<div class="form-group">   
					<label>Marital status:</label>
					<select name="marital_status" id="marital_status" class="form-control">
						<option value="single">Single</option>
						<option value="married">Married</option>
					</select>
				</div>

				
				<div class="form-group">   
					<label>City:</label>
					<select name="city" id="city" class="form-control">
						<option value="male">Cagayan de Oro City</option>
					</select>
				</div>

				<div class="form-group">
					<label>zipcode</label>
					<input type="number" class="form-control" required name="zipcode" id="zipcode"  /> 
				</div>	


		      </div>
		      <div class="modal-footer">
					<button id="read-btn" class="btn btn-info" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success" >Save changes</button>
		      </div>
	      <?php echo form_close();?>
    </div>
  </div>
 </div>



</div>






<hr>
 <script>
     $(document).ready(function(){


     	 $('.openModal').click(function(){
     	 		var notification_id = $(this).data('id');
     	 		var notification = $(this).data('notif');
     	 		var sender = 'From: ' + $(this).data('sender');
     	 		var dt = 'Date and time: ' + $(this).data('date');

     	 		$(".modal-body #notification_id").val( notification_id );
     	 		$(".modal-body #notification").text( notification);
     	 		$(".modal-body #sender").text( sender);
     	 		$(".modal-body #dt").text( dt);
     	 })

				$('.edit').click(function(){

     	 		var user_id = $(this).data('id');
     	 		var firstname = $(this).data('firstname');
     	 		var lastname = $(this).data('lastname');
     	 		var middlename = $(this).data('middlename');
     	 		var email = $(this).data('email');
     	 		var user_type = $(this).data('user_type');
     	 		var level_id = $(this).data('level_id');
     	 		var gender = $(this).data('gender');
     	 		var birth_date = $(this).data('birth_date');
     	 		var marital_status = $(this).data('marital_status');
     	 		var citizenship = $(this).data('citizenship');
     	 		var age = $(this).data('age');
     	 		var address = $(this).data('address');
     	 		var city = $(this).data('city');
     	 		var zipcode = $(this).data('zipcode');
     	 	
     	 		$(".modal-body #userID").val( user_id );
     	 		$(".modal-body #firstname").val( firstname );
     	 		$(".modal-body #lastname").val( lastname );
     	 		$(".modal-body #middlename").val( middlename );
     	 		$(".modal-body #email").val( email );
     	 		$(".modal-body #user_type").val( user_type );
     	 		$(".modal-body #department").val( level_id );
     	 		$(".modal-body #gender").val( gender );
     	 		$(".modal-body #birth_date").val( birth_date );
     	 		$(".modal-body #marital_status").val( marital_status );
     	 		$(".modal-body #citizenship").val( citizenship );
     	 		$(".modal-body #age").val( age );
     	 		$(".modal-body #address").val( address );
     	 		$(".modal-body #city").val( city );
     	 		$(".modal-body #zipcode").val( zipcode );

     	 
     	 })

     	


       
    });
   </script>
