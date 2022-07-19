<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Primvideo",
 *      required={"view_count"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="primvideo_id",
 *          description="primvideo_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="subject_count",
 *          description="subject_count",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="class",
 *          description="class",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="subject",
 *          description="subject",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="video",
 *          description="video",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="photo",
 *          description="photo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="prim_topic",
 *          description="prim_topic",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="view_count",
 *          description="view_count",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Primvideo extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'primvideos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'primvideo_id',
        'subject_count',
        'class',
        'subject',
        'video',
        'photo',
        'amount',
        'prim_topic',
        'description',
        'view_count'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'primvideo_id' => 'integer',
        'subject_count' => 'integer',
        'class' => 'string',
        'subject' => 'string',
        'video' => 'string',
        'photo' => 'string',
        'amount' => 'float',
        'prim_topic' => 'string',
        'description' => 'string',
        'view_count' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'nullable|integer',
        'primvideo_id' => 'nullable|integer',
        'subject_count' => 'nullable|integer',
        'class' => 'nullable|string|max:255',
        'subject' => 'nullable|string|max:255',
        'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
        // 'video' => 'nullable|file|mimetypes:video/mp4',
        'photo' => 'nullable|string|max:255',
        'amount' => 'nullable|numeric',
        'prim_topic' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:255',
        'view_count' => 'required|integer',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
