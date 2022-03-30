@extends('master')

@section('title')
    <title>Edit Produk</title>
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <h1>Edit Product</h1>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('product.update', $product->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Nama Produk:</td>
                                        <td><input type="text" value="{{ $product->name }}" name="name"
                                                placeholder="Nama Produk" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi:</td>
                                        <td>
                                            <textarea name="description" class="form-control" cols="30" rows="10">{{ $product->description }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Harga :</td>
                                        <td><input type="number" name="price" value="{{ $product->price }}"
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Qty :</td>
                                        <td><input type="number" name="qty" value="{{ $product->qty }}"
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Status :</td>
                                        <td>
                                            <select name="status" class="form-control">
                                                <option value="tidak ada">-Pilih Status-</option>
                                                <option value="1"
                                                    {{ old('status', $product->status) === 1 ? 'selected' : '' }}>Aktif
                                                </option>
                                                <option value="0"
                                                    {{ old('status', $product->status === 0 ? 'selected' : '') }}>Tidak
                                                    Aktif</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gambar:</td>
                                        <td>
                                            @if ($product->image)
                                                <img src="{{ Storage::url($product->image) }}" width="100px"
                                                    height="100px">
                                                <input type="file" name="images" class="form-control">
                                                <p>*) Jika ada gambar yang ingin di ubah</p>
                                            @else
                                                <input type="file" name="images" class="form-control">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><button type="submit" class="btn btn-primary">Save</button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
