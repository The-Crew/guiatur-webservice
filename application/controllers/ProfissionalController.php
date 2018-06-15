<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfissionalController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->load->model('dal/ProfissionalDal');
        $this->load->model('entities/Profissional');
    }

    public function inserir() {
        $profissional = json_decode(file_get_contents('php://input'));
        $profissionalGateway = new ProfissionalDal();
        echo $profissionalGateway->inserir($profissional);
    }

    public function listarTodos() {
        $profissionalGateway = new ProfissionalDal();
        echo json_encode($profissionalGateway->listarTodos());
    }

}
