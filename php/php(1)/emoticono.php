
	<?php
function generarEmoji() { 
        $emoji = rand(128512, 128586); 
        return $emoji; 
} 
$emoji = generarEmoji();

        echo "<span style='font-size:100px;'>&#$emoji;</span>";
?>






