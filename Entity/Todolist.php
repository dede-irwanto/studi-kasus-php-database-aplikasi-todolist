<?php

namespace Entity {
    class Todolist
    {

        private int $id;

        public function __construct(private string $todo = "")
        {
        }

        public function getId(): int
        {
            return $this->id;
        }
        
        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function getTodo(): string
        {
            return $this->todo;
        }


        public function setTodo(string $todo): void
        {
            $this->todo = $todo;
        }

    }
}