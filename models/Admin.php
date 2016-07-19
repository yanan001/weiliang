<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wl_admin".
 *
 * @property integer $id
 * @property string $name
 * @property string $pwd
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wl_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 30],
            [['pwd'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'pwd' => 'Pwd',
        ];
    }
}
