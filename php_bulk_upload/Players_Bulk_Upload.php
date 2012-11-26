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
        
        //Import data from .csv file
        $handle = fopen("players.csv", "r");     
        
        //Insert Query
        while (($data = fgetcsv($handle, ",")) !== FALSE){
        mysql_query("INSERT INTO PLAYERS (NAME, DOB, PLACEBIRTH, SALARY, STREET, CITY, COUNTRY, PLAYERPHOTO) VALUES('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."','".$data[7]."')") or die(mysql_error()); 
        echo "Row Successfully created in db!!";
        echo '</br>';
        }
        
        fclose($handle);
        ?>
    </body>
</html>
