<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sertifikat;

/**
 * SertifikatSearch represents the model behind the search form of `app\models\Sertifikat`.
 */
class SertifikatSearch extends Sertifikat
{
    public $nama_peserta;
    public $nama_kegiatan;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_kegiatan'], 'integer'],
            [['nomor_sertifikat', 'jenis_anggota'], 'safe'],
            [['nama_peserta','nama_kegiatan'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Sertifikat::find();

        $query->joinWith(['user', 'kegiatan']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['nama_peserta'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['user.nama' => SORT_ASC],
            'desc' => ['user.nama' => SORT_DESC],
        ];
        // Lets do the same with country now
        $dataProvider->sort->attributes['nama_kegiatan'] = [
            'asc' => ['kegiatan.namakegiatan' => SORT_ASC],
            'desc' => ['kegiatan.namakegiatan' => SORT_DESC],
        ];



        if (!($this->load($params)) && $this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_user' => $this->id_user,
            'id_kegiatan' => $this->id_kegiatan,
        ]);

        $query->andFilterWhere(['like', 'nomor_sertifikat', $this->nomor_sertifikat])
            ->andFilterWhere(['like', 'jenis_anggota', $this->jenis_anggota])
            ->andFilterWhere(['like', 'user.nama', $this->nama_peserta])
            ->andFilterWhere(['like', 'kegiatan.namakegiatan', $this->nama_kegiatan]);

        return $dataProvider;
    }
}
