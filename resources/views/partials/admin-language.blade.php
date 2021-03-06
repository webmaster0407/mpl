<?php 
    $locale = "en";
    if (Session::has('locale')) {
        $locale = session('locale'); 
    }
    
    $prefix = "en";
    if ($locale === "zh-cn") $prefix = "cn";
    if ($locale === "zh-hk") $prefix = "hk";

	$en_flg_img_src = asset('assets/admin/media/svg/flags/226-united-states.svg');
	$cn_flg_img_src = asset('assets/admin/media/svg/flags/034-china.svg');
	$hk_flg_img_src = asset('assets/admin/media/svg/flags/183-hong-kong.svg');
?>
<!-- begin::language bar -->
<?php 
    if ($prefix === 'en') {
?>
<!--begin::Languages-->
<div class="dropdown">
	<!--begin::Toggle-->
	<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
		<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
			<img class="h-20px w-20px rounded-sm" src="{{ $en_flg_img_src }}" alt="" />
		</div>
	</div>
	<!--end::Toggle-->
	<!--begin::Dropdown-->
	<div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
		<!--begin::Nav-->
		<ul class="navi navi-hover py-4">
			<!--begin::Item-->
			<li class="navi-item active">
				<a href="{{route('zh-cn')}}" class="navi-link">
					<span class="symbol symbol-20 mr-3">
						<img src="{{ $cn_flg_img_src }}" alt="" />
					</span>
					<span class="navi-text">{{ __('China')}}</span>
				</a>
			</li>
			<!--end::Item-->
			<!--begin::Item-->
			<li class="navi-item">
				<a href="{{route('zh-hk')}}" class="navi-link">
					<span class="symbol symbol-20 mr-3">
						<img src="{{ $hk_flg_img_src }}" alt="" />
					</span>
					<span class="navi-text">{{ __('Hong Kong')}}</span>
				</a>
			</li>
			<!--end::Item-->
		</ul>
		<!--end::Nav-->
	</div>
	<!--end::Dropdown-->
</div>
<!--end::Languages-->
<?php 
    } else if ($prefix === 'cn') {
?>
<!--begin::Languages-->
<div class="dropdown">
	<!--begin::Toggle-->
	<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
		<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
			<img class="h-20px w-20px rounded-sm" src="{{ $cn_flg_img_src }}" alt="" />
		</div>
	</div>
	<!--end::Toggle-->
	<!--begin::Dropdown-->
	<div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
		<!--begin::Nav-->
		<ul class="navi navi-hover py-4">
			<!--begin::Item-->
			<li class="navi-item">
				<a href="{{route('zh-hk')}}" class="navi-link">
					<span class="symbol symbol-20 mr-3">
						<img src="{{ $hk_flg_img_src }}" alt="" />
					</span>
					<span class="navi-text">{{ __('Hong Kong')}}</span>
				</a>
			</li>
			<!--end::Item-->
			<!--begin::Item-->
			<li class="navi-item active">
				<a href="{{route('en')}}" class="navi-link">
					<span class="symbol symbol-20 mr-3">
						<img src="{{ $en_flg_img_src }}" alt="" />
					</span>
					<span class="navi-text">{{__('English')}}</span>
				</a>
			</li>
			<!--end::Item-->
		</ul>
		<!--end::Nav-->
	</div>
	<!--end::Dropdown-->
</div>
<!--end::Languages-->
<?php 
    } else {
?>
<!--begin::Languages-->
<div class="dropdown">
	<!--begin::Toggle-->
	<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
		<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
			<img class="h-20px w-20px rounded-sm" src="{{ $hk_flg_img_src }}" alt="" />
		</div>
	</div>
	<!--end::Toggle-->
	<!--begin::Dropdown-->
	<div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
		<!--begin::Nav-->
		<ul class="navi navi-hover py-4">
			<!--begin::Item-->
			<li class="navi-item active">
				<a href="{{route('zh-cn')}}" class="navi-link">
					<span class="symbol symbol-20 mr-3">
						<img src="{{ $cn_flg_img_src }}" alt="" />
					</span>
					<span class="navi-text">{{ __('China')}}</span>
				</a>
			</li>
			<!--end::Item-->
			<!--begin::Item-->
			<li class="navi-item">
				<a href="{{route('en')}}" class="navi-link">
					<span class="symbol symbol-20 mr-3">
						<img src="{{ $en_flg_img_src}}" alt="" />
					</span>
					<span class="navi-text">{{ __('English')}}</span>
				</a>
			</li>
			<!--end::Item-->
		</ul>
		<!--end::Nav-->
	</div>
	<!--end::Dropdown-->
</div>
<!--end::Languages-->
<?php 
    }
?>
<!-- end::language bar -->


