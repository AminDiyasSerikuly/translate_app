<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <title>Document</title>
</head>
<body>
<div class="container" style="margin-top: 100px;">
    @if(\Illuminate\Support\Facades\Session::has('messages'))
        <div class="alert alert-warning">
            @foreach(\Illuminate\Support\Facades\Session::get('messages') as $message)
                {{$message}} <br>
            @endforeach
        </div>
    @endif
    <div class="header">
        <a class="btn btn-primary" href="{{route('translation.index')}}">Список переводов</a>
        <a class="btn btn-success" href="{{route('translation.create')}}">Добавить</a>
    </div>

    <table id="example" class="table table-striped table-bordered" style="width:100%;margin-top: 50px;">
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
</body>
</html>


