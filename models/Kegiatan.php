<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kegiatan".
 *
 * @property int $id
 * @property string $kodekegiatan
 * @property string $namakegiatan
 * @property string $tanggal_kegiatan
 * @property string $penyelenggara
 * @property string $file_template
 *
 * @property Sertifikat[] $sertifikats
 */
class Kegiatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kegiatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kodekegiatan', 'namakegiatan'], 'required'],
            [['tanggal_kegiatan'], 'safe'],
            [['kodekegiatan', 'namakegiatan', 'penyelenggara', 'file_template'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kodekegiatan' => 'Kode Kegiatan',
            'namakegiatan' => 'Nama Kegiatan',
            'tanggal_kegiatan' => 'Tanggal Kegiatan',
            'penyelenggara' => 'Penyelenggara',
            'file_template' => 'File Template',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSertifikats()
    {
        return $this->hasMany(Sertifikat::className(), ['id_kegiatan' => 'id']);
    }
}
