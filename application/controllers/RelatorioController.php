<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RelatorioController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->load->model('dal/RelatorioDal');
        $this->load->model('entities/Ano');
        $this->load->model('entities/Profissional');
        $this->load->model('entities/Cliente');
        $this->load->model('entities/Servico');
        $this->load->model('entities/Atendimento');
    }

    public function listarCancelamentos() {
        $relatorioGateway = new RelatorioDal();
        echo json_encode($relatorioGateway->listarCancelamentos(2018), JSON_PRETTY_PRINT);
    }

    public function listarCancelamentosPorBairro() {
        $cliente = json_decode(file_get_contents('php://input'));
        $relatorioGateway = new RelatorioDal();
        echo json_encode($relatorioGateway->listarCancelamentosPorBairro($cliente, 2018), JSON_PRETTY_PRINT);
    }

    public function listarFaturamento() {
        $relatorioGateway = new RelatorioDal();
        echo json_encode($relatorioGateway->listarFaturamento(2018), JSON_PRETTY_PRINT);
    }

    public function listarFaturamentoPorServico() {
        $servico = json_decode(file_get_contents('php://input'));
        $relatorioGateway = new RelatorioDal();
        echo json_encode($relatorioGateway->listarFaturamentoPorServico($servico, 2018), JSON_PRETTY_PRINT);
    }

    public function listarGastosServicos() {
        $relatorioGateway = new RelatorioDal();
        echo json_encode($relatorioGateway->listarGastosServicos(2018), JSON_PRETTY_PRINT);
    }

    public function listarGastosServicosPorServico() {
        $servico = json_decode(file_get_contents('php://input'));
        $relatorioGateway = new RelatorioDal();
        echo json_encode($relatorioGateway->listarGastosServicosPorServico($servico, 2018), JSON_PRETTY_PRINT);
    }

    public function listarLucroMensal() {
        $relatorioGateway = new RelatorioDal();
        echo json_encode($relatorioGateway->listarLucroMensal(2018), JSON_PRETTY_PRINT);
    }

    public function listarLucroMensalPorServico() {
        $servico = json_decode(file_get_contents('php://input'));
        $relatorioGateway = new RelatorioDal();
        echo json_encode($relatorioGateway->listarLucroMensalPorServico($servico, 2018), JSON_PRETTY_PRINT);
    }

    public function listarSatisfacaoPorProfissional() {
        $profissional = json_decode(file_get_contents('php://input'));
        $relatorioGateway = new RelatorioDal();
        echo json_encode($relatorioGateway->listarSatisfacaoPorProfissional($profissional, 2018), JSON_PRETTY_PRINT);
    }

    public function listarSatisfacaoPorBairroAtendimento() {
        $cliente = json_decode(file_get_contents('php://input'));
        $relatorioGateway = new RelatorioDal();
        echo json_encode($relatorioGateway->listarSatisfacaoPorBairroAtendimento($cliente, 2018), JSON_PRETTY_PRINT);
    }

    public function listarSatisfacaoPorServico() {
        $servico = json_decode(file_get_contents('php://input'));
        $relatorioGateway = new RelatorioDal();
        echo json_encode($relatorioGateway->listarSatisfacaoPorServico($servico, 2018), JSON_PRETTY_PRINT);
    }
    
    public function listarBairrosAtendimento() {
        $relatorioGateway = new RelatorioDal();
        echo json_encode($relatorioGateway->listarBairrosAtendimento(), JSON_PRETTY_PRINT);
    }
}
