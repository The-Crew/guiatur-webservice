<?php

// DAL: Data Access Layer
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'utils/Utils.php');

class ProfissionalDal extends CI_Model {

    public function inserir($profissional_json) {
        try {
            $profissional = Profissional::fromJson($profissional_json);
            
            // Conectando ao banco de dados
            $this->load->database();
            
            $data = array (
                'pro_nome' => $profissional->getNome(),
                'pro_login' => $profissional->getLogin(),
                'pro_senha' => $profissional->getSenha(),
                'pro_data_nascimento' => $profissional->getDataNascimento(),
                'pro_sexo' => $profissional->getSexo(),
                'pro_email' => $profissional->getEmail(),
                'pro_ddd' => $profissional->getDdd(),
                'pro_telefone' => $profissional->getTelefone(),
                'pro_endereco' => $profissional->getEndereco(),
                'pro_bairro' => $profissional->getBairro(),
                'pro_cep' => $profissional->getCep(),
                'mun_id' => $profissional->getMunicipio()->getId(),
                'pro_ultimo_acesso' => '0000-00-00 00:00:00',
                'pro_uniqid' => Utils::gerarUniquid(),
                'pro_data_confirmacao' => '0000-00-00 00:00:00'
            );
             
            $this->db->insert('tb_profissional', $data);
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
            $this->db->where('pro_status', 'A');
            $query = $this->db->get('tb_profissional');

            foreach ($query->result() as $row)
            {
                $profissional = new Profissional();
                $profissional->setId($row->pro_id);
                $profissional->setNome($row->pro_nome);
                $profissional->setLogin($row->pro_login);
                $profissional->setDataNascimento($row->pro_data_nascimento);
                $profissional->setSexo($row->pro_sexo);
                $profissional->setEmail($row->pro_email);
                $profissional->setDdd($row->pro_ddd);
                $profissional->setTelefone($row->pro_telefone);
                $profissional->setEndereco($row->pro_endereco);
                $profissional->setBairro($row->pro_bairro);
                $profissional->setCep($row->pro_cep);
                $profissional->setMunicipio((new Municipio())->setId($row->mun_id));
                $profissional->setDataCadastro($row->pro_data_cad);
                $profissional->setUltimoAcesso($row->pro_ultimo_acesso);
                $profissional->setUniqid($row->pro_uniqid);
                $profissional->setDataConfirmacao($row->pro_data_confirmacao);
                $profissional->setStatus($row->pro_status);
                $list[] = $profissional->jsonSerialize();
            }
            
            return $list;

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }

}
