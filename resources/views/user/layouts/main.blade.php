<!doctype html>
<html lang="en">

<head>
    @include("user.layouts.header")
    @yield("header")
    <title>Hello, world!</title>
</head>

<body class="d-flex flex-column min-vh-100">
    @include("user.layouts.navbar")
    @yield("content")
    @include("user.layouts.footer")
    @include("user.layouts.script")
    @yield("script")
</body>

</html>
