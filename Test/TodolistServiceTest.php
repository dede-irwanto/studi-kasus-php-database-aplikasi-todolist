<?php
require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Config/Database.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";

use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImple;

function testShowTodolist()
{
    $connection = \Config\Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService = new TodolistServiceImple($todolistRepository);

    $todolistService->addTodolist("Belajar PHP");
    $todolistService->addTodolist("Belajar PHP OOP");
    $todolistService->addTodolist("Belajar PHP Database Mysql");

    $todolistService->showTodolist();
}

function testAddTodolist()
{
    $connection = \Config\Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService = new TodolistServiceImple($todolistRepository);
    $todolistService->addTodolist("Belajar PHP");
    $todolistService->addTodolist("Belajar PHP OOP");
    $todolistService->addTodolist("Belajar PHP Database Mysql");
}

function testRemoveTodolist()
{
    $connection = Config\Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService = new TodolistServiceImple($todolistRepository);

    echo $todolistService->removeTodolist(8) . PHP_EOL;
    echo $todolistService->removeTodolist(7) . PHP_EOL;
    echo $todolistService->removeTodolist(6) . PHP_EOL;
    echo $todolistService->removeTodolist(5) . PHP_EOL;
    echo $todolistService->removeTodolist(4) . PHP_EOL;
    echo $todolistService->removeTodolist(3) . PHP_EOL;
    echo $todolistService->removeTodolist(2) . PHP_EOL;
    echo $todolistService->removeTodolist(1) . PHP_EOL;
}

testShowTodolist();