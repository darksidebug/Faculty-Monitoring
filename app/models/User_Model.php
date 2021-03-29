<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User_Model extends CI_Model {

        public function insert($table, $data){
            $this->db->insert($table, $data);
            return $this->db->insert_id();
        }

        public function insert_authorize($data){
            $this->db->insert('users', $data);
            return $this->db->insert_id();
        }

        public function user_auth($user_id){
            $this->db->where('uid', $user_id);
            $result = $this->db->get('users');
            if($result->num_rows() == 1){
                return $result->row(0)->id;
            }
            else{
                return false;
            }
        }

        public function lookup_user($id){
            $this->db->where('ID_num', $id);
            $result = $this->db->get('register_borrower');
            if($result->num_rows() == 1){
                return $result->row(0)->id;
            }
            else{
                return false;
            }
        }

        public function sign_in($email, $pass){
            $this->db->where('uid', $email);
            $this->db->where('email_pass', $pass);

            $result = $this->db->get('users');
            if($result->num_rows() == 1){
                return $result->row(0)->id;
            }
            else{
                return false;
            }
        }

        public function get_borrower($id_num){
            $this->db->where('ID_num', $id_num);
            $query = $this->db->get('register_borrower');
            if($query->num_rows() > 0){
                return $query->result();
            }
            else{
                return false;
            }
        }

        public function get__item_borrower($transact_type, $action){
            $this->db->select('*');
            $this->db->from('register_borrower');
            $this->db->group_by('borrow.ID_num','borrow.transact_type', 'borrow.auth_by_uid');
            $this->db->join('borrow', 'borrow.ID_num = register_borrower.ID_num');
            $this->db->where('transact_type', $transact_type);
            $this->db->where('action_taken', $action);
            $query = $this->db->get();
            if(!empty($query)){
                return $query->result();
            }
            else{
                return false;
            }
        }

        public function get__borrowed_items($transact_type, $action){
            $this->db->select('*');
            $this->db->from('register_borrower');
            $this->db->group_by('borrow.ID_num','borrow.transact_type', 'borrow.auth_by_uid');
            $this->db->join('borrow', 'borrow.ID_num = register_borrower.ID_num');
            $this->db->where('transact_type', $transact_type);
            $this->db->where('action_taken', $action);
            $query = $this->db->get();
            if(!empty($query)){
                return $query->result();
            }
            else{
                return false;
            }
        }

        public function get__details($id){
            $this->db->where('ID_num', $id);
            $query = $this->db->get('register_borrower');
            if($query->num_rows() > 0){
                return $query->result();
            }
            else{
                return false;
            }
        }

        public function query_authorize($user_id, $pass){
            $this->db->where('uid', $user_id);
            $this->db->where('email_pass', $pass);

            $result = $this->db->get('users');
            if($result->num_rows() == 1){
                return $result->row(0)->id;
            }
            else{
                return false;
            }
        }

        public function insert_borrowed_items($data){
            $this->db->insert('borrow', $data);
            return $this->db->insert_id();
        }

        public function return_borrow($id_num, $code, $data){
            $this->db->where('ID_num', $id_num);
            $this->db->where('code', $code);
            $this->db->set($data);
            $query = $this->db->update('borrow'); 
            if($query){
                return true;
            }
            else{
                return false;
            }
        }

        public function log_out($school_id, $data){
            $this->db->where('school_id', $school_id);
            $this->db->set($data);
            $query = $this->db->update("faculty_log"); 
            if($query){
                return true;
            }
            else{
                return false;
            }
        }

        public function get_log(){
            $query = $this->db->get('faculty_log');
            if($query->num_rows() > 0){
                return $query->result();
            }
            else{
                return false;
            }
        }

        // public function get__borrower_details($id){
        //     $this->db->where('ID_num', $id);
        //     $query = $this->db->get('register_borrower');
        //     if($query->num_rows() > 0){
        //         return $query->result();
        //     }
        //     else{
        //         return false;
        //     }
        // }

        public function get__borrower_details($id, $action_taken){
            $this->db->select('*');
            $this->db->from('register_borrower');
            $this->db->join('borrow', 'borrow.ID_num = register_borrower.ID_num');
            $this->db->where('register_borrower.ID_num', $id); 
            $this->db->where('borrow.action_taken', $action_taken);
            $query_result = $this->db->get();
            return $query_result->result();
        }

        // public function lookup($business_name, $business_owner){
        //     $this->db->where('business_owners_name', $business_owner);
        //     $this->db->where('business_name', $business_name);

        //     $result = $this->db->get('business_owners_table');
        //     if($result->num_rows() == 1){
        //         return $result->row(0)->id;
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // public function registered_business($business_name){
        //     $this->db->where('business_name', $business_name);

        //     $result = $this->db->get('business_registration_table');
        //     if($result->num_rows() == 1){
        //         return $result->row(0)->id;
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // public function register_business($data){
        //     $this->db->insert('business_registration_table', $data);
        //     return $this->db->insert_id();
        // }

        // public function business_table(){
        //     $query = $this->db->get('business_registration_table');
        //     if($query->num_rows() > 0){
        //         return $query->result();
        //     }
        //     else{
        //         return false;
        //     }
            
        // }

        // public function clients_table(){
        //     $query = $this->db->get('business_owners_table');
        //     if($query->num_rows() > 0){
        //         return $query->result();
        //     }
        //     else{
        //         return false;
        //     }
            
        // }

        // public function lookup_sys_user($email_username){
        //     $this->db->where('email_username', $email_username);

        //     $result = $this->db->get('system_user_table');
        //     if($result->num_rows() == 1){
        //         return $result->row(0)->id;
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // public function register_sys_user($data){
        //     $this->db->insert('system_user_table', $data);
        //     return $this->db->insert_id();
        // }

        // public function getSystem_user_table(){
        //     $query = $this->db->get('system_user_table');
        //     if($query->num_rows() > 0){
        //         return $query->result();
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // public function lookup_client_reg($name){
        //     $this->db->where('business_owners_name', $name);
        //     $query = $this->db->get('business_owners_table');
        //     if($query->num_rows() > 0){
        //         return $query->result();
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // public function lookup_client_acc($email){
        //     $this->db->where('email', $email);
        //     $query = $this->db->get('clients_account_table');
        //     if($query->num_rows() > 0){
        //         return $query->result();
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // public function register_client_acc($data){
        //     $this->db->insert('clients_account_table', $data);
        //     return $this->db->insert_id();
        // }

        // public function booked($data){
        //     $this->db->insert('bookings', $data);
        //     return $this->db->insert_id();
        // }

        // public function getClient_acc_table(){
        //     $query = $this->db->get('clients_account_table');
        //     if($query->num_rows() > 0){
        //         return $query->result();
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // public function getUser_acc_table(){
        //     $query = $this->db->get('users_table');
        //     if($query->num_rows() > 0){
        //         return $query->result();
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // public function getBusinessList(){
        //     $query = $this->db->get('business_registration_table');
        //     if($query->num_rows() > 0){
        //         return $query->result();
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // public function get_files()
        // {
        //     $query = $this->db->get("business_registration_table");
        //     if($query->num_rows() > 0){
        //         return $query->result();
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // public function getBusinessListByArea($area){
        //     $this->db->like('business_add', $area);
        //     $query = $this->db->get('business_registration_table');
        //     if($query->num_rows() > 0){
        //         return $query->result();
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // public function getSortedBusinessListByArea($sort){
        //     $this->db->order_by('business_name', $sort);
        //     $query = $this->db->get('business_registration_table');
        //     if($query->num_rows() > 0){
        //         return $query->result();
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // public function getFilteredBusinessList($service){
        //     $this->db->where('category', $service);
        //     $query = $this->db->get('business_registration_table');
        //     if($query->num_rows() > 0){
        //         return $query->result();
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // public function getResultCount(){
        //     $query = $this->db->get('business_registration_table');
        //     if($query->num_rows() > 0){
        //         return $query->num_rows();
        //     }
        //     else{
        //         return 0;
        //     }
        // }

        // public function getResultCountBySearch($area){
        //     $this->db->like('business_add', $area);
        //     $query = $this->db->get('business_registration_table');
        //     if($query->num_rows() > 0){
        //         return $query->num_rows();
        //     }
        //     else{
        //         return 0;
        //     }
        // }

        // public function getResultCountByService($service){
        //     $this->db->like('category', $service);
        //     $query = $this->db->get('business_registration_table');
        //     if($query->num_rows() > 0){
        //         return $query->num_rows();
        //     }
        //     else{
        //         return 0;
        //     }
        // }

        // public function getBookedTables(){
        //     $query = $this->db->get('bookings');
        //     if($query->num_rows() > 0){
        //         return $query->result();
        //     }
        //     else{
        //         return false;
        //     }
        // }

    }