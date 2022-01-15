<?php

namespace App\Repositories;

use Illuminate\Support\Arr;
use App\Helpers\ArrayHelper;
use App\Helpers\StringHelper;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\Repository as RepositoryInterface;

class Repository implements RepositoryInterface
{
    protected $model;

    /**
     * Construct model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Set Initial Query for search and sortBy
     *
     * @param array $data
     * @return query
     */
    public function index(array $data)
    {
        try {
            // Set Model
            $items = $this->model;
            // Determine if the request has search
            $items = $items->when(ArrayHelper::isset($data, 'search'), function ($query) use ($data) {
                $query->where(function ($query) use ($data) {
                    $searchFields = explode(',', $data['s_fields']);
                    foreach ($searchFields as $key => $field) {
                        if (!$key) {
                            $query->where($field, 'like', '%'. $data['search'] .'%');
                        } else {
                            $query->orWhere($field, 'like', '%'. $data['search'] .'%');
                        }
                    }
                });
            })
            // filter by role
            ->when(ArrayHelper::isset($data, 'role'), function ($q) use ($data) {
                $q->wherehas('role', function ($q) use ($data) {
                    $q->where('name', $data['role']);
                });
            })
            // filter by category
            ->when(ArrayHelper::isset($data, 'category'), function ($q) use ($data) {
                $q->whereHas('category', function ($q) use ($data) {
                    $q->where('name', $data['category']);
                });
            })
            // Determine if the request has group by
            ->when(ArrayHelper::isset($data, 'group_by'), function ($query) use ($data) {
                $query->groupBy($data['group_by']);
            })

            // filter by user id
            ->when(ArrayHelper::isset($data, 'patient_id'), function ($q) use ($data) {
                $q->where('patient_id', $data['patient_id']);
            })

            // filter by doctor id
            ->when(ArrayHelper::isset($data, 'doctor_id'), function ($q) use ($data) {
                $q->where('doctor_id', $data['doctor_id']);
            })

            // Determine if the request has sort_by
            ->when(ArrayHelper::isset($data, 'sort_by'), function ($query) use ($data) {
                $query->orderBy($data['sort_by'], $data['sort_desc'] ? 'desc' : 'asc');
            }, function ($query) {
                $query->latest();
            });

            

            return $items;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Set Initial Query for sort only
     *
     * @param array $data
     * @return query
     */
    public function indexWithSortOnly(array $data)
    {
        try {
            // Set Model
            $items = $this->model;
            // Determine if the request has sort_by
            $items = $items->when(ArrayHelper::isset($data, 'sort_by'), function ($query) use ($data) {
                $query->orderBy($data['sort_by'], $data['sort_desc'] ? 'desc' : 'asc');
            }, function ($query) {
                $query->latest();
            });

            return $items;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Get All Rows
     *
     * @return collection
     */
    public function all()
    {
        try {
            return $this->model->all();
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Store newly model
     *
     * @param array $data
     * @return newly created resource
     */
    public function store(array $data)
    {
        try {
            return $this->model->create($data);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Find or Store a new row
     *
     * @param array $matching_fields [ for searching and to be included for storing ]
     * @param array $extra_data [ extra data for storing ]
     * @return found or newly created row
     */
    public function firstOrCreate(array $matching_fields, array $extra_data)
    {
        try {
            return $this->model->firstOrCreate($matching_fields, $extra_data);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Find specified resource
     *
     * @param $id
     * @return found resource
     */
    public function show($id)
    {
        try {
            return $this->model->findOrFail($id);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Update specified resource
     *
     * @param array $data
     * @param $id
     * @return updated resource
     */
    public function update(array $data, $id)
    {
        try {
            $item = $this->model->findOrFail($id);
            $item->update($data);
            return $item;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Delete specified resource
     *
     * @param $id
     * @return deleted resource
     */
    public function destroy($id)
    {
        try {
            $item = $this->model->findOrFail($id);
            $item->delete();
            return $item;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Get specified Model
     *
     * @return model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get the Model Table
     *
     * @return table
     */
    public function getTable()
    {
        return $this->model->getTable();
    }
}