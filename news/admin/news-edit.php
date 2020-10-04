<html>
<head>
    <?php include "../includes/config.php"; ?>
    <title>Новости: Админ</title>
</head>
<body style="background-color: ivory">
<?php $result = mysqli_fetch_assoc(getOneNews($connect, $_GET['news_id'])) ?>
<nav class="navbar navbar-dark bg-dark justify-content-between mb-4">
    <a href="index.php"><h1 class="text-light">Страница Администратора</h1></a>
    <h1 class="text-light">Редактирование новости</h1>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="post">
                <div class="form-group">
                    <label for="newsTitle">Заголовок</label>
                    <input type="text" class="form-control" id="newsTitle" name="heading" value="<?php echo $result['heading']?>">
                </div>
                <div class="form-group">
                    <label for="newsArticle">Новость</label>
                    <textarea type="text" class="form-control" id="newsArticle" name="article" rows="10"><?php echo $result['article']?></textarea>
                </div>
                <button class="btn btn-primary" name="update" value="<?php echo $result['news_id']?>">Изменить</button>
                <a href="index.php" class="btn btn-primary float-right">Назад</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>