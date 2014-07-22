<?php
App::uses('AppModel', 'Model');
/**
 * Albun Model
 *
 * @property Imagen $Imagen
 */
class Albun extends AppModel {
	public $displayField = 'titulo';

	public $actsAs = array('Containable');

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array('Imagen');

}
