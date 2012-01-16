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
                    
                        'unico' => array(
                                'rule' => array('isUnique'),
                                'message' => 'Esse nome de usuário já existe. Escolha outro.',
                        ),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'A senha não pode ficar em branco',
				'allowEmpty' => false,
				'required' => false,
				'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'checkPassword' => array(
                        'passwordBate' => array(
                                'rule' => array('checaSeCampoIgual', 'password'),
                                'message' => 'O password digitado não confere'
                                
                        ),
                 ),
	);

        /**
         *
         * @param array $data  array com o nome do campo e o valor digitado no  
         * campo a ser comparado com o campo referência
         * @param string $fild Nome do campo referẽncia
         * @TODO: mover esse método para AppModel e tornar-lo universal
         */
       
        public function checaSeCampoIgual($data, $fieldname) {
            if (array_shift($data) === $this->data[$this->alias][$fieldname])
                return true;
           
        }
        
        
	//The Associations below have been created with all possible keys, those that are not 
        //needed can be removed

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
            // Se o campo password não estiver vazio
            if (!empty($this->data['User']['password'])) { 
                //Armazena o password na variável $password
                $password = $this->data['User']['password'];
                //Aplica o hash na váriável $password
                $password = AuthComponent::password($password);
                //Seta o password hasheado para ser salvo no banco
                $this->data['User']['password'] = $password;

                
            } else {
                unset($this->data['User']['password']);
            }
            
            return parent::beforeSave();
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