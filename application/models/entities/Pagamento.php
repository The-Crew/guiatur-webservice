<?php

require_once "Atendimento.php";

class Pagamento extends JsonGetter {

    private
            $Id,
            $Atendimento,
            $ValorPago,
            $FormaPagamento,
            $DataPagamento;
    
    public function __construct() {
        $this->Atendimento = new Atendimento();
        $this->FormaPagamento = new FormaPagamento();
    }
    
    public static function fromJson($decoded_json) {
        $obj = new Pagamento();
        foreach ($decoded_json as $key=>$value) {
            switch ($key) {
                case 'Atendimento':
                    $obj->{$key} = Atendimento::fromJson($value);
                    break;
                case 'FormaPagamento':
                    $obj->{$key} = FormaPagamento::fromJson($value);
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

    public function getAtendimento() {
        return $this->Atendimento;
    }

    public function getValorPago() {
        return $this->ValorPago;
    }

    public function getFormaPagamento() {
        return $this->FormaPagamento;
    }

    public function getDataPagamento() {
        return $this->DataPagamento;
    }

    public function setId($Id) {
        $this->Id = $Id;
    }

    public function setAtendimento($Atendimento) {
        $this->Atendimento = $Atendimento;
    }

    public function setValorPago($ValorPago) {
        $this->ValorPago = $ValorPago;
    }

    public function setFormaPagamento($FormaPagamento) {
        $this->FormaPagamento = $FormaPagamento;
    }

    public function setDataPagamento($DataPagamento) {
        $this->DataPagamento = $DataPagamento;
    }

}
