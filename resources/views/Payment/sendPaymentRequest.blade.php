<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		@if(env('MY_WORKING_MODE') == 'Debug')
		<form method="post" action="<?php echo $parameter['CALLBACK_URL'] ?>" name="f1">
			@csrf
		<table border="1">
			<tbody>
			@foreach($parameter as $name => $value) 

			<tr>
				<td>{{$name}}</td>
				<td>{{$value}}</td>
			</tr>
			@endforeach

			<input type="hidden" name="ORDERID" value="{{$parameter['ORDER_ID']}}">
			<input type="hidden" name="TXNID" value="9876543210">
			<input type="hidden" name="TXNAMOUNT" value="{{$parameter['TXN_AMOUNT']}}">
			<input type="hidden" name="CURRENCY" value="INR">
			<input type="hidden" name="STATUS" value="TXN_SUCCESS">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
	@else
		<form method="post" action="<?php echo $url ?>" name="f1">
			@csrf
		<table border="1">
			<tbody>
			<?php
			foreach($parameter as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
	@endif
</body>
</html>