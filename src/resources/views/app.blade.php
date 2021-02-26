@extends('adminlte::starter')

@section('tablenames')

    @foreach($tablenames as $table)
    <li class="nav-item">
        <a href="{{route('yacrudgTable', ['controller' => $table['tablename']])}}" class="nav-link">
            <i class="fas fa-circle nav-icon" style="font-size: 0.5rem;"></i>
            <p>{{$table['name']}}</p>
        </a>
    </li>
    @endforeach

@endsection
