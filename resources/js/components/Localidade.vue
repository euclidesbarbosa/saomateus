<template>
    <div class="container">
        <hr>
        <h3>Responsável</h3>
        <hr>
        <span id="element-to-pdf">
        <div class="row">
            <div class="col-sm-4">
                <label>CPF</label>
                <div class="input-group">
                    <input type="text" class="form-control" v-model="pessoa.cpf"
                           v-mask="'###.###.###-##'" placeholder="xxx.xxx.xxx-xx">
                    <span class="input-group-sm">
                        <button type="button" class="btn btn-default" @click="getRec(null)">
                            <img src="/storage/icones/buscar.png" style="width: 25px;">
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <label>Nome completo</label>
                <input type="text" class="form-control" v-model="pessoa.nom_pessoa" disabled="disabled">
            </div>
            <div class="col-sm-4">
                <label>Apelido</label>
                <input type="text" class="form-control" v-model="pessoa.nom_apelido_pessoa" disabled="disabled">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <label>Endereço</label>
                <input type="text" class="form-control" v-model="pessoa.domicilio.end" disabled="disabled">
            </div>
            <div class="col-sm-2">
                <label>Número</label>
                <input type="text" class="form-control" v-model="pessoa.domicilio.end_num" disabled="disabled">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>Complemento</label>
                <input type="text" class="form-control" disabled="disabled">
            </div>
            <div class="col-sm-2">
                <label>Tipo localidade</label>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="radio" v-model="selTipoBairro" :value="1" disabled="disabled">&nbsp;Bairro
                    </div>
                    <div class="col-sm-6">
                        <input type="radio" v-model="selTipoBairro" :value="2" disabled="disabled">&nbsp;Povoado
                    </div>
                </div>
            </div>
            <div class="col-sm-4" v-show="(selTipoBairro == 1)">
                <label>Bairro</label>
                <select class="form-select" v-model="pessoa.domicilio.tipo_bairro_id" disabled="disabled">
                    <option></option>
                    <option v-for="row in tipoBairro" :value="row.tipo_id">{{row.tipo_nome}}</option>
                </select>
            </div>
            <div class="col-sm-4" v-show="(selTipoBairro == 2)">
                <label>Povoado</label>
                <select class="form-select" v-model="pessoa.domicilio.tipo_povoado_id" disabled="disabled">
                    <option></option>
                    <option v-for="row in tipoPovoado" :value="row.tipo_id">{{row.tipo_nome}}</option>
                </select>
            </div>
        </div>
        <hr>
        <h3>Informações do Estabelecimento</h3>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <label>Tipo</label>
                <select class="form-select" v-model="estabelecimento.tipo_local_id">
                    <option></option>
                    <option v-for="row in tipoLocal" :value="row.tipo_id">{{row.tipo_nome}}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label>Nome</label>
                <input type="text" class="form-control" maxlength="100" v-model="estabelecimento.estabelecimento_nome">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <label>Endereço</label>
                <input type="text" class="form-control" maxlength="100" v-model="estabelecimento.estabelecimento_end">
            </div>
            <div class="col-sm-2">
                <label>Número</label>
                <input type="text" class="form-control" maxlength="10" v-model="estabelecimento.estabelecimento_end_num">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>Complemento</label>
                <input type="text" class="form-control" v-model="estabelecimento.estabelecimento_end_compl">
            </div>
            <div class="col-sm-2">
                <label>Tipo localidade</label>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="radio" v-model="selTipoBairroLocal" :value="1">&nbsp;Bairro
                    </div>
                    <div class="col-sm-6">
                        <input type="radio" v-model="selTipoBairroLocal" :value="2">&nbsp;Povoado
                    </div>
                </div>
            </div>
            <div class="col-sm-4" v-show="(selTipoBairroLocal == 1)">
                <label>Bairro</label>
                <select class="form-select" v-model="estabelecimento.tipo_bairro_id">
                    <option></option>
                    <option v-for="row in tipoBairro" :value="row.tipo_id">{{row.tipo_nome}}</option>
                </select>
            </div>
            <div class="col-sm-4" v-show="(selTipoBairroLocal == 2)">
                <label>Povoado</label>
                <select class="form-select" v-model="estabelecimento.tipo_povoado_id">
                    <option></option>
                    <option v-for="row in tipoPovoado" :value="row.tipo_id">{{row.tipo_nome}}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label>Telefone</label>
                <input type="text" class="form-control" v-mask="'(##) #####-####'" placeholder="(xx) xxxxx-xxxx"
                       v-model="estabelecimento.estabelecimento_cont_tel">
            </div>
            <div class="col-sm-4">
                <label>RG</label>
                <input type="text" class="form-control" disabled="disabled"
                       v-model="pessoa.num_identidade_pessoa">
            </div>
            <div class="col-sm-4">
                <label>Alvará</label>
                <input type="text" class="form-control"
                       v-model="estabelecimento.estabelecimento_doc_alvara">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <label>e-Mail</label>
                <input type="text" class="form-control" v-model="estabelecimento.estabelecimento_email">
            </div>
            <div class="col-sm-4">
                <label>Zona</label>
                <div class="row">
                    <div class="col-sm-4">
                        <input type="radio" class="radio" :value="1" v-model="estabelecimento.estabelecimento_localizacao">&nbsp;Urbana
                    </div>
                    <div class="col-sm-4">
                        <input type="radio" class="radio" :value="2" v-model="estabelecimento.estabelecimento_localizacao">&nbsp;Rural
                    </div>
                </div>
            </div>
        </div>
        <hr v-show="verAnexos">
        <h3 v-show="verAnexos">Anexar Documentos</h3>
        <hr v-show="verAnexos">
        <div class="row" v-show="verAnexos">
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-8 filezone">
                        <input type="file" id="files" ref="files" multiple v-on:change="handleFiles('files','preview',arrFiles)">
                        <p>Arraste e solte aqui a <b>imagem do seu estabelecimento</b><br>ou click para procurá-la</p>
                    </div>
                </div>
                <div v-for="(file, key) in arrFiles" class="file-listing">
                    <img class="preview" v-bind:ref="'preview'+parseInt(key)">{{ file.name }}
                    <div class="success-container" v-if="file.id > 0">
                        Success
                    </div>
                    <div class="remove-container" v-else>
                        <a class="remove" v-on:click="removeFile(key, arrFiles)">Remove</a>
                    </div>
                </div>
                <a class="submit-button" v-on:click="submitFiles(arrFiles, 0, 'IMAGEM DO SEU ESTABELECIMENTO')" v-show="(arrFiles ? arrFiles.length > 0 : false)">Submit</a>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-8 filezone">
                        <input type="file" id="files1" ref="files1" multiple v-on:change="handleFiles('files1','preview1',arrFiles1)">
                        <p>Arraste e solte aqui a <b>cópia do RG</b><br>ou click para procurá-la</p>
                    </div>
                </div>
                <div v-for="(file, key) in arrFiles1" class="file-listing">
                    <img class="preview" v-bind:ref="'preview1'+parseInt(key)">{{ file.name }}
                    <div class="success-container" v-if="file.id > 0">
                        Success
                    </div>
                    <div class="remove-container" v-else>
                        <a class="remove" v-on:click="removeFile(key, arrFiles1)">Remove</a>
                    </div>
                </div>
                <a class="submit-button" v-on:click="submitFiles(arrFiles1, 1, 'CÓPIA DO RG')" v-show="(arrFiles1 ? arrFiles1.length > 0 : false)">Submit</a>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-8 filezone">
                        <input type="file" id="files2" ref="files2" multiple v-on:change="handleFiles('files2', 'preview2', arrFiles2)">
                        <p>Arraste e solte aqui a <b>cópia do CPF</b><br>ou click para procurá-la</p>
                    </div>
                </div>
                <div v-for="(file, key) in arrFiles2" class="file-listing">
                    <img class="preview" v-bind:ref="'preview2'+parseInt(key)">{{ file.name }}
                    <div class="success-container" v-if="file.id > 0">
                        Success
                    </div>
                    <div class="remove-container" v-else>
                        <a class="remove" v-on:click="removeFile(key, arrFiles2)">Remove</a>
                    </div>
                </div>
                <a class="submit-button" v-on:click="submitFiles(arrFiles2, 2, 'CÓPIA DO CPF')" v-show="(arrFiles2 ? arrFiles2.length > 0 : false)">Submit</a>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-8 filezone">
                        <input type="file" id="files3" ref="files3" multiple v-on:change="handleFiles('files3', 'preview3', arrFiles3)">
                        <p>Arraste e solte aqui a <b>cópia do Comprovante de Residência</b><br>ou click para procurá-la</p>
                    </div>
                </div>
                <div v-for="(file, key) in arrFiles3" class="file-listing">
                    <img class="preview" v-bind:ref="'preview3'+parseInt(key)">{{ file.name }}
                    <div class="success-container" v-if="file.id > 0">
                        Success
                    </div>
                    <div class="remove-container" v-else>
                        <a class="remove" v-on:click="removeFile(key, arrFiles3)">Remove</a>
                    </div>
                </div>
                <a class="submit-button" v-on:click="submitFiles(arrFiles3, 3, 'CÓPIA DO COMPROVANTE DE RESIDÊNCIA')" v-show="(arrFiles3 ? arrFiles3.length > 0 : false)">Submit</a>
            </div>
        </div><br>
        <div class="row" v-show="verAnexos">
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-8 filezone">
                        <input type="file" id="files4" ref="files4" multiple v-on:change="handleFiles('files4', 'preview4', arrFiles4)">
                        <p>Arraste e solte aqui a <b>cópia do Alvará de Funcionamento</b><br>ou click para procurá-la</p>
                    </div>
                </div>
                <div v-for="(file, key) in arrFiles4" class="file-listing">
                    <img class="preview" v-bind:ref="'preview4'+parseInt(key)">{{ file.name }}
                    <div class="success-container" v-if="file.id > 0">
                        Success
                    </div>
                    <div class="remove-container" v-else>
                        <a class="remove" v-on:click="removeFile(key, arrFiles4)">Remove</a>
                    </div>
                </div>
                <a class="submit-button" v-on:click="submitFiles(arrFiles4, 4, 'CÓPIA DO ALVARÁ DE FUNCIONAMENTO')" v-show="(arrFiles4 ? arrFiles4.length > 0 : false)">Submit</a>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-8 filezone">
                        <input type="file" id="files5" ref="files5" multiple v-on:change="handleFiles('files5', 'preview5', arrFiles5)">
                        <p>Arraste e solte aqui a <b>cópia do Alvará de Funcionamento de Atividade</b><br>ou click para procurá-la</p>
                    </div>
                </div>
                <div v-for="(file, key) in arrFiles5" class="file-listing">
                    <img class="preview" v-bind:ref="'preview5'+parseInt(key)">{{ file.name }}
                    <div class="success-container" v-if="file.id > 0">
                        Success
                    </div>
                    <div class="remove-container" v-else>
                        <a class="remove" v-on:click="removeFile(key, arrFiles5)">Remove</a>
                    </div>
                </div>
                <a class="submit-button" v-on:click="submitFiles(arrFiles5, 5, 'CÓPIA DO ALVARÁ DE FUNCIONAMENTO DE ATIVIDADE')" v-show="(arrFiles5 ? arrFiles5.length > 0 : false)">Submit</a>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-8 filezone">
                        <input type="file" id="files6" ref="files6" multiple v-on:change="handleFiles('files6', 'preview6', arrFiles6)">
                        <p>Arraste e solte aqui a <b>cópia da Carteira de Vacinação</b><br>ou click para procurá-la</p>
                    </div>
                </div>
                <div v-for="(file, key) in arrFiles6" class="file-listing">
                    <img class="preview" v-bind:ref="'preview6'+parseInt(key)">{{ file.name }}
                    <div class="success-container" v-if="file.id > 0">
                        Success
                    </div>
                    <div class="remove-container" v-else>
                        <a class="remove" v-on:click="removeFile(key, arrFiles6)">Remove</a>
                    </div>
                </div>
                <a class="submit-button" v-on:click="submitFiles(arrFiles6, 6, 'CÓPIA DA CARTEIRA DE VACINAÇÃO')" v-show="(arrFiles6 ? arrFiles6.length > 0 : false)">Submit</a>
            </div>
        </div><br>
        </span>
        <div class="row">
            <div class="col-sm-12" style="text-align: right">
                <button type="button" class="btn btn-primary" @click="salvar">&nbsp;Salvar&nbsp;</button>
                <button type="button" class="btn btn-default botaonovo" @click="novo">&nbsp;Novo&nbsp;</button>
            </div>
        </div>
        <!--TABELA-->
        <div class="row">
            <div class="col-sm-12">
                <table>
                    <thead>
                    <tr>
                        <th style="width: 5%;text-align: center">ID</th>
                        <th style="text-align: left">CPF</th>
                        <th style="text-align: left">Nome</th>
                        <th style="text-align: left">Pessoa</th>
                        <th style="text-align: left">Tipo</th>
                        <th style="text-align: left">Bairro / Povoado</th>
                        <th style="text-align: center">Imp</th>
                    </tr>
                    </thead>
                    <span style="display: none">{{total = 0}}</span>
                    <tbody>
                        <tr v-for="row in tabela" >
                            <span style="display: none">{{total++}}</span>
                            <td style="text-align: center">
                                <button type="button" class="btn btn-default" @click="getRec(row.pessoa_id)">{{total}}</button>
                            </td>
                            <td style="text-align: center">{{row.pessoa.cpf}}</td>
                            <td style="text-align: left">{{row.estabelecimento_nome}}</td>
                            <td style="text-align: left">{{row.pessoa.nom_pessoa}}</td>
                            <td style="text-align: left">{{(row.tipo_local_id != null ? row.tipoLocal.tipo_nome : '')}}</td>
                            <td style="text-align: left">{{(row.tipo_bairro_id != null ? row.tipoBairro.tipo_nome: row.tipoPovoado.tipo_nome )}}</td>
                            <td style="text-align: center" title="imprimir...">
                                <button type="button" style="border: none"
                                @click="exportToPDF(row)">
                                <img src="/storage/icones/impressao.png" style="width: 25px; height: 25px" /></button>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6" style="text-align: right;padding-right: 10px">TOTAL</td>
                        <td style="text-align: center">{{total}}</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

    import axios from 'axios';
    import html2pdf from 'html2pdf.js';

    export default {
        components:{
          html2pdf
        },
        name: "Localidade",
        data(){
            return{

                estabelecimento: {
                    estabelecimento_id: null,
                    tipo_local_id: null,
                    pessoa_id: null,
                    estabelecimento_localizacao: null,
                    estabelecimento_nome: null,
                    estabelecimento_end: null,
                    estabelecimento_end_num: null,
                    estabelecimento_end_compl: null,
                    tipo_bairro_id: null,
                    tipo_povoado_id: null,
                    estabelecimento_cont_tel: null,
                    estabelecimento_doc_cnpj: null,
                    estabelecimento_doc_alvara: null,
                    estabelecimento_doc_insc_estadual: null,
                    estabelecimento_sta: null,
                    email: null,
                },

                verAnexos: 0,
                estabelecimentoTmp: {
                    estabelecimento_id: null,
                    tipo_local_id: null,
                    pessoa_id: null,
                    estabelecimento_localizacao: null,
                    estabelecimento_nome: null,
                    estabelecimento_end: null,
                    estabelecimento_end_num: null,
                    estabelecimento_end_compl: null,
                    tipo_bairro_id: null,
                    tipo_povoado_id: null,
                    estabelecimento_cont_tel: null,
                    estabelecimento_doc_cnpj: null,
                    estabelecimento_doc_alvara: null,
                    estabelecimento_doc_insc_estadual: null,
                    estabelecimento_sta: null,
                    email: null,
                },

                pessoa: {
                    pessoa_id: null,
                    domicilio_id_1: null,
                    cpf: null,
                    num_cpf_pessoa: null, //receber o cpf sem formatação
                    nom_pessoa: null,
                    nom_apelido_pessoa: null,
                    cod_sexo_pessoa: null,
                    dta_nasc_pessoa: null,
                    cod_parentesco_rf_pessoa: 1,
                    nom_completo_mae_pessoa: null,
                    nom_completo_pai_pessoa: null,
                    num_identidade_pessoa: null,
                    email: null,
                    domicilio:{
                        domicilio_id: null,
                        cd_ibge: _CIDADE_IBGE , //usado o padrão de cantanhede
                        tel_1: null,
                        tel_2: null,
                        tipo_local_id: null,
                        tipo_bairro_id: null,
                        tipo_povoado_id: null,
                        nom_tip_logradouro_fam: null,
                        nom_titulo_logradouro_fam: null,
                        nom_logradouro_fam: null,
                        num_cep_logradouro_fam: 65465000, //usado o padrão de cantanhede
                        num_logradouro_fam: null,
                        cod_local_domic_fam: null,
                    },
                    arquivos:{
                        arquivoFE: [],
                        arquivoRG: [],
                        arquivoCPF: [],
                        arquivoCR: [],
                        arquivoAF: [],
                        arquivoLFA: [],
                        arquivoCV: [],
                    }
                },
                pessoaTmp: {
                    pessoa_id: null,
                    domicilio_id_1: null,
                    cpf: null,
                    num_cpf_pessoa: null, //receber o cpf sem formatação
                    nom_pessoa: null,
                    nom_apelido_pessoa: null,
                    cod_sexo_pessoa: null,
                    dta_nasc_pessoa: null,
                    cod_parentesco_rf_pessoa: 1,
                    nom_completo_mae_pessoa: null,
                    nom_completo_pai_pessoa: null,
                    num_identidade_pessoa: null,
                    email: null,
                    domicilio:{
                        domicilio_id: null,
                        cd_ibge: _CIDADE_IBGE, //usado o padrão de cantanhede
                        tel_1: null,
                        tel_2: null,
                        tipo_local_id: null,
                        tipo_bairro_id: null,
                        tipo_povoado_id: null,
                        nom_tip_logradouro_fam: null,
                        nom_titulo_logradouro_fam: null,
                        nom_logradouro_fam: null,
                        num_cep_logradouro_fam: _CIDADE_CEP.replace('.','').replace('-',''), //usado o padrão de cantanhede
                        num_logradouro_fam: null,
                        cod_local_domic_fam: null,
                    },
                    arquivos:{
                        arquivoFE: [],
                        arquivoRG: [],
                        arquivoCPF: [],
                        arquivoCR: [],
                        arquivoAF: [],
                        arquivoLFA: [],
                        arquivoCV: [],
                    }
                },

                tipoLocal: [],
                tipoBairro: [],
                tipoPovoado: [],
                tabela: [],

                selTipoBairro: 1,
                selTipoBairroLocal: 1,

                files: null,
                files1: null,
                files2: null,
                files3: null,
                files4: null,
                files5: null,
                files6: null,

                arrFiles: [],
                arrFiles1: [],
                arrFiles2: [],
                arrFiles3: [],
                arrFiles4: [],
                arrFiles5: [],
                arrFiles6: [],
            }
        },
        methods:{
            salvar(){

                if(!confirm('Enviar informações?')){

                    return;

                }

                if(this.pessoa.cpf != null && this.pessoa.cpf != ''){

                    this.pessoa.num_cpf_pessoa = this.pessoa.cpf.replace('.','').replace('-','');

                }

                if(this.selTipoBairroLocal == 1){
                    this.estabelecimento.tipo_povoado_id = null;
                }
                else{
                    this.estabelecimento.tipo_bairro_id = null;
                }

                this.estabelecimento.pessoa_id = this.pessoa.pessoa_id;

                axios({
                    method: 'POST',
                    url: _BASE_URL+'estabelecimento/store',
                    data:{
                        estabelecimento: this.estabelecimento,
                    }

                }).then(response => {

                    let data = response.data[0];

                    if(data.erro == 1){

                        this.novo();

                        this.getPreencher();

                        alertify.success(data.mensagem);

                        return;
                    }

                    alertify.error(data.mensagem);

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            getPreencher(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'estabelecimento/listar',
                }).then(response => {

                    let data = response.data.data;

                    this.tabela = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },

            novo(){

                this.verAnexos = 0;

                this.estabelecimento = this.estabelecimentoTmp;

                this.pessoa = this.pessoaTmp;

            },
            getRec(id = null){

                if(id != null){

                    this.pessoa = this.pessoaTmp;

                    this.estabelecimento = this.estabelecimentoTmp;

                    this.pessoa.pessoa_id = id;

                }

                if(this.pessoa.cpf == null && this.pessoa.pessoa_id == null)
                    return;

                axios({
                    method: 'POST',
                    url: _BASE_URL+'pessoa/listarP2',
                    data:{
                        pessoa: this.pessoa,
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.pessoa = data[0];

                    if(this.pessoa.domicilio.end == null){

                        this.pessoa.domicilio.end = this.pessoa.domicilio.nom_logradouro_fam;

                        this.pessoa.domicilio.end_num = this.num_logradouro_fam;
                        // this.pessoa.domicilio.end = this.pessoa.domicilio.nom_localidade_fam
                        // + (this.pessoa.domicilio.nom_logradouro_fam != null
                        //         ? ' ' + this.pessoa.domicilio.nom_logradouro_fam : '')
                        // + (this.pessoa.domicilio.num_logradouro_fam != null ? ', ' + this.pessoa.domicilio.num_logradouro_fam : '')
                    }

                    if(this.pessoa.domicilio.tipo_bairro_id != null){

                        this.selTipoBairro = 1;

                    }

                    if(this.pessoa.domicilio.tipo_povoado_id != null){

                        this.selTipoBairro = 2;

                    }

                    this.estabelecimento = this.estabelecimentoTmp;

                    if(this.pessoa.estabelecimento.length != 0) {

                        this.verAnexos = 1;

                        this.estabelecimento = this.pessoa.estabelecimento[0];

                        if(this.estabelecimento.tipo_bairro_id != null){
                            this.selTipoBairroLocal = 1;
                        }
                        else if(this.estabelecimento.tipo_povoado_id != null){
                            this.selTipoBairroLocal = 2;
                        }

                    }


                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            handleFiles(ref, preview, arrTemp) {

                let uploadFiles = this.$refs[ref].files;

                for(var i = 0; i < uploadFiles.length; i++){
                    arrTemp.push(uploadFiles[i]);
                }

                this.getImagePreviews(arrTemp, preview);
            },
            getImagePreviews(arrTemp, preview){

                for( let i = 0; i < arrTemp.length; i++ ){
                    if ( /\.(jpe?g|png|gif|pdf)$/i.test( arrTemp[i].name ) ) {
                        let reader = new FileReader();
                        reader.addEventListener("load", function(){
                            this.$refs[preview+parseInt( i )][0].src = reader.result;
                        }.bind(this), false);
                        reader.readAsDataURL( arrTemp[i] );
                    }else{
                        this.$nextTick(function(){
                            this.$refs[preview+parseInt( i )][0].src = '../storage/icones/generic.png';
                        });
                    }
                }

            },
            removeFile( key, arrTemp ){
                arrTemp.splice( key, 1 );
                this.getImagePreviews(arrTemp);
            },
            submitFiles(arrTemp, tipo_doc_cod, tipo_doc) {

                //verifica se a pessoa já foi inclusa.
                if(this.pessoa.pessoa_id == null){

                    alertify.error('Inclua primeiramente as informações do estabelecimento!');

                    return;

                }

                for( let i = 0; i < arrTemp.length; i++ ){
                    if(arrTemp[i].id) {
                        continue;
                    }
                    let formData = new FormData();
                    formData.append(
                        'file', arrTemp[i]
                    );
                    formData.append(
                        'pessoa_id', this.pessoa.pessoa_id
                    );
                    formData.append(
                        'tipo_doc_cod', tipo_doc_cod
                    );
                    formData.append(
                        'tipo_doc', tipo_doc
                    );

                    axios.post(_BASE_URL+'upload/uploadFile',
                        formData,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            },
                        },

                    ).then(function(data) {
                        switch (tipo_doc_cod) {
                            case 0:
                                this.arrFiles[i].id = data['data']['id'];
                                this.arrFiles.splice(i, 1, arrTemp[i]);
                                break;
                            case 1:
                                this.arrFiles1[i].id = data['data']['id'];
                                this.arrFiles1.splice(i, 1, arrTemp[i]);
                                break;
                            case 2:
                                this.arrFiles2[i].id = data['data']['id'];
                                this.arrFiles2.splice(i, 1, arrTemp[i]);
                                break;
                            case 3:
                                this.arrFiles3[i].id = data['data']['id'];
                                this.arrFiles3.splice(i, 1, arrTemp[i]);
                                break;
                            case 4:
                                this.arrFiles4[i].id = data['data']['id'];
                                this.arrFiles4.splice(i, 1, arrTemp[i]);
                                break;
                            case 5:
                                this.arrFiles5[i].id = data['data']['id'];
                                this.arrFiles5.splice(i, 1, arrTemp[i]);
                                break;
                            case 6:
                                this.arrFiles6[i].id = data['data']['id'];
                                this.arrFiles6.splice(i, 1, arrTemp[i]);
                                break;
                        }
                        // arrTemp[i].id = data['data']['id'];
                        // arrTemp.splice(i, 1, arrTemp[i]);
                        alertify.success('Imagem/documento incluído!');
                    }.bind(this)).catch(function(data) {
                        alertify.error('Erro ao incluir imagem/documento!');
                    });
                }
            },
            getTipos(){

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'tipo/listarMassa',
                    data: {
                        siglas: ['LOCAL','BAIRRO','POVOADO'],
                        tipo_sta: 1
                    }

                }).then(response => {

                    //o retorno dessa solicitação vem na forma:
                    // dados, user
                    let data = response.data.dados.data;

                    if(data.length > 0) {

                        this.tipoLocal = data.filter(e=>{

                            return e.tipo_sigla == 'LOCAL';

                        });

                        this.tipoBairro = data.filter(e=>{

                            return e.tipo_sigla == 'BAIRRO';

                        });

                        this.tipoPovoado = data.filter(e=>{

                            return e.tipo_sigla == 'POVOADO';

                        });

                    }

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for (const key in itens['errors']) {

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            exportToPDF(row) {

                let docPdf = this.arquivoPDF(row);

                html2pdf(docPdf, {
                    margin: 1 ,
                    filename: "i-was-html.pdf",
                });

                // html2pdf(document.getElementById("element-to-pdf"), {
                //     margin: 1 ,
                //     filename: "i-was-html.pdf",
                // });
            },
            arquivoPDF(row){

                let html = "";

                html = "<html lang='pt-BR'>";
                html += "<body>";
                html += "<div class='container'>";

                html += "<div class='row'>";
                    html += "<div class='col-sm-4'>";
                        html += "<img src='/storage/icones/cantanhede_logo.png' style='width: 180px;'>";
                    html += "</div>";
                    html += "<div class='col-sm-8'>";
                        html += "<div class='row'>";
                            html += "<div class='col-sm-12'>";
                                html += "<h5 style='text-align: left'>&nbsp;</h5>";
                            html += "</div>";
                        html += "</div>";
                        html += "<div class='row'>";
                            html += "<div class='col-sm-12'>";
                                html += "<h5 style='text-align: left'><b>SECULJ - SECRETARIA DE CULTURA E JUVENTUDE</b></h5>";
                            html += "</div>";
                        html += "</div>";
                    html += "</div>";
                html += "</div>";

                html += "<div class='row'>";
                    html += "<div class='col-sm-12'>";
                        html += "<hr>";
                        html += "<h3 style='text-align: center'>Responsável</h3>";
                        html += "<hr>";
                    html += "</div>";
                html += "</div>";

                html += "<div class='row'>";
                    html += "<div class='col-sm-12'>";
                        html += "<label>Ficha de cadastro n.º:&nbsp;<b>" +
                            '0'.repeat(4 - row.estabelecimento_id.toString().length) + row.estabelecimento_id.toString() +
                            "</b></label>";
                    html += "</div>";
                html += "</div>";

                html += "<div class='row'>";
                    html += "<div class='col-sm-2'>";
                        html += "<label>CPF:&nbsp;</label>";
                    html += "</div>";
                    html += "<div class='col-sm-4'>";
                        html += "<label style='text-align: left'><b>" + row.pessoa.cpf + "</b></label>";
                    html += "</div>";
                html += "</div>";

                html += "<div class='row'>";
                    html += "<div class='col-sm-2'>";
                        html += "<label>Nome:&nbsp;</label>";
                    html += "</div>";
                    html += "<div class='col-sm-5'>";
                        html += "<label style='text-align: left'><b>" + row.pessoa.nom_pessoa + "</b></label>";
                    html += "</div>";
                    html += "<div class='col-sm-1'>";
                        html += "<label>Apelido:&nbsp;</label>";
                    html += "</div>";
                    html += "<div class='col-sm-4'>";
                        html += "<label style='text-align: left'>" + (row.pessoa.nom_apelido_pessoa != null ? "<b>" + row.pessoa.nom_apelido_pessoa + "</b>" : '') + "</label>";
                    html += "</div>";
                html += "</div>";

                html += "<div class='row'>";
                    html += "<div class='col-sm-2'>";
                        html += "<label>Endereço:&nbsp;</label>";
                    html += "</div>";
                    html += "<div class='col-sm-5'>";
                        html += "<label style='text-align: left'><b>" + row.pessoa.domicilio.end + "</b></label>";
                    html += "</div>";
                    html += "<div class='col-sm-1'>";
                        html += "<label>Número:&nbsp;</label>";
                    html += "</div>";
                    html += "<div class='col-sm-4'>";
                        html += "<label style='text-align: left'>" + (row.pessoa.domicilio.end_num != null ? "<b>" + row.pessoa.domicilio.end_num + "</b>" : '') + "</label>";
                    html += "</div>";
                html += "</div>";

                if(row.pessoa.domicilio.tipo_bairro_id != null){

                    html += "<div class='row'>";
                        html += "<div class='col-sm-2'>";
                            html += "<label>Bairro:&nbsp;</label>";
                        html += "</div>";
                        html += "<div class='col-sm-10'>";
                            html += "<label style='text-align: left'><b>" + row.pessoa.domicilio.tipoBairro.tipo_nome + "</b></label>";
                        html += "</div>";
                    html += "</div>";

                }
                else if(row.pessoa.domicilio.tipo_povoado_id != null){

                    html += "<div class='row'>";
                    html += "<div class='col-sm-2'>";
                    html += "<label>Povoado:&nbsp;</label>";
                    html += "</div>";
                    html += "<div class='col-sm-10'>";
                    html += "<label style='text-align: left'><b>" + row.pessoa.domicilio.tipoPovoado.tipo_nome + "</b></label>";
                    html += "</div>";
                    html += "</div>";

                }

                html += "<div class='row'>";
                html += "<div class='col-sm-12'>";
                html += "<hr>";
                html += "<h3 style='text-align: center'>Informações do Estabelecimento</h3>";
                html += "<hr>";
                html += "</div>";
                html += "</div>";

                html += "<div class='row'>";
                html += "<div class='col-sm-2'>";
                html += "<label>Tipo:&nbsp;</label>";
                html += "</div>";
                html += "<div class='col-sm-10'>";
                html += "<label style='text-align: left'><b>" + row.tipoLocal.tipo_nome + "</b></label>";
                html += "</div>";
                html += "</div>";

                html += "<div class='row'>";
                html += "<div class='col-sm-2'>";
                html += "<label>Nome:&nbsp;</label>";
                html += "</div>";
                html += "<div class='col-sm-10'>";
                html += "<label style='text-align: left'><b>" + row.estabelecimento_nome + "</b></label>";
                html += "</div>";
                html += "</div>";

                html += "<div class='row'>";
                html += "<div class='col-sm-2'>";
                html += "<label>Endereço:&nbsp;</label>";
                html += "</div>";
                html += "<div class='col-sm-5'>";
                html += "<label style='text-align: left'><b>" + row.estabelecimento_end + "</b></label>";
                html += "</div>";
                html += "<div class='col-sm-1'>";
                html += "<label>Número:&nbsp;</label>";
                html += "</div>";
                html += "<div class='col-sm-4'>";
                html += "<label style='text-align: left'>" + (row.estabelecimento_end_num != null ? "<b>" + row.estabelecimento_end_num + "</b>" : '') + "</label>";
                html += "</div>";
                html += "</div>";

                html += "<div class='row'>";
                html += "<div class='col-sm-2'>";
                html += "<label>Complemento:&nbsp;</label>";
                html += "</div>";
                html += "<div class='col-sm-4'>";
                html += "<label style='text-align: left'><b>" + row.estabelecimento_end_compl + "</b></label>";
                html += "</div>";
                html += "</div>";

                if(row.tipo_bairro_id != null){

                    html += "<div class='row'>";
                    html += "<div class='col-sm-2'>";
                    html += "<label>Bairro:&nbsp;</label>";
                    html += "</div>";
                    html += "<div class='col-sm-10'>";
                    html += "<label style='text-align: left'><b>" + row.tipoBairro.tipo_nome + "</b></label>";
                    html += "</div>";
                    html += "</div>";

                }
                else if(row.tipo_povoado_id != null){

                    html += "<div class='row'>";
                    html += "<div class='col-sm-2'>";
                    html += "<label>Povoado:&nbsp;</label>";
                    html += "</div>";
                    html += "<div class='col-sm-10'>";
                    html += "<label style='text-align: left'><b>" + row.tipoPovoado.tipo_nome + "</b></label>";
                    html += "</div>";
                    html += "</div>";

                }

                html += "<div class='row'>";
                html += "<div class='col-sm-2'>";
                html += "<label>Telefone:&nbsp;</label>";
                html += "</div>";
                html += "<div class='col-sm-3'>";
                html += "<label style='text-align: left'>" + (row.estabelecimento_cont_tel != null ? "<b>" + row.estabelecimento_cont_tel + "</b>" : '') + "</label>";
                html += "</div>";
                html += "<div class='col-sm-1'>";
                html += "<label>RG:&nbsp;</label>";
                html += "</div>";
                html += "<div class='col-sm-3'>";
                html += "<label style='text-align: left'>" + (row.pessoa.num_identidade_pessoa != null ? "<b>" + row.pessoa.num_identidade_pessoa + "</b>" : '') + "</label>";
                html += "</div>";
                html += "<div class='col-sm-1'>";
                html += "<label>Alvará:&nbsp;</label>";
                html += "</div>";
                html += "<div class='col-sm-2'>";
                html += "<label style='text-align: left'>" + (row.estabelecimento_doc_alvara != null ? "<b>" + row.estabelecimento_doc_alvara + "</b>" : '') + "</label>";
                html += "</div>";
                html += "</div>";

                html += "<div class='row'>";
                html += "<div class='col-sm-2'>";
                html += "<label>e-Mail:&nbsp;</label>";
                html += "</div>";
                html += "<div class='col-sm-7'>";
                html += "<label style='text-align: left'>" + (row.estabelecimento_email != null ? "<b>" + row.estabelecimento_email + "</b>" : '') + "</label>";
                html += "</div>";
                html += "<div class='col-sm-1'>";
                html += "<label>Zona:&nbsp;</label>";
                html += "</div>";
                html += "<div class='col-sm-2'>";
                html += "<label style='text-align: left'><b>" + (row.estabelecimento_localizacao == 1 ? 'URBANA' : 'RURAL') + "</b></label>";
                html += "</div>";
                html += "</div>";

                html += "</div>";
                html += "</body>";
                html += "</html>";

                return html;


            }
        },
        mounted(){
            this.getTipos();
            this.getPreencher();
        }
    }
</script>

<style scoped>
    h3{
        text-align:center;
        font-weight: bold;
    }
    /*input[type="file"]{*/
    /*    display: none;*/
    /*}*/

    .arq{
        padding: 10px 10px;
        width: 200px;
        background-color: #1ABCA1 !important;
        color: #FFFFFF;
        text-transform: uppercase;
        text-align: center;
        display: block;
        margin-top: 10px;
        cursor: pointer;
    }
    input[type="file"]{
        opacity: 0;
        width: 100%;
        height: 200px;
        position: absolute;
        cursor: pointer;
    }
    .filezone {
        outline: 2px dashed grey;
        outline-offset: -10px;
        background: #ccc;
        color: dimgray;
        padding: 10px 10px;
        min-height: 170px;
        position: relative;
        cursor: pointer;
    }
    .filezone:hover {
        background: #c0c0c0;
    }

    .filezone p {
        font-size: 1.0em;
        text-align: center;
        padding: 10px 10px 10px 10px;
    }
    div.file-listing img{
        max-width: 90%;
    }

    div.file-listing{
        margin: auto;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    div.file-listing img{
        height: 100px;
    }
    div.success-container{
        text-align: center;
        color: green;
    }

    div.remove-container{
        text-align: center;
    }

    div.remove-container a{
        color: red;
        cursor: pointer;
    }

    a.submit-button{
        display: block;
        margin: auto;
        text-align: center;
        width: 200px;
        padding: 10px;
        text-transform: uppercase;
        background-color: #CCC;
        color: white;
        font-weight: bold;
        margin-top: 20px;
    }

    .labelClass{
        font-weight: bold;
    }
</style>