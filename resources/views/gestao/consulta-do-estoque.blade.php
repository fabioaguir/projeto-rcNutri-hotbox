@extends('menu')

@section('title')
    @parent
    CONSULTA DO ESTOQUE DAS EMBALAGENS
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
    <h1>CONSULTA DO ESTOQUE DAS EMBALAGENS</h1>
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
                        <h2>CONSULTA DO ESTOQUE DAS EMBALAGENS</h2>

                        <div class="panel-ctrls" data-actions-container=""
                             data-action-collapse='{"target": ".panel-body"}'></div>
                    </div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="consultadoEstoqueEmbalagens-grid" class="display table table-bordered"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Embalagem</th>
                                            <th>Estoque</th>
                                            <th>Total de Saídas - Pendentes</th>
                                            <th>Embalagens Não Retornadas</th>
                                            <th>Estoque Atual</th>
                                        </tr>
                                        </thead>

                                        <tfoot>
                                        <tr>
                                            <th style="width: 5%;">Código</th>
                                            <th>Embalagem</th>
                                            <th>Estoque</th>
                                            <th>Total de Saídas - Pendentes</th>
                                            <th>Embalagens Não Retornadas</th>
                                            <th>Estoque Atual</th>
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

        var table = $('#consultadoEstoqueEmbalagens-grid').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{!! route('embalagemEstoque.consultadoEstoqueEmbalagens') !!}",
                method: 'POST'
               /* data: function (d) {
                    d.data_inicio = $('input[name=data_inicio]').val();
                    d.data_fim = $('input[name=data_fim]').val();
                }*/
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
                {data: 'id', name: 'embalagens.id'},
                {data: 'nome', name: 'embalagens.nome'},
                {data: 'estoque', name: 'estoque', orderable: false, searchable: false},
                {data: 'qtd_saidas', name: 'qtd_saidas', orderable: false, searchable: false},
                {data: 'embalagens_nao_retornadas', name: 'embalagens_nao_retornadas', orderable: false, searchable: false},
                {data: 'estoque_atual', name: 'estoque_atual', orderable: false, searchable: false}
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