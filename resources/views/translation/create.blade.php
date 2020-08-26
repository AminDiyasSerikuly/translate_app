<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <title>create translation</title>
</head>
<body>
<div class="header" style="margin-top: 40px;margin-left: 20px;">
    <a class="btn btn-primary" href="{{route('translation.index')}}">Список переводов</a>
    <a class="btn btn-success" href="{{route('translation.create')}}">Добавить</a>
</div>
<div class="container" style="margin-top:100px;">
    <h3>Перевод</h3>
    @if(\Illuminate\Support\Facades\Session::has('messages'))
        <div class="alert alert-warning">
            @foreach(\Illuminate\Support\Facades\Session::get('messages') as $message)
                {{$message}} <br>
            @endforeach
        </div>
    @endif
    {!! Form::open(['route' => 'translation.store','method'=>'POST']) !!}
    @csrf
    <div class="form-group">
        <label for="slug">Ключевое слово</label>
        {!! Form::text('slug', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        <label for="slug">Русский</label>
        {!! Form::text('ru_translate', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        <label for="slug">English</label>
        {!! Form::text('en_translate', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        <label for="slug">Қазақша</label>
        {!! Form::text('kz_translate', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        <label for="slug">Ўзбекча</label>
        {!! Form::text('uz_translate', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        <label for="slug">O'zbekcha</label>
        {!! Form::text('oz_translate', null, array('class' => 'form-control')) !!}

    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    {!! Form::close() !!}
</div>
</body>
</html>
