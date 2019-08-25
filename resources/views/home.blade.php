@extends('menu')

@section('title')
    @parent
    HOME
@endsection

@section('page-heading')
    <h1>Dashboard</h1>
@endsection

@section('container')

    <div data-widget-group="group1">
        <div class="row">
            <div class="col-sm-12">
                {{--<div class="alert alert-info alert-dismissable ">
                    <i class="ti ti-info-alt"></i> Resize the browser window to see the responive tables in action!
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                </div>--}}

                <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                    <div class="panel-heading">
                        <h2>Dashboard</h2>
                        <div class="panel-ctrls" data-actions-container=""
                             data-action-collapse='{"target": ".panel-body"}'></div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="info-tile tile-warning">
                                    <div class="tile-icon"><i class="fa fa-archive"></i></div>
                                    <div class="tile-heading"><span>Estoque Atual</span></div>
                                    <div class="tile-body"><span>600</span></div>
                                    {{--<div class="tile-footer"><span class="text-danger">-7.6% <i class="ti ti-arrow-down"></i></span></div>--}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-tile tile-success">
                                    <div class="tile-icon"><i class="fa fa-external-link"></i></div>
                                    <div class="tile-heading"><span>Saídas</span></div>
                                    <div class="tile-body"><span>345</span></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-tile tile-danger">
                                    <div class="tile-icon"><i class="fa fa-thumbs-o-up"></i></div>
                                    <div class="tile-heading"><span>Voltas</span></div>
                                    <div class="tile-body"><span>21</span></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-tile tile-info">
                                    <div class="tile-icon"><i class="fa fa-arrows-v"></i></div>
                                    <div class="tile-heading"><span>Diferença em estoque</span></div>
                                    <div class="tile-body"><span>124</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
