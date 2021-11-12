@extends('template')
@section('title')
    Data Artikel
@endsection
@section('content')
<component id="controller">
    <div class="container">
        <div class="row py-3">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="float-sm-start">
                                    <h4>Data Artikel</h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="float-sm-end">
                                    <a href="#" @click="addData()" class="btn btn-sm btn-success"><i class="fas fa-plus">Tambah</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Kategori</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Tgl Publikasi</th>
                                    <th class="text-right">Pilihan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-default" tab-index="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form :action="actionUrl" method="post" autocomplete="off" @submit="submitForm($event, data.id)">
                        <div class="modal-header">
                            <h4 class="modal-title" v-if="!editStatus">Tambah Artikel</h4>
                            <h4 class="modal-title" v-if="editStatus">Edit Artikel</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Kategori</label>
                                <div class="col-sm-8">
                                    <select class="form-select" name="category_id">
                                        <option value="">--Pilih Kategori--</option>
                                        @foreach($categories as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="title" class="col-sm-4 col-form-label">Judul</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" :value="data.title">
                                </div>
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row mb-3">
                                <label for="author" class="col-sm-4 col-form-label">Penulis</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  @error('author') is-invalid @enderror" name="author" id="author" :value="data.author">
                                </div>
                                @error('author')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row mb-3">
                                <label for="body" class="col-sm-4 col-form-label">Isi Artikel</label>
                                <div class="col-sm-8">
                                    <textarea name="body" class="form-control" id="" cols="10" rows="10"></textarea>
                                </div>
                                @error('body')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</component>
@endsection
@push('js')
    <script type="text/javascript">
    var actionUrl = '{{url('data/category')}}';
    var column = [
        {data: 'name', class: 'text-center', orderable: true},
        {data: 'slug', class: 'text-center', orderable: true},
        {render. function(index, row, data, meta) {
            return ` 
                <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, $(meta.row))">
                    Edit
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event, $(data.id))">
                    Delete
                </a>`;
        },
        orderable: false, width: '100px', class: 'text-center'},
    ];
    </script>
    <script src="{{asset('js/data.js')}}"><script>
@endpush