@extends('base')
@section('content')
<html>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Candidate</h2>
</div>
<div class="float-right mb-2">
<a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create candidate</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card-body">
<table class="table table-bordered" id="candidates-datatable">
<thead>
<tr>
<th>Id</th>
<th>voter_id</th>
<th>position_id</th>
<th>Action</th>
</tr>
</thead>
</table>
</div>
</div>
<!-- boostrap school model -->
<div class="modal fade" id="candidates-modal" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="CandidatesModal"></h4>
</div>
<div class="modal-body">
<form action="javascript:void(0)" id="CandidatesForm" name="CandidatesForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" id="id">
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Name</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="name" name="name" placeholder="Enter Positions Name" maxlength="50" required="">
</div>
</div>  
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-primary" id="btn-save">Save changes
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
$('#candidates-datatable').DataTable({
processing: true,
serverSide: true,
ajax: "{{ url('candidates-datatable') }}",
columns: [
{ data: 'id', name: 'id' },
{ data: 'voters_id', name: 'voters_id' },
{ data: 'position_id', name: 'positions_id' },
{data: 'action', name: 'action', orderable: false},
],
order: [[0, 'desc']]
});
});
function add(){
$('#CandidatesForm').trigger("reset");
$('#CandidatesModal').html("Add Candidates");
$('#candidates-modal').modal('show');
$('#id').val('');
}   
function editFunc(id){
$.ajax({
type:"POST",
url: "{{ url('edit-candidates') }}",
data: { id: id },
dataType: 'json',
success: function(res){
$('#PositionsModal').html("Edit Candidates");
$('#positions-modal').modal('show');
$('#id').val(res.id);
$('#voters_id').val(res.voters_id);
$('#position_id').val(res.position_id);
}
});
}  
function deleteFunc(id){
if (confirm("Delete Record?") == true) {
var id = id;
// ajax
$.ajax({
type:"POST",
url: "{{ url('delete-candidates') }}",
data: { id: id },
dataType: 'json',
success: function(res){
var oTable = $('#candidates-datatable').dataTable();
oTable.fnDraw(false);
}
});
}
}
$('#CandidatesForm').submit(function(e) {
e.preventDefault();
var formData = new FormData(this);
$.ajax({
type:'POST',
url: "{{ url('store-candidates')}}",
data: formData,
cache:false,
contentType: false,
processData: false,
success: (data) => {
$("#candidates-modal").modal('hide');
var oTable = $('#candidates-datatable').dataTable();
oTable.fnDraw(false);
$("#btn-save").html('Submit');
$("#btn-save"). attr("disabled", false);
},
error: function(data){
console.log(data);
}
});
});
</html>
</script>

@endsection