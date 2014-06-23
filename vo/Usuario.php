<?php

class Usuario {

	const sys_tablename = "usuario";

	private $id;
	private $nome;
    private $cpf;
    private $data_nasc;
    private $deficiencia;
	private $senha;
	private $email;
    private $telefone_residencial;
    private $telefone_celular;
    private $inst_ens;
    private $curso;
    private $periodo;
    private $end_logradouro;
    private $end_numero;
    private $end_complemento;
    private $end_bairro;
    private $end_cidade;
    private $end_estado;
    private $end_cep;
    private $responsavel_nome;
    private $responsavel_telefone;
    private $alergias;
    private $medicacao_continua;
    private $plano_saude;
	private $dt_registro;
	private $dt_ultimo_login;
	private $privilegio;
	
	private $sys_type = array(
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

    public function set($prop, $value) {
		$this->$prop = $value;
	}
	
	public function get($prop) {
		return $this->$prop;
	}
	
	public function type($prop) {
		if (array_key_exists($prop, $this->sys_type))
			return $this->sys_type[$prop];
		return 'none';
	}
	
	public function props() {
		return get_object_vars($this);
	}
	
	public static function tablename() {
		return self::sys_tablename;
	}
}

?>
