<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Answer
 *
 * @property int $id
 * @property int $question_id
 * @property string $body
 * @property int $votes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Answer newModelQuery()
 * @method static Builder|Answer newQuery()
 * @method static Builder|Answer query()
 * @method static Builder|Answer whereBody($value)
 * @method static Builder|Answer whereCreatedAt($value)
 * @method static Builder|Answer whereId($value)
 * @method static Builder|Answer whereQuestionId($value)
 * @method static Builder|Answer whereUpdatedAt($value)
 * @method static Builder|Answer whereVotes($value)
 * @mixin Eloquent
 */
class Answer extends Model {
    //
}
