    <option value="">{{trans('admin.choose_tour')}}</option>
@forelse($tours as $tour)
	<option value="{{$tour->id}}">{{$tour->tour_name}}</option>
@empty
	<option disabled selected="">لا يوجد بطولات فى الفئة </option>
@endforelse