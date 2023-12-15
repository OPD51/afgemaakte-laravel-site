@extends('layouts.admin')
@section('head')
    <meta name="robots" content="index, nofollow">

@stop

    @section('content')
<div class="container">
    <form action="{{ route('manual.create.step2') }}" method="post">
        @csrf
    <div class="form-createbc">

        <div class="form-create">
            <label for="brand">Select a Brand:</label>
            <select name="brand" id="brand">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}"> {{ $brand->name }} </option>
                @endforeach
            </select>

        </div>

        <button type="submit">submit</button>


    </div>

    </form>
</div>




@stop

