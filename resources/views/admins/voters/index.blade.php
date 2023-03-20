@extends('base')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Voters</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create voter</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card-body">
<table class="table table-bordered" id="Voters-datatable">
<thead>
<tr>
<th>Id</th>
<th>Name</th>
<th>regNo</th>
<th>gender</th>
<th>phone</th>
<th>school name</th>
<th>year_of_study</th>
<th>Action</th>
</tr>
</thead>
</table>
</div>
</div>
<!-- boostrap company model -->
<div class="modal fade" id="voters-modal" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="VotersModal"></h4>
</div>
<div class="modal-body">
<form action="javascript:void(0)" id="VotersForm" name="VotersForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" id="id">
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Voters Name</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="name" name="name" placeholder="Enter Voters Name" maxlength="50" required="">
</div>
</div>  
<div class="form-group">
<label for="name" class="col-sm-2 control-label">regNo</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="regNo" name="regNo" placeholder="Enter regNo" maxlength="50" required="">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Voters gender</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="gender" name="gender" placeholder="Enter gender" required="">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Voters phone</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" required="">
 </div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">school</label>
 <div class="col-sm-12">
<input type="text" class="form-control" id="name" name="name" placeholder="Enter school name" required="">
</div>
 </div>
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-primary" id="btn-save">Save changes</button>
</button>
</div>
</form>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
<!-- end bootstrap model -->
</body>
<script type="text/javascript">
$(document).ready( function () {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#voters-datatable').DataTable({
processing: true,
serverSide: true,
ajax: "{{ url('voters-datatable') }}",
columns: [
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'school name', name: 'school name' },
{ data: 'regNo', name: 'regNo' },
{ data: 'gender', name: 'gender' },
{ data: 'phone', name: 'phone' },
{ data: 'year_of_study', name: 'year_of_study' },
{data: 'action', name: 'action', orderable: false},
],
order: [[0, 'desc']]
});
});
function add(){
$('#VotersForm').trigger("reset");
$('#VotersModal').html("Add Voters");
$('#voters-modal').modal('show');
$('#id').val('');
}   
function editFunc(id){
$.ajax({
type:"POST",
url: "{{ url('edit-voters') }}",
data: { id: id },
dataType: 'json',
success: function(res){
$('#VotersModal').html("Edit Voters");
$('#voters-modal').modal('show');
$('#id').val(res.id);
$('#name').val(res.name);
$('#school_id').val(res.school_id);
$('#regNo').val(res.regNo);
$('#gender').val(res.gender);
$('#phone').val(res.phone);
$('#year_of_study').val(res.year_of_study);
}
});
}  
function deleteFunc(id){
if (confirm("Delete Record?") == true) {
var id = id;
// ajax
$.ajax({
type:"POST",
url: "{{ url('delete-voters') }}",
data: { id: id },
dataType: 'json',
success: function(res){
var oTable = $('#voters-datatable').dataTable();
oTable.fnDraw(false);
}
});
}
}
$('#VotersForm').submit(function(e) {
e.preventDefault();
var formData = new FormData(this);
$.ajax({
type:'POST',
url: "{{ url('store-voters')}}",
data: formData,
cache:false,
contentType: false,
processData: false,
success: (data) => {
$("#voters-modal").modal('hide');
var oTable = $('#voters-datatable').dataTable();
oTable.fnDraw(false);
$("#btn-save").html('Submit');
$("#btn-save"). attr("disabled", false);
},
error: function(data){
console.log(data);
}
});
});
</script>
</html>

</html>

@endsection