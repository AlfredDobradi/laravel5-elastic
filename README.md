# laravel5-elastic

[![Join the chat at https://gitter.im/AlfredDobradi/laravel5-elastic](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/AlfredDobradi/laravel5-elastic?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
Simple Elastic wrapper for Laravel 5

This package was built on [Elasticsearch/Elasticsearch](https://packagist.org/packages/elasticsearch/elasticsearch). The only purpose of this package is to create a simpler way to use Elastic in Laravel 5.

# Installation

First you'll have to add the package to your dependencies in your composer.json file.

``` json
{
    "require": {
        "adobradi/laravel5-elastic": "~1.0"
    }
}
```

Or just simply do `composer require adobradi/laravel5-elastic ~1.0` in your project root.

Now you'll have to add the provider to the list in `config/app.php`:

``` php
    return [
        // ...
        'providers' => [
            // ...
            'Adobradi\Elastic\ElasticServiceProvider',
            // ...
        ]
        // ...
    ];
```

After this, the Elastic alias will be created and you'll be able to use the Elastic facade to make calls:

``` php
use Elastic;

class YourClass {
    function yourFunction()
    {
        $data = Elastic::search([
            'index' => 'your_index_name',
            'type' => 'article',
            'size' => 15
        ]);
    }
}
```
