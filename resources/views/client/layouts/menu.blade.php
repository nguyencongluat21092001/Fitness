<style>
    .nav-link:hover{
        background: #ffffff;
        color: #00b609 !important
    }
</style>
<div class="" style="border-radius: 50px;margin:auto">
    <ul class="nav navbar-nav d-flex justify-content-between text-center text-dark">
        @foreach($menuItems as $key => $value)
        <li class="nav-item ">
            <a class="nav-link link-{{$key}}" style="color:white" href="{{ url('client') }}/{{$key}}/index"></i><i class="{{$value['icon']}}"></i> {{$value['name']}}</a>
        </li>
        @endforeach
    </ul>

    @foreach($menuItems as $key => $value)
    @if(!empty($value['child']) && strpos($_SERVER['REQUEST_URI'], $key))
    <div class="container d-flex justify-content-between align-items-center link-datafinancial active-menuClient">
        <div class="" id="navbar-toggler-success">
            <div class="" style="border-radius:50%;margin:auto">
                <ul class="navbar-nav d-flex justify-content-between text-dark">
                    @foreach($value['child'] as $keyChild => $child)
                    <li class="nav-item">
                        <a class="nav-link link-{{$keyChild}}" style="color:black;" href="{{ url('client') }}/{{$key}}/{{$keyChild}}"></i><i class="{{$child['icon']}}"></i> {{$child['name']}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif
    @endforeach

</div>