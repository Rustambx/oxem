<?php

namespace App\Console\Commands;

use App\Modules\Product\Models\Product;
use Illuminate\Console\Command;

class ProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:product {jsonFilePath} {--add} {--update}';

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
                        $this->error('Название товара должен быть не больше 200 символов');
                    } elseif(strlen($arItem['description']) > 1000) {
                        $this->error('Описание товара должен быть не больше 1000 символов');
                    } else {
                        $arAddData = [
                            "external_id" => htmlspecialchars(strip_tags($arItem['external_id'])),
                            "name" => htmlspecialchars(strip_tags($arItem['name'])),
                            "description" => htmlspecialchars(strip_tags($arItem['description'])),
                            "price" => htmlspecialchars(strip_tags($arItem['price'])),
                            "quantity" => htmlspecialchars(strip_tags($arItem['quantity'])),
                        ];
                        $categories = $arItem['categories'];
                        $product = Product::create($arAddData);
                        $product->categories()->attach($categories);
                        $this->info('Товар добавлен');
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
                        $this->error('Название товара должен быть не больше 200 символов');
                    } elseif(strlen($arItem['description']) > 1000) {
                        $this->error('Описание товара быть не больше 1000 символов');
                    } else {
                        $arAddData = [
                            "external_id" => htmlspecialchars(strip_tags($arItem['external_id'])),
                            "name" => htmlspecialchars(strip_tags($arItem['name'])),
                            "description" => htmlspecialchars(strip_tags($arItem['description'])),
                            "price" => htmlspecialchars(strip_tags($arItem['price'])),
                            "quantity" => htmlspecialchars(strip_tags($arItem['quantity'])),
                        ];
                        $product = Product::where('external_id', $arItem['external_id'])->first();
                        $categories = $arItem['categories'];
                        $product->update($arAddData);
                        $product->categories()->sync($categories);
                        $this->info('Товар обновлен');
                    }
                }
            } else {
                $this->error('Указанный файл "' . $filePath . '" не существует!');
            }
        }
    }
}
