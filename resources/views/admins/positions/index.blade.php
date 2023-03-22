@extends('base')
@section('content')
<html>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Positions</h2>
</div>
<div class="float-right mb-2">
<a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Position</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card-body">
<table class="table table-bordered" id="position-datatable">
<thead>
<tr>
<th>Id</th>
<th>Name</th>
<th>Action</th>
</tr>
</thead>
</table>
</div>
</div>
<!-- boostrap position model -->
<div class="modal fade" id="position-modal" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="PositionModal"></h4>
</div>
<div class="modal-body">
<form action="javascript:void(0)" id="PositionForm" name="PositionForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" id="id">
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
    $('#position-datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ url('position-datatable') }}",
    columns: [
    { data: 'id', name: 'id' },
    { data: 'name', name: 'name' },
    {data: 'action', name: 'action', orderable: false},
    ],
    order: [[0, 'desc']]
    });
    });
    function add(){
    $('#PositionForm').trigger("reset");
    $('#PositionModal').html("Add Position");
    $('#position-modal').modal('show');
    $('#id').val('');
    }   
    function editFunc(id){
    $.ajax({
    type:"POST",
    url: "{{ url('edit-position') }}",
    data: { id: id },
    dataType: 'json',
    success: function(res){
    $('#PositionModal').html("Edit Position");
    $('#position-modal').modal('show');
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
    url: "{{ url('delete-position') }}",
    data: { id: id },
    dataType: 'json',
    success: function(res){
    var oTable = $('#position-datatable').dataTable();
    oTable.fnDraw(false);
    }
    });
    }
    }
    $('#PositionForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
    type:'POST',
    url: "{{ url('store-position')}}",
    data: formData,
    cache:false,
    contentType: false,
    processData: false,
    success: (data) => {
    $("#position-modal").modal('hide');
    var oTable = $('#position-datatable').dataTable();
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