<?php
	require_once '../cores/connect.php';

    if (isset($_GET["key"])) {
        $fullname = $_GET["key"];
        $Query = "SELECT * FROM tbl_video WHERE title LIKE '%$fullname%' LIMIT 5";
        $ExecQuery = mysqli_query($db, $Query);
        $output = '';
        $rows = mysqli_num_rows($ExecQuery);
        if ($rows > 0) {
            while ($row = mysqli_fetch_array($ExecQuery)){

                $t = strlen($row['title']) > 10 ? substr($row['title'], 0, 30).'...' : $row['title'];
                $name = $row['artist'].' -- '.$t;
                $result = strlen($name) > 20 ? substr($name, 0, 30).'...' : $name;
                $url = 'plugins/video-player.php?id='.$row['id'].'&amp;artist='.$row['artist'];
                $output .= '<li style="width: 100%">
                <a href="'.$url.'">
                    <strong>
                        '.$result.'
                    </strong>
                </li>';
            }
        }else{
            echo "No Result Found";
        }

        echo $output;
    }else{
        echo "Error 404, Try later";
    }
?>