@extends('master')
@section('konten')

<div class="container">
    <div class="text-end m-2"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahproduk"> + add new products</button></div>
    @if(session('message'))
    <div class="alert alert-success m-3"> {{session('message')}} </div>
    @endif
    <table class="table table-secondary table-hover m-lg-2">
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Product Name</th>
            <th>Type</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Option</th>
        </tr>
        @foreach ($produk as $p)
        <tr>
            <td> {{$p->kode}}<br><img src="/assets/img/{{$p->gambar}}" alt="" width="80px" height="100px"> </td>
            <td> {{$p->nama}} </td>
            <td> {{$p->tipe}} </td>
            <td> {{$p->jenis}} </td>
            <td>Rp. {{$p->harga}} </td>
            <td> {{$p->stok}} </td>
            <td>

                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalUpdateproduk{{ $p->kode }}">Update</button>
                |
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDeleteproduk{{ $p->kode }}">Delete</button>
            </td>
        </tr>

        <!-- Ini tampil form update produk -->
        <div class="modal fade" id="ModalUpdateproduk{{ $p->kode }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/produk/storeupdate" method="post" class="form-floating">
                            @csrf
                            <div class="form-floating p-1">
                                <input type="text" name="kode" id="kode" readonly class="form-control" value="{{ $p->kode }}">
                                <label for="floatingInputValue">Code</label>
                            </div>
                            <div class="form-floating p-1">
                                <input type="text" name="nama" required="required" class="form-control" value="{{ $p->nama }}">
                                <label for="floatingInputValue">Name</label>
                            </div>
                            <div class="form-floating p-1">
                                <input type="text" name="tipe" required="required" class="form-control" value="{{ $p->tipe }}">
                                <label for="floatingInputValue">Product Name</label>
                            </div>
                            <div class="form-floating p-1">
                                <input type="text" name="jenis" required="required" class="form-control" value="{{ $p->jenis }}">
                                <label for="floatingInputValue">Type</label>
                            </div>
                            <div class="form-floating p-1">
                                <input type="text" name="harga" required="required" class="form-control" value="{{ $p->harga }}">
                                <label for="floatingInputValue">Price (Rp.)</label>
                            </div>
                            <div class="form-floating p-1">
                                <input type="number" name="stok" required="required" class="form-control" value="{{ $p->stok }}">
                                <label for="floatingInputValue">Stock</label>
                            </div>
                            <div class="form-floating p-1">
                                <input type="hidden" name="gambar" required="required" class="form-control" value="{{ $p->gambar }}">
                                <label for="floatingInputValue"></label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Updates</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ini tampil form delete produk -->
        <div class="modal fade" id="ModalDeleteproduk{{$p->kode}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/produk/delete/{{$p->kode}}" method="get" class="form-floating">
                            @csrf
                            <div>
                                <h3>Yakin mau menghapus data <b>{{$p->nama}}</b> ?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </table>
</div>

<!-- Ini tampil form tambah produk -->
<div class="modal fade" id="ModalTambahproduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">add product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/produk/storeinput" method="post" class="form-floating" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating p-1">
                        <input type="text" name="kode" required="required" class="form-control">
                        <label for="floatingInputValue">Code</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="text" name="nama" required="required" class="form-control">
                        <label for="floatingInputValue">Name</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="text" name="tipe" required="required" class="form-control">
                        <label for="floatingInputValue">Product Name</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="text" name="jenis" required="required" class="form-control">
                        <label for="floatingInputValue">Type</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="text" name="harga" required="required" class="form-control">
                        <label for="floatingInputValue">Price (Rp.)</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="text" name="stok" required="required" class="form-control">
                        <label for="floatingInputValue">Stock</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="file" name="gambar" required="required" class="form-control">
                        <label for="floatingInputValue">Image</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection