@extends('base')
@section('content')

<html>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Male</h2>
</div>
<div class="float-right mb-2">
<a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Voter</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card-body">
<table class="table table-bordered" id="voter-datatable">
<thead>
<tr>
<th>Candidate Name</th>
<th>Position</th>
<th>Votes</th>

</tr>
</thead>
</table>
</div>
</div>






<div class="container mt-2">
    <div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left">
    <h2>Voters</h2>
    </div>
    <div class="float-right mb-2">
    <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Voter</a>
    </div>
    </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card-body">
    <table class="table table-bordered" id="voter-datatable">
    <thead>
    <tr>
    <th>Candidate Name</th>
    <th>Position</th>
    <th>Votes</th>
    
    </tr>
    </thead>
    </table>
    </div>
    </div>





    <div class="container mt-2">
        <div class="row">
        <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <h2>Voters</h2>
        </div>
        <div class="float-right mb-2">
        <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Voter</a>
        </div>
        </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card-body">
        <table class="table table-bordered" id="voter-datatable">
        <thead>
        <tr>
        <th>Candidate Name</th>
        <th>Position</th>
        <th>Votes</th>
        
        </tr>
        </thead>
        </table>
        </div>
        </div>






        <div class="container mt-2">
            <div class="row">
            <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <h2>Voters</h2>
            </div>
            <div class="float-right mb-2">
            <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Voter</a>
            </div>
            </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
            @endif
            <div class="card-body">
            <table class="table table-bordered" id="voter-datatable">
            <thead>
            <tr>
            <th>Candidate Name</th>
            <th>Position</th>
            <th>Votes</th>
            
            </tr>
            </thead>
            </table>
            </div>
            </div>






            <div class="container mt-2">
                <div class="row">
                <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                <h2>Voters</h2>
                </div>
                <div class="float-right mb-2">
                <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Voter</a>
                </div>
                </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">
                <table class="table table-bordered" id="voter-datatable">
                <thead>
                <tr>
                <th>Candidate Name</th>
                <th>Position</th>
                <th>Votes</th>
                
                </tr>
                </thead>
                </table>
                </div>
                </div>





                <div class="container mt-2">
                    <div class="row">
                    <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                    <h2>Voters</h2>
                    </div>
                    <div class="float-right mb-2">
                    <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Voter</a>
                    </div>
                    </div>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="card-body">
                    <table class="table table-bordered" id="voter-datatable">
                    <thead>
                    <tr>
                    <th>Candidate Name</th>
                    <th>Position</th>
                    <th>Votes</th>
                    
                    </tr>
                    </thead>
                    </table>
                    </div>
                    </div>


                    <div class="container mt-2">
                        <div class="row">
                        <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                        <h2>Voters</h2>
                        </div>
                        <div class="float-right mb-2">
                        <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Voter</a>
                        </div>
                        </div>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                        <p>{{ $message }}</p>
                        </div>
                        @endif
                        <div class="card-body">
                        <table class="table table-bordered" id="voter-datatable">
                        <thead>
                        <tr>
                        <th>Candidate Name</th>
                        <th>Position</th>
                        <th>Votes</th>
                        
                        </tr>
                        </thead>
                        </table>
                        </div>
                        </div>

{{-- {{-- uu --}}
{{-- <!-- boostrap voter model -->
<div class="modal fade" id="voter-modal" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="VoterModal"></h4>
</div>
<div class="modal-body">
<form action="javascript:void(0)" id="VoterForm" name="VoterForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Name</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" maxlength="50" required="">
</div>
</div>  
<div class="form-group">
<label for="name" class="col-sm-2 control-label">RegNo</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="regNo" name="regNo" placeholder="Enter Registration No" maxlength="50" required="">
</div>
</div> 
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Gender</label>
<div class="col-sm-12">
    <select name="gender" id="gender" class="form-control" maxlength="50" required="">
    <option value="0">Select gender</option>
    <option value="male">Male</option>            
    <option value="female">Female</option>            
    </select>
</div>
</div>   
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Phone</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone No" maxlength="50" required="">
</div>
</div> 
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
<label for="name" class="col-sm-2 control-label">Year</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="year_of_study" name="year_of_study" placeholder="Enter Year of Study" maxlength="50" required="">
</div>
</div> 
<div class="col-sm-offset-2 col-sm-10">
<button type="save" class="btn btn-primary" id="btn-save">Submit</button>
</button>
</div>
</form>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div> --}}
<!-- end bootstrap model --> --}}
</body>
</html>
@endsection