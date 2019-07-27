<?php
 
    $conn = @mysqli_connect("localhost", "root", "", "quiz");
    if (!$conn) {
        echo '<div id="error">Error: '.mysqli_connect_errno().'</div>';
    }
    else {
        $conn->set_charset("utf8");
        $idp = htmlspecialchars(trim($_POST['idp']));
        $odp = htmlspecialchars(trim($_POST['odp']));
        

        $sql = "SELECT * FROM e12 WHERE id=$idp";
            if($result = @mysqli_query($conn, $sql)) {
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck > 0) {
                    $row = mysqli_fetch_assoc($result);
                    
                    $ans = $row['ans'];
                    $ans = trim($ans);
                    switch ($ans)
                    {
                        case 'a':
                        $ans = 0;
                        break;

                        case 'b':
                        $ans = 1;
                        break;

                        case 'c':
                        $ans = 2;
                        break;

                        case 'd':
                        $ans = 3;
                        break;         
                    }

                    $odpl = $odp;
                    
                    switch ($odpl)
                    {
                        case 'a':
                        $odpl = 0;
                        break;

                        case 'b':
                        $odpl = 1;
                        break;

                        case 'c':
                        $odpl = 2;
                        break;

                        case 'd':
                        $odpl = 3;
                        break;         
                    }

                    $tab = array();
                    for($i=0;$i<4;$i++) {
                        if($ans==$i) {array_push($tab,'correct'); continue;}
                        else if ($odpl==$i) {array_push($tab,'wrong'); continue;}
                        array_push($tab,'defult');
                    }

                    $correct = strtoupper($row['ans']);

                    if($ans==$odpl) $str= "Tak jest! Twoja odpowiedź $correct na pytanie $row[id] jest poprawna!";
                    else $str= "Niestety, poprawna odpowiedź na pytanie $row[id] to $correct";

echo <<< END
            <div style="text-align:center; margin-top:10px;">
                <span class="btn btn-large btn-green e12" id="prev">Jednak wracam!</span>
                <span class="btn btn-large btn-green e12" id="next">Dawaj następne!</span>
            </div>
            <script>document.getElementById("next").addEventListener("click", function () { loadquestion($row[id],1)}); document.getElementById("prev").addEventListener("click", function () { loadquestion($row[id],0)});</script>
            <h3 class="onequestion">$str</h3>
            <div class="question question-margin">
                <div class="title">$row[pytanie]</div>
                <div class="ans $tab[0]" id="odpa">
                    <strong>A. </strong>$row[a]
                </div>
                <div class="ans $tab[1]" id="odpb">
                    <strong>B. </strong>$row[b]
                </div>
                <div class="ans $tab[2]" id="odpc">  
                    <strong>C. </strong>$row[c]
                </div>
                <div class="ans $tab[3]" id="odpd">
                    <strong>D. </strong>$row[d]
                </div>
END;
                    if(empty($row['src'])!=1) {
                        echo '<div class="image"><img src="'.$row['src'].'"></div></div>';
                    }
                    else {
                        echo '</div>';
                    }

                    $result->close();
                }
                else {
                    echo '<div id="error">Error: Brak wyników zapytania!</div>';
                }
            }
            
        $conn->close();

    }

    exit();
?>