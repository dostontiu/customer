<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $middle_name
 * @property string|null $birth_date
 * @property int|null $gender
 * @property string|null $p_number
 * @property string|null $phone
 * @property int|null $experience
 * @property string|null $start_time
 * @property string|null $address
 * @property int|null $user_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property User $user
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => false,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => ['user_id'] // If usr_id is required
                ]
            ],
        ];
    }

    const STATUS_MALE = 1;
    const STATUS_FEMALE = 2;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required'],
            [['birth_date', 'start_time', 'created_at', 'updated_at'], 'safe'],
            [['gender', 'experience', 'user_id'], 'integer'],
            [['first_name', 'last_name', 'middle_name'], 'string', 'max' => 255],
            [['p_number', 'phone', 'address'], 'string', 'max' => 32],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First name'),
            'last_name' => Yii::t('app', 'Last name'),
            'middle_name' => Yii::t('app', 'Middle name'),
            'birth_date' => Yii::t('app', 'Birth date'),
            'gender' => Yii::t('app', 'Gender'),
            'p_number' => Yii::t('app', 'P number'),
            'phone' => Yii::t('app', 'Phone'),
            'experience' => Yii::t('app', 'Work experience'),
            'start_time' => Yii::t('app', 'Work start time'),
            'address' => Yii::t('app', 'Address'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}