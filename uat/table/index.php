<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Setting the pages character encoding -->
	<meta charset="UTF-8">
	
	<!-- The meta viewport will scale my content to any device width -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Link to my stylesheet -->
	<link rel="stylesheet" href="styles.css"> 
	<title>Start up</title>
</head>
<body>

	<h2>Display dynamic data in an html table</h2>

	<table>
	
		<!-- The tables header -->
		<tr>
			<th>Product Image</th>
			<th>Name</th>
			<th>Price</th>
			<th>Product code</th>
			<th>Available items</th>
			<th>Actions</th>
		</tr>

		<!-- The html template we will use in our loop -->
		<tr>
			<td> <!-- The products image --> </td>
			<td> <!-- The products name --> </td>
			<td> <!-- The products price --> </td>
			<td> <!-- The products code --> </td>
			<td> <!-- The products inventory --> </td>
			<td>
				<!-- Edit actions -->
				<select name="actions" id="actions">
					<option value="">Select action</option>
					<option value="remove">Remove</option>
					<option value="edit">Edit</option>
					<option value="sold-out">Sold out</option>
				</select>
			</td>
		</tr>
	</table>
</body>
</html>