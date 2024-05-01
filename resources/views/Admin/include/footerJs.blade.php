<script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

<script src="{{asset('admin/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
<script src="{{asset('admin/vendors/select2/select2.min.js')}}"></script>

<script src="{{asset('admin/js/template.js')}}"></script>
<script src="{{asset('admin/js/settings.js')}}"></script>

<script src="{{asset('admin/js/dashboard.js')}}"></script>
<script src="{{asset('admin/js/file-upload.js')}}"></script>
<script src="{{asset('admin/js/typeahead.js')}}"></script>
<script src="{{asset('admin/js/select2.js')}}"></script>

<script src="{{asset('admin/js/welcome-txt.js')}}"></script>
<script src="{{asset('admin/js/table-pagination.js')}}"></script>
<script src="{{asset('admin/js/add-event-agenda.js')}}"></script>

<script src="{{asset('admin/js/edit.js')}}"></script>
<script src="{{asset('admin/js/stylingTags.js')}}"></script>
<script src="{{asset('admin/js/edit_form.js')}}"></script>
<script src="{{asset('admin/js/maps.js')}}"></script>
<script src="{{asset('admin/js/toast.js')}}"></script>

<script>
    setTimeout(function () {
        var navLinks = document.querySelectorAll('.nav-link, .nav-item, .collapse');

        navLinks.forEach(function (link) {
            link.classList.remove('active');
            link.classList.remove('show');
        });
    }, 100);
</script>
