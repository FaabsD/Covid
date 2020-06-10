<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace( 'Website\Controllers' );

SimpleRouter::group( [ 'prefix' => site_url() ], function () {

	// START: Zet hier al eigen routes
	// Lees de docs, daar zie je hoe je routes kunt maken: https://github.com/skipperbent/simple-php-router#routes

	SimpleRouter::get( '/', 'WebsiteController@home' )->name( 'home' );
	//registratie controllers
	SimpleRouter::get( '/registreren', 'RegistrationController@registrationPage' )->name( 'register' );
	SimpleRouter::post( '/registreren/verwerken', 'RegistrationController@handleRegistration' )->name( 'register.handle' );
	SimpleRouter::get( '/registreren/bedankt', 'RegistrationController@registrationThanks' )->name( 'register.bedankpagina' );
	//account bevestiging
	SimpleRouter::get('/registreren/bevestig-account/{code}', 'RegistrationController@confirmRegistration')->name( 'register.confirm' );
	SimpleRouter::get('/registreren/account-bevestigd', 'RegistrationController@registrationConfirmed')->name('register.confirmed');
	
	SimpleRouter::get( '/stuur-test-email', 'EmailController@sendTestEmail' )->name('email.test');
	//Zoeken
	SimpleRouter::post('/zoekresultaten', 'SearchController@SearchResults')->name('zoekresultaten');
	//Drukte aangeven
	SimpleRouter::get('/hoedruk/{id}', 'DrukteController@SetDrukte')->name('drukte');
	// STOP: Tot hier al je eigen URL's zetten

	SimpleRouter::get( '/not-found', function () {
		http_response_code( 404 );

		return '404 Page not Found';
	} );

} );


// Dit zorgt er voor dat bij een niet bestaande route, de 404 pagina wordt getoond
SimpleRouter::error( function ( Request $request, \Exception $exception ) {
	if ( $exception instanceof NotFoundHttpException && $exception->getCode() === 404 ) {
		response()->redirect( site_url() . '/not-found' );
	}

} );

