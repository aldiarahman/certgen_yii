<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sertifikat".
 *
 * @property int $id
 * @property string $nomor_sertifikat
 * @property string $jenis_anggota
 * @property int $id_user
 * @property int $id_kegiatan
 *
 * @property User $user
 * @property Kegiatan $kegiatan
 */
class Sertifikat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sertifikat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomor_sertifikat', 'jenis_anggota', 'id_user', 'id_kegiatan'], 'required'],
            [['jenis_anggota'], 'string'],
            [['id_user', 'id_kegiatan'], 'integer'],
            [['nomor_sertifikat'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_kegiatan'], 'exist', 'skipOnError' => true, 'targetClass' => Kegiatan::className(), 'targetAttribute' => ['id_kegiatan' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomor_sertifikat' => 'Nomor Sertifikat',
            'jenis_anggota' => 'Jenis Anggota',
            'id_user' => 'Id User',
            'id_kegiatan' => 'Id Kegiatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKegiatan()
    {
        return $this->hasOne(Kegiatan::className(), ['id' => 'id_kegiatan']);
    }
}
