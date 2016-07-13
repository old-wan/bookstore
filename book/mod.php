<?php 
	include "header.php";  //加载头部文件

	$sql = "SELECT id, bookname,publisher, author, price,pic,detail FROM books WHERE id='{$_GET['id']}'";
	$result=$pdo->query($sql); //执行添加语句



	if (!empty($result)){

		list($id, $bookname, $author, $price, $pic, $detail)=$result -> fetch();
	}	else{

		echo "没有对应的数据！<br>";
	}
	
	if(isset($_POST['dosubmit'])) {
		
	}
?>
	<h3>修改图书</h3>
	<form action="add.php" method="post">
        图书名称  <input type="text" name="bookname" value="<?php echo $bookname ?>" /> <br>
        出版社:   <input type="text" name="publisher" value="<?php  echo $publisher ?>" /><br>
        作者:     <input type="text" name="author" value="<?php  echo $author ?>" /> <br>
        价格：    <input type="text" name="price" value="<?php  echo $price ?>" /><br>
        图片：    <input type="file" name="pic" value="<?php echo $pic ?>" /><br>
        描述：    <textarea cols="40" rows="5" name="detail"><?php echo $detail ?></textarea><br>
        <input type="submit" name="dosubmit" value="修改"><br>
	</form>

<?php
	include "footer.php";
?>