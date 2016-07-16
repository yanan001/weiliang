<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wl_ip".
 *
 * @property integer $id
 * @property string $ip
 */
class Ip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wl_ip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
        ];
    }
}
