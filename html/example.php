<?	//http://tcu.cyberhood.net/UT_ENG_Front/example.php
	header('Content-Type: text/plain; charset="utf-8"');
	header('Content-Disposition: inline; filename="result.txt"');
	require_once('common.Utility.php');
	
	//connect db
	$__db=kwcr2_mapdb("RATING", 'user', 'user');
	if ($__db===0) {
		echo "100, \"connect db failed!\"";
		return;
	}



	//1. execute sql
	if (!kwcr2_rawqueryexec($__db, "update PROFESSOR set FIRSTNAME=? where ID=?", array('aaa', 1), "")) {
		echo "101, \"".kwcr2_geterrormsg($__db, 1)."\"";
		kwcr2_unmapdb($__db);
		return;
	}
	echo "0, \"\"";



	//2. transaction
	if (!kwcr2_starttransaction($__db)) {
		echo "101, \"transation start error!\"";
		kwcr2_unmapdb($__db);
		return;
	}
	
	if (!kwcr2_rawqueryexec($__db, "update PROFESSOR set FIRSTNAME=? where ID=?", array('aaa', 1), "")) {
		echo "102, \"".kwcr2_geterrormsg($__db, 1)."\"";
		//rollback
		kwcr2_rollbacktransaction($__db);
		kwcr2_unmapdb($__db);
		return;
	}
	//commit
	kwcr2_committransaction($__db);
	echo "0, \"\"";



	//3. read one record
	$r = read_one_record($__db, "select ID, FIRSTNAME, LASTNAME, DEPARTMENT, SCHOOL, LOCATION, QUALITY, TAKEAGAIN, DIFFICULTY from PROFESSOR limit 1", array());
	if ($r === false) 
		echo "101, \"".kwcr2_geterrormsg($__db, 1)."\"";
	else {
		echo "0, \"\"";
		echo "\n".implode(",", $r);
	}



	//4. read multi record
	$rs=read_multi_record($__db, "select ID, FIRSTNAME, LASTNAME, DEPARTMENT, SCHOOL, LOCATION, QUALITY, TAKEAGAIN, DIFFICULTY from PROFESSOR where ID<?", array(10), array());
	if ($rs === false) 
		echo "101, \"".kwcr2_geterrormsg($__db, 1)."\"";
	else {
		echo "0, \"\"";
		foreach ($rs as $r) 
			echo "\n".implode(",", $r);
	}



	//disconnect db
	kwcr2_unmapdb($__db);
?>