<?php

    require_once "../connect.php";

    $conn = @new mysqli($host, $db_user, $db_password, $db_name);
    if ($conn->connect_errno) {
        echo '<div id="error">Error: '.$conn->connect_errno.'</div>';
    }
    else {
        $conn->set_charset("utf8");

        if(@$_POST['value']==null || @$_POST['var']==null) {
            echo '<div id="error">Error: Błąd zapytania do bazy!</div>';
            $conn->close();
            exit();
        }

        $value = mysqli_real_escape_string($conn,trim($_POST['value']));
        $var = mysqli_real_escape_string($conn,trim($_POST['var']));

        if($countResult = @$conn->query("SELECT COUNT(*) FROM e14 WHERE 1")) {
            $countCheck = $countResult->num_rows;

            if ($countCheck>0) {
                $countArray = $countResult->fetch_assoc();
                $count = $countArray['COUNT(*)'];
                
                if(!$var) $value += 0;
                else if ($var==-1) $value--;
                else if ($var) $value++;
                
                if($value<1) $value = $count;
                else if ($value>$count) $value = 1;

                $sql = "SELECT * FROM e14 WHERE id=$value";
                if($result = @$conn->query($sql)) {
                    $resultCheck = $result->num_rows;

                    if($resultCheck > 0) {
                        $row = $result->fetch_assoc();

echo <<< END
            <script>$("#next").one("click", function () { loadquestion($row[id],1); $("#prev").unbind()}); $("#prev").one("click", function () { loadquestion($row[id],-1); $("#next").unbind()});</script>
            <h3 class="onequestion">To jest pytanie, które w bazie E.13 ma numer: $row[id]</h3>
            <div class="question question-margin">
                <div class="title">$row[pytanie]</div>
                <div class="ans" id="odpa">
                    <strong>A. </strong>$row[a]
                </div>
                <div class="ans" id="odpb">
                    <strong>B. </strong>$row[b]
                </div>
                <div class="ans" id="odpc">  
                    <strong>C. </strong>$row[c]
                </div>
                <div class="ans" id="odpd">
                    <strong>D. </strong>$row[d]
                </div>
                <script>document.getElementById("odpa").addEventListener("click", function() { loadanswer($row[id],'a') }); document.getElementById("odpb").addEventListener("click", function() { loadanswer($row[id],'b') }); document.getElementById("odpc").addEventListener("click", function() { loadanswer($row[id],'c') }); document.getElementById("odpd").addEventListener("click", function() { loadanswer($row[id],'d') });</script>
END;

                        if(empty($row['src'])!=1) {
                            echo '<div class="image"><img src="'.$row['src'].'"></div></div>';
                        }
                        else {
                            echo '</div>';
                        }
                        
                    }
                    else {
                        echo '<div id="error">Error: Brak wyników zapytania!</div>';
                    }
                }
                else {
                    echo '<div id="error">Error: Błąd zapytania do bazy!</div>';
                }
            }
            else {
                echo '<div id="error">Error: Brak rekordów w bazie!</div>';
            }

            $countResult->free_result();
            $result->free_result();
        }
        else {
            echo '<div id="error">Error: Błąd zapytania do bazy!</div>';
        }

        $conn->close();
    }
?>