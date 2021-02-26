@extends('yacrudg::app')

@section('content')

<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">{{$controller."'s new row"}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST" action="{{route('yacrudgNewRowSubmit', ['controller' => $controller])}}" enctype="multipart/content-data">
    @csrf
    <div class="card-body">
        @foreach($columns as $column)
        @if($column !== 'id')
        <div class="form-group">
        <label for="{{$column}}">{{$column}}</label>
        @if($column == 'created_at' ||  $column == 'updated_at')
            <input type="time" class="form-control" name="{{$column}}" step="1">
            @else
            <input type="text" class="form-control" name="{{$column}}" value="">
        @endif
        </div>
        @endif
        @endforeach
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>

@endsection
