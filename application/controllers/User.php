<?php


class User extends CI_Controller{

	 public function __construct ()
    {
       
        parent::__construct();
     
       $this->load->model('user_model'); 
        $this->load->model('administrator_model'); 
      
      
    }

	public function index(){

		if($this->session->userdata('logged_in')){

			if($this->session->userdata('user_type') == 1){
				redirect('admin');
			}else{

				


				$user_id = $this->session->userdata('user_id');
				
				
				// Get user informations
				$data['user_data'] = $this->user_model->profile($user_id);

				// Get notifications
				$limit = 5;
				$data['notifications'] = $this->user_model->notifications($user_id);

				// Count notifications
				$data['notification_count'] = $this->user_model->count_notifications($user_id);

				//Check if user has loan
				$data['has_loan']  = $this->user_model->hasLoan($user_id);
				$data['loans']  = $this->administrator_model->memberLoan($user_id);
				$data['levels'] = $this->user_model->select_levels();
				$data['all'] = $this->user_model->member_loans($user_id);
				$data['unpaid'] = $this->user_model->select_unpaid($user_id);

				// Get current date
				$today = Date('y-m-d');
				$compare = $this->user_model->birthDay();
				

				if($compare){

					foreach($compare as $bday){
						
						$bdate = $this->user_model->getBdate($bday['userID']);
						$age = date_diff(date_create($bdate), date_create('now'))->y;

							$ages = array(
								'age' => $age
							);
							$this->user_model->updateAge($bday['userID'],$ages);
							//echo var_dump($ages);
						
					}

					$this->load->view('includes/header'); 
					$this->load->view('users/index', $data);
					$this->load->view('includes/footer');
					
				}

				else{

					$this->load->view('includes/header'); 
					$this->load->view('users/index', $data);
					$this->load->view('includes/footer');
				}

				
			}

				
		}else{

			 redirect('login');
		}
				
	}


	public function view_loan($account_no, $loan_id){

		if($this->session->userdata('logged_in')){

			if($this->session->userdata('user_type') == 1){

				redirect('admin');

			}else{
				
				$data['loans']  = $this->user_model->viewLoan($account_no,$loan_id);
				$data['loan_details']  = $this->user_model->viewLoanDetails($loan_id);
				//$loans  = $this->user_model->viewLoan($account_no,$loan_id);
				
				$this->load->view('includes/header'); 
				$this->load->view('users/loans', $data);
				$this->load->view('includes/footer');
				//echo var_dump($loans);
			}

				
		}else{

			 redirect('login');
		}
				
	}

