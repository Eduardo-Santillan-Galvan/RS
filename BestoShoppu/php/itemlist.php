<?php
session_start(); // Starting Session

include("connection.php");
include_once("usefulScripts.php");

$connection = Connect2DB();

$query = "SELECT * FROM items";
$result = $connection->query($query);

?>

<head>
<!-- Default libraries -->
	<script src="./datatables.min.js"></script>

	<!-- Personal styles -->
	<link rel="stylesheet" href="./datatables.min.css">

  <!-- Personal scripts -->
  <script src="./js/itemlist.js"></script>

</head>
<body>
<table id="items-table" class="display">
	<thead>
		<tr>
			<th>Imagen</th>
			<th>Marca</th>
			<th>Descripción</th>
			<th>Precio + Carrito</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo "<tr>"
			."<td>". $row['item_name']."</td>"
			."<td>". $row['item_type']."</td>"
			."<td>". $row['item_price']."</td>"
			."<td>". $row['item_stock']."</td>"
			."</tr>";
		}
		$connection->close(); // Closing Connection
		?>
	</tbody>
</table>
</body>