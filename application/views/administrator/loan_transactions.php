
    <div class="col-md-9">

        <div class="admin-wrapper">
                  <div class="row">
                            <div class="col-md-4">
                                  <h4 class="text-info"><span class="oi oi-transfer"></span> Loan Transactions</h4>
                            </div>

                             <div class="col-md-4">
                                
                            </div>

                             <div class="col-md-4 text-right">
                                <div class="form-group">
                                    <a href="<?php echo base_url();?>admin/loan_transactions/print_view" class="btn btn-info"><span class="oi oi-eye"></span> Print view</a>
                                </div>
                            </div>
                        </div>

                   <hr>
                  <?php  if($loan_transactions): ?>
                    <div class="table-responsive">
                            <table class="table"  id="table">
                                <thead>
                                    <th>Account #</th>
                                    <th>Account name</th>
                                    <th>Date due</th>
                                    <th>Amount/Month</th>
                                    <th>Paid</th>
                                    <th>Date Paid</th>
                                </thead>
                                <tbody>
                                    <?php foreach($loan_transactions as $loan): ?>
                                        <tr>
                                            <td><?php echo $loan['userID'];?></td>
                                            <td><?php echo $loan['firstname'] .' '.$loan['lastname'];?></td>
                                            <td><?php echo Date('F j, Y',strtotime($loan['date']));?></td>
                                            <td class="text-right"><?php echo '&#8369; ' . number_format($loan['amount'], 2, '.', ',');?></td>

                                            <td class="text-center">Yes</td>
                                            <td><?php echo Date('F j, Y',strtotime($loan['date_paid']));?></td>
                                          
                                            </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                        </div>

                    <?php else: ?>
                         <div class="alert alert-warning text-center">
                            No Loan transactions found
                         </div>
                    <?php endif;?>
                   
                </div>
            </div>
            
</div>
</div>



<script>
$('document').ready(function(){
    $('#table').DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false
    });
});
</script>