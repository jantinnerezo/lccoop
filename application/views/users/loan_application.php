<div class="container register">

	<div class="flexpage">
	<div class="form-group">
		<h4><span class="oi oi-pencil"></span> Loan Application</h4>
		
			<?php if(validation_errors()):?>
					<div class="alert alert-danger text-center">
						<?php echo validation_errors(); ?>
					</div>
			<?php endif;?>
		
	</div>
			<div class="inner-wrapper3">

				<div class="alert alert-info text-center">
					Please fill-up all fields to apply
				</div>
				<?php echo form_open('loan/application'); ?>
					<input type="hidden" name="userID" value="<?php echo $this->session->userdata('user_id');?>">
					<input type="hidden" name="balance_id" value="<?php echo $this->session->userdata('balance_id');?>">

					<div class="row">
						<div class="col-md-4">


							<div class="form-group">
								<label>Loan Type:</label>
								<select name="loan_type" id="loan_type" class="form-control">
									<option value="1">Regular</option>
									<option value="2">Petty Cash</option>
								</select>
							</div>

							<div class="form-group">
								<label>Assessed value:</label>
								<input type="number" class="form-control" required  name="assessed_value" /> 
							</div>	
						
						
						
							
						</div>

						<div class="col-md-4">

							<div class="form-group">
								<label>Occupation:</label>
								<input type="text" class="form-control" required  name="occupation" /> 
							</div>	

								<div class="form-group">
								<label>Monthly Income:</label>
								<input type="number" class="form-control" required  name="monthly_income" /> 
							</div>	




						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Real / Personal Properties Owned:</label>
								<textarea rows="3" name="properties_owned" class="form-control"></textarea>
							</div>	
						</div>
					</div> 

					<hr>

					<div class="row">

					
						<div class="col-md-4">
							<div class="form-group">
								<label>Amount Applied: </label>
								 <div class="input-group">
							      <span class="input-group-addon">
							        	&#8369;
							      </span>
							      <input type="number" class="form-control" required  name="amount_applied" /> 
							    </div><!-- /input-group -->
								
							</div>	

						
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Purpose:</label>
								<input type="text" name="purpose" class="form-control" required>
							</div>
							
						</div>

						<div class="col-md-4">

							<div class="form-group" id="term">
								<label>Term of loan: </label>
								 <div class="input-group">
							      <input type="number" class="form-control" required  min="0" max="12" name="term" id="loan_term" /> 
							       <span class="input-group-addon">
							        	Months
							      </span>
							    </div><!-- /input-group -->
							</div>	

							<div class="form-group">
								<label for=""></label>
								<input type="submit" class="btn btn-block btn-success" value="Submit">
							</div>
						</div>
					</div>
				<?php echo form_close();?>
			</div>

	</div>
</div>

<script>
	$(document).ready(function(){

		$('#loan_type').on('change',function(){

			var loan_type = $('#loan_type').val();

			if(loan_type == 2){

			 	$('#term').hide();
				$('#loan_term').val('0');

			}else{

				$('#term').show();
				$('#loan_term').val('');

			}
		});

	});
</script>
