<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ Admin::title() }} @if($header) | {{ $header }}@endif</title>
    <!-- Tell the browser to be responsive to screen width -->
    {{-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> --}}

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    @if(!is_null($favicon = Admin::favicon()))
    <link rel="shortcut icon" href="{{$favicon}}">
    @endif

    <script src="{{ admin_asset('vendor/laravel-admin/require.js') }}"></script>
    <script src="{{ admin_route('require-config') }}"></script>
    {{-- <script src="{{ asset('vendor/kustomer/js/kustomer.js') }}" defer></script> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script> --}}

{{--    <script src="{{ asset('js/share.js') }}"></script>
 --}}
</head>

<body class="hold-transition {{join(' ', config('admin.theme.layout'))}} {{ config('admin.theme.accent') ? 'accent-'.config('admin.theme.accent') : '' }}" id="bodyhere">

@if($alert = config('admin.top_alert'))
    <div style="text-align: center;padding: 5px;font-size: 12px;background-color: #ffffd5;color: #ff0000;">
        {!! $alert !!}
    </div>
@endif


<div class="wrapper">

    @include('admin::partials.header')
    @include('admin::partials.sidebar')

   {{--  @include('kustomer::kustomer') --}}

    <div class="content-wrapper" id="pjax-container">
        {!! Admin::style() !!}
        @yield('content')
        {!! Admin::html() !!}
        {!! Admin::script() !!}
    </div>
    @include('admin::partials.footer')
</div>

</body>
</html>
