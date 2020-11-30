<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Processor;

class ProcessorController extends Controller
{

    protected $repository;

    public function __construct(Processor $processor)
    {
        $this->repository = $processor;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processors = $this->repository->paginate();

        return view('admin.hardware.processor.index', compact('processors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hardware.processor.create');
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

        return redirect()->route('processors.index')
                        ->with('success', 'Processor cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$processor = $this->repository->find($id)){
            return redirect()->back()->with('error', 'Não foi encontrado o cadastro');
        }

        return view('admin.hardware.processor.edit', compact('processor'));
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
        if(!$processor = $this->repository->find($id)){
            return redirect()->back()->with('error', 'Não foi encontrado o cadastro');
        }

        $processor->update($request->all());

        return redirect()->route('processors.index')->with('success', 'Marca atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$processor = $this->repository->find($id)){
            return redirect()->back()->with('error', 'Não foi encontrado o cadastro');
        }

        $processor->delete();

        return redirect()->route('processors.index')->with('success', 'Item excluido com sucesso!');
    }
}
