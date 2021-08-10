`   q<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "patdb";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if($conn->connect_error)
    {
        die("connection failed".$conn->connect_error);
    }
    $sqlsign="select * from reg";
    if ($r=mysqli_query($conn, $sqlsign))
            {
                echo "<table class='styled-table'>";
                echo "<tr>";
                echo "<th> Name </th>";
                echo "<th> Roll Number </th>";
                echo "<th> Branch </th>";
                echo "<th> CodeChef Username </th>";
                echo "<th> CodeChef Score </th>";
                echo "<th> Codeforces username </th>";
                echo "<th> Codeforces Score </th>";
                echo "<th> Spoj username </th>";
                echo "<th> Spoj Score </th>";
                echo "<th> Total Score </th></tr>";
                while($t=mysqli_fetch_array($r)){

                    echo "<tr><td>".$t['name']."</td>";
                    echo "<td>".$t['rollno']."</td>";
                    echo "<td>".$t['branch']."</td>";
                    echo "<td>".$t['CodeChef']."</td>";
                    echo "<td>".$t['CodeChefScore']."</td>";
                    echo "<td>".$t['Codeforces']."</td>";
                    echo "<td>".$t['CodeforcesScore']."</td>";
                    echo "<td>".$t['Spoj']."</td>";
                    echo "<td>".$t['SpojScore']."</td>";
                    echo "<td>".$t['TotalScore'];
                }
                echo "</table>";
            } 
        else 
            {
                echo "Error: " . $sqlsign . "<br>" . mysqli_error($conn);
            }
    
    mysqli_close($conn);
?>

<html>
    <head>
        <style>
            .styled-table {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                font-family: sans-serif;
                min-width: 400px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                }
            .styled-table thead tr {
                background-color: #009879;
                color: #ffffff;
                text-align: left;
                }
            .styled-table th,
            .styled-table td {
                padding: 12px 15px;
                }
            .styled-table tbody tr {
                border-bottom: 1px solid #dddddd;
                }
            .styled-table tbody tr:nth-of-type(even) {
                background-color: #f3f3f3;
            }

            .styled-table tbody tr:last-of-type {
                border-bottom: 2px solid #009879;
            }
            .styled-table tbody tr.active-row {
                font-weight: bold;
                color: #009879;
            }
            button {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                margin-left:40%;
                font-size: 16px;
            }
        </style>
        </head>
    <body>
        
    <form method="POST" action="logout.php">
        <button>logout</button>
        </body>
    </html>
