@extends('front.layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border-0 rounded-0 shadow-sm px-3 px-lg-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 px-0">
                                    <h2 class="text-capitalize py-2">Profile</h2>
                                    <hr>
                                </div>
                                <div class="col-12 pe-lg-2 px-0 mb-3 d-flex justify-content-center bg-blue py-5">
                                    <div class="image" style="height: 150px; width: 150px; border-radius: 50%; background-image: url('{{user()->pic_url}}');"></div>
                                </div>
                                <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                    <div class="text-secondary small mb-1">{{__('labels.first_name')}}</div>
                                    <div>{{user()->first_name ?? '/'}}</div>
                                </div>
                                <div class="col-lg-6 ps-lg-2 px-0 mb-3">
                                    <div class="text-secondary small mb-1">{{__('labels.last_name')}}</div>
                                    <div>{{user()->last_name ?? '/'}}</div>
                                </div>
                                <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                    <div class="text-secondary small mb-1">{{__('labels.gender')}}</div>
                                    <div>{{user()->gender ? __('labels.'.user()->gender) : '/'}}</div>
                                </div>
                                <div class="col-lg-6 ps-lg-2 px-0 mb-3">
                                    <div class="text-secondary small mb-1">{{__('labels.birth_date')}}</div>
                                    <div>{{user()->birth_date ? user()->birth_date->format('d-m-Y') : '/'}}</div>
                                </div>
                                <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                    <div class="text-secondary small mb-1">{{__('labels.phone')}}</div>
                                    <div>{{user()->phone ?? '/'}}</div>
                                </div>
                                <div class="col-lg-6 ps-lg-2 px-0 mb-3">
                                    <div class="text-secondary small mb-1">Email address</div>
                                    <div>{{user()->email}}</div>
                                </div>
                                <div class="col-12 pe-lg-2 px-0 mb-3">
                                    <div class="text-secondary small mb-1">{{__('labels.address')}}</div>
                                    <div>{{user()->addressFromat()}}</div>
                                </div>

                                <div class="col-12 px-0">
                                    <hr>
                                </div>
                                <div class="col-12 px-0 py-3 text-end">
                                    <a href="{{route('profile.edit')}}" class="btn bg-blue text-light py-3" style="width: 150px;">{{__('actions.edit')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
