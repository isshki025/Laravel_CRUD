@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class='page-header'>本のタイトルや金額を変更する</h2>
        {!! Form::open(['url' => '/book/update']) !!}
        <div class="form-group">
            {{ Form::hidden('id', $book->id) }}
            {{ Form::label('本のタイトル') }}
            {{ Form::input('text', 'upTitle', $book->title, ['required', 'class' => 'form-control']) }}
            {{ Form::label('本の金額') }}
            {{ Form::input('text', 'upPrice', $book->price, ['required', 'class' => 'form-control']) }}
        </div>
        <button type="submit" class="btn btn-primary pull-right">更新</button>
        {!! Form::close() !!}
    </div>
@endsection
