<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    {!! Form::label('nome', 'Nome', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-5">
                        {!! Form::text('nome', Session::getOldInput('nome')  , array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('cpf', 'CPF', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-5">
                        {!! Form::text('cpf', Session::getOldInput('cpf')  , array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('telefone', 'Telefone', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-5">
                        {!! Form::text('telefone', Session::getOldInput('telefone')  , array('class' => 'form-control')) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-top: -9px">
                <div class="col-md-4">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        @if (isset($model) && $model->path_image != null)
                            <div id="midias">
                                <img id="logo" src="{{asset("/images/motorista/".$model->path_image)}}"  alt="Foto" height="120" width="100"/><br/>
                            </div>
                        @else
                            <div class="fileinput-preview thumbnail"
                                 data-trigger="fileinput"
                                 style="width: 135px; height: 115px;">
                            </div>
                        @endif
                        <div>
                            <span class="btn btn-primary btn-xs btn-block btn-file">
                                <span class="fileinput-new">Selecionar</span>
                                <span class="fileinput-exists">Mudar</span>
                                <input type="file" name="img">
                            </span>
                            <a href="#"
                               class="btn btn-warning btn-xs fileinput-exists col-md-6"
                               data-dismiss="fileinput">Remover</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
    @parent
    <script type="text/javascript" src="{{ asset('/js/validacoes/validation_form_motorista.js')}}"></script>
    <script type="text/javascript">
        var elem = document.querySelector('.js-switch-info');
        var init = new Switchery(elem);
    </script>
@endsection