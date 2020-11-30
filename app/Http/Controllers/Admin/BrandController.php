<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreUpdate;
use Illuminate\Http\Request;
use App\Models\Brand;
use phpDocumentor\Reflection\Types\This;

class BrandController extends Controller
{

    protected $repository;

    public function __construct(Brand $brand)
    {
        $this->repository = $brand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = $this->repository->paginate();

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreUpdate $request)
    {
        if(!$this->repository->create($request->all())){
            return redirect()->back()->with('error', 'Houve um Problema no Cadastro');
        }

        return redirect()->route('brands.index')
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
        if(!$brand = $this->repository->find($id)){
            return redirect()->back()->with('error', 'Não foi encontrado o cadastro');
        }

        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandStoreUpdate $request, $id)
    {
        if(!$brand = $this->repository->find($id)){
            return redirect()->back()->with('error', 'Não foi encontrado o cadastro');
        }

        $brand->update($request->all());

        return redirect()->route('brands.index')->with('success', 'Marca atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$brand = $this->repository->find($id)){
            return redirect()->back()->with('error', 'Não foi encontrado o cadastro');
        }

        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Cadastro excluido com sucesso!');
    }
}
