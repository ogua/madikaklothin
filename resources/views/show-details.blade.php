<h3>
  Total Amount Charged: GH&cent; {{ $client->payment->amountcharge ?? '0.00' }}<br>
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
    <input type="text" class="form-control col-md-6" name="paynow" id="paynow" value="0" required>
  </div>

  <input type="submit" value="Record Payment" class="btn btn-info">
</form>