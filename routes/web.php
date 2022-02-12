<?php

use App\Mail\MailNovaSerie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/series', 'App\Http\Controllers\SeriesController@index')->name('listar_series');
Route::get('/series/criar', 'App\Http\Controllers\SeriesController@create')->middleware('auth');
Route::post('/series/criar', 'App\Http\Controllers\SeriesController@store')->middleware('auth');
Route::delete('/series/{id}', 'App\Http\Controllers\SeriesController@destroy')->middleware('auth');
Route::get('/series/{id}/temporadas', 'App\Http\Controllers\TemporadasController@index');
Route::post('/series/{id}/editaNome', 'App\Http\Controllers\SeriesController@editaNome')->middleware('auth');
Route::get('/series/temporada/{temporadaId}', 'App\Http\Controllers\EpisodiosController@index');
Route::post('/temporada/{temporadas}/episodio', 'App\Http\Controllers\EpisodiosController@assistir')->middleware('auth');

Route::get('/entrar', 'App\Http\Controllers\EntrarController@index');
Route::post('/entrar', 'App\Http\Controllers\EntrarController@entrar');

Route::get('/registrar', 'App\Http\Controllers\RegistroController@create');
Route::post('/registrar', 'App\Http\Controllers\RegistroController@store');

Route::get('/sair', function ()
{
Auth::logout();
return redirect()->to('/entrar');
});



