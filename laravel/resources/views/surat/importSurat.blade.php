<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{ URL::asset('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') }}">
	<script src="{{ URL::asset('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}"></script>
	<title>Import Excel</title>
</head>
<body>
<div class="container">
<br />
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Import data</button>

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
          <form action="postImportSur" method="post" enctype="multipart/form-data">
  			<input type="hidden" name="_token" value="{{csrf_token()}}">
  			<input type="file" name="surat">
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-default" value="Import">
        </div>
        </form>
      </div>

    </div>
  </div>
</div>
	
</body>
</html>