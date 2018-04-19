<?php
    header('Content-Type: text/html; charset="utf-8"');
    header('Content-Disposition: inline; filename="result.txt"');
    require_once('common.Utility.php');
    //connect db
    $__db=kwcr2_mapdb("RATING", 'user', 'user');
    if ($__db===0) {
      echo "100, \"connect db failed!\"";
      return;
    }

    $br = "<br/>";

    if($_POST["school"]){
      $school = trim($_POST["school"]);
    }

    $r = read_one_record($__db, "SELECT COUNT(*) FROM professor WHERE school = '$school' ", array());
    if ($r === false){
  		echo "101, \"".kwcr2_geterrormsg($__db, 1)."\"";
  	}else {
        echo "Query Result:".implode(" ", $r);
  	}




    kwcr2_unmapdb($__db);
?>
