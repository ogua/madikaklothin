<div class="card card-info card-outline">
	<div class="card-body">
		<div class="card-body table-responsive p-0">
			<table class="table table-hover table-table table-head-fixed">
				<thead>
					<tr>
						<th>
							@if($data->image)

							 <img src="{{ asset('storage') }}/{{ $data->image }}" style="max-width:50px;max-height:50px" class="img img-thumbnail">

							@else

							@if($data->gender == 'Male')

							<img src="{{ url()->to('images/male.png') }}" style="max-width:100px;max-height:100px" class="img img-thumbnail">

							@else

							<img src="{{ url()->to('images/female.png') }}" style="max-width:100px;max-height:100px" class="img img-thumbnail">


							@endif

							@endif
						</th>
						<th colspan="5">Measurement Details For {{ $data->name }}</th>
					</tr>
				</thead>
				<tbody>
					<tr class="bg-info">
						<td>Address</td>
						<td>{{ $data->adrress }}</td>
						<td>Telephone</td>
						<td>{{  $data->tel }}</td>
						<td>Date Recorded</td>
						<td>{{  $data->date }}</td>
					</tr>

					<tr>
						<td>Waist <input type="text" value="{{ $data->waist }}" class="form-control" disabled></td>

						<td>Hip <input type="text" value="{{ $data->hip }}" class="form-control" disabled> </td>

						<td>Waist to hip <input type="text" value="{{ $data->waisttohip }}" class="form-control" disabled></td>

						<td>Waist to knee <input type="text" value="{{ $data->waisttoknee }}" class="form-control" disabled></td>

						<td>Waist to calf <input type="text" value="{{ $data->waisttocalf }}" class="form-control" disabled> </td>

						<td>Waist to floor <input type="text" value="{{ $data->waisttofloor }}" class="form-control" disabled></td>
					</tr>

					<tr>
						<td>Around knee <input type="text" value="{{ $data->aroundknee }}" class="form-control" disabled> </td>

						<td>Thigh <input type="text" value="{{ $data->thigh }}" class="form-control" disabled></td>

						<td>Calf <input type="text" value="{{ $data->calf }}" class="form-control" disabled></td>

						<td>Ankle <input type="text" value="{{ $data->ankle }}" class="form-control" disabled></td>

						<td>Seat <input type="text" value="{{ $data->seat }}" class="form-control" disabled></td>

						<td>Trouser length <input type="text" value="{{ $data->trouserlength }}" class="form-control" disabled></td>
					</tr>

					<tr>
						<td>Style <input type="text" value="{{ $data->style }}" class="form-control" disabled></td>

						<td>Type of material <input type="text" value="{{ $data->typeofmaterial }}" class="form-control" disabled></td>

						<td colspan="4">Note <textarea name="" id="" class="form-control" cols="30" rows="10">{{ $data->note }}</textarea></td>
					</tr>


					<tr>
						<td>status</td>
						<td colspan="5"> 
							@if ($data->status == '0') 
			                <label class="badge badge-info">Processing..</label>

			                @elseif($data->status == '1')

			                <label class="badge badge-success">Received..</label>

			               @endif

			              </b>
						</td>
					</tr>				
				</tbody>
			</table>
		</div>
	</div>
</div>