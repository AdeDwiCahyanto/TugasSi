@extends('app')
@section('content')
@auth
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
                    <a class="nav-link" href="{{ route('rangking.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Data Rangking
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
                <h1 class="mt-4">Data Rangking</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Data Rangking</li>
                </ol>
                <div class="card-body p-12 table-responsive">
                    <div class="col">
                        <h3 class="float-left">Hasil Analisa</h3>
                    </div>
                    <table class="table table-bordered table-striped table-hover mb-12">
                        <thead>
                            <tr>
                                <th class="text-center">Nama</th>
                                @foreach($kriteria as $krit)
                                    <th class="text-center">{{$krit->nama_kriteria}}</th>
                                @endforeach

                            </tr>
                        </thead>
                        @if(!empty($alternatif))
                        @foreach($alternatif as $data)
                            <tr>
                                <td>{{$data->nama_alternatif}}</td>
                                @foreach($data->crip as $crip)
                                    <td>{{$crip->nama_penilaian}}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="{{(count($kriteria)+1)}}" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    @endif
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">Kode</th>
                            @foreach($kriteria as $krit)
                                <th class="text-center">{{$krit->kode_kriteria}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($alternatif))
                            @foreach($alternatif as $data)
                                <tr>
                                    <td>{{$data->kode_alternatif}}</td>
                                    @foreach($data->crip as $crip)
                                        <td>{{$crip->nilai_penilaian}}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="{{(count($kriteria)+1)}}" class="text-center">Data tidak ditemukan</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 card-deck mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="float-left">Normalisasi</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">Kode</th>
                            <?php $bobot = [] ?>
                            @foreach($kriteria as $krit)
                                <?php $bobot[$krit->id_kriteria] = $krit->nilai_kriteria ?>
                                <th class="text-center">{{$krit->kode_kriteria}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($alternatif))
                            <?php $rangking = []; ?>
                            @foreach($alternatif as $data)
                                <tr>
                                    <td>{{$data->kode_alternatif}}</td>
                                    <?php $total = 0;?>
                                    @foreach($data->crip as $crip)
                                        @if($crip->kriteria->jenis == 'cost')
                                            <?php $normalisasi = ($kode_krit[$crip->kriteria->id_kriteria]/$crip->nilai_penilaian); ?>
                                        @elseif($crip->kriteria->jenis == 'benefit')
                                            <?php $normalisasi = ($crip->nilai_penilaian/$kode_krit[$crip->kriteria->id_kriteria]); ?>
                                        @endif
                                            <?php $total = $total+($bobot[$crip->kriteria->id_kriteria]*$normalisasi);?>
                                            <td>{{$normalisasi}}</td>
                                    @endforeach
                                    <?php $rangking[] = [
                                        'kode'  => $data->kode_alternatif,
                                        'nama'  => $data->nama_alternatif,
                                        'total' => $total
                                    ]; ?>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="{{(count($kriteria)+1)}}" class="text-center">Data tidak ditemukan</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 card-deck mt-4">
        <div class="card">
            <div class="card-header">
                <h3>Ranking</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Total</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        usort($rangking, function($a, $b)
                        {
                            return $a['total']<=>$b['total'];
                        });
                        rsort($rangking);
                        $a = 1;
                        ?>
                            @foreach($rangking as $t)
                                <tr>
                                    <td>{{$t['kode']}}</td>
                                    <td>{{$t['nama']}}</td>
                                    <td>{{$t['total']}}</td>
                                    <td>{{$a++}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
            </div>
        </main>
    </div>
</div>
@endauth
@guest

@endguest
@endsection