<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClienteController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('dal/ClienteDal');
        $this->load->model('entities/Atendimento');
    }
    
    public function inserir() {
        $cliente = json_decode(file_get_contents('php://input'));
        $atendimentoGateway = new ClienteDal();
        echo $atendimentoGateway->inserir($cliente);
    }
    
    public function logar() {
        $cliente = json_decode(file_get_contents('php://input'));
        $clienteGateway = new ClienteDal();
        echo json_encode($clienteGateway->logar($cliente), JSON_PRETTY_PRINT);
    }
    
    public function obterQuantidade() {
        $clienteGateway = new ClienteDal();
        echo $clienteGateway->obterQuantidade();
    }
    
}