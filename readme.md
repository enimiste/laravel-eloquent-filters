## Laravel 5.5 eloquent models filters

### Install

Require this package with composer using the following command:

```bash
composer require "enimiste/laravel-eloquent-filters:5.5.*"
```

### Usage :
Use the trait `Com\NickelIT\Filterables\Filterable` in your eloquent model.  
Create a new class by extending the class `Com\NickelIT\Filterables\QueryFilters` and define your custom filters as methods with one argument. Where function names are the filter argument name and the arguments are the value.  
Example :  
```php
use Illuminate\Database\Eloquent\Builder;

class LessonQueryFilters extends QueryFilters
{
    /**
     * @param string $order
     * @return Builder
     */
    public function popular($order = 'desc'): Builder
    {
        return $this->builder()->orderBy('views', $order);
    }

    /**
     * @param $level
     * @return Builder
     */
    public function difficulty($level): Builder
    {
        return $this->builder()->where('difficulty', $level);
    }

    /**
     * @param string $order
     * @return Builder
     */
    public function length($order = 'asc'): Builder
    {
        return $this->builder()->orderBy('length', $order);
    }
}
```
With this class we can use the http query string : `popular=desc&difficulty=beginner&length` or any combination of these filters. It is up to you to define if you will use AND wheres or OR.  
In the controller you can apply these filters like :  
```php
class LessonController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $bag = new HttpRequestFiltersBag($request);
        //$bag = new ArrayFiltersBag(['popular' => 'asc', 'difficulty' => 'beginner']);
        $filter = new LessonQueryFilters($bag);
        return Lesson::filter($filter)->get();//you can send results to a blade view
    }
}
```

### Thanks to :
https://github.com/laracasts/Dedicated-Query-String-Filtering
### License

The Laravel Eloquent Filters is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
