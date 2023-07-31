<div>
    <!-- Content Header (Page header) -->
    <section class="content-header mt-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Simple Tables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Simple Tables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Bordered Table</h3>
                            <button wire:click="addNewModule" class="btn btn-primary float-right"><i
                                    class="fa fa-plus-circle mr-1"></i> Add New
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card-tools flex">
                                <x-table.live-search wire:model.live="searchTerm" />
                                <div class="row justify-content-left">
                                    <div class="btn-group btn-group-sm mr-1">
                                        <button type="button" class="btn btn-default">Action</button>
                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu" style="">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-default">Action</button>
                                    </div>
                                </div>
                                <div>

                                </div>
                            </div>
                            <table class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Module Name</th>
                                    <th>Slug</th>
                                    <th style="width: 40px">URL</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($modules as $index => $item)
                                    <tr>
                                        <td>{{ $modules->firstItem() + $index }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            {{ $item->slug }}
                                        </td>
                                        <td>1</td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <x-table.per-page wire:model.live.debounce.150ms="perPage"/>
                            <div>
                                {{ $modules->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->

    <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
         wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form autocomplete="off"
                      wire:submit="saveModule">
                    <div class="modal-body">
                        <div class="card-body">
                            <div wire:ignore class="form-group">
                                <label for="module_id">Module</label>
                                <select class="form-control @error('module_id') is-invalid @enderror"
                                        wire:model="state.module_id">
                                    <option value=""></option>
                                </select>
                                @error('module_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Permission Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" placeholder="Enter your name" wire:model="name" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox"
                                           class="custom-control-input @error('is_active') is-invalid @enderror"
                                           id="is_active"
                                           wire:model.defer="state.is_active">
                                    <label class="custom-control-label" for="is_active">Status</label>
                                </div>
                                @error('is_active')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-check">
                                {{-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label> --}}
                                {{-- <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch> --}}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fa fa-times mr-1"></i>Cancel
                        </button>
                        <button type="submit" class="btn btn-primary"><i
                                class="fa fa-save mr-1"></i>Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
