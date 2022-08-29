<div class="card card-info card-outline">
	<div class="card-header">
		<a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
	</div>
	<div class="card-body">


    <div class="col-md-6">
      
      <div class="form-group">
      <label for="">Search User</label>
      <select name="searchuser" id="searchuser" class="select2 form-control">
        <option value=""></option>
        @foreach($client as $row)
           <option value="{{ $row->id }}">{{ $row->name }} - Service Request ({{ $row->measurement->measurefor }}) </option>
        @endforeach
      </select>
    </div>

    </div>

    <div id="displayhere"></div>
		
	</div>
</div>
<script type="text/javascript">
  $('document').ready(function(){

    $(document).on("change","#searchuser", function(e){
      e.preventDefault();

      var clintname = $(this).val();
    
        if (clintname == "") {
          $("#clintname").focus();
          return;
        }

      var _token = $('meta[name=csrf-token]').attr('content');

      $.ajax({
            beforeSend: function(){
              $.LoadingOverlay("show");
            },
            complete: function(){
              $.LoadingOverlay("hide");
            },
            url: '/admin/check-details',
            type: 'get',
            data: {clintname: clintname},
            success: function(data){ 

              $("#displayhere").html(data);
              
            },
            error: function (data) {
              console.log('Error:', data.message);
            }
      });

    });
    //end
    
    $(document).on("submit","#recordpay", function(e){
      e.preventDefault();
      var paynow = $("#paynow").val();
      var clientid = $("#clientid").val();

    
        if (paynow == "") {
          $("#paynow").focus();
        }
     
      //alert(pclass + year + term);
      //return;

      var _token = $('meta[name=csrf-token]').attr('content');

      swal({
        title: "Are You Sure ?",
        text: "Record Payment Of Gh¢"+paynow,
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

    require(['select2'],function(){
      $('.select2').select2();
    }); 



  });

</script>