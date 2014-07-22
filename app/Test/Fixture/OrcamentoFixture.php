<?php
/**
 * OrcamentoFixture
 *
 */
class OrcamentoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'ano' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'valor' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'data_liberacao' => array('type' => 'date', 'null' => true, 'default' => null),
		'categoria_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'categoria_id' => array('column' => 'categoria_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'ano' => 1,
			'valor' => 1,
			'data_liberacao' => '2014-07-16',
			'categoria_id' => 1
		),
	);

}
