<?php

namespace App\Model;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Review extends AbstractController
{
    public function create($id)
    {
        // Добавляет новый отзыв для товара $id (вносит соответствующие данные в базУ)
    }

    public function list($id)
    {
        // Выводит список отзывов для товара $id (реализуется в контроллере при вызове детальной страницы товара; здесь может использоваться для сортировки)
    }

    public function read($id)
    {
        // Выводит информацию о конкретном отзыве (не реализуется в проекте)
    }

    public function update($id)
    {
        // Обновляет данные отзыва в базе (не реализуется в проекте)
    }

    public function delete($id)
    {
        // Удаляет отзыв из базы (не реализуется в проекте)
    }
}
