<?php
include "php/config.php";
$new_url = "";
if (isset($_GET)) {
    foreach ($_GET as $key => $val) {
        $u = mysqli_real_escape_string($conn, $key);
        $new_url = str_replace('/', '', $u);
    }
    $sql = mysqli_query($conn, "SELECT full_url FROM url WHERE shorten_url = '{$new_url}'");
    if (mysqli_num_rows($sql) > 0) {
        $count_query = mysqli_query($conn, "UPDATE url SET clicks = clicks + 1 WHERE shorten_url = '{$new_url}'");
        if ($count_query) {
            $full_url = mysqli_fetch_assoc($sql);
            header("Location:" . $full_url['full_url']);
        }
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
    <div class="cover">
        <div class="start">
            <h1>URL Shriker</h1>
        </div>
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
                    <?php
                    $sql3 = mysqli_query($conn, "SELECT COUNT(*) FROM url");
                    $res = mysqli_fetch_assoc($sql3);

                    $sql4 = mysqli_query($conn, "SELECT clicks FROM url");
                    $total = 0;
                    while ($count = mysqli_fetch_assoc($sql4)) {
                        $total = $count['clicks'] + $total;
                    }
                    ?>
                    <span>Total Links: <span><?php echo end($res) ?></span> & Total Clicks: <span><?php echo $total ?></span></span>
                    <a href="php/delete.php?delete=all">Clear All</a>
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
                            <li><a href="<?php echo $row['shorten_url'] ?>" target="_blank"><?php echo 'localhost:8888/url/' . $row['shorten_url'] ?></a></li>
                            <li><?php echo $row['full_url'] ?></li>
                            <li><?php echo $row['clicks'] ?></li>
                            <li><a href="php/delete.php?id=<?php echo $row['shorten_url'] ?>">Delete</a></li>
                        </div>
                <?php
                    }
                }
                ?>
                </div>


        </div>
    </div>
    <div class="blur-effect"></div>
    <div class="popup-box">
        <div class="info-box">Short link is ready.</div>
        <form action="#">
            <label>Customized shorten url</label>
            <input type="text" class="shorten-url" spellcheck="false" value="" readonly>
            <i class="fa fa-copy copy-icon uil uil-copy-alt"></i>
            <button>Save</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>