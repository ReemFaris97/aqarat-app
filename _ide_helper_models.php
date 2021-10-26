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
 * App\Models\Admin
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $image
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\AdminFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Advertisement
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $views_counter
 * @property int $user_id
 * @property int $neighborhood_id
 * @property float $lat
 * @property float $lng
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Neighborhood $neighborhood
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereNeighborhoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereViewsCounter($value)
 * @mixin \Eloquent
 * @property string $address
 * @property int $is_reviewed
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereIsReviewed($value)
 * @property int $admin_reviewed
 * @property int $advertisement_id
 * @property int $advertisement_type_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Chat[] $chats
 * @property-read int|null $chats_count
 * @property-read \App\Models\AdvertisementType $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\View[] $views
 * @property-read int|null $views_count
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereAdminReviewed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereAdvertisementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereAdvertisementTypeId($value)
 */
	class Advertisement extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\AdvertisementType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertisementType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertisementType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertisementType query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertisementType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertisementType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertisementType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertisementType whereUpdatedAt($value)
 */
	class AdvertisementType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Attribute
 *
 * @property int $id
 * @property array $name
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Attribute extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Blog
 *
 * @property int $id
 * @property array $title
 * @property array $description
 * @property string $image
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Blog active()
 */
	class Blog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attribute[] $attributes
 * @property-read int|null $attributes_count
 * @property-read array $translations
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CategoryAttribute
 *
 * @property int $id
 * @property int $attribute_id
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class CategoryAttribute extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Chat
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChatMessage[] $messages
 * @property-read int|null $messages_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChatUser[] $users
 * @property-read int|null $users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $usersModel
 * @property-read int|null $users_model_count
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereUpdatedAt($value)
 */
	class Chat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChatMessage
 *
 * @property int $id
 * @property int $chat_id
 * @property int $user_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Chat $chat
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereUserId($value)
 */
	class ChatMessage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChatUser
 *
 * @property int $id
 * @property int $chat_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereUserId($value)
 */
	class ChatUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\City
 *
 * @property int $id
 * @property array $name
 * @property int $status
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Neighborhood[] $neighborhood
 * @property-read int|null $neighborhood_count
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Neighborhood[] $neighborhoods
 * @property-read int|null $neighborhoods_count
 * @method static \Illuminate\Database\Eloquent\Builder|City active()
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Comment
 *
 * @property int $id
 * @property int $blog_id
 * @property int $user_id
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Blog $blog
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereBlogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 * @mixin \Eloquent
 * @property int $is_visible
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereIsVisible($value)
 */
	class Comment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CommonQuestion
 *
 * @property int $id
 * @property array $question
 * @property array $answer
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion active()
 * @method static \Database\Factories\CommonQuestionFactory factory(...$parameters)
 */
	class CommonQuestion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ContactUs
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $user_id
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereUserId($value)
 */
	class ContactUs extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Favourite
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite query()
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite whereUserId($value)
 */
	class Favourite extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Neighborhood
 *
 * @property int $id
 * @property array $name
 * @property int $city_id
 * @property int $status
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City $city
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood query()
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood active()
 */
	class Neighborhood extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $user_id
 * @property int $category_id
 * @property int $neighborhood_id
 * @property string $contract
 * @property string $advertiser
 * @property float $lat
 * @property float $lng
 * @property string $address
 * @property string $price
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attribute[] $attributes
 * @property-read int|null $attributes_count
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Neighborhood $neighborhood
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Utility[] $utilities
 * @property-read int|null $utilities_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAdvertiser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereNeighborhoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @mixin \Eloquent
 * @property string $type
 * @property int $is_reviewed
 * @property int $is_active
 * @property int $is_special
 * @property int $admin_reviewed
 * @property \Illuminate\Support\Carbon|null $special_until
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Chat[] $chats
 * @property-read int|null $chats_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Favourite[] $favouriests
 * @property-read int|null $favouriests_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Favourite[] $isFavoured
 * @property-read int|null $is_favoured_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\View[] $is_viewed
 * @property-read int|null $is_viewed_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Neighborhood[] $neighborhoods
 * @property-read int|null $neighborhoods_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderRequest[] $requests
 * @property-read int|null $requests_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\View[] $views
 * @property-read int|null $views_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order filter(\Illuminate\Http\Request $request)
 * @method static \Illuminate\Database\Eloquent\Builder|Order sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAdminReviewed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIsReviewed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIsSpecial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSpecialUntil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereType($value)
 */
	class Order extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\OrderAttribute
 *
 * @property int $id
 * @property int $order_id
 * @property int $attribute_id
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Attribute $attribute
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAttribute whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAttribute whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAttribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAttribute whereValue($value)
 */
	class OrderAttribute extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderNeighborhood
 *
 * @property int $id
 * @property int $order_id
 * @property int $neighborhood_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderNeighborhood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderNeighborhood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderNeighborhood query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderNeighborhood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderNeighborhood whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderNeighborhood whereNeighborhoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderNeighborhood whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderNeighborhood whereUpdatedAt($value)
 */
	class OrderNeighborhood extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderRequest
 *
 * @property int $id
 * @property int $order_id
 * @property string $quantity
 * @property string $price
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest whereUpdatedAt($value)
 */
	class OrderRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderUtility
 *
 * @property int $id
 * @property int $order_id
 * @property int $utility_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Utility $utility
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtility newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtility newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtility query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtility whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtility whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtility whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtility whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtility whereUtilityId($value)
 * @mixin \Eloquent
 */
	class OrderUtility extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $ar_value
 * @property string $en_value
 * @property string $page
 * @property string $slug
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereArValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereEnValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read mixed $value
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int $status
 * @property string|null $fcm_token_android
 * @property string|null $fcm_token_ios
 * @property string|null $remember_token
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $image
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFcmTokenAndroid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFcmTokenIos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $is_active
 * @property string|null $reset_code
 * @property string|null $reset_sent_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Advertisement[] $advertisements
 * @property-read int|null $advertisements_count
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereResetCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereResetSentAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Advertisement[] $favouriteAdvertisements
 * @property-read int|null $favourite_advertisements_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $favouriteOrders
 * @property-read int|null $favourite_orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 */
	class User extends \Eloquent implements \Tymon\JWTAuth\Contracts\JWTSubject {}
}

namespace App\Models{
/**
 * App\Models\UserData
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $face_book
 * @property string|null $twitter
 * @property string|null $instagram
 * @property string|null $letter
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserData query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereFaceBook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereLetter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereUserId($value)
 * @mixin \Eloquent
 */
	class UserData extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Utility
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Utility newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Utility newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Utility query()
 * @method static \Illuminate\Database\Eloquent\Builder|Utility whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utility whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utility whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utility whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $image
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|Utility whereImage($value)
 */
	class Utility extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\View
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property string $device_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|View newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|View newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|View query()
 * @method static \Illuminate\Database\Eloquent\Builder|View whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class View extends \Eloquent {}
}

