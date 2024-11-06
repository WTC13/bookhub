<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../lib/bootstrap-4.3.1/css/bootstrap.min.css">
        <title>Book hub</title>
    </head>
    <body>

        <div class="container d-flex justify-content-center h-100 align-items-center">
            <div class="content">
                <div class="card p-4">
                    <div class="row">
                        <div class="col">
                            <label for="#">Nome: </label>
                            <input type="text" id="nome">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="#">Email: </label>
                            <input type="email" id="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="#">Senha: </label>
                            <input type="password" id="senha">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="#">Número do Documento: </label>
                            <input type="text" id="numero_doc">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="#">Tipo do Documento: </label>
                            <select name="" id="tipo_doc">
                                <option value="CPF">CPF</option>
                                <option value="CNPJ">CNPJ</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <label for="#">Estado: </label>
                            <select name="estado" id="estado">
                                <option value="AC">Acre (AC)</option>
                                <option value="AL">Alagoas (AL)</option>
                                <option value="AP">Amapá (AP)</option>
                                <option value="AM">Amazonas (AM)</option>
                                <option value="BA">Bahia (BA)</option>
                                <option value="CE">Ceará (CE)</option>
                                <option value="DF">Distrito Federal (DF)</option>
                                <option value="ES">Espírito Santo (ES)</option>
                                <option value="GO">Goiás (GO)</option>
                                <option value="MA">Maranhão (MA)</option>
                                <option value="MT">Mato Grosso (MT)</option>
                                <option value="MS">Mato Grosso do Sul (MS)</option>
                                <option value="MG">Minas Gerais (MG)</option>
                                <option value="PA">Pará (PA)</option>
                                <option value="PB">Paraíba (PB)</option>
                                <option value="PR">Paraná (PR)</option>
                                <option value="PE">Pernambuco (PE)</option>
                                <option value="PI">Piauí (PI)</option>
                                <option value="RJ">Rio de Janeiro (RJ)</option>
                                <option value="RN">Rio Grande do Norte (RN)</option>
                                <option value="RS">Rio Grande do Sul (RS)</option>
                                <option value="RO">Rondônia (RO)</option>
                                <option value="RR">Roraima (RR)</option>
                                <option value="SC">Santa Catarina (SC)</option>
                                <option value="SP">São Paulo (SP)</option>
                                <option value="SE">Sergipe (SE)</option>
                                <option value="TO">Tocantins (TO)</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="#">Telefone: </label>
                            <input type="text" id="telefone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button id="cadastrar" class="btn-verde w-100 mt-4">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="../../lib/jquery/jquery-3.4.1.min.js"></script>
        <script src="../../lib/bootstrap-4.3.1/js/bootstrap.min.js.map"></script>
        <script src="../../app/cadastro/js/script.js"></script>
    </body>
</html>