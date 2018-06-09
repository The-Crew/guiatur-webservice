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
    
    public function listarGastosServicos($ano) {
        try {

            // Conectando ao banco de dados
            $this->load->database();
            
            $this->db->select('MONTH(atd_data_realizado) AS mes');
            $this->db->select('(SUM(atd_custo_adicional - tb_servico.ser_custo_base)) AS gastos');
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

}
