<?php
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
   

    if(isset($_POST['reg']))
    {
        $n=$_POST["name"];
        $ro=$_POST["Rollno"];
        $b=$_POST["Branch"];
        $pa=$_POST["passout"];
        $h=$_POST["Hackerrank"];
        $c=$_POST["CodeChef"];
        $f=$_POST["Codeforces"];
        $s=$_POST["Spoj"];
        $e=$_POST["email"];
        $p=$_POST["password"];
        $cp=$_POST["confirm-password"];
        //echo $n.$r.$b.$pa.$h.$c.$f.$s.$e.$p.$cp;

        $curl = curl_init();
	
        curl_setopt($curl,CURLOPT_URL,"http://all-cp-platforms-api.herokuapp.com/api/codechef/".$c);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        
        $response = curl_exec($curl);
        $result=json_decode($response,true);
        $r=$result['rating'];
        //echo "codechef ".$r."<br>";
        
        
    
        curl_setopt($curl,CURLOPT_URL,"http://all-cp-platforms-api.herokuapp.com/api/codeforces/".$f);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        
        $response = curl_exec($curl);
        $result=json_decode($response,true);
        if(isset($result['rating']))
        {
            $r1=$result['rating'];
        }
        else{
            $r1=0;
        }
        //echo "codeforces ".$r1."<br>";
        
    
        curl_setopt($curl,CURLOPT_URL,"http://all-cp-platforms-api.herokuapp.com/api/spoj/".$s);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        
        $response = curl_exec($curl);
        $result=json_decode($response,true);
        $r2=$result['Problems solved'];
        $r2=$r2*20;
        //echo "spoj ".$r2."<br>";
        $total=$r+$r1+$r2;
        if($p==$cp)
        {
            $sqlsign = "INSERT INTO reg (name,rollno,branch,passout,CodeChef,CodeChefScore,Codeforces,CodeforcesScore,Spoj,SpojScore,email,password,conform,TotalScore)
            VALUES ('$n','$ro','$b','$pa','$c',$r,'$f',$r1,'$s',$r2,'$e','$p','$cp',$total)";
            
        }
        if (mysqli_query($conn, $sqlsign))
        {
            header("location:loginto.php");
        } 
        else{
            //header("location:course-login1.php?error=there is some thing error");
            echo "Error: " . $sqlsign . "<br>" . mysqli_error($conn);
        }
    }
    else
    {
        header("location:course-login1.php?error=password_and_conform_password_missmatch");
    }
    
    mysqli_close($conn);

?>