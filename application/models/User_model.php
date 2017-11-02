<?php


class User_model extends CI_Model{


	public function get_accountno(){

		$result = $this->db->query("SELECT `AUTO_INCREMENT` as account_no FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'lourdescooperative' AND   TABLE_NAME   = 'user'");

		if($result->num_rows() > 0){
			$row = $result->row();
			return $row->account_no;
		}else{
			return false;
		}

	}

	// Insert data into user table
	public function insert($data){

		$this->db->insert('user',$data);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	// Insert balance into balance table
	public function insert_balance($data2){

		$this->db->insert('balance',$data2);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	public function get_userid($email){

		$this->db->where('email',$email);

		$row = $this->db->get('user');

		if($row->num_rows() > 0){
			return $row->result_array();
		}else{
			return false;
		}
	}


	//Check if email already exist
	public function check_email($email){

		$this->db->where('email' ,$email);
		$result = $this->db->get('user');

		if($result->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	#Login user from user table
	public function login_user($email, $password){

		$this->db->where('user.email', $email);
		$this->db->where('user.password', $password);
		$this->db->select('*')
				->from('user')
				->join('balance','balance.userID = user.userID');

		$result = $this->db->get();

		if($result->num_rows() > 0){
			return $result->result_array();

		}else{
			return false;
		}
	}

	public function securityPassword($email, $password){

		$this->db->where('user.email', $email);
		$this->db->where('user.password', $password);
	
		$result = $this->db->get('user');

		if($result->num_rows() > 0){
			return true;

		}else{
			return false;
		}
	}


	// Loan application
	public function apply_loan($data){

		$this->db->insert('loans',$data);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function hasLoan($user_id){

		$this->db->where('userID',$user_id);
		$this->db->where('paid',0);
		$result = $this->db->get('loans');

		if($result->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	//Get user informations
	public function profile($user_id){


		$this->db->select('*')
				 ->from('user')
				 ->join('balance','balance.userID = user.userID')
				 ->join('level','level.id = user.level_id')
				 ->where('user.userID', $user_id);

		$result = $this->db->get();

		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}
	}


		// Mark notification as read
	public function updateProfile($user_id,$data){

		$this->db->where('userID',$user_id);
		$this->db->update('user',$data);

		if($this->db->affected_rows() > 0){

			return true;

		}else{

			return false;

		}


	}

	//Get user notifications
	public function notifications($user_id,$limit = FALSE){

		if($limit)
			$this->db->limit($limit);	

		$this->db->select('*')
			 ->from('notifications')
			 ->join('user','user.userID = notifications.recipient')
			 ->where('notifications.recipient', $user_id);

		$this->db->order_by('timestamp','DESC');

		$result = $this->db->get();

		if($result->num_rows() > 0){
			return $result->result_array();

		}else{
			return false;
		}
	}

	//Get user notifications
	public function count_notifications($user_id){

	
		$this->db->where('recipient', $user_id);

		$result = $this->db->get('notifications');

		if($result->num_rows() > 0){
			return $result->result();

		}else{
			return false;
		}


	}

	// Mark notification as read
	public function read_notification($notification_id,$data){

		$this->db->where('notification_id',$notification_id);
		$this->db->update('notifications',$data);

		if($this->db->affected_rows() > 0){

			return true;

		}else{

			return false;

		}


	}



	public function save_deposit($user_id,$data){

		$this->db->where('userID',$user_id);
		$this->db->update('balance', $data);
	}



	public function member_loans($userID){


		$this->db->where('userID',$userID);
		$this->db->where('status',1);
		$result = $this->db->get('loans');

		if($result->num_rows() > 0){
			return $result->result_array();

		}else{
			return false;
		}
	}

	public function viewLoanDetails($loan_id){


	
		$this->db->where('loan_id',$loan_id);
		$result = $this->db->get('loans');

		if($result->num_rows() > 0){
			return $result->result_array();

		}else{
			return false;
		}
	}



	public function viewLoan($userID,$loan_id){


		$this->db->select('*');
		$this->db->from('loans');
		$this->db->join('member_loan','member_loan.loan_id = loans.loan_id');
		$this->db->where('loans.userID',$userID);
		$this->db->where('loans.loan_id',$loan_id);
		$result = $this->db->get();

		if($result->num_rows() > 0){
			return $result->result_array();

		}else{
			return false;
		}
	}


	public function select_unpaid($userID){


		$this->db->where('userID',$userID);
		$this->db->where('status',0);
		$result = $this->db->get('loans');

		if($result->num_rows() > 0){
			return true;

		}else{
			return false;
		}
	}





	#Get levels
	public function select_levels(){

		$result = $this->db->get('level');
		return $result->result_array();
	}

	// Approval
	public function approved($id,$data){
		$this->db->where('userID',$id);
		$this->db->update('user', $data);
	}


	// Check birthdays
	public function birthDay(){

		
		$result = $this->db->query("SELECT* FROM `user` WHERE MONTH(birth_date) <= MONTH(NOW()) AND DAY(birth_date) <= DAY(NOW())");

		if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}
	}

	// Approval
	public function updateAge($userID,$data){
		$this->db->where('userID',$userID);
		$this->db->update('user', $data);
	}

	public function getBdate($userID){

		$this->db->where('userID',$userID);
		$result = $this->db->get('user');

		if($result->num_rows() > 0){
			$row = $result->row();
			return $row->birth_date;
		}else{
			return false;
		}

	}
}	



