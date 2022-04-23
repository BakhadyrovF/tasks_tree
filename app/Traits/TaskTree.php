<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait TaskTree
{
    public function isRoot()
    {
        return is_null($this->parent_id) ? true : false;
    }

    /**
     * Get all tasks with their children
     * @return \Illuminate\Support\Collection|null
     */
    public static function allWithChildren()
    {
        /** Retrieve all records from database */
        $allTasks = self::all();

        /** Get all root tasks */
        $rootTasks = $allTasks->whereNull('parent_id');

        /** Call recursive function */
        self::childTasks($allTasks, $rootTasks);

        /** return root tasks with their children */
        return $rootTasks;
    }

    /**
     * Get children of task
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        /** Define Has Many relationship */
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    /**
     * Get children of task and their children and their children etc
     * @return \Illuminate\Support\Collection|null
     */
    public function allChildren()
    {
        /** Retrieve all records from database */
        $allTasks = self::all();

        /** Get single root task by id */
        $rootTask = $allTasks->where('id', '=', $this->id);

        /** Call recursive function */
        self::childTasks($allTasks, $rootTask);

        /** Return the main task with all its children */
        return $rootTask;
    }

    /**
     * Recursive function that add children for each task
     * @param \Illuminate\Support\Collection $allTasks
     * @param \Illuminate\Support\Collection $rootTasks
     * @return void
     */
    private static function childTasks(Collection $allTasks, Collection $rootTasks)
    {
        foreach ($rootTasks as $task) {
            /** Add for each task its children */
            $task->children = $allTasks->where('parent_id', '=', $task->id)->values();

            /** if task has a children, call function again  */
            if ($task->children->isNotEmpty()) {
                self::childTasks($allTasks, $task->children);
            }
        }
    }
}
