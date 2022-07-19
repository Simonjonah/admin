<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Affiliate
 *
 * @SWG\Definition (
 *      definition="Affiliate",
 *      required={"firstname", "lastname", "email", "phone"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="affiliate_id",
 *          description="affiliate_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="marketer_id",
 *          description="marketer_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="firstname",
 *          description="firstname",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="lastname",
 *          description="lastname",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="phone",
 *          description="phone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email_verified_at",
 *          description="email_verified_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="affiliate_code",
 *          description="affiliate_code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="marketer_count",
 *          description="marketer_count",
 *          type="integer",
 *          format="int32"
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
 * @property int $id
 * @property string|null $user_id
 * @property int|null $affiliate_id
 * @property string|null $marketer_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $phone
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $affiliate_code
 * @property int|null $marketer_count
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AffiliateFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate newQuery()
 * @method static \Illuminate\Database\Query\Builder|Affiliate onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereAffiliateCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereAffiliateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereMarketerCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereMarketerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Affiliate withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Affiliate withoutTrashed()
 */
	class Affiliate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Marketer
 *
 * @SWG\Definition (
 *      definition="Marketer",
 *      required={"firstname", "lastname", "email", "phone"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="affiliate_id",
 *          description="affiliate_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="marketer_id",
 *          description="marketer_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="firstname",
 *          description="firstname",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="lastname",
 *          description="lastname",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="phone",
 *          description="phone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email_verified_at",
 *          description="email_verified_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="affiliate_code",
 *          description="affiliate_code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="marketer_count",
 *          description="marketer_count",
 *          type="integer",
 *          format="int32"
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
 * @property int $id
 * @property string|null $user_id
 * @property int|null $affiliate_id
 * @property string|null $marketer_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $phone
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $affiliate_code
 * @property int|null $marketer_count
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MarketerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer newQuery()
 * @method static \Illuminate\Database\Query\Builder|Marketer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer whereAffiliateCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer whereAffiliateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer whereMarketerCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer whereMarketerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketer whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Marketer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Marketer withoutTrashed()
 */
	class Marketer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Primvideo
 *
 * @SWG\Definition (
 *      definition="Primvideo",
 *      required={"user_id", "class", "subject", "amount"},
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
 *          property="subject_id",
 *          description="subject_id",
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
 * @property int $id
 * @property int $user_id
 * @property int|null $subject_id
 * @property int|null $subject_count
 * @property string $class
 * @property string $subject
 * @property string|null $video
 * @property string|null $photo
 * @property float $amount
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PrimvideoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Primvideo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Primvideo newQuery()
 * @method static \Illuminate\Database\Query\Builder|Primvideo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Primvideo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Primvideo whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Primvideo whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Primvideo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Primvideo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Primvideo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Primvideo wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Primvideo whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Primvideo whereSubjectCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Primvideo whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Primvideo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Primvideo whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Primvideo whereVideo($value)
 * @method static \Illuminate\Database\Query\Builder|Primvideo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Primvideo withoutTrashed()
 */
	class Primvideo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Qrcode
 *
 * @SWG\Definition (
 *      definition="Qrcode",
 *      required={"user_id", "qrcode_id", "subject", "class", "amount", "callback_url"},
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
 *          property="qrcode_id",
 *          description="qrcode_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="payment_method",
 *          description="payment_method",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="subject",
 *          description="subject",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="class",
 *          description="class",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="website",
 *          description="website",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="subject_url",
 *          description="subject_url",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="qrcode_path",
 *          description="qrcode_path",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="callback_url",
 *          description="callback_url",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
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
 * @property int $id
 * @property int $user_id
 * @property int $qrcode_id
 * @property int|null $transaction_id
 * @property string|null $payment_method
 * @property string $subject
 * @property string $class
 * @property string|null $website
 * @property string|null $subject_url
 * @property string|null $qrcode_path
 * @property float $amount
 * @property string $callback_url
 * @property bool|null $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Transaction[] $transactions
 * @property-read int|null $transactions_count
 * @method static \Database\Factories\QrcodeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode newQuery()
 * @method static \Illuminate\Database\Query\Builder|Qrcode onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode query()
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode whereCallbackUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode whereQrcodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode whereQrcodePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode whereSubjectUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qrcode whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|Qrcode withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Qrcode withoutTrashed()
 */
	class Qrcode extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Roles
 *
 * @SWG\Definition (
 *      definition="Roles",
 *      required={"name"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
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
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\RolesFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Roles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Roles newQuery()
 * @method static \Illuminate\Database\Query\Builder|Roles onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Roles query()
 * @method static \Illuminate\Database\Eloquent\Builder|Roles whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Roles whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Roles whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Roles whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Roles whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Roles withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Roles withoutTrashed()
 */
	class Roles extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Secondvideo
 *
 * @SWG\Definition (
 *      definition="Secondvideo",
 *      required={"user_id", "class", "subject", "amount"},
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
 *          property="subject_id",
 *          description="subject_id",
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
 * @property int $id
 * @property int $user_id
 * @property int|null $subject_id
 * @property int|null $subject_count
 * @property string $class
 * @property string $subject
 * @property string|null $video
 * @property string|null $photo
 * @property float $amount
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SecondvideoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Secondvideo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Secondvideo newQuery()
 * @method static \Illuminate\Database\Query\Builder|Secondvideo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Secondvideo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Secondvideo whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secondvideo whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secondvideo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secondvideo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secondvideo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secondvideo wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secondvideo whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secondvideo whereSubjectCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secondvideo whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secondvideo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secondvideo whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secondvideo whereVideo($value)
 * @method static \Illuminate\Database\Query\Builder|Secondvideo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Secondvideo withoutTrashed()
 */
	class Secondvideo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Transaction
 *
 * @SWG\Definition (
 *      definition="Transaction",
 *      required={"user_id", "qrcode_id", "amount", "status"},
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
 *          property="qrcode_id",
 *          description="qrcode_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="owner_qrcode_id",
 *          description="owner_qrcode_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="message",
 *          description="message",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="qrcode_url",
 *          description="qrcode_url",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="string"
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
 * @property int $id
 * @property int $user_id
 * @property int $qrcode_id
 * @property int|null $owner_qrcode_id
 * @property string|null $message
 * @property float $amount
 * @property string|null $qrcode_url
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $transaction_id
 * @property-read \App\Models\Qrcode|null $qrcode
 * @method static \Database\Factories\TransactionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Query\Builder|Transaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereOwnerQrcodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereQrcodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereQrcodeUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Transaction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Transaction withoutTrashed()
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property int|null $role_id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

