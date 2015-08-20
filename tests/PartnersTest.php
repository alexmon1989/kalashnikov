<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PartnersTest extends TestCase {

    use DatabaseTransactions;

    public $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(App\User::class)->create();
    }

	/**
	 * Тест проверяет правильное ли название у виджета.
	 *
	 * @return void
	 */
	public function testMainPageTitleWidget()
	{
        $this->visit('/')
            ->see('Наши партнёры')
            ->dontSee('Наши клиенты');
	}

    /**
     * Тест проверяет правильные названия на индексной странице администрирования партнёров
     */
    public function testAdminIndexPageTitles()
    {
        $this->actingAs($this->user)
            ->visit('/admin/partners')
            ->see('Наши партнёры') // Меню
            ->see('Партнёры') // Название страницы
            ->see('Выбирайте партнёра для редактирования или создайте новый') // Название функции
            ->dontSee('Наши клиенты')
            ->dontSee('Клиенты')
            ->dontSee('Выбирайте клиента для редактирования или создайте новый');
    }

    /**
     * Тест проверяет правильные названия на индексной странице администрирования партнёров
     */
    public function testAdminCreatePageTitles()
    {
        $this->actingAs($this->user)
            ->visit('/admin/partners/create')
            ->see('Наши партнёры') // Меню
            ->see('Создание партнёра') // Название страницы
            ->see('Создание партнёра') // Название функции
            ->dontSee('Наши клиенты')
            ->dontSee('Клиенты')
            ->dontSee('Выбирайте клиента для редактирования или создайте новый');
    }

    /**
     * Тест проверяет корректность создания нового партнёра.
     *
     * ВНИМАНИЕ! После этого теста не забудьте удалить созданные в public/img/partners/ файлы (2 шт.).
     */
    public function testCreate()
    {
        $this->actingAs($this->user)
            ->visit('/admin/partners/create');

        // Вводим неправильные данные (тест валидации)
        // 1. Без названия
        $this->check('enabled')
            ->press('send')
            ->see('Ошибка!')
            ->see('Поле "Название" обязательно для заполнения.');
        // 2. Без картинки
        $this->type('Тестовый партнёр', 'title')
            ->check('enabled')
            ->press('send')
            ->see('Ошибка!')
            ->see('Поле "Изображение" обязательно для заполнения.');

        // Вводим правильные данные
        // 1. Создаём с enabled=true
        $image_path = __DIR__.'/partner1.jpg';
        $this->type('Тестовый партнёр видимый', 'title')
            ->attach($image_path, 'file_name')
            ->check('enabled')
            ->press('send')
            ->see('Успех!')
            ->dontsee('Ошибка!');
        // 2. Создаём с enabled=false
        $image_path = __DIR__.'/partner2.jpg';
        $this->type('Тестовый партнёр невидимый', 'title')
            ->attach($image_path, 'file_name')
            ->uncheck('enabled')
            ->press('send')
            ->see('Успех!')
            ->dontsee('Ошибка!');

        // Проверяем появилось ли у нас alt="Тестовый партнёр видимый" в HTML-коде главной страницы,
        // а также проверяем чтобы партнёр с enabled=false не отображался
        $this->visit('/')
            ->see('alt="Тестовый партнёр видимый"')
            ->dontSee('alt="Тестовый партнёр невидимый"');
    }

    /**
     * Тест удаления партнёра.
     * Для прохождения этого теста в таблице должна быть запись с id=1.
     * Не проходит, т.к. при удалении вылезает окно подтверждения
     */
    /*public function testDelete()
    {
        $this->actingAs($this->user)
            ->visit('/admin/partners/delete/1');
    }*/




}
