@php
	$holiday = \Modules\EventManagement\Entities\Holiday::find($id);
@endphp
<h4><strong>Holiday</strong></h4>
<hr>
<ul>
	<li>{{$holiday->name}}</li>
	<li>{{date('F j,Y',strtotime($holiday->date))}}</li>
	@if(strlen(strip_tags($holiday->desc)) > 1)
	<li>{!! $holiday->desc !!}</li>
	@endif
	<li>Added by : <strong>{{$holiday->creator->name}}</strong></li>
	<li>Updated by : <strong>{{$holiday->editor->name}}</strong></li>
</ul>