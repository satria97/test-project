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
                        <form action="{{url('post/insert-proses')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-4">
                                    <select class="form-select" name="category_id">
                                        <option value="">--Pilih Kategori--</option>
                                        @foreach($categories as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" value="{{old('title')}}">
                                </div>
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row mb-3">
                                <label for="author" class="col-sm-2 col-form-label">Penulis</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control  @error('author') is-invalid @enderror" name="author" id="author" value="{{old('author')}}">
                                </div>
                                @error('author')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row mb-3">
                                <label for="body" class="col-sm-2 col-form-label">Isi Artikel</label>
                                <div class="col-sm-4">
                                    <textarea name="body" class="form-control" id="" cols="20" rows="10">{{ old('body') }}</textarea>
                                </div>
                                @error('body')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="float-sm-end">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                        <a href="{{ url('') }}" class="btn btn-secondary">Batal</a>
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