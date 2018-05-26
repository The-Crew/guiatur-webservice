<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstadoController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('dal/EstadoDal');
        $this->load->model('entities/Estado');
    }
    
    public function listarTodos() {
        $estadoGateway = new EstadoDal();
        $estado = $estadoGateway->listarTodos();
        echo json_encode($estado);
    }
    
}