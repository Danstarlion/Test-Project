<html>
<head>
    <?php include "includes/config.php"; ?>
    <title>Новости</title>
</head>
<body style="background-color: ivory">
<nav class="navbar navbar-dark bg-dark justify-content-between mb-4">
    <a href="index.php"><h1 class="text-light">Новостной сайт</h1></a>
</nav>
<div class="container-fluid">
    <div class="row">
        <?php $result = mysqli_fetch_all(getAllNews($connect),MYSQLI_ASSOC);
        foreach (array_reverse($result) as $news) { ?>
            <div class="col-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title"><a href="news-show.php?news_id=<?php echo $news['news_id'] ?>"><?php echo $news['heading']?></a></h3>
                        <p class="card-text"><?php echo mb_substr($news['article'],0,250,'UTF-8') ?></p>
                        <h6 class="card-text text-right "><em><?php echo $news['time']?></em></h6>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>