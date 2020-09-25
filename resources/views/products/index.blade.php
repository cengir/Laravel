@extends('layouts.index')

@section('content')
<section class="content-header">
    <h1>
        Produk
        <small>Admin</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
&nbsp;
<section class="content">
    <div class="box box-default color-palette-box">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title">Manajemen Produk</h3>
                                    <div class="col-3 float-right">      
                                        <a href="{{url('product/new')}}" class="btn btn-primary btn-sm">Tambah
                                            Data</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        &nbsp;
                        <div class="card-body">
                            @if (session('success'))
                            <div class="alert alert-success col-md-4">
                                {!! session('success') !!}
                            </div>
                            @endif
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- DIRECTIVE FORELSE SAMA DENGAN FOREACH -->
                                    <!-- HANYA SAJA SUDAH FORELSE SUDAH DILENGKAPI FUNGSI UNTUK MENGECEK DATA ADA ATAU TIDAK SEHINGGA KITA TIDAK PERLU LAGI MENGGUNAKAN IF CONDITION -->
                                    <!-- JIKA DATA KOSONG MAKA FUNGSI YANG BERJALAN ADALAH CODE BERADA PADA BLOCK CODE atEMPTY -->
                                    @forelse($products as $product)
                                    <tr>
                                        <!-- MENAMPILKAN VALUE DARI TITLE -->
                                        <td>{{ $product->title }}</td>
                                        <td>{{ str_limit($product->description, 50) }}</td>
                                        <td>Rp {{ number_format($product->price) }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->created_at->format('d-m-Y') }}</td>
                                        <!-- TOMBOL DELETE MENGGUNAKAN METHOD DELETE DALAM ROUTING SEHINGGA KITA MEMASUKKAN TOMBOL TERSEBUT KEDALAM TAG <FORM></FORM> -->
                                        <td>
                                            <form action="{{ url('/product/' . $product->id) }}" method="POST">
                                                <!-- @csrf ADALAH DIRECTIVE UNTUK MEN-GENERATE TOKEN CSRF -->
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                <a href="{{ url('/product/' . $product->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="6">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection