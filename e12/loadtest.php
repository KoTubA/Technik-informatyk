<?php

    session_start();

    $conn = @mysqli_connect("localhost", "root", "", "quiz");
    if (!$conn) {
        echo '<div id="error">Error: '.mysqli_connect_errno().'</div>';
    }
    else {
        $conn->set_charset("utf8");
        
        $sql = "SELECT * FROM e12 ORDER BY RAND() LIMIT 40";
        if($result = @mysqli_query($conn, $sql)) {
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0) {
                $i = 1;
                while($row = mysqli_fetch_assoc($result)) {

echo <<< END
            <div class="question">
                <div class="title">$i. $row[pytanie]</div>
                <div class="ans" id="odpa">
                    <label>
                        <input type="checkbox" class="ansa$i" name="ansa$i" value="a$row[id]">
                        <strong>A. </strong>$row[a]
                    </label>
                </div>
                <div class="ans" id="odpb">
                    <label>
                        <input type="checkbox" class="ansa$i" name="ansa$i" value="b$row[id]">
                        <strong>B. </strong>$row[b]
                    </label>
                </div>
                <div class="ans" id="odpc">
                    <label>
                        <input type="checkbox" class="ansa$i" name="ansa$i" value="c$row[id]">
                        <strong>C. </strong>$row[c]
                    </label>
                </div>
                <div class="ans" id="odpd">
                    <label>
                        <input type="checkbox" class="ansa$i" name="ansa$i" value="d$row[id]">
                        <strong>D. </strong>$row[d]
                    </label>
                </div>
                <input type="hidden" name="pyt$i" value="$row[id]">
END;

                if(empty($row['src'])!=1) {
                    echo '<div class="image"><img src="'.$row['src'].'"></div></div>';
                }
                else {
                    echo '</div>';
                }
                $i++;
                }
                echo '<button class="btn btn-large btn-green e12 finish-test" id="prev">Sprawdź odpowiedzi!</button>';
                $_SESSION['test'] = true;
                $result->close();

                }
                else {
                    echo '<div id="error">Error: Brak wyników zapytania!</div>';
                }
            }
            else {
                echo '<div id="error">Error: Błąd zapytania do bazy!</div>';
            }
            
            $conn->close();
        }

    exit();
?>