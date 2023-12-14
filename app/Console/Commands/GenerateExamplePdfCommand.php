<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Support\Facades\Response;

class GenerateExamplePdfCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-example-pdf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Example Pdf';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {

            $timestamp = now()->timestamp;

            $snappy = App::make('snappy.pdf');
            //To file
            $html = '<h1>Bill</h1><p>You owe me money, dude.</p>';

            $snappy->generate('http://www.github.com', storage_path("pdf/github-{$timestamp}.pdf"));

            //Or output:
            // return new Response(
            //     $snappy->getOutputFromHtml($html),
            //     200,
            //     array(
            //         'Content-Type'          => 'application/pdf',
            //         'Content-Disposition'   => 'attachment; filename="file.pdf"'
            //     )
            // );

            // SnappyPdf::loadFile('https://example.com')->inline('github.pdf');

            $this->info('Generate PDF success');
        } catch (Exception $e) {
            report($e);
            $this->error("Failed Generate PDF, {$e->getMessage()}");
        }
    }
}
