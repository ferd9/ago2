<?php


require_once("login.php");

// set the timelimit
@set_time_limit($CONF['timelimit']);

// show the requested file
if (isset($_GET['view']) && file_exists($_GET['view'])) {
    if (isset($_GET['download'])) {
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=".basename($_GET['view']));
        readfile($_GET['view']);
    } else {
        echo "<pre>";
        while($line=PMBP_getln($_GET['view'])) echo htmlentities($line);
        PMBP_getln($_GET['view'],true);
        echo "</pre>";
    }
} else {
	if (isset($_GET['view'])) echo $_GET['view']." ".F_MAIL_3."!";
}
?>
