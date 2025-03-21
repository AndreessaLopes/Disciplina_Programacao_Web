<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AULA 0 - UMA NOVA ESPERANÇA</title>
    <style>
        .button {
            background-color: blue;
            border: 1px solid green;
            border-radius: 10px;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
    <script>
        function Alert() {
            alert('Right');
        }

        function Muda() {
            alert(document.getElementById("frmCadastro.btnMostrar").value);
        }

        function Retorna() {
            frmCadastro.btnMostrar.value = "Mostrar";
        }
    </script>
</head>

<body>
    <!-- Abaixo um formulário de cliente -->
    <form name="frmCadastro" action="processa.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="hddCodigo" value="345678" />
        <table border="1px">

            <!-- Componente de Cadastro -->
            <tr>
                <td colspan="2"> Cadastro de Cliente </td>
            </tr>

            <!-- Componente de Codigo -->
            <tr>
                <td width="15%">C&oacute;digo:</td>
                <td>
                    <input type="text" name="txtCodigo" value="12346" readonly="true" />
                </td>
            </tr>

            <!-- Componente de Nome -->
            <tr>
                <td width="15%">Nome:</td>
                <td>
                    <input type="text" name="txtNome" value="" placeholder="Insira aqui o nome" size="100" maxlength="80" />
                </td>
            </tr>

            <!-- Componente de Senha -->
            <tr>
                <td width="15%">Senha:</td>
                <td>
                    <input type="password" name="txtSenha" value="123456" maxlength="6" disabled="true" />
                </td>
            </tr>

            <!-- Componente de Email -->
            <tr>
                <td width="15%">Email:</td>
                <td>
                    <input type="email" name="txtEmail" placeholder="Insira aqui o email" size="100" maxlength="100" />
                </td>
            </tr>
            <tr>

                <!-- Componente de Data de Nascimento -->
                <td width="15%">Data de Nascimento:</td>
                <td>
                    <input type="date" name="txtDataNasc" />
                </td>
            </tr>

            <!-- Componente de Carregar Arquivo -->
            <tr>
                <td width="15%">Carregue sua foto:</td>
                <td>
                    <input type="file" name="txtArquivo" />
                </td>
            </tr>

            <!-- Componente de Radio Buttons -->
            <tr>
                <td width="15%">Renda:</td>
                <td>
                    <input type="radio" name="rdbRenda" id="rdbPobre" value="1" checked="true" />
                    <label for="rdbPobre">Pobre</label><br>
                    <input type="radio" name="rdbRenda" id="rdbMuitoPobre" value="2" />
                    <label for="rdbPobre">Muito Pobre</label><br>
                    <input type="radio" name="rdbRenda" id="rdbMiseravel" value="3" />
                    <label for="rdbPobre">Miser&aacute;vel</label><br>
                </td>
            </tr>

            <!-- Componente de Checkboxes -->
            <tr>
                <td width="15%">Escolha seus macacos favoritos:</td>
                <td>
                    <input type="checkbox" name="chkGorila" value="gorila" /> Gorila <br>
                    <input type="checkbox" name="chkOrangotango" value="orangotango" /> Orangotango <br>
                    <input type="checkbox" name="chkChimpaze" value="chimpaze" /> Chimpaz&eacute; <br>
                    <input type="checkbox" name="chkBonobo" value="bonobo" /> Bonobo <br>
                </td>
            </tr>

            <!-- Componente de TextArea -->
            <tr>
                <td width="15%">Digite a sua mensagem</td>

                <td>
                    <textarea name="txaMensagem" rows="5" cols="60"></textarea>
                </td>
            </tr>

            <!-- Componente de Dropbox -->
            <tr>
                <td width="15%">Voc&ecirc; gosta quanto de jogos?</td>
                <td>
                    <select name="slcJogos" size="1">
                        <option value="Muito" selected="true">Muito</option>
                        <option value="Medio">Mais ou menos</option>
                        <option value="Pouco">Pouco</option>
                    </select>
                </td>
            </tr>

            <!-- Componente de Listbox Multiple-->
            <tr>
                <td width="15%">Qual desses pratos voc&ecirc; gosta?</td>
                <td>
                    <select name="slcPrato" size="4">
                        <option value="1" selected="true">Strogonoff</option>
                        <option value="2">Lasanha</option>
                        <option value="3">Parmegiana</option>
                        <option value="4" selected="true">N&atilde;o desejo informar</option>
                    </select>
                </td>
            </tr>

            <!-- Componente de Groupbox -->
            <tr>
                <td width="15%">
                    Selecione os itens para sua lista de compras:
                </td>
                <td>
                    <select name="slcCompras[]" size="9" multiple="true">
                        <optgroup label="Alimentos">
                            <option value="Arroz">Arroz</option>
                            <option value="Feij&atilde;o">Feij&atilde;o</option>
                            <option value="Macarr&atilde;o">Macarr&atilde;o</option>
                        </optgroup>
                        <optgroup label="Higiente">
                            <option value="Sabonete">Sabonete</option>
                            <option value="Absorvente">Absorvente</option>
                            <option value="Cotonete">Cotonete</option>
                        </optgroup>

                        <optgroup label="Limpeza">
                            <option value="Amaciente">Amaciante</option>
                            <option value="Detergente">Detergente</option>
                            <option value="Agua Sanit&atilde;ria">Agua Sanit&atilde;ria</option>
                        </optgroup>
                    </select>
                </td>
            </tr>

            <!-- Componente de Radio Buttons usando Agrupamento -->
            <tr>
                <td width="15%">Nos dois grupos selecione seus pratos preferidos.</td>
                <td>
                    <fieldset>
                        <legend>Massas</legend>
                        <input type="radio" name="rdbLasanha" value="lasanha" />
                        <label for="rdbLasanha"> Lasanha</label><br>
                        <input type="radio" name="rdbPenne" value="penne" />
                        <label for="rdbPenne"> Macarr&atilde;o Penne</label><br>
                    </fieldset>
                    <fieldset>
                        <legend>Carne</legend>
                        <input type="radio" name="rdbBoi" value="boi" />
                        <label for="rdbBoi"> Bife de Boi</label><br>
                        <input type="radio" name="rdbPorco" value="porco" />
                        <label for="rdbPorco"> Bife de Porco</label><br>
                    </fieldset>
                </td>
            </tr>

            <!-- Componente de controle de imagem -->
            <tr>
                <td>
                    Aqui um controle de imagem:
                </td>
                <td>
                    <input type="image" name="imgImagem" src="images/image.png" alt="Um gato de olhos verdes" value="fotogato" width="30%" height="15%">
                    <br>
                    <label for="imgImagem">Um lindo gatinho posando pra foto!</label>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <table border="1px" width="100%" cellspacing="4px" cellpadding="5px">
                        <tr align="center">
                            <td>
                                <input type="button" value="Mostrar" name="btnMostrar" id="btnMostrar" class="button">
                            </td>
                            <td colspan="2">
                                <input type="reset" name="btnLimpar" value="Limpar" />
                            </td>
                            <td>
                                <input type="submit" name="btnSalvar" value="Salvar" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <!-- Componente de Buttons -->
            <tr>

            </tr>
        </table>
    </form>
</body>

</html>