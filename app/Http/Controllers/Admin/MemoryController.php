<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Memory;

class MemoryController extends Controller
{

    protected $repository;

    public function __construct(Memory $memory)
    {
        $this->repository = $memory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memories = $this->repository->paginate();

        return view('admin.hardware.memory.index', compact('memories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hardware.memory.create');
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

        return redirect()->route('memory.index')
                        ->with('success', 'Memoria cadastrada com sucesso!');
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
        if(!$memory = $this->repository->find($id)){
            return redirect()->back()->with('error', 'Não foi encontrado o cadastro');
        }

        return view('admin.hardware.memory.edit', compact('memory'));
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
        if(!$memory = $this->repository->find($id)){
            return redirect()->back()->with('error', 'Não foi encontrado o cadastro');
        }

        $memory->update($request->all());

        return redirect()->route('memory.index')->with('success', 'Memoria atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$memory = $this->repository->find($id)){
            return redirect()->back()->with('error', 'Não foi encontrado o cadastro');
        }

        $memory->delete();

        return redirect()->route('memory.index')->with('success', 'Item excluido com sucesso!');
    }
}
