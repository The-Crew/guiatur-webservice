<?php

class Estado extends JsonGetter {

    private
            $Uf,
            $Nome;

    public function getUf() {
        return $this->Uf;
    }

    public function getNome() {
        return $this->Nome;
    }
    
    public function setUf($uf) {
        $this->Uf = $uf;
    }
    
    public function setNome($nome) {
        $this->Nome = $nome;
    }

}
