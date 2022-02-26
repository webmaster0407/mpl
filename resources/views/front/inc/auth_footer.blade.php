<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="{{ asset('assets/front/js/jquery.blockUI.js')}}"></script>
<script src="{{ asset('assets/front/js/sweetalert/sweetalert.min.js')}}"></script>
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
<script type="text/javascript">
    Dropzone.autoDiscover = false;
    var UPLOAD_PHOTO_BEFORE_REGISTER_URL    = "{{ route('uploadPhotosBeforeRegister') }}";
    var DELETE_PHOTO_BEFORE_REGISTER_URL    = "{{ route('deletePhotosBeforeRegister') }}";
    var DELETE_PHOTO_WHEN_USER_LEAVE_REGISTER_WINDOW    = "{{ route('deletePhotosWhenUserLeaveRegisterWindow') }}";
    var LOGIN_URL = "{{ route('login') }}";
</script>
<script src="{{ asset('assets/front/js/main.js')}}"></script>
<script src="{{ asset('assets/front/js/auth.js')}}"></script>
