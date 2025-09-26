<?php
namespace Labify\AuthScaffold\Console;
use Illuminate\Console\Command;
class InstallCommand extends Command
{
    protected $signature = 'asb:install {--migrate}';
    protected $description = 'Install labify/auth-scaffold-bootstrap';
    public function handle(): int
    {
        $this->call('vendor:publish', ['--tag' => 'asb-controllers', '--force' => true]);
        $this->call('vendor:publish', ['--tag' => 'asb-models', '--force' => true]);
        $this->call('vendor:publish', ['--tag' => 'asb-views', '--force' => true]);
        $this->call('vendor:publish', ['--tag' => 'asb-assets', '--force' => true]);
        $this->call('vendor:publish', ['--tag' => 'asb-migrations', '--force' => true]);
        $this->call('vendor:publish', ['--tag' => 'asb-routes', '--force' => true]);
        if ($this->option('migrate')) { $this->call('migrate'); }
        $this->info('✔ Published stubs. Paste routes from routes/web.auth.php into routes/web.php');
        return self::SUCCESS;
    }
}
