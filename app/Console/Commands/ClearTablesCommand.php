<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ClearTablesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tables:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all tables in the database';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tables = $this->getAllTables();

        if ($this->confirm('This command will delete all rows from the database tables. Are you sure you want to continue?')) {
            foreach ($tables as $table) {
                $this->clearTable($table);
            }

            $this->info('All tables have been cleared successfully.');
        } else {
            $this->info('Clear tables command has been canceled.');
        }
    }

    /**
     * Get all tables in the database.
     *
     * @return array
     */
    private function getAllTables()
    {
        $tables = [];

        $database = DB::connection()->getDatabaseName();
        $tablesQuery = DB::select("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$database'");

        foreach ($tablesQuery as $table) {
            $tables[] = $table->TABLE_NAME;
        }

        return $tables;
    }

    /**
     * Clear a table by deleting its rows.
     *
     * @param string $table
     */
    private function clearTable($table)
    {
        if (Schema::hasTable($table) && $table !== 'migrations') {
            DB::table($table)->delete();
        }
    }
}
