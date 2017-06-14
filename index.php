<?php
$html=file_get_contents("https://habrahabr.ru/");
$headPatern = '/<h2\sclass="post__title"\s*>\s*.*\s*<a\s*href="(.*?)"\s*.*?>(.*)<.*\s/';
$shortContentPatern = '/<div\sclass="content\s.*?>[.*>]?\s*(.*\s*?.*?)\s*.*<.*/';
preg_match_all($headPatern,$html,$matchesHeader);
preg_match_all($shortContentPatern,$html,$matchesContents);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MiniHabr</title>
    <link rel="stylesheet" type="text/css" href="libs/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="libs/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php for($i=0;$i<count($matchesHeader[1]);$i++){?>
                    <div class="panel">
                        <div class="panel-heading">
                            <h3><?=$matchesHeader[2][$i];?></h3>
                        </div>
                        <div class="panel-body">
                            <p><?= $matchesContents[1][$i];?></p>
                        </div>
                        <div class="panel-footer">
                            <a href="<?=$matchesHeader[1][$i];?>" target="_blank"><button class="btn btn-primary">Читать дальше</button></a>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>

</body>
</html>
