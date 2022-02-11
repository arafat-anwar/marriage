@php
	$event = \Modules\EventManagement\Entities\Event::find($id);
@endphp
<h4><strong>Event</strong></h4>
<hr>
<ul>
	<li>{{$event->title}}</li>
	<li><strong>{{date('F j,Y',strtotime($event->from))}}</strong> to <strong>{{date('F j,Y',strtotime($event->to))}}</strong></li>
	@if(strlen(strip_tags($event->desc)) > 1)
	<li>{!! $event->desc !!}</li>
	@endif
	<li>Added by : <strong>{{$event->creator->name}}</strong></li>
	<li>Updated by : <strong>{{$event->editor->name}}</strong></li>
</ul>