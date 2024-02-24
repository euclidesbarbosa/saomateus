<div class="container" style="max-width: 600px;">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Relatórios
        </div>
        <div id="retorno_relatorio">

        </div>
        <div class="panel-body">
            <form id="f_relatorio" target="_blank" action="<?php echo base_url()."Relatorio/Visualizar" ?>" method="POST">
                <div class="col-xs-12">
                    <label>Tipo de Relatório</label>
                    <select
                        id="url"
                        name="url"
                        class="form-control"
                        >
                        <?php foreach ($dados as $row): ?>
                        <option value="<?= $row["rel_url"] ?>"><?= $row["rel_titulo"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-xs-6">
                    <label>Data Inicial</label>
                    <input
                        id="dt_ini"
                        name="dt_ini"
                        type="date"
                        autocomplete="off"
                        class="form-control"
                        >
                </div>
                <div class="col-xs-6">
                    <label>Data Final</label>
                    <input
                        id="dt_fim"
                        name="dt_fim"
                        type="date"
                        autocomplete="off"
                        class="form-control"
                        >
                </div>

                <div class="col-xs-12">
                    <label>Formato</label>
                    <select
                        id="formato"
                        name="formato"
                        class="form-control"
                        >
                        <option value="pdf">PDF</option>                        
                        <option value="xlsx">Excel</option>
                        <option value="docx">Word</option>
                        <option value="pptx">Power Point</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="panel-footer" style="text-align: right;">
            <button
                type="submit"
                class="btn btn-primary"
                form="f_relatorio"
                >
                <span class="glyphicon glyphicon-print"></span>
                Imprimir
            </button>
        </div>
    </div>
</div>
<script src="<?php echo base_url('js/relatorio/selecionar.js') . '?v=' . $versao_app; ?>" type="text/javascript"></script>