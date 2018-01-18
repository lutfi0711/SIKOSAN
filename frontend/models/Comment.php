<?php

namespace frontend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "tbl_comment".
 *
 * @property int $id
 * @property int $id_kos
 * @property string $comment
 * @property int $create_by
 * @property int $update_by
 * @property string $create_at
 * @property string $update_at
 *
 * @property TblDataKos $kos
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kos', 'comment'], 'required'],
            [['id_kos', 'create_by', 'update_by'], 'integer'],
            [['comment'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['id_kos'], 'unique'],
            [['create_by'], 'unique'],
            [['id_kos'], 'exist', 'skipOnError' => true, 'targetClass' => TblDataKos::className(), 'targetAttribute' => ['id_kos' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
     
    public function behaviors() 
    {
        return [
        [
            'class' => BlameableBehavior::className(),
            'createdByAttribute' => 'create_by',
            'updatedByAttribute' => 'update_by',
        ],
        [
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => 'create_at',
            'updatedAtAttribute' => 'update_at',
            'value' => new Expression('NOW()'),
        ],
    ];
    } 
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kos' => 'Id Kos',
            'comment' => 'Comment',
            'create_by' => 'Create By',
            'update_by' => 'Update By',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKos()
    {
        return $this->hasMany(TblDataKos::className(), ['id' => 'id_kos']);
    }
}
