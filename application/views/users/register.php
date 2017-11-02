
<div class="container register">
	<div class="flexpage">
			<?php echo validation_errors(); ?>
		 	 <?php if($this->session->flashdata('existed')): ?>
				<div class="alert alert-warning"> <?php echo $this->session->flashdata('existed'); ?> </div>
			<?php endif; ?>
			<?php if(form_error('password')): ?>
				<div class="alert alert-warning"> <?php echo form_error('password'); ?> </div>
			<?php endif; ?>
				<?php if(form_error('password2')): ?>
				<div class="alert alert-warning"> <?php echo form_error('password2'); ?> </div>
			<?php endif; ?>

			<?php if($this->session->flashdata('registered')): ?>
				<div class="alert alert-success"> <?php echo $this->session->flashdata('registered'); ?> </div>
			<?php endif; ?>

			<?php if($this->session->flashdata('error')): ?>
				<div class="alert alert-danger"> <?php echo $this->session->flashdata('error'); ?> </div>
			<?php endif; ?>

			<?php if($this->session->flashdata('error')): ?>
				<div class="alert alert-danger"> <?php echo $this->session->flashdata('error'); ?> </div>
			<?php endif; ?>
			
			<div class="form-group">
				<h4>Membership Registration</h4>
			</div>
		
		
	<div class="inner-wrapper3">
			<hr>
		<?php echo form_open('register'); ?>
	<div class="row">
			
			<div class="col-md-4">

				<div class="form-group">
					<label>Account no:</label>
					<input type="text" class="form-control" required readonly value="<?php echo $account_no;?>" /> 
				</div>

				<div class="form-group">
					<label>Last Name:</label>
					<input type="text" class="form-control" required  name="lastname" /> 
				</div>
				
				<div class="form-group">
					<label>Home Address:</label>
					<input type="text" class="form-control" required  name="address" /> 
				</div>


				<div class="form-group">   
					<label>Gender</label>
					<select name="gender" class="form-control">
						<option value="male">Male</option>
						<option value="male">Female</option>
					</select>
				</div>

					<div class="form-group">
					<label>zipcode</label>
					<input type="number" class="form-control" required name="zipcode"  /> 
				</div>	

				
				<div class="form-group">
					<label>Confirm password</label>
					<input type="password" class="form-control" name="password2" placeholder="Retype password" /> 
				</div>
				

			

			</div>

			<div class="col-md-4">

				<div class="form-group">
					<label>First Name:</label>
					<input type="text" class="form-control" required name="firstname" /> 
				</div>

				<div class="form-group">  
					<label>Department</label>
					<select name="department" class="form-control">
						<?php foreach($levels as $level): ?>
								<option value="<?php echo $level['id']; ?>"><?php echo $level['description']; ?></option>
						<?php endforeach; ?>  
					</select>
				</div>

				<div class="form-group">
					<label>Date of Birth</label>
					<input type="date" class="form-control" required name="birth_date" placeholder="Date of birth" /> 
				</div>	


			

				<div class="form-group">
							<label>Spouse Name:</label>
								<input type="text" class="form-control" required  name="spouse_name"  /> 
				</div>	


				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" required name="email" placeholder="E-mail address" /> 
				</div>	




		
				

			</div>

			<div class="col-md-4">

				<div class="form-group">
					<label>Middle Name:</label>
					<input type="text" class="form-control" required  name="middlename"  /> 
				</div>

				<div class="form-group">  
					<label>Citizenship</label>
					<select name="citizenship" class="form-control">
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
					<label>Marital status:</label>
					<select name="marital_status" class="form-control">
						<option value="single">Single</option>
						<option value="married">Married</option>
					</select>
				</div>

				<div class="form-group">   
					<label>City:</label>
					<select name="city" class="form-control">
						<option value="male">Cagayan de Oro City</option>
					</select>
				</div>

				
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" placeholder="Create password" /> 
				</div>


			
				<div class="form-group">
					<input type="submit" value="Register" class="btn btn-block btn-primary"/>
				</div>	
				
			</div>

	</div>

	<!--<div class="row">
		<div class="col-md-4">

			<div class="form-group">
				<label>Spouse Name:</label>
					<input type="text" class="form-control" required  name="spouse_name"  /> 
			</div>	


			<div class="form-group">
				<label>J. Real / Personal Properties Owned:</label>
				<textarea rows="3" name="properties_owned" class="form-control"></textarea>
			</div>	

		</div>

		<div class="col-md-4">


			
			<div class="form-group">
				<label>Occupation:</label>
				<input type="text" class="form-control" required  name="occupation" /> 
			</div>	


			<div class="form-group">
				<label>Assessed value:</label>
				<input type="number" class="form-control" required  name="assessed_value" /> 
			</div>	
			
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Monthly Income:</label>
				<input type="number" class="form-control" required  name="monthly_income" /> 
			</div>	

			
		</div>
		</div> -->
	</div>
	<?php echo form_close(); ?>
	</div>
	</div>
</div>

		     
		  
	

 <script type="text/javascript">
 	$(document).ready(function(){

 		//var department = $('#department');
 		var dep = $('#dep');
 		var level_id = $('#level_id');

 		$('.department').on('click', function(){
 			var get_id = $(this).data('value');
 			var get_text = $(this).data('formatted');
 			dep.val(get_text);
 			level_id.val(get_id);

 			console.log(get_id);

 		});



 	});

 </script>