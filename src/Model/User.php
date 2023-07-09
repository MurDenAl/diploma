<?php

namespace App\Model;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class User extends AbstractController
{
    public function create()
    {
        // Регистрирует нового пользователя (вносит соответствующие данные в базУ)
    }

    public function list()
    {
        // Выводит список зарегистрированных пользователей (не реализуется в проекте)
    }

    public function read($id)
    {
        // Выводит информацию о конкретном пользователе (реализуется в контроллере, возвращает твиг личного кабинета)
    }

    public function update($id)
    {
        // Обновляет данные пользователя (запрос update в базу)
    }

    public function delete($id)
    {
        // Удаляет пользователя из базы (не реализуется в проекте)
    }
}
