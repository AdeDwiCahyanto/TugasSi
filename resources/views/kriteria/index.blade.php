@extends('app')
@section('content')
@if(session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
<div class="card card-default">
    <div class="card-header">
            <div class="col">
                <a class="btn btn-primary" href="{{ route('kriteria.create') }}">Add</a>
            </div>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-striped table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama kriteria</th>
                    <th>Nilai kriteria</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1 ?>
            @foreach($data as $customer)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $customer->nama_kriteria}}</td>
                <td>{{ $customer->nilai_kriteria}}</td>
                <td>
                    <a class="btn btn-sm btn-warning" href="{{ route('kriteria.edit', $customer) }}">Edit</a>
                    <form method="POST" action="{{ route('kriteria.destroy', $customer) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="col">
        <a class="btn btn-primary" href="{{ route('home') }}">Back</a>
    </div>
</div>
@endsection