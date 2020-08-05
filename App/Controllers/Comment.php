<?php


namespace App\Controllers;

use Core\Controller;
use Core\Response;
use Core\Request;

use App\Models\Comment as CommentModel;

class Comment extends Controller
{
    protected static $allCols = ['name', 'text', 'timestamp'];

    function __construct()
    {

    }

    /**
     * View page with list comments and form for create new comment
     *
     * @param Request $req
     *
     * Response: HTML document
     */
    public function pageMain(Request $req)
    {
        $arComments = [];
        $arComments = CommentModel::getList();

            Response::view('commentMain', ['comments' => $arComments, 'request_method' => $req->method]);
    }

    /**
     * Get HTML comments list
     *
     * @param Request $req
     *
     * Response: HTML with comment block
     */
    public function getViewList(Request $req)
    {

        $arComments = [];
        $arComments = CommentModel::getList();

        Response::view('components/listComments', ['comments' => $arComments, 'request_method' => $req->method],
            $layout = false);
    }

    /**
     * Create new comment
     * @param Request $req
     *
     * Response: JSON
     */
    public function add(Request $req)
    {
        $queryRes = CommentModel::add($req->getParam('name'), $req->getParam('text'));

        if ($queryRes)
            echo Response::json(['status' => true, 'message' => 'Сообщение создано!'], 'Creating success');
        else
            echo Response::json(['status' => false, 'message' => 'Ошибка создания сообщения'], 'Creating error');
    }
}