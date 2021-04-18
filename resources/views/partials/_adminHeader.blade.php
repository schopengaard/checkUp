<div class="col-sm-12 mb-3">
	<div class="row">
		<h3 class="col-sm-10">
			<a href="{{ route('admin.dashboard') }}" class="btn-lg nodeco mainBtn mainColor0" style="font-size: 20pt;">
				{{ Auth::user()->fullName }}
				<small class="topSmallText"> &commat;{{ Auth::user()->username }}</small>
			</a>
		</h3>
		<h4 class="col-sm-2 text-">
			<a href="{{ action('AdminController@edit_admin', Auth::user()->id) }}" class="btn mainColor2 mt-2 mb-4" style="padding: 0 8px 2px 8px;">
				<small>Update Profile</small>
			</a>
		</h4>
	</div>
	<h6 class="topSmallText">Admin {{ Auth::user()->id }}</h6>
</div>
