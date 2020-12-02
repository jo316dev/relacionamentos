<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{

    protected $repository;

    public function __construct(Sector $sector)
    {
        $this->repository = $sector;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors = $this->repository->paginate();

        return view('admin.sectors.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$this->repository->create($request->all())){
            return redirect()->back()->with('error', 'Houve um Problema no Cadastro');
        }

        return redirect()->route('sectors.index')
                        ->with('success', 'Marca cadastrada com sucesso!');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$sector = $this->repository->find($id)){
            return redirect()->back()->with('error', 'Não foi encontrado o cadastro');
        }

        return view('admin.sectors.edit', compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$sector = $this->repository->find($id)){
            return redirect()->back()->with('error', 'Não foi encontrado o cadastro');
        }

        $sector->update($request->all());

        return redirect()->route('sectors.index')->with('success', 'Marca atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$sector = $this->repository->find($id)){
            return redirect()->back()->with('error', 'Não foi encontrado o cadastro');
        }

        $sector->delete();

        return redirect()->route('sectors.index')->with('success', 'Cadastro excluido com sucesso!');
    }
}
