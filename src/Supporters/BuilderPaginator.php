<?php

namespace Ijodkor\ApiResponse\Supporters;

use Illuminate\Contracts\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BuilderPaginator extends LengthAwarePaginator {

    public function __construct(Paginator $paginator, private readonly Collection|array $data) {
        $options = ['path' => $paginator->path()];

        parent::__construct($data, $paginator->total(), $paginator->perPage(), $paginator->currentPage(), $options);
    }

    public function getItems(): Collection|array {
        return $this->data;
    }
}