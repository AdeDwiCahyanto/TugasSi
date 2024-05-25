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
                <h1 class="mt-4">Data Nilai</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Data Nilai</li>
                </ol>
                <div class="card-body p-12 table-responsive">
                    <div class="col">
                        <a class="btn btn-primary" href="{{ route('nilai.create') }}">Add</a>
                    </div>
                    <table class="table table-bordered table-striped table-hover mb-12">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>nilai</th>
                                <th>bobot</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php $no = 1 ?>
                        @foreach($nilai as $customer)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $customer->nama_nilai}}</td>
                            <td>{{ $customer->bobot_nilai}}</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="{{ route('nilai.edit', $customer) }}">Edit</a>
                                <form method="POST" action="{{ route('nilai.destroy', $customer) }}" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

@guest

@endguest
@endsection