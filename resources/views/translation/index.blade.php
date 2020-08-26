@extends('layout.layout')
@section('content')
    <div class="container" style="margin-top: 100px;">
        @if(\Illuminate\Support\Facades\Session::has('messages'))
            <div class="alert alert-warning">
                @foreach(\Illuminate\Support\Facades\Session::get('messages') as $message)
                    {{$message}} <br>
                @endforeach
            </div>
        @endif

        <table id="example" class="table table-striped table-bordered" style="width:100%;">
            <thead>
            <tr>
                <th>Название переменной</th>
                <th>Русский</th>
                <th>English</th>
                <th>Қазақша</th>
                <th>Ўзбекча</th>
                <th>O'zbekcha</th>
                <th>Дата создание</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($translates as $translate)
                <tr>
                    <td>{{$translate->slug}}</td>
                    <td>{{$translate->ru_translate}}</td>
                    <td>{{$translate->en_translate}}</td>
                    <td>{{$translate->kz_translate}}</td>
                    <td>{{$translate->uz_translate}}</td>
                    <td>{{$translate->oz_translate}}</td>
                    <td>{{$translate->created_at}}</td>
                    <td><a href="{{route('translation.edit', $translate->id)}}"><i class="fa fa-edit"></i></a></td>
                    <td>
                        <form action="{{ route('translation.destroy', $translate->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button style="cursor:pointer;border: none; background-color: white;" class="fa fa-trash"
                                    type="submit"></button>
                        </form>
                    </td>


                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection

