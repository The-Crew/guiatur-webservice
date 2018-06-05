<?php

// DAL: Data Access Layer
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'utils/Utils.php');

class ClienteDal extends CI_Model {

    public function inserir($cliente_json) {
        try {
            $cliente = Cliente::fromJson($cliente_json);
            
            // Conectando ao banco de dados
            $this->load->database();
            
            $data = array (
                'cli_nome' => $cliente->getNome(),
                'cli_login' => $cliente->getLogin(),
                'cli_senha' => md5($cliente->getSenha()),
                'cli_data_nascimento' => $cliente->getDataNascimento(),
                'cli_sexo' => $cliente->getSexo(),
                'cli_email' => $cliente->getEmail(),
                'cli_ddd' => $cliente->getDdd(),
                'cli_telefone' => $cliente->getTelefone(),
                'cli_endereco' => $cliente->getEndereco(),
                'cli_bairro' => $cliente->getBairro(),
                'cli_cep' => $cliente->getCep(),
                'mun_id' => $cliente->getMunicipio()->getId(),
                'cli_ultimo_acesso' => '0000-00-00 00:00:00',
                'cli_uniqid' => Utils::gerarUniquid(),
                'cli_data_confirmacao' => '0000-00-00 00:00:00'
            );
             
            //$str = $this->db->insert_string('tb_cliente', $data);
            //die(print_r($str));
            $this->db->insert('tb_cliente', $data);
            return $this->db->insert_id();
            
        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }
    
    public function logar($cliente_json) {
        try {
            
            $cliente = Cliente::fromJson($cliente_json);
            
            // Conectando ao banco de dados
            $this->load->database();
            
            $this->db->select('*');
            $this->db->where('cli_login', $cliente->getLogin());
            $this->db->where('cli_senha', md5($cliente->getSenha()));
            $this->db->where('cli_status', 'A');
            //die(print_r($this->db->get_compiled_select('tb_cliente')));
            $query = $this->db->get('tb_cliente');
            
            $list = false;
            foreach ($query->result() as $row)
            {
                $cliente = new Cliente();
                $cliente->setId($row->cli_id);
                $cliente->setNome($row->cli_nome);
                $cliente->setLogin($row->cli_login);
                $cliente->setSenha($row->cli_senha);
                $cliente->setDataNascimento($row->cli_data_nascimento);
                $cliente->setSexo($row->cli_sexo);
                $cliente->setEmail($row->cli_email);
                $cliente->setDdd($row->cli_ddd);
                $cliente->setTelefone($row->cli_telefone);
                $cliente->setEndereco($row->cli_endereco);
                $cliente->setBairro($row->cli_bairro);
                $cliente->setCep($row->cli_cep);
                
                $municipio = new Municipio();
                $municipio->setId($row->mun_id);
                $cliente->setMunicipio($municipio->jsonSerialize());
                
                $cliente->setDataCadastro($row->cli_data_cad);
                $cliente->setUltimoAcesso($row->cli_ultimo_acesso);
                $cliente->setUniqid($row->cli_uniqid);
                $cliente->setDataConfirmacao($row->cli_data_confirmacao);
                $cliente->setStatus($row->cli_status);

                $list[] = $cliente->jsonSerialize();
            }
            
            return $list;

        } finally {
            if (isSet($this->db))
                $this->db->close();
        }
    }
}
