
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>
					Shop.ru
				</b> 
			</div>
			<strong>
				Copyright &copy; 2016 
			</strong> 
		</footer>
	</div>

	{{ Html::script('plugins/jQuery/jQuery-2.2.0.min.js') }}
	{{ Html::script('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') }}

	<script>
	  $.widget.bridge('uibutton', $.ui.button);
	</script>

	<script>
	  $(function () {
		$("#example1").DataTable();
		$('#example2').DataTable({
		  "paging": true,
		  "lengthChange": false,
		  "searching": false,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});
	  });
	</script>

	{{ Html::script('bootstrap/js/bootstrap.min.js') }}
	{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js') }}
	{{ Html::script('plugins/morris/morris.min.js') }}
	{{ Html::script('plugins/sparkline/jquery.sparkline.min.js') }}
	{{ Html::script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}
	{{ Html::script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}
	{{ Html::script('plugins/knob/jquery.knob.js') }}
	{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js') }}
	{{ Html::script('plugins/daterangepicker/daterangepicker.js') }}
	{{ Html::script('plugins/datepicker/bootstrap-datepicker.js') }}
	{{ Html::script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}
	{{ Html::script('plugins/slimScroll/jquery.slimscroll.min.js') }}
	{{ Html::script('plugins/fastclick/fastclick.js') }}
	{{ Html::script('dist/js/app.min.js') }}
	{{ Html::script('dist/js/pages/dashboard.js') }}
	{{ Html::script('dist/js/demo.js') }}
	<!-- DataTables -->
	{{ Html::script('plugins/datatables/jquery.dataTables.min.js')}}
	{{ Html::script('plugins/datatables/dataTables.bootstrap.min.js')}}
	{{ Html::script('plugins/datatables/jquery.dataTables.js')}}
	{{ Html::script('plugins/datatables/dataTables.bootstrap.js')}}

</body>