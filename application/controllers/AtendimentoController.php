<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AtendimentoController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->output->set_header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept');
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

    public function listarTodosNaoConcluidos() {
        $atendimentoGateway = new AtendimentoDal();
        echo json_encode($atendimentoGateway->listarTodosNaoConcluidos(), JSON_PRETTY_PRINT);
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

    public function obterQuantidadePorStatus() {
        $atendimento = json_decode(file_get_contents('php://input'));
        $atendimentoGateway = new AtendimentoDal();
        echo json_encode($atendimentoGateway->obterQuantidadePorStatus($atendimento), JSON_PRETTY_PRINT);
    }

    public function finalizar() {
        $atendimento = json_decode(file_get_contents('php://input'));
        $atendimentoGateway = new AtendimentoDal();
        echo json_encode($atendimentoGateway->finalizar($atendimento), JSON_PRETTY_PRINT);
    }

    public function cancelar() {
        $atendimento = json_decode(file_get_contents('php://input'));
        $atendimentoGateway = new AtendimentoDal();
        echo json_encode($atendimentoGateway->cancelar($atendimento), JSON_PRETTY_PRINT);
    }

    public function avaliar() {
        $atendimento = json_decode(file_get_contents('php://input'));
        $atendimentoGateway = new AtendimentoDal();
        echo json_encode($atendimentoGateway->avaliar($atendimento), JSON_PRETTY_PRINT);
    }

}
