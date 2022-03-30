@extends('master')

@section('title')
    <title>Tambah Produk</title>
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <h1>Tambah Product</h1>
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
                            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Nama Produk:</td>
                                        <td><input type="text" name="name" placeholder="Nama Produk" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi:</td>
                                        <td>
                                            <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Harga :</td>
                                        <td><input type="number" name="price" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Qty :</td>
                                        <td><input type="number" name="qty" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Status :</td>
                                        <td>
                                            <select name="status" class="form-control">
                                                <option value="1">Aktif</option>
                                                <option value="0">Tidak Aktif</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gambar:</td>
                                        <td><input type="file" name="image" class="form-control"></td>
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
