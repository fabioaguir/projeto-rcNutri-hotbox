<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div>
                <div class="form-group ajuste-margin-top">
                    {!! Form::label('setor_id', 'Setor', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-3">
                        @if(isset($model->id))
                            {!! Form::select('setor_id', ([$model->escola->rota->setor->id => $model->escola->rota->setor->nome] + $loadFields['setor']->toArray()),
                                     Session::getOldInput('setor_id'), array('class' => 'form-control')) !!}
                        @else
                            {!! Form::select('setor_id', (['' => 'Selecione um setor'] + $loadFields['setor']->toArray()), Session::getOldInput('setor_id'), array('class' => 'form-control')) !!}
                        @endif
                    </div>
                </div>
                <div class="form-group ajuste-margin-top">
                    {!! Form::label('rota_id', 'Rota', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-3">
                        @if(isset($model->id))
                            {!! Form::select('rota_id', ([$model->escola->rota->id => $model->escola->rota->nome] + $loadFields['rota']->toArray()),
                                     Session::getOldInput('rota_id'), array('class' => 'form-control')) !!}
                        @else
                            {!! Form::select('rota_id', array(), Session::getOldInput('rota_id'), array('class' => 'form-control')) !!}
                        @endif
                    </div>
                </div>
                <div class="form-group ajuste-margin-top">
                    {!! Form::label('escolas_id', 'Escola', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-3">
                        @if(isset($model->id))
                            {!! Form::select('escolas_id', [$model->escola->id => $model->escola->nome],
                                     Session::getOldInput('escolas_id'), array('class' => 'form-control')) !!}
                        @else
                            {!! Form::select('escolas_id', array(), Session::getOldInput('escolas_id'), array('class' => 'form-control')) !!}
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('servicos_id', 'Serviço', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-3">
                        {!! Form::select('servicos_id', (['' => 'Selecione um servico'] + $loadFields['servico']->toArray()), Session::getOldInput('servicos_id'), array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('veiculos_id', 'Veículo', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-3">
                        {!! Form::select('veiculos_id', (['' => 'Selecione um veículo'] + $loadFields['veiculo']->toArray()), Session::getOldInput('veiculos_id'), array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('motoristas_id', 'Motorista', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-3">
                        {!! Form::select('motoristas_id', (['' => 'Selecione um motorista'] + $loadFields['motorista']->toArray()), Session::getOldInput('motoristas_id'), array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('embalagens_id', 'Embalagem', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-3">
                        {!! Form::select('embalagens_id', (['' => 'Selecione uma embalagem'] + $loadFields['embalagem']->toArray()), Session::getOldInput('embalagens_id'), array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <?php $data = new \DateTime('now') ?>
                    {!! Form::label('data_saida', 'Data de Saída', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-2">
                        {!! Form::text('data_saida', $data->format('d/m/Y'), array('class' => 'form-control mask datepicker', 'data-inputmask' => "'alias': 'date'")) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('qtd_saida', 'Quantidade de Saída', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-2">
                        {!! Form::text('qtd_saida', Session::getOldInput('qtd_saida')  , array('class' => 'form-control')) !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@section('js')
    @parent
    <script type="text/javascript" src="{{ asset('/js/validacoes/validation_form_controle_saida_embalagem.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/js/controle-saida-embalagem-form/form.js')}}"></script>
    <script type="text/javascript">
        var elem = document.querySelector('.js-switch-info');
        var init = new Switchery(elem);
    </script>
@endsection