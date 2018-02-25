<HTML>
<HEAD>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Rate My professor Corpus System</title>

</HEAD>

<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="well">
  This is a corpus database that collected the comments and other attributes from Rate My Professors.
  It recorded the comments from Jan. 1999 to Jan. 2018, which curled from 25 Jan. 2018 to 25 Feb. 2018 by Google Cloud Platform (GCP).
  The establisher of this database are <a href="http://163.21.236.197/~english/old_dat/teacher_int/Mei-ching-Ho.htm">Mei-ching Ho</a> and <a href="http://www.hcy.idv.tw/intro">HUANG, CHIH-YANG</a>.
</div>
<div class="panel panel-default">
  <div class="panel-heading">Panel Heading</div>
  <div class="panel-body">
    <form action="./afterquery.php" method="post">
      <div class="form-group">
          <label>School Name:</label>
        <input type="text" name="school" value="University of Delaware" required><br>
      </div>
      <div class="form-group">
          <label>Start DateYYYY-MM-DD:</label>
        <input type="text" name="sd" value="2014-01-01" required><br>
      </div>

      <div class="form-group">
        <label>End Date YYYY-MM-DD:</label>
        <input type="text" name="ed" value="2017-12-31" required><br>
      </div>

      <div class="form-group">
        <label>Start Overall Quality:</label>
        <input type="text" name="so" value="4" required><br>
      </div>

      <div class="form-group">
        <label>End Overall Quality:</label>
        <input type="text" name="eo" value="5" required>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
</body>
</HTML>
