<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Article extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

     public static function last()
    {
        return static::all()->last();
    }


      public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->width(300)
            ->height(300);
    }




    //    public function registerMediaConversions(Media $media = null): void
    // {
    //     $this
    //         ->addMediaConversion('thumb')
    //         ->width(500)
    //         ->height(500);

    //     $this
    //         ->addMediaConversion('pixelated')
    //         ->pixelate(5)
    //         ->width(500)
    //         ->height(500);

    //     $this
    //         ->addMediaConversion('non-optimized')
    //         ->width(500)
    //         ->nonOptimized()
    //         ->height(500);
    // }



       public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('big-files');

            // ->acceptsFile(function(File $file){
            //     return $file->mimeType==='image/jpeg';

            // });

            // ->singleFile()

            //  ->useDisk('s3');  //For s3
    }
}
