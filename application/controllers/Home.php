<?php 
class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view("partials/header");
        $this->load->view("partials/top-navbar");
        $this->load->view('home');
        $this->load->view("partials/footer");
    }
}