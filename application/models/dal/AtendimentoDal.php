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

            $list = null;
            foreach ($query->result() as $row)
            {
                $atendimento = new Atendimento();
                $atendimento->setId($row->atd_id);

                $cliente = new Cliente();
                $cliente->setId($row->cli_id);
                $atendimento->setCliente($cliente->jsonSerialize());

                $profissional = new Profissional();
                $profissional->setId($row->pro_id);
                $atendimento->setProfissional($profissional->jsonSerialize());

                $servico = new Servico();
                $servico->setId($row->ser_id);
                $atendimento->setServico($servico->jsonSerialize());

                $atendimento->setDataAgendado($row->atd_data_agendado);
                $atendimento->setDataRealizado($row->atd_data_realizado);
                $atendimento->setDataCadastro($row->atd_data_cadastro);
                $atendimento->setEndereco($row->atd_endereco);
                $atendimento->setBairro($row->atd_bairro);
                $atendimento->setCep($row->atd_cep);

                $municipio = new Municipio();
                $municipio->setId($row->mun_id);
                $atendimento->setMunicipio($municipio->jsonSerialize());

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

    public function listarNaoConcluidos($cliente_json) {
        try {

            $cliente = Cliente::fromJson($cliente_json);

            // Conectando ao banco de dados
            $this->load->database();

            $this->db->select('*');
            $this->db->where('cli_id', $cliente->getId());
            $this->db->where('atd_status', 'A');
            //die(print_r($this->db->get_compiled_select('tb_atendimento')));
            $query = $this->db->get('tb_atendimento');

            $list = null;
            foreach ($query->result() as $row)
            {
                $atendimento = new Atendimento();
                $atendimento->setId($row->atd_id);

                $cliente = new Cliente();
                $cliente->setId($row->cli_id);
                $atendimento->setCliente($cliente->jsonSerialize());

                $profissional = new Profissional();
                $profissional->setId($row->pro_id);
                $atendimento->setProfissional($profissional->jsonSerialize());

                $servico = new Servico();
                $servico->setId($row->ser_id);
                $atendimento->setServico($servico->jsonSerialize());

                $atendimento->setDataAgendado($row->atd_data_agendado);
                $atendimento->setDataRealizado($row->atd_data_realizado);
                $atendimento->setDataCadastro($row->atd_data_cadastro);
                $atendimento->setEndereco($row->atd_endereco);
                $atendimento->setBairro($row->atd_bairro);
                $atendimento->setCep($row->atd_cep);

                $municipio = new Municipio();
                $municipio->setId($row->mun_id);
                $atendimento->setMunicipio($municipio->jsonSerialize());

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

    public function listarConcluidos($cliente_json) {
        try {

            $cliente = Cliente::fromJson($cliente_json);

            // Conectando ao banco de dados
            $this->load->database();

            $this->db->select('*');
            $this->db->where('cli_id', $cliente->getId());
            $this->db->where('atd_status', 'R');
            //die(print_r($this->db->get_compiled_select('tb_atendimento')));
            $query = $this->db->get('tb_atendimento');

            $list = null;
            foreach ($query->result() as $row)
            {
                $atendimento = new Atendimento();
                $atendimento->setId($row->atd_id);

                $cliente = new Cliente();
                $cliente->setId($row->cli_id);
                $atendimento->setCliente($cliente->jsonSerialize());

                $profissional = new Profissional();
                $profissional->setId($row->pro_id);
                $atendimento->setProfissional($profissional->jsonSerialize());

                $servico = new Servico();
                $servico->setId($row->ser_id);
                $atendimento->setServico($servico->jsonSerialize());

                $atendimento->setDataAgendado($row->atd_data_agendado);
                $atendimento->setDataRealizado($row->atd_data_realizado);
                $atendimento->setDataCadastro($row->atd_data_cadastro);
                $atendimento->setEndereco($row->atd_endereco);
                $atendimento->setBairro($row->atd_bairro);
                $atendimento->setCep($row->atd_cep);

                $municipio = new Municipio();
                $municipio->setId($row->mun_id);
                $atendimento->setMunicipio($municipio->jsonSerialize());

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

    public function cancelar($atendimento_json) {
        try {

            $atendimento = Atendimento::fromJson($atendimento_json);
            // Conectando ao banco de dados
            $this->load->database();

            $this->db->where('atd_id', $atendimento->getId());
            $this->db->set('atd_status', 'C');

            return $this->db->update('tb_atendimento');

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }

    public function avaliar($atendimento_json) {
        try {

            $atendimento = Atendimento::fromJson($atendimento_json);
            // Conectando ao banco de dados
            $this->load->database();

            $this->db->where('atd_id', $atendimento->getId());
            $this->db->set('atd_avaliacao_satisfacao', $atendimento->getAvaliacaoSatisfacao());

            return $this->db->update('tb_atendimento');

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }

}
