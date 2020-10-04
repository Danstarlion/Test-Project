<html>
<head>
    <?php include "../includes/config.php"; ?>
    <title>Новости: Админ</title>
</head>
<body style="background-color: ivory">
<nav class="navbar navbar-dark bg-dark justify-content-between mb-4">
    <a href="index.php"><h1 class="text-light">Страница Администратора</h1></a>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="post">
                <div class="form-group">
                    <label for="newsTitle">Заголовок</label>
                    <input type="text" class="form-control" id="newsTitle" name="heading">
                </div>
                <div class="form-group">
                    <label for="newsArticle">Новость</label>
                    <textarea type="text" class="form-control" id="newsArticle" name="article" rows="10"></textarea>
                </div>
                <button class="btn btn-primary" name="add">Добавить</button>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <?php $result = mysqli_fetch_all(getAllNews($connect),MYSQLI_ASSOC);
        foreach (array_reverse($result) as $news) { ?>
            <div class="col-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title"><a href="../news-show.php?news_id=<?php echo $news['news_id'] ?>"><?php echo $news['heading']?></a></h3>
                        <p class="card-text"><?php echo mb_substr($news['article'],0,250,'UTF-8') ?></p>
                        <h6 class="card-text text-right"><em><?php echo $news['time']?></em></h6>
                        <form method="post">
                            <a href="news-edit.php?news_id=<?php echo $news['news_id'] ?>" class="btn btn-primary">Изменить</a>
                            <button class="btn btn-primary float-right" name="delete" value="<?php echo $news['news_id']?>">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>