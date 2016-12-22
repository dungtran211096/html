<?php

namespace App\Console\Commands\Api;

use Illuminate\Console\Command;

class Api extends Command
{

    protected $signature = 'api {name} {action=all}';

    protected $description = 'Command description';

    protected $config;
    // Laravel Folder Config
    const MODEL_FOLDER = 'app/';
    const CONTROLLER_FOLDER = 'app/Http/Controllers/Api/';
    const REQUEST_FOLDER = 'app/Http/Requests/Api/';
    const TRANSFORMER_FOLDER = 'app/Transformer/';
    // Angular Folder Config
    const ANGULAR_CONTROLLER_FOLDER = 'public_html/admin/app/controllers/';
    const ANGULAR_VIEWS_FOLDER = 'public_html/admin/app/views/';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get Argument
        $name = $this->argument('name');
        $action = $this->argument('action');
        print_r("Got Argument\n");
        // Get Config
        $this->config = new \stdClass();
        $this->config->m = str_plural($name);
        $this->config->o = $name;
        $this->config->oc = ucfirst($name);
        $this->config->mc = ucfirst($this->config->m);
        print_r("Got Config\n");
        // Check Action
        switch ($action) {
            case 'all':
                $this->createMigration($this->config->m, 'MigrationPostType.php');
                $this->createModel();
                $this->createController();
                $this->createTransformer();
                $this->createRequest();
                $this->createAngularController();
                $this->createAngularView();
                $this->editFile('app/Http/routes.php', 'routes.php');
                $this->editFile('public_html/admin/app/app.js', 'routes');
                $this->editFile('public_html/admin/index.php', 'menu.html');
                break;
            case 'back':
                break;
            case 'postType':
                $this->createPostType();
                break;
            default:
                $this->$action();
                break;
        }
    }

    private function createModel($file = null, $model = 'Model.php')
    {
        if (!$file) {
            $file = $this->config->oc;
        }
        $this->createFile($model, self::MODEL_FOLDER . $file . '.php', $this->getReplaceArray());
    }

    private function createTransformer($file = null, $model = 'Transformer.php')
    {
        if (!$file) {
            $file = $this->config->oc . 'Transformer';
        }
        $this->createFile($model, self::TRANSFORMER_FOLDER . $file . '.php', $this->getReplaceArray());
    }

    private function createRequest($file = null, $model = 'Request.php')
    {
        if (!$file) {
            $file = $this->config->oc . 'Request';
        }
        $this->createFile($model, self::REQUEST_FOLDER . $file . '.php', $this->getReplaceArray());
    }

    private function createController($file = null, $model = 'Controller.php')
    {
        if (!$file) {
            $file = $this->config->mc . 'Controller';
        }
        $this->createFile($model, self::CONTROLLER_FOLDER . $file . '.php', $this->getReplaceArray());
    }

    private function createAngularController($file = null, $model = 'AngularController.js')
    {
        if (!$file) {
            $file = $this->config->mc . 'Ctr';
        }
        $this->createFile($model, self::ANGULAR_CONTROLLER_FOLDER . $file . '.js', $this->getReplaceArray());
    }

    private function createAngularView()
    {
        $folder = self::ANGULAR_VIEWS_FOLDER . $this->config->m;
        @mkdir($folder);
        $this->createFile('AngularViewCreate.html', $folder . '/create.html');
        $this->createFile('AngularViewIndex.html', $folder . '/index.html');
    }

    private function createPostType()
    {
        $array = [
            $this->config->m => 'MigrationPostType.php',
            $this->config->o . '_categories' => 'MigrationPostTypeCategory.php',
            $this->config->o . '_category_relations' => 'MigrationPostTypeRelation.php'
        ];
        foreach ($array as $key => $value) {
            $this->createMigration($key, $value);
        }

        /*
         * Create Models
         */
        $this->createModel($this->config->oc, 'Post-type/ModelPostType.php');
        $this->createModel($this->config->oc . 'Category', 'Post-type/ModelPostTypeCategory.php');
        $this->createModel($this->config->oc . 'CategoryRelation', 'Post-type/ModelPostTypeRelation.php');
        /*
         * Create Controllers
         */
        $this->createController($this->config->mc . 'Controller', 'Post-type/Controller.php');
        $this->createController($this->config->oc . 'CategoriesController', 'Post-type/ControllerCategory.php');
        /*
         * Create Transformer
         */
        $this->createTransformer($this->config->oc . 'Transformer');
        $this->createTransformer($this->config->oc . 'CategoryTransformer', 'TransformerCategory.php');
        /*
        * Create Request
        */
        $this->createRequest($this->config->oc . 'Request');
        $this->createRequest($this->config->oc . 'CategoryRequest', 'RequestCategory.php');
        /*
         * Edit Routes
         */
        $this->editFile('app/Http/routes.php', 'Post-type/routes.php');
        $this->editFile('public_html/admin/app/app.js', 'Post-type/routes');
        /*
         * Angular Controllers
         */
        $this->createAngularController($this->config->mc . 'Ctr', 'Post-type/AngularController.js');
        $this->createAngularController($this->config->oc . 'CategoriesCtr', 'Post-type/AngularControllerCategory.js');
        /*
         * Add to Menu
         */
        $this->editFile('public_html/admin/index.php', 'Post-type/menu.html');
        /*
         * Create view folder angular
         */
        $categoryFolder = self::ANGULAR_VIEWS_FOLDER . $this->config->o . '-categories';
        $folder = self::ANGULAR_VIEWS_FOLDER . $this->config->m;
        @mkdir($categoryFolder);
        @mkdir($folder);
        $this->createFile('Post-type/articles/create.html', $folder . '/create.html');
        $this->createFile('Post-type/articles/index.html', $folder . '/index.html');
        $this->createFile('Post-type/categories/create.html', $categoryFolder . '/create.html');
        $this->createFile('Post-type/categories/index.html', $categoryFolder . '/index.html');
    }

    private function editFile($path, $example)
    {
        $content = file_get_contents($path);
        $additionContent = file_get_contents(__DIR__ . '/Example/' . $example);
        $replaces = $this->getReplaceArray(['oc', 'mc', 'o', 'm']);
        $additionContent = str_replace(array_keys($replaces), array_values($replaces), $additionContent);
        $content = str_replace('//Add_Here', $additionContent, $content);

        $routes = fopen($path, 'w');
        fwrite($routes, $content);
        fclose($routes);
    }

    private function createMigration($tableName, $migrationType)
    {
        $migrationsFolder = 'database/migrations';
        $this->callSilent('make:migration', ['name' => 'create_' . $tableName . '_table']);
        $migrationFile = last(glob($migrationsFolder . '/*.php'));
        $replace = $this->getReplaceArray(['mc', 'oc', 'm', 'o']);
        $this->createFile('Post-type/' . $migrationType, $migrationFile, $replace);
    }

    /**
     * @param $exampleFile string fileName from Example Folder
     * @param $extension string fileName Extension
     * @param $newFile string full path include file name
     * @param $replaces array replace value by key
     */
    private function createFile($exampleFile, $newFile, $replaces = null)
    {
        if ($replaces === null) {
            $replaces = $this->getReplaceArray();
        }
        $content = file_get_contents(__DIR__ . '/Example/' . $exampleFile);
        $content = str_replace(array_keys($replaces), array_values($replaces), $content);

        $path = base_path($newFile);

        $newsFile = fopen($path, 'w');
        fwrite($newsFile, $content);
        fclose($newsFile);
    }

    private function getReplaceArray($arrayKey = ['mc', 'oc', 'm', 'o'])
    {
        $result = [];
        foreach ($arrayKey as $value) {
            $result["_REPLACE_" . $value] = $this->config->$value;
        }
        return $result;
    }
}
