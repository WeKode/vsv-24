@extends('admin.layouts.app')

@section('title',__('actions.edit-current',['name' => trans_choice('labels.unit',1)]))

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('actions.update')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__("labels.dashboard")}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.units.index')}}">{{ trans_choice('labels.unit',3)}}</a></li>
                            <li class="breadcrumb-item active">{{__("actions.edit-current",['name' => trans_choice('labels.unit',1)])}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{__('actions.update')}}</h3>
                </div>
                <form method="post" action="{{route('admin.units.update', $unit->id)}}">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">{{__('labels.name')}}</label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   required name="name" value="{{old('name', $unit->name)}}"
                                   id="name" placeholder="{{__('labels.name')}}">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{__('labels.note')}}</label>
                            <textarea class="form-control @error('note') is-invalid @enderror"
                                      name="note"
                                      rows="3"
                                      placeholder="..."
                                      required >{{old('note', $unit->note)}}</textarea>
                            @error('note')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

@endsection
