<?php
    header('Content-Type: text/plain; charset="utf-8"');
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

    $rs=read_multi_record($__db, "SELECT COUNT(*) FROM professor WHERE school = '$school' ",array(),array());
    if ($rs === false){
      echo "101, \"".kwcr2_geterrormsg($__db, 1)."\"";
      echo $rs;

    }else {

      foreach ($rs as $r){
        $show = $row['COUNT(*)'];

      }
      echo "Query Result:".$br.$show;

    }
    kwcr2_unmapdb($__db);
?>
