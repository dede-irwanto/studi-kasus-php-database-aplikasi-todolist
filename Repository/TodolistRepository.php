<?php

namespace Repository {

    use Entity\Todolist;

    interface TodolistRepository
    {
        function save(Todolist $todolist): void;

        function remove(int $number): bool;

        function findAll(): array;
    }

    class TodolistRepositoryImpl implements TodolistRepository
    {
        public array $todolist = [];

        public function __construct(private \PDO $connection)
        {
        }

        function save(Todolist $todolist): void
        {
            $sql = "INSERT INTO todolist(todo) VALUES(?)";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$todolist->getTodo()]);
        }

        function remove(int $number): bool
        {
            $sql = "SELECT id FROM todolist WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$number]);

            if ($statement->fetch()) {
                // ada data
                $sql = "DELETE FROM todolist WHERE id = ?";
                $statement = $this->connection->prepare($sql);
                $statement->execute([$number]);
                return true;
            } else {
                // tidak ada data
                return false;
            }
        }

        function findAll(): array
        {
            $sql = "SELECT id, todo FROM todolist";
            $statement = $this->connection->prepare($sql);
            $statement->execute();

            $result = [];

            foreach ($statement as $row) {
                $todolist = new Todolist();
                $todolist->setId($row["id"]);
                $todolist->setTodo($row["todo"]);

                $result[] = $todolist;
            }

            return $result;
        }

    }
}