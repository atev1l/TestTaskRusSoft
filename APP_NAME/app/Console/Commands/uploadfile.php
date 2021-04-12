<?php

namespace App\Console\Commands;

use App\Jobs\FileAdd;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as StorageAlias;

class uploadfile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:uploadfile {url}';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $drip;

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
        $data = $this->argument('url');
        $pos = strripos($data, '/');
        $filename = substr($data, $pos+1);

        $dot = stripos($filename, '.');

        if ($dot){
            FileAdd::dispatch(strval($data)); //загрузка файлов через очередь заданий
            print_r('Ваш файл успешно загружен!');
        } else {
            print_r('Загрузите файл в формате https://www.example.com/файл.расширение_файла');
        }

    }
}
