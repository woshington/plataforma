<?php
App::uses('TipoDespesa', 'Model');

/**
 * TipoDespesa Test Case
 *
 */
class TipoDespesaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipo_despesa',
		'app.despesa',
		'app.orcamento',
		'app.categoria'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TipoDespesa = ClassRegistry::init('TipoDespesa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TipoDespesa);

		parent::tearDown();
	}

}
