<html>
<head>
<title>WELCOME</title>
</head>
<body>
<?php
  $dbcnx = @mysql_connect("mysql4.000webhost.com", "a7890595_joe", "cooperation");
  if (!$dbcnx) {
    echo( "<p>Unable to connect to the " .
          "database server at this time.</p>" );
    exit();
  } 
  echo( "CONNECTED TO THE SERVER MOTHERFUCKER!<br>" );
  if (!@mysql_select_db("a7890595_books", $dbcnx) ) {
      echo( "<p>Unable to locate the book " .
            "database at this time.</p>" );
      exit();
  }
  echo( "CONNECTED TO BOOKS, SO THERE!<br>" );
  $sql = "INSERT INTO books (ISBN, Title, Type, Condition) VALUES (" . 
    "'" . $_POST[isbn] . "', " .
    "'" . $_POST[title] . "', " .
    "'" . $_POST[type] ."', " . 
    "'" . $_POST[cond] . "')";
  /*if ( mysql_query("INSERT INTO a7890595_books ('ISBN', 'Title', 'Type', 'Condition') VALUES (" . $_POST['isbn'] . ", " . $_POST['title'] . ", " . $_POST['type'] . ", " . $_POST['cond'] . ");" ) ){
    echo("<p>Book inserted</p>");
  } else {
    echo("<P>Error performing insert: " . mysql_error() . "</p>");
  }*/
  $insert = "INSERT INTO books (`ISBN`, `Title`, `Type`, `Condition`) VALUES (" . $_POST['isbn'] . ", '" . $_POST['title'] . "', " . $_POST['type'] . ", " . $_POST['cond'] . ")";
  mysql_query($insert) or die(mysql_error()."<br />".$insert);
  
  echo( "<br>" );
  $result = mysql_query("SELECT Title FROM books");
  if (!$result) {
    echo("<p>Error preforming query: " . mysql_error() . "</p>");
    exit();
  }
  while ( $row = mysql_fetch_array($result) ) {
    echo("</p>" . $row["Title"] . "</p>");
  }
?>
<body>
</head>
</html>
