<?php
session_start();
require "config/conn.php";
if(isset($_SESSION['website_id'])){
    unset($_SESSION['website_id']);
}
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if(isset( $_SESSION['exists'])){
    $data = $_SESSION['exists'];
    $message = $data['message'];
    $name = $data['name'];
    $url = $data['url'];
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
    $description = $data['description'];

}else{
    $message = "";
    $name = "...";
    $url = "...";
    $password = "...";
    $description = "...";
    
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap">
    <link rel="stylesheet" href="assets/css/pikaday.min.css">
</head>

<body>
    <main class="page contact-page">
        <section class="portfolio-block contact" style="padding-top: 50px;">
            <div class="container">
                <div class="heading">
                    <h2>&nbsp;Account</h2>
                    <h2 style="color:red;"><?php echo $message;?></h2>
                </div>
                <form action="submit.php?id=1" method="post" style="width: 493px;">
                    <div class="mb-3"><label class="form-label text-muted" for="name" style="text-align: right;">Website
                            Name</label><input class="form-control item" type="text" name="name" id="name"
                            style="width: 399px;" placeholder=<?php echo $name;?> required>
                    </div>
                    <div class="mb-3"><label class="form-label text-muted" for="url" style="text-align: right;">Website
                            URL</label><input class="form-control item" name="url" type="text" id="subject"
                            style="width: 399px;" placeholder=<?php echo $url;?> required></div>
                    <div class="mb-3"><label class="form-label text-muted" for="password"
                            style="text-align: right;">Website Password</label><input name="password"
                            class="form-control item" type="password" id="password" style="width: 399px;"
                            placeholder=<?php echo $password;?> required></div>
                    <div class="mb-3"><label class="form-label text-muted" for="Description"
                            style="text-align: right;">Description</label><textarea class="form-control item"
                            id="message" style="width: 399px;" name="description" placeholder=<?php echo $description;?>
                            required></textarea></div>
                    <div class="mb-3"><button class="btn btn-success btn-lg d-block w-100" type="submit" name="submit"
                            style="width: 298px;">Add New Account</button></div>
                </form>
                <?php unset($_SESSION['exists'])?>
            </div>
        </section>
    </main>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/pikaday.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>