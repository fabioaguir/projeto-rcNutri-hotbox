<?php

namespace Was\Http\Controllers\Web;

use Illuminate\Http\Request;
use Was\Http\Controllers\Controller;
use Was\Http\Requests\ControleSaidaEmbalagemRequest;
use Was\Services\Web\ControleSaidaEmbalagemService;
use Was\Services\Web\RotaService;
use Was\Utils\CarbonDateFormat;
use Yajra\DataTables\DataTables;

class ControleSaidaEmbalagemController extends Controller
{
    /**
     * @var RotaService
     */
    private $service;

    /**
     * @var array
     */
    private $loadFields = [
        'Setor',
        'Rota',
        'Escola',
        'Servico',
        'Veiculo',
        'Motorista',
        'Embalagem'
    ];

    public function __construct(ControleSaidaEmbalagemService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('controle-saida-embalagem.index');
    }

    /**
     * @return mixed
     */
    public function grid()
    {
        #Criando a consulta
        $users = \DB::table('controle_saida_embalagens as controle')
            ->join('escolas', 'escolas.id', '=', 'controle.escolas_id')
            ->join('rotas', 'rotas.id', '=', 'escolas.rotas_id')
            ->join('setores', 'setores.id', '=', 'rotas.setores_id')
            ->join('servicos', 'servicos.id', '=', 'controle.servicos_id')
            ->join('veiculos', 'veiculos.id', '=', 'controle.veiculos_id')
            ->join('motoristas', 'motoristas.id', '=', 'controle.motoristas_id')
            ->join('embalagens', 'embalagens.id', '=', 'controle.embalagens_id')
            ->join('users', 'users.id', '=', 'controle.users_id')
            ->select([
                'controle.id',
                \DB::raw("date_format(controle.data_saida, '%d/%m/%Y') as data_saida"),
                \DB::raw("date_format(controle.data_volta, '%d/%m/%Y') as data_volta"),
                'controle.finalizado',
                'controle.qtd_saida',
                'controle.qtd_volta',
                'setores.nome as setor',
                'rotas.nome as rota',
                'escolas.nome as escola',
                'servicos.nome as servico',
                'veiculos.nome as veiculo',
                'motoristas.nome as motorista',
                'embalagens.nome as embalagem',
                'users.name as usuario',
            ])
            ->orderBy('controle.finalizado');

        #Editando a grid
        return DataTables::of($users)->addColumn('action', function ($row) {
            # Html de retorno
            $html = "";

            # Recuperando o usuário;
            $user = \Auth::user();
            # Verificando se existe vinculo
            $controle = $this->service->find($row->id);


            if($controle->finalizado == 0) {
                # Checando permissão
                //if($user->can('usuario.update')) {
                $html .= '<a href="controleSaidaEmbalagem/edit/' . $row->id . '" title="Editar" class="btn btn-info btn-sm"><i class="ti ti-pencil""></i> </a>';
                //}
            }

            if($controle->finalizado == 0) {
                # Checando permissão
                //if($user->can('impressoras.destroy')) {
                    //$html .= ' <a href="controleSaidaEmbalagem/delete/' . $row->id . '" title="Excluir" class="btn btn-danger btn-sm delete"><i class="ti ti-trash""></i> </a>';
               // }

                $html .= ' <a href="controleSaidaEmbalagem/baixa/' . $row->id . '" title="Baixa" class="btn btn-success btn-sm"><i class="fa fa-truck""></i> </a>';
            }

            return $html;
        })->filterColumn('controle.data_saida', function($query, $keyword) {
                $query->whereRaw("date_format(controle.data_saida, '%d/%m/%Y') = ?", ["{$keyword}"]);
        })->filterColumn('controle.data_volta', function($query, $keyword) {
                $query->whereRaw("date_format(controle.data_volta, '%d/%m/%Y') = ?", ["{$keyword}"]);
        })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        #Carregando os dados para o cadastro
        $loadFields = $this->service->load($this->loadFields);

        #Retorno para view
        return view('controle-saida-embalagem.create', compact('loadFields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ControleSaidaEmbalagemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ControleSaidaEmbalagemRequest $request)
    {
        try {
            #Recuperando os dados da requisição
            $data = $request->all();

            #Executando a ação
            $this->service->store($data);

            #Retorno para a view
            return redirect()->back()->with("message", "Cadastro realizado com sucesso!");
        } catch (\Throwable $e) {
            return redirect()->back()->withInput()->with('message', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            #Carregando os dados para o cadastro
            $loadFields = $this->service->load($this->loadFields);

            #Recuperando o crud
            $model = $this->service->find($id);

            #retorno para view
            return view('controle-saida-embalagem.edit', compact('model', 'loadFields'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            #Recuperando os dados da requisição
            $data = $request->all();

            #Executando a ação
            $this->service->update($data, $id);

            #Retorno para a view
            return redirect()->back()->with("message", "Alteração realizada com sucesso!");
        } catch (\Throwable $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            #Executando a ação
            $this->service->delete($id);

            #Retorno para a view
            return redirect()->back()->with("message", "Remoção realizada com sucesso!");
        } catch (\Throwable $e) { dd($e);
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function baixa($id)
    {
        try {

            #Carregando os dados para o cadastro
            $loadFields = $this->service->load($this->loadFields);

            #Recuperando o crud
            $model = $this->service->find($id);

            #retorno para view
            return view('controle-saida-embalagem.baixa', compact('model', 'loadFields'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmarBaixa(Request $request, $id)
    {
        try {
            #Recuperando os dados da requisição
            $data = $request->all();

            #Executando a ação
            $this->service->confirmarBaixa($data, $id);

            #Retorno para a view
            return redirect()->back()->with("message", "Baixa realizada com sucesso!");
        } catch (\Throwable $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewControleEmbalagemSaidas()
    {
        return view('gestao.controle-embalagem-saida');
    }

    /**
     * @return mixed
     */
    public function controleEmbalagemSaidas(Request $request)
    {
        $data = $request->all();

        //Tratando as datas
        $dataIni = CarbonDateFormat::toUsa($data['data_inicio'], 'date');
        $dataFim = CarbonDateFormat::toUsa($data['data_fim'], 'date');

        #Criando a consulta
        $users = \DB::table('controle_saida_embalagens as controle')
            ->join('escolas', 'escolas.id', '=', 'controle.escolas_id')
            ->join('rotas', 'rotas.id', '=', 'escolas.rotas_id')
            ->join('setores', 'setores.id', '=', 'rotas.setores_id')
            ->join('servicos', 'servicos.id', '=', 'controle.servicos_id')
            ->join('veiculos', 'veiculos.id', '=', 'controle.veiculos_id')
            ->join('motoristas', 'motoristas.id', '=', 'controle.motoristas_id')
            ->join('embalagens', 'embalagens.id', '=', 'controle.embalagens_id')
            ->join('users', 'users.id', '=', 'controle.users_id')
            ->select([
                'controle.id',
                \DB::raw("date_format(controle.data_saida, '%d/%m/%Y') as data_saida"),
                'controle.finalizado',
                'controle.qtd_saida',
                'setores.nome as setor',
                'rotas.nome as rota',
                'escolas.nome as escola',
                'servicos.nome as servico',
                'veiculos.nome as veiculo',
                'motoristas.nome as motorista',
                'embalagens.nome as embalagem',
                'users.name as usuario',
            ])
            ->where('controle.finalizado', 0)
            ->whereBetween('controle.data_saida', array($dataIni, $dataFim))
            ->orderBy('data_saida');

        #Editando a grid
        return DataTables::of($users)->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewControleEmbalagemRetornadas()
    {
        return view('gestao.controle-embalagem-retorno');
    }

    /**
     * @return mixed
     */
    public function controleEmbalagemRetornadas(Request $request)
    {
        $data = $request->all();

        //Tratando as datas
        $dataIni = CarbonDateFormat::toUsa($data['data_inicio'], 'date');
        $dataFim = CarbonDateFormat::toUsa($data['data_fim'], 'date');

        #Criando a consulta
        $users = \DB::table('controle_saida_embalagens as controle')
            ->join('escolas', 'escolas.id', '=', 'controle.escolas_id')
            ->join('rotas', 'rotas.id', '=', 'escolas.rotas_id')
            ->join('setores', 'setores.id', '=', 'rotas.setores_id')
            ->join('servicos', 'servicos.id', '=', 'controle.servicos_id')
            ->join('veiculos', 'veiculos.id', '=', 'controle.veiculos_id')
            ->join('motoristas', 'motoristas.id', '=', 'controle.motoristas_id')
            ->join('embalagens', 'embalagens.id', '=', 'controle.embalagens_id')
            ->join('users', 'users.id', '=', 'controle.users_id')
            ->select([
                'controle.id',
                \DB::raw("date_format(controle.data_saida, '%d/%m/%Y') as data_volta"),
                'controle.finalizado',
                'controle.qtd_volta',
                'setores.nome as setor',
                'rotas.nome as rota',
                'escolas.nome as escola',
                'servicos.nome as servico',
                'veiculos.nome as veiculo',
                'motoristas.nome as motorista',
                'embalagens.nome as embalagem',
                'users.name as usuario',
            ])
            ->where('controle.finalizado', 1)
            ->whereBetween('controle.data_volta', array($dataIni, $dataFim))
            ->orderBy('data_volta');

        #Editando a grid
        return DataTables::of($users)->make(true);
    }
}
