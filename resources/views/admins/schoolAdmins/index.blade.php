@extends('base')
@section('content')
<html>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Schools</h2>
</div>
<div class="float-right mb-2">
<a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create School Admin</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card-body">
<table class="table table-bordered" id="schooladmin-datatable">
<thead>
<tr>
<th>Id</th>
<th>Name</th>
<th>School</th>
<th>Action</th>
</tr>
</thead>
</table>
</div>
</div>
<!-- boostrap schooladmin model -->
<div class="modal fade" id="schooladmin-modal" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="SchoolAdminModal"></h4>
</div>
<div class="modal-body">
<form action="javascript:void(0)" id="SchoolAdminForm" name="SchoolAdminForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="name" class="col-sm-2 control-label">School</label>
<div class="col-sm-12">
    <select name="school_id" id="school_id" class="form-control" maxlength="50" required="">
    <option value="0">Select school</option>
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
    $('#schooladmin-datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ url('schooladmin-datatable') }}",
    columns: [
    { data: 'id', name: 'id' },
    { data: 'name', name: 'name' },
    { data: 'school', name: 'school.name' },
    {data: 'action', name: 'action', orderable: false},
    ],
    order: [[0, 'desc']]
    });
    });
    function add(){
    $('#SchoolAdminForm').trigger("reset");
    $('#SchoolAdminModal').html("Add School Admin");
    $('#schooladmin-modal').modal('show');
    $('#id').val('');
    }   
    function editFunc(id){
    $.ajax({
    type:"POST",
    url: "{{ url('edit-schooladmin') }}",
    data: { id: id },
    dataType: 'json',
    success: function(res){
    $('#SchoolAdminModal').html("Edit School Admin");
    $('#schooladmin-modal').modal('show');
    $('#id').val(res.id);
    $('#name').val(res.name);
    }
    });
    }  
    function deleteFunc(id){
    if (confirm("Delete Record?") == true) {
    var id = id;
    // ajax
    $.ajax({
    type:"POST",
    url: "{{ url('delete-schooladmin') }}",
    data: { id: id },
    dataType: 'json',
    success: function(res){
    var oTable = $('#schooladmin-datatable').dataTable();
    oTable.fnDraw(false);
    }
    });
    }
    }
    $('#SchoolAdminForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
    type:'POST',
    url: "{{ url('store-schooladmin')}}",
    data: formData,
    cache:false,
    contentType: false,
    processData: false,
    success: (data) => {
    $("#schooladmin-modal").modal('hide');
    var oTable = $('#schooladmin-datatable').dataTable();
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