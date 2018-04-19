<?	//http://tcu.cyberhood.net/UT_ENG_Front/example.php
	header('Content-Type: text/html; charset="utf-8"');
	header('Content-Disposition: inline; filename="result.txt"');
	require_once('common.Utility.php');
  $output = shell_exec("rm -f ./txtoutput/*.txt");
  echo "<pre>$output</pre>";
  echo "<h5>Well Done!</h5>";

?>
