@extends('yacrudg::app')

@section('content')

@if(!empty($response))
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">{{$controller.' > '.$id}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST" action="{{route('yacrudgUpdateSubmit', ['controller' => $controller, 'id' => $id])}}" enctype="multipart/content-data">
    @csrf
    <div class="card-body">
        @foreach($response as $key=>$value)
        <div class="form-group">
        <label for="{{$key}}">{{$key}}</label>
        <input type="text" class="form-control" id="{{$key}}" name="{{$key}}" value="{{$value}}">
        </div>
        @endforeach
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>
@endif
@endsection
