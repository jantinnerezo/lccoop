<?php

	class Administrator_model extends CI_Model{

		public function transactions(){
			
		}
		public function fetch_rows(){

			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('balance','balance.userID = user.userID');
			$this->db->join('level', 'level.id = user.level_id');
			$this->db->where('user.user_type', 0);

			$results = $this->db->get();

			if($results->num_rows() > 0){
				return $results->result_array();
			}else{
				return false;
			}

		}

		public function unapproveMembers(){

			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('balance','balance.userID = user.userID');
			$this->db->join('level', 'level.id = user.level_id');
			$this->db->where('user.user_type', 0);
			$this->db->where('user.approved', 0);

			$results = $this->db->get();

			if($results->num_rows() > 0){
				return $results->result_array();
			}else{
				return false;
			}

		}

		// Login admin to admin table
		public function admin_login($username, $password){
		
				$this->db->where('username', $username);
				$this->db->where('password', $password);
		
				$result = $this->db->get('admin');
		
				if($result->num_rows() > 0){
					return $result->result_array();
		
				}else{
					return false;
				}
		}

		public function fetch_transactions(){
			
				$this->db->select('*');
				$this->db->from('transactions');
				$this->db->join('user', 'user.userID = transactions.userID');
				$this->db->join('balance', 'balance.userID = transactions.userID');
	
				$results = $this->db->get();
	
				if($results->num_rows() > 0){
					return $results->result_array();
				}else{
	
					return false;
				}
			
		}

		public function loanTransactions(){
			
				$this->db->select('*');
				$this->db->from('member_loan');
				$this->db->join('user', 'user.userID = member_loan.userID');
				$this->db->where('status', 1);
	
				$results = $this->db->get();
	
				if($results->num_rows() > 0){
					return $results->result_array();
				}else{
	
					return false;
				}
			
		}

		public function insert_transactions($data){

			$this->db->insert('transactions', $data);
		}

		public function notification_sent($data){

			$this->db->insert('notifications', $data);

			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}


		}

		public function allLoans(){


			$results = $this->db->query("SELECT member_loan.id, loans.loan_id, user.userID, user.firstname, user.lastname, member_loan.amount, loans.purpose, loans.term, loans.loan_type, SUM(member_loan.amount) as total, loans.date_applied FROM user INNER JOIN member_loan ON member_loan.userID = user.userID INNER JOIN loans ON loans.loan_id = member_loan.loan_id GROUP BY user.userID ORDER BY date_applied DESC" );

			if($results->num_rows() > 0){
				return $results->result_array();
			}else{

				return false;
			}
		}

		

		public function memberLoan($id){

			$this->db->select('*');
			$this->db->from('member_loan');
			$this->db->join('user', 'user.userID = member_loan.userID');
			$this->db->where('member_loan.userID',$id);
		
			$results = $this->db->get();

			if($results->num_rows() > 0){
				return $results->result_array();
			}else{

				return false;
			}
		}
		public function loanDetails($id){

			$this->db->select('*');
			$this->db->from('loans');
			$this->db->join('user', 'user.userID = loans.userID');
			$this->db->where('user.userID',$id);
		
			$results = $this->db->get();

			if($results->num_rows() > 0){
				return $results->result_array();
			}else{

				return false;
			}
		}

		public function total_loan($id){


			$results = $this->db->query("SELECT SUM(amount) as total from member_loan WHERE userID = '$id'");

			if($results->num_rows() > 0){
				return $results->result_array();
			}else{

				return false;
			}
		}


		public function loan_request(){

			$this->db->select('*');
			$this->db->from('loans');
			$this->db->join('user', 'user.userID = loans.userID');
			$this->db->join('balance', 'balance.balance_id = loans.balance_id');
			$this->db->where('loans.status',0);

			$results = $this->db->get();

			if($results->num_rows() > 0){
				return $results->result_array();
			}else{

				return false;
			}
		}

		public function grantLoan($data){

			$this->db->insert('member_loan',$data);
		}

			// Mark notification as read
		public function update_loan($id,$data){

			$this->db->where('loan_id',$id);
			$this->db->update('loans',$data);

			if($this->db->affected_rows() > 0){

				return true;

			}else{

				return false;

			}


		}


		// Mark notification as read
		public function paidMember($id,$data){

			$this->db->where('id',$id);
			$this->db->update('member_loan',$data);

			if($this->db->affected_rows() > 0){

				return true;

			}else{

				return false;

			}

		}


		
		public function addExcess($month,$loan_id,$data){
				
			$this->db->where('date',$month);
			$this->db->where('loan_id',$loan_id);
			$this->db->update('member_loan',$data);

			if($this->db->affected_rows() > 0){

				return true;

			}else{

				return false;

			}
				
		}


		public function rejectLoan($id){

			$rejected = $this->db->delete('loans', array('loan_id' => $id)); 

			if($rejected){
				return true;
			}else{
				return false;
			}


		}

		public function checkStatus($loan_id, $userID){

			$this->db->where('loan_id',$loan_id);
			$this->db->where('userID',$userID);
			$this->db->where('status',0);
			$results = $this->db->get('member_loan');

			if($results->num_rows() > 0){
				return true;
			}else{

				return false;
			}
		
		}

		public function paidLoan($loan_id,$data){

			$this->db->where('loan_id',$loan_id);
			$this->db->update('loans',$data);

			if($this->db->affected_rows() > 0){

				return true;

			}else{

				return false;

			}
		
		}






	
	}

