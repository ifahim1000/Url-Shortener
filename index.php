<?php
include "php/config.php";
if (isset($_GET['u'])) {
    $u = mysqli_real_escape_string($conn, $_GET['u']);
    $sql = mysqli_query($conn, "SELECT full_url FROM url WHERE shorten_url = '{$u}'");
    if (mysqli_num_rows($sql) > 0) {
        $full_url = mysqli_fetch_assoc($sql);
        header("Location:" . $full_url['full_url']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Url Shortner</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
</head>

<body>

    <div class="wrapper">
        <form action="#">
            <input type="text" name="full-url" placeholder="Enter a url" required>
            <i class="fa fa-link url-icon util util-link"></i>
            <button>Shorten</button>
        </form>
        <?php
        $sql2 = mysqli_query($conn, "SELECT * FROM url ORDER BY id DESC");
        if (mysqli_num_rows($sql2) > 0) {
        ?>
            <div class="count">
                <span>Total Links: <span>10</span> & Total Clicks:<span>120</span> </span>
                <a href="#"> Clear All</a>
            </div>
            <div class="urls-area">
                <div class="title">
                    <li>Shorten URL</li>
                    <li>Original Link</li>
                    <li>Clicks</li>
                    <li>Action</li>
                </div>
                <?php
                while ($row = mysqli_fetch_assoc($sql2)) {
                ?>
                    <div class="data">
                        <li><a href="#"><?php echo 'localhost:8888/url?u=' . $row['shorten_url'] ?></a></li>
                        <li><?php echo $row['full_url'] ?></li>
                        <li><?php echo $row['clicks'] ?></li>
                        <li><a href="#">Delete</a></li>
                    </div>
            <?php
                }
            }
            ?>
            </div>


    </div>
    <div class="blur-effect"></div>
    <div class="popup-box">
        <div class="info-box">Short link is ready. You can also edit it now but can't edit once you saved it.</div>
        <form action="#">
            <label>Edit your shorten url</label>
            <input type="text" class="shorten-url" spellcheck="false" value="" required>
            <i class="fa fa-copy copy-icon uil uil-copy-alt"></i>
            <button>Save</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>