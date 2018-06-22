<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <meta name="env" content="{{ app('env') }}">
    <meta name="token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}" type="image/x-icon">

    <link rel="apple-touch-icon" href="{{ asset('/img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/img/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/img/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/img/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/img/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/img/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/img/apple-touch-icon-152x152.png') }}">

    <title>{{ $page_title or $site_title }}</title>

    <script>
        window.Global = {}
        Global.locale = '{{ $app_locale }}';
        Global.csrfToken = '{{ csrf_token() }}';
    </script>

    @if($enable_external_dependencies)
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset={{ $font_subset }}" rel="stylesheet" type="text/css">
    @endif
    <link rel="stylesheet" href="{{ mix('dist/css/dashboard/dashboard.css') }}">
    @yield('css')

    @include('partials.crowdin')

    <script src="{{ mix('dist/js/manifest.js') }}"></script>
    <script src="{{ mix('dist/js/vendor.js') }}"></script>
</head>

<body class="dashboard">
    <div class="wrapper" id="app">
        <dashboard inline-template :user="{{ $current_user }}">
            <div>
                @include('dashboard.partials.sidebar')
                <div class="page-content">
                    @if(!$is_writeable)
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-info">
                                    {!! trans('dashboard.writeable_settings') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </dashboard>
    </div>
</body>
@yield('js')
<script src="{{ mix('dist/js/all.js') }}"></script>
</html>
