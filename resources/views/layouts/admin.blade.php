@include('fixed.header')
<div class="admin_part">
    @include('admin.admin_navigation')
    <div class="admin_layout_content">
        @yield('admin_part')
        <p class="error_text" id="error_text">
            @if(session()->has('message'))
                {{ session('message') }}
            @endif
            @isset($errors)
                @foreach(($errors->all()) as $er)
                    {{$er}}
                @endforeach
            @endisset
        </p>
    </div>
</div>
@include('fixed.footer')
