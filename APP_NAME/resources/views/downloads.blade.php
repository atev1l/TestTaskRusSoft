@extends('layouts.app')

@section('content')


    <div class="tb" style="width: 70%; margin-left: auto; margin-right: auto">
    <table class="table">
        <thead class="thead text-black-50" style="background: #3490dc">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Файл</th>
            <th scope="col">Статус</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @for($i=1; $i < count($files); $i++)

            <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{ $files[$i] }}</td>
                <td>Выполненно</td>
                <td>
                    @if(substr($files[$i], 0, 9) !== 'ERR_FILE_')
                        @csrf
                        <a href="/downloads/{{ $files[$i] }}"><button class="btn btn-success">Загрузить</button></a>


                    @endif

                    @if(substr($files[$i], 0, 9) === 'ERR_FILE_')
                        <button type="button" class="btn btn-warning" id="filename" value="{{ $files[$i] }}">Ошибка</button>
                    @endif
                </td>
            </tr>
        @endfor
        </tbody>
    </table>

    </div>
@endsection
