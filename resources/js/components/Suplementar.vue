<template>
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <label>2.01 – Indique abaixo, marcando com X, se a família ou algum membro da família é beneficiário de algum programa da Secretaria Nacional de Segurança Alimentar e Nutricional – SESAN (multipla marcação)</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" name="chk_201" :value="1">&nbsp;1 - Vende leite para o programa do leite - Leite Fome Zero
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" name="chk_201" :value="2">&nbsp;2 - Recebe leite do programa do leite - Leite Fome Zero
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" name="chk_201" :value="3">&nbsp;3 - Vende alimentos para o PAA - Compra Direta
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" name="chk_201" :value="4">&nbsp;4 - Recebe alimentos do PAA - Compra Direta
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" name="chk_201" :value="5">&nbsp;5 - Recebe cesta de alimentos
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" name="chk_201" :value="6">&nbsp;6 - Faz refeição em restaurante popular
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" name="chk_201" :value="7">&nbsp;7 - Faz refeição em cozinha comunitária
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" name="chk_201" :value="8">&nbsp;8 - Participou de curso em alimentação e nutrição
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" name="chk_201" :value="9">&nbsp;9 - Recebeu infraestrutura de captação de água da chuva para produzir alimentos
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" name="chk_201" :value="10">&nbsp;10 - Recebeu cisterna para armazenamento de água da chuva
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" name="chk_201" :value="11">&nbsp;11 - Participa de projetos de produção de alimentos (horta comunitária, criação de pequenos animais, viveiros e pomares)
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" name="chk_201" :value="12">&nbsp;12 - Participa de projeto da carteira indígena (Parceria MMA/MDS)
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" name="chk_201" :value="13">&nbsp;13 - Vende alimentos em feira livre popular financiada pelo MDS
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" name="chk_201" :value="14">&nbsp;14 - Nenhum
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <label>2.02 - Indique abaixo, marcando com X, se algum membro da família foi resgatado do trabalho análogo ao de escravo por órgão do governo (Ministério do Trabalho, Polícia Federal, etc.)</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <input type="radio" class="radio" name="rad_202" :value="1">&nbsp;1 - Sim
                </div>
                <div class="col-sm-6">
                    <input type="radio" class="radio" name="rad_202" :value="2">&nbsp;2 - Não
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.03 - Indique abaixo, marcando com X, se a família ou algum membro da família é beneficiário de algum programa do Ministério de Minas e Energia. Este quesito admite múltipla marcação.</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <input type="checkbox" class="check_box" name="rad_203" :value="1">&nbsp;1 - Recebe sua conta de energia elétrica faturada como Tarifa Social
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" class="check_box" name="rad_203" :value="2">&nbsp;2 - Recebeu de sua distribuidora de energia elétrica doação de lâmpadas ou outros equipamentos para reduzir o consumo de energia
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" class="check_box" name="rad_203" :value="3">&nbsp;3 - Não pagou pela instalação de energia na entrada de sua residência
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" class="check_box" name="rad_203" :value="4">&nbsp;4 - Nenhum
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.04 - Preencha o campo abaixo com o número/código de identificação da unidade consumidora, indicado na conta de energia elétrica do domicílio.</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label>a) Nº de ordem da pessoa:</label>
                </div>
                <div class="col-sm-3">
                    <input type="number" class="form-control" step="1" min="0" max="99">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label>b) Código da unidade consumidora:</label>
                </div>
                <div class="col-sm-8">
                    <input type="number" class="form-control" step="1" min="0" max="99">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <label>2.05 - Indique abaixo, marcando com X, se algum membro da família recebe algum benefício ou é atendido por algum programa da Assistência Social. Este quesito admite múltipla marcação</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="1">&nbsp;1 - Benefício de Prestação Continuada - BPC deficiente
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="2">&nbsp;2 - Benefício de Prestação Continuada - BPC idoso
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="3">&nbsp;3 - Programa de Atenção Integral à Família - PAIF
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="4">&nbsp;4 - Crianças de 0 a 6 anos em ações socioeducativas de apoio à família
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="5">&nbsp;5 - Centros e Grupos de convivência para idosos
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="6">&nbsp;6 - Abrigo para mulheres vítimas de violência
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="7">&nbsp;7 - Abrigo para crianças e adolescentes
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="8">&nbsp;8 - Abrigo para pessoas idosas
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="9">&nbsp;9 - Abrigo/albergue para adultos e famílias
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="10">&nbsp;10 - Abrigo/albergue para população adulta em situação de rua
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="10">&nbsp;11 - ProJovem Adolescente
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="12">&nbsp;12 - ProJovem Urbano
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="13">&nbsp;13 - ProJovem Campo
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="14">&nbsp;14 - ProJovem Trabalhador
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="15">&nbsp;15 - Serviço de referência e apoio à habilitação e reabilitação de pessoas com deficiência
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="16">&nbsp;16 - Serviço de enfrentamento à violência, abuso e exploração sexual contra crianças, adolescentes e suas famílias
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="17">&nbsp;17 - Serviço de acompanhamento social a adolescentes em medida socioeducativa de liberdade assistida
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="18">&nbsp;18 - Serviço de acompanhamento social a adolescentes em medida socioeducativa de prestação de serviços à comunidade
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="19">&nbsp;19 - Serviço de orientação e apoio especializado a crianças, adolescentes e família
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="20">&nbsp;20 - Serviço de Centro-Dia (atendimento à pessoa idosa com deficiência)
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="21">&nbsp;21 - Serviço de atendimento no domicílio de pessoas idosas e pessoas com deficiência
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="22">&nbsp;22 - Projetos de inclusão produtiva
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="23">&nbsp;23 - Programa de Erradicação do Trabalho Infantil - PETI
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="24">&nbsp;24 - Nenhum
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <label>2.06- Indique abaixo se a família ou algum membro da família é beneficiário de algum programa do Ministério das Cidades.</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>Lista de Programas</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>1 - Habitação de Interesse Social - HIS-FNHIS</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2 - Urbanização, Regularização e Integração de Assentamentos Precários - UAP-FNHIS</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>3 - Habitar Brasil BID - HBB</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>4 - Pró-Moradia</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>5 - Minha Casa Minha Vida - Municípios até 50 mil habitantes</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>6 - Operações coletivas - FGTS</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>7 - Minha Casa Minha Vida - FAR</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>8 - Pró-Municípios</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
<!--                    -->
                </div>
                <div class="col-sm-11">
                    <h5>Dados do benefício</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
