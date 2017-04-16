<!DOCTYPE html>
<html>
<head>
	<title>
		test
	</title>
</head>
<body>
<ul>
	@foreach($events as $event)
		<li>{{ $event->location->title }}</li>
		<li>{{ $event->createEvent->name }}</li>
		
	@endforeach
</ul>
<br>
<ul>
	@foreach($feedbacks as $feedback)
		<li>{{ $feedback->user->email }}</li>
	@endforeach
</ul>
<br>
<ul>
	@foreach($events as $event)
		@foreach($event->user as $even)
			<li>{{ $even->gender}}</li>
		@endforeach
	@endforeach
</ul>
<br>

<ul>
	@foreach($users as $user)
		@foreach($user->event as $use)
			<li>{{ $use->category}}</li>
		@endforeach
	@endforeach
</ul>

<br>

<ul>
	@foreach($users as $user)
		@foreach($user->eventNotify as $use)
			<li>{{ $use->approved}}</li>
		@endforeach
	@endforeach
</ul>

<br>
<ul>
	@foreach($categories as $category)
		@foreach($category->user as $cat)
			<li>{{ $cat->image}}</li>
		@endforeach
	@endforeach
</ul>


</body>
</html> 