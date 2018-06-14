<?php

// DAL: Data Access Layer
defined('BASEPATH') OR exit('No direct script access allowed');

class RelatorioDal extends CI_Model {

    public function listarCancelamentos($ano) {
        try {
            
            // Conectando ao banco de dados
            $this->load->database();
            
            $this->db->select('MONTH(atd_data_agendado) AS mes');
            $this->db->select('COUNT(*) AS qtd');
            $this->db->where('atd_status', 'C');
            $this->db->where('YEAR(atd_data_agendado)', $ano);
            $this->db->group_by("mes");
            //die(print_r($this->db->get_compiled_select('tb_atendimento')));
            $query = $this->db->get('tb_atendimento');
            
            $anoObj = new Ano();
            foreach ($query->result() as $row)
            {
                switch ($row->mes) {
                    case 1:  $anoObj->setJan($row->qtd); break;
                    case 2:  $anoObj->setFev($row->qtd); break;
                    case 3:  $anoObj->setMar($row->qtd); break;
                    case 4:  $anoObj->setAbr($row->qtd); break;
                    case 5:  $anoObj->setMai($row->qtd); break;
                    case 6:  $anoObj->setJun($row->qtd); break;
                    case 7:  $anoObj->setJul($row->qtd); break;
                    case 8:  $anoObj->setAgo($row->qtd); break;
                    case 9:  $anoObj->setSet($row->qtd); break;
                    case 10: $anoObj->setOut($row->qtd); break;
                    case 11: $anoObj->setNov($row->qtd); break;
                    case 12: $anoObj->setDez($row->qtd); break;
                }
            }
            
            return $anoObj->jsonSerialize();

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }
    
    public function listarCancelamentosPorBairro($cliente_json, $ano) {
        try {
            
            $cliente = Cliente::fromJson($cliente_json);
            $bairro = $cliente->getBairro();
            
            // Conectando ao banco de dados
            $this->load->database();
            
            $this->db->select('MONTH(atd_data_agendado) AS mes');
            $this->db->select('COUNT(*) AS qtd');
            $this->db->join('tb_cliente', 'tb_atendimento.cli_id = tb_cliente.cli_id');
            if (isSet($bairro) && $bairro != '')
                $this->db->where('cli_bairro', $bairro);
            $this->db->where('atd_status', 'C');
            $this->db->where('YEAR(atd_data_agendado)', $ano);
            $this->db->group_by("mes");
            //die(print_r($this->db->get_compiled_select('tb_atendimento')));
            $query = $this->db->get('tb_atendimento');
            
            $anoObj = new Ano();
            foreach ($query->result() as $row)
            {
                switch ($row->mes) {
                    case 1:  $anoObj->setJan($row->qtd); break;
                    case 2:  $anoObj->setFev($row->qtd); break;
                    case 3:  $anoObj->setMar($row->qtd); break;
                    case 4:  $anoObj->setAbr($row->qtd); break;
                    case 5:  $anoObj->setMai($row->qtd); break;
                    case 6:  $anoObj->setJun($row->qtd); break;
                    case 7:  $anoObj->setJul($row->qtd); break;
                    case 8:  $anoObj->setAgo($row->qtd); break;
                    case 9:  $anoObj->setSet($row->qtd); break;
                    case 10: $anoObj->setOut($row->qtd); break;
                    case 11: $anoObj->setNov($row->qtd); break;
                    case 12: $anoObj->setDez($row->qtd); break;
                }
            }
            
            return $anoObj->jsonSerialize();

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }
    
    public function listarFaturamento($ano) {
        try {
            
            // Conectando ao banco de dados
            $this->load->database();
            
            $this->db->select('MONTH(pag_data) AS mes');
            $this->db->select('SUM(pag_valor) AS valor');
            $this->db->where('YEAR(pag_data)', $ano);
            $this->db->group_by("mes");
            //die(print_r($this->db->get_compiled_select('tb_pagamento')));
            $query = $this->db->get('tb_pagamento');
            
            $anoObj = new Ano();
            foreach ($query->result() as $row)
            {
                switch ($row->mes) {
                    case 1:  $anoObj->setJan($row->valor); break;
                    case 2:  $anoObj->setFev($row->valor); break;
                    case 3:  $anoObj->setMar($row->valor); break;
                    case 4:  $anoObj->setAbr($row->valor); break;
                    case 5:  $anoObj->setMai($row->valor); break;
                    case 6:  $anoObj->setJun($row->valor); break;
                    case 7:  $anoObj->setJul($row->valor); break;
                    case 8:  $anoObj->setAgo($row->valor); break;
                    case 9:  $anoObj->setSet($row->valor); break;
                    case 10: $anoObj->setOut($row->valor); break;
                    case 11: $anoObj->setNov($row->valor); break;
                    case 12: $anoObj->setDez($row->valor); break;
                }
            }
            
            return $anoObj->jsonSerialize();

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }
    
    public function listarFaturamentoPorServico($servico_json, $ano) {
        try {
            
            $servico = Servico::fromJson($servico_json);
            $idServico = $servico->getId();
            
            // Conectando ao banco de dados
            $this->load->database();
            
            $this->db->select('MONTH(pag_data) AS mes');
            $this->db->select('SUM(pag_valor) AS valor');
            $this->db->join('tb_atendimento', 'tb_pagamento.atd_id = tb_atendimento.atd_id');
            if (isSet($idServico))
                $this->db->where('tb_atendimento.ser_id', $idServico);
            $this->db->where('YEAR(pag_data)', $ano);
            $this->db->group_by("mes");
            //die(print_r($this->db->get_compiled_select('tb_pagamento')));
            $query = $this->db->get('tb_pagamento');
            
            $anoObj = new Ano();
            foreach ($query->result() as $row)
            {
                switch ($row->mes) {
                    case 1:  $anoObj->setJan($row->valor); break;
                    case 2:  $anoObj->setFev($row->valor); break;
                    case 3:  $anoObj->setMar($row->valor); break;
                    case 4:  $anoObj->setAbr($row->valor); break;
                    case 5:  $anoObj->setMai($row->valor); break;
                    case 6:  $anoObj->setJun($row->valor); break;
                    case 7:  $anoObj->setJul($row->valor); break;
                    case 8:  $anoObj->setAgo($row->valor); break;
                    case 9:  $anoObj->setSet($row->valor); break;
                    case 10: $anoObj->setOut($row->valor); break;
                    case 11: $anoObj->setNov($row->valor); break;
                    case 12: $anoObj->setDez($row->valor); break;
                }
            }
            
            return $anoObj->jsonSerialize();

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }
    
    public function listarGastosServicos($ano) {
        try {

            // Conectando ao banco de dados
            $this->load->database();
            
            $this->db->select('MONTH(atd_data_realizado) AS mes');
            $this->db->select('(SUM(atd_custo_adicional + tb_servico.ser_custo_base)) AS gastos');
            $this->db->join('tb_servico', 'tb_atendimento.ser_id = tb_servico.ser_id');
            $this->db->where('atd_status', 'R');
            $this->db->where('YEAR(atd_data_realizado)', $ano);
            $this->db->group_by("mes");
            //die(print_r($this->db->get_compiled_select('tb_atendimento')));
            $query = $this->db->get('tb_atendimento');
            
            $anoObj = new Ano();
            foreach ($query->result() as $row)
            {
                switch ($row->mes) {
                    case 1:  $anoObj->setJan($row->gastos); break;
                    case 2:  $anoObj->setFev($row->gastos); break;
                    case 3:  $anoObj->setMar($row->gastos); break;
                    case 4:  $anoObj->setAbr($row->gastos); break;
                    case 5:  $anoObj->setMai($row->gastos); break;
                    case 6:  $anoObj->setJun($row->gastos); break;
                    case 7:  $anoObj->setJul($row->gastos); break;
                    case 8:  $anoObj->setAgo($row->gastos); break;
                    case 9:  $anoObj->setSet($row->gastos); break;
                    case 10: $anoObj->setOut($row->gastos); break;
                    case 11: $anoObj->setNov($row->gastos); break;
                    case 12: $anoObj->setDez($row->gastos); break;
                }
            }
            
            return $anoObj->jsonSerialize();

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }
    
    public function listarGastosServicosPorServico($servico_json, $ano) {
        try {
            
            $servico = Servico::fromJson($servico_json);
            $idServico = $servico->getId();
            
            // Conectando ao banco de dados
            $this->load->database();
            
            $this->db->select('MONTH(atd_data_realizado) AS mes');
            $this->db->select('(SUM(atd_custo_adicional + tb_servico.ser_custo_base)) AS gastos');
            $this->db->join('tb_servico', 'tb_atendimento.ser_id = tb_servico.ser_id');
            if (isSet($idServico))
                $this->db->where('tb_atendimento.ser_id', $idServico);
            $this->db->where('atd_status', 'R');
            $this->db->where('YEAR(atd_data_realizado)', $ano);
            $this->db->group_by("mes");
            //die(print_r($this->db->get_compiled_select('tb_atendimento')));
            $query = $this->db->get('tb_atendimento');
            
            $anoObj = new Ano();
            foreach ($query->result() as $row)
            {
                switch ($row->mes) {
                    case 1:  $anoObj->setJan($row->gastos); break;
                    case 2:  $anoObj->setFev($row->gastos); break;
                    case 3:  $anoObj->setMar($row->gastos); break;
                    case 4:  $anoObj->setAbr($row->gastos); break;
                    case 5:  $anoObj->setMai($row->gastos); break;
                    case 6:  $anoObj->setJun($row->gastos); break;
                    case 7:  $anoObj->setJul($row->gastos); break;
                    case 8:  $anoObj->setAgo($row->gastos); break;
                    case 9:  $anoObj->setSet($row->gastos); break;
                    case 10: $anoObj->setOut($row->gastos); break;
                    case 11: $anoObj->setNov($row->gastos); break;
                    case 12: $anoObj->setDez($row->gastos); break;
                }
            }
            
            return $anoObj->jsonSerialize();

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }
    
    public function listarLucroMensal($ano) {
            
        $faturamento = Ano::fromJson($this->listarFaturamento($ano));
        $gastos = Ano::fromJson($this->listarGastosServicos($ano));

        $anoObj = new Ano();
        
        $anoObj->setJan($faturamento->getJan() - $gastos->getJan());
        $anoObj->setFev($faturamento->getFev() - $gastos->getFev());
        $anoObj->setMar($faturamento->getMar() - $gastos->getMar());
        $anoObj->setAbr($faturamento->getAbr() - $gastos->getAbr());
        $anoObj->setMai($faturamento->getMai() - $gastos->getMai());
        $anoObj->setJun($faturamento->getJun() - $gastos->getJun());
        $anoObj->setJul($faturamento->getJul() - $gastos->getJul());
        $anoObj->setAgo($faturamento->getAgo() - $gastos->getAgo());
        $anoObj->setSet($faturamento->getSet() - $gastos->getSet());
        $anoObj->setOut($faturamento->getOut() - $gastos->getOut());
        $anoObj->setNov($faturamento->getNov() - $gastos->getNov());
        $anoObj->setDez($faturamento->getDez() - $gastos->getDez());

        return $anoObj->jsonSerialize();

    }
    
    public function listarLucroMensalPorServico($servico_json, $ano) {
            
        $faturamento = Ano::fromJson($this->listarFaturamentoPorServico($servico_json, $ano));
        $gastos = Ano::fromJson($this->listarGastosServicosPorServico($servico_json, $ano));

        $anoObj = new Ano();
        
        $anoObj->setJan($faturamento->getJan() - $gastos->getJan());
        $anoObj->setFev($faturamento->getFev() - $gastos->getFev());
        $anoObj->setMar($faturamento->getMar() - $gastos->getMar());
        $anoObj->setAbr($faturamento->getAbr() - $gastos->getAbr());
        $anoObj->setMai($faturamento->getMai() - $gastos->getMai());
        $anoObj->setJun($faturamento->getJun() - $gastos->getJun());
        $anoObj->setJul($faturamento->getJul() - $gastos->getJul());
        $anoObj->setAgo($faturamento->getAgo() - $gastos->getAgo());
        $anoObj->setSet($faturamento->getSet() - $gastos->getSet());
        $anoObj->setOut($faturamento->getOut() - $gastos->getOut());
        $anoObj->setNov($faturamento->getNov() - $gastos->getNov());
        $anoObj->setDez($faturamento->getDez() - $gastos->getDez());

        return $anoObj->jsonSerialize();

    }
        
    public function listarSatisfacaoPorProfissional($profissional_json, $ano) {
        try {
            
            $profissional = Profissional::fromJson($profissional_json);
            $idProfissional = $profissional->getId();
            
            // Conectando ao banco de dados
            $this->load->database();
            
            $this->db->select('MONTH(atd_data_realizado) AS mes');
            $this->db->select('AVG(atd_avaliacao_satisfacao) AS nota');
            if (isSet($idProfissional) && $idProfissional > 0)
                $this->db->where('pro_id', $idProfissional);
            $this->db->where('YEAR(atd_data_realizado)', $ano);
            $this->db->where('atd_avaliacao_satisfacao IS NOT NULL');
            $this->db->group_by("mes");
            //die(print_r($this->db->get_compiled_select('tb_atendimento')));
            $query = $this->db->get('tb_atendimento');
            
            $anoObj = new Ano();
            foreach ($query->result() as $row)
            {
                switch ($row->mes) {
                    case 1:  $anoObj->setJan($row->nota); break;
                    case 2:  $anoObj->setFev($row->nota); break;
                    case 3:  $anoObj->setMar($row->nota); break;
                    case 4:  $anoObj->setAbr($row->nota); break;
                    case 5:  $anoObj->setMai($row->nota); break;
                    case 6:  $anoObj->setJun($row->nota); break;
                    case 7:  $anoObj->setJul($row->nota); break;
                    case 8:  $anoObj->setAgo($row->nota); break;
                    case 9:  $anoObj->setSet($row->nota); break;
                    case 10: $anoObj->setOut($row->nota); break;
                    case 11: $anoObj->setNov($row->nota); break;
                    case 12: $anoObj->setDez($row->nota); break;
                }
            }
            
            return $anoObj->jsonSerialize();

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }
    
   public function listarSatisfacaoPorBairroAtendimento($cliente_json, $ano) {
        try {
            
            $cliente = Cliente::fromJson($cliente_json);
            $bairro = $cliente->getBairro();
            
            // Conectando ao banco de dados
            $this->load->database();
            
            $this->db->select('MONTH(atd_data_realizado) AS mes');
            $this->db->select('AVG(atd_avaliacao_satisfacao) AS nota');
            if (isSet($bairro) && $bairro != '')
                $this->db->where('atd_bairro', $bairro);
            $this->db->where('YEAR(atd_data_realizado)', $ano);
            $this->db->where('atd_avaliacao_satisfacao IS NOT NULL');
            $this->db->group_by("mes");
            //die(print_r($this->db->get_compiled_select('tb_atendimento')));
            $query = $this->db->get('tb_atendimento');
            
            $anoObj = new Ano();
            foreach ($query->result() as $row)
            {
                switch ($row->mes) {
                    case 1:  $anoObj->setJan($row->nota); break;
                    case 2:  $anoObj->setFev($row->nota); break;
                    case 3:  $anoObj->setMar($row->nota); break;
                    case 4:  $anoObj->setAbr($row->nota); break;
                    case 5:  $anoObj->setMai($row->nota); break;
                    case 6:  $anoObj->setJun($row->nota); break;
                    case 7:  $anoObj->setJul($row->nota); break;
                    case 8:  $anoObj->setAgo($row->nota); break;
                    case 9:  $anoObj->setSet($row->nota); break;
                    case 10: $anoObj->setOut($row->nota); break;
                    case 11: $anoObj->setNov($row->nota); break;
                    case 12: $anoObj->setDez($row->nota); break;
                }
            }
            
            return $anoObj->jsonSerialize();

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }
    
    public function listarSatisfacaoPorServico($servico_json, $ano) {
        try {
            
            $servico = Servico::fromJson($servico_json);
            $idServico = $servico->getId();
            
            // Conectando ao banco de dados
            $this->load->database();
            
            $this->db->select('MONTH(atd_data_realizado) AS mes');
            $this->db->select('AVG(atd_avaliacao_satisfacao) AS nota');
            if (isSet($idServico))
                $this->db->where('tb_atendimento.ser_id', $idServico);
            $this->db->where('YEAR(atd_data_realizado)', $ano);
            $this->db->where('atd_avaliacao_satisfacao IS NOT NULL');
            $this->db->group_by("mes");
            //die(print_r($this->db->get_compiled_select('tb_atendimento')));
            $query = $this->db->get('tb_atendimento');
            
            $anoObj = new Ano();
            foreach ($query->result() as $row)
            {
                switch ($row->mes) {
                    case 1:  $anoObj->setJan($row->nota); break;
                    case 2:  $anoObj->setFev($row->nota); break;
                    case 3:  $anoObj->setMar($row->nota); break;
                    case 4:  $anoObj->setAbr($row->nota); break;
                    case 5:  $anoObj->setMai($row->nota); break;
                    case 6:  $anoObj->setJun($row->nota); break;
                    case 7:  $anoObj->setJul($row->nota); break;
                    case 8:  $anoObj->setAgo($row->nota); break;
                    case 9:  $anoObj->setSet($row->nota); break;
                    case 10: $anoObj->setOut($row->nota); break;
                    case 11: $anoObj->setNov($row->nota); break;
                    case 12: $anoObj->setDez($row->nota); break;
                }
            }
            
            return $anoObj->jsonSerialize();

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }
}
