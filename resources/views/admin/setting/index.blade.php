@extends("admin.layouts.app")

@section("title",__('labels.settings'))

@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('actions.create')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
{{--                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__("labels.dashboard")}}</a></li>--}}
                            <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">{{ trans_choice('labels.product',3)}}</a></li>
                            <li class="breadcrumb-item active">{{__("actions.add-new",['name' => trans_choice('labels.product',1)])}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-edit"></i>
                {{__('labels.settings')}}
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-5 col-sm-3">
                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="vert-tabs-general-tab" data-toggle="pill" href="#vert-tabs-general" role="tab" aria-controls="vert-tabs-general" aria-selected="true">{{__('labels.general')}}</a>
                        <a class="nav-link" id="vert-tabs-contact-tab" data-toggle="pill" href="#vert-tabs-contact" role="tab" aria-controls="vert-tabs-contact" aria-selected="true">{{__('labels.contact')}}</a>
                        <a class="nav-link" id="vert-tabs-site-logo-tab" data-toggle="pill" href="#vert-tabs-site-logo" role="tab" aria-controls="vert-tabs-site-logo" aria-selected="false">{{__('labels.logo')}}</a>
                        <a class="nav-link" id="vert-tabs-social-links-tab" data-toggle="pill" href="#vert-tabs-social-links" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">{{__('labels.social_links')}}</a>
{{--                        <a class="nav-link" id="vert-tabs-payment-tab" data-toggle="pill" href="#vert-tabs-payment" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">{{trans_choice('labels.payment',1)}}</a>--}}
                    </div>
                </div>
                <div class="col-7 col-sm-9">
                    <div class="tab-content" id="vert-tabs-tabContent">
                        <div class="tab-pane text-left fade show active" id="vert-tabs-general" role="tabpanel" aria-labelledby="vert-tabs-general-tab">
                            @include("admin.setting.general")
                        </div>
                        <div class="tab-pane text-left fade " id="vert-tabs-contact" role="tabpanel" aria-labelledby="vert-tabs-contact-tab">
                            @include("admin.setting.contact")
                        </div>
                        <div class="tab-pane fade" id="vert-tabs-site-logo" role="tabpanel" aria-labelledby="vert-tabs-site-logo-tab">
                            @include("admin.setting.site_logo")
                        </div>
                        <div class="tab-pane fade" id="vert-tabs-social-links" role="tabpanel" aria-labelledby="vert-tabs-social-links-tab">
                            @include("admin.setting.social_links")
                        </div>
{{--                        <div class="tab-pane fade" id="vert-tabs-payment" role="tabpanel" aria-labelledby="vert-tabs-payment-tab">--}}
{{--                            @include("admin.setting.payment")--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
        </section>
@endsection

