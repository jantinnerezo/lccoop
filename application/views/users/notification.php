<div class="container-fluid">
	<div class="notification">
		<div class="row messages">
		<div class="col-md-3 notification-bar">
			<div class="list-group">
			<?php if($notifications): ?>
				<?php foreach($notifications as $notification): ?>
					   <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
					    <div class="d-flex w-100 justify-content-between">
					     <p class="mb-1"><?php echo word_limiter($notification['notification'],10);?></p>
					      <?php if($notification['status'] == 0): ?>
							   <small class="text-danger">Unread</small>
						 <?php endif; ?>
					    </div>
					     <?php $date_sent = date('M d, Y',strtotime($notification['timestamp'])); ?>
					    <small class="text-muted"><?php echo $date_sent; ?></small>
					  </a>
				<?php endforeach; ?>
			</div>
			<?php else: ?>
					<h6 class="text-center"> No notifications </h6>
			<?php endif; ?>
		</div>
		<div class="col-md-8">
			<div class="flex-message">
				<textarea rows="10" cols="100"  name="notification"></textarea>
			</div>
						

		</div>
		</div>

	</div>
</div>