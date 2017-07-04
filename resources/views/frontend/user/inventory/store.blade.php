@extends('frontend.layouts.master')

@section('content')

<style type="text/css">


    .alert-danger
    {
        display: none;
    }

    img{
        padding-left: 20px;
    }

    .modal{
        background-color: transparent;
        box-shadow:none;
        width: 85%;
    }

        .closeBtn{
      position: absolute;
      right: 20px;
      top: 20px;
    }
</style>

<div class="main store_body">

<a href="../dashboard" class="closeBtn btn-floating btn-large waves-effect waves-light red"><i class="material-icons">close</i></a>

<!-- <img src="http://chart.apis.google.com/chart?cht=qr&chs=150x150&chl=www.codediesel.com" /> -->


    <div class="title">
        <h3>Store Inventory</h3>
    </div>

    {!! Form::open(['url' => 'save_inventory', 'class' => 'form-horizontal', 'id'=>'formValidate']) !!}

    <div class="input-field col s12">
     <!-- <i class="material-icons prefix">account_box</i> -->
     <!-- <input id="name" name="name" type="text" data-error=".errorTxt1"> -->
     <input id="name" name="name" type="text" class="validate" required>
     <label for="name">Product Name</label>
     </div>

     <div class="input-field col s12">
     <!-- <i class="material-icons prefix">account_box</i> -->
     <!-- <input id="brand" name="brand" type="text" data-error=".errorTxt2"> -->
     <input id="brand" name="brand" type="text" class="validate" required>
     <label for="brand">Product Brand</label>
     </div>

     <div class="input-field col s12">
     <!-- <i class="material-icons prefix">account_box</i> -->
     <input id="model" name="model" type="text" class="validate" required>
     <label for="model">Product Model</label>
     <!-- <input id="type" name="type" type="text" data-error=".errorTxt3"> -->
     </div>

     <div class="input-field col s12">
     <!-- <i class="material-icons prefix">account_box</i> -->
     
     <input id="quantity" name="quantity" type="number" min="1" class="validate" value="1">
     <label for="quantity">Quantity</label>
     <!-- <input id="quantity" class="active" name="quantity" type="text" data-error=".errorTxt4" min="1" value="1"> -->
     </div>

     <div>
     <label for="buyDate">Buy Date</label>
     <input type="date" id="buyDate" name="buyDate" class="datepicker" placeholder="Buy Date" required>
     </div>

     <div class="form-group">
        <div class="col-md-12" style="margin-top: 30px;">
            <div align="center">
            {!! Form::reset(trans('labels.frontend.auth.clear_button'), ['class' => 'btn btn-primary']) !!}
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {!! Form::submit(trans('Save'), ['class' => 'btn btn-primary']) !!}
            </div>
        </div><!--col-md-6-->
    </div><!--form-group-->

   {!! Form::close() !!}

</div>


@endsection

@section('before-scripts-end')

 <script type="text/javascript">

        var today = new Date();
        var msg = {!! json_encode($errors->first()) !!};

       $(document).ready(function() {
        console.log('Batch: '+msg);
        
        if(msg != ''){
            if(msg == 'Saving inventory failed!')
                Materialize.toast(msg, 4000);
            else
                window.location.href = '{{url("saveDetail")}}'+'/'+msg; 
        }
        
            $('select').material_select();

          $('.datepicker').pickadate({
              formatSubmit: 'yyyy/mm/dd',
              // format: 'yyyy/mm/dd',
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year
                max: today,
                onSet: function( date2 ){
                  var checkOutDate = new Date(date2['select']);
                  console.log(checkOutDate);
                if ( 'select' in date2 ){ //prevent closing on selecting month/year
                    this.close();
                  }
                }

              });

    $("#formValidate").validate({
        rules: {
            name: {
                required: true,
                minlength: 5
            },
            brand: {
                required: true,
            },
            type: {
                required: true,
            },
            quantity: {
                required: true,
            },
            // brand:"required",
        },
        //For custom messages
        messages: {
            name:{
                required: "Enter a product name",
                minlength: "Enter at least 5 characters"
            },
            brand:{
                required: "Enter a brand name",
            },
            type:{
                required: "Type is required",
            },
            quantity:{
                required: "Quantity is required",
            },
        },
     });


            });   
  </script>

@endsection
