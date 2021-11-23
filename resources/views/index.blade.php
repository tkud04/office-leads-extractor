@extends('layout')


@section('title',"Welcome")
@section('content')
<div class="row mt-5">
<div class="col-md-12 col-12">
  <div class="card">
    <div class="card-body">
       <h5 class="text-muted">Paste the web page source or any text that contains the leads you want to extract in the box below</h5>
	   <div class="form-group">
      <textarea class="form-control" rows="15" cols="50" name="xf" id="xf" placeholder="Paste text here"></textarea>
    </div>
    <a href="javascript:void(0)" id="extract-btn" class="btn btn-primary">Extract</a>
	<p id="extract-loading">Extracting <img src="images/loading.gif"></p>
    </div>
  </div>
</div>     
<div class="col-md-12 mt-5 mb-5">
  <div class="card">
    <div class="card-body">
      <h5>Results <span id="ctr"></span></h5>
	  <div class="form-group">
        <textarea class="form-control" rows="15" cols="50" id="result" placeholder="Results will appear here" readonly></textarea>
      </div>
    </div>               
  </div>               
</div>               
                       						
@stop
