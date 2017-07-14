@extends('layouts.master')

@section('content')
<style type="text/css">
		.tabs .tab a,.tabs .tab a:hover, .tabs .tab a.active {
		color: #7b1fa2;
	}

	.tabs .indicator {
		background-color:#7b1fa2;
	}

	.main .btn, .btn-large {
		padding: 15px;
		padding-top: 7px;
		height: 35px;
		line-height: 25px;
		text-align: center;
		font-size: 12px;
	}
</style>

<div class="main store_body">
	<div class="title" style="margin-bottom: 30px;margin-top: -20px">
		 <p style="color: #7b1fa2;font-size: 19px">Enter Item ID</p>
    </div>


	  {!! Form::open(['url' => 'checkout', 'class' => 'form-horizontal', 'id'=>'formValidate']) !!}
	  	<div class="row" style="margin-right: 20px;margin-bottom: -10px">
		    <div class="col s12">
		      <div class="row">
		        <div class="input-field col s12">
		          <i class="material-icons prefix">assignment</i>
		          	<input id="check" placeholder="Item ID" name="check">
		          <!-- <label for="autocomplete-output">Search</label> -->
		          <div align="center">
		          <button class="btn btn-large">Check</button>
		        	</div>
		        </div>
		      </div>
		    </div>
		  </div>
   		{!! Form::close() !!}

	  @if(isset($data))
	  <div class="card" style="padding: 20px;width: 40%; border-radius: 10px;margin-top: 30px;margin-left: 28%">
	  	<p>ID: {{$data['id']}}</p>
	  	<p>Product Name : {{$data['name']}}</p>
	  	<p>Model: {{$data['model']}}</p>
	  	<p>Batch: {{$data['batch']}}</p>
	  	<div style="overflow: hidden">
	  	<img src="data:image/png;base64,{{ $data['code']}}" alt="barcode" />
	  	</div>
	  	<div align="right">
	  	<button class="btn btn-primary" style="right: 10px">Confirm</button>
	  	</div>
	  </div>
	  @endif

<div class="col s12">

</div>

</div> <!-- main store body -->

@endsection