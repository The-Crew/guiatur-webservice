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
            $this->db->where('YEAR(atd_data_agendado)', 2018);
            $this->db->group_by("mes");
            //die(print_r($this->db->get_compiled_select('tb_atendimento')));
            $query = $this->db->get('tb_atendimento');
            
            $ano = new Ano();
            foreach ($query->result() as $row)
            {
                switch ($row->mes) {
                    case 1:  $ano->setJan($row->mes); break;
                    case 2:  $ano->setFev($row->mes); break;
                    case 3:  $ano->setMar($row->mes); break;
                    case 4:  $ano->setAbr($row->mes); break;
                    case 5:  $ano->setMai($row->mes); break;
                    case 6:  $ano->setJun($row->mes); break;
                    case 7:  $ano->setJul($row->mes); break;
                    case 8:  $ano->setAgo($row->mes); break;
                    case 9:  $ano->setSet($row->mes); break;
                    case 10: $ano->setOut($row->mes); break;
                    case 11: $ano->setNov($row->mes); break;
                    case 12: $ano->setDez($row->mes); break;
                }
            }
            
            return $ano->jsonSerialize();

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }

}
