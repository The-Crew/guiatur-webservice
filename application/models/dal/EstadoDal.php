<?php
// DAL: Data Access Layer
defined('BASEPATH') OR exit('No direct script access allowed');

class EstadoDal extends CI_Model {

    public function listarTodos() {
        try {
            // Conectando ao banco de dados
            $this->load->database();
            
            $this->db->select('est_uf, est_nome');
            $query = $this->db->get('tb_estado');

            foreach ($query->result() as $row)
            {
                $estado = new Estado();
                $estado->setUf($row->est_uf);
                $estado->setNome($row->est_nome);
                $list[] = $estado->jsonSerialize();
            }

            return $list;
        } catch (Exception $e) {
            die($e->getMessage());
        } finally {
            $this->db->close();
        }
    }

}
