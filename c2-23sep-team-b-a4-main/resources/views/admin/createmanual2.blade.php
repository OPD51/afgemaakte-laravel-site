@extends('layouts.admin')
@section('head')
    <meta name="robots" content="index, nofollow">

@stop

    @section('content')
<div class="container">
    <form action="{{ route('manual.create.step3') }}" method="post">
        @csrf
    <div class="form-createbc">




        <div class="form-create">
            <label for="type">type</label>
       
            <select name="type" id="type">
                @foreach($brand->types()->get() as $type)
                <option value="{{ $type->id }}"> {{ $type->name }} </option>
                @endforeach
            </select>

        </div>

        <div class="form-create">
            <label for="link">link:</label>
            <input type="text" name="link">
        </div>

        <div class="form-create">
            <label for="filename">filename:</label>
            <input type="text" name="filename">
        </div>

        <button type="submit">submit</button>


    </div>

    </form>
</div>




@stop

