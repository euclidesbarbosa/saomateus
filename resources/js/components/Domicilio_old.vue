<template>
    <div class="row">
        <hr/>
        <h5>1 - IDENTIFICAÇÃO E CONTROLE</h5>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>1.01 - Código Familiar</label>
            <input class="form-control" type="number" step="1" v-model="cod_familiar_fam">
        </div>
        <div class="col-sm-1">
            <label>1.02 - UF</label>
            <input class="form-control" type="text" value="MA" :disabled="true" v-model="">
        </div>
        <div class="col-sm-2">
            <label>1.03 - Municipio</label>
            <input class="form-control" type="number" value="01431" :disabled="true">
        </div>
        <div class="col-sm-2">
            <label>1.04 - Distrito</label>
            <input class="form-control" type="number" value="01" :disabled="true">
        </div>
        <div class="col-sm-2">
            <label>1.05 - Subdistrito</label>
            <input class="form-control" type="number" value="01" :disabled="true">
        </div>
        <div class="col-sm-2">
            <label>1.06 - Setor</label>
            <input class="form-control" type="number" value="0001" :disabled="true">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>1.07 - Modalidade</label>
            <div>
                <input type="radio" class="radio" :value="1" name="un_107">&nbsp;Inclusão<br>
                <input type="radio" class="radio" :value="2" name="un_107">&nbsp;Alteração
            </div>
        </div>
        <div class="col-sm-3">
            <label>1.08 - Forma coleta</label>
            <div>
                <input type="radio" class="radio" :value="1" name="un_108">&nbsp;Sem visita domiciliar<br>
                <input type="radio" class="radio" :value="2" name="un_108">&nbsp;Com visita domiciliar
            </div>
        </div>
        <div class="col-sm-3">
            <label>1.09 - Formauário(s) preenchido(s)</label>
            <div>
                <input type="checkbox" class="check" :value="0" name="un_109">&nbsp;Principal
                <input type="checkbox" class="check" :value="2" name="un_109">&nbsp;Avulso 2<br>
                <input type="checkbox" class="check" :value="1" name="un_109">&nbsp;Avulso 1
                <input type="checkbox" class="check" :value="3">&nbsp;Suplementar(es)&nbsp;
                <div class="col-sm-3"><input type="text" class="form-control"></div>
            </div>
        </div>
        <div class="col-sm-3">
            <label>1.10 - Data da entrevista</label>
            <input type="date" class="form-control">
        </div>
    </div>
    <div class="row">
        <hr/>
        <h5>ENDEREÇO FAMILIAR</h5>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>1.11 - Tipo de Localidade</label>
            <select class="form-select">
                <option></option>
            </select>
        </div>
        <div class="col-sm-8">
            <label>1.11ª - Localidade</label>
            <select class="form-select">
                <option></option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>1.12 - Tipo de Logradouro</label>
            <select class="form-select">
                <option></option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>1.13 - Título</label>
            <select class="form-select">
                <option></option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>1.14 - Nome</label>
            <input type="text" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>1.15 - Número</label>
            <input type="number" class="form-control" step="1" min="0">
        </div>
        <div class="col-sm-8">
            <label>1.16 - Complemento do número (s/n°, km, A, FUNASA, SUCAM, ext.)</label>
            <input type="text" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <label>1.17 - Complemento adicional</label>
            <textarea type="text" class="form-control" rows="2" cols="50"></textarea>
        </div>
        <div class="col-sm-4">
            <label>1.18 - CEP</label>
            <input type="text" class="form-control" mask="'##.###-###'">
        </div>
    </div>
    <div class="row">
        <hr/>
        <h5>2 - CARACTERÍSTICAS DO DOMICÍLIO</h5>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <label>2.01 - Característica de onde está situado</label>
                    <div>
                        <input type="radio" :value="1" name="un_201">&nbsp;Urbanas
                        <input type="radio" :value="2" name="un_201">&nbsp;Rurais
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.02 - Espécie do domicílio</label>
                    <div>
                        <input type="radio" :value="1" name="un_202">&nbsp;Particular permanente<br>
                        <input type="radio" :value="2" name="un_202">&nbsp;Particular improvisado<br>
                        <input type="radio" :value="3" name="un_202">&nbsp;Coletivo
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label>2.03 - Quantos cômodos</label>
                    <input type="number" class="form-control" :value="1" step="1" min="1">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label>2.04 - Cômodos como dormitório</label>
                    <input type="number" class="form-control" :value="1" step="1" min="1">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.05 - Material predominante (piso)</label>
                    <div>
                        <input type="radio" class="radio" :value="1" name="un_205">&nbsp;Terra<br>
                        <input type="radio" class="radio" :value="2" name="un_205">&nbsp;Cimento<br>
                        <input type="radio" class="radio" :value="3" name="un_205">&nbsp;Madeira aproveitada<br>
                        <input type="radio" class="radio" :value="4" name="un_205">&nbsp;Madeira aparelhada<br>
                        <input type="radio" class="radio" :value="5" name="un_205">&nbsp;Cerâmica, lajota ou pedra<br>
                        <input type="radio" class="radio" :value="6" name="un_205">&nbsp;Carpete<br>
                        <input type="radio" class="radio" :value="7" name="un_205">&nbsp;Outro material<br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.06 - Material predominante (parede)</label>
                    <div>
                        <input type="radio" class="radio" :value="1" name="un_206">&nbsp;Alvenaria/tijolo com revestimento<br>
                        <input type="radio" class="radio" :value="2" name="un_206">&nbsp;Alvenaria/tijolo sem revestimento<br>
                        <input type="radio" class="radio" :value="3" name="un_206">&nbsp;Madeira aparelhada<br>
                        <input type="radio" class="radio" :value="4" name="un_206">&nbsp;Taipa revestida<br>
                        <input type="radio" class="radio" :value="5" name="un_206">&nbsp;Taipa não-revestida<br>
                        <input type="radio" class="radio" :value="6" name="un_206">&nbsp;Madeira aproveitada<br>
                        <input type="radio" class="radio" :value="7" name="un_206">&nbsp;Palha<br>
                        <input type="radio" class="radio" :value="8" name="un_206">&nbsp;Outro material<br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.07 - Água canalizada (em um ou mais cômodos)</label>
                    <div>
                        <input type="radio" class="radio" :value="1" name="un_207">&nbsp;Sim
                        <input type="radio" class="radio" :value="2" name="un_207">&nbsp;Não
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <label>2.08 - Forma de abastecimento</label>
                    <div>
                        <input type="radio" :value="1" name="un_208">&nbsp;Rede geral de distribuição<br>
                        <input type="radio" :value="2" name="un_208">&nbsp;Poço ou nascente<br>
                        <input type="radio" :value="3" name="un_208">&nbsp;Cisterna<br>
                        <input type="radio" :value="4" name="un_208">&nbsp;Outra forma<br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.09 - Tem banheiro sanitário</label>
                    <div>
                        <input type="radio" :value="1" name="un_209">&nbsp;Sim
                        <input type="radio" :value="2" name="un_209">&nbsp;Não
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.10 - Forma de escoamento do banheiro sanitário</label>
                    <div>
                        <input type="radio" :value="1" name="un_210">&nbsp;Rede coletora de esgoto ou pluvial<br>
                        <input type="radio" :value="2" name="un_210">&nbsp;Fossa séptica<br>
                        <input type="radio" :value="3" name="un_210">&nbsp;Fossa rudimentar<br>
                        <input type="radio" :value="4" name="un_210">&nbsp;Vala a céu aberto<br>
                        <input type="radio" :value="5" name="un_210">&nbsp;Direto para um rio, lago ou mar<br>
                        <input type="radio" :value="6" name="un_210">&nbsp;Outra forma<br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.11 - Forma de coleta de lixo</label>
                    <div>
                        <input type="radio" :value="1" name="un_211">&nbsp;É coletado diretamente<br>
                        <input type="radio" :value="2" name="un_211">&nbsp;É coletado indiretamente<br>
                        <input type="radio" :value="3" name="un_211">&nbsp;É queimado ou enterrado na propriedade<br>
                        <input type="radio" :value="4" name="un_211">&nbsp;É jogado em terreno baldio ou logradouro(rua, avenida, etc)<br>
                        <input type="radio" :value="5" name="un_211">&nbsp;É jogado em rio, lago ou mar<br>
                        <input type="radio" :value="6" name="un_211">&nbsp;tem outro destino<br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.12 - Forma de iluminação</label>
                    <div>
                        <input type="radio" :value="1" name="un_212">&nbsp;Elétrica com medidor próprio<br>
                        <input type="radio" :value="2" name="un_212">&nbsp;Elétrica com medidor comunitário<br>
                        <input type="radio" :value="3" name="un_212">&nbsp;Elétrica sem medidor<br>
                        <input type="radio" :value="4" name="un_212">&nbsp;Óleo, querosene ou gás<br>
                        <input type="radio" :value="5" name="un_212">&nbsp;Vela<br>
                        <input type="radio" :value="6" name="un_212">&nbsp;Outra forma<br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.13 - Existe calçamento/pavimentação</label>
                    <div>
                        <input type="radio" :value="1" name="un_213">&nbsp;Total
                        <input type="radio" :value="2" name="un_213">&nbsp;Parcial
                        <input type="radio" :value="3" name="un_213">&nbsp;Não existe
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <hr/>
        <h5>3 - FAMÍLIA</h5>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.01 - A família é indígena?</label>
            <div>
                <input type="radio" class="radio" :value="1" name="tipoFamilia">&nbsp;Sim
                <span  style="margin-right: 150px"></span>
                <input type="radio" class="radio" :value="2" name="tipoFamilia">&nbsp;Não
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.02 - A que povo indígena pertence a família?</label>
            <input type="text" class="form-control" maxlength="100">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.03 - A família reside em terra ou reserva indígena?</label>
            <div>
                <input type="radio" class="radio" :value="1" name="tipoTerraReserva">&nbsp;Sim
                <span  style="margin-right: 150px"></span>
                <input type="radio" class="radio" :value="2" name="tipoTerraReserva">&nbsp;Não
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.04 - Qual é o nome da terra ou reserva indígena?</label>
            <div>
                <input type="text" class="form-control" >
                <div>
                    <input type="checkbox" class="check" :value="2">&nbsp;Não Sabe
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.05 - A família é quilombola?</label>
            <div>
                <input type="radio" class="radio" :value="1" name="tipoQuilombola">&nbsp;Sim
                <span  style="margin-right: 150px"></span>
                <input type="radio" class="radio" :value="2" name="tipoQuilombola">&nbsp;Não
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>Qual é o nome da comunidade quilombola?</label>
            <input type="text" class="form-control" maxlength="100">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.07 - Quantas pessoas moram no seu domicílio? (Não preencher para famílias em situação de rua e famílias em domicílio coletivo)</label>
            <input type="number" class="form-control" min="1" step="1">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.08 - Quantas famílias moram no seu domicílio? (Não preencher para famílias em situação de rua e famílias em domicílio coletivo)</label>
            <input type="number" class="form-control" min="1" step="1">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.09 - Há alguma pessoa dessa família internada, abrigada ou privada de liberdade há 12 meses ou mais?</label>
            <div class="row">
                <div class="col-sm-6">
                    <input type="number" class="form-control" min="0" step="1">&nbsp;1 - Criança(s) e adolescente(s) (de 0 a 17 anos)
                </div>
                <div class="col-sm-6">
                    <input type="checkbox" class="check" :value="0">&nbsp;0 - Não tem<br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <input type="number" class="form-control" min="0" step="1">&nbsp;2 - Jovem(ns) e adulto(s) (de 18 a 59 anos)
                </div>
                <div class="col-sm-6">
                    <input type="checkbox" class="check" :value="0">&nbsp;0 - Não tem<br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <input type="number" class="form-control" min="0" step="1">&nbsp;3 - Idoso(s) (de 60 anos ou mais)
                </div>
                <div class="col-sm-6">
                    <input type="checkbox" class="check" :value="0">&nbsp;0 - Não tem
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <hr/>
        <h5>LISTA DE COMPONENTES DA FAMÍLIA MORADORES DO DOMICÍLIO</h5>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <label>Nº de ordem</label>
            <input type="number" class="form-control" min="0" step="1">
        </div>
        <div class="col-sm-4">
            <label>Nome da pessoa</label>
            <input type="text" class="form-control" :disabled="disabled">
        </div>
        <div class="col-sm-2">
            <label>Nº de ordem</label>
            <input type="number" class="form-control" min="0" step="1">
        </div>
        <div class="col-sm-4">
            <label>Nome da pessoa</label>
            <input type="text" class="form-control" :disabled="disabled">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="number" class="form-control" min="0" step="1">
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" :disabled="disabled">
        </div>
        <div class="col-sm-2">
            <input type="number" class="form-control" min="0" step="1">
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" :disabled="disabled">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="number" class="form-control" min="0" step="1">
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" :disabled="disabled">
        </div>
        <div class="col-sm-2">
            <input type="number" class="form-control" min="0" step="1">
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" :disabled="disabled">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="number" class="form-control" min="0" step="1">
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" :disabled="disabled">
        </div>
        <div class="col-sm-2">
            <input type="number" class="form-control" min="0" step="1">
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" :disabled="disabled">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="number" class="form-control" min="0" step="1">
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" :disabled="disabled">
        </div>
        <div class="col-sm-2">
            <input type="number" class="form-control" min="0" step="1">
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" :disabled="disabled">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="number" class="form-control" min="0" step="1">
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" :disabled="disabled">
        </div>
        <div class="col-sm-2">
            <input type="number" class="form-control" min="0" step="1">
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" :disabled="disabled">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.10 - A família, normalmente, tem despesa mensal com:</label>
            <div class="row">
                <div class="col-sm-6">
                    <div class="input-group">
                        1 - Energia elétrica&nbsp;<input type="number" class="form-control" min="0" step="1">
                        <span class="input-group-sm">
                            <button type="button" class="btn btn-default">,00</button>
                        </span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <input type="checkbox" class="check" :value="0">&nbsp;0 - Não tem<br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="input-group">
                        2 - Água e esgoto&nbsp;<input type="number" class="form-control" min="0" step="1">
                        <span class="input-group-sm">
                            <button type="button" class="btn btn-default">,00</button>
                        </span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <input type="checkbox" class="check" :value="0">&nbsp;0 - Não tem<br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="input-group">
                        <p class="p-0">3 -  Gás, carvão e lenha</p><input type="number" class="form-control" min="0" step="1">
                        <span class="input-group-sm">
                            <button type="button" class="btn btn-default">,00</button>
                        </span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <input type="checkbox" class="check" :value="0">&nbsp;0 - Não tem<br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="input-group">
                        <p class="p-0">4 - Alimentação, higiene e limpeza</p><input type="number" class="form-control" min="0" step="1">
                        <span class="input-group-sm">
                            <button type="button" class="btn btn-default">,00</button>
                        </span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <input type="checkbox" class="check" :value="0">&nbsp;0 - Não tem<br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="input-group">
                        <p class="p-0">5 - Transporte</p><input type="number" class="form-control" min="0" step="1">
                        <span class="input-group-sm">
                            <button type="button" class="btn btn-default">,00</button>
                        </span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <input type="checkbox" class="check" :value="0">&nbsp;0 - Não tem<br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="input-group">
                        <p class="p-0">6 - Aluguel</p><input type="number" class="form-control" min="0" step="1">
                        <span class="input-group-sm">
                            <button type="button" class="btn btn-default">,00</button>
                        </span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <input type="checkbox" class="check" :value="0">&nbsp;0 - Não tem<br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="input-group">
                        <p class="p-0">7 - Medicamentos de uso regular</p><input type="number" class="form-control" min="0" step="1">
                        <span class="input-group-sm">
                            <button type="button" class="btn btn-default">,00</button>
                        </span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <input type="checkbox" class="check" :value="0">&nbsp;0 - Não tem<br>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.11 - Nome e código do Estabelecimento de Assistência à Saúde - EAS/MS em que os membros da família são atendidos quando necessitam:</label>
            <input type="text" class="form-control" maxlength="100">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="text" class="form-control" maxlength="100">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.12 - Nome e código do Centro de Referência da Assistência Social (CRAS/CREAS) em que os membros da família são atendidos quando necessitam:</label>
            <input type="text" class="form-control" maxlength="100">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="text" class="form-control" maxlength="100">
        </div>
    </div>
