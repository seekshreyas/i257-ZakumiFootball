<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // Make a MySQL Connection
        mysql_connect("54.243.36.26","dbuser","deer") or die(mysql_error());
        mysql_select_db("ZAKUMI") or die(mysql_error());
        
        //Query the Database
        $query = mysql_query("SELECT * FROM MANAGERS");
        
        //Fetch each row from the query result
        while (($row = mysql_fetch_row($query))!== FALSE){
            echo('<ul><li>'.$row[0].'<li>'.$row[1].'<li>'.$row[2].'<li>'.$row[3].'<li>'.$row[4].'<li>'.$row[5].'<li>'.$row[6]).'</ul>';
            echo "<img src='".$row[7]."' alt='Image' />";
            echo("<br/>");
        }    

        ?>
    </body>
</html>
