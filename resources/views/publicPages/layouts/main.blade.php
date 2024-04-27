<!DOCTYPE html>
<html lang="en">
@include('publicPages.includes.head')
<body>
<main class="p-0">
    @include('publicPages.includes.navbar')
    @yield('publicPagesContent')
    @include('publicPages.includes.footer')
</main>
<div class="toast-container position-fixed bottom-0 end-0" style="z-index: 1000;">
</div>
</body>
@include('publicPages.includes.footerJs')
@yield('publicPagesExtraJS')
</html>
