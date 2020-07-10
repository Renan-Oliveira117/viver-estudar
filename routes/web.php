<?php

use Illuminate\Support\Facades\Route;



Auth::routes([
    'register'=> true
]);

Route::namespace('Publico')->name('publico.')->group(function (){

    Route::get('/', 'TelaController@index')->name('inicial');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('admin')->namespace('Admin')->prefix('admin')->name('admin.')->group( function() {
    Route::resource('curso', 'CursoController');
    Route::resource('professor', 'ProfessorController');
    Route::resource('aluno', 'AlunoController');

});
Route::middleware('aluno')->namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
    Route::resource('aluno', 'AlunoController');
});
