<?php

namespace App\Model;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Product extends AbstractController
{
    public function create()
    {
        // Добавляет новый товар (вносит соответствующие данные в базУ)
    }

    public function list()
    {
        // Выводит список товаров (реализуется в контроллере, возвращает твиг каталога; здесь может использоваться для сортировки/фильтров)
    }

    public function read($id)
    {
        // Выводит информацию о конкретном товаре (реализуется в контроллере, возвращает твиг детальной страницы товара)
    }

    public function update($id)
    {
        // Обновляет данные товара в базе (не реализуется в проекте)
    }

    public function delete($id)
    {
        // Удаляет товар из базы (не реализуется в проекте)
    }
}
