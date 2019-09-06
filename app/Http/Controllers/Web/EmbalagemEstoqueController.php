<?php

namespace Was\Http\Controllers\Web;

use Illuminate\Http\Request;
use Was\Http\Controllers\Controller;
use Was\Http\Requests\EmbalagemEstoqueRequest;
use Was\Repositories\ControleSaidaEmbalagemRepository;
use Was\Repositories\EmbalagemEstoqueRepository;
use Was\Services\Web\EmbalagemEstoqueService;
use Was\Services\Web\RotaService;
use Yajra\DataTables\DataTables;

class EmbalagemEstoqueController extends Controller
{
    /**
     * @var RotaService
     */
    private $service;

    private $repository;

    private $controleSaidaEmbalagemRepository;

    /**
     * @var array
     */
    private $loadFields = [
        'Embalagem'
    ];

    public function __construct(EmbalagemEstoqueService $service,
                                ControleSaidaEmbalagemRepository $controleSaidaEmbalagemRepository,
                                EmbalagemEstoqueRepository $repository)
    {
        $this->service = $service;
        $this->controleSaidaEmbalagemRepository = $controleSaidaEmbalagemRepository;
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('embalagem-estoque.index');
    }

    /**
     * @return mixed
     */
    public function grid()
    {
        #Criando a consulta
        $estoques = \DB::table('embalagens_estoque as estoque')
            ->join('embalagens', 'embalagens.id', '=', 'estoque.embalagens_id')
            ->select([
                'estoque.id',
                'estoque.quantidade',
                \DB::raw("date_format(estoque.data_entrada, '%d/%m/%Y') as data_entrada"),
                'embalagens.nome as embalagem'
            ]);

        #Editando a grid
        return DataTables::of($estoques)->addColumn('action', function ($row) {
            # Html de retorno
            $html = "";

            # Recuperando o usuário;
            $user = \Auth::user();

            # Checando permissão
            //if($user->can('usuario.update')) {
                $html .= '<a href="embalagemEstoque/edit/'.$row->id.'" title="Editar" class="btn btn-info btn-sm"><i class="ti ti-pencil""></i> </a>';
            //}

            # Verificando se existe vinculo
            $rota = $this->service->find($row->id);

            //if(count($area->vendedores) == 0) {
                # Checando permissão
                //if($user->can('impressoras.destroy')) {
                    $html .= '<a href="embalagemEstoque/delete/' . $row->id . '" title="Excluir" class="btn btn-danger btn-sm"><i class="ti ti-trash""></i> </a>';
               // }
            //}

            return $html;
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
        return view('embalagem-estoque.create', compact('loadFields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmbalagemEstoqueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmbalagemEstoqueRequest $request)
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
            return view('embalagem-estoque.edit', compact('model', 'loadFields'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmbalagemEstoqueRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmbalagemEstoqueRequest $request, $id)
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewConsultaDoEstoque()
    {
        return view('gestao.consulta-do-estoque');
    }

    /**
     * @return mixed
     */
    public function consultaDoEstoque()
    {
        #Criando a consulta
        $estoques = \DB::table("embalagens_estoque as estoque")
            ->join("embalagens", "embalagens.id", '=', "estoque.embalagens_id")
            ->select(
                "embalagens.id",
                "embalagens.nome",
                \DB::raw("SUM(estoque.quantidade) as estoque")
            )
            ->groupBy(\DB::raw("embalagens.id,embalagens.nome"))
            ->orderBy("embalagens.nome");

        #Editando a grid
        return DataTables::of($estoques)->addColumn('qtd_saidas', function ($row) {

            $qtd = $this->controleSaidaEmbalagemRepository->totalDeSaidas($row->id);

            return $qtd->quantidade;
        })->addColumn('embalagens_nao_retornadas', function ($row) {

            $qtd = $this->controleSaidaEmbalagemRepository->embalagensNaoRetornadas($row->id);

            return $qtd->quantidade;
        })->addColumn('estoque_atual', function ($row) {

            $saidas = $this->controleSaidaEmbalagemRepository->totalDeSaidas($row->id);

            $naoRetornadas = $this->controleSaidaEmbalagemRepository->embalagensNaoRetornadas($row->id);

            $estoque = $this->repository->estoque($row->id);

            $total = $estoque->quantidade - ($saidas->quantidade + $naoRetornadas->quantidade);

            return $total;
        })->make(true);
    }
}
