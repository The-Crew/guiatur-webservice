<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RelatorioController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('dal/RelatorioDal');
        $this->load->model('entities/Ano');
        $this->load->model('entities/Profissional');
    }
    
    public function listarCancelamentos() {
        $relatorioGateway = new RelatorioDal();
        echo json_encode($relatorioGateway->listarCancelamentos(2018), JSON_PRETTY_PRINT);
    }

    public function listarFaturamento() {
        $relatorioGateway = new RelatorioDal();
        echo json_encode($relatorioGateway->listarFaturamento(2018), JSON_PRETTY_PRINT);
    }
    
    public function listarGastosServicos() {
        $relatorioGateway = new RelatorioDal();
        echo json_encode($relatorioGateway->listarGastosServicos(2018), JSON_PRETTY_PRINT);
    }
    
    public function listarLucroMensal() {
        $relatorioGateway = new RelatorioDal();
        echo json_encode($relatorioGateway->listarLucroMensal(2018), JSON_PRETTY_PRINT);
    }
    
    public function listarSatisfacaoPorProfissional() {
        $profissional = json_decode(file_get_contents('php://input'));
        $profissionalGateway = new RelatorioDal();
        echo json_encode($profissionalGateway->listarSatisfacaoPorProfissional($profissional, 2018), JSON_PRETTY_PRINT);
    }
}