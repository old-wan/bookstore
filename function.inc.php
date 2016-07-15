<?php
	
function upload($name){
		global $waterimg;

		$up = new FileUpload();

		$up -> set("path", "../uploads/");

		if($up->upload($name)) {
			$pic = $up->getFileName();
			//创建图像对象
			$img = new Image("../uploads/");
			//缩放两张， 一个原图， 一个是用来，列表使用的小图
			$img -> thumb($pic, 300, 300, "");
			$img -> thumb($pic, 100, 100, "th_");
			//添加水印图片
			$img -> watermark($pic, $waterimg, 5, "");

			return $pic;
		} else {
			echo $up->getErrorMsg();
			return false;
		
		}

}



