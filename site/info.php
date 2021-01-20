<?php
    @session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Horse Infomation</title>
	<script src="jquery.js"></script>
	<script src="login.js"></script>
	<script>
		<?php include 'basa.php'; ?>
	</script>
</head>
<body>
<?php
if(!empty($_SESSION['username'])){
if ($_SESSION['status'] == 10){
	if (isset($_POST['name'])) {
        $name = $_POST['name']; 
        if ($name == '') {
        	unset($name);
        } 
    } 
    if (isset($_POST['age'])) {
        $age=$_POST['age'];
        if ($age =='') {
        	unset($age);
        } 
    }
    if (isset($_POST['data'])) {
        $data = $_POST['data']; 
        if ($data == '') {
        	unset($data);
        } 
    }
    if (isset($_POST['height'])) {
        $height = $_POST['height']; 
        if ($height == '') {
        	unset($height);
        } 
    }
    if (isset($_POST['species'])) {
        $species = $_POST['species']; 
        if ($species == '') {
        	unset($species);
        } 
    }
    if (isset($_POST['some'])) {
        $some = $_POST['some']; 
        if ($some == '') {
        	unset($some);
        } 
    } 
    if (!empty($name)) {
    foreach($link->query("SELECT id FROM horses WHERE name='$name'") as $myrow);
    if (!empty($myrow['id'])) {
		echo "Sorry, we have that Horse";
	}
    $link->exec("INSERT INTO horses (name,age,data,height,species,some) VALUES('$name','$age','$data','$height','$species','$some')");
	}
}
}
?>
<div id='openModal3' class='modalDialog'>
      <div>
      	<a href='#close' title='Close' class='close'>X</a>
      	<p>
      	<p>
    		<label>Name:<br></label>
    		<input id='name' type='text' size='15' maxlength='15'>
    	</p>
		<p>
    		<label>Age:<br></label>
    		<input id='age' type='text' size='15' maxlength='15'>
    	</p>
		<p>
    		<label>Data:<br></label>
    		<input id='data' type='text' size='15' maxlength='15'>
    	</p>
		<p>
			<label>Height:<br></label>
    		<input id='height' type='text' size='15' maxlength='15'>
    	</p>
		<p>
			<label>Species:<br></label>
    		<input id='species' type='text' size='15' maxlength='15'>
    	</p>
		<p>
			<label>Some:<br></label>
    		<input id='some' type='text' size='15' maxlength='15'>
    	</p>
		<p>
    		<input type='submit' name='submit' value='Registration' onclick='newhorse()'>
		</p>
		<br>
		</div>
	</div>
<div class="horses">
<div class="col">
	<h3 class="widget-title">Horses</h3>
	<div class="price-line">
		<div class="product-image">
		<a href="#" onclick="openbox('box1'); return false"><img src="img/flicka.jpg"></a>
	</div>
	<div class="product-content">
		<div class="product-title"><a href="#" onclick="openbox('box1'); return false">Flika</a></div>
		<div class="price-box"><span>2014</span></div>
	</div>
	</div>
	<div class="price-line">
		<div class="product-image">
			<a href="" onclick="openbox('box2'); return false"><img src="img/Bereska.jpg"></a>
		</div>
		<div class="product-content">
			<div class="product-title"><a href="#" onclick="openbox('box2'); return false">Bereska</a></div>
			<div class="price-box"><span>1998</span></div>
		</div>
	</div>
	<div class="price-line">
		<div class="product-image">
			<a href=""><img src="img/Grafinya.jpg"></a>
		</div>
		<div class="product-content">
			<div class="product-title"><a href="">Grafinya</a></div>
			<div class="price-box"><span>2011</span></div>
		</div>
	</div>
<?php
if ($_SESSION['status'] == 10){
?>
<div class="price-line">
		<div class="product-image">
			<a href="#"><img src="img/vopros.jpg"></a> 
		</div>
		<div class="product-content">
			<div class="product-title"><a href="#">
				<?php
				echo "" .$name;
				?>
				</a></div>
			<div class="price-box"><span>
				<?php
					echo "".$data;
				?>
				</span>
			</div>
		</div>
	</div>
<?php
}
?>
<?php
if ($_SESSION['status'] == 10){
?>
	<div class="price-line">
		<div class="product-image">
			<a href="#openModal3"><img src="img/Plus.jpg"></a> 
		</div>
		<div class="product-content">
			<div class="product-title"><a href="#openModal3">New Horse</a></div>
		</div>
	</div>
</div>
<?php
}
?>
	<div class="block-of-text" id="box1" style="display: none;">
		<div class='onlytext'>
			<p>Flika</p>
			<p>Age:5</p>
			<p>Height:170sm</p>
			<p>Species:Crossbreed</p>
			<p>Some information about horse</p>
		</div>
	<div class="foto">
		<img src="img/Flika.jpg" width="350" height="500">
	</div>
	</div>
	<div class="block-of-text" id="box2" style="display: none;">
		<div class="onlytext">
			<p>Bereska</p>
			<p>Age:21</p>
			<p>Height:160sm</p>
			<p>Species:Crossbreed</p>
			<p>Some information about horse</p>
	</div>
	<div class="foto">
		<img src="img/Bereska2.jpg" width="350" height="500">
	</div>
</div>
</body>
</html>