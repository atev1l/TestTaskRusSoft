<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class FileAdd implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $File;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($File)
    {
        $this->File = $File;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        info($data = $this->File);

        $pos = strripos($data, '/');
        $pos2 = strripos($data, '.');

        $link = substr($data, 0 , $pos+1);
        $filename = substr($data, $pos+1);

        $fileExp = substr($data, $pos2);


        $tempImageTwink = tempnam('..\storage\app\public', $filename);
        $tempImage = substr($tempImageTwink, 0, -4) . $fileExp;
        copy($link . '/' . $filename, $tempImage);
        Storage::delete('exa3BBD.tmp');
        response()->download($tempImage, $filename);
        unlink(($tempImageTwink ));




    }
}
