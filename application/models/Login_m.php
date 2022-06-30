<?php

class Login_m extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->data['table_name'] 	= 'akun';
    	$this->data['primary_key']	= 'nip';
	}
	
	public function cek_login($nip,$password){
		$user_data = $this->get_row(['nip'=>$nip]);
		if(isset($user_data)){
			if ($user_data->password == md5($password)) {

				 
				$user_session = [
					'nip'	=> $user_data->nip, 
					'id_role'	=> $user_data->role 
				]; 
				
				$this->db->where($this->data['primary_key'], $nip);
		 		$this->db->update($this->data['table_name'], ['last_login' => date('Y-m-d H:i:s')]);
				$this->session->set_userdata($user_session);
				return 2;
			}else {
				return 1;
			}
		}
		return 0;
	}
}