</template>

<script>
    export default {
        name: "Domicilio_old",
        data(){
            return{
                cd_ibge: null,
                cod_familiar_fam: null,
                dat_cadastramento_fam: null,
                dat_atual_fam: null,
                cod_est_cadastral_fam: null,
                cod_forma_coleta_fam: null,
                dta_entrevista_fam: null,
                nom_localidade_fam: null,
                nom_tip_logradouro_fam: null,
                nom_titulo_logradouro_fam: null,
                nom_logradouro_fam: null,
                num_logradouro_fam: null,
                des_complemento_fam: null,
                des_complemento_adic_fam: null,
                num_cep_logradouro_fam: null,
                cod_unidade_territorial_fam: null,
                nom_unidade_territorial_fam: null,
                txt_referencia_local_fam: null,
                nom_entrevistador_fam: null,
                num_cpf_entrevistador_fam: null,
                vlr_renda_media_fam: null,
                fx_rfpc: null,
                vlr_renda_total_fam: null,
                marc_pbf: null,
                qtde_meses_desat_cat: null,
                cod_local_domic_fam: null,
                cod_especie_domic_fam: null,
                qtd_comodos_domic_fam: null,
                qtd_comodos_dormitorio_fam: null,
                cod_material_piso_fam: null,
                cod_material_domic_fam: null,
                cod_agua_canalizada_fam: null,
                cod_abaste_agua_domic_fam: null,
                cod_banheiro_domic_fam: null,
                cod_escoa_sanitario_domic_fam: null,
                cod_destino_lixo_domic_fam: null,
                cod_iluminacao_domic_fam: null,
                cod_calcamento_domic_fam: null,
                cod_familia_indigena_fam: null,
                cod_povo_indigena_fam: null,
                nom_povo_indigena_fam: null,
                cod_indigena_reside_fam: null,
                cod_reserva_indigena_fam: null,
                nom_reserva_indigena_fam: null,
                ind_familia_quilombola_fam: null,
                cod_comunidade_quilombola_fam: null,
                nom_comunidade_quilombola_fam: null,
                qtd_pessoas_domic_fam: null,
                qtd_familias_domic_fam: null,
                qtd_pessoa_inter_0_17_anos_fam: null,
                qtd_pessoa_inter_18_64_anos_fam: null,
                qtd_pessoa_inter_65_anos_fam: null,
                val_desp_energia_fam: null,
                val_desp_agua_esgoto_fam: null,
                val_desp_gas_fam: null,
                val_desp_alimentacao_fam: null,
                val_desp_transpor_fam: null,
                val_desp_aluguel_fam: null,
                val_desp_medicamentos_fam: null,
                nom_estab_assist_saude_fam: null,
                cod_eas_fam: null,
                nom_centro_assist_fam: null,
                cod_centro_assist_fam: null,
                num_ddd_contato_1_fam: null,
                num_tel_contato_1_fam: null,
                ic_tipo_contato_1_fam: null,
                ic_envo_sms_contato_1_fam: null,
                num_tel_contato_2_fam: null,
                num_ddd_contato_2_fam: null,
                ic_tipo_contato_2_fam: null,
                ic_envo_sms_contato_2_fam: null,
                cod_cta_energ_unid_consum_fam: null,
                ind_parc_mds_fam: null,
                ref_cad: null,
                ref_pbf: null,
            }
        }
    }
</script>

<style scoped>

</style>