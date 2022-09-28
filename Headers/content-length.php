<?php
header('Content-Type:application/zip');
//header('Content-length:1000000');
header('Content-disppostion: attachment; filename:"download.zip"');
for($i = 0; $i<1000; $i++) {
    echo(str_repeat(".", 1000));
    usleep(50000);
}
?>