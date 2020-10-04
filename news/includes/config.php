<link rel="stylesheet" href="/includes/css/bootstrap.min.css">
<script src="/includes/js/bootstrap.min.js"></script>
<meta charset="UTF-8">
<?php
$connect = mysqli_connect('localhost','root','root', 'news_database','3306');
if(!$connect){
    die('Ошибка соединения: '.mysqli_connect_error());
}

function getAllNews($connect){
    return mysqli_query($connect,"select * from news");
}

function getOneNews($connect, $news_id) {
    return mysqli_query($connect, "select * from news where news_id = '$news_id'");
}

function setNews($connect, $input){
    mysqli_query($connect,"insert into news (heading, article, time) values ('$input[0]','$input[1]','".date('Y-n-j')."')");
}

function deleteNews($connect, $news_id){
    mysqli_query($connect, "delete from news where news_id = '$news_id'");
}

function updateNews($connect, $input){
    mysqli_query($connect, "update news set heading='$input[0]',article='$input[1]',time='".date('Y-n-j')."' where news_id = '$input[2]'");
}

if (array_key_exists('delete', $_POST))
    deleteNews($connect, $_POST['delete']);

if (array_key_exists('add', $_POST)){
    if($_POST['heading'] && $_POST['article'])
        setNews($connect, array($_POST['heading'],$_POST['article']));
    echo "<meta http-equiv='refresh' content='0'>";
}

if (array_key_exists('update', $_POST)){
    if($_POST['heading'] && $_POST['article'])
        updateNews($connect, array($_POST['heading'],$_POST['article'],$_POST['update']));
    echo "<meta http-equiv='refresh' content='0'>";
}

