<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is usefull to refresh database and seed the default';

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
        //

        $this->call('migrate:refresh');
        // $categories = collect(['framework', 'code']);

        // $categories->each(function($c){
        //     \App\Category::create([
        //         'name' => $c,
        //         'slug' => \Str::slug($c)
        //     ]);
        // });

        $this->call('db:seed');



        $this->info('All database has been refreshed and seeded.');
    }
}
