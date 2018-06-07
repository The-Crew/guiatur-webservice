<?php

class Ano extends JsonGetter {

    private
            $Jan,
            $Fev,
            $Mar,
            $Abr,
            $Mai,
            $Jun,
            $Jul,
            $Ago,
            $Set,
            $Out,
            $Nov,
            $Dez;

    public function __construct() {
        $this->Jan = 0;
        $this->Fev = 0;
        $this->Mar = 0;
        $this->Abr = 0;
        $this->Mai = 0;
        $this->Jun = 0;
        $this->Jul = 0;
        $this->Ago = 0;
        $this->Set = 0;
        $this->Out = 0;
        $this->Nov = 0;
        $this->Dez = 0;
    }

    
    public static function fromJson($decoded_json) {
        $obj = new Mes();
        foreach ($decoded_json as $key=>$value) {
            $obj->{$key} = $value;
        }
        return $obj;
    }
    
    public function getJan() {
        return $this->Jan;
    }

    public function getFev() {
        return $this->Fev;
    }

    public function getMar() {
        return $this->Mar;
    }

    public function getAbr() {
        return $this->Abr;
    }

    public function getMai() {
        return $this->Mai;
    }

    public function getJun() {
        return $this->Jun;
    }

    public function getJul() {
        return $this->Jul;
    }

    public function getAgo() {
        return $this->Ago;
    }

    public function getSet() {
        return $this->Set;
    }

    public function getOut() {
        return $this->Out;
    }

    public function getNov() {
        return $this->Nov;
    }

    public function getDez() {
        return $this->Dez;
    }

    public function setJan($Jan) {
        $this->Jan = $Jan;
    }

    public function setFev($Fev) {
        $this->Fev = $Fev;
    }

    public function setMar($Mar) {
        $this->Mar = $Mar;
    }

    public function setAbr($Abr) {
        $this->Abr = $Abr;
    }

    public function setMai($Mai) {
        $this->Mai = $Mai;
    }

    public function setJun($Jun) {
        $this->Jun = $Jun;
    }

    public function setJul($Jul) {
        $this->Jul = $Jul;
    }

    public function setAgo($Ago) {
        $this->Ago = $Ago;
    }

    public function setSet($Set) {
        $this->Set = $Set;
    }

    public function setOut($Out) {
        $this->Out = $Out;
    }

    public function setNov($Nov) {
        $this->Nov = $Nov;
    }

    public function setDez($Dez) {
        $this->Dez = $Dez;
    }



}
