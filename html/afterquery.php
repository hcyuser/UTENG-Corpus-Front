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
    $rs=read_multi_record($__db, "select R.ID, R.TID, SUBBLOBTOCHAR(R.CONTENT,null,null), R.\"DATE\", R.QUALITY, R.Difficulty, R.C_date from user.response R inner join user.professor TC on R.tid=TC.id AND TC.quality >= '$so' AND TC.quality <= '$eo' AND TC.school like '$school' where R.C_DATE >= '$sd' AND R.C_DATE <= '$ed' ",array(),array());
    if ($rs === false){
      echo "101, \"".kwcr2_geterrormsg($__db, 1)."\"";
      echo $rs;

    }else {

      foreach ($rs as $r){
        //echo "\n".implode(",", $r);
        $show = $r[0].":".$r[1].":".$r[4].":".$r[2];
        fwrite($myfile, $show."\r\n");
        //echo $show;

      }


    }
    fclose($myfile);
    kwcr2_unmapdb($__db);
?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
echo "<html>Query Result:".$br;
echo "<a href=\"";
echo "http://tcu.cyberhood.net/UT_ENG_Front/html/txtoutput/".$school."-".$so.".txt";
echo "\">Download Here</a></html>";

?>
