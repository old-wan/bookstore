<?php 
	include "../classes/fileupload.class.php";
	include "../classes/image.class.php";
	include "header.php";
	include "../function.inc.php";

	if(isset($_POST['dosubmit'])) {

		$pic = upload("pic");
		if(!$pic){
			echo "文件上传失败";
		}

		$sql = "insert into books(bookname,publisher,author,price,pic,detail,ptime) values(
		'{$_POST['bookname']}',
		'{$_POST['publisher']}',
		'{$_POST['author']}',
		'{$_POST['price']}',
		'{$pic}',
		'{$_POST['detail']}',
		'".time()."')";

		$result =$pdo->prepare($sql); //PDO 预处理
		$count = $pdo->exec($sql);  //返回影响行数
		if($count >= 1){
			echo "添加数据成功<br>";
		} else {
			echo "添加数据失败<br>";
		}
	}
?>
	<h3>添加图书</h3>
	<form action="add.php" method="post" enctype="multipart/form-data">
        图书名称  <input type="text" name="bookname" value="" /> <br>
        出版社:   <input type="text" name="publisher" value="" /> <br>
        作者:     <input type="text" name="author" value="" /> <br>
        价格：    <input type="text" name="price" value="" /><br>
        		 <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
        图片：    <input type="file" name="pic" value="" /><br>
        描述：    <textarea cols="40" rows="5" name="detail"></textarea><br>
        <input type="submit" name="dosubmit" value="添加"><br>
	</form>

<?php
	include "footer.php";
?>