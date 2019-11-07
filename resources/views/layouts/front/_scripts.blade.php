<!-- Plugins JS File -->

<script src="{{ asset('back/vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('back/vendor/bootstrap/js/bootstrap.js') }}"></script>

<script src="{{ asset('assets/frontend/js/plugins.min.js') }}"></script>
@stack('library-js')
<!-- Main JS File -->
<script src="{{ asset('assets/frontend/js/main.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/cart.js') }}"></script>
@stack('custom-js')
