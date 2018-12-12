<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Team extends CI_Controller {
	function Team(){
		parent::__construct();
		$this->load->database();        		
		$this->load->model('team_model');
		header("Access-Control-Allow-Origin: *");
	}
	 function index(){
		if(is_login() == 0){ redirect(base_url(''),'refresh');}
		$this->load->view('header');				
		$data['organization'] = $this->team_model->getAllorganization();		
		$data["fetch_data"] = $this->team_model->team_fetch_data();  				
		$data['teams'] = $this->team_model->getAllteams();				
		$data['employees'] = $this->team_model->getAllemployees();				
		$this->load->view("team", $data);        		
		$this->load->view('footer');
	}	     	
	function savingdata($id = 0)  {   
     $text = str_replace(' ', '_', $this->input->post('team'));
	
	$datas = array('team' => $text);         
	$datain = array('team' => $text,'org_id' => $this->input->post('org_id')); 					
		if ($id == 0) {             		
		$this->db->insert('team', $datain);             		
		redirect("team/index/0");        		
		} else {             		
		$this->db->where('id', $id);             		
		$this->db->update('team', $datas);			 			 		
		redirect("team/index/0");        		
		}			      	
	}  		   	
	function savingteamdata($id = 0)  {          		
	$teamsid=$this->input->post('teamsid');								  		
	$employee_id=$this->input->post('employee_id');						
		//for($i=0;$i<count($teamsid);$i++){																						 		
		$datas = array('team' => $teamsid[0],'team2' => $teamsid[1],'team3' => $teamsid[2],'team4' => $teamsid[3]); 									
		$this->db->where('id', $employee_id);                            		
		$this->db->update('organization', $datas);															
		//}														
	redirect("employees/index/0");											      	
	}	
	
    function savingteamdata2($id = 0)  {          		
	$teamsid=$this->input->post('teamsid');								  		
	$employee_id=$this->input->post('employee_id');						
		for($i=0;$i<count($employee_id);$i++){																						 		
		$datas = array('team2' => $teamsid ); 									
		$this->db->where('id', $employee_id[$i]);                            		
		$this->db->update('organization', $datas);															
		}														
	redirect("employees/index/0");											      	
	}	
	
	function savingteamdata3($id = 0)  {          		
	$teamsid=$this->input->post('teamsid');								  		
	$employee_id=$this->input->post('employee_id');						
		for($i=0;$i<count($employee_id);$i++){																						 		
		$datas = array('team3' => $teamsid ); 									
		$this->db->where('id', $employee_id[$i]);                            		
		$this->db->update('organization', $datas);															
		}														
	redirect("employees/index/0");											      	
	}
	
	function savingteamdata4($id = 0)  {          		
	$teamsid=$this->input->post('teamsid');								  		
	$employee_id=$this->input->post('employee_id');						
		for($i=0;$i<count($employee_id);$i++){																						 		
		$datas = array('team4' => $teamsid ); 									
		$this->db->where('id', $employee_id[$i]);                            		
		$this->db->update('organization', $datas);															
		}														
	redirect("employees/index/0");											      	
	}
	public function update_data(){             		
	$user_id = $this->uri->segment(3);                       		
	$data["user_data"] = $this->team_model->fetch_single_data($user_id);             		
	$data["fetch_data"] = $this->team_model->team_fetch_data();  		  		 
	$this->load->view('header');          		 
	$this->load->view("team", $data);  		  		 
	$this->load->view('footer');    	 
	}  
	 public function delete_data(){    		 
	 $id = $this->uri->segment(3);  		 
	 $this->team_model->delete_data($id); 		 
	 redirect("team/index/0");    	 
	 }  
	
} ?>
