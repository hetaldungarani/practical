<script src="{{ asset('/js/lib/tether/tether.min.js') }}"></script>
<script src="{{ asset('/js/lib/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/plugins.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/lib/select2/select2.full.min.js') }}"></script>

<script src="{{ asset('/js/lib/bootstrap-table/bootstrap-table.js') }}"></script>
<script src="{{ asset('/js/lib/bootstrap-table/bootstrap-table-reorder-rows.min.js') }}"></script>
<script src="{{ asset('/js/lib/bootstrap-table/jquery.tablednd.js') }}"></script>
<script src="{{ asset('/js/lib/bootstrap-table/bootstrap-table-reorder-rows-init.js') }}"></script>
<script src="{{ asset('/js/lib/notie/notie.js') }}"></script>


<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script>

    tinymce.init({
        selector: 'textarea.textareaEditer',
        menubar: false,
        toolbar_items_size: 'small',
        theme: 'modern',
        image_advtab: true,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code textcolor'
        ],
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | formatselect | fontselect fontsizeselect | forecolor backcolor'
    });
</script>

<!-- PARSLEY -->

<script>

    window.ParsleyConfig = {
        errorsWrapper: '<div></div>',
        errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
        errorClass: 'has-error',
        successClass: 'has-success'

    };

</script>

<script>
    $(document).ready(function(){
      $('.dropdown-submenu a.test').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
      });
    });
</script>

<!--<script src="http://parsleyjs.org/dist/parsley.js"></script>-->

<script src="{{ asset('/js/lib/parsley/parsley.js') }}"></script>