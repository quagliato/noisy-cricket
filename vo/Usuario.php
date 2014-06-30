<?php

class Usuario extends GenericClass{

	protected static $sys_tablename = "usuario";

	protected $id;
	protected $nome;
    protected $cpf;
    protected $data_nasc;
    protected $deficiencia;
	protected $senha;
	protected $email;
    protected $telefone_residencial;
    protected $telefone_celular;
    protected $inst_ens;
    protected $curso;
    protected $periodo;
    protected $end_logradouro;
    protected $end_numero;
    protected $end_complemento;
    protected $end_bairro;
    protected $end_cidade;
    protected $end_estado;
    protected $end_cep;
    protected $responsavel_nome;
    protected $responsavel_telefone;
    protected $alergias;
    protected $medicacao_continua;
    protected $plano_saude;
	protected $dt_registro;
	protected $dt_ultimo_login;
	protected $privilegio;
	
	protected $sys_type = array(
		'id' => 'int',
		'nome' => 'str',
		'cpf' => 'str',
        'data_nasc' => 'date',
        'deficiencia' => 'str',
		'senha' => 'str',
		'email' => 'str',
        'telefone_residencial' => 'str',
        'telefone_celular' => 'str',
        'inst_ens' => 'str',
        'curso' => 'str',
        'periodo' => 'str',
        'end_logradouro' => 'str',
        'end_numero' => 'str',
        'end_complemento' => 'str',
        'end_bairro' => 'str',
        'end_cidade' => 'str',
        'end_estado' => 'str',
        'end_cep' => 'str',
        'responsavel_nome' => 'str',
        'responsavel_telefone' => 'str',
        'alergias' => 'str',
        'medicacao_continua' => 'str',
        'plano_saude' => 'str',
        'dt_registro' => 'date',
        'dt_ultimo_login' => 'date',
        'privilegio' => 'str'
	);

}

?>
