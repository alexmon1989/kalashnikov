<?php

use App\News;
use App\Article;
use App\GalleryImage;
use App\Slider;
use App\Client;
use App\Vote;
use App\ProductCategory;

// Виджет слайдера
Widget::register('slider', function()
{
    $data['sliders'] = Slider::where('enabled', '=', TRUE)->orderBy('order', 'ASC')->get();

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
    $data['categories'] = ProductCategory::with('childCategories')
                                        ->orderBy('title', 'ASC')
                                        ->where('enabled', '=', TRUE)
                                        ->whereNull('parent_id')
                                        ->get();

    return view('marketing.widgets.product_categories', $data);
});

// Виджет клиентов
Widget::register('clients', function()
{
    // Получение клиентов из БД
    $data['clients'] = Client::where('enabled', '=', TRUE)
                            ->orderBy('created_at', 'DESC')->get();

    return view('marketing.widgets.clients', $data);
});

// Виджет голосования
Widget::register('polls', function()
{
    // Получаем данные опроса, что стоит на главной
    $data['vote'] = Vote::where('is_on_main', '=', TRUE)->first();
    $data['answers'] = json_decode($data['vote']->answers_json);

    // Проверяем может ли юзер голосовать
    $cookie = Request::cookie('vote_'.$data['vote']->id);
    if ($cookie == $data['vote']->hash)
    {
        // Общее число голосов
        $data['count'] = 0;
        foreach ($data['answers'] as $answer)
        {
            $data['count'] += $answer->count;
        }
        return view('marketing.widgets.votes.results', $data);
    }

    return view('marketing.widgets.votes.quiz', $data);
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