	// Register user
	public function register(){

		if($this->session->userdata('logged_in')){
			
			if($this->session->userdata('user_type') == 1){
				redirect('admin');
			}else{
				redirect('profile');
			}
			
		}else{

			$data['title'] = 'Register';
			
						//Get all levels/department --> Basic ed or Higher Education
						$data['levels'] = $this->user_model->select_levels();
						$data['account_no'] = $this->user_model->get_accountno();
			
						// Validate user form inputs
						$this->form_validation->set_rules('firstname', 'First name', 'required');
						$this->form_validation->set_rules('lastname', 'Last name', 'required');
						$this->form_validation->set_rules('middlename', 'Middle name', 'required');
						$this->form_validation->set_rules('email', 'E-mail', 'required');
						$this->form_validation->set_rules('department', 'required');
						$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
						$this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]');
						$this->form_validation->set_rules('gender', 'Gender','required');
						$this->form_validation->set_rules('birth_date', 'Birth date','required');
						$this->form_validation->set_rules('marital_status','Marital Status', 'required');
						$this->form_validation->set_rules('address', 'Address', 'required');
						$this->form_validation->set_rules('city', 'City', 'required');
						$this->form_validation->set_rules('citizenship', 'Citizenship', 'required');
						$this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
			
						
			
						if($this->form_validation->run() === FALSE){
			
							$this->load->view('includes/header'); 
							$this->load->view('users/register', $data);
							$this->load->view('includes/footer');
			
						}
						else{
			
							// Get user email
							$email = $this->input->post('email');
			
							// Get user password and encrypt it
							$encrypted = md5($this->input->post('password')); 

							//Determine user age by getting the bdate
							$bdate = $this->input->post('birth_date');
							$age = date_diff(date_create($bdate), date_create('now'))->y;
			
							// Store user data as array
							$data = array(
			
									'firstname' => 	$this->input->post('firstname'),
									'lastname'     => 	$this->input->post('lastname'),
									'middlename'     => 	$this->input->post('middlename'),
									'email'        => 	$this->input->post('email'),
									'user_type'	   =>	0,
									'level_id'        =>  $this->input->post('department'),
									'gender' => $this->input->post('gender'),
									'spouse_name' => $this->input->post('spouse_name'),
									'birth_date' => $this->input->post('birth_date'),
									'marital_status' => $this->input->post('marital_status'),
									'address' => $this->input->post('address'),
									'city' => $this->input->post('city'),
									'zipcode' => $this->input->post('zipcode'),
									'citizenship' => $this->input->post('citizenship'),
									'age' => $age,
									'password'  => 	$encrypted
			
							);


							// Check user input email if exist
							$exist = $this->user_model->check_email($email);
			
							if($exist){ 
			
								
								$this->session->set_flashdata('existed', ' E-mail address already exist!' );
								redirect('register'); 
			
							}else{
			
								// Else insert user to the database and return a message that registration successful
			
								$stored = $this->user_model->insert($data); // Call insert function from user models

								if($stored){

									// Fetch user data
									$userID = $this->user_model->get_userid($email);

									if($userID){

										$empty = array();
										foreach($userID as $id){

											$value = array(

												'balance' => 0,
												'userID' => $id['userID']
											);
											

											$empty = $value;
											
										}
									
									
										$stored2 = $this->user_model->insert_balance($empty);


										if($stored2){

											 $this->session->set_flashdata('registered', ' Registration successful! please wait for your account confirmation' );
								 			redirect('register'); 

										}else{

											 $this->session->set_flashdata('error', ' An error occurred while adding balance' );
								 			redirect('register'); 

										}


									}else{

										  $this->session->set_flashdata('error', ' Something went wrong please try later' );
								 			redirect('register'); 
									}



								}
								
							}
								
						}
		}

			

	}


	// Login user
	public function login(){

			if($this->session->userdata('logged_in')){
				if($this->session->userdata('user_type') == 1){
				redirect('admin');
			}else{
				redirect('profile');
			}
			
			}else{
				$data['title'] = 'Login';


			// Validate from inputs
			$this->form_validation->set_rules('email', 'E-mail address', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');


			// Return login view
			if($this->form_validation->run() === FALSE){

				$this->load->view('includes/header'); 
				$this->load->view('users/login', $data);
				$this->load->view('includes/footer');

			}
			else{


				// Get user created e-mail
				$email = $this->input->post('email');
				// Get user created password and encrpyt
				$password = md5($this->input->post('password'));

				// Call login_user function from user_model
				$users = $this->user_model->login_user($email, $password);

				
				if($users){

					// Check if user exist from the database

					foreach($users as $user){
						$user_data = array(
								'user_id' => $user['userID'],
								'email' => $email,
								'user_type' => $user['user_type'],
								'name' => $user['firstname'] .' '. $user['lastname'],
								'approved' => $user['approved'],
								'balance_id' => $user['balance_id'],
								'birth_date' => $user['birth_date'],
								'logged_in' => true
							);

						if($user['approved'] == '1'){
							
							$this->session->set_userdata($user_data);
							// If user is verified then login the user and redirect to user profile
							if($user['user_type'] == 1){
								 redirect('admin');
							}else{

								redirect('profile');
							}
							

						}else{

							// Else if user is not verified then return a message to login page
							$this->session->set_flashdata('unapproved' ,'Your account is still unapproved');
							redirect('login');
						}
					}
				}
			 	else{
					

					// Else if e-mail and password is invalid return a messsage
			 		$this->session->set_flashdata('invalid' ,'Invalid email or password!');;
			 		redirect('login');
			 	}
			 
					
			}
			}

			

	}

	public function user_notifications($id){

			$data['notifications'] = $this->user_model->notifications($id);

			$this->load->view('includes/header'); 
			$this->load->view('users/notification',$data);
			$this->load->view('includes/footer');
	}

	

	// Approve the user
	public function approve(){

		// Get user ID
		$user_id = $this->input->get('user_id');


		$data = array(	
			'approved' => 1
		);

		// Call approved function from user model
		$this->user_model->approved($user_id,$data);

		// If successful
		redirect('admin');
		

	}

	public function mark_read(){

		if($this->session->userdata('logged_in')){

			$notification_id = $this->input->post('notification_id');

			$data = array(
				'status' => 1
			);

			$read = $this->user_model->read_notification($notification_id,$data);

			if($read){
				redirect('profile');
			}else{

			   redirect('admin');
			}
		}else{

			redirect('admin');

		}

		
	}


	// Loan application function
	public function loan_application(){

		
			$this->form_validation->set_rules('occupation', 'occupation', 'required');
			$this->form_validation->set_rules('monthly_income', 'monthly_income', 'required');
			$this->form_validation->set_rules('properties_owned', 'properties_owned', 'required');
			$this->form_validation->set_rules('assessed_value', 'assessed_value', 'required');
			$this->form_validation->set_rules('amount_applied', 'amount_applied', 'required');
			$this->form_validation->set_rules('purpose', 'purpose', 'required');
			$this->form_validation->set_rules('term', 'term', 'required');


			// Return login view
			if($this->form_validation->run() === FALSE){

				$this->load->view('includes/header'); 
				$this->load->view('users/loan_application');
				$this->load->view('includes/footer');

			}else{



				$data = array(
					'userID' => $this->input->post('userID'),
					'loan_type' => $this->input->post('loan_type'),
					'occupation' => $this->input->post('occupation'),
					'monthly_income' => $this->input->post('monthly_income'),
					'properties_owned' => $this->input->post('properties_owned'),
					'assessed_value' => $this->input->post('assessed_value'),
					'amount_applied' => $this->input->post('amount_applied'),
					'purpose' => $this->input->post('purpose'),
					'term' => $this->input->post('term'),
					'balance_id' => $this->input->post('balance_id'),
					'status' => 0
				);


				$apply = $this->user_model->apply_loan($data);


				if($apply){

					$this->session->set_flashdata('applied' ,"Loan application submitted,  we will first review your loan details and we'll notify you if your loan application is granted or rejected. Thank you!");
			 		redirect('profile');

				}else{

					$this->session->set_flashdata('not_applied' ,'Loan application not submitted,  Something went wrong please try again later.');;
			 		redirect('profile');
				}



			}

		
	}



	public function edit(){

		if($this->session->userdata('logged_in')){
			
			if($this->session->userdata('user_type') == 1){
				redirect('admin');
			}else{
				
						 $userID = $this->input->post('userID');

					
							// Store user data as array
							$data = array(
			
									'firstname' => 	$this->input->post('firstname'),
									'lastname'     => 	$this->input->post('lastname'),
									'middlename'     => 	$this->input->post('middlename'),
									'user_type'	   =>	0,
									'level_id'        =>  $this->input->post('department'),
									'gender' => $this->input->post('gender'),
									'birth_date' => $this->input->post('birth_date'),
									'marital_status' => $this->input->post('marital_status'),
									'address' => $this->input->post('address'),
									'city' => $this->input->post('city'),
									'zipcode' => $this->input->post('zipcode'),
									'citizenship' => $this->input->post('citizenship'),
									'age' => $this->input->post('age'),
									
			
							);


			
								// Else insert user to the database and return a message that registration successful
			
								$updated = $this->user_model->updateProfile($userID,$data); // Call insert function from user models

								if($updated){

									// Fetch user data
									

									 $this->session->set_flashdata('registered', ' Account successfully updated' );
						 			redirect('profile'); 
									


								}else{

									 $this->session->set_flashdata('error', ' Something went wrong please try later' );
								 		redirect('profile'); 
									 
								}
								
							
				
			}
			
		}else{

			
			

						
		}

			

	}

	// Logout the user 
	public function logout(){
		
		//Unset session datas
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('approved');
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('birth_date');

		// and then redirect to login page
		redirect('login');

	}
}

