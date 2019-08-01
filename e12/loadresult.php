<?php

    if((isset($_SESSION['test'])) && ($_SESSION['test']==true)) {
        
        require_once "../connect.php";

        $conn = @new mysqli($host, $db_user, $db_password, $db_name);
        if ($conn->connect_errno) {
            echo '<div id="error">Error: '.$conn->connect_errno.'</div>';
        }
        else {
            $conn->set_charset("utf8");
            
            $x = 1;
            $score = 0;

            for ($i=1; $i<=40; $i++)
            {
                if(!isset($_POST["ansa$x"])) {
                    if(isset($_POST["pyt$x"])) {
                        $question = htmlspecialchars(trim($_POST["pyt$x"]));
                        $odp = -1; //Empty answer
                    }
                    else {
                        $score = -1;
                        break;
                    }
                }
                else {
                    $fullAnswer = htmlspecialchars(trim($_POST["ansa$x"]));
                    $question = substr($fullAnswer, 1); 
                    $odp = substr($fullAnswer, 0 , 1);
                }
                    
                $sql = "SELECT * FROM e12 WHERE id=$question";
                if($result = @$conn->query($sql)) {
                    $resultCheck = $result->num_rows;

                    if($resultCheck > 0) {
                        $row = $result->fetch_assoc();
                        
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
                        for($j=0;$j<4;$j++) {
                            if($ans==$j) {array_push($tab,'correct'); continue;}
                            else if ($odpl==$j) {array_push($tab,'wrong'); continue;}
                            array_push($tab,'defult');
                        }

                        $correct = strtoupper($row['ans']);
                        $myans = strtoupper($odp);

                        if($ans==$odpl) $str= '<div class="rezultat">Tak jest, Twoja odpowiedź: '.$myans.' jest poprawna!</div>';
                        else if ($odp==-1) $str = '<div class="rezultatN">Nie udzielono odpowiedzi! Poprawna odpowiedź to: '.$correct.'</div>';
                        else $str='<div class="rezultat">Pomyłka! Poprawna odpowiedź to '.$correct.' (twoja odpowiedź: '.$myans.')</div>';

                        if($ans==$odpl) $score++;

echo <<< END
            <div class="question">
                <div class="title">$i. $row[pytanie]</div>
                $str
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

                    }
                    else {
                        echo '<div id="error">Error: Brak wyników zapytania!</div>';
                    }

                    $result->free_result();
                }
                else {
                    echo '<div id="error">Error: Błąd zapytania do bazy!</div>';
                }

                $x++;
            }

            $percent = $score*100/40;
            if ($score<0) echo '<h3 class="mid">Nie wybrano testu do rozwiązania!</h3>';
            else {
                echo '<h3 class="res">Uzyskany wynik: '.$percent.'% ('.$score.'/40)';
                if($score<20) echo ' <span class="negative">NEGATYWNY</span></h3>';
                else echo ' <span class="positive">POZYTYWNY</span></h3>';
            }

            $conn->close();
        }
    }
    else {
        header('Location: result.php');
    }
?>