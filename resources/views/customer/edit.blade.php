@extends('layouts.index')

@section('content')
<section class="content-header">
    <h1>
        Customer
        <small>Admin</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ ('/customer') }}"><i class="fa fa-dashboard"></i> Customer</a></li>
        <li class="active"> Edit Data Pelanggan</li>
    </ol>
</section>
&nbsp;
<section class="container">
    <div class="box box-warning col-9">
        <div class="box-header with-border">
            <h3 class="card-title">Edit Data Pelanggan</h3>
        </div>
        <div class="box-body">
            <div class="form">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif

                                <form action="{{ url('/customer/' . $customer->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT" class="form-control">
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" name="name"
                                            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                                            value="{{ $customer->name }}" placeholder="Masukkan nama lengkap">
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <textarea name="address" cols="5" rows="5"
                                            class="form-control {{ $errors->has('address') ? 'is-invalid':'' }}">{{ $customer->address }}</textarea>
                                        <p class="text-danger">{{ $errors->first('address') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" name="phone"
                                            class="form-control {{ $errors->has('phone') ? 'is-invalid':'' }}"
                                            value="{{ $customer->phone }}">
                                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" name="email"
                                            class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}"
                                            value="{{ $customer->email }}" readonly>
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-danger btn-sm">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection