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
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Nama Kategori</th>
                                    <th>Slug</th>
                                    <th class="text-right">Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    if(empty($_GET['page']))
                                    $i = 1;
                                    else
                                    $i = ($_GET['page'] * $categories->count()) - ($categories->count() - 1);
                                @endphp
                                @foreach ($categories as $cate)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $cate->name }}</td>
                                        <td>{{ $cate->slug }}</td>
                                        <td class="text-right">
                                            <a href="#" @click="editData({{ $cate}})" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="form" tab-index="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form :action="actionUrl" method="cate" autocomplete="off">
                        <div class="modal-header">
                            <h4 class="modal-title" v-if="!editStatus">Tambah Kategori</h4>
                            <h4 class="modal-title" v-if="editStatus">Edit Kategori</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="name" class="col-sm-4 col-form-label">Nama Kategori</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" :value="data.name">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row mb-3">
                                <label for="slug" class="col-sm-4 col-form-label">Slug</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  @error('slug') is-invalid @enderror" name="slug" id="slug" :value="data.slug">
                                </div>
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn bnt-default" data-dismiss="modal">Close</button>
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
    var controller = new Vue({
        el : '#controller',
        data: {
            editStatus: false,
            data: {}
            actionUrl: ''
        },
        mounted: function() {

        },
        methods: {
            addData() {
                this.editStatus = false;
                this.actionUrl = '{{ url('data/cate') }}';
                this.data = {};
                $('#form').modal();
            },
            editData(cate) {
                this.editStatus = true;
                this.actionUrl = '{{ url('data/cate') }}'+'/'+cate.id;
                this.data = cate;
                $('#form').modal();
            }
        }
    });
    </script>
@endpush