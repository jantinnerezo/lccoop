
        <div class="col-md-9">

            <div class="admin-wrapper">

                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success');?></div>
                <?php endif;?>
              
             
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error');?></div>
                <?php endif;?>
                <?php if($loan_request): ?>
                    <h4 class="text-info"><span class="oi oi-envelope-closed"></span> Loan Request (<?php echo count($loan_request);?>)</h4>
                <?php else: ?>
                    <h4 class="text-info"><span class="oi oi-envelope-closed"></span> Loan Request (0)</h4>
                <?php endif;?>
                    
                    <?php if($loan_request):?>
                    <div class="table-responsive">
                            <table class="table table-striped"  id="table">
                                <thead>
                                    <th>Account #</th>
                                    <th>Name</th>
                                    <th class="text-right">Amount Applied</th>
                                    <th>Loan Type</th>
                                    <th>Purpose</th>
                                    <th>Term</th>
                                    <th class="text-center">Date Applied</th>
                                    <th class="text-center">Options</th>
                                </thead>
                                <tbody>
                                    <?php foreach($loan_request as $loan): ?>
                                        <tr>
                                            <td><?php echo $loan['userID'];?></td>
                                            <td><?php echo $loan['firstname'] .' '.$loan['lastname'];?></td>
                                            <td class="text-right"><?php echo '&#8369; ' . number_format($loan['amount_applied'], 2, '.', ',');?></td>
                                            <?php if($loan['loan_type'] == 1): ?>
                                                <td>Regular</td>
                                            <?php else: ?>
                                                <td>Petty Cash</td>
                                            <?php endif;?>
                                            <td class="purpose"><?php echo $loan['purpose'];?></td>
                                            <?php if($loan['loan_type'] == 1): ?>
                                                <td><?php echo $loan['term'];?> months</td>
                                            <?php else: ?>
                                                <td>N/A</td>
                                            <?php endif;?>
                                            
                                            <td><?php echo Date('M j, Y',strtotime($loan['date_applied']));?></td>


                                                <td class="text-center">
                                                    <div class="dropdown show">
                                                    <button class="btn btn-block btn-secondary" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="oi oi-cog"></span>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <button class="dropdown-item grant"
                                                        data-toggle="modal"
                                                        data-loan="<?php echo $loan['loan_id'];?>"
                                                        data-no="<?php echo $loan['userID'];?>"
                                                        data-loantype="<?php echo $loan['loan_type'];?>"
                                                        data-name="<?php echo $loan['firstname'] .' '.$loan['lastname'];
                                                        ?>"   
                                                        data-amount="<?php echo $loan['amount_applied'];?>"
                                                        data-format="<?php echo '&#8369; ' . number_format($loan['amount_applied'], 2, '.', ',');?>"
                                                        data-purpose="<?php echo $loan['purpose'];?>"
                                                        data-term="<?php echo $loan['term'];?>"
                                                        data-applied="<?php echo Date('M j, Y',strtotime($loan['date_applied']));?>"
                                                        data-target="#confirmRequest" 

                                                         >Grant</button>
                                                        <div class="dropdown-divider"></div>
                                                        <button class="dropdown-item reject"
                                                        data-toggle="modal"
                                                        data-loan="<?php echo $loan['loan_id'];?>"
                                                        data-no="<?php echo $loan['userID'];?>"
                                                        data-loantype="<?php echo $loan['loan_type'];?>"
                                                        data-name="<?php echo $loan['firstname'] .' '.$loan['lastname'];
                                                        ?>"   
                                                        data-amount="<?php echo $loan['amount_applied'];?>"
                                                        data-format="<?php echo '&#8369; ' . number_format($loan['amount_applied'], 2, '.', ',');?>"
                                                        data-purpose="<?php echo $loan['purpose'];?>"
                                                        data-term="<?php echo $loan['term'];?>"
                                                        data-applied="<?php echo Date('M j, Y',strtotime($loan['date_applied']));?>"
                                                        data-target="#rejectRequest" 
                                                        >Reject</button>
       
                                                    </div>
                                                </div>
                                                </td>
                                           
                                           
                                            </tr>
                                    <?php endforeach; ?>
                                    
                                
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                            <div class="alert alert-warning">
                                No data found
                            </div>
                    <?php endif;?>

                       
                    </div>
                </div>
           
    </div>


    <!-- Confirm modal -->
    <div class="modal fade" id="confirmRequest" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><span class="oi oi-envelope-closed"></span> Loan Application Request Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <?php echo form_open('grant_loan');?>
                  <div class="modal-body">
                    <input type="hidden" name="id" id="loan_id">
                    <input type="hidden" name="user_id" id="user_id">
                    <input type="hidden" name="mount" id="amount">
                    <input type="hidden" name="user_name" id="user_name">
                    <input type="hidden" name="term" id="term">
                    <input type="hidden" name="loan_type" id="loan_type" >
                    <input type="hidden" name="applied" id="applied">
                        <div class="form-group">
                            <label id="account_no"></label>
                        </div>
                         <div class="form-group"> 
                            <label id="account_name"></label>
                        </div>
                        <div class="form-group" >
                            <label id="format"></label>
                        </div>  
                        <div class="form-group" >
                            <label id="purpose"></label>
                        </div>  
                         <div class="form-group" >
                            <label id="termlabel"></label>
                        </div> 
                   </div>

                  <div class="modal-footer">
                      <button  class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"> Grant</button>
                  </div>
   
             <?php echo form_close();?>
        </div>
      </div>
    </div>



      <!-- Reject modal -->
    <div class="modal fade" id="rejectRequest" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><span class="oi oi-envelope-closed"></span>  Reject Loan Application</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <?php echo form_open('reject_loan');?>
                  <div class="modal-body">
                    <input type="hidden" name="id" id="loan_id">
                    <input type="hidden" name="user_id" id="user_id">
                    <input type="hidden" name="mount" id="amount">
                    <input type="hidden" name="user_name" id="user_name">
                    <input type="hidden" name="term" id="term">
                    <input type="hidden" name="loan_type" id="loan_type">
                    <input type="hidden" name="applied" id="applied">
                       
                         <div class="form-group"> 
                            <label id="account_name"></label>
                        </div>
                     
                   </div>

                  <div class="modal-footer">
                      <button  class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger"> Reject</button>
                  </div>
   
             <?php echo form_close();?>
        </div>
      </div>
    </div>


