<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\BuyersImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Laravel Excel importer';

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
     * @return int
     */
    public function handle()
    {
        $this->output->title('Starting import');
        // (new BuyersImport)->withOutput($this->output)->import('KounSvaChhlat.xlsx');
        Excel::import(new BuyersImport, 'temp/qfpxXNkzMYxpPT6Jk0nzK19aq6g2YI7WiCOjDrqy.xlsx');
        $this->output->success('Import successful');
        // return 0;
    }
}
