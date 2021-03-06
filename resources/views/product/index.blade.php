@extends('master')

@section('title')
    <title>Halaman Product</title>
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <h1>Halaman Product</h1>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('product.create') }}" class="btn btn-primary">Tambah Produk</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ number_format($product->price, 2) }}</td>
                                            <td>{{ $product->qty }}</td>
                                            <td><img src="{{ Storage::url($product->image) }}"
                                                    alt="{{ $product->name }}" width="100"></td>

                                            @if ($product->status == 1)
                                                <td><span class="btn-primary">Active</span></td>
                                            @else
                                                <td><span class="btn-danger">UnActive</span></td>
                                            @endif
                                            <td>
                                                <a href="{{ route('product.edit', $product->id) }}"
                                                    class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('product.destroy', $product->id) }}"
                                                    class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
