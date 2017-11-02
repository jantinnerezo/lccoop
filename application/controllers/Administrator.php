<?php

class Administrator extends CI_Controller{

	public function __construct (){
       
        parent::__construct();
    
       $this->load->model('administrator_model'); 
       $this->load->model('user_model'); 
      
	}
	

	public function admin(){

		if($this->session->userdata('logged_in')){
			
			if($this->session->userdata('user_type') == 1){
				$data['members'] = $this->administrator_model->fetch_rows();
				$data['unapprove'] = $this->administrator_model->unapproveMembers();
				$data['loan_request'] = $this->administrator_model->loan_request();

				
				$this->load->view('includes/header'); 
				$this->load->view('administrator/sidebar',$data); 
				$this->load->view('administrator/clients', $data);
				$this->load->view('includes/footer');
			

			}else{
				redirect('profile');
			}
		}
		else{

			redirect('login');
		}
			
	}

	public function member_print(){

		if($this->session->userdata('logged_in')){
			
			if($this->session->userdata('user_type') == 1){
				$data['members'] = $this->administrator_model->fetch_rows();
				$data['unapprove'] = $this->administrator_model->unapproveMembers();
				$data['loan_request'] = $this->administrator_model->loan_request();

			$this->load->view('includes/header'); 
			$this->load->view('administrator/clients_print', $data);
			$this->load->view('includes/footer');
			}else{
				redirect('profile');
			}
		}
		else{

			redirect('login');
		}
			
	}

	public function request(){

		if($this->session->userdata('logged_in')){
			
			if($this->session->userdata('user_type') == 1){
				$data['unapprove'] = $this->administrator_model->unapproveMembers();
				$data['loan_request'] = $this->administrator_model->loan_request();

			$this->load->view('includes/header'); 
			$this->load->view('administrator/sidebar',$data); 
			$this->load->view('administrator/request', $data);
			$this->load->view('includes/footer');
			}else{
				redirect('profile');
			}
		}
		else{

			redirect('login');
		}
			
	}


	// Deposit function
	public function deposit(){
		
		$user_id = $this->input->get('user_id');
		
		$data['account'] = $this->user_model->profile($user_id);


		//Get current amount
		$balance = $this->input->post('balance');
		
		// Get amount deposited
		$amount = $this->input->post('amount');

		// User name
		$name = $this->input->post('user_name');


		// User ID
		$id = $this->input->post('user_id');

	
		//Add deposited amount to current balance
		$new = $balance+$amount;

		// Store as array		
		$data = array(
				'balance' => $new
		);


		// Call save_deposit function from user_model
		$this->user_model->save_deposit($id,$data);
		
		$deposited_amout = $name . ' deposited an amount of Php ' . $amount;
		// Format amount to a currency format
		$new_format = number_format($amount, 2,'.', ',');
		$this->session->set_flashdata('deposited' ,'Deposited an amount of Php ' . $new_format . ' to '. $name);

		$transactions = array(
					'userID' => $id,
					'amount' => $amount,
					'transaction_type' => 'deposit',
					'admin' => $this->session->userdata('name')

				);
		$this->administrator_model->insert_transactions($transactions);
		redirect('admin');
	

		
		
		
	}
		

	// Withdraw function
	public function withdraw(){
		

		$user_id = $this->input->get('user_id');

		$data['account'] = $this->user_model->profile($user_id);

	
			//Get current amount
			$balance = $this->input->post('balance');

			// Get amount withdrawed
			$amount = $this->input->post('amount');

			// User name
			$name = $this->input->post('user_name');

			
			// Get ID
			$id = $this->input->post('user_id');

			
				if($balance <= 0){
						$this->session->set_flashdata('insufficient', 'Ooopss.. Withdrawal denied, insufficient account balance.');
						redirect('admin');
					}else if($amount > $balance){
						$this->session->set_flashdata('over', 'Ooopss.. Withdrawal denied, desired amount to withdraw is too large.');
						redirect('admin');
					}
					
					else{
						$newbal = $balance-$amount;
						
						// Store as array
						$data = array(
								'balance' => $newbal
						);
						// Call save_withdraw function from user_model
						$this->user_model->save_deposit($id,$data);

						// Format amount to a currency format
						$new_format = number_format($amount, 2,'.', ',');
						$this->session->set_flashdata('withdrawed' , $name . ' withdrawed an amount of Php ' . $new_format . ' successfully');

						$transactions = array(
							'userID' => $id,
							'amount' => $amount,
							'transaction_type' => 'withdrawal',
							'admin' => $this->session->userdata('name')

						);
						$this->administrator_model->insert_transactions($transactions);
						redirect('admin');		
					}

	
			

			
	

	}


	// Function: send notification
	public function send_notifications(){
		

		$user_id = $this->input->get('user_id');

		$data['account'] = $this->user_model->profile($user_id);

		
		// Get notification content
		$content = $this->input->post('notification');

		// User name
		$name = $this->input->post('user_name');

		// Get ID
		$id = $this->input->post('user_id');

		// Admin ID
		$admin_name = $this->session->userdata('name');
		
		// Store as array
		$notification = array(
				'notification' => $content,
				'sender' => $admin_name,
				'recipient' => $id
		);

		$sent = $this->administrator_model->notification_sent($notification);

		if($sent){
			$this->session->set_flashdata('success' ,'Notification sent to  ' . $name . ' successfully');
			redirect('admin');		
		}else{

			$this->session->set_flashdata('error' ,'Notification no sent to  ' . $name);
			redirect('admin');	
		}
		
		
		


	}


	public function transactions(){
		
		$data['title'] = 'Transactions';

		$data['transactions'] = $this->administrator_model->fetch_transactions();
		$data['unapprove'] = $this->administrator_model->unapproveMembers();
		$data['loan_request'] = $this->administrator_model->loan_request();


		$this->load->view('includes/header'); 
		$this->load->view('administrator/sidebar',$data); 
		$this->load->view('administrator/transactions', $data);
		$this->load->view('includes/footer');
	}


	public function grant_loan(){

		
		//$date_granted = Date('M d, Y - h:i A');
		$date_granted = Date('Y-m-d');

		$loan_id = $this->input->post('id');
		$user_id = $this->input->post('user_id');
		$name = $this->input->post('user_name');
		$date = $this->input->post('applied');
		$loan_type = $this->input->post('loan_type');
		// Calculations
		$loan_amount = $this->input->post('mount');
		$term = $this->input->post('term');

		$interest = $loan_amount * 0.01;
		$service_fee = $loan_amount * 0.02;

		$total_interest = $loan_amount + $interest;
		$total = $total_interest + $service_fee;

		$per_month = $total/$term;


		$date_due = strtotime('+'.$term.' Months');

		
		//Notify the member
		$content = 'Hi ' .$name.", you're loan request submitted on ".$date. ' is granted.';
		$notification = array(
				'notification' => $content,
				'sender' => $this->session->userdata('name'),
				'recipient' => $user_id
		);

		$loandata = array(
			'date_granted' => $date_granted,
			'date_due' => Date('Y-m-d',$date_due),
			'status' => 1
		);

		if($loan_type == 2){

			$granted = $this->administrator_model->update_loan($loan_id, $loandata);

			if($granted){

				$data = array(
					'loan_id' => $loan_id,
					'userID' => $user_id,
					'amount' => $loan_amount,
					'status' => 0
				);

				$this->administrator_model->grantLoan($data);

				$sent = $this->administrator_model->notification_sent($notification);
				
				if($sent){

					$this->session->set_flashdata('success' ,'Grant the Petty Cash loan application of  ' . $name);
					redirect('request');	
				}else{
					$error = json_encode($loandata);
					$this->session->set_flashdata('error' ,'Something went wrong, please try again later.' );
					redirect('admin/request');	
				}

			}else{

				$this->session->set_flashdata('error' ,'Something went wrong, please try again later.' );
				redirect('admin/request');	
			}


		}else{

		
			$granted = $this->administrator_model->update_loan($loan_id, $loandata);
			
					if($granted){
			
							for($x = 0; $x < $term; $x++){
			
								$date = strtotime('+'.$x.' Months');
								$data = array(
									'date' => Date('Y-m-d',$date),
									'loan_id' => $loan_id,
									'userID' => $user_id,
									'amount' => $per_month,
									'status' => 0
								);
			
								$this->administrator_model->grantLoan($data);
							}
			
							$sent = $this->administrator_model->notification_sent($notification);
			
							if($sent){
			
								$this->session->set_flashdata('success' ,'Grant the loan application of  ' . $name);
								redirect('request');	
							}else{
								$error = json_encode($loandata);
								$this->session->set_flashdata('error' ,'Something went wrong, please try again later.' );
								redirect('admin/request');	
							}
			
					}else{
							$error = json_encode($test);
							$this->session->set_flashdata('error' ,'Something went wrong, please try again later.');
								redirect('request');	
					}


		}
		

		

		

	}

	public function reject_loan(){

		$loan_id = $this->input->post('id');
		$user_id = $this->input->post('user_id');
		$name = $this->input->post('user_name');
		$date = $this->input->post('applied');

		$rejected = $this->administrator_model->rejectLoan($loan_id);

		if($rejected){
			//Notify the member
			$content = 'Hi ' .$name.", We're sorry to say that you're loan request submitted on ".$date. ' is rejected.';
			$notification = array(
					'notification' => $content,
					'sender' => $this->session->userdata('name'),
					'recipient' => $user_id
			);

			$sent = $this->administrator_model->notification_sent($notification);

			if($sent){

				$this->session->set_flashdata('success' ,'Rejected the loan application of  ' . $name);
				redirect('request');	
			}else{
				$error = json_encode($loandata);
				$this->session->set_flashdata('error' ,'Something went wrong, please try again later.' );
				redirect('request');	
			}


		}else{

			$this->session->set_flashdata('error' ,'Something went wrong, please try again later.' );
				redirect('request');

		}

	}


	public function all_loans(){

		if($this->session->userdata('logged_in')){
			
			if($this->session->userdata('user_type') == 1){

				$data['loans'] = $this->administrator_model->allLoans();
				$data['unapprove'] = $this->administrator_model->unapproveMembers();
				$data['loan_request'] = $this->administrator_model->loan_request();

				$this->load->view('includes/header'); 
				$this->load->view('administrator/sidebar',$data); 
				$this->load->view('administrator/loans', $data);
				$this->load->view('includes/footer');
			}else{
				redirect('profile');
			}
		}
		else{

			redirect('login');
		}
			
	}

	public function member_loan($loan_id, $user_id){
		
		
		$data['loans'] = $this->administrator_model->memberLoan($user_id);
		$data['details'] = $this->administrator_model->loanDetails($user_id);
		$data['unapprove'] = $this->administrator_model->unapproveMembers();
		$data['loan_request'] = $this->administrator_model->loan_request();

		$total = $this->administrator_model->total_loan($user_id);
		
		foreach ($total as $tot) {
			$data['total'] = $tot['total'];
		}
		

		$this->load->view('includes/header'); 
		$this->load->view('administrator/sidebar',$data); 
		$this->load->view('administrator/member_loan', $data);
		$this->load->view('includes/footer');
	}



	public function paid(){

		$date_paid = Date('y-m-d');
		$loan_id = $this->input->post('loan_id');
		$user_id = $this->input->post('user_id');

		$id = $this->input->post('id');
		$amount = $this->input->post('amount');
		$date = $this->input->post('date');
		$monthly = $this->input->post('monthly');

		

		if($amount > $monthly){

			//Notify the member
			$content = 'Good day, monthly payment on ' . Date('F, d Y') .' is paid. Excessed amount of the payment is subtracted on the following month.';
			$notification = array(
					'notification' => $content,
					'sender' => $this->session->userdata('name'),
					'recipient' => $user_id
			);

			// Get excess amount
			$excess = $amount - $monthly;

			// Add the excess
			$add_excess = $monthly - $excess;

			$data = array(
				'status' => '1',
				'date_paid' => $date_paid
	
			);

		
					$paid = $this->administrator_model->paidMember($id,$data);

					if($paid){

						// Add excess to next month loan

						$next_month = strtotime('+1 months', strtotime($date));
						
						$month = Date('Y-m-d',$next_month);

						$data2 = array(

							'amount' => $add_excess
				
						);

						$paid2 = $this->administrator_model->addExcess($month,$loan_id,$data2);

						if($paid2){

							$checkStatus = $this->administrator_model->checkStatus($loan_id, $user_id);

							if($checkStatus){
								$sent = $this->administrator_model->notification_sent($notification);
								redirect('loans/loan_records/' . $loan_id . '/' . $user_id);
							}else{

								//Notify the member
								$contents = 'Good day, we just want to tell you that you completed and fully paid your loan, you can now apply for a loan again. Thank you!';
								$notify = array(
										'notification' => $contents,
										'sender' => $this->session->userdata('name'),
										'recipient' => $user_id
								);

								$status = array(
									'paid' => 1
								);

								$updateStatus = $this->administrator_model->paidLoan($loan_id, $status);

								if($updateStatus){
									$send = $this->administrator_model->notification_sent($notify);
									redirect('loans/loan_records/' . $loan_id . '/' . $user_id);
								}else{

								}
								
							}
							
						}else{

							$checkStatus = $this->administrator_model->checkStatus($loan_id, $user_id);

							if($checkStatus){
								$sent = $this->administrator_model->notification_sent($notification);
								redirect('loans/loan_records/' . $loan_id . '/' . $user_id);
							}else{

								//Notify the member
								$contents = 'Good day, we just want to tell you that you completed and fully paid your loan, you can now apply for a loan again. Thank you!';
								$notify = array(
										'notification' => $contents,
										'sender' => $this->session->userdata('name'),
										'recipient' => $user_id
								);

								$status = array(
									'paid' => 1
								);

								$updateStatus = $this->administrator_model->paidLoan($loan_id, $status);

								if($updateStatus){
									$send = $this->administrator_model->notification_sent($notify);
									redirect('loans/loan_records/' . $loan_id . '/' . $user_id);
								}else{

								}
								
							}
							$sent = $this->administrator_model->notification_sent($notification);
							redirect('loans/loan_records/' . $loan_id . '/' . $user_id);
						}

	
					}else{

						redirect('loans/loan_records/' . $loan_id . '/' . $user_id);
					}

			

		}
		else{

			//Notify the member
			$content = 'Good day, monthly payment on ' . Date('F, d Y') .' is paid.';
			$notification = array(
					'notification' => $content,
					'sender' => $this->session->userdata('name'),
					'recipient' => $user_id
			);

			$data = array(
				'status' => '1',
				'date_paid' => $date_paid
	
			);

		

			$paid = $this->administrator_model->paidMember($id,$data);

			if($paid){

				$checkStatus = $this->administrator_model->checkStatus($loan_id, $user_id);

				if($checkStatus){
					$sent = $this->administrator_model->notification_sent($notification);
					redirect('loans/loan_records/' . $loan_id . '/' . $user_id);
				}else{

					//Notify the member
					$contents = 'Good day, we just want to tell you that you completed and fully paid your loan, you can now apply for a loan again. Thank you!';
					$notify = array(
							'notification' => $contents,
							'sender' => $this->session->userdata('name'),
							'recipient' => $user_id
					);

					$status = array(
						'paid' => 1
					);

					$updateStatus = $this->administrator_model->paidLoan($loan_id, $status);

					if($updateStatus){
						$send = $this->administrator_model->notification_sent($notify);
						redirect('loans/loan_records/' . $loan_id . '/' . $user_id);
					}else{

					}
					
				}
				
			
			}else{
				$sent = $this->administrator_model->notification_sent($notification);
				redirect('loans/loan_records/' . $loan_id . '/' . $user_id);
			}

			
		}


		
		
		
		

	}


	public function undo(){

		
		$loan_id = $this->input->post('loan_id');
		$user_id = $this->input->post('user_id');

		$id = $this->input->post('id');
		$data = array(
			'status' => '0',
			
		);

		// Get email and password
			$email = $this->session->userdata('email');
			$password = md5($this->input->post('password'));


			$security_check = $this->user_model->securityPassword($email, $password);

			if($security_check){
					$paid = $this->administrator_model->paidMember($id,$data);

					if($paid){

						redirect('loans/loan_records/' . $loan_id . '/' . $user_id);
					}else{

					
					}

	
			}else{
					$this->session->set_flashdata('error' ,"Transaction denied, admin password is invalid!");
					redirect('loans/loan_records/' . $loan_id . '/' . $user_id);
			}
			

		

	}


	public function loan_transactions(){
		
	

		$data['loan_transactions'] = $this->administrator_model->loanTransactions();
		$data['unapprove'] = $this->administrator_model->unapproveMembers();
		$data['loan_request'] = $this->administrator_model->loan_request();


		$this->load->view('includes/header'); 
		$this->load->view('administrator/sidebar',$data); 
		$this->load->view('administrator/loan_transactions', $data);
		$this->load->view('includes/footer');
	}


	public function loan_transactions_print(){
		
	

		$data['loan_transactions'] = $this->administrator_model->loanTransactions();
		$data['unapprove'] = $this->administrator_model->unapproveMembers();
		$data['loan_request'] = $this->administrator_model->loan_request();

		$this->load->view('includes/header'); 
		$this->load->view('administrator/loan_transactions_print', $data);
		$this->load->view('includes/footer');
	}


	public function loans_print(){

		if($this->session->userdata('logged_in')){
			
			if($this->session->userdata('user_type') == 1){

				$data['loans'] = $this->administrator_model->allLoans();
				$data['unapprove'] = $this->administrator_model->unapproveMembers();
				$data['loan_request'] = $this->administrator_model->loan_request();

				$this->load->view('includes/header'); 
				$this->load->view('administrator/loan_print', $data);
				$this->load->view('includes/footer');
			}else{
				redirect('profile');
			}
		}
		else{

			redirect('login');
		}
			
	}


	public function member_loan_print($loan_id, $user_id){
		
		
		$data['loans'] = $this->administrator_model->memberLoan($user_id);
		$data['details'] = $this->administrator_model->loanDetails($user_id);
		$data['unapprove'] = $this->administrator_model->unapproveMembers();
		$data['loan_request'] = $this->administrator_model->loan_request();

		$total = $this->administrator_model->total_loan($user_id);
		
		foreach ($total as $tot) {
			$data['total'] = $tot['total'];
		}
		
		$this->load->view('includes/header'); 
		$this->load->view('administrator/member_loan_print', $data);
		$this->load->view('includes/footer');
	}


	public function transactions_print(){
		
		$data['title'] = 'Transactions';

		$data['transactions'] = $this->administrator_model->fetch_transactions();
		$data['unapprove'] = $this->administrator_model->unapproveMembers();
		$data['loan_request'] = $this->administrator_model->loan_request();


		$this->load->view('includes/header'); 
		$this->load->view('administrator/transactions_print', $data);
		$this->load->view('includes/footer');
	}





}

?>