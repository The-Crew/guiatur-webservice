<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServicoController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->load->model('dal/ServicoDal');
        $this->load->model('entities/Servico');
    }

    public function inserir() {
        $servico = json_decode(file_get_contents('php://input'));
        $servicoGateway = new ServicoDal();
        echo $servicoGateway->inserir($servico);
    }

    public function listarTodos() {
        $servicoGateway = new ServicoDal();
        echo json_encode($servicoGateway->listarTodos());
    }

}
