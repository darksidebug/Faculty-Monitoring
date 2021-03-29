<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->library('zip');
            $this->load->model('User_Model');
            $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
            $this->output->set_header("Pragma: no-cache"); 
        }

        public function faculty_log($log_type){
            if($log_type == "login")
            {
                $data = array(
                    'school_id'    => $this->input->post('school_id'),
                    'time_in'      => date("h:i:s A"),
                    'date_log'     => date("D, M/d/Y"),
                    'log_type'     => "log_in",
                    'destination'  => $this->input->post('destination')
                );
                $returnedLast_inserted_id = $this->User_Model->insert('faculty_log', $data);
                redirect('pages/log_page/faculty-log-in.html/');
            }
            elseif ($log_type == "logout")
            {
                $data = array(
                    'time_in'      => null,
                    'time_out'     => date("h:i:s A"),
                    'log_type'     => "log_out",
                    'destination'  => $this->input->post('destination')
                );
                $returnedLast_inserted_id = $this->User_Model->log_out($this->input->post('school_id'), $data);
                redirect('pages/log_page/faculty-log-out.html/');
            }
        }

        public function faculty_registration()
        {
            $data = array(
                'school_id'    => $this->input->post('school_id'),
                'name'         => $this->input->post('name'),
                'gender'       => $this->input->post('gender'),
                'position'     => $this->input->post('position')
            );
            $returnedLast_inserted_id = $this->User_Model->insert('faculty_registration', $data);
            redirect('pages/faculty_registration/register-faculty.html/');
        }

        public function logout(){
            $this->session->sess_destroy();
            redirect('pages/login/');
        }
    }