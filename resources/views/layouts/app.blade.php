<html>
    <head>
        <title>@yield('title')</title>
        <style>
            body {
                font-size:16px;
                color:#999;
                margin: 5px;
            }
            .menutitle {
                font-size:14px;
                font-weight:bold;
                margin: 0px;
            }
            .content {
                margin:10px;
            }
            .footer {
                text-align:right;
                font-size:10px;
                margin:10px;
                border-bottom:solid 1px #ccc;
                color:#ccc;
            }
        </style>
    </head>
    <body>
        <h1>@yield('title')</h1>
        <hr size="1">
        <div class="content">
            @yield('content')
        </div>
        @component('components.footer')
        @endcomponent
    </body>
</html>