<!--                    -->
                </div>
                <div class="col-sm-6">
                    <label>Nº de ordem da pessoa:</label>
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" step="1" min="0" max="99">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
<!--                    -->
                </div>
                <div class="col-sm-6">
                    <label>Nº do programa acima listado:</label>
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" step="1" min="0" max="9">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
<!--                    -->
                </div>
                <div class="col-sm-6">
                    <label>Natureza do benefício:</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
<!--                    -->
                </div>
                <div class="col-sm-6">
                    <label>Número do contato:</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" v-mask="'(##) #####-####'">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                    <!--                    -->
                </div>
                <div class="col-sm-11">
                    <h5>Dados do benefício</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                    <!--                    -->
                </div>
                <div class="col-sm-6">
                    <label>Nº de ordem da pessoa:</label>
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" step="1" min="0" max="99">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                    <!--                    -->
                </div>
                <div class="col-sm-6">
                    <label>Nº do programa acima listado:</label>
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" step="1" min="0" max="9">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                    <!--                    -->
                </div>
                <div class="col-sm-6">
                    <label>Natureza do benefício:</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                    <!--                    -->
                </div>
                <div class="col-sm-6">
                    <label>Número do contato:</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" v-mask="'(##) #####-####'">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                    <!--                    -->
                </div>
                <div class="col-sm-10">
                    <input type="checkbox" class="check_box" :value="0">&nbsp;Esta família não é beneficiária de qualquer programa do Ministério das Cidades
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>2.07 - Indique abaixo se sua família pertence a algum grupo populacional tradicional ou específico.</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <label>Código:</label>
                </div>
                <div class="col-sm-2">
                    <input type="number" class="form-control" step="1" min="0" max="99">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <label>Descrição:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <hr>
                    <h5>RESPONSÁVEL PELA UNIDADE FAMILIAR - RF</h5>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check_box" :value="1" checked="checked">
                    <p>Declaro, sob as penas da lei (Art. 299 do Código Penal), que as declarações contidas neste formulário correspondem à verdade e comprometo-me a procurar a gestão municipal para atualizá-las sempre que houver mudanças em relação às informações prestadas por mim nesta entrevista ou, no máximo, em até dois anos da data desta entrevista.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" style="text-align: right">
            <button type="button" class="btn btn-primary">&nbsp;Salvar&nbsp;</button>
        </div>
    </div>
    <br>
</template>

<script>
    export default {
        name: "Suplementar"
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