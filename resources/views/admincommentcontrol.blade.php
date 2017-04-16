<!DOCTYPE html>
<html>
<head>
	<title>admin comment</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
<table class="table table-striped">
	<thead>
		<tr>
			<th>Comments</th>
			<th>Approval</th>
		</tr>
	</thead>
	<tbody>
	@forelse($comments as $comment)
		<tr>
			<td>{{$comment->comment}}</td>
			<td>
<form action="{{url('/toggle-approve')}}" method="POST">
	{{csrf_field()}}
	<input <?php if($comment->approve == 1) {echo "checked";} ?> type="checkbox" name="approve">
	<input type="hidden" name="commentId" value="{{$comment->id}}">
<input class="btn btn-primary" type="submit" value="Done">
</form>
			</td>
		</tr>
		@empty
		<h4>No Data</h4>
		@endforelse
	</tbody>
</table>
</div>
</body>
</html>