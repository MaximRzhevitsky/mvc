<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 30.08.2018
 * Time: 22:30
 */

namespace App\Controllers;

use Exception;
use App\Services\NewsService;

class IndexController extends Controller {
    private $newsService;

    function __construct()
    {
        parent::__construct();
        $this->newsService = new NewsService();
    }

    public function index() {
        try {
            $this->view->topNews = $this->newsService->getTopNews();
            $this->view->lastNews = $this->newsService->getLastNews();
            $this->view->generate('template_view.phtml', 'home/index.phtml');
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return true;
    }
}
?>