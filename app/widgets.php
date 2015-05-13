<?php

use App\News;
use App\Article;
use App\GalleryImage;
use App\Slider;
use App\Client;

// Виджет слайдера
Widget::register('slider', function()
{
    $data['sliders'] = Slider::orderBy('order', 'ASC')->get();

    return view('marketing.widgets.slider', $data);
});

// Виджет новостей на главной странице
Widget::register('news', function()
{
    // Получаем новости, которые должны быть на главной
    $data['news'] = News::orderBy('created_at', 'DESC')
                        ->where('is_on_main', '=', TRUE)
                        ->take(20)
                        ->get();

    // Отображаем
    return view('marketing.widgets.news', $data);
});

// Виджет категорий продуктов на главной странице
Widget::register('product_categories', function()
{
    // TODO: сделать выборку категорий, сейчас отображается просто статический шаблон

    return view('marketing.widgets.product_categories');
});

// Виджет клиентов
Widget::register('clients', function()
{
    // Получение клиентов из БД
    $data['clients'] = Client::orderBy('created_at', 'DESC')->get();

    return view('marketing.widgets.clients', $data);
});

// Виджет голосования
Widget::register('polls', function()
{
    return view('marketing.widgets.polls');
});

// Виджет галереи
Widget::register('gallery', function()
{
    // Получаем изображения на главной
    $data['images'] = GalleryImage::where('is_on_main', '=', TRUE)
                                    ->take(15)
                                    ->get();

    return view('marketing.widgets.gallery', $data);
});

// Виджет service-block
Widget::register('service', function()
{
    // Получение данных блоков
    $data['left_block'] = Article::where('type', '=', 'service_left')->first();
    $data['middle_block'] = Article::where('type', '=', 'service_middle')->first();
    $data['right_block'] = Article::where('type', '=', 'service_right')->first();

    return view('marketing.widgets.service', $data);
});

// Виджет последних новостей в футере
Widget::register('latest_news_footer', function()
{
    // Последние 4 новости
    $data['news'] = News::orderBy('created_at', 'DESC')->take(4)->get();

    return view('marketing.widgets.latest_news_footer', $data);
});