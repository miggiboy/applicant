<?php
namespace App;
use Storage;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\FileSystem\StoreFileRequest;
class File extends Model
{
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    public function size()
    {
        return Storage::size($this->path);
    }
    
    public function extension()
    {
        return strtolower(
            pathinfo($this->display_name, PATHINFO_EXTENSION)
        );
    }
    
    /**
     * Abstractors
     */
    public static function storeFilesFor($object, StoreFileRequest $request)
    {
        foreach ($request->file('files') as $file) {
            $folder = static::setFolder($object);
            $filename = $file->getClientOriginalName();
            if (Storage::exists($folder . '/' . $filename)) {
                continue;
            }
            $path = $file->storeAs($folder, $filename);
            $object->files()->create([
                'path'          => $path,
                'display_name'  => $filename,
                'category_id'   => $request->category_id,
            ]);
        }
    }
    private static function setFolder($object)
    {
        return str_slug(class_basename($object)) . '/' . str_slug($object->title);
    }
    public function fileable()
    {
        return $this->morphTo();
    }
    public function category()
    {
        return $this->belongsTo(FileCategory::class);
    }
}
