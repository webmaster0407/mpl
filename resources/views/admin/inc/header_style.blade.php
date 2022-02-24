<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendors Styles(used by this page)-->
<link href="{{ asset('assets/admin/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles-->
<!--begin::Global Theme Styles(used by all pages)-->
<link href="{{ asset('assets/admin/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles-->
<!--begin::Layout Themes(used by all pages)-->
<link href="{{ asset('assets/admin/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css" />
<!--end::Layout Themes-->
<link rel="shortcut icon" href="{{ asset('assets/admin/media/logos/favicon.ico')}}" />


<!-- begin::custom styles -->
@if(isset($page_sub_title) && ($page_sub_title == 'Talents'))
<link href="{{ asset('assets/admin/css/custom/talents.css')}}" rel="stylesheet" type="text/css" />
@endif
@if(isset($page_sub_title) && ($page_sub_title == 'Clients'))
<link href="{{ asset('assets/admin/css/custom/clients.css')}}" rel="stylesheet" type="text/css" />
@endif
@if(isset($page_sub_title) && ($page_sub_title == 'Find Talent'))
<link href="{{ asset('assets/admin/css/custom/find-talent.css')}}" rel="stylesheet" type="text/css" />
@endif
@if(isset($page_sub_title) && ($page_sub_title == 'Categories'))
<link href="{{ asset('assets/admin/css/custom/categories.css')}}" rel="stylesheet" type="text/css" />
@endif
@if(isset($page_sub_title) && ($page_sub_title == 'CMS'))
<link href="{{ asset('assets/admin/css/custom/cms.css')}}" rel="stylesheet" type="text/css" />
@endif
@if(isset($page_sub_title) && ($page_sub_title == 'Change Password'))
<link href="{{ asset('assets/admin/css/custom/changepassword.css')}}" rel="stylesheet" type="text/css" />
@endif
@if(isset($page_sub_title) && ($page_sub_title == 'Update Profile'))
<link href="{{ asset('assets/admin/css/custom/updateprofile.css')}}" rel="stylesheet" type="text/css" />
@endif
<!-- end::custom styles -->