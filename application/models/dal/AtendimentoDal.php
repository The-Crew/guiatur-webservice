<?php

// DAL: Data Access Layer
defined('BASEPATH') OR exit('No direct script access allowed');

class AtendimentoDal extends CI_Model {

    public function inserir($atendimento_json) {
        try {
            
            $atendimento = Atendimento::fromJson($atendimento_json);
            
            // Conectando ao banco de dados
            $this->load->database();
            
            $data = array (
                'cli_id' => $atendimento->getCliente()->getId(),
                'pro_id' => $atendimento->getProfissional()->getId(),
                'ser_id' => $atendimento->getServico()->getId(),
                'atd_data_agendado' => $atendimento->getDataAgendado(),
                'atd_data_realizado' => $atendimento->getDataRealizado(),
                'atd_endereco' => $atendimento->getEndereco(),
                'atd_bairro' => $atendimento->getBairro(),
                'atd_cep' => $atendimento->getCep(),
                'mun_id' => $atendimento->getMunicipio()->getId(),
                'atd_preco' => $atendimento->getPreco(),
                'atd_desconto' => $atendimento->getDesconto(),
                'atd_custo_adicional' => $atendimento->getCustoAdicional(),
                'atd_situacao_pagamento' => $atendimento->getSituacao(),
                'atd_custo_transporte' => $atendimento->getCustoTransporte(),
                'atd_observacao' => $atendimento->getObservacao()
            );
             
            $this->db->insert('tb_atendimento', $data);
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
            $query = $this->db->get('tb_atendimento');

            foreach ($query->result() as $row)
            {
                $atendimento = new Atendimento();
                $atendimento->setId($row->atd_id);
                $atendimento->setCliente((new Cliente())->setId($row->cli_id));
                $atendimento->setProfissional((new Profissional())->setId($row->pro_id));
                $atendimento->setServico((new Servico())->setId($row->ser_id));
                $atendimento->setDataAgendado($row->atd_data_agendado);
                $atendimento->setDataRealizado($row->atd_data_realizado);
                $atendimento->setDataCadastro($row->atd_data_cadastro);
                $atendimento->setEndereco($row->atd_endereco);
                $atendimento->setBairro($row->atd_bairro);
                $atendimento->setCep($row->atd_cep);
                $atendimento->setMunicipio((new Municipio())->setId($row->mun_id));
                $atendimento->setStatus($row->atd_status);
                $atendimento->setPreco($row->atd_preco);
                $atendimento->setDesconto($row->atd_desconto);
                $atendimento->setCustoAdicional($row->atd_custo_adicional);
                $atendimento->setSituacao($row->atd_situacao_pagamento);
                $atendimento->setCustoTransporte($row->atd_custo_transporte);
                $atendimento->setObservacao($row->atd_observacao);
                $atendimento->setAvaliacaoData($row->atd_avaliacao_data);
                $atendimento->setAvaliacaoSatisfacao($row->atd_avaliacao_satisfacao);
                $atendimento->setAvaliacaoComentario($row->atd_avaliacao_comentario);

                $list[] = $atendimento->jsonSerialize();
            }
            
            return $list;

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }

}
