<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HardDisk;
use Illuminate\Http\Request;

class HardDiskController extends Controller
{
    protected $repository;

    public function __construct(HardDisk $disk)
    {
        $this->repository = $disk;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disks = $this->repository->paginate();

        return view('admin.hardware.disk.index', compact('disks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hardware.disk.create');
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

        return redirect()->route('disk.index')
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
        if(!$disk = $this->repository->find($id)){
            return redirect()->back()->with('error', 'Não foi encontrado o cadastro');
        }

        return view('admin.hardware.disk.edit', compact('disk'));
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
        if(!$disk = $this->repository->find($id)){
            return redirect()->back()->with('error', 'Não foi encontrado o cadastro');
        }

        $disk->update($request->all());

        return redirect()->route('disk.index')->with('success', 'Memoria atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$disk = $this->repository->find($id)){
            return redirect()->back()->with('error', 'Não foi encontrado o cadastro');
        }

        $disk->delete();

        return redirect()->route('disk.index')->with('success', 'Item excluido com sucesso!');
    }
}
