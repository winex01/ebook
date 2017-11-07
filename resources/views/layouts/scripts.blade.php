

<!-- jQuery 2.2.3 -->
<script src="{{ url('adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ url('adminlte/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ url('js/custom.js') }}"></script>

{{-- <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script> --}}

<script src="{{ url('datatables/js/jquery.dataTables.min.js') }}"></script>

{{-- <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script> --}}
<script src="{{ url('datatables/js/datatables.bootstrap.js') }}"></script>


<!-- SlimScroll -->
<script src="{{ url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('adminlte/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('adminlte/dist/js/app.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ url('adminlte/dist/js/demo.js') }}"></script> --}}

{{-- search bar autocomplete --}}
<script src="{{ url('js/jquery-ui.js') }}"></script>

<script type="text/javascript">
	$(function() {
	  $("#search-bar").autocomplete({
	    source: '{{ url('search/autocomplete') }}',
	  });
	});
</script>