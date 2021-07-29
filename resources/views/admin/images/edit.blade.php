@extends('admin.layouts.app')

@section('title',__('actions.edit-current',['name' => trans_choice('labels.image',1)]))

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
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.dashboard')}}">{{__("labels.dashboard")}}</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.images.index')}}">{{ trans_choice('labels.image',3)}}</a></li>
                            <li class="breadcrumb-item active">{{__("actions.edit-current",['name' => trans_choice('labels.image',1)])}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Default box -->
                <div class="card col-md-7">
                    <div class="card-header">
                        <h3 class="card-title">{{__('actions.update')}}</h3>
                    </div>
                    <form method="post" action="{{route('admin.images.update', $image->id)}}"
                          enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{__('labels.name')}}</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       required name="name" value="{{old('name', $image->name)}}"
                                       id="name" placeholder="{{__('labels.name')}}">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">{{__('labels.type')}}</label>
                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="0"> --{{__('labels.type')}}--</option>
                                    <option value="1"
                                        {{old('type', $image->type) == 1 ? 'selected' : ''}}>{{trans_choice('labels.image',1)}}</option>
                                    <option value="2"
                                        {{old('type', $image->type) == 2 ? 'selected' : ''}}>{{__('labels.logo')}}</option>
                                </select>
                                @error('type')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{__('labels.description')}} <span
                                        class="text-info">({{__('labels.optional')}})</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          name="description"
                                          rows="3"
                                          placeholder="...">{{old('description', $image->description)}}</textarea>
                                @error('description')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="link"
                                               class="custom-file-input @error('link') is-invalid @enderror"
                                               id="imgInput">
                                        <label class="custom-file-label" for="imgInput">Choose file</label>
                                    </div>
                                </div>
                                @error('link')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="is_active">{{__('labels.active')}}</label>
                                <select name="is_active" id="is_active"
                                        class="form-control @error('is_active') is-invalid @enderror">
                                    <option value="1"
                                        {{old('is_active', $image->is_active) == 1 ? 'selected' : ''}}>{{__('labels.active-states.1')}}</option>
                                    <option value="0"
                                        {{old('is_active', $image->is_active) == 0 ? 'selected' : ''}}>{{__('labels.active-states.0')}}</option>
                                </select>
                                @error('is_active')
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
                <div class="card card-primary col-md-4 offset-md-1">
                    <div class="card-body">

                        <div class="form-row">

                            <div class="col-lg-12 mb-3">
                                <div class="d-flex justify-content-center align-items-center rounded w-100 upload"
                                     style="aspect-ratio: 3 / 3; background: #F4F6F9">
                                    @if(isset($image->link))
                                        <img src="{{asset($image->image_url)}}" alt="image" height="100%" id="imagePreview">
                                    @else
                                        <i class="fas fa-images text-muted fa-3x" id="defaultImg"></i>
                                        <img src="" alt="image" height="100%" id="imagePreview" class="d-none">
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection

@push('js')
    <script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        let image = document.querySelector('#imagePreview');
        let input = document.querySelector('#imgInput')
        input.addEventListener('change',event => {
            image.src = URL.createObjectURL(event.target.files[0])
            image.onload = () => {
                URL.revokeObjectURL(image.src) // free memory
            }
            $('#defaultImg').addClass('d-none')
            $('#imagePreview').removeClass('d-none')
        });
    </script>
@endpush
