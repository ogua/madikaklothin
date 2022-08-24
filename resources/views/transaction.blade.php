{{-- <div class="card card-info card-outline">
	<div class="card header"></div>
	<div class="card-body">
		
	</div>
</div> --}}

<div class="card card-info card-outline">
	<div class="card-header">
		<a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
	</div>
	<div class="card-body">
		<div class="card table-card card-info card-outline">
		</div>
		<div class="card-body table-responsive p-0">
			<table class="table table-hover table-table table-head-fixed">
				<thead>
					<tr>
						<th>ID</th>
						<th>Client name</th>
						<th>Paid</th>
						<th>Left</th>
						<th>Reference</th>
						<th>Created</th>
					</tr>
				</thead>
				<tbody>

					@foreach($tr as $row)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $client->name }}</td>
						<td>GH&cent; {{ $row->amountpaid }}</td>
						<td>GH&cent; {{ $row->amountleft }}</td>
						<td>{{ $row->reference }}</td>
						<td>{{ date('M-d-Y', strtotime($row->created_at)) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>