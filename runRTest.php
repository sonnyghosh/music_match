<?php
$user_id = 13;
$output=shell_exec("Rscript ./test.R $user_id");
echo $output;
?>
