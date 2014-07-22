<?php
App::uses('Orcamento', 'Model');

/**
 * Orcamento Test Case
 *
 */
class OrcamentoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.orcamento',
		'app.categoria',
		'app.despesa',
		'app.tipo_despesa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Orcamento = ClassRegistry::init('Orcamento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Orcamento);

		parent::tearDown();
	}

}
