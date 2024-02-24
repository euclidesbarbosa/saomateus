<template>
    <div class="row">
        <hr/>
        <h5>4 - IDENTIFICAÇÃO DA PESSOA</h5>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>4.01 - Número de ordem</label>
            <input type="number" class="form-control" maxlength="2" step="1" min="0" :value="pessoa.ordem">
        </div>
        <div class="col-sm-8">
            <label>4.02 - Nome completo</label>
            <input type="text" class="form-control" maxlength="100" v-model="pessoa.nom_pessoa">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>4.03 - Identificação (NIS/PIS/PASEP)</label>
            <input type="number" class="form-control" maxlength="11" step="1" min="1"
            v-model="pessoa.num_nis_pessoa_atual">
        </div>
        <div class="col-sm-8">
            <label>4.04 - Apelido/Nome Social</label>
            <input type="text" class="form-control" maxlength="100"
            v-model="pessoa.nom_apelido_pessoa">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>4.05 - Sexo</label>
            <div class="row">
                <div class="col-sm-6">
                    <input type="radio" class="radio" :value="1" v-model="pessoa.cod_sexo_pessoa">&nbsp;Masculino
                </div>
                <div class="col-sm-6">
                    <input type="radio" class="radio" :value="2" v-model="pessoa.cod_sexo_pessoa">&nbsp;Feminino
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <label>4.06 - Data de nascimento</label>
            <input type="date" class="form-control" maxlength="10"
            v-model="pessoa.dta_nasc_pessoa">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>4.07 - Relação de parentesco (nome) com a pessoa Responsável pela Unidade Familiar - RF</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <input type="radio" class="radio" :value="1" v-model="pessoa.cod_parentesco_rf_pessoa">&nbsp;1 - Pessoa Responsável pela Unidade Familiar - RF
        </div>
        <div class="col-sm-4">
            <input type="radio" class="radio" :value="2" v-model="pessoa.cod_parentesco_rf_pessoa">&nbsp;2 - Cônjuge ou companheiro(a)
        </div>
        <div class="col-sm-4">
            <input type="radio" class="radio" :value="3" v-model="pessoa.cod_parentesco_rf_pessoa">&nbsp;3 - Filho(a)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <input type="radio" class="radio" :value="4" v-model="pessoa.cod_parentesco_rf_pessoa">&nbsp;4 - Enteado(a)
        </div>
        <div class="col-sm-4">
            <input type="radio" class="radio" :value="5" v-model="pessoa.cod_parentesco_rf_pessoa">&nbsp;5 - Neto(a) ou bisneto(a)
        </div>
        <div class="col-sm-4">
            <input type="radio" class="radio" :value="6" v-model="pessoa.cod_parentesco_rf_pessoa">&nbsp;6 - Pai ou mãe
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <input type="radio" class="radio" :value="7" v-model="pessoa.cod_parentesco_rf_pessoa">&nbsp;7 - Sogro(a)
        </div>
        <div class="col-sm-4">
            <input type="radio" class="radio" :value="8" v-model="pessoa.cod_parentesco_rf_pessoa">&nbsp;8 - Irmão ou irmã
        </div>
        <div class="col-sm-4">
            <input type="radio" class="radio" :value="9" v-model="pessoa.cod_parentesco_rf_pessoa">&nbsp;9 - Genro ou nora
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <input type="radio" class="radio" :value="10" v-model="pessoa.cod_parentesco_rf_pessoa">&nbsp;10 - Outro parente
        </div>
        <div class="col-sm-4">
            <input type="radio" class="radio" :value="11" v-model="pessoa.cod_parentesco_rf_pessoa">&nbsp;11 - Não parente
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>4.08 - Cor ou raça</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="1" v-model="pessoa.cod_raca_cor_pessoa">&nbsp;1 - Branca
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="2" v-model="pessoa.cod_raca_cor_pessoa">&nbsp;2 - Preta
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="3" v-model="pessoa.cod_raca_cor_pessoa">&nbsp;3 - Amarela
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="4" v-model="pessoa.cod_raca_cor_pessoa">&nbsp;4 - Parda
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="5" v-model="pessoa.cod_raca_cor_pessoa">&nbsp;5 - Indígena
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>4.09 - Nome completo da mãe</label>
            <textarea class="form-control" rows="2" cols="50" maxlength="100" v-model="pessoa.nom_completo_mae_pessoa"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <input type="checkbox" class="checkbox" :value="2">&nbsp;2 - Não Sabe
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>4.10 - Nome completo do pai</label>
            <textarea class="form-control" rows="2" cols="50" maxlength="100" v-model="pessoa.nom_completo_pai_pessoa"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <input type="checkbox" class="checkbox" :value="2">&nbsp;2 - Não Sabe
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>4.11 - Onde (nome) nasceu?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <input type="radio" :value="1" v-model="pessoa.cod_local_nascimento_pessoa">&nbsp;1 - Neste município
        </div>
        <div class="col-sm-4">
            <input type="radio" :value="2" v-model="pessoa.cod_local_nascimento_pessoa">&nbsp;2 - Em outro município
        </div>
        <div class="col-sm-4">
            <input type="radio" :value="3" v-model="pessoa.cod_local_nascimento_pessoa">&nbsp;3 - Em outro país
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>4.12 - Em que estado (nome) nasceu?</label>
            <input type="text" class="form-control" v-model="pessoa.sig_uf_munic_nasc_pessoa">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <input type="checkbox" class="checkbox" :value="2">&nbsp;2 - Não sabe
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>4.13 - Em que município (nome) nasceu?</label>
            <input type="text" class="form-control" v-model="pessoa.nom_ibge_munic_nasc_pessoa">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <input type="checkbox" class="checkbox" :value="2">&nbsp;2 - Não sabe
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>4.14 - Em que país estrangeiro (nome) nasceu?</label>
            <input type="text" class="form-control" v-model="pessoa.nom_pais_origem_pessoa">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <input type="checkbox" class="checkbox" :value="2">&nbsp;2 - Não sabe
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>4.15 - O nascimento (nome) foi registrado em Cartório de Registro Civil?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" :value="1" v-model="pessoa.cod_certidao_registrada_pessoa">&nbsp;1 - Sim e tem Certidão de Nascimento e/ou de Casamento
        </div>
        <div class="col-sm-6">
            <input type="radio" :value="2" v-model="pessoa.cod_certidao_registrada_pessoa">&nbsp;2 - Sim, mas não tem Certidão de Nascimento nem de casamento
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" :value="3" v-model="pessoa.cod_certidao_registrada_pessoa">&nbsp;3 - Não
        </div>
        <div class="col-sm-6">
            <input type="radio" :value="4" v-model="pessoa.cod_certidao_registrada_pessoa">&nbsp;4 - Não sabe
        </div>
    </div>
    <div class="row">
        <hr/>
        <h5>5 - DOCUMENTOS</h5>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>5.01 - Tipo e dados da Certidão</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <span>a) Tipo</span>
        </div>
        <div class="col-sm-2">
            <input type="radio" :value="1" v-model="pessoa.cod_certidao_civil_pessoa">&nbsp;1 - Nascimento
        </div>
        <div class="col-sm-2">
            <input type="radio" :value="2" v-model="pessoa.cod_certidao_civil_pessoa">&nbsp;2 - Casamento
        </div>
        <div class="col-sm-6">
            <input type="radio" :value="3" v-model="pessoa.cod_certidao_civil_pessoa">&nbsp;3 - Certidão Administrativa de Nascimento do Indígena (RANI)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <span>b) Dados</span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>1 - Nome do cartório</label>
            <input type="text" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>2 - Data do registro:</label>
            <input type="date" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>3 - Número do livro</label>
            <input type="number" class="form-control" step="1" min="0" max="8" v-model="pessoa.cod_livro_termo_certid_pessoa">
        </div>
        <div class="col-sm-2">
            <label>4 - Número da folha</label>
            <input type="number" class="form-control" step="1" min="0" max="4" v-model="pessoa.cod_folha_termo_certid_pessoa">
        </div>
        <div class="col-sm-4">
            <label>5 - Número do termo/RANI</label>
            <input type="text" class="form-control" v-model="pessoa.cod_termo_matricula_certid_pessoa">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <label>6 - Matrícula</label>
            <input type="text" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <label>7 - Estado de registro</label>
            <select class="form-select">
                <option></option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <label>8 - Município de registro</label>
            <select class="form-select" v-model="pessoa.nom_munic_certid_pessoa">
                <option></option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>5.02 - Número de inscrição do CPF</label>
            <input type="text" class="form-control" v-mask="'###.###.###-##'" placeholder="xxx.xxx.xxx-xx"
            v-model="pessoa.num_cpf_pessoa">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>5.03 - Dados do documento de identidade (RG)</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            1 - Número&nbsp;<input type="text" class="form-control" maxlength="16" v-model="pessoa.num_identidade_pessoa">
        </div>
        <div class="col-sm-4">
            2 - Complemento&nbsp;<input type="text" class="form-control" maxlength="16" v-model="pessoa.cod_complemento_pessoa">
        </div>
        <div class="col-sm-4">
            3 - Data de emissão&nbsp;<input type="date" class="form-control" maxlength="10" v-model="pessoa.dta_emissao_cart_trab_pessoa">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <label>4 - Estado emissor</label>
            <input type="text" class="form-control" maxlength="100" v-model="pessoa.sig_uf_ident_pessoa">
        </div>
        <div class="col-sm-4">
            <label>5 - Sigla do órgão emissor</label>
            <input type="text" class="form-control" maxlength="8" v-model="pessoa.sig_orgao_emissor_pessoa">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>5.04 - Dados da Carteira de Trabalho e Previdência Social</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>1 - Número</label>
            <input type="number" class="form-control" step="1" min="1" max="7" v-model="pessoa.num_cart_trab_prev_soc_pessoa">
        </div>
        <div class="col-sm-4">
            <label>2 - Série</label>
            <input type="number" class="form-control" step="1" min="1" max="5" v-model="pessoa.num_serie_trab_prev_soc_pessoa">
        </div>
        <div class="col-sm-4">
            <label>3 - Data emissão</label>
            <input type="date" class="form-control" v-model="pessoa.dta_emissao_cart_trab_pessoa">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <label>4 - Estado emissor</label>
            <input type="text" class="form-control" v-model="pessoa.sig_uf_cart_trab_pessoa">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>5.05 - Dados do Título de Eleitor com DV</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>1 - Número</label>
            <input type="number" class="form-control" step="1" min="1" max="12" v-model="pessoa.num_titulo_eleitor_pessoa">
        </div>
        <div class="col-sm-4">
            <label>2 - Zona</label>
            <input type="number" class="form-control" step="1" min="1" max="4" v-model="pessoa.num_zona_tit_eleitor_pessoa">
        </div>
        <div class="col-sm-4">
            <label>3 - Seção</label>
            <input type="number" class="form-control" step="1" min="1" max="4" v-model="pessoa.num_secao_tit_eleitor_pessoa">
        </div>
    </div>
    <div class="row">
        <hr/>
        <h5>6 - PESSOAS COM DEFICIÊNCIA</h5>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>6.01 - (Nome) tem alguma deficiência permanente que limite as suas atividades habituais (como trabalhar, ir à escola, brincar, etc.)</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="1" v-model="pessoa.cod_deficiencia_memb">&nbsp;1 - Sim
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="2" v-model="pessoa.cod_deficiencia_memb">&nbsp;2 - Não
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>6.02 - Qual é o tipo de deficiência que (nome) tem? (Este quesito admite múltipla marcação)</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="radio" class="radio" :value="1" v-model="pessoa.ind_def_cegueira_memb">&nbsp;1 - Cegueira
        </div>
        <div class="col-sm-3">
            <input type="radio" class="radio" :value="2" v-model="pessoa.ind_def_baixa_visao_memb">&nbsp;2 - Baixa visão
        </div>
        <div class="col-sm-3">
            <input type="radio" class="radio" :value="3" v-model="pessoa.ind_def_surdez_profunda_memb">&nbsp;3 - Surdez severa/profunda
        </div>
        <div class="col-sm-3">
            <input type="radio" class="radio" :value="4" v-model="pessoa.ind_def_surdez_leve_memb">&nbsp;4 - Surdez leve/moderada
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="radio" class="radio" :value="5" v-model="pessoa.ind_def_fisica_memb">&nbsp;5 - Deficiência física
        </div>
        <div class="col-sm-3">
            <input type="radio" class="radio" :value="6" v-model="pessoa.ind_def_mental_memb">&nbsp;6 - Deficiência mental ou intelectual
        </div>
        <div class="col-sm-3">
            <input type="radio" class="radio" :value="7" v-model="pessoa.ind_def_sindrome_down_memb">&nbsp;7 - Síndrome de Down
        </div>
        <div class="col-sm-3">
            <input type="radio" class="radio" :value="8" v-model="pessoa.ind_def_transtorno_mental_memb">&nbsp;8 - Transtorno/doença mental
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>6.03 - Em função dessa deficiência (nome) recebe cuidados permanentes de terceiros? (Este quesito admite múltipla marcação)</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="checkbox" class="checkbox" :value="1" v-model="pessoa.ind_ajuda_nao_memb">&nbsp;1 - Não
        </div>
        <div class="col-sm-3">
            <input type="checkbox" class="checkbox" :value="2" v-model="pessoa.ind_ajuda_familia_memb">&nbsp;2 - Sim, de alguém da família
        </div>
        <div class="col-sm-3">
            <input type="checkbox" class="checkbox" :value="3" v-model="pessoa.ind_ajuda_especializado_memb">&nbsp;3 - Sim, de cuidador especializado
        </div>
        <div class="col-sm-3">
            <input type="checkbox" class="checkbox" :value="4" v-model="pessoa.ind_ajuda_vizinho_memb">&nbsp;4 - Sim, de vizinho
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="checkbox" class="checkbox" :value="5" v-model="pessoa.ind_ajuda_instituicao_memb">&nbsp;5 - Sim, de instituição da rede socioassistencial
        </div>
        <div class="col-sm-3">
            <input type="checkbox" class="checkbox" :value="6" v-model="pessoa.ind_ajuda_outra_memb">&nbsp;6 - Sim, de outra forma
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>7.01 - (Nome) sabe ler e escrever?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" :value="1" v-model="pessoa.cod_sabe_ler_escrever_memb">&nbsp;1 - Sim
        </div>
        <div class="col-sm-2">
            <input type="radio" :value="2" v-model="pessoa.cod_sabe_ler_escrever_memb">&nbsp;2 - Não
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>7.02 - (Nome) frequenta escola ou creche?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="radio" :value="1" v-model="pessoa.ind_frequenta_escola_memb">&nbsp;1 - Sim, rede pública
        </div>
        <div class="col-sm-3">
            <input type="radio" :value="2" v-model="pessoa.ind_frequenta_escola_memb">&nbsp;2 - Sim, rede particular
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="radio" :value="3" v-model="pessoa.ind_frequenta_escola_memb">&nbsp;3 - Não, já frequentou
        </div>
        <div class="col-sm-3">
            <input type="radio" :value="4" v-model="pessoa.ind_frequenta_escola_memb">&nbsp;4 - Nunca frequentou
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>7.03 - Qual é o nome dessa escola ou creche que (nome) frequenta?</label>
            <input type="text" class="form-control" v-model="pessoa.nom_escola_memb">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>7.04 - Essa escola ou creche está localizada neste município?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="1" v-model="pessoa.cod_escola_local_memb">&nbsp;Sim
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="2" v-model="pessoa.cod_escola_local_memb">&nbsp;Não
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>7.05 - Qual é o estado e o município onde está localizada a escola ou creche?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>Estado</label>
            <input type="text" class="form-control" v-model="pessoa.sig_uf_escola_memb">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>Município</label>
            <input type="text" class="form-control" v-model="pessoa.nom_munic_escola_memb">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label>7.06 - Código do INEP/MEC da escola ou creche:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="number" class="form-control" v-model="pessoa.cod_censo_inep_memb">
        </div>
        <div class="col-sm-3">
            <input type="checkbox" class="checkbox" :value="0">&nbsp;Não
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>7.07 - Qual é o curso que (nome) frequenta?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="1" v-model="pessoa.cod_curso_frequenta_memb">&nbsp;1 - Creche
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="2" v-model="pessoa.cod_curso_frequenta_memb">&nbsp;2 - Pré-escola (exceto CA)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="3" v-model="pessoa.cod_curso_frequenta_memb">&nbsp;3 - Classe de Alfabetização - CA
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="4" v-model="pessoa.cod_curso_frequenta_memb">&nbsp;4 - Ensino Fundamental regular (duração 8 anos)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="5" v-model="pessoa.cod_curso_frequenta_memb">&nbsp;5 - Ensino Fundamental regular (duração 9 anos)
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="6" v-model="pessoa.cod_curso_frequenta_memb">&nbsp;6 - Ensino Fundamental especial
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="7" v-model="pessoa.cod_curso_frequenta_memb">&nbsp;7 - Ensino Médio regular
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="8" v-model="pessoa.cod_curso_frequenta_memb">&nbsp;8 - Ensino Médio especia
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="9" v-model="pessoa.cod_curso_frequenta_memb">&nbsp;9 - Ensino Fundamental EJA - séries iniciais (Supletivo - 1 ª a 4ª)
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="10" v-model="pessoa.cod_curso_frequenta_memb">&nbsp;10 - Ensino Fundamental EJA - séries finais (Supletivo - 5 ª a 8ª)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="11" v-model="pessoa.cod_curso_frequenta_memb">&nbsp;11 - Ensino Médio EJA (Supletivo)
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="12" v-model="pessoa.cod_curso_frequenta_memb">&nbsp;12 - Alfabetização para adultos
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="13" v-model="pessoa.cod_curso_frequenta_memb">&nbsp;13 - Superior, Aperfeiçoamento, Especialização, Mestrado, Doutorado
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="14" v-model="pessoa.cod_curso_frequenta_memb">&nbsp;14 - Pré-vestibular
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>7.08 - Qual é o ano/série que (nome) frequenta?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="1" v-model="pessoa.cod_ano_serie_frequenta_memb">&nbsp;1 - Primeiro(a)
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="2" v-model="pessoa.cod_ano_serie_frequenta_memb">&nbsp;2 - Segundo(a)
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="3" v-model="pessoa.cod_ano_serie_frequenta_memb">&nbsp;3 - Terceiro(a)
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="4" v-model="pessoa.cod_ano_serie_frequenta_memb">&nbsp;4 - Quarto(a)
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="5" v-model="pessoa.cod_ano_serie_frequenta_memb">&nbsp;5 - Quinto(a)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="6" v-model="pessoa.cod_ano_serie_frequenta_memb">&nbsp;6 - Sexto(a)
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="7" v-model="pessoa.cod_ano_serie_frequenta_memb">&nbsp;7 - Sétimo(a)
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="8" v-model="pessoa.cod_ano_serie_frequenta_memb">&nbsp;8 - Oitavo(a)
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="9" v-model="pessoa.cod_ano_serie_frequenta_memb">&nbsp;9 - Nono(a)
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="10" v-model="pessoa.cod_ano_serie_frequenta_memb">&nbsp;10 - Curso não-seriado
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>7.09 - Qual foi o curso mais elevado que (nome) freqüentou, no qual concluiu pelo menos uma série?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="1" v-model="pessoa.cod_curso_frequentou_pessoa_memb">&nbsp;1 - Creche
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="2" v-model="pessoa.cod_curso_frequentou_pessoa_memb">&nbsp;2 - Pré-escola (exceto CA)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="3" v-model="pessoa.cod_curso_frequentou_pessoa_memb">&nbsp;3 - Classe de Alfabetização - CA
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="4" v-model="pessoa.cod_curso_frequentou_pessoa_memb">&nbsp;4 - Ensino Fundamental 1ª a 4ª séries, Elementar (Primário), Primeira fase do 1 º grau
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="5" v-model="pessoa.cod_ano_serie_frequentou_memb">&nbsp;5 - Ensino Fundamental 5ª a 8ª séries, Médio 1º ciclo (Ginasial), Segunda fase do 1º grau
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="6" v-model="pessoa.cod_ano_serie_frequentou_memb">&nbsp;6 - Ensino Fundamental (duração 9 anos)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="7" v-model="pessoa.cod_curso_frequentou_pessoa_memb">&nbsp;7 - Ensino Fundamental Especial
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="8" v-model="pessoa.cod_curso_frequentou_pessoa_memb">&nbsp;8 - Ensino Médio, 2º grau, Médio 2º ciclo (Científico, Clássico, Técnico, Normal)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="9" v-model="pessoa.cod_curso_frequentou_pessoa_memb">&nbsp;9 - Ensino Médio Especial
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="10" v-model="pessoa.cod_curso_frequentou_pessoa_memb">&nbsp;10 - Ensino Fundamental EJA - séries iniciais (Supletivo 1ª a 4ª)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="11" v-model="pessoa.cod_curso_frequentou_pessoa_memb">&nbsp;11 - Ensino Fundamental EJA - séries finais (Supletivo 5ª a 8ª)
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="12" v-model="pessoa.cod_curso_frequentou_pessoa_memb">&nbsp;12 - Ensino Médio EJA (Supletivo)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="13" v-model="pessoa.cod_ano_serie_frequentou_memb">&nbsp;13 - Superior, Aperfeicoamento,Especialização, Mestrado,Doutorado
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="14" v-model="pessoa.cod_ano_serie_frequentou_memb">&nbsp;14 - Alfabetização para Adultos(Mobral, etc.)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="15" v-model="pessoa.cod_ano_serie_frequentou_memb">&nbsp;15 - Nenhum
        </div>
    </div>
    <div class="row">
        <hr/>
        <h5>PARA A PESSOA QUE NÃO FREQUENTA ESCOLA, MAS JÁ FREQUENTOU</h5>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>7.10 - Qual foi o último ano/série que (nome) concluiu com aprovação nesse curso que frequentou?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="1" v-model="pessoa.cod_ano_serie_frequentou_memb">&nbsp;1 - Primeiro(a)
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="2" v-model="pessoa.cod_ano_serie_frequentou_memb">&nbsp;2 - Segundo(a)
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="3" v-model="pessoa.cod_ano_serie_frequentou_memb">&nbsp;3 - Terceiro(a)
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="4" v-model="pessoa.cod_ano_serie_frequentou_memb">&nbsp;4 - Quarto(a)
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="5" v-model="pessoa.cod_ano_serie_frequentou_memb">&nbsp;5 - Quinto(a)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="6" v-model="pessoa.cod_ano_serie_frequentou_memb">&nbsp;6 - Sexto(a)
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="7" v-model="pessoa.cod_ano_serie_frequentou_memb">&nbsp;7 - Sétimo(a)
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="8" v-model="pessoa.cod_ano_serie_frequentou_memb">&nbsp;8 - Oitavo(a)
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="9" v-model="pessoa.cod_ano_serie_frequentou_memb">&nbsp;9 - Nono(a)
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="10" v-model="pessoa.cod_ano_serie_frequentou_memb">&nbsp;10 - Curso não-seriado
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>7.11- (Nome) concluiu esse curso que frequentou?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="1" v-model="pessoa.cod_concluiu_frequentou_memb">&nbsp;1 - Sim
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="2" v-model="pessoa.cod_concluiu_frequentou_memb">&nbsp;2 - Não
        </div>
    </div>
    <div class="row">
        <hr/>
        <h5>8 - TRABALHO E REMUNERAÇÃO</h5>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>8.01 - Na semana passada (nome) trabalhou?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="1" v-model="pessoa.cod_trabalhou_memb">&nbsp;1 - Sim
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="2" v-model="pessoa.cod_trabalhou_memb">&nbsp;2 - Não
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>8.02 - Na semana passada (nome) estava afastado de um trabalho, por motivo de doença, falta voluntária, licença, férias ou por outro motivo?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="1" v-model="pessoa.cod_afastado_trab_memb">&nbsp;1 - Sim
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="2" v-model="pessoa.cod_afastado_trab_memb">&nbsp;2 - Não
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>8.03 - Esse trabalho principal que (nome) exerceu foi na agricultura, criação de animais, pesca ou coleta (extração vegetal)?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="1" v-model="pessoa.cod_agricultura_trab_memb">&nbsp;1 - Sim
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="2" v-model="pessoa.cod_agricultura_trab_memb">&nbsp;2 - Não
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>8.04 - Nesse trabalho principal (nome) era:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="1" v-model="pessoa.cod_principal_trab_memb">&nbsp;1 - Trabalhador por conta própria (bico, autônomo)
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="2" v-model="pessoa.cod_principal_trab_memb">&nbsp;2 - Trabalhador temporário em área rural
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="3" v-model="pessoa.cod_principal_trab_memb">&nbsp;3 - Empregado sem carteira de trabalho assinada
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="4" v-model="pessoa.cod_principal_trab_memb">&nbsp;4 - Empregado com carteira de trabalho assinada
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="5" v-model="pessoa.cod_principal_trab_memb">&nbsp;5 - Trabalhador doméstico sem carteira de trabalho assinada
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="6" v-model="pessoa.cod_principal_trab_memb">&nbsp;6 - Trabalhador doméstico com carteira de trabalho assinada
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="7" v-model="pessoa.cod_principal_trab_memb">&nbsp;7 - Trabalhador não-remunerado
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="8" v-model="pessoa.cod_principal_trab_memb">&nbsp;8 - Militar ou servidor público
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="9" v-model="pessoa.cod_principal_trab_memb">&nbsp;9 - Empregador
        </div>
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="10" v-model="pessoa.cod_principal_trab_memb">&nbsp;10 - Estagiário
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="radio" class="radio" :value="11" v-model="pessoa.cod_principal_trab_memb">&nbsp;11 - Aprendiz
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>8.05 - No mês passado (nome) recebeu remuneração de trabalho? (Se sim, registre o valor bruto da remuneração efetivamente recebida em todos os trabalhos)</label>        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="input-group">
                <input type="number" class="form-control" step="1" min="0" v-model="pessoa.val_remuner_emprego_memb">
                <span class="input-group-sm alinhar">,00</span>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="input-group">
                <input type="checkbox" class="checkbox" :value="0">
                <span class="input-group-sm alinharCompleto">0 - Não recebe</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>8.06 - (Nome) teve trabalho remunerado nos últimos 12 meses?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="1" v-model="pessoa.cod_trabalho_12_meses_memb">&nbsp;1 - Sim
        </div>
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="2" v-model="pessoa.cod_trabalho_12_meses_memb">&nbsp;2 - Não
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>8.07 - Quantos meses trabalhou nesse período?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="number" class="form-control" step="1" min="0" max="12" v-model="pessoa.qtd_meses_12_meses_memb">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>8.08 - Qual foi a remuneração bruta de todos os trabalhos recebidos por (nome) nesse período?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="input-group">
                <input type="number" class="form-control" step="1" min="0" v-model="pessoa.val_renda_bruta_12_meses_memb">
                <span class="input-group-sm alinhar">,00</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>8.09- Quanto (nome) recebe, normalmente, por mês de:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>1 - Ajuda/doação regular de não morado</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="input-group">
                <input type="number" class="form-control" step="1" min="0" v-model="pessoa.val_renda_doacao_memb">
                <span class="input-group-sm alinhar">,00</span>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="input-group">
                <input type="checkbox" class="checkbox" :value="0">
                <span class="input-group-sm alinharCompleto">0 - Não recebe</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>2 - Aposentadoria, aposentadoria rural, pensão ou BPC/LOAS</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="input-group">
                <input type="number" class="form-control" step="1" min="0" v-model="pessoa.val_renda_aposent_memb">
                <span class="input-group-sm alinhar">,00</span>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="input-group">
                <input type="checkbox" class="checkbox" :value="0">
                <span class="input-group-sm alinharCompleto">0 - Não recebe</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>3 - Seguro-desemprego</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="input-group">
                <input type="number" class="form-control" step="1" min="0" v-model="pessoa.val_renda_seguro_desemp_memb">
                <span class="input-group-sm alinhar">,00</span>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="input-group">
                <input type="checkbox" class="checkbox" :value="0">
                <span class="input-group-sm alinharCompleto">0 - Não recebe</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>4 - Pensão alimentícia</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="input-group">
                <input type="number" class="form-control" step="1" min="0" v-model="pessoa.val_renda_pensao_alimen_memb">
                <span class="input-group-sm alinhar">,00</span>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="input-group">
                <input type="checkbox" class="checkbox" :value="0">
                <span class="input-group-sm alinharCompleto">0 - Não recebe</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label>5 - Outras fontes de remuneração exceto bolsa família ou outras transferências similares</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="input-group">
                <input type="number" class="form-control" step="1" min="0" v-model="pessoa.val_outras_rendas_memb">
                <span class="input-group-sm alinhar">,00</span>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="input-group">
                <input type="checkbox" class="checkbox" :value="0">
                <span class="input-group-sm alinharCompleto">0 - Não recebe</span>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        name: "Pessoa",
        data(){
            return{
            //
            }
        },
        props:{
            pessoa:{
                pessoa_id : null,
                domicilio_id : null,
                cod_familiar_fam : null,
                cod_est_cadastral_memb : null,
                ind_trabalho_infantil_pessoa : null,
                nom_pessoa : null,
                num_nis_pessoa_atual : null,
                nom_apelido_pessoa : null,
                cod_sexo_pessoa : null,
                dta_nasc_pessoa : null,
                cod_parentesco_rf_pessoa : null,
                cod_raca_cor_pessoa : null,
                nom_completo_mae_pessoa : null,
                nom_completo_pai_pessoa : null,
                cod_local_nascimento_pessoa : null,
                sig_uf_munic_nasc_pessoa : null,
                nom_ibge_munic_nasc_pessoa : null,
                cod_ibge_munic_nasc_pessoa : null,
                nom_pais_origem_pessoa : null,
                cod_pais_origem_pessoa : null,
                cod_certidao_registrada_pessoa : null,
                fx_idade : null,
                marc_pbf : null,
                cod_certidao_civil_pessoa : null,
                cod_livro_termo_certid_pessoa : null,
                cod_folha_termo_certid_pessoa : null,
                cod_termo_matricula_certid_pessoa : null,
                nom_munic_certid_pessoa : null,
                cod_ibge_munic_certid_pessoa : null,
                cod_cartorio_certid_pessoa : null,
                num_cpf_pessoa : null,
                num_identidade_pessoa : null,
                cod_complemento_pessoa : null,
                dta_emissao_ident_pessoa : null,
                sig_uf_ident_pessoa : null,
                sig_orgao_emissor_pessoa : null,
                num_cart_trab_prev_soc_pessoa : null,
                num_serie_trab_prev_soc_pessoa : null,
                dta_emissao_cart_trab_pessoa : null,
                sig_uf_cart_trab_pessoa : null,
                num_titulo_eleitor_pessoa : null,
                num_zona_tit_eleitor_pessoa : null,
                num_secao_tit_eleitor_pessoa : null,
                cod_deficiencia_memb : null,
                ind_def_cegueira_memb : null,
                ind_def_baixa_visao_memb : null,
                ind_def_surdez_profunda_memb : null,
                ind_def_surdez_leve_memb : null,
                ind_def_fisica_memb : null,
                ind_def_mental_memb : null,
                ind_def_sindrome_down_memb : null,
                ind_def_transtorno_mental_memb : null,
                ind_ajuda_nao_memb : null,
                ind_ajuda_familia_memb : null,
                ind_ajuda_especializado_memb : null,
                ind_ajuda_vizinho_memb : null,
                ind_ajuda_instituicao_memb : null,
                ind_ajuda_outra_memb : null,
                cod_sabe_ler_escrever_memb : null,
                ind_frequenta_escola_memb : null,
                nom_escola_memb : null,
                cod_escola_local_memb : null,
                sig_uf_escola_memb : null,
                nom_munic_escola_memb : null,
                cod_ibge_munic_escola_memb : null,
                cod_censo_inep_memb : null,
                cod_curso_frequenta_memb : null,
                cod_ano_serie_frequenta_memb : null,
                cod_curso_frequentou_pessoa_memb : null,
                cod_ano_serie_frequentou_memb : null,
                cod_concluiu_frequentou_memb : null,
                grau_instrucao : null,
                cod_trabalhou_memb : null,
                cod_afastado_trab_memb : null,
                cod_agricultura_trab_memb : null,
                cod_principal_trab_memb : null,
                val_remuner_emprego_memb : null,
                cod_trabalho_12_meses_memb : null,
                qtd_meses_12_meses_memb : null,
                val_renda_bruta_12_meses_memb : null,
                val_renda_doacao_memb : null,
                val_renda_aposent_memb : null,
                val_renda_seguro_desemp_memb : null,
                val_renda_pensao_alimen_memb : null,
                val_outras_rendas_memb : null,
                marc_sit_rua : null,
                ind_dormir_rua_memb : null,
                qtd_dormir_freq_rua_memb : null,
                ind_dormir_albergue_memb : null,
                qtd_dormir_freq_albergue_memb : null,
                ind_dormir_dom_part_memb : null,
                qtd_dormir_freq_dom_part_memb : null,
                ind_outro_memb : null,
                qtd_freq_outro_memb : null,
                cod_tempo_rua_memb : null,
                ind_motivo_perda_memb : null,
                ind_motivo_ameaca_memb : null,
                ind_motivo_probs_fam_memb : null,
                ind_motivo_alcool_memb : null,
                ind_motivo_desemprego_memb : null,
                ind_motivo_trabalho_memb : null,
                ind_motivo_saude_memb : null,
                ind_motivo_pref_memb : null,
                ind_motivo_outro_memb : null,
                ind_motivo_nao_sabe_memb : null,
                ind_motivo_nao_resp_memb : null,
                cod_tempo_cidade_memb : null,
                cod_vive_fam_rua_memb : null,
                cod_contato_parente_memb : null,
                ind_ativ_com_escola_memb : null,
                ind_ativ_com_coop_memb : null,
                ind_ativ_com_mov_soc_memb : null,
                ind_ativ_com_nao_sabe_memb : null,
                ind_ativ_com_nao_resp_memb : null,
                ind_atend_cras_memb : null,
                ind_atend_creas_memb : null,
                ind_atend_centro_ref_rua_memb : null,
                ind_atend_inst_gov_memb : null,
                ind_atend_inst_nao_gov_memb : null,
                ind_atend_hospital_geral_memb : null,
                cod_cart_assinada_memb : null,
                ind_dinh_const_memb : null,
                ind_dinh_flanelhinha_memb : null,
                ind_dinh_carregador_memb : null,
                ind_dinh_catador_memb : null,
                ind_dinh_servs_gerais_memb : null,
                ind_dinh_pede_memb : null,
                ind_dinh_vendas_memb : null,
                ind_dinh_outro_memb : null,
                ind_dinh_nao_resp_memb : null,
                ind_atend_nenhum_memb : null,
                ref_cad : null,
                ref_pbf : null,
                cpf: null,
                ordem: 0, //receberá o número ao ser selecionado em Domicílio,
                email: null,
            }
        },
        methods:{
            //salvar
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