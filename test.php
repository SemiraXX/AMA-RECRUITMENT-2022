<?php

 function OpenConnection()
    {
        $serverName = "tcp:127.0.0.1,1433";
        $connectionOptions = array("Database"=>"ASH",
            "Uid"=>"sa", "PWD"=>"sa_KP#T3AM");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            die(FormatErrors(sqlsrv_errors()));

        return $conn;
    }

 function ReadData()
    {
        try
        {
            $conn = OpenConnection();
            $tsql = "SELECT * FROM JDMaster";
            $getProducts = sqlsrv_query($conn, $tsql);
            if ($getProducts == FALSE)
                die(FormatErrors(sqlsrv_errors()));
            $productCount = 0;
            while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
            {
                echo($row['JDCode'] . ' ' . $row['JDDescription'] );
                echo("<br/>");
                $productCount++;
            }
            sqlsrv_free_stmt($getProducts);
            sqlsrv_close($conn);
        }
        catch(Exception $e)
        {
            echo("Error!");
        }
    }

     ReadData();
?>