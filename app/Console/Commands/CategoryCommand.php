<?php

namespace App\Console\Commands;

use App\Modules\Category\Models\Category;
use Illuminate\Console\Command;

class CategoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:category {jsonFilePath} {--add} {--update}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->option('add')) {
            $filePath = $this->argument('jsonFilePath');
            if (file_exists($filePath)) {
                $path = file_get_contents($filePath);
                $data = json_decode($path, true);
                foreach ($data as $k => $arItem) {
                    if (strlen($arItem['name']) > 200) {
                        $this->error('Название категорий должен быть не больше 200 символов');
                    } else {
                        $arAddData = [
                            "external_id" => htmlspecialchars(strip_tags($arItem['external_id'])),
                            "name" => htmlspecialchars(strip_tags($arItem['name']))
                        ];
                        Category::create($arAddData);
                        $this->info('Категория добавлена');
                    }
                }
            } else {
                $this->error('Указанный файл "' . $filePath . '" не существует!');
            }
        } elseif ($this->option('update')) {
            $filePath = $this->argument('jsonFilePath');
            if (file_exists($filePath)) {
                $path = file_get_contents($filePath);
                $data = json_decode($path, true);
                foreach ($data as $k => $arItem) {
                    if (strlen($arItem['name']) > 200) {
                        $this->error('Название категорий должен быть не больше 200 символов');
                    } else {
                        $arAddData = [
                            "external_id" => htmlspecialchars(strip_tags($arItem['external_id'])),
                            "name" => htmlspecialchars(strip_tags($arItem['name']))
                        ];
                        $category = Category::where('external_id', $arItem['external_id'])->first();
                        $category->update($arAddData);
                        $this->info('Категория обновлена');
                    }
                }

            } else {
                $this->error('Указанный файл "' . $filePath . '" не существует!');
            }
        }
    }
}
