<?php
    include "connector.php";

    $facultyExists = false;

    $buttons = isset($_POST["buttons"]) ? $_POST["buttons"] : false;

    if($buttons == 'daily') 
    {
        $date = isset($_POST["dailydate"]) ? $_POST["dailydate"] : false;
        $dates = explode("/",$date);
        $date = $dates[2]."-".$dates[0]."-".$dates[1]; 
        $dateFilter = "date = '".$date."' ";

        switch($dates[0])
        {
            case 1 : $labeldate = "January"; break;
            case 2 : $labeldate = "February"; break;
            case 3 : $labeldate = "March"; break;
            case 4 : $labeldate = "April"; break;
            case 5 : $labeldate = "May"; break;
            case 6 : $labeldate = "June"; break;
            case 7 : $labeldate = "July"; break;
            case 8 : $labeldate = "August"; break;
            case 9 : $labeldate = "September"; break;
            case 10 : $labeldate = "October"; break;
            case 11 : $labeldate = "November"; break;
            case 12 : $labeldate = "December"; break;
        }
        $labeldate = $labeldate." ".$dates[1].", ".$dates[2];
    }
    else if($buttons == 'monthly')
    {
        $months = isset($_POST["months"]) ? $_POST["months"] : false;
        $years = isset($_POST["years"]) ? $_POST["years"] : false;

        $month = $months;
        switch($months)
        {
            case "January" : $months =1; $end = 31; break;
            case "February" : $months =2; 
            if(($year % 4 == 0) && ($years % 100 != 0) || ($years % 400 == 0))
                $end = 28; 
            else 
                $end =29; 
            break;
            case "March" : $months =3; $end = 31; break;
            case "April" : $months =4; $end = 30; break;
            case "May" : $months =5; $end = 31; break;
            case "June" : $months =6; $end = 30; break;
            case "July" : $months =7; $end = 31; break;
            case "August" : $months =8; $end = 31; break;
            case "September" : $months =9; $end = 30; break;
            case "October" : $months =10; $end = 31; break;
            case "November" : $months =11; $end = 30; break;
            case "December" : $months =12; $end = 31; break;
        }


        $date = $years."-".$months."-01"; 
        $date2 = $years."-".$months."-".$end; 

        $dateFilter = "date BETWEEN '".$date."' AND '".$date2."' ";

        $labeldate = $month." ".$years;
        
        //WHERE ('2016-09-04' < start AND '2016-12-22' > end ) OR ('2016-09-04' > start AND '2016-12-22' < end )
        $dateFilter2 = "( '".$date."' < end ) OR ( '".$date2."' > start) ";
        //$dateFilter2 = "(".str_replace("date", "start", $dateFilter).") OR (".str_replace("date", "end", $dateFilter).") ";
    }
    else if($buttons == 'term')
    {
        $terms = isset($_POST["terms"]) ? $_POST["terms"] : false;
        $years = isset($_POST["academicyears"]) ? $_POST["academicyears"] : false;

        $stmt = $conn->prepare("SELECT * 
                                FROM term INNER JOIN academicyear AY ON term.year_id = AY.id 
                                WHERE term_no = :terms AND AY.name = :years;");

        $stmt->execute(["terms" => $terms, "years" =>$years]);
        

        $result = $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC); // assuming $result == true
        
        if(!$rows)
        {
            echo "<script>
            alert('No Such Term for that Academic Year.');
            window.location.replace('../dashboard.html');
            </script>";
        }

        $dateFilter = "date BETWEEN '".$rows['start']."' AND '".$rows['end']."' "; 
        if($terms == 1)
            $termP = "1st";
        if($terms == 2)
            $termPs = "2nd";
        if($terms == 3)
            $termP = "3rd";

        $labeldate = $termP." TRIMESTER, ".$years ;
        $dateFilter2 = "(".str_replace("date", "start", $dateFilter).") AND (".str_replace("date", "end", $dateFilter).") ";

    }
    else if($buttons == 'custom')
    {
        $dates = isset($_POST["dates"]) ? $_POST["dates"] : false;
        $dates = explode(".", $dates);
        $dateFilter = "date BETWEEN '".$dates[0]."' AND '".$dates[1]."' "; 
        $labeldate = "Dates Between ".$dates[0]." to ". $dates[1];      
        //$dateFilter2 = "(".str_replace("date", "start", $dateFilter).") OR (".str_replace("date", "end", $dateFilter).") ";
        $dateFilter2 = "( '".$dates[0]."' < end ) OR ( '".$dates[1]."' > start) ";
    }
        
    
    $options = isset($_POST["options"]) ? $_POST["options"] : false;

    $filter = "";
                                        
    if($options == 'faculty'){
        $filter = "WHERE ";
        $inputs = isset($_POST["inputs"]) ? $_POST["inputs"] : false;
                                                    

        if($inputs == 'idnumber'){
            $idnumber = isset($_POST["idnumber"]) ? $_POST["idnumber"] : false;
                 
            $stmt= $conn->prepare("SELECT first_name, middle_name, last_name FROM faculty 
                                        WHERE id = :idnumber ;");

            $stmt->execute(["idnumber" => $idnumber]);

            $result = $stmt->execute();
            
            if($rows = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo "<script>
                alert('Faculty member not found.');
                window.location.replace('../dashboard.html');
                </script>";
            }

            $filter = $filter."last_name ='".$rows['last_name']."' AND  first_name ='".$rows['first_name']."' AND middle_name ='".$rows['middle_name']."'";
        }
        else
        {
            $name = isset($_POST["name"]) ? $_POST["name"] : false;
            $stmt= $conn->prepare("SELECT first_name, middle_name, last_name FROM faculty 
                                    WHERE first_name= :name OR last_name= :name OR middle_name= :name");

            $stmt->execute(["name" => $name]);

            $result = $stmt->execute();
            
            if(!$rows = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo "<script>
                alert('Faculty member not found.');
                window.location.replace('../dashboard.html');
                </script>";
            }
            $filter = $filter."last_name ='".$rows['last_name']."' AND  first_name ='".$rows['first_name']."' AND middle_name ='".$rows['middle_name']."'";         
        }
                                                
    }
    else                                  
    {
        $college = isset($_POST["college"]) ? $_POST["college"] : false;
        $department = isset($_POST["department"]) ? $_POST["department"] : false;

        switch ($college) {
            case 'CCS':
                    $department = isset($_POST["ccs"]) ? $_POST["ccs"] : false;
                break;
            case 'COS':
                    $department = isset($_POST["cos"]) ? $_POST["cos"] : false;
                break;
            case 'COL':
                    $department = isset($_POST["col"]) ? $_POST["col"] : false;
                break;
            case 'CLA':
                    $department = isset($_POST["cla"]) ? $_POST["cla"] : false;
                break;
            case 'RVRCOB':
                    $department = isset($_POST["rvrcob"]) ? $_POST["rvrcob"] : false;
                break;
            case 'BAGCED':
                    $department = isset($_POST["bagced"]) ? $_POST["bagced"] : false;
                break;
            case 'GCOE':
                    $department = isset($_POST["gcoe"]) ? $_POST["gcoe"] : false;
                break;
            case 'SOE':
                    $department = isset($_POST["soe"]) ? $_POST["soe"] : false;
                break;
            
            default:
                    $department = isset($_POST["all"]) ? $_POST["all"] : false;
                break;
        }
                  
        $filter= "";

        if($college != 'All Colleges')
        {
            echo "string";
            if($department != 'All Departments')
                $filter = "WHERE "."department= '".$department."' AND college= '".$college."'";
            else
                $filter = "WHERE college = '".$college."' ";
        }                     
                                                                  
    }

    if($buttons == 'daily')
    {
        $stmt = $conn->prepare("SELECT college, department,first_name,middle_name,last_name,time_start,time_end,section,remarks,room_name,code
                            FROM
                                (SELECT college, department,first_name,middle_name,last_name,time_start,time_end,section,remarks,name as 'room_name',date,course_id
                                FROM
                                    (SELECT college, department,first_name,middle_name,last_name,time_start,time_end,section,remarks, room_id,course_id, date
                                     FROM 
                                        (SELECT college, department,first_name,middle_name,last_name,time_start,time_end,C.section,room_id,C.id as 'offering_id', course_id
                                         FROM faculty F
                                         INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
                                     INNER JOIN attendance A on A.courseoffering_id = Y.offering_id
                                     WHERE ".$dateFilter." ) as Z
                                INNER JOIN room R on R.id = Z.room_id) as A
                            INNER JOIN course C ON C.id = A.course_id
                            ".$filter."
                            ;");
        $result = $stmt->execute();


        if(!$rows = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo "<script>
            alert('Record not found.');
            window.location.replace('../dashboard.html');
            </script>";
        }
        else
        {
            header("Location: generatereports.php?filter=".$filter
                ."&dateFilter=".$dateFilter
                ."&labeldate=".$labeldate
                ."&buttons=".$buttons);
            exit;
        }

    }
    else
    {

        //$dateFilter2 = "(".str_replace("date", "start", $dateFilter).") AND (".str_replace("date", "end", $dateFilter).") ";
                                                
        $stmt = $conn->prepare( "SELECT department, college, first_name,middle_name,last_name, faculty_id
                                    FROM (
                                        SELECT department,first_name, college, middle_name,last_name, faculty_id
                                        FROM (
                                            SELECT department, college, first_name,middle_name,last_name,term_id,C.id as 'offering_id',F.id as 'faculty_id' 
                                            FROM faculty F INNER JOIN courseoffering C ON C.faculty_id = F.id ".$filter."
                                            ) as Y 
                                            INNER JOIN term T ON T.id = Y.term_id 
                                            WHERE ".$dateFilter2." 
                                        ) as Z 
                                    GROUP BY faculty_id;");
        echo "SELECT department, college, first_name,middle_name,last_name, faculty_id
                                    FROM (
                                        SELECT department,first_name, college, middle_name,last_name, faculty_id
                                        FROM (
                                            SELECT department, college, first_name,middle_name,last_name,term_id,C.id as 'offering_id',F.id as 'faculty_id' 
                                            FROM faculty F INNER JOIN courseoffering C ON C.faculty_id = F.id ".$filter."
                                            ) as Y 
                                            INNER JOIN term T ON T.id = Y.term_id 
                                            WHERE ".$dateFilter2." 
                                        ) as Z 
                                    GROUP BY faculty_id;";


        $result = $stmt->execute();

        if(!$rows = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo "<script>
            alert('Record not found.');
            
            </script>";
        }
        else
        {
            header("Location: generatereports.php?filter=".$filter
                ."&dateFilter=".$dateFilter
                ."&dateFilter2=".$dateFilter2
                ."&labeldate=".$labeldate
                ."&buttons=".$buttons);
            exit;
        }
    }

    

?>