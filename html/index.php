<HTML>
<HEAD>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Rate My professor Corpus System</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</HEAD>

<body>
<div class="container">
<div class="wwell well-lg">
  This is a corpus database that collected the comments and other attributes from Rate My Professors.
  It recorded the comments from Jan. 1999 to Jan. 2018, which curled from 25 Jan. 2018 to 25 Feb. 2018 by Google Cloud Platform (GCP).
  The establisher of this database are <a href="http://163.21.236.197/~english/old_dat/teacher_int/Mei-ching-Ho.htm">Mei-ching Ho</a> and <a href="http://www.hcy.idv.tw/intro">HUANG, CHIH-YANG</a>.
</div>

  <div class="panel panel-default">
    <div class="panel-heading">Query Zone</div>
    <div class="panel-body">
      <form action="./afterquery.php" method="post">
        <div class="form-group">
          <label>School Name:</label>
          <br>
          <input type="text" class="form-control" name="school" value="University of Delaware" required><br>
        </div>
        <div class="form-group">
          <label>Start DateYYYY-MM-DD:</label>
          <br>
          <input type="text" class="form-control" name="sd" value="2014-01-01" required><br>
        </div>

        <div class="form-group">
          <label>End Date YYYY-MM-DD:</label>
          <br>
          <input type="text" class="form-control" name="ed" value="2017-12-31" required><br>
        </div>

        <div class="form-group">
          <label>Start Overall Quality:</label>
          <br>
          <input type="text" class="form-control" name="so" value="4" required><br>
        </div>

        <div class="form-group">
          <label>End Overall Quality:</label>
          <br>
          <input type="text" class="form-control" name="eo" value="5" required>
        </div>
          <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
</body>
</HTML>
