@extends('yacrudg::app')
@section('content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">New CRUD</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST" action="{{route('yacrudgNewSubmit')}}" enctype="multipart/content-data">
    @csrf
    <div class="card-body">
        <div class="form-group">
        <label for="table">Table</label>
        <select name="table" class="form-control">
          @foreach($allTablenames as $tables)
            @if(isset($occupied))
              @if(!in_array($tables->Tables_in_yacrudg, $occupied))
                <option value="{{$tables->Tables_in_yacrudg}}">{{$tables->Tables_in_yacrudg}}</option>
              @endif
              @else
                @if(isset($tables->Tables_in_yacrudg))
                <option value="{{$tables->Tables_in_yacrudg}}">{{$tables->Tables_in_yacrudg}}</option>
                @endif
            @endif
          @endforeach
        </select>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>
@endsection
