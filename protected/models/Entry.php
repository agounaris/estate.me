<?php

/**
 * This is the model class for table "Entry".
 *
 * The followings are the available columns in table 'Entry':
 * @property integer $id
 * @property string $type
 * @property string $house_number
 * @property string $street
 * @property string $postcode
 * @property integer $bedrooms
 * @property string $date_added
 * @property string $date_updated
 * @property integer $price
 * @property string $image
 *
 * The followings are the available model relations:
 * @property Photo[] $photos
 */
class Entry extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Entry the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Entry';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, house_number, street, postcode, bedrooms, price, image', 'required'),
			array('bedrooms, price', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>45),
			array('house_number', 'length', 'max'=>50),
			array('street, image', 'length', 'max'=>150),
			array('postcode', 'length', 'max'=>10),
			array('date_added', 'default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false, 'on'=>'insert'),
    		array('date_updated', 'default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false, 'on'=>'update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, house_number, street, postcode, bedrooms, date_added, date_updated, price, image', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'photos' => array(self::HAS_MANY, 'Photo', 'entry_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'house_number' => 'House Number',
			'street' => 'Street',
			'postcode' => 'Postcode',
			'bedrooms' => 'Bedrooms',
			'date_added' => 'Date Added',
			'date_updated' => 'Date Updated',
			'price' => 'Price',
			'image' => 'Image',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('house_number',$this->house_number,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('bedrooms',$this->bedrooms);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('date_updated',$this->date_updated,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}