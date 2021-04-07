@extends('layouts.app')

@section('content')
    <div style="margin-left: auto; margin-right: auto; width: 20%; margin-top: 5%; background: white; border-radius: 10px; padding: 20px">
<h1>Загрузка файлов</h1>

<form action="{{ URL::to('/upload') }}" enctype="multipart/form-data" method="post">
    <label for="file">Вставьте ссылку на файл: <input type="text" name="file" value="" style="width: 100%"></label>
    <br/>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <br/>

   <button class="btn btn-success" type="submit" style="">Отправить</button>

</form>
    </div>
@endsection
