<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wl_reply".
 *
 * @property integer $reid
 * @property integer $aid
 * @property string $rename
 * @property string $rekeyword
 * @property string $retype
 */
class Reply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wl_reply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid'], 'integer'],
            [['rename', 'rekeyword'], 'string', 'max' => 50],
            [['retype'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'reid' => 'Reid',
            'aid' => 'Aid',
            'rename' => 'Rename',
            'rekeyword' => 'Rekeyword',
            'retype' => 'Retype',
        ];
    }
}
