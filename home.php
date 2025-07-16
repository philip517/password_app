<?php
session_start();
require "config/conn.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// if(isset($_SESSION['msg'])){
//     //echo '<h1>'.$_SESSION['msg'].'</h1>';

   
// }
if(isset($_GET['id'])){
    $_SESSION['website_id']=$_GET['id'];
    unset($_GET);
    header("Location:home.php");
}

if(isset($_SESSION['website_id'])){
    $id=$_SESSION['website_id'];
    //$processeddata = $_GET['id'];
    $sql = "SELECT * FROM website WHERE id=$id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch all results into an associative array
    $processeddata = $stmt->fetch(PDO::FETCH_ASSOC);
}

if(isset($_POST['search'])){
    
    $key = $_POST['search'];
    header("Location:search.php?key=".$key." ");
    
}

if(isset($_SESSION['text'])){
    $texts = $_SESSION['mtext'];
}

$sql = "SELECT * FROM website ORDER BY name ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
// Fetch all results into an associative array

if (isset($_SESSION['data'])){
    $data = $_SESSION['data'];
}else{
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>


<!DOCTYPE html>
<html style="overflow: scroll">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Home</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap" />
    <link rel="stylesheet" href="assets/css/animate.min.css" />
    <link rel="stylesheet" href="assets/css/pikaday.min.css" />
</head>

<body>


    <?php ?>
    <main class="page projets-page">
        <section class="portfolio-block project-no-images" style="padding-top: 35px">
            <div class="container" style="background: var(--bs-btn-disabled-color)">

                <!-- notification modal -->


                <div class="modal fade justify-content-center align-items-center" role="dialog" tabindex="-1"
                    id="modal-9" style="padding-top: 158px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-bg-success" style="width: 498px">
                                <h4 class="modal-title">Congrats</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php  echo $_SESSION['msg'];
                                ?>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- delete modal -->
                <div class="modal fade" role="dialog" tabindex="-1" id="modal-1" aria-hidden="true"
                    style="padding-top: 158px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header d-lg-flex justify-content-lg-center align-items-lg-center" style="
                    height: 52.3px;
                    border-color: var(--bs-btn-border-color);
                    background: #0c1975;
                    color: #d6ddd6;
                    padding-left: 13px;
                  ">
                                <h4 class=" capitalize modal-title d-lg-flex justify-content-lg-end align-items-lg-end"
                                    style="text-transform:capitalize;padding-left: 0px; margin-left: 0px">
                                    <?php
                                    echo $processeddata['name']?>
                                </h4>

                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="
                    height: 105px;
                    padding-bottom: 20px;
                    margin-bottom: -1px;
                  ">
                                <span>URL:<a <?php echo 'href="https://'.$processeddata['url'].'"'?>>
                                        <?php echo $processeddata['url'];?>
                                    </a></span>
                                <p>Password:<?php echo $processeddata['password'];
                                ?></p>

                            </div>
                            <div class="modal-footer" style="padding-top: 0px">
                                <a class="btn btn-primary text-bg-danger" type="button"
                                    href="del.php?id=<?php echo $processeddata['id'] ;?>" style="
                      border-style: none;
                      border-radius: 0px;
                      margin-right: 11px;
                    ">
                                    Delete</a><a class="btn btn-primary text-bg-warning" role="button"
                                    href="edit.php?id=<?php echo $processeddata['id'] ;?>" style="
                      border-style: none;
                      border-radius: 0px;
                      margin-right: 13px;
                    ">&nbsp; Edit&nbsp;&nbsp;</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="heading" style="text-align: right ;margin-top:100px;">
                    <form method="post" class="d-flex justify-content-center align-items-center pulse animated">
                        <h2 class="d-lg-flex justify-content-lg-center align-items-lg-center"
                            style="text-align: center; height: 43px">
                            <input class="form-control" name="search" type="text" style="
                    padding-top: 0px;
                    padding-bottom: 0px;
                    width: 309.6px;
                    height: 39px;
                    margin-right: -2px;
                    padding-left: 21px;
                    border-top-right-radius: 0px;
                    border-bottom-right-radius: 0px;
                  " placeholder="search name" /><input
                                class="btn btn-primary text-capitalize fw-semibold text-bg-secondary" style="
                    border-radius: 5px;
                    padding-left: 0px;
                    height: 39px;
                    padding-top: 0px;
                    margin-top: 0px;
                    padding-right: 0px;
                    margin-right: 0px;
                    margin-left: 0px;
                    padding-bottom: 0px;
                    margin-bottom: 0px;
                    width: 91.4px;
                    background: #2d338e;
                    border-top-left-radius: 0px;
                    border-bottom-left-radius: 0px;
                    border-style: none;
                  " type="submit" value="Search">
                        </h2>
                    </form>
                    <h2 style="padding-top: 0px; margin-top: 39px">
                        <a class="btn btn-primary text-capitalize fw-semibold text-bg-success" role="button"
                            data-bss-disabled-mobile="true" data-bss-hover-animate="pulse"
                            style="border-radius: 5px; border-style: none" href="refresh.php">Refresh</a>
                        <a class="btn btn-primary text-capitalize fw-semibold text-bg-success" role="button"
                            data-bss-disabled-mobile="true" data-bss-hover-animate="pulse"
                            style="border-radius: 5px; border-style: none" href="add.php">Add New</a>
                    </h2>
                </div>
                <h1>
                    <?echo $text;?>
                    <?echo $texts;?>
                </h1>

                <div class="row" style="overflow: visible">
                    <?php foreach($data as $website): 
                                $id = urlencode($website['id']);
                        
                        ?>


                    <div class="col-md-6 col-lg-4" data-bss-hover-animate="pulse"
                        style="padding-top: 11px; padding-bottom: 0px">
                        <div class="project-card-no-image pt-lg-3 mb-lg-4 pb-lg-3 ms-lg-0 me-lg-0 pe-lg-5" style="
                  height: 116.2px;
                  margin-bottom: 39px;
                  padding-bottom: 0px;
                ">
                            <h3 class="text-capitalize pt-lg-0 pb-lg-0 mb-lg-3 mt-lg-2" style="margin-bottom: 29px">
                                <?php echo $website['name'];
                                
                                ?>
                            </h3>

                            <a class="btn btn-outline-primary btn-sm" role="button"
                                href="home.php?id=<?php echo $id;?> "
                                style="margin-bottom: 3px; padding-top: 3px; margin-top: 4px">See More</a>
                        </div>
                    </div>


                    <?php endforeach; ?>

                </div>
            </div>
        </section>
    </main>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/pikaday.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/jquery.js"></script>


    <?php
    //code to open modal if processeddata is set 
   if(isset($processeddata)):?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#modal-1').modal('show');
        alert
    });
    </script>

    <?php else: ?>
    <script type="text/javascript">
    $('#modal-1').modal('hide');
    </script>
    <?php endif;?>

    <?php
    //code to open congrats modal if processeddata is set 
    if(isset($_SESSION['msg'])):?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#modal-9').modal('show');
        alert
    });
    </script>

    <?php else: ?>
    <script type="text/javascript">
    $('#modal-9').modal('hide');
    </script>
    <?php endif;?>

</body>

</html>