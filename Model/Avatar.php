<?php
App::uses('AppModel', 'Model');
/**
 * Avatar Model
 *
 * @property Profile $Profile
 */
class Avatar extends AppModel {

        public $name = 'Avatar';
    
        public $actsAs = array(
            'MeioUpload.MeioUpload' => array('filename' )
                        );
        
        
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Profile' => array(
			'className' => 'Profile',
			'foreignKey' => 'profile_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
