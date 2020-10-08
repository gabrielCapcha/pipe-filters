<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Sales\SaleController;

class uploadMassive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:massive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = public_path('uploads/xlsx/sal_sales_10.xlsx');
        $person = new SaleController();
        $person->excelImport($path);
        return $person;
    }
}
