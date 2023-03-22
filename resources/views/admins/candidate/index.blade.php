@extends('base')
@section('content')
<html>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Candidates</h2>
</div>
<div class="float-right mb-2">
<a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Candidate</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card-body">
<table class="table table-bordered" id="candidate-datatable">
<thead>
<tr>
<th>Id</th>
<th>Voter</th>
<th>Position</th>
<th>Action</th>
</tr>
</thead>
</table>
</div>
</div>
<!-- boostrap candidate model -->
<div class="modal fade" id="candidate-modal" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="CandidateModal"></h4>
</div>
<div class="modal-body">
<form action="javascript:void(0)" id="CandidateForm" name="CandidateForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" id="id">
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Voter</label>
<div class="col-sm-12">
    <select name="voter_id" id="voter_id" class="form-control" maxlength="50" required="">
    <option value="0">Select voter</option>
    @foreach ($voters as $voter)
    <option value="{{$voter->id}}">{{$voter->name}}</option>            
    @endforeach
    </select>
</div>
</div> 
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Position</label>
<div class="col-sm-12">
    <select name="position_id" id="position_id" class="form-control" maxlength="50" required="">
    <option value="0">Select position</option>
    @foreach ($positions as $position)
    <option value="{{$position->id}}">{{$position->name}}</option>            
    @endforeach
    </select>
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
    $('#candidate-datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ url('candidate-datatable') }}",
    columns: [
    { data: 'id', name: 'id' },
    { data: 'voter', name: 'voter.name' },
    { data: 'position', name: 'position.name' },
    {data: 'action', name: 'action', orderable: false},
    ],
    order: [[0, 'desc']]
    });
    });
    function add(){
    $('#CandidateForm').trigger("reset");
    $('#CandidateModal').html("Add Candidate");
    $('#candidate-modal').modal('show');
    $('#id').val('');
    }   
    function editFunc(id){
    $.ajax({
    type:"POST",
    url: "{{ url('edit-candidate') }}",
    data: { id: id },
    dataType: 'json',
    success: function(res){
    $('#CandidateModal').html("Edit Candidate");
    $('#candidate-modal').modal('show');
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
    url: "{{ url('delete-candidate') }}",
    data: { id: id },
    dataType: 'json',
    success: function(res){
    var oTable = $('#candidate-datatable').dataTable();
    oTable.fnDraw(false);
    }
    });
    }
    }
    $('#CandidateForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
    type:'POST',
    url: "{{ url('store-candidate')}}",
    data: formData,
    cache:false,
    contentType: false,
    processData: false,
    success: (data) => {
    $("#candidate-modal").modal('hide');
    var oTable = $('#candidate-datatable').dataTable();
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