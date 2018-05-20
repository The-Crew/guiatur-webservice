<?php

class Servico extends JsonGetter {

    private
            $Id,
            $Descricao,
            $CustoBase,
            $Status;
    
    public static function fromJson($decoded_json) {
        $obj = new Servico();
        foreach ($decoded_json as $key=>$value) {
            $obj->{$key} = $value;
        }
        return $obj;
    }
    
    public function getId() {
        return $this->Id;
    }

    public function getDescricao() {
        return $this->Descricao;
    }

    public function getCustoBase() {
        return $this->CustoBase;
    }

    public function getStatus() {
        return $this->Status;
    }

    public function setId($Id) {
        $this->Id = $Id;
    }

    public function setDescricao($Descricao) {
        $this->Descricao = $Descricao;
    }

    public function setCustoBase($CustoBase) {
        $this->CustoBase = $CustoBase;
    }

    public function setStatus($Status) {
        $this->Status = $Status;
    }

}
