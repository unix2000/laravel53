@extends('layouts.main')
@section('content')
<div class="container">
    {!! Form::open(['url' => 'form']) !!}
    <div class="form-group">
        {!! Form::selectRange('number', 10, 20); !!}
    </div>
    
    <div class="form-group">
        {!! Form::selectMonth('month'); !!}
    </div>
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" value="" class="form-control">
    </div>
    {!!Form::submit('Click Me!'); !!}
    {!! Form::close() !!}
</div>
@endsection