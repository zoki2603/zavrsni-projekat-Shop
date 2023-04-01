<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vaša kupovina</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			background-color: #f5f5f5;
			font-family: Arial, sans-serif;
		}
		h1 {
			margin: 0;
			padding: 20px 0;
			text-align: center;
			font-size: 24px;
			font-weight: normal;
		}
		table {
			margin: 0 auto;
			width: 80%;
			background-color: #fff;
			border-collapse: collapse;
			box-shadow: 0px 0px 5px 2px #ccc;
		}
		td, th {
			padding: 10px;
			border: 1px solid #ddd;
			text-align: left;
			font-size: 16px;
		}
		.total {
			font-weight: bold;
		}
		.message {
			margin: 50px auto;
			width: 80%;
			background-color: #fff;
			padding: 20px;
			box-shadow: 0px 0px 5px 2px #ccc;
			text-align: center;
			font-size: 18px;
			line-height: 1.5;
		}
	</style>
</head>
<body>
	<h1>Vaša kupovina</h1>
	<table>
		<thead>
			<tr>
				<th>Proizvod</th>
				<th>Cena</th>
			</tr>
		</thead>
        
		<tbody>  
            @foreach ($purchases as $purchase )
			<tr>
				<td>{{ $purchase->name }}</td>
				<td>{{ $purchase->price }}</td>
			</tr>
		
			
		</tbody>
         @endforeach
	</table>
	<div class="message">
		<p>Hvala vam što ste kupovali kod nas!</p>
		<p>Vaša porudžbina će biti isporučena u roku od 3-5 radnih dana.</p>
		<p>Za bilo kakva pitanja ili nejasnoće, možete nas kontaktirati putem e-maila ili telefona.</p>
	</div>
</body>
</html>
