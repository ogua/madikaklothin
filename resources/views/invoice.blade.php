<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> {{ Admin::user()->school->name ?? 'OSMS' }} | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <link rel="shortcut icon" href="{{ URL::to('images/favicon.ico') }}">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ URL::to('css/bootstrap.mins.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::to('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::to('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::to('dist/css/AdminLTE.min.css')}}">

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="">

  <div class="container" style="">

    <div id="printhere">
      @if($tran)

      <div class="col-md-8 col-md-offset-2" style="position:relative;background-image: url('/images/back-drop.png');">
        
        <h2 class="text-center">

         <img width="100" height="100"src="{{ URL::to('images/software.png') }}"/>

          MADIKA KLODIN GH
        </h2>
          <p class="text-center" style="margin-top: -25px;">Tel: +(233) 67 087 5055 <br>
          Location: Madina</p>

          {{-- p class="text-center">XXXX XXX XXX</p> 
          <p class="text-center">sch@email.com</p>  --}}
          <p class="text-center" style="padding: 10px;font-size: 20px; border: 2px solid #ccc;font-style: bold;">
          OFFICIAL RECEIPT</p>

             <ul class="list-inline">
              <li><b>CUSTOMER NAME:</b> {{ strtoupper(strtoupper($client->name)) }}</li>
              <li class="pull-right"><b>INVOICE NO:</b> REF-{{$ivoiceid}}</li>
            </ul>

            <ul class="list-inline" style="margin-top: -10px;">
              <li><b>SUM OF :</b> {{ strtoupper(strtolower($words))  }} Gh¢ ONLY</li>
              <li class="pull-right"><b>TRANSACTION DATE:</b> {{$tran->date}}</li>
            </ul>

            <ul class="list-inline" style="margin-top: -10px;">
              <li><b>BEING:</b> {{ strtoupper(strtolower($narration)) }}</li>
              <li class="pull-right"><b>DATE:</b> {{date('d-m-Y')}}</b> </li>
            </ul>

            <ul class="list-inline" style="margin-top: -10px;">
              <li><b>AMOUNT PAID:</b> Gh¢ {{$tran->amountpaid ?? 0}}</li>
              <li class="pull-right"><b>BALANCE:</b> {{ Admin::user()->school->currency ?? 'Gh¢' }} {{$balance ?? 0}}</li>
            </ul>

            <p class="pull-right" style="margin-top: 20px;">SIGNATURE: ................................
        <br>
        {{$tran->receivedby}}</p>
        <div class="clearfix"></div>
        <ul class="list-inline">
              <li>Printed on {{date('Y-m-d')}}</li>
              <li>Page 1 of 1</li>
              <li class="pull-right"></li>
              <li></li>
            </ul>
      </div>

      <div class="clearfix"></div>

      {{-- <hr style="border: 2px solid black;">

       <div class="col-md-8 col-md-offset-2">
        
        <h2 class="text-center">

            <img src="{{URL::to('images/logo.png')}}"  />
          @lang('school.schoolname')</h2>
          <p class="text-center">Addresss: <br>{{ __('school.schoollocation') }}</p>
          <p class="text-center">Tel: @lang('school.phone')</p> 
          <p class="text-center">Email: @lang('school.email')</p> 
          <p class="text-center" style="padding: 10px;font-size: 20px; border: 2px solid #ccc;font-style: bold;">OFFICIAL RECEIPT</p>

             <ul class="list-inline">
              <li><b>Receipt From:</b> {{$student->fullname}}</li>
              <li class="pull-right"><b>Receipt No:</b> {{$ivoiceid}}</li>
            </ul>

            <ul class="list-inline" style="margin-top: -10px;">
              <li><b>Class:</b> {{$student->currentlevel}}</li>
              <li class="pull-right"><b>Date:</b> {{date('d-m-Y')}}</li>
            </ul>


            <ul class="list-inline" style="margin-top: -10px;">
              <li><b>The sum of :</b> {{$words}} Gh&cent; Only</li>
              <li class="pull-right"><b>Tr. Date:</b> {{$tran->date}}</li>
            </ul>

            <ul class="list-inline" style="margin-top: -10px;">
              <li><b>Being :</b> {{$narration}}</li>
              <li class="pull-right"><b>Reg No:</b> {{$student->student_id}}</li>
            </ul>

            <ul class="list-inline" style="margin-top: -10px;">
              <li><b>Amount Paid:</b> GH&cent; {{$tran->amount ?? 0}}</li>
              <li class="pull-right"><b>Balance:</b> GH&cent; {{$balance ?? 0}}</li>
            </ul>

            <p class="pull-right" style="margin-top: -10px;">Signature: ................................
        <br>
        {{$tran->receivedby}}</p>
        <div class="clearfix"></div>
        <ul class="list-inline">
              <li>Report Printed on {{date('Y-m-d')}}</li>
              <li>Page 1 of 1</li>
              <li class="pull-right"></li>
            </ul>

      </div> --}}

  </div>
  <div class="clearfix"></div>
  <div class="col-md-10 col-offset-2">
   <a href="#" cid="{{$receiptid}}" class="btn btn-success pull-right print">Print</a>

   {{-- <a href="/admin/make-payment/{{ $client->id }}" class="btn btn-info pull-right" style="margin-right: 30px;">Back</a> --}}

   <a href="/admin" class="btn btn-info pull-right" style="margin-right: 30px;">Back</a>
 </div>

 @else

 <div class="row">
  <div class="col-xs-12">
    <div class="alert alert-danger">No Fees Receivced Today!</div>
  </div>
</div>

@endif

</div>


<!-- jQuery 3 -->
<script src="{{ URL::to('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::to('js/jquery.PrintArea.js')}}"></script>
<script>
  jQuery(document).ready(function() {

    $(document).on("click",".print",function(e){
      e.preventDefault();
       var id = $(this).attr("cid");
       var mode = 'iframe'; // popup
       var close = mode == "popup";
       var options = { mode : mode, popClose : close};
       $("#printhere").printArea(options);
       //setdata(id);
    });


    function setdata(id){
          var _token = $('meta[name=csrf-token]').attr('content');
          $.ajax({
            url: '',
            type: 'POST',
            data: {_token: _token, id: id},
            success: function(data){ 
              //alert(data);
            },
            error: function (data) {
              console.log('Error:', data);
              $("#msg").text(data.message).show();
            }
          });

    }

  });
</script>
</body>
</html>
