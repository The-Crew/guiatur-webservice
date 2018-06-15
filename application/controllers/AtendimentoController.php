<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AtendimentoController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->load->model('dal/AtendimentoDal');
        $this->load->model('entities/Atendimento');
    }

    public function inserir() {
        $atendimento = json_decode(file_get_contents('php://input'));
        $atendimentoGateway = new AtendimentoDal();
        echo $atendimentoGateway->inserir($atendimento);
    }

    public function listarTodos() {
        $atendimentoGateway = new AtendimentoDal();
        echo json_encode($atendimentoGateway->listarTodos(), JSON_PRETTY_PRINT);
    }

    public function listarNaoConcluidos() {
        $cliente = json_decode(file_get_contents('php://input'));
        $atendimentoGateway = new AtendimentoDal();
        echo json_encode($atendimentoGateway->listarNaoConcluidos($cliente), JSON_PRETTY_PRINT);
    }

    public function listarConcluidos() {
        $cliente = json_decode(file_get_contents('php://input'));
        $atendimentoGateway = new AtendimentoDal();
        echo json_encode($atendimentoGateway->listarConcluidos($cliente), JSON_PRETTY_PRINT);
    }

}
