<?php

namespace backend\models;

use http\Url;
use Yii;
use yii\helpers\BaseUrl;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * This is the model class for table "goods".
 *
 * @property integer $id
 * @property string $image
 * @property string $sku
 * @property string $name
 * @property integer $number
 * @property string $type
 */
class Goods extends \yii\db\ActiveRecord
{
    public $sku_name, $img;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sku', 'name', 'number', 'type'], 'required'],
            [['number'], 'integer'],
            [['image', 'sku', 'name', 'type'], 'string', 'max' => 255],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'img' => 'Image',
            'sku' => 'Sku',
            'name' => 'Name',
            'number' => 'Number',
            'type' => 'Type',
        ];
    }

    public function beforeSave($insert){

        $time = time();
        $this->img = UploadedFile::getInstance($this,'img');

        if($this->img != null && $this->img->saveAs('images/' . $time . '.' . $this->img->extension)){
            $this->image = $time . '.' . $this->img->extension;
        }

        return true;

    }

    public function afterDelete(){
        if(file_exists(('images/' .$this->image)))
            unlink('images/' .$this->image);
        return true;
    }
}
