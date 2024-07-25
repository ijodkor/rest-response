<?php

namespace Ijodkor\ApiResponse\Supporters;

use Illuminate\Contracts\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;

class ListPaginator extends LengthAwarePaginator {

    private string $key;

    public function __construct(Paginator|ResourceCollection $paginator, string $key = "data") {
        $this->key = $key;

        $options = [
            'path' => $paginator->path()
        ];
        parent::__construct($paginator->items(), $paginator->total(), $paginator->perPage(), $paginator->currentPage(), $options);
    }

    public function toArray(): array {
        $data = parent::toArray();

        return [
            $this->key => $data['data'],
            'links' => $data['links'],
            'meta' => [
                'first_page_url' => $data['first_page_url'],
                'current_page' => $data['current_page'],
                'last_page' => $data['last_page'],
                'last_page_url' => $data['first_page_url'],
                'per_page' => $data['per_page'],
                'total' => $data['total']
            ]
        ];
    }
}