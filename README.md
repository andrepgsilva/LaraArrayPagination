# LaraArrayPagination
Avoid waste time creating your own paginator and use this package for paginate your array in Laravel.

## Installation
<code>composer require laravel-array-pagination</code>

## How to use

```php
use Andrepgsilva\LaraArrayPagination\Classes\ArrayPaginator;

$fruits = ['orange', 'apple', 'watermelon', 'banana'];

$paginator = new ArrayPaginator();
// That's it!
$paginatedContent = $paginator->paginate($objects);
```
## Custom pagination

```php
// You can pass the number of page results. The default is 3.
// Even the URL path that you want use
$paginator->paginate($objects, $perPage = 3, ['path' => 'example@example.com']);
```
