<div class="container top-m">
		<div class="form-group">
			<a href="<?php echo base_url();?>/profile" class="btn btn-outline-primary">Go back</a>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<ul class="list-group list-group-flush">
						<li class="list-group-item text-center"> <p class="lead text-lc"><strong><span class="oi oi-document"></span> Loan details</strong></p> </li>
			
					</ul>
					<div class="card-body">
						<?php foreach($loan_details as $details): ?>
						<p class="card-title">Amount applied: <strong> &#8369; <?php echo number_format($details['amount_applied'], 2,'.', ','); ?> </strong></p>
						<p class="card-title"> Purpose: <strong><?php echo $details['purpose'];?></strong></p>
						<?php if($details['loan_type'] == 1): ?>
					    	<p class="card-title">Type: <strong>Regular</strong></p>
					    	 <p class="card-title">Loan term: <strong><?php echo $details['term'];?></strong></p>

					    <?php else: ?>
					    	<p class="card-title">Type: <strong>Petty Cash</strong></p>
					    <?php endif;?>
					    <?php if($details['paid'] == 1): ?>
					     	<p class="card-title">Status: <strong class="text-success">Paid</strong></p>
					    <?php else: ?>
					    	<p class="card-title">Status: <strong class="text-danger">Not yet paid</strong></p>
					    <?php endif;?>
						<?php endforeach;?>
					</div>
				</div>
			</div>	
			<div class="col-md-6">
				<div class="card">
					<ul class="list-group list-group-flush">
						<li class="list-group-item text-center"> <p class="lead text-lc"><strong><span class="oi oi-document"></span>Monthly Payment Details</strong></p> </li>
					</ul>
					<div class="card-body">
					<?php if($loans):?>
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
				</div>
			</div>
		</div>
	
</div>