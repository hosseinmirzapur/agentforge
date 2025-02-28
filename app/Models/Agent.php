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
    // Personalities
    const FRIENDLY_PERSONA = 'FRIENDLY_PERSONA'; // The agent is warm, approachable, and conversational.
    const PROFESSIONAL_PERSONA = 'PROFESSIONAL_PERSONA'; // The agent maintains a formal tone and focuses on efficiency.
    const HUMOROUS_PERSONA = 'HUMOROUS_PERSONA'; // The agent incorporates humor into its responses.
    const EMPATHETIC_PERSONA = 'EMPATHETIC_PERSONA'; // The agent shows understanding and compassion.
    const DIRECT_PERSONA = 'DIRECT_PERSONA'; // The agent provides straightforward answers without unnecessary elaboration.
    const CURIOUS_PERSONA = 'CURIOUS_PERSONA'; // The agent asks follow-up questions to gather more information.
    const CREATIVE_PERSONA = 'CREATIVE_PERSONA'; // The agent generates imaginative or innovative responses.
    const CUSTOM_PERSONA = 'CUSTOM_PERSONA'; // The agent has custom user-tailored personality.

    // Tones
    const FORMAL_TONE =  'FORMAL_TONE'; // Uses professional language suitable for business settings.
    const CASUAL_TONE =  'CASUAL_TONE'; // Relaxed and conversational, suitable for everyday interactions.
    const POLITE_TONE =  'POLITE_TONE'; // Courteous and respectful, often used in customer service.
    const NEUTRAL_TONE =  'NEUTRAL_TONE'; // Neutral and unbiased, avoiding emotional expressions.
    const ENCOURAGING_TONE =  'ENCOURAGING_TONE'; // Positive and uplifting, motivating users.
    const ASSERTIVE_TONE =  'ASSERTIVE_TONE'; // Direct and confident, suitable for decision-making scenarios.
    const PLAYFUL_TONE =  'PLAYFUL_TONE'; // Lighthearted and fun, ideal for entertainment or educational purposes.
    const CUSTOM_TONE =  'CUSTOM_TONE'; // Any user-tailored custom tone.

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

    /**
     * @return string[]
     */
    public static function possiblePersonalities(): array
    {
        return [
            self::FRIENDLY_PERSONA,
            self::PROFESSIONAL_PERSONA,
            self::HUMOROUS_PERSONA,
            self::EMPATHETIC_PERSONA,
            self::DIRECT_PERSONA,
            self::CUSTOM_PERSONA,
            self::CURIOUS_PERSONA,
            self::CREATIVE_PERSONA,
        ];
    }

    /**
     * @return string[]
     */
    public static function possibleTones(): array
    {
        return [
            static::FORMAL_TONE,
            static::CASUAL_TONE,
            static::POLITE_TONE,
            static::NEUTRAL_TONE,
            static::ENCOURAGING_TONE,
            static::ASSERTIVE_TONE,
            static::PLAYFUL_TONE,
            static::CUSTOM_TONE,
        ];
    }
}
