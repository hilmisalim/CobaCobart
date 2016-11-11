<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{ URL::asset('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') }}">
	<script src="{{ URL::asset('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}"></script>
    <!-- ClockPicker -->
    <link rel="stylesheet" href="{{ URL::asset('plugins/clockpicker/src/clockpicker.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('plugins/clockpicker/src/standalone.css')}}">
	<title>Import Excel</title>
</head>
<body>
<div class="container">
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
<div class="input-group clockpicker">
    <input type="text" class="form-control" value="09:30">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </span>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <form action="postImportKal" method="post" enctype="multipart/form-data">
    			<input type="hidden" name="_token" value="{{csrf_token()}}">
    			<input type="file" name="rapat">
    			<input type="submit" value="Import">
    		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
<script src="{{ URL::asset('plugins/clockpicker/src/clockpicker.js')}}"></script>

<script type="text/javascript">
$('.clockpicker').clockpicker();
</script>

</body>
</html>