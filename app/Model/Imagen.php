<?php
App::uses('AppModel', 'Model');
/**
 * Imagen Model
 *
 * @property Albun $Albun
 */
class Imagen extends AppModel {

	public $actsAs = array(
        'Upload.Upload' => array(
           'url'=>array(
                'path'=>'{ROOT}webroot{DS}img{DS}Albuns{DS}{model}',
                'thumbnailSizes' => array(
                    'exibir' => '800x600',
                    'icone' => '80x80'
                ),                
           ),            
        )
    );

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array('Albun');
}
