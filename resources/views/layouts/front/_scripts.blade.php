<!-- Plugins JS File -->

<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins.min.js') }}"></script>
@stack('library-js')
<!-- Main JS File -->
<script src="{{ asset('assets/frontend/js/main.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/cart.js') }}"></script>

@stack('custom-js')
