<?php
// DAL: Data Access Layer
defined('BASEPATH') OR exit('No direct script access allowed');

class MunicipioDal extends CI_Model {

    public function listarPorEstado($estado_json) {
        try {
            
            $estado = Estado::fromJson($estado_json);
            
            // Conectando ao banco de dados
            $this->load->database();
            
            $this->db->select('mun_id, mun_nome');
            $this->db->where('est_uf', $estado->getUf());
            $query = $this->db->get('tb_municipio');

            foreach ($query->result() as $row)
            {
                $municipio = new Municipio();
                $municipio->setId($row->mun_id);
                $municipio->setNome($row->mun_nome);
                $list[] = $municipio->jsonSerialize();
            }

            return $list;
        } catch (Exception $e) {
            die($e->getMessage());
        } finally {
            $this->db->close();
        }
    }

}
