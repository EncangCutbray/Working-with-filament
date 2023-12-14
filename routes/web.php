<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Barryvdh\Snappy\Facades\SnappyPdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return generatePdf3();
    // return view('pdf.example');
    return view('welcome');
});

Route::get('generate-pdf', function () {
    // return generatePdf1();
    // return generatePdf2();
    return generatePdf3();
});


function generatePdf1()
{
    $snappy = App::make('snappy.pdf');

    $html = '<h1>Bill</h1><p>You owe me money, dude.</p>';

    return response(
        $snappy->getOutputFromHtml($html),
        200,
        [
            'Content-Type'          => 'application/pdf',
            'Content-Disposition'   => 'attachment; filename="file.pdf"'
        ]
    );
}

function generatePdf2()
{
    $pdf = App::make('snappy.pdf.wrapper');

    $html = '<h1>Bill</h1><p>You owe me money, dude.</p>';

    $pdf->loadHTML($html);

    return $pdf->inline();
}

function generatePdf3()
{
    $data= [];

    $pdf = SnappyPdf::loadView('pdf.example', $data);

    return $pdf
        ->setOption('margin-bottom', 10)
        // ->setOptions([
        //     // 'footer-spacing' => 10,
        //     'footer-center' => 'FFF',
        // ])
        ->setOption('footer-spacing', '20')
        ->setOption('footer-center', 'FFF')
        ->inline('Some Document');
}
