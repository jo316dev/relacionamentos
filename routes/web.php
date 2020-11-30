<?php




Route::prefix('admin')
        ->namespace('Admin')
        ->group(function(){


    /**
     * Rota para painel
     */
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

   


    /**
     * Rota para Cadastrado de Marcas
     */
    
    Route::get('brands', 'BrandController@index')->name('brands.index');
    Route::get('brands/create', 'BrandController@create')->name('brands.create');
    Route::post('brands/store', 'BrandController@store')->name('brands.store');
    Route::get('brands/edit/{id}', 'BrandController@edit')->name('brands.edit');
    Route::put('brands/{id}', 'BrandController@update')->name('brands.update');
    Route::delete('brands/{id}', 'BrandController@destroy')->name('brands.destroy');


    /**
     * Rota para Cadastro de Processadores
     */

    Route::get('processors', 'ProcessorController@index')->name('processors.index');
    



});





Route::get('/', function () {
    return view('welcome');
});
