@extends('frontend.layouts.master')

@section('content')

<style type="text/css">
	.card{
		padding: 10px;
		margin-top: 0px;
		margin-bottom: 0px;
		box-shadow: 3px 3px 3px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
		border: 1px solid #E8E8E8;
		cursor: pointer;
	}

	.card:hover{
		background-color:#F3F3F3;
	}

	.title li a{
		text-decoration: none;
	}


	.tabs .tab a,.tabs .tab a:hover, .tabs .tab a.active {
		color: #7b1fa2;
	}

	.tabs .indicator {
		background-color:#7b1fa2;
	}

	.main .btn, .btn-large {
		padding: 5px;
		padding-top: 0;
		height: 25px;
		line-height: 25px;
		text-align: center;
		font-size: 12px;
	}

	tr{
		border-bottom: 1px solid grey;
	}

	.modal{
        background-color: transparent;
        box-shadow:none;
        width: 80%;
    }

</style>

<div class="main store_body">
	<div class="title" style="margin-bottom: 30px;">
		  <ul id="tabs-swipe-demo" class="tabs">
		    <li class="tab col s3"><a href="#InvStore">Inventory Store</a></li>
		  </ul>
    </div>


	<div id="InvStore" class="col s12">

    @if( count( $data ) > 0 )

	 <div class="row" style="margin-right: 20px;margin-bottom: -10px">
    <div class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">search</i>
          <input type="text" id="autocomplete-input" class="autocomplete">
          <label for="autocomplete-input">Search</label>
        </div>
      </div>
    </div>
  </div>


	<table>
			<tr>
	    	<td>#</td>
	    	<td>Name</td>
	    	<td>Batch</td>
	    	<td>Quantity</td>
	    	<td></td>
	    	</tr>

	    	<?php $countIn=1;?>
	    @foreach($data as $listIn)
	    <!-- <div class="row" style="margin-bottom: 0px;"> -->
	        <!-- <div class="card"> -->
	        	<tr>
	           	<td>{{$countIn++}}</td>
		    	<td>{{$listIn->name}}</td>
		    	<td>{{$listIn->batch}}</td>
		    	<td>{{$listIn->countItem}}</td>
		    	<td class="pull-right"><button data-target="detailModal{{$listIn->batch}}" class="btn btn-primary">Detail</button></td>
		    	</tr>
	        <!-- </div> -->
	    <!-- </div> -->
	    @endforeach
	</table>
	{{ $data->links() }}
	@else
	<div align="center" style="font-size: 20px;">We're sorry, there is no data available</div>
    @endif

    </div>

</div> <!-- main store body -->

@if(count($data)>0)
@foreach($data as $listIn)
<!-- detail modal -->
  <div id="detailModal{{$listIn->batch}}" class="modal fade">
    <div class="modal-content" style="overflow: hidden">
      
      <p><b>Batch </b>:<span> {{$listIn->batch}}</span></p>
      <p><b>Name </b>:<span> {{$listIn->name}}</span></p>
      <p><b>Date Entry </b>:<span> {{$listIn->created_at}}</span></p>
     
      <div class="printBody" style="overflow: hidden;">

      </div>

       <div class="pull-right" style="display: inline-block;margin-top: 30px;margin-bottom: -20px">
          <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
          <!-- <a onclick="window.print()" class="modal-action waves-effect waves-green btn-flat">Print</a> -->
        </div>
    </div>
  </div> <!-- modal -->
  @endforeach
  @endif

@endsection

@section('before-scripts-end')

<script type="text/javascript">

	var itemList = '';
	
	$(document).ready(function(){
    
    $('.modal').modal();

    	$.ajax({
	   url : 'AutoCompleteItem', // your php file
	   type : 'GET', // type of the HTTP request
	   success : function(data){
	      itemList = jQuery.parseJSON(data);
	      console.log(itemList);
	   }
	});


    $('input.autocomplete').autocomplete({
    data: {
     	"Apple": null,
      "Microsoft": null,
      "Google": 'http://placehold.it/250x250'
    },
    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
    onAutocomplete: function(val) {
      // Callback function when value is autcompleted.
    },
    minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
  });

  });




</script>
@endsection
