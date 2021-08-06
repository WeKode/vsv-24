@auth
<a href="{{route('cart.index')}}" class="text-decoration-none">
    <div class="position-fixed bg-warning text-black shadow-sm" style="bottom: 50px; right: 50px; z-index: 999;width: 60px;height: 60px;display: flex;justify-content: center;align-items: center;border-radius: 50%">
        <i class="fas fa-shopping-cart text-black"></i><span class="badge bg-danger small position-absolute text-light" style="top: -5px;right: -5px;">{{$count}}</span>
    </div>
</a>
@endauth
