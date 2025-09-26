<?php
namespace Labify\AuthScaffold;
use Illuminate\Support\ServiceProvider;
use Labify\AuthScaffold\Console\InstallCommand;

class AuthScaffoldServiceProvider extends ServiceProvider
{
    public function register(): void {}
    public function boot(): void
    {
        $this->publishes([__DIR__.'/../stubs/app/Http/Controllers/Auth' => app_path('Http/Controllers/Auth'),
                          __DIR__.'/../stubs/app/Http/Controllers/Controller.php' => app_path('Http/Controllers/Controller.php')], 'asb-controllers');
        $this->publishes([__DIR__.'/../stubs/app/Models/User.php' => app_path('Models/User.php'),
                          __DIR__.'/../stubs/app/Models/UserProfile.php' => app_path('Models/UserProfile.php')], 'asb-models');
        $this->publishes([__DIR__.'/../stubs/resources/views' => resource_path('views')], 'asb-views');
        $this->publishes([__DIR__.'/../stubs/resources/sass' => resource_path('sass'),
                          __DIR__.'/../stubs/resources/js' => resource_path('js')], 'asb-assets');
        $this->publishes([__DIR__.'/../stubs/database/migrations' => database_path('migrations')], 'asb-migrations');
        $this->publishes([__DIR__.'/../stubs/routes/web.auth.php' => base_path('routes/web.auth.php')], 'asb-routes');
        if ($this->app->runningInConsole()) { $this->commands([InstallCommand::class]); }
    }
}
