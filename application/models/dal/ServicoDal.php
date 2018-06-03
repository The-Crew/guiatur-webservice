<?php

// DAL: Data Access Layer
defined('BASEPATH') OR exit('No direct script access allowed');

class ServicoDal extends CI_Model {

    public function inserir($servico_json) {
        try {
            $servico = Servico::fromJson($servico_json);
            
            // Conectando ao banco de dados
            $this->load->database();
            
            $data = array (
                'ser_descricao' => $servico->getDescricao(),
                'ser_custo_base' => $servico->getCustoBase(),
                'ser_status' => 'A'
            );
             
            $this->db->insert('tb_servico', $data);
            return $this->db->insert_id();
            
        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }
    
    public function listarTodos() {
        try {

            // Conectando ao banco de dados
            $this->load->database();

            $this->db->select('*');
            $this->db->where('ser_status', 'A');
            $query = $this->db->get('tb_servico');

            foreach ($query->result() as $row)
            {
                $servico = new Servico();
                $servico->setId($row->ser_id);
                $servico->setDescricao($row->ser_descricao);
                $servico->setCustoBase($row->ser_custo_base);
                $servico->setStatus($row->ser_status);

                $list[] = $servico->jsonSerialize();
            }
            
            return $list;

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }

}
