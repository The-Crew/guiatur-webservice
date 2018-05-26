<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MunicipioController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('dal/MunicipioDal');
        $this->load->model('entities/Municipio');
    }
    
    public function listarPorEstado() {
        $estado_json = json_decode(file_get_contents('php://input'));
        $municipioGateway = new MunicipioDal();
        echo json_encode($municipioGateway->listarPorEstado($estado_json));
    }
    
}