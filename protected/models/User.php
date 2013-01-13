<?php

/**
 * This is the model class for table "User".
 *
 * The followings are the available columns in table 'User':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $title
 * @property integer $accessLevel
 */
class User extends CActiveRecord
{
	const LEVEL_REGISTERED=0, LEVEL_AUTHOR=1, LEVEL_ADMIN=6, LEVEL_SUPERADMIN=99;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'User';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('accessLevel', 'required'),
			array('accessLevel', 'numerical', 'integerOnly'=>true),
			array('username, title', 'length', 'max'=>45),
			array('password', 'length', 'max'=>254),
			array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'), 
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, title, accessLevel', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'title' => 'Title',
			'accessLevel' => 'Access Level',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('accessLevel',$this->accessLevel);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function validatePassword($password)
    {
        return crypt($password,$this->password)===$this->password;
    }
 
    public function hashPassword($password)
    {
        return crypt($password, $this->generateSalt());
    }

	//define the label for each level
 	static function getAccessLevelList( $level = null ){
  		$levelList=array(
   			self::LEVEL_REGISTERED => 'Registered',
   			self::LEVEL_AUTHOR => 'Author',
   			self::LEVEL_ADMIN => 'Administrator'
  		);
  		
  		if( $level === null)
   			return $levelList;
  
  		return $levelList[ $level ];
 	}
}