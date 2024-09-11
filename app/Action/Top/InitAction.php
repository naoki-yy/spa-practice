<?php

namespace App\Action\Top;

use App\Models\TodoList;
use Illuminate\Support\Collection;

class InitAction
{
    /**
     * TodoList全件取得
     *
     * @return Collection<TodoList>
     */
    public function __invoke(): Collection
    {
        return TodoList::orderBy('date')->get();
    }
}
