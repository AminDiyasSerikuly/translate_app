@extends('layout.layout')
@section('content')
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
@endsection
