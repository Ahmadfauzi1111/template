<?php

namespace App\Console\Commands;

use App\Services\FileService;
use Illuminate\Console\Command;

class BackupAllData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup {date?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Using for backup database into database/seeders folder';

    /**
     * File service
     *
     * @var FileService
     */
    protected FileService $fileService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->fileService = new FileService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = $this->argument('date') ?? date('Y-m-d');
        $results = $this->fileService->backupDatabase($date);
        if ($results[0])
            $this->info($results[1]);
        else
            $this->error($results[1]);
        return 0;
    }
}
