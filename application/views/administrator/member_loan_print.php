
        <div class="container-fluid">

            <div class="admin-wrapper">


             
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error');?></div>
                <?php endif;?>

                <div class="form-group">
                             <a class="btn btn-info" href="<?php echo base_url();?>admin"><span class="oi oi-arrow-thick-left"></span> Back</a>
                        </div>
                    
                    <div class="row loan-details">
                         <div class="list-group">
                              <?php foreach($details as $detail):?>
                                <li class="list-group-item bg-success text-light">Account No. <?php echo $detail['userID']; ?></li>
                                <li class="list-group-item">Name: <?php echo $detail['firstname'] . ' '. $detail['lastname']; ?> </li>
                                <li class="list-group-item">Term:  <?php echo $detail['term']; ?> months</li>
                                <li class="list-group-item">Purpose:  <?php echo $detail['purpose']; ?></li>

                                <li class="list-group-item">Total Loan: <?php echo '&#8369; ' . number_format($total, 2, '.', ',');?></li>

                              <?php endforeach; ?>
                        </div>
                       
                       
                    </div>
                    <hr>

                     <div class="row">
                            <div class="col-md-4">
                                 <h3 class="text-info">Loan Payment Details</h3>
                            </div>

                             <div class="col-md-4">
                                
                            </div>

                             <div class="col-md-4 text-right">
                                <div class="form-group">
                                    <button id="print" class="btn btn-info"><span class="oi oi-print"></span> Print</button>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php if($loans):?>
                       
              
                    <div class="table-responsive">
                            <table class="table"  id="table">
                                <thead>
                                    <th>Date due</th>
                                    <th class="text-right">Amount /Month</th>
                                    <th class="text-center">Paid</th>
                                  
                                </thead>
                                <tbody>
                               
                                    <?php foreach($loans as $loan): ?>
                                        <tr>
                                            <td><?php echo Date('F j, Y',strtotime($loan['date']));?></td>
                                            <td class="text-right"><?php echo '&#8369; ' . number_format($loan['amount'], 2, '.', ',');?></td>
                                           
                                            <?php if($loan['status'] == 1): ?>
                                                <td class="text-center bg-success text-light">Yes</td>
                                            <?php else:?>
                                                <td class="text-center bg-danger text-light">No</td>
                                            <?php endif;?>
                                            

                                          
                                            </tr>
                                    <?php endforeach; ?>
                                    
                                
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                            <div class="alert alert-warning text-center">
                                No loan records found
                            </div>
                    <?php endif;?>

                       <h5>Printed by: <?php echo $this->session->userdata('name');?></h5>
                    </div>
                </div>
           
    </div>


       <!-- Paid modal -->
    <div class="modal fade" id="paidConfirm" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><span class="oi oi-check"></span> Payment Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
           <?php echo form_open('loans/paid');?>
                  <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="loan_id" id="loan_id">
                    <input type="hidden" name="user_id" id="user_id">
                    <input type="hidden" name="date" id="date">
                    <input type="hidden" name="monthly" id="monthly">
                    <div class="form-group">
                        <label>Amount paid</label>
                        <input type="number" name="amount" class="form-control" required placeholder="Enter amount paid">
                    </div>
                    <div class="form-group">
                        <label>Please enter your admin password:</label>
                        <input type="password" name="password" class="form-control" required placeholder="(For security)">
                    </div>
                   </div>

                  <div class="modal-footer">
                      <button  class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><span class="oi oi-check"></span> Paid</button>
                  </div>
           
            <?php echo form_close();?>
        </div>
      </div>
    </div>


        <!-- Undo modal -->
    <div class="modal fade" id="undoConfirm" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><span class="oi oi-reload"></span> Undo Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
           <?php echo form_open('loans/undo');?>
                  <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="loan_id" id="loan_id">
                    <input type="hidden" name="user_id" id="user_id">
                        <div class="form-group">
                            <label>Please enter your admin password:</label>
                            <input type="password" name="password" class="form-control" required placeholder="(For security)">
                        </div>
                   </div>

                  <div class="modal-footer">
                      <button  class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger"><span class="oi oi-reload"></span> Undo</button>
                  </div>
           
            <?php echo form_close();?>
        </div>
      </div>
    </div>



</div>



<script>
    $(document).ready(function(){
       /* $('#table').DataTable({
            "paging":   false,
            "ordering": false,
            "info":     false
        });*/

          $('.paidConfirm').click(function(){

                var id  = $(this).data('id');
                var user_id  = $(this).data('user_id');
                var loan_id  = $(this).data('loan_id');
                var dt  = $(this).data('date');
                var monthly  = $(this).data('monthly');

                $(".modal-body #id").val(id);
                $(".modal-body #date").val(dt);
                $(".modal-body #user_id").val(user_id);
                $(".modal-body #loan_id").val(loan_id);
                $(".modal-body #monthly").val(monthly);

              
            
         });

           $('.undo').click(function(){

                var id  = $(this).data('id');
                var user_id  = $(this).data('user_id');
                var loan_id  = $(this).data('loan_id');
                $(".modal-body #id").val(id);
                $(".modal-body #user_id").val(user_id);
                $(".modal-body #loan_id").val(loan_id);
            
         });

               $('#print').click(function(){
        window.print();
    });

    });
</script>