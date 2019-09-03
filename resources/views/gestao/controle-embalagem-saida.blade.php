@extends('menu')

@section('title')
    @parent
    RELAÇÃO DE SAÍDA DE EMBALAGENS
@endsection

@section('css')
    @parent
    <style>
        .table-responsive {
            min-height: 0.01%;
            overflow-x: initial;
        }
    </style>
@endsection

@section('page-heading')
    <h1>RELAÇÃO DE SAÍDA DE EMBALAGENS</h1>
@endsection

@section('container')

    <div data-widget-group="group1">
        <div class="row">
            <div class="col-sm-12">

                @if(Session::has('message'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <em> {!! session('message') !!}</em>
                    </div>
                @endif

                @if(Session::has('errors'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                    <div class="panel-heading">
                        <h2>RELAÇÃO DE SAÍDA DE EMBALAGENS</h2>

                        <div class="panel-ctrls" data-actions-container=""
                             data-action-collapse='{"target": ".panel-body"}'></div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <?php $data = new \DateTime('now') ?>
                                            {!! Form::label('data_inicio', 'Data Inicial') !!}
                                            {!! Form::text('data_inicio', $data->format('d/m/Y') , array('class' => 'form-control date datepicker')) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <?php $data = new \DateTime('now') ?>
                                            {!! Form::label('data_fim', 'Data Fim') !!}
                                            {!! Form::text('data_fim', $data->format('d/m/Y') , array('class' => 'form-control date datepicker')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <button type="submit" style="margin-top: -5px;"  class="btn-primary btn search">Consultar</button>
                                    </div>
                                    <br/> <br/><br/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="controleEmbalagemSaidas-grid" class="display table table-bordered"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Setor</th>
                                            <th>Rota</th>
                                            <th>Escola</th>
                                            <th>Serviço</th>
                                            <th>Veículo</th>
                                            <th>Motorista</th>
                                            <th>Embalagem</th>
                                            <th>Data de Saída</th>
                                            <th style="width: 7%">Qtd. Saídas</th>
                                        </tr>
                                        </thead>

                                        <tfoot>
                                        <tr>
                                            <th style="width: 5%;">Código</th>
                                            <th>Setor</th>
                                            <th>Rota</th>
                                            <th>Escola</th>
                                            <th>Serviço</th>
                                            <th>Veículo</th>
                                            <th>Motorista</th>
                                            <th>Embalagem</th>
                                            <th>Data de Saída</th>
                                            <th>Qtd. Saída</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')
    @parent
    <script type="text/javascript">

        $('#controleEmbalagemSaidas-grid tfoot th').each(function () {
            var title = $(this).text();

            if (title != 'Acão') {
                $(this).html('<input type="text" class="form-control" placeholder="Pesquisar..." />');
            }
        });

        var table = $('#controleEmbalagemSaidas-grid').DataTable({
            processing: true,
            serverSide: true,
            iDisplayLength: 20,
            bLengthChange: false,
            bFilter: false,
            ajax: {
                url: "{!! route('gestao.controleEmbalagemSaidas') !!}",
                method: 'POST',
                data: function (d) {
                    d.data_inicio = $('input[name=data_inicio]').val();
                    d.data_fim = $('input[name=data_fim]').val();
                }
            },
            language: {
                "lengthMenu": "_MENU_",
                "zeroRecords": "Não foram encontrados resultados",
                "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando de 0 até 0 de 0 registros",
                "infoFiltered": "(Filtrado de _MAX_ total de registro)",
                "sProcessing": "Processando...",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext": "Seguinte",
                    "sLast": "Último"
                }
            },
            columns: [
                {data: 'id', name: 'controle.id'},
                {data: 'setor', name: 'setores.nome'},
                {data: 'rota', name: 'rotas.nome'},
                {data: 'escola', name: 'escolas.nome'},
                {data: 'servico', name: 'servicos.nome'},
                {data: 'veiculo', name: 'veiculos.nome'},
                {data: 'motorista', name: 'motoristas.nome'},
                {data: 'embalagem', name: 'embalagens.nome'},
                {data: 'data_saida', name: "controle.data_saida"},
                {data: 'qtd_saida', name: 'controle.qtd_saida'}
            ]
        });

        $('.dataTables_filter input').attr('placeholder', 'Pesquisar...');

        //DOM Manipulation to move datatable elements integrate to panel
        $('.panel-ctrls').append($('.dataTables_filter').addClass("pull-right")).find("label").addClass("panel-ctrls-center");
        $('.panel-ctrls').append("<i class='separator'></i>");
        $('.panel-ctrls').append($('.dataTables_length').addClass("pull-left")).find("label").addClass("panel-ctrls-center");

        $('.panel-footer').append($(".dataTable+.row"));
        $('.dataTables_paginate>ul.pagination').addClass("pull-right m-n");

        // Apply the filter
        table.columns().eq(0).each(function (colIdx) {

            $('input', table.column(colIdx).footer()).on('change', function () {

                table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
            });
        });

        // Função do submit do search da grid principal
        $('.search').click(function(e) {
            table.draw();
            e.preventDefault();
        });

    </script>
@endsection