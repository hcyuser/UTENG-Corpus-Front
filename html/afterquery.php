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

    if($_POST["sd"] && $_POST["ed"] && $_POST["so"] && $_POST["eo"] &&  $_POST["school"] ){
      $sd = trim($_POST["sd"]);
      $ed = trim($_POST["ed"]);
      $so = trim($_POST["so"]);
      $eo = trim($_POST["eo"]);
      $school = trim($_POST["school"]);
    }
    if(file_exists("./txtoutput/".$school."-".$so.".txt")){
            unlink("./txtoutput/".$school."-".$so.".txt");
    }
    $myfile = fopen("./txtoutput/".$school."-".$so.".txt", "w") or die("Unable to open file!");
    $r = read_one_record($__db, "SELECT distinct id FROM user.professor WHERE quality >= '1' AND quality <= '2' AND school like 'University of Delaware' AND location like 'Newark, DE' into TC;", array());
    $rs=read_multi_record($__db, "select R.* from user.response R inner join TC on R.tid=TC.id where C_DATE >= '2014-01-01' AND C_DATE <= '2017-12-31';",array(),array());
    if ($rs === false){
      echo "101, \"".kwcr2_geterrormsg($__db, 1)."\"";
      echo $rs;

    }else {

      foreach ($rs as $r)
        echo "\n".implode(",", $r);
        //$show = $r[0].":".$r[1].":".$r[4].":".$r[2];
        //fwrite($myfile, $show."\r\n");
        //echo $show;

    }
    fclose($myfile);
    echo "<html>Query Result:".$br;
    echo "<a href=\"";
    echo "http://tcu.cyberhood.net/UT_ENG_Front/html/txtoutput/".$school."-".$so.".txt";
    echo "\">Download Here</a></html>";
    kwcr2_unmapdb($__db);
?>
