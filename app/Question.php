<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Question
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $votes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Question newModelQuery()
 * @method static Builder|Question newQuery()
 * @method static Builder|Question query()
 * @method static Builder|Question whereBody($value)
 * @method static Builder|Question whereCreatedAt($value)
 * @method static Builder|Question whereId($value)
 * @method static Builder|Question whereTitle($value)
 * @method static Builder|Question whereUpdatedAt($value)
 * @method static Builder|Question whereVotes($value)
 * @mixin Eloquent
 * @property int $user_id
 * @property-read Collection|Answer[] $answers
 * @property-read int|null $answers_count
 * @property-read User $user
 * @method static Builder|Question whereUserId($value)
 */
class Question extends Model {

    protected $fillable = [
        'title', 'body', 'user_id', 'votes'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }
}
