<?php
include "viewHeader.php";
include "viewSideMenu.php";
?>
 <div class='col-xs-9'>

<?php
if (count($this->data_set)>0){
	$result = $this->data_set['result_set'];
	
	//display title
	echo "<h3>{$this->data_set['title']}</h3>\n";

	//display table of information
	echo "<table class='table'>";
	echo "<thead><tr><td>Product</td><td>Description</td><td>Price</td></tr></thead>\n";
	
	for ($i=0; $i<count($result); $i++){
	    echo "<tr>";
	    echo "<td>".$result[$i]->product_title."</td>";
	    echo "<td>".$result[$i]->product_description."</td>";
	    echo "<td>".$result[$i]->unit_price."</td>";
	    echo "</tr>";
	}

	echo "</tbody></table>\n";
}	
?>	
</div>
<?php
include "viewFooter.php";

?>
