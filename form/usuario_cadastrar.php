<?php
	session_start();
	if(isset($_SESSION['user_id'])) unset($_SESSION['user_id']);
	
	Structure::header();
?>
                <form action="<?=APP_URL?>/action/usuario/cadastrar"  method="post" class="new_submit">
                    <h1>Usuário > Cadastrar</h1>

                    <h2>Dados Pessoais</h2>
                    <label for="nome">Nome completo</label>
                    <input name="Usuario-nome" type="text" id="nome" required="required" placeholder="Aquele nome que tua mãe te deu...">

                    <label for="cpf">CPF</label>
                    <input name="Usuario-cpf" type="text" id="cpf" required="required" placeholder="999.999.999-99">

                    <label for="data_nasc">Data de Nascimento</label>
                    <input name="Usuario-data_nasc" type="text" id="data_nasc" required="required" placeholder="13/05/1888">

                    <label for="deficiencia">Portador de alguma deficiência? Qual?</label>
                    <input name="Usuario-deficiencia" type="text" id="deficiencia">

                    <label for="senha">Senha</label>
                    <input name="Usuario-senha" type="password" id="senha" placeholder="Senha difícil" required="required">
                
                    <label for="confirmacao_senha">Confirmação Senha</label>
                    <input name="confirmacao_senha" type="password" id="confirmacao_senha" placeholder="Confirme sua senha" required="required" onchange="validatePassword()">

                    <h2>Contato</h2>
                    <label for="email">Email</label>
                    <input name="Usuario-email" type="email" id="email" required="required" onchange="validateSize(this,100)" placholder="bonitinha23@hotmail.com">

                    <label for="telefone_residencial">Telefone Residencial</label>
                    <input name="Usuario-telefone_residencial" type="text" id="telefone_residencial" required="required" placeholder="(21) 2234-5678">

                    <label for="telefone_celular">Telefone Celular</label>
                    <input name="Usuario-telefone_celular" type="text" id="telefone_celular" required="required" placeholder="(11) 99867-5309">

                    <h2>Acadêmico</h2>
                    <label for="inst_ens">Instituição de Ensino</label>
                    <input name="Usuario-inst_ens" type="text" id="inst_ens" required="required" placeholder="...FEDERAL DO AMAPÁ! CHUPA ACRE!">

                    <label for="curso">Curso</label>
                    <input name="Usuario-curso" type="text" id="curso" required="required" placeholder="Design de Asa de Borboleta">

                    <label for="periodo">Período</label>
                    <select id="periodo" name="Usuario-periodo">
                        <option value="1o">1º Período</option>
                        <option value="2o">2º Período</option>
                        <option value="3o">3º Período</option>
                        <option value="4o">4º Período</option>
                        <option value="5o">5º Período</option>
                        <option value="6o">6º Período</option>
                        <option value="7o">7º Período</option>
                        <option value="8o">8º Período</option>
                        <option value="9o">9º Período</option>
                        <option value="10o">10º Período</option>
                        <option value="GR">Graduado</option>
                    </select>

                    <h2>Endereço</h2>
                    <label for="logradouro">Logradouro</label>
                    <input name="Usuario-end_logradouro" type="text" id="logradouro" required="required" placeholder="Rua da Assembléia">

                    <label for="numero">Número</label>
                    <input name="Usuario-end_numero" type="text" id="numero" required="required" placeholder="10">

                    <label for="complemento">Complemento</label>
                    <input name="Usuario-end_complemento" type="text" id="complemento">

                    <label for="bairro">Bairro</label>
                    <input name="Usuario-end_bairro" type="text" id="bairro" required="required" placeholder="Centro">

                    <label for="cidade">Cidade</label>
                    <input name="Usuario-end_cidade" type="text" id="cidade" required="required" placeholder="Zombieland">

                    <label for="estado">Estado</label>
                    <select name="Usuario-end_estado" id="estado">
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                        <option value="ES">Estrangeiro</option>
                    </select>

                    <label for="cep">CEP</label>
                    <input name="Usuario-end_cep" type="text" id="cep" required="required" placeholder="99999-999">

                    <h2>Em caso de emergência</h2>
                    <label for="responsavel_nome">Nome do Responsável</label>
                    <input name="Usuario-responsavel_nome" type="text" id="responsavel_nome" required="required" placeholder="Dilma Rouseff">

                    <label for="responsavel_telefone">Telefone do Responsável</label>
                    <input name="Usuario-responsavel_telefone" type="text" id="responsavel_telefone" required="required" placeholder="(61) 3411-4000">

                    <label for="alergias">Alergias</label>
                    <input name="Usuario-alergias" type="text" id="alergias" placeholder="Corel Draw">

                    <label for="medicacao_continua">Medicação Contínua</label>
                    <input name="Usuario-medicacao_continua" type="text" id="medicacao_continua" placeholder="Gardenal">

                    <label for="plano_saude">Plano de Saúde</label>
                    <input name="Usuario-plano_saude" type="text" id="plano_saude" placeholder="Multimed">

                    <p><input type="submit" value="Cadastrar" /></p>

                    <script>
                        $('#cpf').mask("999.999.999-99");
                        $('#telefone_residencial').mask("(00) 0000-0000");
                        $('#telefone_celular').mask("(00) 00009-0000");
                        $('#responsavel_telefone').mask("(00) 00009-0000");
                        $('#data_nasc').mask('00/00/0000');
                        $('#cep').mask('00000-000');
                    </script>
            </form>
<?php Structure::footer(); ?>
