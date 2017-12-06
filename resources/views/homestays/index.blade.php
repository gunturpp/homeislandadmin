@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Homestay Input Application</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('homestays.create') }}"> Create New Homestay</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        
        <img src="images/{{ Session::get('image') }}">
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Homestay</th>
            <th>Harga</th>
            <th>Kuota</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Foto 1</th>
            <th>Foto 2</th>
            <th>Foto 3</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($homestays as $homestay)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $homestay->nama_homestay}}</td>
        <td>{{ $homestay->harga}}</td>
        <td>{{ $homestay->kuota}}</td>
        <td>{{ $homestay->long}}</td>
        <td>{{ $homestay->lat}}</td>
        <td>{{ $homestay->foto_1}}</td>
        <td>{{ $homestay->foto_2}}</td>
        <td>{{ $homestay->foto_3}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('homestays.show',$homestay->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('homestays.edit',$homestay->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['homestays.destroy', $homestay->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    {!! $homestays->links() !!}
@endsection