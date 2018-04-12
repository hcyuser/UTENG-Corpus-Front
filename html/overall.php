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
<nav class="navbar navbar-inverse">
  <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">Rate My professor Corpus System</a>
  </div>
</nav>
<div class="container">
<div class="well well-lg">
  <h3>
  Introduction
  </h3>
  <p><h4>
  This is a corpus database collecting the comments and other attributes from Rate My Professors.
  It records the comments from Jan. 1999 to Jan. 2018, which are curled from 25 Jan. 2018 to 25 Feb. 2018 by Google Cloud Platform (GCP).
  The establishers of this database are <a href="http://163.21.236.197/~english/old_dat/teacher_int/Mei-ching-Ho.htm">Mei-ching Ho</a> and <a href="http://www.hcy.idv.tw/intro">HUANG, CHIH-YANG</a>.
  This project is sponsored by Ministry of Science and Technology (MOST), TAIWAN(R.O.C.).
  </p></h4>
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
          <label>Start Date MM/DD/YYYY:</label>
          <br>
          <input type="text" class="form-control" name="sd" value="01/01/2014" required><br>
        </div>

        <div class="form-group">
          <label>End Date MM/DD/YYYY:</label>
          <br>
          <input type="text" class="form-control" name="ed" value="12/31/2017" required><br>
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
