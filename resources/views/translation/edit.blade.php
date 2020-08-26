@extends('layout.layout')
@section('content')
    <div class="container" style="margin-top:100px;">
        <h3>Добавить перевод</h3>
        @if(\Illuminate\Support\Facades\Session::has('messages'))
            <div class="alert alert-warning">
                @foreach(\Illuminate\Support\Facades\Session::get('messages') as $message)
                    {{$message}} <br>
                @endforeach
            </div>
        @endif
        {!! Form::open(['route' => ['translation.update', $translation->id], 'method' => 'post']) !!}
        {{ method_field('PUT') }}
        @csrf
        <div class="form-group">
            <label for="slug">Ключевое слово</label>
            {!! Form::text('slug', $translation->slug, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <label for="slug">Русский</label>
            {!! Form::text('ru_translate', $translation->ru_translate, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <label for="slug">English</label>
            {!! Form::text('en_translate', $translation->en_translate, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <label for="slug">Қазақша</label>
            {!! Form::text('kz_translate', $translation->kz_translate, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <label for="slug">Ўзбекча</label>
            {!! Form::text('uz_translate', $translation->uz_translate, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <label for="slug">O'zbekcha</label>
            {!! Form::text('oz_translate', $translation->oz_translate, array('class' => 'form-control')) !!}

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        {!! Form::close() !!}
    </div>
@endsection
