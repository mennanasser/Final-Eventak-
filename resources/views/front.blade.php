<!DOCTYPE html>
<html>
<head>
	<title>status</title>
<!DOCTYPE html>
<html>
<head>
	<title>status</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
<h1>My status</h1>
<h5>Comments</h5>
<hr>

<form action="{{url('/comment')}}/{{$event->id}}" method="POST">
	{{csrf_field()}}
	<div class="form-group">
	<label for="comment">Write comment</label>
	<input class="form-control" type="text" name="comment" placeholder="wrie comment">
	</div>
<input class="btn btn-primary" type="submit" value="Done">
</form>
<br/>
<h5>List of comments</h5>
@forelse($comments as $comment)
<p>{{$comment->comment}}</p>
@empty
<h4>No Comments</h4>
@endforelse



</div>
</body>
</html>