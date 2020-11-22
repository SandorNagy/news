<div class="container">
    <?php 
    require 'header.php';
    require 'connection.php';

    $conn = connect_db();
    
    $sql = "SELECT * FROM news WHERE isActive = 1 ORDER BY num ASC";
    $sql = $conn->query($sql);

    if ($sql) {
        while ($row = $sql->fetch_assoc()) {
            
            echo 
            '<div class="news-box rounded">
                <div class="box-header">
                    <img class="box-img rounded" src=' . $row['image'] . ' width="640" height="360" class="rounded">
                    <p class="box-title">' . $row['title'] . '</p>
                </div>
                <div class="box-content">
                    <p>' . $row['introText'] . '</p>            
                    <p>' . $row['mainText'] . '</p>
                    <p class="date">' . $row['publishedAt'] . '</p>
                </div>
            </div>';
        }
    }
    ?>
</div>
	
</body>

</html>