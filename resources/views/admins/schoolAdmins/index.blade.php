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
<h2>SchoolAdmins</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create SchoolAdmin</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card-body">
<table class="table table-bordered" id="SchoolAdmins-datatable">
<thead>
<tr>
<th>Id</th>
<th>Name</th>
<th>phone</th>
<th>school name</th>
<th>Action</th>
</tr>
</thead>
</table>
</div>
</div>
<!-- boostrap company model -->
<div class="modal fade" id="schooladmins-modal" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="SchoolAdminsModal"></h4>
</div>
<div class="modal-body">
<form action="javascript:void(0)" id="SchoolAdminsForm" name="SchoolAdminsForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" id="id">
<div class="form-group">
<label for="name" class="col-sm-2 control-label">School Name</label>
<div class="col-sm-12">
    <select name="school_id" id="school_id" class="form-control" maxlength="50" required="">
    <option value="0">Select name</option>
    @foreach ($schools as $school)
    <option value="{{$school->id}}">{{$school->name}}</option>            
    @endforeach
    </select>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Name</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" maxlength="50" required="">
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
$('#schoolAdmins-datatable').DataTable({
processing: true,
serverSide: true,
ajax: "{{ url('schoolAdmins-datatable') }}",
columns: [
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'school_id', name: 'school_id' },
{data: 'action', name: 'action', orderable: false},
],
order: [[0, 'desc']]
});
});
function add(){
$('#SchoolAdminsForm').trigger("reset");
$('#SchoolAdminsModal').html("Add SchoolAdmins");
$('#schooladmins-modal').modal('show');
$('#id').val('');
}   
function editFunc(id){
$.ajax({
type:"POST",
url: "{{ url('edit-schoolAdmins') }}",
data: { id: id },
dataType: 'json',
success: function(res){
$('#SchoolAdminsModal').html("Edit SchoolAdmin");
$('#schooladmins-modal').modal('show');
$('#id').val(res.id);
$('#name').val(res.name);
$('#school_id').val(res.school_id);
}
});
}  
function deleteFunc(id){
if (confirm("Delete Record?") == true) {
var id = id;
// ajax
$.ajax({
type:"POST",
url: "{{ url('delete-schoolAdmins') }}",
data: { id: id },
dataType: 'json',
success: function(res){
var oTable = $('#schoolAdmins-datatable').dataTable();
oTable.fnDraw(false);
}
});
}
}
$('#SchoolAdminsForm').submit(function(e) {
e.preventDefault();
var formData = new FormData(this);
$.ajax({
type:'POST',
url: "{{ url('store-schoolAdmins')}}",
data: formData,
cache:false,
contentType: false,
processData: false,
success: (data) => {
$("#schooladmins-modal").modal('hide');
var oTable = $('#schoolAdmins-datatable').dataTable();
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

    
@endsection