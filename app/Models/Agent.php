<?php

namespace App\Models;

use Database\Factories\AgentFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 * @property string|null $description
 * @property string|null $personality
 * @property string|null $tone
 * @property string|null $meta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Interaction> $interactions
 * @property-read int|null $interactions_count
 * @property-read Collection<int, KnowledgeBase> $knowledgeBases
 * @property-read int|null $knowledge_bases_count
 * @property-read User|null $user
 * @method static AgentFactory factory($count = null, $state = [])
 * @method static Builder<static>|Agent newModelQuery()
 * @method static Builder<static>|Agent newQuery()
 * @method static Builder<static>|Agent query()
 * @method static Builder<static>|Agent whereCreatedAt($value)
 * @method static Builder<static>|Agent whereDescription($value)
 * @method static Builder<static>|Agent whereId($value)
 * @method static Builder<static>|Agent whereMeta($value)
 * @method static Builder<static>|Agent whereName($value)
 * @method static Builder<static>|Agent wherePersonality($value)
 * @method static Builder<static>|Agent whereTone($value)
 * @method static Builder<static>|Agent whereUpdatedAt($value)
 * @method static Builder<static>|Agent whereUserId($value)
 * @mixin Eloquent
 */
class Agent extends Model
{
    /** @use HasFactory<AgentFactory> */
    use HasFactory;

    protected $casts = [
        'meta' => 'array',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function interactions(): HasMany
    {
        return $this->hasMany(Interaction::class);
    }

    /**
     * @return HasMany
     */
    public function knowledgeBases(): HasMany
    {
        return $this->hasMany(KnowledgeBase::class);
    }
}
