@extends('template')
@section('title')
    Tambah Artikel
@endsection
@section('content')
    <div class="container">
        <div class="row py-3">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Artikel</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('category/insert-proses')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row mb-3">
                                <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control  @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{old('slug')}}">
                                </div>
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="float-sm-end">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                        <a href="{{ url('/category') }}" class="btn btn-secondary">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection