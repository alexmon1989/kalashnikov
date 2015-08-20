<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PartnersTest extends TestCase {

	/**
	 * Тест проверяет правильное ли название у виджета.
	 *
	 * @return void
	 */
	public function testTitleWidget()
	{
        $this->visit('/')
            ->see('Наши партнёры')
            ->dontSee('Наши клиенты');
	}
}
