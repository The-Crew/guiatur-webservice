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
                    case 1:  $anoObj->setJan($row->mes); break;
                    case 2:  $anoObj->setFev($row->mes); break;
                    case 3:  $anoObj->setMar($row->mes); break;
                    case 4:  $anoObj->setAbr($row->mes); break;
                    case 5:  $anoObj->setMai($row->mes); break;
                    case 6:  $anoObj->setJun($row->mes); break;
                    case 7:  $anoObj->setJul($row->mes); break;
                    case 8:  $anoObj->setAgo($row->mes); break;
                    case 9:  $anoObj->setSet($row->mes); break;
                    case 10: $anoObj->setOut($row->mes); break;
                    case 11: $anoObj->setNov($row->mes); break;
                    case 12: $anoObj->setDez($row->mes); break;
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
            
            $this->db->select('MONTH(`pag_data`) AS mes');
            $this->db->select('SUM(`pag_valor`) AS valor');
            $this->db->where('YEAR(pag_data)', $ano);
            $this->db->group_by("mes");
            //die(print_r($this->db->get_compiled_select('tb_atendimento')));
            $query = $this->db->get('tb_pagamento');
            
            $anoObj = new Ano();
            foreach ($query->result() as $row)
            {
                switch ($row->mes) {
                    case 1:  $anoObj->setJan($row->mes); break;
                    case 2:  $anoObj->setFev($row->mes); break;
                    case 3:  $anoObj->setMar($row->mes); break;
                    case 4:  $anoObj->setAbr($row->mes); break;
                    case 5:  $anoObj->setMai($row->mes); break;
                    case 6:  $anoObj->setJun($row->mes); break;
                    case 7:  $anoObj->setJul($row->mes); break;
                    case 8:  $anoObj->setAgo($row->mes); break;
                    case 9:  $anoObj->setSet($row->mes); break;
                    case 10: $anoObj->setOut($row->mes); break;
                    case 11: $anoObj->setNov($row->mes); break;
                    case 12: $anoObj->setDez($row->mes); break;
                }
            }
            
            return $anoObj->jsonSerialize();

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }

}
