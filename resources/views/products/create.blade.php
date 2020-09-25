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
<section class="container">
    <div class="box box-warning col-9">
        <div class="box-header with-border">
            <h3 class="card-title">Tambah Data Produk</h3>
        </div>
        <div class="box-body">
            <div class="form-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <!-- MENAMPILKAN ERROR APABILA TERDAPAT FLASH MESSAGE ERROR -->
                            @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif

                            <form action="{{ url('/product') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama Produk</label>
                                    <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('title') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="description" cols="10" rows="10" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"></textarea>
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="number" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Stok</label>
                                    <input type="number" name="stock" class="form-control {{ $errors->has('stock') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('stock') }}</p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-danger btn-sm">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection