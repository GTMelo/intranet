<?php

use Illuminate\Database\Seeder;

class TruncateAllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() === 'production') {
            $this->command->info('Production environment detected. Exiting...');
            exit();
        };

        Eloquent::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate all tables, except migrations
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            if ($table->Tables_in_homestead !== 'migrations')
                DB::table($table->Tables_in_homestead)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
