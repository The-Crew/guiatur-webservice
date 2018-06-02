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
                'cli_senha' => $cliente->getSenha(),
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

}
