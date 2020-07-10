<?php

use Illuminate\Support\Facades\Route;



Auth::routes([
    'register'=> false
]);

Route::namespace('Publico')->name('publico.')->group(function (){

    Route::get('/', 'TelaController@index')->name('inicial');
    Route::resource('conta', 'ContaController');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group( function() {
    Route::resource('curso', 'CursoController');
    Route::resource('professor', 'ProfessorController');
    Route::resource('aluno', 'AlunoController');
});
