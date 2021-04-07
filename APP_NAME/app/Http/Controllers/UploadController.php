<?php

namespace App\Http\Controllers;
use App\Jobs\FileAdd;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UploadController extends Controller
{
    public function store()
    {
        return view("form");
    }


    public function upload(Request $request)
    {

        $data = $request->input('file');
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

    public function home()
    {
//        print_r(storage_path('public'));
//        $files = Storage::files(storage_path('public'));
//        print_r($files);

        $path = public_path();
        $files = Storage::allFiles();

        foreach ($files as &$value) {
            $value = substr($value, 7);
            if (!strpos($value, '.')){
                $value= 'ERR_FILE_' . $value;
            }
        }



        return view('downloads', ['files' => $files]);
    }
}

