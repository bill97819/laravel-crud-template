<html>

<head>

    <title>@yield('title')</title>

</head>

<body>
    <nav>
        <div>
            <a href="{{ URL::to('pencil') }}">All the Pencils</a>
        </div>
        <ul>
            <li><a href="{{ URL::to('pencil') }}">View All Pencils</a></li>
            <li><a href="{{ URL::to('pencil/create') }}">Create a Pencil</a>
        </ul>
    </nav>

    <h1>@yield('title')</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @yield('content')
    
</body>

</html>