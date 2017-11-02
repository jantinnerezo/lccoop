<div class="wrapper">
	<div class="inner-wrapper">
		<div class="form-group">
				<?php if($this->session->flashdata('invalid')): ?>
						<div class="alert alert-danger"> <?php echo $this->session->flashdata('invalid'); ?> </div>
				<?php endif; ?>
				<?php if($this->session->flashdata('unapproved')): ?>
						<div class="alert alert-danger"> <?php echo $this->session->flashdata('unapproved'); ?> </div>
				<?php endif; ?>
		</div>
		<?php echo form_open('login_admin'); ?>

			<div class="form-group text-center">
				<h4 class="input-label"> Login admin</h4>
			</div>
			<div class="form-group text-center">
				<input type="text" class="form-control" required name="username" placeholder="Username" /> 
			</div><!-- /input-group -->

			<div class="form-group text-center">
				<input type="password" class="form-control" name="password" placeholder="Password" /> 
			</div><!-- /input-group -->
			
			<div class="form-group text-center">
				<input type="submit" value="Login" class="btn btn-block btn-outline-secondary"/>
			</div>

		<?php echo form_close(); ?>
	</div>
</div>

