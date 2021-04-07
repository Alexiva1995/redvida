@foreach ($commissions as $commission)
	<tr class="text-center">
		<td>{{ $commission->id }}</td>
		<td>{{ $commission->type }}</td>
		<td>{{ $commission->amount }}$</td>
	</tr>
@endforeach