<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.as'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('dress-blouse-skirts', measurement\DressblouseskirtController::class);

    $router->resource('trouser-jumpsuits', measurement\TrousejumpsuitController::class);

     $router->resource('employees', measurement\EmployeesController::class);

     $router->resource('apprentices', measurement\ApprenticeController::class);

     $router->resource('bridals-wear', measurement\BridalController::class);

     $router->get('/make-payment/{id}', 'measurement\DressblouseskirtController@makepayment');

     $router->get('/make-payment', 'measurement\DressblouseskirtController@umakepayment');

     $router->get('/check-details', 'measurement\DressblouseskirtController@checkdetails');

     $router->post('/save-payment', 'measurement\DressblouseskirtController@savepayment');

     $router->get('/print-receipt/{id}', 'measurement\DressblouseskirtController@printreceipt');

     $router->get('/transaction-info/{id}', 'measurement\DressblouseskirtController@transactioninfo');

     $router->resource('transactions', measurement\TransactionController::class);

     $router->get('/backup-restore-database', 'measurement\DressblouseskirtController@backuprestoredatabase');

     $router->get('/backup-database','measurement\DressblouseskirtController@backupdatabase');

});
