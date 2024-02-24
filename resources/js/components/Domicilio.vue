<template>
    <br/>
    <div class="row">
        <h5>1 - IDENTIFICAÇÃO E CONTROLE</h5>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>Código IBGE</label>
            <input class="form-control" type="number" step="1" v-model="domicilioArr.cd_ibge">
        </div>
        <div class="col-sm-3">
            <label>1.01 - Código Familiar</label>
            <input class="form-control" type="number" step="1" v-model="domicilioArr.cod_familiar_fam">
        </div>
        <div class="col-sm-3">
            <label>Data do cadastramento</label>
            <input class="form-control" type="date" step="1" v-model="domicilioArr.dat_cadastramento_fam">
        </div>
        <div class="col-sm-3">
            <label>Data da atualização</label>
            <input class="form-control" type="date" step="1" v-model="domicilioArr.dat_atual_fam">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label>Forma de coleta de informações</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="1" v-model="domicilioArr.cod_forma_coleta_fam">&nbsp;Inclusão
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="2" v-model="domicilioArr.cod_forma_coleta_fam">&nbsp;Alteração
        </div>
    </div>
    <div class="row">
        <hr/>
        <h5>ENDEREÇO FAMILIAR</h5>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>Tipo de Localidade</label>
            <input type="text" class="form-control" v-model="domicilioArr.nom_localidade_fam">
        </div>
        <div class="col-sm-4">
            <label>Tipo de logradouro</label>
            <input type="text" class="form-control" v-model="domicilioArr.nom_tip_logradouro_fam">
        </div>
        <div class="col-sm-4">
            <label>Nome do logradouro</label>
            <input type="text" class="form-control" v-model="domicilioArr.nom_logradouro_fam">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>1.15 - Número</label>
            <input type="number" class="form-control" step="1" min="0" v-model="domicilioArr.num_logradouro_fam">
        </div>
        <div class="col-sm-8">
            <label>1.16 - Complemento do número (s/n°, km, A, FUNASA, SUCAM, ext.)</label>
            <input type="text" class="form-control" v-model="domicilioArr.des_complemento_fam">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <label>1.17 - Complemento adicional</label>
            <input type="text" class="form-control" v-model="domicilioArr.des_complemento_adic_fam">
        </div>
        <div class="col-sm-4">
            <label>1.18 - CEP</label>
            <input type="text" class="form-control" mask="'##.###-###'" v-model="domicilioArr.num_cep_logradouro_fam">
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
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <input type="radio" :value="1" v-model="domicilioArr.cod_unidade_territorial_fam">&nbsp;Urbanas
                </div>
                <div class="col-sm-2">
                    <input type="radio" :value="2" v-model="domicilioArr.cod_unidade_territorial_fam">&nbsp;Rurais
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.02 - Espécie do domicílio</label>
                    <div>
                        <input type="radio" :value="1" v-model="domicilioArr.cod_especie_domic_fam">&nbsp;Particular permanente<br>
                        <input type="radio" :value="2" v-model="domicilioArr.cod_especie_domic_fam">&nbsp;Particular improvisado<br>
                        <input type="radio" :value="3" v-model="domicilioArr.cod_especie_domic_fam">&nbsp;Coletivo
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.03 - Quantos cômodos</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <input type="number" class="form-control" step="1" min="1" v-model="domicilioArr.qtd_comodos_domic_fam">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.04 - Cômodos como dormitório</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <input type="number" class="form-control" step="1" min="1" v-model="domicilioArr.qtd_comodos_dormitorio_fam">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.05 - Material predominante (piso)</label>
                    <div>
                        <input type="radio" class="radio" :value="1" v-model="domicilioArr.cod_material_piso_fam">&nbsp;Terra<br>
                        <input type="radio" class="radio" :value="2" v-model="domicilioArr.cod_material_piso_fam">&nbsp;Cimento<br>
                        <input type="radio" class="radio" :value="3" v-model="domicilioArr.cod_material_piso_fam">&nbsp;Madeira aproveitada<br>
                        <input type="radio" class="radio" :value="4" v-model="domicilioArr.cod_material_piso_fam">&nbsp;Madeira aparelhada<br>
                        <input type="radio" class="radio" :value="5" v-model="domicilioArr.cod_material_piso_fam">&nbsp;Cerâmica, lajota ou pedra<br>
                        <input type="radio" class="radio" :value="6" v-model="domicilioArr.cod_material_piso_fam">&nbsp;Carpete<br>
                        <input type="radio" class="radio" :value="7" v-model="domicilioArr.cod_material_piso_fam">&nbsp;Outro material<br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.06 - Material predominante (parede)</label>
                    <div>
                        <input type="radio" class="radio" :value="1" v-model="domicilioArr.cod_material_domic_fam">&nbsp;Alvenaria/tijolo com revestimento<br>
                        <input type="radio" class="radio" :value="2" v-model="domicilioArr.cod_material_domic_fam">&nbsp;Alvenaria/tijolo sem revestimento<br>
                        <input type="radio" class="radio" :value="3" v-model="domicilioArr.cod_material_domic_fam">&nbsp;Madeira aparelhada<br>
                        <input type="radio" class="radio" :value="4" v-model="domicilioArr.cod_material_domic_fam">&nbsp;Taipa revestida<br>
                        <input type="radio" class="radio" :value="5" v-model="domicilioArr.cod_material_domic_fam">&nbsp;Taipa não-revestida<br>
                        <input type="radio" class="radio" :value="6" v-model="domicilioArr.cod_material_domic_fam">&nbsp;Madeira aproveitada<br>
                        <input type="radio" class="radio" :value="7" v-model="domicilioArr.cod_material_domic_fam">&nbsp;Palha<br>
                        <input type="radio" class="radio" :value="8" v-model="domicilioArr.cod_material_domic_fam">&nbsp;Outro material<br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.07 - Água canalizada (em um ou mais cômodos)</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <input type="radio" class="radio" :value="1" v-model="domicilioArr.cod_agua_canalizada_fam">&nbsp;Sim
                </div>
                <div class="col-sm-3">
                    <input type="radio" class="radio" :value="2" v-model="domicilioArr.cod_agua_canalizada_fam">&nbsp;Não
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <label>2.08 - Forma de abastecimento</label>
                    <div>
                        <input type="radio" :value="1" v-model="domicilioArr.cod_abaste_agua_domic_fam">&nbsp;Rede geral de distribuição<br>
                        <input type="radio" :value="2" v-model="domicilioArr.cod_abaste_agua_domic_fam">&nbsp;Poço ou nascente<br>
                        <input type="radio" :value="3" v-model="domicilioArr.cod_abaste_agua_domic_fam">&nbsp;Cisterna<br>
                        <input type="radio" :value="4" v-model="domicilioArr.cod_abaste_agua_domic_fam">&nbsp;Outra forma<br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.09 - Tem banheiro sanitário</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <input type="radio" :value="1" v-model="domicilioArr.cod_banheiro_domic_fam">&nbsp;Sim
                </div>
                <div class="col-sm-3">
                    <input type="radio" :value="2" v-model="domicilioArr.cod_banheiro_domic_fam">&nbsp;Não
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.10 - Forma de escoamento do banheiro sanitário</label>
                    <div>
                        <input type="radio" :value="1" v-model="domicilioArr.cod_escoa_sanitario_domic_fam">&nbsp;Rede coletora de esgoto ou pluvial<br>
                        <input type="radio" :value="2" v-model="domicilioArr.cod_escoa_sanitario_domic_fam">&nbsp;Fossa séptica<br>
                        <input type="radio" :value="3" v-model="domicilioArr.cod_escoa_sanitario_domic_fam">&nbsp;Fossa rudimentar<br>
                        <input type="radio" :value="4" v-model="domicilioArr.cod_escoa_sanitario_domic_fam">&nbsp;Vala a céu aberto<br>
                        <input type="radio" :value="5" v-model="domicilioArr.cod_escoa_sanitario_domic_fam">&nbsp;Direto para um rio, lago ou mar<br>
                        <input type="radio" :value="6" v-model="domicilioArr.cod_escoa_sanitario_domic_fam">&nbsp;Outra forma<br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.11 - Forma de coleta de lixo</label>
                    <div>
                        <input type="radio" :value="1" v-model="domicilioArr.cod_destino_lixo_domic_fam">&nbsp;É coletado diretamente<br>
                        <input type="radio" :value="2" v-model="domicilioArr.cod_destino_lixo_domic_fam">&nbsp;É coletado indiretamente<br>
                        <input type="radio" :value="3" v-model="domicilioArr.cod_destino_lixo_domic_fam">&nbsp;É queimado ou enterrado na propriedade<br>
                        <input type="radio" :value="4" v-model="domicilioArr.cod_destino_lixo_domic_fam">&nbsp;É jogado em terreno baldio ou logradouro(rua, avenida, etc)<br>
                        <input type="radio" :value="5" v-model="domicilioArr.cod_destino_lixo_domic_fam">&nbsp;É jogado em rio, lago ou mar<br>
                        <input type="radio" :value="6" v-model="domicilioArr.cod_destino_lixo_domic_fam">&nbsp;tem outro destino<br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.12 - Forma de iluminação</label>
                    <div>
                        <input type="radio" :value="1" v-model="domicilioArr.cod_iluminacao_domic_fam">&nbsp;Elétrica com medidor próprio<br>
                        <input type="radio" :value="2" v-model="domicilioArr.cod_iluminacao_domic_fam">&nbsp;Elétrica com medidor comunitário<br>
                        <input type="radio" :value="3" v-model="domicilioArr.cod_iluminacao_domic_fam">&nbsp;Elétrica sem medidor<br>
                        <input type="radio" :value="4" v-model="domicilioArr.cod_iluminacao_domic_fam">&nbsp;Óleo, querosene ou gás<br>
                        <input type="radio" :value="5" v-model="domicilioArr.cod_iluminacao_domic_fam">&nbsp;Vela<br>
                        <input type="radio" :value="6" v-model="domicilioArr.cod_iluminacao_domic_fam">&nbsp;Outra forma<br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.13 - Existe calçamento/pavimentação</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <input type="radio" :value="1" v-model="domicilioArr.cod_calcamento_domic_fam">&nbsp;Total
                </div>
                <div class="col-sm-3">
                    <input type="radio" :value="2" v-model="domicilioArr.cod_calcamento_domic_fam">&nbsp;Parcial
                </div>
                <div class="col-sm-3">
                    <input type="radio" :value="3" v-model="domicilioArr.cod_calcamento_domic_fam">&nbsp;Não existe
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
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="1" v-model="domicilioArr.cod_familia_indigena_fam">&nbsp;Sim
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="2" v-model="domicilioArr.cod_familia_indigena_fam">&nbsp;Não
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.02 - A que povo indígena pertence a família?</label>
            <input type="text" class="form-control" maxlength="100" v-model="domicilioArr.nom_povo_indigena_fam">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.03 - A família reside em terra ou reserva indígena?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="1" v-model="domicilioArr.cod_reserva_indigena_fam">&nbsp;Sim
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="2" v-model="domicilioArr.cod_reserva_indigena_fam">&nbsp;Não
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.04 - Qual é o nome da terra ou reserva indígena?</label>
            <div>
                <input type="text" class="form-control" v-model="domicilioArr.nom_reserva_indigena_fam">
                <div>
                    <input type="checkbox" class="check" :value="2">&nbsp;Não Sabe
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.05 - A família é quilombola?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="1" v-model="domicilioArr.ind_familia_quilombola_fam">&nbsp;Sim
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="2" v-model="domicilioArr.ind_familia_quilombola_fam">&nbsp;Não
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>Qual é o nome da comunidade quilombola?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="text" class="form-control" maxlength="100" v-model="domicilioArr.nom_comunidade_quilombola_fam">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.07 - Quantas pessoas moram no seu domicílio? (Não preencher para famílias em situação de rua e famílias em domicílio coletivo)</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="number" class="form-control" min="1" step="1" v-model="domicilioArr.qtd_pessoas_domic_fam">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.08 - Quantas famílias moram no seu domicílio? (Não preencher para famílias em situação de rua e famílias em domicílio coletivo)</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="number" class="form-control" min="1" step="1" v-model="domicilioArr.qtd_familias_domic_fam">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.09 - Há alguma pessoa dessa família internada, abrigada ou privada de liberdade há 12 meses ou mais?</label>
            <div class="row">
                <div class="col-sm-12">
                    <label>1 - Criança(s) e adolescente(s) (de 0 a 17 anos)</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <input type="number" class="form-control" min="0" step="1" v-model="domicilioArr.qtd_pessoa_inter_0_17_anos_fam">
                </div>
                <div class="col-sm-2">
                    0 - Não tem<br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2 - Jovem(ns) e adulto(s) (de 18 a 64 anos)</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <input type="number" class="form-control" min="0" step="1" v-model="domicilioArr.qtd_pessoa_inter_18_64_anos_fam">
                </div>
                <div class="col-sm-2">
                    0 - Não tem
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>3 - Idoso(s) (de 65 anos ou mais)</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <input type="number" class="form-control" min="0" step="1" v-model="domicilioArr.qtd_pessoa_inter_65_anos_fam">
                </div>
                <div class="col-sm-2">
                    0 - Não tem
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
            <label>Nº ordem</label>
        </div>
        <div class="col-sm-3">
            <label>Nome da pessoa</label>
        </div>
        <div class="col-sm-3">
            <label>Apelido</label>
        </div>
        <div class="col-sm-3">
            <label>Data de Nascimento</label>
        </div>
    </div>
    <div v-show="(domicilioArr != null)">
        <span style="display: none;">{{tOrdem = 1}}</span>
        <div v-for="row in domicilioArr.pessoa">
            <div class="row">
                <div class="col-sm-1">
                    <button type="button" class="btn btn-primary" @click="getRec(row.pessoa_id)">&nbsp;{{tOrdem}}&nbsp;</button>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" :disabled="disabled" :value="row.nom_pessoa">
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" :disabled="disabled" :value="row.nom_apelido_pessoa">
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" :disabled="disabled" :value="(row.dta_nasc_pessoa != null ? row.dta_nasc_pessoa.split('-').reverse().join('/') : '')">
                </div>
            </div>
            <span style="display:  none;">{{tOrdem++}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.10 - A família, normalmente, tem despesa mensal com:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>1 - Energia elétrica</label>
        </div>
        <div class="col-sm-2">
            <input type="number" class="form-control" min="0" step="1" v-model="domicilioArr.val_desp_energia_fam">
        </div>
        <div class="col-sm-2">
            0 - Não tem
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>2 - Água e esgoto</label>
        </div>
        <div class="col-sm-2">
            <input type="number" class="form-control" min="0" step="1" v-model="domicilioArr.val_desp_agua_esgoto_fam">
        </div>
        <div class="col-sm-2">
            0 - Não tem
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>3 -  Gás, carvão e lenha</label>
        </div>
        <div class="col-sm-2">
            <input type="number" class="form-control" min="0" step="1" v-model="domicilioArr.val_desp_gas_fam">
        </div>
        <div class="col-sm-2">
            0 - Não tem
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>4 - Alimentação, higiene e limpeza</label>
        </div>
        <div class="col-sm-2">
            <input type="number" class="form-control" min="0" step="1" v-model="domicilioArr.val_desp_alimentacao_fam">
        </div>
        <div class="col-sm-2">
            0 - Não tem
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>5 - Transporte</label>
        </div>
        <div class="col-sm-2">
            <input type="number" class="form-control" min="0" step="1" v-model="domicilioArr.val_desp_transpor_fam">
        </div>
        <div class="col-sm-2">
            0 - Não tem
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>6 - Aluguel</label>
        </div>
        <div class="col-sm-2">
            <input type="number" class="form-control" min="0" step="1" v-model="domicilioArr.val_desp_aluguel_fam">
        </div>
        <div class="col-sm-2">
            0 - Não tem
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>7 - Medicamentos de uso regular</label>
        </div>
        <div class="col-sm-3">
            <input type="number" class="form-control" min="0" step="1" v-model="domicilioArr.val_desp_medicamentos_fam">
        </div>
        <div class="col-sm-2">
            0 - Não tem
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.11 - Nome e código do Estabelecimento de Assistência à Saúde - EAS/MS em que os membros da família são atendidos quando necessitam:</label>
            <input type="text" class="form-control" maxlength="100" v-model="domicilioArr.nom_estab_assist_saude_fam">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="text" class="form-control" maxlength="100" v-model="domicilioArr.cod_eas_fam">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3.12 - Nome e código do Centro de Referência da Assistência Social (CRAS/CREAS) em que os membros da família são atendidos quando necessitam:</label>
            <input type="text" class="form-control" maxlength="100" v-model="domicilioArr.nom_centro_assist_fam">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="text" class="form-control" maxlength="100" v-model="domicilioArr.cod_centro_assist_fam">
        </div>
    </div>
    <Pessoa :pessoa="(domicilioArr.pessoa[ordem] != null ? domicilioArr.pessoa[ordem] : pessoa)"></Pessoa>
    <br/>
    <div class="form-row">
        <div class="col-sm-12" style="text-align: right">
            <button type="button" class="btn btn-primary" @click="salvar">&nbsp;Salvar&nbsp;</button>
            <button type="submit" class="btn btn-default" >&nbsp;Novo&nbsp;</button>
        </div>
    </div>

</template>

<script>

    import Pessoa from "./Pessoa";
    export default {
        name: "Domicilio",
        components: {Pessoa},
        data() {
            return {
                ordem: 0,
                disabled: true,
                pessoa: {
                    pessoa_id: null,
                    domicilio_id: null,
                    cod_familiar_fam: null,
                    cod_est_cadastral_memb: null,
                    ind_trabalho_infantil_pessoa: null,
                    nom_pessoa: null,
                    num_nis_pessoa_atual: null,
                    nom_apelido_pessoa: null,
                    cod_sexo_pessoa: null,
                    dta_nasc_pessoa: null,
                    cod_parentesco_rf_pessoa: null,
                    cod_raca_cor_pessoa: null,
                    nom_completo_mae_pessoa: null,
                    nom_completo_pai_pessoa: null,
                    cod_local_nascimento_pessoa: null,
                    sig_uf_munic_nasc_pessoa: null,
                    nom_ibge_munic_nasc_pessoa: null,
                    cod_ibge_munic_nasc_pessoa: null,
                    nom_pais_origem_pessoa: null,
                    cod_pais_origem_pessoa: null,
                    cod_certidao_registrada_pessoa: null,
                    fx_idade: null,
                    marc_pbf: null,
                    cod_certidao_civil_pessoa: null,
                    cod_livro_termo_certid_pessoa: null,
                    cod_folha_termo_certid_pessoa: null,
                    cod_termo_matricula_certid_pessoa: null,
                    nom_munic_certid_pessoa: null,
                    cod_ibge_munic_certid_pessoa: null,
                    cod_cartorio_certid_pessoa: null,
                    num_cpf_pessoa: null,
                    num_identidade_pessoa: null,
                    cod_complemento_pessoa: null,
                    dta_emissao_ident_pessoa: null,
                    sig_uf_ident_pessoa: null,
                    sig_orgao_emissor_pessoa: null,
                    num_cart_trab_prev_soc_pessoa: null,
                    num_serie_trab_prev_soc_pessoa: null,
                    dta_emissao_cart_trab_pessoa: null,
                    sig_uf_cart_trab_pessoa: null,
                    num_titulo_eleitor_pessoa: null,
                    num_zona_tit_eleitor_pessoa: null,
                    num_secao_tit_eleitor_pessoa: null,
                    cod_deficiencia_memb: null,
                    ind_def_cegueira_memb: null,
                    ind_def_baixa_visao_memb: null,
                    ind_def_surdez_profunda_memb: null,
                    ind_def_surdez_leve_memb: null,
                    ind_def_fisica_memb: null,
                    ind_def_mental_memb: null,
                    ind_def_sindrome_down_memb: null,
                    ind_def_transtorno_mental_memb: null,
                    ind_ajuda_nao_memb: null,
                    ind_ajuda_familia_memb: null,
                    ind_ajuda_especializado_memb: null,
                    ind_ajuda_vizinho_memb: null,
                    ind_ajuda_instituicao_memb: null,
                    ind_ajuda_outra_memb: null,
                    cod_sabe_ler_escrever_memb: null,
                    ind_frequenta_escola_memb: null,
                    nom_escola_memb: null,
                    cod_escola_local_memb: null,
                    sig_uf_escola_memb: null,
                    nom_munic_escola_memb: null,
                    cod_ibge_munic_escola_memb: null,
                    cod_censo_inep_memb: null,
                    cod_curso_frequenta_memb: null,
                    cod_ano_serie_frequenta_memb: null,
                    cod_curso_frequentou_pessoa_memb: null,
                    cod_ano_serie_frequentou_memb: null,
                    cod_concluiu_frequentou_memb: null,
                    grau_instrucao: null,
                    cod_trabalhou_memb: null,
                    cod_afastado_trab_memb: null,
                    cod_agricultura_trab_memb: null,
                    cod_principal_trab_memb: null,
                    val_remuner_emprego_memb: null,
                    cod_trabalho_12_meses_memb: null,
                    qtd_meses_12_meses_memb: null,
                    val_renda_bruta_12_meses_memb: null,
                    val_renda_doacao_memb: null,
                    val_renda_aposent_memb: null,
                    val_renda_seguro_desemp_memb: null,
                    val_renda_pensao_alimen_memb: null,
                    val_outras_rendas_memb: null,
                    marc_sit_rua: null,
                    ind_dormir_rua_memb: null,
                    qtd_dormir_freq_rua_memb: null,
                    ind_dormir_albergue_memb: null,
                    qtd_dormir_freq_albergue_memb: null,
                    ind_dormir_dom_part_memb: null,
                    qtd_dormir_freq_dom_part_memb: null,
                    ind_outro_memb: null,
                    qtd_freq_outro_memb: null,
                    cod_tempo_rua_memb: null,
                    ind_motivo_perda_memb: null,
                    ind_motivo_ameaca_memb: null,
                    ind_motivo_probs_fam_memb: null,
                    ind_motivo_alcool_memb: null,
                    ind_motivo_desemprego_memb: null,
                    ind_motivo_trabalho_memb: null,
                    ind_motivo_saude_memb: null,
                    ind_motivo_pref_memb: null,
                    ind_motivo_outro_memb: null,
                    ind_motivo_nao_sabe_memb: null,
                    ind_motivo_nao_resp_memb: null,
                    cod_tempo_cidade_memb: null,
                    cod_vive_fam_rua_memb: null,
                    cod_contato_parente_memb: null,
                    ind_ativ_com_escola_memb: null,
                    ind_ativ_com_coop_memb: null,
                    ind_ativ_com_mov_soc_memb: null,
                    ind_ativ_com_nao_sabe_memb: null,
                    ind_ativ_com_nao_resp_memb: null,
                    ind_atend_cras_memb: null,
                    ind_atend_creas_memb: null,
                    ind_atend_centro_ref_rua_memb: null,
                    ind_atend_inst_gov_memb: null,
                    ind_atend_inst_nao_gov_memb: null,
                    ind_atend_hospital_geral_memb: null,
                    cod_cart_assinada_memb: null,
                    ind_dinh_const_memb: null,
                    ind_dinh_flanelhinha_memb: null,
                    ind_dinh_carregador_memb: null,
                    ind_dinh_catador_memb: null,
                    ind_dinh_servs_gerais_memb: null,
                    ind_dinh_pede_memb: null,
                    ind_dinh_vendas_memb: null,
                    ind_dinh_outro_memb: null,
                    ind_dinh_nao_resp_memb: null,
                    ind_atend_nenhum_memb: null,
                    ref_cad: null,
                    ref_pbf: null,
                    ordem: 0,
                },
                domicilio: this.domicilioArr,
            }
        },
        props: {
            domicilioArr: {
                domicilio_id: null,
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
                qtd_pessoas_domic_fam: 0,
                qtd_familias_domic_fam: 0,
                qtd_pessoa_inter_0_17_anos_fam: 0,
                qtd_pessoa_inter_18_64_anos_fam: 0,
                qtd_pessoa_inter_65_anos_fam: 0,
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
                tipo_bairro_id: null,
                tipo_povoado_id: null,
                cidade:{
                    cidade_capital: null,
                    cidade_cnpj: null,
                    cidade_end: null,
                    cidade_end_cep: null,
                    cidade_end_comp: null,
                    cidade_end_num: null,
                    cidade_ibge: null,
                    cidade_id: null,
                    cidade_nome: null,
                    cidade_sta: null,
                    uf_sigla: null,
                },
                pessoa: [{
                    pessoa_id: null,
                    domicilio_id: null,
                    cod_familiar_fam: null,
                    cod_est_cadastral_memb: null,
                    ind_trabalho_infantil_pessoa: null,
                    nom_pessoa: null,
                    num_nis_pessoa_atual: null,
                    nom_apelido_pessoa: null,
                    cod_sexo_pessoa: null,
                    dta_nasc_pessoa: null,
                    cod_parentesco_rf_pessoa: null,
                    cod_raca_cor_pessoa: null,
                    nom_completo_mae_pessoa: null,
                    nom_completo_pai_pessoa: null,
                    cod_local_nascimento_pessoa: null,
                    sig_uf_munic_nasc_pessoa: null,
                    nom_ibge_munic_nasc_pessoa: null,
                    cod_ibge_munic_nasc_pessoa: null,
                    nom_pais_origem_pessoa: null,
                    cod_pais_origem_pessoa: null,
                    cod_certidao_registrada_pessoa: null,
                    fx_idade: null,
                    marc_pbf: null,
                    cod_certidao_civil_pessoa: null,
                    cod_livro_termo_certid_pessoa: null,
                    cod_folha_termo_certid_pessoa: null,
                    cod_termo_matricula_certid_pessoa: null,
                    nom_munic_certid_pessoa: null,
                    cod_ibge_munic_certid_pessoa: null,
                    cod_cartorio_certid_pessoa: null,
                    num_cpf_pessoa: null,
                    num_identidade_pessoa: null,
                    cod_complemento_pessoa: null,
                    dta_emissao_ident_pessoa: null,
                    sig_uf_ident_pessoa: null,
                    sig_orgao_emissor_pessoa: null,
                    num_cart_trab_prev_soc_pessoa: null,
                    num_serie_trab_prev_soc_pessoa: null,
                    dta_emissao_cart_trab_pessoa: null,
                    sig_uf_cart_trab_pessoa: null,
                    num_titulo_eleitor_pessoa: null,
                    num_zona_tit_eleitor_pessoa: null,
                    num_secao_tit_eleitor_pessoa: null,
                    cod_deficiencia_memb: null,
                    ind_def_cegueira_memb: null,
                    ind_def_baixa_visao_memb: null,
                    ind_def_surdez_profunda_memb: null,
                    ind_def_surdez_leve_memb: null,
                    ind_def_fisica_memb: null,
                    ind_def_mental_memb: null,
                    ind_def_sindrome_down_memb: null,
                    ind_def_transtorno_mental_memb: null,
                    ind_ajuda_nao_memb: null,
                    ind_ajuda_familia_memb: null,
                    ind_ajuda_especializado_memb: null,
                    ind_ajuda_vizinho_memb: null,
                    ind_ajuda_instituicao_memb: null,
                    ind_ajuda_outra_memb: null,
                    cod_sabe_ler_escrever_memb: null,
                    ind_frequenta_escola_memb: null,
                    nom_escola_memb: null,
                    cod_escola_local_memb: null,
                    sig_uf_escola_memb: null,
                    nom_munic_escola_memb: null,
                    cod_ibge_munic_escola_memb: null,
                    cod_censo_inep_memb: null,
                    cod_curso_frequenta_memb: null,
                    cod_ano_serie_frequenta_memb: null,
                    cod_curso_frequentou_pessoa_memb: null,
                    cod_ano_serie_frequentou_memb: null,
                    cod_concluiu_frequentou_memb: null,
                    grau_instrucao: null,
                    cod_trabalhou_memb: null,
                    cod_afastado_trab_memb: null,
                    cod_agricultura_trab_memb: null,
                    cod_principal_trab_memb: null,
                    val_remuner_emprego_memb: null,
                    cod_trabalho_12_meses_memb: null,
                    qtd_meses_12_meses_memb: null,
                    val_renda_bruta_12_meses_memb: null,
                    val_renda_doacao_memb: null,
                    val_renda_aposent_memb: null,
                    val_renda_seguro_desemp_memb: null,
                    val_renda_pensao_alimen_memb: null,
                    val_outras_rendas_memb: null,
                    marc_sit_rua: null,
                    ind_dormir_rua_memb: null,
                    qtd_dormir_freq_rua_memb: null,
                    ind_dormir_albergue_memb: null,
                    qtd_dormir_freq_albergue_memb: null,
                    ind_dormir_dom_part_memb: null,
                    qtd_dormir_freq_dom_part_memb: null,
                    ind_outro_memb: null,
                    qtd_freq_outro_memb: null,
                    cod_tempo_rua_memb: null,
                    ind_motivo_perda_memb: null,
                    ind_motivo_ameaca_memb: null,
                    ind_motivo_probs_fam_memb: null,
                    ind_motivo_alcool_memb: null,
                    ind_motivo_desemprego_memb: null,
                    ind_motivo_trabalho_memb: null,
                    ind_motivo_saude_memb: null,
                    ind_motivo_pref_memb: null,
                    ind_motivo_outro_memb: null,
                    ind_motivo_nao_sabe_memb: null,
                    ind_motivo_nao_resp_memb: null,
                    cod_tempo_cidade_memb: null,
                    cod_vive_fam_rua_memb: null,
                    cod_contato_parente_memb: null,
                    ind_ativ_com_escola_memb: null,
                    ind_ativ_com_coop_memb: null,
                    ind_ativ_com_mov_soc_memb: null,
                    ind_ativ_com_nao_sabe_memb: null,
                    ind_ativ_com_nao_resp_memb: null,
                    ind_atend_cras_memb: null,
                    ind_atend_creas_memb: null,
                    ind_atend_centro_ref_rua_memb: null,
                    ind_atend_inst_gov_memb: null,
                    ind_atend_inst_nao_gov_memb: null,
                    ind_atend_hospital_geral_memb: null,
                    cod_cart_assinada_memb: null,
                    ind_dinh_const_memb: null,
                    ind_dinh_flanelhinha_memb: null,
                    ind_dinh_carregador_memb: null,
                    ind_dinh_catador_memb: null,
                    ind_dinh_servs_gerais_memb: null,
                    ind_dinh_pede_memb: null,
                    ind_dinh_vendas_memb: null,
                    ind_dinh_outro_memb: null,
                    ind_dinh_nao_resp_memb: null,
                    ind_atend_nenhum_memb: null,
                    ref_cad: null,
                    ref_pbf: null,
                    ordem: null,
                    email: null,
                }],
                ordem: 1,

            },
        },
        methods: {

            salvar() {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'domicilio/store',
                    data: {
                        domicilio: this.domicilioArr,
                    }
                }).then(response => {

                    let data = response.data[0];

                    if (data.erro === 1) {

                        alertify.success(data.mensagem);

                        location.reload();

                        return;

                    }

                    alertify.error(data.mensagem);

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for (const key in itens['errors']) {

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },

            getRec(temp = 0){

                let pessoaIndex = this.domicilioArr.pessoa.findIndex(e=>{

                    return e.pessoa_id == temp;

                });

                if(pessoaIndex != -1) {
                    this.ordem = pessoaIndex;
                    this.domicilioArr.pessoa[pessoaIndex].ordem = (pessoaIndex + 1);
                }
                else
                    this.ordem = 0;

            }
        }

    }
</script>

<style scoped>
    label{
        font-weight: bold;
    }
    h5{

        font-weight: bold;
        text-align: center;
    }

</style>