cropped image upload extension for Yii2
======================

[![Latest Stable Version](https://poser.pugx.org/specialist/yii2-crop-image-upload/v/stable.svg)](https://packagist.org/packages/specialist/yii2-crop-image-upload) [![Total Downloads](https://poser.pugx.org/specialist/yii2-crop-image-upload/downloads.svg)](https://packagist.org/packages/specialist/yii2-crop-image-upload) [![Latest Unstable Version](https://poser.pugx.org/specialist/yii2-crop-image-upload/v/unstable.svg)](https://packagist.org/packages/specialist/yii2-crop-image-upload) [![License](https://poser.pugx.org/specialist/yii2-crop-image-upload/license.svg)](https://packagist.org/packages/specialist/yii2-crop-image-upload)

This extension automatically uploads image and make crop.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require specialist/yii2-crop-image-upload "@dev"
```

or add

```json
"specialist/yii2-crop-image-upload": "@dev"
```

to the `require` section of your `composer.json` file.

Usage
-----

### Upload image and create crop

Attach the behavior in your model:

```php
use specialist\icrop\CropImageUploadBehavior;

class Document extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['photo', 'file', 'extensions' => 'jpeg, gif, png', 'on' => ['insert', 'update']],
        ];
    }

    /**
     * @inheritdoc
     */
    function behaviors()
    {
        return [
            [
                'class' => CropImageUploadBehavior::className(),
                'attribute' => 'photo',
                'scenarios' => ['insert', 'update'],
                'path' => '@webroot/upload/docs',
                'url' => '@web/upload/docs',
				'ratio' => 1,
				'crop_field' => 'photo_crop',
				'cropped_field' => 'photo_cropped',
            ],
        ];
    }
}
```

Example view file:

```php
<?php use specialist\icrop\CropImageUpload; ?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'photo')->widget(CropImageUpload::className()) ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>
```
