<?php

namespace App\Helpers;

class PaginationHelper
{
    public static function paginate($data, $page, $perPage)
    {
        $data = $data->toArray(); // Convert collection to array
        $total = count($data);
        $startIndex = ($page - 1) * $perPage;
        $items = array_slice($data, $startIndex, $perPage);

        return [
            'current_page' => $page,
            'per_page' => $perPage,
            'total' => $total,
            'data' => $items,
        ];
    }
}
