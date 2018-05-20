<?php

require_once "Municipio.php";

class Profissional extends JsonGetter {

    private
            $Id,
            $Nome,
            $Login,
            $Senha,
            $DataNascimento,
            $Sexo,
            $Email,
            $Ddd,
            $Telefone,
            $Endereco,
            $Bairro,
            $Cep,
            $Municipio,
            $DataCadastro,
            $UltimoAcesso,
            $Uniqid,
            $DataConfirmacao,
            $Status;
    
    public function __construct() {
        $this->Municipio = new Municipio();
    }
    
    public static function fromJson($decoded_json) {
        $obj = new Profissional();
        foreach ($decoded_json as $key=>$value) {
            switch ($key) {
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

    public function getNome() {
        return $this->Nome;
    }

    public function getLogin() {
        return $this->Login;
    }

    public function getSenha() {
        return $this->Senha;
    }

    public function getDataNascimento() {
        return $this->DataNascimento;
    }

    public function getSexo() {
        return $this->Sexo;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function getDdd() {
        return $this->Ddd;
    }

    public function getTelefone() {
        return $this->Telefone;
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

    public function getDataCadastro() {
        return $this->DataCadastro;
    }

    public function getUltimoAcesso() {
        return $this->UltimoAcesso;
    }

    public function getUniqid() {
        return $this->Uniqid;
    }

    public function getDataConfirmacao() {
        return $this->DataConfirmacao;
    }

    public function getStatus() {
        return $this->Status;
    }

    public function setId($Id) {
        $this->Id = $Id;
    }

    public function setNome($Nome) {
        $this->Nome = $Nome;
    }

    public function setLogin($Login) {
        $this->Login = $Login;
    }

    public function setSenha($Senha) {
        $this->Senha = $Senha;
    }

    public function setDataNascimento($DataNascimento) {
        $this->DataNascimento = $DataNascimento;
    }

    public function setSexo($Sexo) {
        $this->Sexo = $Sexo;
    }

    public function setEmail($Email) {
        $this->Email = $Email;
    }

    public function setDdd($Ddd) {
        $this->Ddd = $Ddd;
    }

    public function setTelefone($Telefone) {
        $this->Telefone = $Telefone;
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

    public function setDataCadastro($DataCadastro) {
        $this->DataCadastro = $DataCadastro;
    }

    public function setUltimoAcesso($UltimoAcesso) {
        $this->UltimoAcesso = $UltimoAcesso;
    }

    public function setUniqid($Uniqid) {
        $this->Uniqid = $Uniqid;
    }

    public function setDataConfirmacao($DataConfirmacao) {
        $this->DataConfirmacao = $DataConfirmacao;
    }

    public function setStatus($Status) {
        $this->Status = $Status;
    }

}
