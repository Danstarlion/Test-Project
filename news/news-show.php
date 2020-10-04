<html>
<head>
    <?php include "includes/config.php"; ?>
    <title>Новости</title>
</head>
<body style="background-color: ivory">
<?php $result = mysqli_fetch_assoc(getOneNews($connect, $_GET['news_id'])) ?>
<nav class="navbar navbar-dark bg-dark justify-content-between mb-4">
    <a href="index.php"><h1 class="text-light">Новостной сайт</h1></a>
    <h1 class="text-light"><?php echo mb_substr($result['heading'],0,50,'UTF-8') ?></h1>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $result['heading']?></h3>
                    <p class="card-text"><?php
                        if($result==null){
                            echo 'Не удалось найти новость.';
                        }
                        echo $result['article'] ?></p>
                    <h6 class="card-text text-right "><em><?php echo $result['time']?></em></h6>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>