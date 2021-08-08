@extends('admin.layouts.app')

@section('title',__('actions.edit-item',['name' => trans_choice('labels.role',1)]))
@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush
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
{{--                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__("labels.dashboard")}}</a></li>--}}
                            <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">{{trans_choice("labels.user",3)}}</a></li>
                            <li class="breadcrumb-item active">{{__("actions.update")}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>



@endsection
@push('js')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

    <!-- Select2 -->
{{--    <script>--}}
{{--        //Initialize Select2 Elements--}}
{{--        $('.select2').select2({--}}
{{--            minimumInputLength:0,--}}
{{--            cache:true,--}}
{{--            ajax: {--}}
{{--                delay: 250,--}}
{{--                url: '{{route('user.roles.index')}}',--}}
{{--                dataType: 'json',--}}
{{--                processResults: function ({roles}, params) {--}}
{{--                    let fData = $.map(roles, function (obj) {--}}
{{--                        obj.text = obj.name; // replace name with the property used for the text--}}
{{--                        return obj;--}}
{{--                    });--}}

{{--                    return {--}}
{{--                        results: fData,--}}
{{--                    };--}}
{{--                }--}}
{{--            }--}}
{{--        })--}}


{{--    </script>--}}
@endpush
