<?php
    require_once 'database/Database.php';
    $dataBase = new Database();
    $sqlSelect = "SELECT * FROM `resultas` ORDER BY id DESC ";
    $data = $dataBase->getQuery($sqlSelect);
    $first_time = true;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Youtube Search</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/jquery-ui.css" type="text/css" />
    <script src="js/vendor/jquery-2.1.4.js" type="text/javascript"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js" type="text/javascript"></script>
    <script src="js/api.js"></script>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1>Youtube Search JS</h1>
        </div>
    </div>
    <div id="content" role="main" class="row">
        <div id="geekdoos-page-container"  class="col-lg-6 col-lg-offset-3">
            <div class="geekdoos-content-alignment">
                <div id="geekdoos-page-content" class="" style="overflow:hidden;">
                    <div class="container-4">
                        <form action="" method="post" class="form-inline" name="geekdoos-yt-search" id="geekdoos-yt-search">
                            <div class="form-group">
                                <input type="search" name="geekdoos-search" id="geekdoos-search" placeholder="Search..." class="form-control ui-autocomplete-input" autocomplete="off">
                                <button class="icon" id="geekdoos-searchBtn"></button>
                            </div>
                        </form>
                    </div>
                    <div>
                        <input type="hidden" id="pageToken" value="">
                        <div class="btn-group" role="group" aria-label="..." style="display:none;">
                            <button type="button" id="pageTokenPrev" value="" class="btn btn-primary pull-left"><< Previous</button>
                            <button type="button" id="pageTokenNext" value="" class="btn btn-primary pull-right">Next >> </button>
                        </div>
                    </div>
                    <div id="geekdoos-watch-content" class="geekdoos-watch-main-col geekdoos-card geekdoos-card-has-padding">
                        <h1 class="modal-header">Liste des Résultats</h1>
                        <ul id="geekdoos-watch-related" class="geekdoos-video-list">
                            <?php if ($first_time){ ?>
                            <?php foreach($data as $d) { ?>
                                <li class="geekdoos-video-list-item">
                                    <div class="geekdoos-content-wrapper">
                                        <a href="https://www.youtube.com/watch?v='<?= $d['title'] ?>'" target="_blank" class="geekdoos-content-link" title="'<?= $d['title'] ?>'">
                                            <span class="title"><?= $d['title'] ?></span>
                                        </a>
                                    </div>
                                    <div class="geekdoos-thumb-wrapper">
                                        <a href="" class="geekdoos-thumb-link">
                                            <span class="geekdoos-simple-thumb-wrap">
                                                <img alt="<?= $d['title'] ?>" src="<?= $d['thumbnail'] ?>" width="120" height="90">
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            <?php $first_time = false; }}?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>