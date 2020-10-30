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
$paginatedContent = $paginator->paginate($fruits);
```
## Custom pagination

```php
// You can pass the number of page results. The default is 3.
// Even the URL path that you want use
$paginator->paginate($fruits, $perPage = 3, ['path' => 'http://example.com']);
```
