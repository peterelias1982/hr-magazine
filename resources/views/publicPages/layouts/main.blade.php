<!DOCTYPE html>
<html lang="en">
@include('publicPages.includes.head')
<body>
<main class="p-0">
    @include('publicPages.includes.navbar')
    @yield('publicPagesContent')
    @include('publicPages.includes.footer')
</main>
</body>
@include('publicPages.includes.footerJs')
@yield('publicPagesExtraJS')
</html>
