@extends('layouts.index')

@section('content')
<section class="container">
    <div class="box">
        <div class="col-md-12">
            <div class="box-header with-border">
                <h3 class="card-title">Buat Invoice</h3>
            </div>
            <div class="card-body">
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <form action="{{ route('invoice.store') }}" method="post">
                    @csrf
                    <div class="form-group col-md-4">
                        <label for="">Customer</label>
                        <select name="customer_id" class="form-control col-md-6" required>
                            <option value="">Pilih</option>
                            @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }} - {{ $customer->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    &nbsp;
                    &nbsp;
                    <div class="float-right">
                        <button class="btn btn-primary btn-sm">Buat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection