@extends('front.layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12 px-3 px-lg-0">
                        <h2 class="text-capitalize py-2">Notifications</h2>
                        <hr>
                    </div>
                    @foreach($notifications as $notification)
                    <div class="col-12 px-3 px-lg-0 mb-3">
                        <div class="card border-0 rounded-0 shadow-sm">
                            <div class="card-body">
                                <span class="text-blue-lighten"><i class="fas fa-flag me-2"></i>Notification ·</span> <span class="small text-secondary">{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</span>
                                @switch($notification->type)
                                    @case('1')
                                    <div>Your order has been created successfuly</div>
                                    @break

                                    @case('2')
                                    <div>Your order has been accepted</div>
                                    @break

                                    @case('3')
                                    <div>Your order has been deleted</div>
                                    @break

                                @default
                                    <div>Your order has been accepted successfuly</div>
                                @endswitch
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
