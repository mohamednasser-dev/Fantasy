	<option value="">{{trans('admin.choose_gwala')}}</option>
@forelse($gawalat as $gawla)
	<option value="{{$gawla->id}}">{{$gawla->name}}</option>
@empty
	<option disabled selected=""> لا يوجد جولات حتى الأن </option>
@endforelse