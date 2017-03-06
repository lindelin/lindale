<?php

namespace App\Console\Commands\Lindale;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class LindaleUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lindale:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the Lindale Web application when pulled from git';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->comment(PHP_EOL.'Lindale Project Management System');

        if ($this->confirm('Do you want to update the system?')) {

            try{

                $this->comment(PHP_EOL.'<info>Step 1/3: Caching configs...</info>');
                Artisan::call('config:cache');

                $this->comment(PHP_EOL.'<info>Step 2/3: Caching routes...</info>');
                Artisan::call('route:cache');

                $this->comment(PHP_EOL.'<info>Step 3/3: Optimizing...</info>');
                Artisan::call('optimize');

                $this->comment(PHP_EOL.'Successfully updated. <info>✔</info>');


            }catch (\Exception $e){
                $this->line($e);
                $this->line(PHP_EOL.'<error>✘</error> System error. Update failed!');
                exit;
            }

        }else{
            $this->comment(PHP_EOL.'Thanks.');
            exit;
        }
    }
}
