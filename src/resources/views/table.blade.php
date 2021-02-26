@extends('yacrudg::app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">

    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{$controller}}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active">{{$controller}}</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>
    

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$controller}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="{{route('yacrudgNewRow', ['controller' => $controller])}}" class="btn btn-success mb-4">New row</a>
                <a href="{{route('yacrudgRemoveCRUD', ['controller' => $controller])}}" class="btn btn-danger mb-4">Remove CRUD</a>
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                @foreach($columns as $column)
                    <th>{{$column}}</th>
                @endforeach
                <th>Controls</th>
                </tr>
                </thead>
                <tbody>
                    @if(!empty($response))
                        @foreach($response as $line)
                        <tr>
                            @foreach($line as $key=>$value)
                            <td>{{$value}}</td>
                            @endforeach
                            <td class='text-center'>
                            <div class="btn-group">
                                <a class="btn btn-info" href="{{route('yacrudgUpdate', ['id' => $line['id'], 'controller' => $controller])}}">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a class="btn btn-danger" href="{{route('yacrudgRemove', ['id' => $line['id'], 'controller' => $controller])}}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection