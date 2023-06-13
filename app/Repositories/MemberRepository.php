<?php

namespace App\Repositories;

use App\Models\Member;
use App\Repositories\BaseRepository;

/**
 * Class MemberRepository
 * @package App\Repositories
 * @version May 20, 2023, 5:18 pm UTC
*/

class MemberRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'contact_no',
        'address'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Member::class;
    }

    public function getAllMembers($request)
    {
        $sortOrder = $request->sortOrder;
        $perPage = $request->perPage;
        $sortBy = $request->sortBy;

        return $this->model->getAllMembers($sortOrder, $perPage, $sortBy);
    }
}
