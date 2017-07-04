@extends('frontend.layouts.master')

@section('content')

<style type="text/css">

@media print {
  body * {
    visibility: hidden;
  }
  .store_body, .store_body * {
    visibility: visible;
  }
  #actionBtn a{
    visibility: hidden;
  }
  .store_body a, .store_body a i{
    visibility: hidden; 
  }

  .store_body {
    position: absolute;
    left: 0;
    top: 0;
  }
}

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

    .printBody{
        /*border:1px solid grey;*/
        border-radius: 5px;
        padding: 10px;
        margin: 30px 10px 10px 10px;
    }

    .QRBox{
        display: inline-block;
        margin-bottom: 10px;
        width: 245px;
        height: 130px;
        border: 1px solid grey;
        padding: 5px 10px 10px 10px;
        margin-right: 10px;
        overflow: hidden;
    }

    .QRdetail{
        display: inline-block;
        margin-left: 5px;
    }
    .QRdetail span{
        font-size: 12px;
    }

    .main{
      overflow: hidden;
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
        <h3>Save Detail</h3>
    </div>
    
    <div style="margin-top: -30px">
    <p>Batch : {{$data->batch}}</p>
    <p>Item Name : {{$data->name}}</p>
    <p>Item Model : {{$data->model}}</p>
    <p>Quantity : {{$quantity}}</p>
    <p>Store person : Test</p>
    <p>Entry Date : {{$data->created_at}}</p>
    </div>

    <div class="printBody" style="overflow: hidden;">
      @if(!empty($codeData))
        @foreach($codeData as $bar)
            <div class="QRBox">                
                <div align="left">
                    <img align="left" style="margin:10px 5px 10px -20px; " src="data:image/png;base64,{{ $bar['code']}}" alt="barcode" />
                    <div class="QRdetail pull-right" align="left">
                    <span style="border-bottom: 1px grey solid"><b>Property of Mayhem</b></span><br><br>
                    <span><b>ID - </b>{{$bar['id']}}</span>
                    <br>
                    <span>{{$bar['model']}}</span>
                    <br>
                    <span>{{$bar['batch']}}</span>
                    </div>
                </div>

            </div>
        @endforeach
      @endif
      </div>

          <div id="actionBtn" class="pull-right" style="overflow: hidden;display: inline-block;margin-top: 30px;margin-bottom: -40px">
          <a href="../store" class="modal-action modal-close waves-effect waves-green btn-flat ">Add Other Item</a>
          <a onclick="window.print()" class="modal-action waves-effect waves-green btn-flat">Print</a>
        </div>

</div>


@endsection

@section('before-scripts-end')

 <script type="text/javascript">

 $(document).ready(function() {
    Materialize.toast('Entry is successfully saved', 4000);
} 

  </script>

@endsection
