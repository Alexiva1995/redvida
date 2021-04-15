<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class RangeTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'range:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subiste de rango !';

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

        DB::table('users')->delete();
        $texto = "[" . date("Y-m-d H:i:s") . "]: hola, mi nombre es William";
        Storage::put('example.txt', $texto);

        echo asset('storage/file.txt');
        Storage::disk('public')->put('file.txt', $texto);

    }
}
