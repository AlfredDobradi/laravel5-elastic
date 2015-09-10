<?php namespace Adobradi\Elastic;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Elasticsearch\ClientBuilder;

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

			$client = ClientBuilder::create()
				->setHosts($config['hosts'])
				->build();

			return $client;
			
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
