<div class="row">

	<div class="col-md-4">
		<div class="small-box bg-info">
			<div class="inner">
				<h3>{{ $totalusers }}</h3>
				<p>Total Users </p>
			</div>
			<div class="icon">
				<i class="fas fa-calendar"></i>
			</div>
			<a href="/admin/auth/users" class="small-box-footer">
				More info <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-md-4">
		<div class="small-box bg-gradient-danger">
			<div class="inner">
				<h3>{{ $allemployee }}</h3>
				<p>All Employee </p>
			</div>
			<div class="icon">
				<i class="fas fa-calendar"></i>
			</div>
			<a href="/admin/employees" class="small-box-footer">
				More info <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-md-4">
		<div class="small-box bg-success">
			<div class="inner">
				<h3>{{ $allapprentices }}</h3>
				<p>All Apprentices</p>
			</div>
			<div class="icon">
				<i class="fas fa-calendar"></i>
			</div>
			<a href="/admin/apprentices" class="small-box-footer">
				More info <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	
</div>

<div class="row">

	<div class="col-md-4">
		<div class="info-box">
			<span class="info-box-icon bg-teal"><i class="fas fa-dollar-sign"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Total Records For Dress / Blouse / Skirt</span>
				<span class="info-box-number">Gh¢ {{$allshirtblouse}}</span>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="info-box">
			<span class="info-box-icon bg-teal"><i class="fas fa-dollar-sign"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Total Records For Trouser / Jumpsuit</span>
				<span class="info-box-number">Gh¢ {{$alljumpsuit}}</span>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="info-box">
			<span class="info-box-icon bg-info"><i class="fas fa-dollar-sign"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Total Payments Received Today</span>
				<span class="info-box-number">Gh¢ {{number_format($totaltoday ? : 0,2)}}</span>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="info-box">
			<span class="info-box-icon bg-info"><i class="fas fa-dollar-sign"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Total Payments Received This Month</span>
				<span class="info-box-number">Gh¢ {{number_format($totalmonth ? : 0,2)}}</span>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="info-box">
			<span class="info-box-icon bg-teal"><i class="fas fa-dollar-sign"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Total Payments Received For The Year</span>
				<span class="info-box-number">Gh¢ {{number_format($totalyear ? : 0,2)}}</span>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="info-box">
			<span class="info-box-icon bg-info"><i class="fas fa-dollar-sign"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Total Expected Owings</span>
				<span class="info-box-number"> Gh¢{{number_format($expectedowings ? : 0,2)}}</span>
			</div>
		</div>
	</div>

</div>