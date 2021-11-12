@extends('template')
@section('title')
    Data Category
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
                                    <h4>Data Kategori</h4>
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
                        <table id="datatable" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Kategori</th>
                                    <th>Slug</th>
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
                    <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
                        <div class="modal-header">
                            <h4 class="modal-title" v-if="!editStatus">Tambah Kategori</h4>
                            <h4 class="modal-title" v-if="editStatus">Edit Kategori</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="name" class="col-sm-4 col-form-label">Nama Kategori</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"  name="name" :value="data.name">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="slug" class="col-sm-4 col-form-label">Slug</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="slug" id="slug" :value="data.slug">
                                </div>
                                @error('slug')
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
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    var actionUrl = '{{url('category')}}';
    var columns = [
        {data: 'name', class: 'text-center', orderable: true},
        {data: 'slug', class: 'text-center', orderable: true},
        {render: function(index, row, data, meta) {
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
    <script src="{{ asset('js/data.js') }}"></script>
@endpush