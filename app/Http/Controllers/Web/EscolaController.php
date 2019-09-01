<?php

namespace Was\Http\Controllers\Web;

use Illuminate\Http\Request;
use Was\Http\Controllers\Controller;
use Was\Http\Requests\EscolaRequest;
use Was\Http\Requests\RotaRequest;
use Was\Repositories\EscolaRepository;
use Was\Services\Web\EscolaService;
use Was\Services\Web\RotaService;
use Yajra\DataTables\DataTables;

class EscolaController extends Controller
{
    /**
     * @var RotaService
     */
    private $service;

    /**
     * @var RotaService
     */
    private $repository;

    /**
     * @var array
     */
    private $loadFields = [
        'Rota'
    ];

    public function __construct(EscolaService $service, EscolaRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('escola.index');
    }

    /**
     * @return mixed
     */
    public function grid()
    {
        #Criando a consulta
        $users = \DB::table('escolas')->select(['id', 'nome'])
            ->join('rotas', 'rotas.id', '=', 'escolas.rotas_id')
            ->select([
                'escolas.id',
                'escolas.nome',
                'rotas.nome as rota'
            ]);

        #Editando a grid
        return DataTables::of($users)->addColumn('action', function ($row) {
            # Html de retorno
            $html = "";

            # Recuperando o usuário;
            $user = \Auth::user();

            # Checando permissão
            //if($user->can('usuario.update')) {
                $html .= '<a href="escola/edit/'.$row->id.'" title="Editar" class="btn btn-info btn-sm"><i class="ti ti-pencil""></i> </a>';
            //}

            # Verificando se existe vinculo
            $rota = $this->service->find($row->id);

            //if(count($area->vendedores) == 0) {
                # Checando permissão
                //if($user->can('impressoras.destroy')) {
                    $html .= '<a href="escola/delete/' . $row->id . '" title="Excluir" class="btn btn-danger btn-sm"><i class="ti ti-trash""></i> </a>';
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
        return view('escola.create', compact('loadFields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EscolaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EscolaRequest $request)
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
            return view('escola.edit', compact('model', 'loadFields'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EscolaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EscolaRequest $request, $id)
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
     * @param Request $request
     * @return mixed
     */
    public function searchByRota(Request $request)
    {
        try {
            # Recuperando a requisição
            $rota = $request->get('rota');

            # Recuperando aa escolas
            $escola = $this->repository->searshByRota($rota);

            # verificando se o registro foi recuperado
            if(!$escola) {
                throw new \Exception('Escolas não encontrada!');
            }

            #Retorno para a view
            return response()->json(['success' => true, 'data' => $escola]);
        } catch (\Throwable $e) {
            return  response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
