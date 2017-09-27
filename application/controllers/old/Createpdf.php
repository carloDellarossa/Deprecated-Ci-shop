<?php

// esta funcionado solo falta editar el archvo config y view para darle formato
    class Createpdf extends CI_Controller
    {
        function index()
        {
            $this->load->helper('pdf_helper');
            $this->load->view('pdfreport', $data);
        }
    }

?>
