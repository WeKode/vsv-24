@extends('admin.layouts.app')

@section('title',__('actions.edit-item',['name' => trans_choice('labels.attribute',1)]))

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
                            <li class="breadcrumb-item"><a href="{{route('admin.attributes.index')}}">{{trans_choice("labels.attribute",3)}}</a></li>
                            <li class="breadcrumb-item active">{{__("actions.update")}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="row">
                <!-- Default box -->
                <div class="card card-primary col-md-6">
                    <div class="card-header">
                        <h3 class="card-title">{{__('actions.edit')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('admin.attributes.update',$attribute->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="type">{{__('labels.type')}}</label>
                                <select class="form-control @error('type') is-invalid @enderror"
                                        required name="type" id="type" data-placeholder="{{__('labels.type')}}">
                                    <option value="1" {{old('type', $attribute->type) == 1 ? 'selected' : ''}}>{{__('labels.smartphone')}}</option>
                                    <option value="2" {{old('type', $attribute->type) == 2 ? 'selected' : ''}}>{{__('labels.phone-plan')}}</option>
                                    <option value="3" {{old('type', $attribute->type) == 3 ? 'selected' : ''}}>{{__('labels.energy-plan')}}</option>
                                </select>
                                @error('type')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">{{__('labels.name')}}</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       required name="name" value="{{old('name',$attribute->name)}}"
                                       id="name" placeholder="{{__('labels.name')}}">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{__('labels.submit')}}</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

@endsection

