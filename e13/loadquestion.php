<?php
 
    $conn = @mysqli_connect("localhost", "root", "", "quiz");
    if (!$conn) {
        echo '<div id="error">Error: '.mysqli_connect_errno().'</div>';
    }
    else {
        $conn->set_charset("utf8");
        $value = htmlspecialchars(trim($_POST['value']));
        $var = htmlspecialchars(trim($_POST['var']));

        if($count = @mysqli_query($conn, "SELECT COUNT(*) FROM e13 WHERE 1")) {
            $count = mysqli_fetch_assoc($count);
            $count = $count['COUNT(*)'];

            if($var==null) $value += 0;
            else if ($var) $value++;
            else if (!$var) $value--;
            
            if($value<1) $value = $count;
            else if ($value>$count) $value = 1;

            $sql = "SELECT * FROM e13 WHERE id=$value";
            if($result = @mysqli_query($conn, $sql)) {
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck > 0) {
                    $row = mysqli_fetch_assoc($result);

echo <<< END
            <div style="text-align:center; margin-top:10px;">
                <span class="btn btn-large btn-green e13" id="prev">Jednak wracam!</span>
                <span class="btn btn-large btn-green e13" id="next">Dawaj następne!</span>
            </div>
            <script>document.getElementById("next").addEventListener("click", function () { loadquestion($row[id],1)}); document.getElementById("prev").addEventListener("click", function () { loadquestion($row[id],0)});</script>
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

                $result->close();
                unset($count);

                }
                else {
                    echo '<div id="error">Error: Brak wyników zapytania!</div>';
                }
            }
        }
    $conn->close();

    }

    exit();
?>