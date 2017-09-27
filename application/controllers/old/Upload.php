<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('upload/upCat', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = realpath(FCPATH.'archivos');
                $config['allowed_types']        = 'txt';
                $config['overwrite'] = true;
                $config['file_name'] = 'menu_serializado.txt';
                $this->load->library('upload', $config);


                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload/upCat', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload/ok', $data);
                }
        }
}
?>