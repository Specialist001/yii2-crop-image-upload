<?php

/**
 * @copyright Copyright (c) 2019 Specialist001
 * @link https://github.com/specialist001/yii2-crop-image-upload
 */

namespace specialist\icrop;

use yii\web\AssetBundle;

class CropImageUploadAsset extends AssetBundle
{
	public $sourcePath = '@vendor/specialist/yii2-crop-image-upload/assets';

	public $depends = [
		'yii\web\YiiAsset',
		'yii\web\JqueryAsset'
	];

	public function init()
	{
		$this->css[] = YII_DEBUG ? 'css/jquery.Jcrop.css' : 'css/jquery.Jcrop.min.css';
		$this->js[] = YII_DEBUG ? 'js/jquery.Jcrop.js' : 'js/jquery.Jcrop.min.js';
		$this->js[] = 'js/cropImageUpload.js';
	}
}
