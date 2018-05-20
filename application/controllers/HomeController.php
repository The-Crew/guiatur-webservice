<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('dal/EstadoDal');
        $this->load->model('entities/Estado');
    }
    
    public function getPe() {
        $estadoGateway = new EstadoDal();
        $estado[] = new Estado();
        $estado = $estadoGateway->getPe();
        //die(json_encode($estado));
        echo json_encode($estado);
    }
    
}