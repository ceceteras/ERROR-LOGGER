$brush_price = 5; 

echo "<table border=\"1\" align=\"center\">";
echo "<tr><th>Quantity</th>";
echo "<th>Price</th></tr>";
for ( $counter = 10; $counter <= 100; $counter += 10) {
	echo "<tr><td>";
	echo $counter;
	echo "</td><td>";
	echo $brush_price * $counter;
	echo "</td></tr>";
}
echo "</table>";