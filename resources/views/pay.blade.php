<div class="card card-info card-outline">
	<div class="card-header">
		<a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
	</div>
	<div class="card-body">

		<h3>Total Amount Charged: GH&cent; {{ $client->payment->amountcharge ?? '0.00' }}<br>
			Total Amount Paid: GH&cent; {{ $client->payment->amountpaid ?? '0.00' }}<br>
		    Total Amount Left: GH&cent; {{ $client->payment->amountleft ?? '0.00' }}
		</h3>

		<hr>

		<form action="{{ admin_url('save-payment') }}" method="post" id="recordpay">
			@csrf
			<input type="hidden" value="{{ $client->id }}" name="clientid" id="clientid" >
			<input type="hidden" value="{{ $client->name }}" name="name" id="clientname">
			<input type="hidden" value="{{ $client->payment->amountpaid }}" name="amntpaid">
			<input type="hidden" value="{{ $client->payment->amountleft }}" name="amntleft">
			<input type="hidden" value="{{ $client->payment->amountcharge }}" name="amountcharge">
			<input type="hidden" value="{{ $client->measurefor }}" name="measurefor">
			<div class="form-group">
				<label for="">Paying Now</label>
				<input type="text" class="form-control" name="paynow" id="paynow" value="0" required>
			</div>

			<input type="submit" value="Record Payment" class="btn btn-info">
		</form>
		
	</div>
</div>
<script type="text/javascript">
  $('document').ready(function(){
    
    $(document).on("submit","#recordpay", function(e){
      e.preventDefault();
      var paynow = $("#paynow").val();
      var clientname = $("#clientname").val();
      var clientid = $("#clientid").val();

    
        if (paynow == "") {
          $("#paynow").focus();
        }
     
      //alert(pclass + year + term);
      //return;

      var _token = $('meta[name=csrf-token]').attr('content');

      swal({
        title: "Are You Sure ?",
        text: "Record Payment Of Gh¢"+paynow+' For '+clientname,
        icon: "warning",
        buttons: ['Cancel', 'Record Payment'],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            beforeSend: function(){
              $.LoadingOverlay("show");
            },
            complete: function(){
              $.LoadingOverlay("hide");
            },
            url: '/admin/save-payment',
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            data: new FormData(this),
            success: function(data){ 

              if (data.match("success")) {
                swal('Recorded Successfully!', {
                  icon: "success",
                });

                var redrecturl = '/admin/print-receipt/'+clientid;

                window.open(redrecturl,"_blank");

              }

          //console.log(data);
        },
        error: function (data) {
          console.log('Error:', data.message);
        }
      });

        }
      });
      //0561799953 #Ella 

    });
    //end



  });

</script>