</div>



<script>
    $(document).ready(function(){
       $('#table').DataTable({
            "paging":   false,
            "ordering": false,
            "info":     false
        });

          $('.grant').click(function(){

                var loan_id  = $(this).data('loan');
                var account_no  = $(this).data('no');
                var account_name  = $(this).data('name');
                var amount  = $(this).data('amount');
                var format  = $(this).data('format');
                var purpose  = $(this).data('purpose');
                var loan_type  = $(this).data('loantype');
                var term  = $(this).data('term');
                var applied  = $(this).data('applied');

                $(".modal-body #loan_id").val(loan_id);
                $(".modal-body #user_id").val(account_no);
                $(".modal-body #user_name").val(account_name);
                $(".modal-body #term").val(term);
                $(".modal-body #amount").val(amount);
                $(".modal-body #loan_type").val(loan_type);
                $(".modal-body #applied").val(applied);
                $(".modal-body #account_no").text('Account No.: ' +account_no );
                $(".modal-body #account_name").text('Name: ' +account_name );
                $(".modal-body #format").text('Amount Applied: ' +format );
                $(".modal-body #purpose").text('Purpose: ' +purpose );
                $(".modal-body #termlabel").text('Loan Term: ' +term+' months' );
   
         });


            $('.reject').click(function(){

                var loan_id  = $(this).data('loan');
                var account_no  = $(this).data('no');
                var account_name  = $(this).data('name');
                var amount  = $(this).data('amount');
                var format  = $(this).data('format');
                var purpose  = $(this).data('purpose');
                var term  = $(this).data('term');
                var applied  = $(this).data('applied');

                $(".modal-body #loan_id").val(loan_id);
                $(".modal-body #user_id").val(account_no);
                $(".modal-body #user_name").val(account_name);
                $(".modal-body #term").val(term);
                $(".modal-body #amount").val(amount);
                $(".modal-body #applied").val(applied);
                $(".modal-body #account_name").text('This will reject the loan application of ' +account_name );
            
   
         });
    });
</script>