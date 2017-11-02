<div class="bg-img">
	<div class="container">
		<div class="frame">
			<div class="row">
			 <div class="login">

					<div class="col-md-4">
					</div>

					<div class="col-md-4">
							<div class="form-group">
					 			<?php if($this->session->flashdata('invalid')): ?>
										<div class="alert alert-danger"> <?php echo $this->session->flashdata('invalid'); ?> </div>
								<?php endif; ?>
								<?php if($this->session->flashdata('unapproved')): ?>
										<div class="alert alert-danger"> <?php echo $this->session->flashdata('unapproved'); ?> </div>
								<?php endif; ?>
							</div>
						<?php echo form_open('user/login'); ?>
							<div class="form-group text-center">
								<h4 class="input-label"> Login required </h4>
							</div>
					        <div class="form-group">
					            <input type="email" class="form-control" required name="email" placeholder="E-mail address" /> 
					        </div><!-- /input-group -->

					      	 <div class="form-group">
					            <input type="password" class="form-control" name="password" placeholder="Password" /> 
					        </div><!-- /input-group -->

					        <div class="form-group">
					        	<input type="submit" value="Login" class="btn-flat"/>
					        </div>

					         <div class="form-group">
					        	<a class="btn-flat2" href="<?php echo base_url();?>welcome"> Register </a>
					        </div>
				        <?php echo form_close(); ?>
					</div>

					<div class="col-md-4">
					</div>
				</div>
			</div>
		</div>


	</div>
</div>