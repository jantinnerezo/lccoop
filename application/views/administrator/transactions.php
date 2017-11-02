
    <div class="col-md-9">

        <div class="admin-wrapper">
             <div class="row">
                            <div class="col-md-4">
                                <h4 class="text-info"><span class="oi oi-transfer"></span> Transactions <span></h4> 
                            </div>

                             <div class="col-md-4">
                                
                            </div>

                             <div class="col-md-4 text-right">
                                  <div class="form-group">

                                    <a href="<?php echo base_url();?>admin/transactions/print_view" class="btn btn-info"><span class="oi oi-eye"></span> Print view</a>
                                    
                                </div>

                              
                            </div>
                        </div>
                        <hr>
                 
                  <?php  if($transactions): ?>
                    <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <th data-field="Account #">Account #</th>
                                    <th data-field="Account name">Account name</th>
                                    <th data-field="Deposit">Deposit</th>
                                    <th data-field="Withdrawal">Withdrawal</th>
                                    <th data-field="Balance">Balance</th>
                                    <th data-field="In-charge">In-charge</th>
                                    <th>Date</th>
                                </thead>
                                <tbody>
                                    <?php 
                                        $withdrawal = 0;
                                        $deposit = 0;
                                        $balance_total = 0;
                                    ?>

                                    <?php foreach($transactions as $transaction): ?>
                                        <?php $amount = '&#8369; ' . number_format($transaction['amount'], 2, '.', ','); ?>
                                        <?php $balance = '&#8369; ' . number_format($transaction['balance'], 2, '.', ','); ?>
                                        <?php $date = Date('M d, Y - h:i A',strtotime($transaction['transaction_date']));?>
                                        <tr>
                                            <td><?php echo $transaction['userID'];?></td>
                                            <td><?php echo $transaction['firstname'];?> <?php echo $transaction['lastname'];?></td>
                                            <td>
                                                <?php if($transaction['transaction_type'] == 'deposit'):?>
                                                    <?php echo $amount;?>
                                                    
                                                <?php endif;?>
                                            </td>

                                             <td>
                                                <?php if($transaction['transaction_type'] == 'withdrawal'):?>
                                                     <?php echo $amount;?>
                                            
                                                <?php endif;?>
                                            </td>
                                            <td><?php echo $balance;?></td>
                                            <td><?php echo $transaction['admin'];?></td>
                                            <td><?php echo $date;?></td>
                                        </tr>
                                          <?php if($transaction['transaction_type'] == 'deposit'):?>
                                                <?php  $deposit += $transaction['amount'];  ?>
                                            <?php endif;?>

                                          <?php if($transaction['transaction_type'] == 'withdrawal'):?>
                                                <?php  $withdrawal += $transaction['amount']; ?>
                                         <?php endif;?>

                                         <?php $balance_total += $transaction['balance']; ?>

                                        
                                    <?php endforeach; ?>
                                   <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Total: <?php echo '&#8369; ' . number_format($deposit, 2, '.', ',');;?></td>
                                        <td>Total: <?php echo '&#8369; ' . number_format($withdrawal, 2, '.', ',');;?></td>
                                        <td>Total: <?php echo '&#8369; ' . number_format($balance_total, 2, '.', ',');;?></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                    <?php else: ?>
                         <div class="alert alert-warning text-center">
                            No transactions found
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
        "info":     false,
         dom: 'Bfrtip',
         buttons: [
            'print'
        ]
    });

    $('#print').click(function(){
        window.print();
    });
});
</script>