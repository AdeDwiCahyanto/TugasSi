@extends('app')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('kriteria.update', $kriteria) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama kriteria<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_kriteria" value="{{ old('nama_kriteria', $kriteria->nama_kriteria) }}" />
            </div>
            <div class="mb-3">
                <label>nilai kriteria<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nilai_kriteria" value="{{ old('nilai_kriteria', $kriteria->nilai_kriteria) }}" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="{{ route('kriteria.index') }}">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection