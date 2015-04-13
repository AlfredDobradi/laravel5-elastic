<?php namespace Adobradi\Elastic;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Elasticsearch\Client;

class ElasticServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$config = config('elastic');

        $this->app->bind('elastic',function() use ($config) {
            return new Client($config);
        });
	}

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../../config/elastic.php' => config_path('elastic.php')
        ]);

        AliasLoader::getInstance()->alias('Elastic','Adobradi\Elastic\Facades\Elastic');
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}
