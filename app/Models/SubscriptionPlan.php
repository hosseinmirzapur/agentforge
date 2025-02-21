<?php

namespace App\Models;

use Database\Factories\SubscriptionPlanFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $price
 * @property string $billing_cycle
 * @property int $max_agents
 * @property int $max_knowledge_bases
 * @property int $max_daily_api_call
 * @property string|null $features
 * @property int $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, User> $users
 * @property-read int|null $users_count
 * @method static SubscriptionPlanFactory factory($count = null, $state = [])
 * @method static Builder<static>|SubscriptionPlan newModelQuery()
 * @method static Builder<static>|SubscriptionPlan newQuery()
 * @method static Builder<static>|SubscriptionPlan query()
 * @method static Builder<static>|SubscriptionPlan whereBillingCycle($value)
 * @method static Builder<static>|SubscriptionPlan whereCreatedAt($value)
 * @method static Builder<static>|SubscriptionPlan whereDescription($value)
 * @method static Builder<static>|SubscriptionPlan whereFeatures($value)
 * @method static Builder<static>|SubscriptionPlan whereId($value)
 * @method static Builder<static>|SubscriptionPlan whereIsActive($value)
 * @method static Builder<static>|SubscriptionPlan whereMaxAgents($value)
 * @method static Builder<static>|SubscriptionPlan whereMaxDailyApiCall($value)
 * @method static Builder<static>|SubscriptionPlan whereMaxKnowledgeBases($value)
 * @method static Builder<static>|SubscriptionPlan whereName($value)
 * @method static Builder<static>|SubscriptionPlan wherePrice($value)
 * @method static Builder<static>|SubscriptionPlan whereUpdatedAt($value)
 * @mixin Eloquent
 */
class SubscriptionPlan extends Model
{
    /** @use HasFactory<SubscriptionPlanFactory> */
    use HasFactory;

    protected $casts = [
        'features' => 'array',
    ];

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'subscription_user',
            'plan_id',
            'user_id'
        );
    }
}
