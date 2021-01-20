<?php
    @session_start(); 
?>
<html>
<head>
<title>Horse Club</title>
	<script src="jquery.js"></script>
	<script src="login.js"></script>
	<script>
		<?php include 'basa.php'; ?>
	</script>
</head>
<body>
<?php
    if(isset($_FILES['file'])) {
      // проверяем, можно ли загружать изображение
      $check = can_upload($_FILES['file']);
    
      if($check === true){
        // загружаем изображение на сервер
        make_upload($_FILES['file']);
        echo "<strong>Файл успешно загружен!</strong>";
    }
      }
      else{
        // выводим сообщение об ошибке
        echo "<strong>$check</strong>";  
      }
?>
<?php
  function can_upload($file){
    // если имя пустое, значит файл не выбран
    if($file['name'] == '')
        return 'Вы не выбрали файл.';
    
    /* если размер файла 0, значит его не пропустили настройки 
    сервера из-за того, что он слишком большой */
    if($file['size'] == 0)
        return 'Файл слишком большой.';
    
    // разбиваем имя файла по точке и получаем массив
    $getMime = explode('.', $file['name']);
    // нас интересует последний элемент массива - расширение
    $mime = strtolower(end($getMime));
    // объявим массив допустимых расширений
    $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
    
    // если расширение не входит в список допустимых - return
    if(!in_array($mime, $types))
        return 'Недопустимый тип файла.';
    
    return true;
  }
?>
<?php
  function make_upload($file){  
    $name = mt_rand(0, 10000) . $file['name'];
    copy($file['tmp_name'], 'Photo/' . $name);
  }
if ($_SESSION['status'] == 10){
?>
<form method="post" enctype="multipart/form-data">
      <input type="file" name="file">
      <input type="submit" value="Загрузить файл!">
    </form>
<?php
}
?>
<div class="informF">
<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Photo/';
    $images = scandir($path);
if (false !== $images) {
    $images = preg_grep('/\\.(?:png|gif|jpg)$/', $images);
    foreach ($images as $image)
        echo '<img src="/Photo/', htmlspecialchars($image),'" wight="500" height="200" />';
}
?>
</div>
</body>
</html>