<?php

namespace App\Services;

use App\Models\News;
use App\Models\Categories;//<-why?

class NewsService
{
  //  private News $newsModel;
   // private Categories $categoriesModel; //<-why?

    function __construct()
    {
        // создаём объект модели новостей для взаимодействия с базой
        $this->newsModel = new News();

        $this->categoriesModel = new Categories();//<-why?
    }

    public function getNewsList()
    {
        return $this->newsModel->getNewsList();
    }

    public function getLastNews($count = 3)
    {
        return $this->newsModel->getLastNews();
    }

    /** Функция для получения новостей, у которых news_day в таблице равно 1 (описано в запросе); запрос сливает две таблицы
     * по одинаковому полю айди категории
     * @return array массив объектов-строк таблицы, у которых ключи это названия полей, а значения это
     */
    public function getTopNews()
    {
        return $this->newsModel->getTopNews();
    }

    public function getNewsByCategory($category)
    {
        return $this->newsModel->getNewsByCategory($category);
    }

    public function getNewsByCode($newsCode)
    {
        return $this->newsModel->getNewsByCode($newsCode);
    }

    public function setNewsViews($newsCode)
    {
        return $this->newsModel->setNewsViews($newsCode);
    }

    public function getNewsComments($newsCode)
    {
        return $this->newsModel->getNewsComments($newsCode);
    }
}