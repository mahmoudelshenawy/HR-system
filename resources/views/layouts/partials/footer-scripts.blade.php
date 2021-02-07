<!-- jQuery -->
        <script src="{{asset(App::getLocale().'/js/jquery-3.2.1.min.js')}}"></script>
            <script src="{{ mix('js/app.js') }}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{asset(App::getLocale().'/js/popper.min.js')}}"></script>
        @if(App::getLocale()=='ar')
		<script src="{{asset('ar/plugins/bootstrap-rtl/js/bootstrap.min.js')}}"></script>
        @else
            <script src="{{asset(App::getLocale().'/js/bootstrap.min.js')}}"></script>
        @endif
		<!-- Slimscroll JS -->
		<script src="{{asset(App::getLocale().'/js/jquery.slimscroll.min.js')}}"></script>
		<!-- Select2 JS -->
		<script src="{{asset(App::getLocale().'/js/select2.min.js')}}"></script>

		<script src="{{asset(App::getLocale().'/js/jquery-ui.min.js')}}"></script>
		<script src="{{asset(App::getLocale().'/js/jquery.ui.touch-punch.min.js')}}"></script>

		<!-- Datetimepicker JS -->
		<script src="{{asset(App::getLocale().'/js/moment.min.js')}}"></script>
		<script src="{{asset(App::getLocale().'/js/bootstrap-datetimepicker.min.js')}}"></script>

		<!-- Calendar JS -->
		<script src="{{asset(App::getLocale().'/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset(App::getLocale().'/js/fullcalendar.min.js')}}"></script>
        <script src="{{asset(App::getLocale().'/js/jquery.fullcalendar.js')}}"></script>

		<!-- Multiselect JS -->
		<script src="{{asset(App::getLocale().'/js/multiselect.min.js')}}"></script>



		<!-- Summernote JS -->
		<script src="{{asset(App::getLocale().'/plugins/summernote/dist/summernote-bs4.min.js')}}"></script>


		<script src="{{asset(App::getLocale().'/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>

		<!-- Task JS -->
		<script src="{{asset(App::getLocale().'/js/task.js')}}"></script>

		<!-- Dropfiles JS
		<script src="js/dropfiles.js"></script> -->
		<!-- Custom JS -->
		<script src="{{asset(App::getLocale().'/js/app.js')}}"></script>
		<script src="{{asset('js/notify.min.js')}}"></script>

<!-- dataTables js files  -->
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/searchpanes/1.1.1/js/dataTables.searchPanes.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.21/sorting/datetime-moment.js"></script>
<script src="{{asset(App::getLocale().'/js/dataTables.bootstrap4.min.js')}}"></script>

<!---------------   select drop menue  js file ----------------->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="{{asset('pdf/pdfmake.min.js')}}"></script>
<script src="{{asset('pdf/vfs_fonts.js')}}"></script>

<script>
		$(".header").stick_in_parent({

		});
		// This is for the sticky sidebar
		$(".stickyside").stick_in_parent({
			offset_top: 60
		});
		$('.stickyside a').click(function() {
			$('html, body').animate({
				scrollTop: $($(this).attr('href')).offset().top - 60
			}, 500);
			return false;
		});
		// This is auto select left sidebar
		// Cache selectors
		// Cache selectors
		var lastId,
			topMenu = $(".stickyside"),
			topMenuHeight = topMenu.outerHeight(),
			// All list items
			menuItems = topMenu.find("a"),
			// Anchors corresponding to menu items
			scrollItems = menuItems.map(function() {
				var item = $($(this).attr("href"));
				if (item.length) {
					return item;
				}
			});

		// Bind click handler to menu items


		// Bind to scroll
		$(window).scroll(function() {
			// Get container scroll position
			var fromTop = $(this).scrollTop() + topMenuHeight - 250;

			// Get id of current scroll item
			var cur = scrollItems.map(function() {
				if ($(this).offset().top < fromTop)
					return this;
			});
			// Get the id of the current element
			cur = cur[cur.length - 1];
			var id = cur && cur.length ? cur[0].id : "";

			if (lastId !== id) {
				lastId = id;
				// Set/remove active class
				menuItems
					.removeClass("active")
					.filter("[href='#" + id + "']").addClass("active");
			}
		});
		$(function () {
			$(document).on("click", '.datatable_columns-add-row', function () {
				var id = $(this).closest("table.table-review").attr('id');  // Id of particular table
				console.log(id);
				var div = $("<tr />");
				div.html(GetDynamicTextBox(id));
				$("#"+id+"_tbody").append(div);
			});
			$(document).on("click", "#comments_remove", function () {
				$(this).closest("tr").prev().find('td:last-child').html('<button type="button" class="datatable_columns datatable_columns-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button>');
				$(this).closest("tr").remove();
			});
			function GetDynamicTextBox(table_id) {
				$('#comments_remove').remove();
				var rowsLength = document.getElementById(table_id).getElementsByTagName("tbody")[0].getElementsByTagName("tr").length+1;
				return '<td>'+rowsLength+'</td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><button type="button" class="datatable_columns datatable_columns-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button></td>'
			}
		});
////////////////////////// select form style ////////////////////////////////

         $(".js-example-matcher-start").select2({
             width: '100%',
             minHeight:'100%',
             lineHeight:'44px',
         });
        ////////////////////////// datatime input format ////////////////////////////////

        $('.datetimepicker').datetimepicker({
             format: 'DD/MM/YYYY',
             locale: 'en'
         });
        //////////////////////////  datatime input format only monthly ////////////////////////////////

        $('.datetimepicker_monthly').datetimepicker({
             format: 'MM/YYYY',
             locale: 'en'
         });

        //////////////////////////  caret style > like tree ////////////////////////////////

        var toggler = document.getElementsByClassName("caret");
         var i;

         for (i = 0; i < toggler.length; i++) {
             toggler[i].addEventListener("click", function() {
                 this.parentElement.querySelector(".nested").classList.toggle("active");
                 this.classList.toggle("caret-down");
             });

         }

        </script>

<!-------------------------img preview before upload -------------->
<script>
    $(document).ready(function(){
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgInp").change(function(){
            readURL(this);
        });
    })
</script>
@yield('js')
