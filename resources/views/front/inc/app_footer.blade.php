<footer class="footer-talent">
    <div class="container">
        <p class="copyright">©Copyright <strong>MPL</strong>. {{ __('All rights reserved')}}</p>
    </div>
</footer>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="{{ asset('assets/front/js/jquery.blockUI.js')}}"></script>
<script src="{{ asset('assets/front/js/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{ asset('assets/front/js/main.js')}}"></script>

@if(isset($page_sub_title) && ($page_sub_title == 'Find By Category'))
<script type="text/javascript" src="{{ asset('assets/front/js/search.js') }}"></script>
@endif
@if(isset($page_sub_title) && ($page_sub_title == 'Profile'))
<script type="text/javascript" src="{{ asset('assets/front/js/profile.js') }}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script> -->
<!-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> -->
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
<script type="text/javascript">
    Dropzone.autoDiscover = false;
</script>
@endif
@if(isset($page_sub_title) && ($page_sub_title == 'Change Password'))
<script type="text/javascript" src="{{ asset('assets/front/js/changepassword.js') }}"></script>
@endif

