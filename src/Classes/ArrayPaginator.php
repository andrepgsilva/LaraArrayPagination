<?php

namespace Andrepgsilva\LaraArrayPagination\Classes;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Make pagination using an array
 */
class ArrayPaginator 
{
    /**
     * Paginate items
     *
     * @param Array $items
     * @param Integer $perPage
     * @param Array  $options (path)
     * 
     * @return Illuminate\Pagination\LengthAwarePaginator
     **/
    public function paginate($items, $perPage = 3, $options = [])
    {
        TypeVerification::assert($items, 'array');

        $currentPage = $this->getCurrentPage($items, $perPage);
        $itemsSliced = array_slice($items, ($currentPage - 1) * $perPage, $perPage);
        
        $paginator = new LengthAwarePaginator($itemsSliced, count($items), $perPage, $currentPage);
        
        $options['path'] = array_key_exists('path', $options) ? $options['path'] : env('APP_URL');
        $paginator->setPath($options['path']);
        
        return $paginator;
    }

    protected function getCurrentPage($items, $perPage)
    {
        $lastPage = max((int) ceil(count($items) / $perPage), 1);
        $pageNumberRequested = 1;

        if (request()->has('page')) {
            $pageNumberRequested = request('page');

            if ($pageNumberRequested > $lastPage) {
                return $lastPage;
            }
        }

        return $pageNumberRequested;
    }
}
