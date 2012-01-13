<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Component');
/**
 * User Model
 *
 * @property Group $Group
 */
class User extends AppModel {
    
    public $actsAs = array('Acl' => array('type' => 'requester')
        
    );
    
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        public function beforeSave() {
            if (!empty($this->data['User']['password'])) { 
            
                $password = $this->data['User']['password'];
                $password = AuthComponent::password($password);

                $this->data['User']['password'] = $password;

                return parent::beforeSave();
            }
            
        }
        
        public function parentNode() {
            if (!$this->id && empty($this->data)) {
                    return null;
            }
            
            if (isset($this->data['User']['group_id'])) {
                $groupID = $this->data['User']['group_id'];
            } else {
                $groupID = $this->field('group_id');
            }
            
            if (!$groupID){
                return null;
            } else {
                return array('Group' => array('id' => $groupID));
            }
        }
        
        public function bindNode ($user) {
            return array(
                'model' => 'Group',
                'foreign_key' => $user['User']['group_id']
            );
        }
        
}
