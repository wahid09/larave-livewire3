<?php

namespace App\Livewire\DevConsole;

use Livewire\Component;

class DataImport extends Component
{
    public function render()
    {
        $modelList = [];
        $path = app_path() . "/Models";
        $results = scandir($path);

        foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;
            $filename = $result;

            if (is_dir($filename)) {
                $modelList = array_merge($modelList, getModels($filename));
            } else {
                $modelList[] = substr($filename, 0, -4);
            }
        }
        //dd($modelList);
        return view('livewire.dev-console.data-import', [
            'modelLists' => $modelList
        ]);
    }
}