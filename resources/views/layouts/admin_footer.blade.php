

<footer >
</footer>

<!-- BEGIN VENDOR JS-->
<script src="{{ asset('/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/vendors/js/ui/tether.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/js/core/libraries/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/vendors/js/ui/unison.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/vendors/js/ui/blockUI.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/vendors/js/ui/jquery.matchHeight-min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/vendors/js/ui/screenfull.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/vendors/js/extensions/pace.min.js') }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('/app-assets/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="{{ asset('/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/js/core/app.js') }}" type="text/javascript"></script>
<!-- END ROBUST JS-->
<script src="{{ asset('/app-assets/js/scripts/pages/dashboard-lite.js') }}"
        type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL JS-->
@yield('scripts')
<!-- END PAGE LEVEL JS-->
</body>
</html>
