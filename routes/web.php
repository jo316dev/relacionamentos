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
    Route::get('processors/create', 'ProcessorController@create')->name('processors.create');
    Route::post('processors/store', 'ProcessorController@store')->name('processors.store');
    Route::get('processors/edit/{id}', 'ProcessorController@edit')->name('processors.edit');
    Route::put('processors/{id}', 'ProcessorController@update')->name('processors.update');
    Route::delete('processors/{id}', 'ProcessorController@destroy')->name('processors.destroy');
    
    /**
     * Rota para Cadastro de Quantidade de Memoria
     */

    Route::get('memory', 'MemoryController@index')->name('memory.index');
    Route::get('memory/create', 'MemoryController@create')->name('memory.create');
    Route::post('memory/store', 'MemoryController@store')->name('memory.store');
    Route::get('memory/edit/{id}', 'MemoryController@edit')->name('memory.edit');
    Route::put('memory/{id}', 'MemoryController@update')->name('memory.update');
    Route::delete('memory/{id}', 'MemoryController@destroy')->name('memory.destroy');


});





Route::get('/', function () {
    return view('welcome');
});
