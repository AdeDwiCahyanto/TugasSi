@extends('app')
@section('content')
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading"></div>
                    <a class="nav-link" href="{{ route('home') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="{{ route('pengguna.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Data Pengguna
                    </a>
                    <a class="nav-link" href="{{ route('profil.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Data Profil
                    </a>
                    <a class="nav-link" href="{{ route('pegawai.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Data Pegawai
                    </a>
                    <a class="nav-link" href="{{ route('gudang.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Data Gudang
                    </a>
                    <a class="nav-link" href="{{ route('kategori.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Data Kategori
                    </a>
                    <a class="nav-link" href="{{ route('barang.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Data Barang
                    </a>
                    <a class="nav-link" href="{{ route('outlet.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Data Outlet
                    </a>
                    <a class="nav-link" href="{{ route('nilai.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Data Nilai
                    </a>
                    <a class="nav-link" href="{{ route('alternatif.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Data Alternatif
                    </a>
                    <a class="nav-link" href="{{ route('penilaian.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Data Penilaian
                    </a>
                    <a class="nav-link" href="{{ route('atribut.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Data Atribut
                    </a>
                    <a class="nav-link" href="{{ route('layanan.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Data Layanan
                    </a>
                    <a class="nav-link" href="{{ route('pengiriman.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Data Pengiriman
                    </a>
                    <a class="nav-link" href="{{ route('logout') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Logout
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
               
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Data Profil</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Tambah Data Profil</li>
                </ol>
                @if($errors->any())
                @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
                @endif
                <div class="card-body p-12 table-responsive">
                    <form action="{{ route('profil.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Nama Perusahaan<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" />
                        </div>
                        <div class="mb-3">
                            <label>Alamat Perusahaan<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="alamat" value="{{ old('alamat') }}" />
                        </div>
                        <div class="mb-3">
                            <label>Visi Perusahaan<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="visi" value="{{ old('visi') }}" />
                        </div>
                        <div class="mb-3">
                            <label>Misi Perusahaan<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="misi" value="{{ old('misi') }}" />
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Save</button>
                            <a class="btn btn-danger" href="{{ route('profil.index') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection