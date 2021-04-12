<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
class getlist extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getlist';

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
     * @return int
     */
    public function handle()
    {
        $path = public_path();
        $files = Storage::allFiles();
        $k = 1;
        foreach ($files as &$value) {
            $value = substr($value, 7);
            if (!strpos($value, '.')){
                $value= 'ERR_FILE_' . $value . ' ошибка';
            } else{
                $value .= ' выполенно';
            }
            $k += 1;
        }



        print_r($files);
    }
}
