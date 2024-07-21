<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Attribute\AsCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

#[AsCommand(name: 'make:repo-interface')]
class MakeRepositoryInterfaceCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:repo-interface';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command generator repository interface.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (parent::handle() === false ) {
            return false;
        }
    }

    protected function getOptions()
    {
        return [
            // []
        ];
    }

    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/repositoryInterface.stub');
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
        
        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
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

        return str_replace(['DummyClass', '{{ interface }}', '{{interface}}'], $class, $stub);
    }
}
