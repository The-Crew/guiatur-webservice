<?php

// DAL: Data Access Layer
defined('BASEPATH') OR exit('No direct script access allowed');

class AtendimentoDal extends CI_Model {

    public function inserir($atendimento_json) {
        try {
            
            $atendimento = Atendimento::fromJson($atendimento_json);
            
            // Conectando ao banco de dados
            $this->load->database();

            $sql = 'INSERT INTO tb_atendimento (';
            $sql .= 'cli_id, ';
            $sql .= 'pro_id, ';
            $sql .= 'ser_id, ';
            $sql .= 'atd_data_agendado, ';
            $sql .= 'atd_data_realizado, ';
            $sql .= 'atd_data_cadastro, ';
            $sql .= 'atd_endereco, ';
            $sql .= 'atd_bairro, ';
            $sql .= 'atd_cep, ';
            $sql .= 'mun_id, ';
            $sql .= 'atd_status, ';
            $sql .= 'atd_preco, ';
            $sql .= 'atd_desconto, ';
            $sql .= 'atd_custo_adicional, ';
            $sql .= 'atd_situacao_pagamento, ';
            $sql .= 'atd_custo_traNsporte, ';
            $sql .= 'atd_observacao, ';
            $sql .= 'atd_avaliacao_data, ';
            $sql .= 'atd_avaliacao_satisfacao, ';
            $sql .= 'atd_avaliacao_comentario ';
            $sql .= ') VALUES (';
            $sql .= $this->db->escape($atendimento->getCliente()->getId()).', ';
            $sql .= $this->db->escape($atendimento->getProfissional()->getId()).', ';
            $sql .= $this->db->escape($atendimento->getServico()->getId()).', ';
            $sql .= $this->db->escape($atendimento->getDataAgendado()).', ';
            $sql .= $this->db->escape($atendimento->getDataRealizado()).', ';
            $sql .= $this->db->escape($atendimento->getDataCadastro()).', ';
            $sql .= $this->db->escape($atendimento->getEndereco()).', ';
            $sql .= $this->db->escape($atendimento->getBairro()).', ';
            $sql .= $this->db->escape($atendimento->getCep()).', ';
            $sql .= $this->db->escape($atendimento->getMunicipio()->getId()).', ';
            $sql .= $this->db->escape($atendimento->getStatus()).', ';
            $sql .= $this->db->escape($atendimento->getPreco()).', ';
            $sql .= $this->db->escape($atendimento->getDesconto()).', ';
            $sql .= $this->db->escape($atendimento->getCustoAdicional()).', ';
            $sql .= $this->db->escape($atendimento->getSituacao()).', ';
            $sql .= $this->db->escape($atendimento->getCustoTransporte()).', ';
            $sql .= $this->db->escape($atendimento->getObservacao()).', ';
            $sql .= $this->db->escape($atendimento->getAvaliacaoData()).', ';
            $sql .= $this->db->escape($atendimento->getAvaliacaoSatisfacao()).', ';
            $sql .= $this->db->escape($atendimento->getAvaliacaoComentario());
            $sql .= '); ';
            //$sql .= 'SELECT LAST_INSERT_ID();';
            
            //die($sql);
            $query = $this->db->query($sql);
            
            //return $query->result()[0];
            return true;
            
        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }

}
