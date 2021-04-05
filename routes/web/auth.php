<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::prefix('mioficina')->group(function ()
{
	
	Auth::routes();


});
Route::get('login/{driver}', 
	'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');

Route::get('login/{driver}/callback', 
	'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');