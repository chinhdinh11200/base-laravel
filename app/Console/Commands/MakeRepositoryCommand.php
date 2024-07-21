<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputOption;

#[AsCommand(name: 'make:repository')]
class MakeRepositoryCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:repository';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command generator repository.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (!$this->option('model')) {
            $this->error('The "model" option is required.');
            return false;
        }

        if (parent::handle() === false ) {
            return false;
        }
        
        if ($this->option('interface')) {
            $this->createRepositoryInterface();
        }
    }

    public function createRepositoryInterface()
    {
        $repository = Str::studly($this->argument('name'));

        $this->call('make:repo-interface', [
            'name' => "{$repository}Interface",
        ]);
    }

    protected function getOptions()
    {
        return [
            ['model', 'm', InputOption::VALUE_REQUIRED, 'Create interface for repository'],
            ['interface', 'i', InputOption::VALUE_NONE, 'Create interface for repository'],
        ];
    }

    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/repository.stub');
    }

    protected function resolveStubPath($stub)
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
                        ? $customPath
                        : __DIR__.$stub;
    }

    public function getDefaultNamespace($rootNamespace)
    {
        return is_dir(app_path('Http/Repositories')) ? $rootNamespace.'\Http\Repositories' : $rootNamespace;
    }

    public function buildClass($name) {
        $stub = $this->files->get($this->getStub());
        
        return $this->replaceNamespace($stub, $name)->replaceInterface($stub, $name)->replaceModel($stub)->replaceClass($stub, $name);
    }

    public function replaceNamespace(&$stub, $name)
    {
        $stub = str_replace(
            [ '{{ namespace }}', '{{namespace}}' ],
            $this->getNamespace($name),
            $stub
        );

        return $this;
    }

    public function replaceInterface(&$stub, $name)
    {
        $parts = explode('\\', $name);
        $interface = end($parts) . "Interface";

        $stub = str_replace(
            [ '{{ interface }}', '{{interface}}' ],
            $interface,
            $stub
        );

        return $this;
    }

    protected function replaceModel(&$stub)
    {
        $model = $this->option('model');
        if (!$model) {
            $this->error("Option model is required");
        }
        $stub = str_replace(['DummyModel', '{{ model }}', '{{model}}'], $model, $stub);

        return $this;
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name).'\\', '', $name);

        return str_replace(['DummyClass', '{{ class }}', '{{class}}'], $class, $stub);
    }
}
