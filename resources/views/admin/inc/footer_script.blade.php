<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('assets/admin/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{ asset('assets/admin/js/scripts.bundle.js')}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->

<!--end::Page Vendors-->
<script src="{{ asset('assets/admin/js/pages/widgets.js')}}"></script>

<!-- begin::custom scripts -->
@if(isset($page_sub_title) && ($page_sub_title == 'Homepage'))
<script src="{{ asset('assets/admin/js/custom/homepage.js')}}"></script>
@endif
@if(isset($page_sub_title) && ($page_sub_title == 'Find Talent'))
<script src="{{ asset('assets/admin/js/custom/find-talent.js')}}"></script>
@endif
@if(isset($page_sub_title) && ($page_sub_title == 'Talents'))
<script src="{{ asset('assets/admin/js/custom/talents.js')}}"></script>
@endif
@if(isset($page_sub_title) && ($page_sub_title == 'Clients'))
<script src="{{ asset('assets/admin/js/custom/clients.js')}}"></script>
@endif
@if(isset($page_sub_title) && ($page_sub_title == 'Categories'))
<script src="{{ asset('assets/admin/js/custom/categories.js')}}"></script>
@endif
@if(isset($page_sub_title) && ($page_sub_title == 'CMS'))
<script src="{{ asset('assets/admin/js/custom/cms.js')}}"></script>
@endif
@if(isset($page_sub_title) && ($page_sub_title == 'Change Password'))
<script src="{{ asset('assets/admin/js/custom/changepassword.js')}}"></script>
@endif
@if(isset($page_sub_title) && ($page_sub_title == 'Update Profile'))
<script src="{{ asset('assets/admin/js/custom/updateprofile.js')}}"></script>
@endif
<!-- end::custom scripts -->