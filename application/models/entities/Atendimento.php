<?php

require_once "Cliente.php";
require_once "Profissional.php";
require_once "Servico.php";
require_once "Municipio.php";

class Atendimento extends JsonGetter {

    private
            $Id,
            $Cliente,
            $Profissional,
            $Servico,
            $DataAgendado,
            $DataRealizado,
            $DataCadastro,
            $Endereco,
            $Bairro,
            $Cep,
            $Municipio,
            $Status,
            $Preco,
            $Desconto,
            $CustoAdicional,
            $Situacao,
            $CustoTransporte,
            $Observacao,
            $AvaliacaoData,
            $AvaliacaoSatisfacao,
            $AvaliacaoComentario;
    
    public function __construct() {
        $this->Cliente = new Cliente();
        $this->Profissional = new Profissional();
        $this->Servico = new Servico();
        $this->Municipio = new Municipio();
    }
    
    public static function fromJson($decoded_json) {
        $obj = new Atendimento();
        foreach ($decoded_json as $key=>$value) {
            switch ($key) {
                case 'Cliente':
                    $obj->{$key} = Cliente::fromJson($value);
                    break;
                case 'Profissional':
                    $obj->{$key} = Profissional::fromJson($value);
                    break;
                case 'Servico':
                    $obj->{$key} = Servico::fromJson($value);
                    break;
                case 'Municipio':
                    $obj->{$key} = Municipio::fromJson($value);
                    break;
                default:
                    $obj->{$key} = $value;
            }
        }
        return $obj;
    }

    public function getId() {
        return $this->Id;
    }

    public function getCliente() {
        return $this->Cliente;
    }

    public function getProfissional() {
        return $this->Profissional;
    }

    public function getServico() {
        return $this->Servico;
    }

    public function getDataAgendado() {
        return $this->DataAgendado;
    }

    public function getDataRealizado() {
        return $this->DataRealizado;
    }

    public function getDataCadastro() {
        return $this->DataCadastro;
    }

    public function getEndereco() {
        return $this->Endereco;
    }

    public function getBairro() {
        return $this->Bairro;
    }

    public function getCep() {
        return $this->Cep;
    }

    public function getMunicipio() {
        return $this->Municipio;
    }

    public function getStatus() {
        return $this->Status;
    }

    public function getPreco() {
        return $this->Preco;
    }

    public function getDesconto() {
        return $this->Desconto;
    }

    public function getCustoAdicional() {
        return $this->CustoAdicional;
    }

    public function getSituacao() {
        return $this->Situacao;
    }

    public function getCustoTransporte() {
        return $this->CustoTransporte;
    }

    public function getObservacao() {
        return $this->Observacao;
    }

    public function getAvaliacaoData() {
        return $this->AvaliacaoData;
    }

    public function getAvaliacaoSatisfacao() {
        return $this->AvaliacaoSatisfacao;
    }

    public function getAvaliacaoComentario() {
        return $this->AvaliacaoComentario;
    }

    public function setId($Id) {
        $this->Id = $Id;
    }

    public function setCliente($Cliente) {
        //$this->Cliente = new Cliente();
        //foreach($Cliente as $key=>$value){
            //$this->{$key} = $value;
        //    $atd->setCliente($value);
        //    die(print_r($atd));
        //    $atd->setCliente($value);
        //}
        $this->Cliente = $Cliente;
    }

    public function seProfissional($Profissional) {
        $this->Profissional = $Profissional;
    }

    public function setServico($Servico) {
        $this->Servico = $Servico;
    }

    public function setDataAgendado($DataAgendado) {
        $this->DataAgendado = $DataAgendado;
    }

    public function setDataRealizado($DataRealizado) {
        $this->DataRealizado = $DataRealizado;
    }

    public function setDataCadastro($DataCadastro) {
        $this->DataCadastro = $DataCadastro;
    }

    public function setEndereco($Endereco) {
        $this->Endereco = $Endereco;
    }

    public function setBairro($Bairro) {
        $this->Bairro = $Bairro;
    }

    public function setCep($Cep) {
        $this->Cep = $Cep;
    }

    public function setMunicipio($Municipio) {
        $this->Municipio = $Municipio;
    }

    public function setStatus($Status) {
        $this->Status = $Status;
    }

    public function setPreco($Preco) {
        $this->Preco = $Preco;
    }

    public function setDesconto($Desconto) {
        $this->Desconto = $Desconto;
    }

    public function setCustoAdicional($CustoAdicional) {
        $this->CustoAdicional = $CustoAdicional;
    }

    public function setSituacao($Situacao) {
        $this->Situacao = $Situacao;
    }

    public function setCustoTransporte($CustoTransporte) {
        $this->CustoTransporte = $CustoTransporte;
    }

    public function setObservacao($Observacao) {
        $this->Observacao = $Observacao;
    }

    public function setAvaliacaoData($AvaliacaoData) {
        $this->AvaliacaoData = $AvaliacaoData;
    }

    public function setAvaliacaoSatisfacao($AvaliacaoSatisfacao) {
        $this->AvaliacaoSatisfacao = $AvaliacaoSatisfacao;
    }

    public function setAvaliacaoComentario($AvaliacaoComentario) {
        $this->AvaliacaoComentario = $AvaliacaoComentario;
    }

}
