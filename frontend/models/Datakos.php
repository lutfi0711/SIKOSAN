<?php

namespace frontend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "tbl_data_kos".
 *
 * @property int $id
 * @property string $nama
 * @property int $biaya
 * @property string $alamat
 * @property string $fasilitas
 * @property int $create_by
 * @property int $update_by
 * @property string $create_at
 * @property string $update_at
 *
 * @property TblComment $tblComment
 */
class Datakos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_data_kos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'biaya', 'alamat', 'fasilitas'], 'required'],
            [['biaya', 'create_by', 'update_by'], 'integer'],
            [['fasilitas'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['nama'], 'string', 'max' => 120],
            [['alamat'], 'string', 'max' => 500],
            [['create_by'], 'unique'],
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
            'nama' => 'Nama Kos',
            'biaya' => 'Biaya Perbulan',
            'alamat' => 'Alamat',
            'fasilitas' => 'Fasilitas',
            'create_by' => 'Create By',
            'update_by' => 'Update By',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblComment()
    {
        return $this->hasOne(TblComment::className(), ['id_kos' => 'id']);
    }
}
