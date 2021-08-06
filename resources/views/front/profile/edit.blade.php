@extends('front.layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border-0 rounded-0 shadow-sm px-3 px-lg-4">
                        <div class="card-body">
                            <form class="row" method="post" action="{{route('profile.update')}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-12 px-0">
                                    <h2 class="text-capitalize py-2">{{__('actions.edit-item',['name'=> __('labels.profile')])}}</h2>
                                    <hr>
                                </div>
                                <div class="col-12 pe-lg-2 px-0 mb-3">
                                    <label for="profile_picture" class="form-label">{{__('labels.profile_picture')}}</label>
                                    <input type="file" name="pic"
                                           class="form-control @error('pic') is-invalid @enderror py-3" id="profile_picture">
                                    @error('pic')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                    <label for="first_name" class="form-label">{{__('labels.first_name')}}</label>
                                    <input type="text" value="{{user()->first_name}}" name="first_name" class="form-control @error('first_name') is-invalid @enderror py-3" id="first_name" placeholder="{{__('labels.first_name')}}">
                                    @error('first_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 ps-lg-2 px-0 mb-3">
                                    <label for="last_name" class="form-label">{{__('labels.last_name')}}</label>
                                    <input type="text"  name="last_name" value="{{user()->last_name}}" class="form-control  @error('last_name') is-invalid @enderror py-3" id="first_name" placeholder="{{__('labels.last_name')}}">
                                    @error('last_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror                                </div>
                                <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                    <label for="gender" class="form-label">{{__('labels.gender')}}</label>
                                    <select type="text" name="gender" class="form-select py-3  @error('gender') is-invalid @enderror" id="gender">
                                        <option value="1" disabled selected>{{__('labels.select_item',['name' => __('labels.gender')])}}</option>
                                        <option value="male" {{user()->gender === 'male' ? 'selected' : ''}}>{{__('labels.male')}}</option>
                                        <option value="female" {{user()->gender === 'female' ? 'selected' : ''}}>{{__('labels.female')}}</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 ps-lg-2 px-0 mb-3">
                                    <label for="date" class="form-label">{{__('labels.birth_date')}}</label>
                                    <input type="date" name="birth_date" value="{{user()->birth_date ? user()->birth_date->format('Y-m-d') : ''}}"  class="form-control  @error('birth_date') is-invalid @enderror py-3" id="date">
                                    @error('birth_date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                    <label for="phone" class="form-label">{{__('labels.phone')}}</label>
                                    <input type="text" name="phone"  value="{{user()->phone}}" class="form-control  @error('phone') is-invalid @enderror py-3" id="phone" placeholder="{{__('labels.phone')}}">
                                    @error('phone')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 ps-lg-2 px-0 mb-3">
                                    <label for="email" class="form-label">{{__('labels.email')}}</label>
                                    <input type="email" name="email"  value="{{user()->email}}" class="form-control @error('email') is-invalid @enderror py-3" id="email" placeholder="{{__('labels.email')}}">
                                    @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                    <label for="address"  class="form-label">{{__('labels.address')}}</label>
                                    <input type="text" name="address" value="{{user()->address}}" class="form-control @error('address') is-invalid @enderror py-3" id="address" placeholder="{{__('labels.address')}}">
                                    @error('address')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-3 ps-lg-2 px-0 mb-3">
                                    <label for="city" class="form-label ">{{trans_choice('labels.city',1)}}</label>
                                    <input type="number" name="city"  value="{{user()->city}}" class="form-control @error('city') is-invalid @enderror py-3" id="city" placeholder="{{__('labels.city')}}">

                                    @error('city')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror                                </div>
                                <div class="col-lg-3 ps-lg-2 px-0 mb-3">
                                    <label for="zip_code" class="form-label">{{__('labels.zip_code')}}</label>
                                    <input type="number" name="zip_code"  value="{{user()->zip_code}}" class="form-control @error('zip_code') is-invalid @enderror py-3" id="zip_code" placeholder="{{__('labels.zip_code')}}">
                                    @error('zip_code')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-12 px-0">
                                    <hr>
                                </div>
                                <div class="col-12 px-0 py-3 text-end">
                                    <a href="{{route('profile.index')}}" class="btn bg-blue text-light py-3" style="width: 150px;">{{__('actions.cancel')}}</a>
                                    <button type="submit" class="btn bg-blue text-light py-3" style="width: 150px;">{{__('labels.save')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
