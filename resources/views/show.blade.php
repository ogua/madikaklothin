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

							<img src="{{ url()->to('images/male.png') }}" style="max-width:50px;max-height:50px" class="img img-thumbnail">

							@else

							<img src="{{ url()->to('images/female.png') }}" style="max-width:50px;max-height:50px" class="img img-thumbnail">


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
						<td>Busty <input type="text" value="{{ $data->busty1 }}" class="form-control" disabled>  </td>
						<td>Busty <input type="text" value="{{ $data->busty2 }}" class="form-control" disabled>  </td>
						<td>Waist <input type="text" value="{{ $data->waist }}" class="form-control" disabled>  </td>
						<td>Underbust <input type="text" value="{{ $data->underbust }}" class="form-control" disabled>  </td>
						<td>Shoulder to waist <input type="text" value="{{ $data->shouldertowaist }}" class="form-control" disabled>  </td>
						<td>Shoulder to under waist <input type="text" value="{{ $data->shouldertounderwaist }}" class="form-control" disabled>  </td>
					</tr>

					<tr>
						<td>Shoulder to nipple <input type="text" value="{{ $data->shouldertonipple1 }}" class="form-control" disabled>  </td>
						<td>Shoulder to nipple <input type="text" value="{{ $data->shouldertonipple2 }}" class="form-control" disabled>  </td>
						<td>Shoulder to Knee <input type="text" value="{{ $data->shouldertoKnee }}" class="form-control" disabled>  </td>
						<td>Shoulder to hip <input type="text" value="{{ $data->shouldertohip }}" class="form-control" disabled>  </td>
						<td>Waist to hip <input type="text" value="{{ $data->waisttohip }}" class="form-control" disabled>  </td>
						<td>Waist to knee <input type="text" value="{{ $data->waisttoknee }}" class="form-control" disabled> </td>
					</tr>

					<tr>
						<td>Waist to floor <input type="text" value="{{ $data->waisttofloor }}" class="form-control" disabled>  </td>
						<td>Knee to floor <input type="text" value="{{ $data->kneetofloor }}" class="form-control" disabled> </td>
						<td>Nippple to nipple <input type="text" value="{{ $data->nipppletonipple }}" class="form-control" disabled>  </td>
						<td>Around arm <input type="text" value="{{ $data->aroundarm }}" class="form-control" disabled>  </td>
						<td>Sleeeve length <input type="text" value="{{ $data->sleeevelength }}" class="form-control" disabled>  </td>
						<td>Shortdress <input type="text" value="{{ $data->shortdress }}" class="form-control" disabled> </td>
					</tr>

					<tr>
						<td>Long dress <input type="text" value="{{ $data->longdress }}" class="form-control" disabled></td>
						<td>Midi dress <input type="text" value="{{ $data->mididress }}" class="form-control" disabled>  </td>
						<td>Blouse length <input type="text" value="{{ $data->blouselength }}" class="form-control" disabled> </td>
						<td>Skirt length <input type="text" value="{{ $data->skirtlength }}" class="form-control" disabled>  </td>
						<td>Slit length <input type="text" value="{{ $data->slitlength }}" class="form-control" disabled>  </td>
						<td>Hip <input type="text" value="{{ $data->hip }}" class="form-control" disabled> </td>
					</tr>


					<tr>
						<td>Full length <input type="text" value="{{ $data->fulllength }}" class="form-control" disabled>  </td>
						<td>Across chest <input type="text" value="{{ $data->acrosschest }}" class="form-control" disabled>  </td>
						<td>Across back <input type="text" value="{{ $data->acrossback }}" class="form-control" disabled>  </td>
						<td>Neck <input type="text" value="{{ $data->neck }}" class="form-control" disabled>  </td>
						<td>Off shoulder <input type="text" value="{{ $data->offshoulder }}" class="form-control" disabled>  </td>
						<td>Around knee <input type="text" value="{{ $data->aroundknee }}" class="form-control" disabled> </td>
					</tr>

					<tr>
						<td>Status</td>
						<td colspan="5"> 
							@if ($data->status == '0') 
			                <label class="badge badge-info">Processing..</label>

			                @elseif($data->status == '1')

			                <label class="badge badge-success">Received..</label>

			               @endif

			               
						</td>
					</tr>				
				</tbody>
			</table>
		</div>
	</div>
</div>