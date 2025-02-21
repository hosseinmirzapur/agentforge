<?php

namespace App\Models;

use Database\Factories\InteractionFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property int $agent_id
 * @property string|null $user_input
 * @property string|null $agent_response
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Agent $agent
 * @method static InteractionFactory factory($count = null, $state = [])
 * @method static Builder<static>|Interaction newModelQuery()
 * @method static Builder<static>|Interaction newQuery()
 * @method static Builder<static>|Interaction query()
 * @method static Builder<static>|Interaction whereAgentId($value)
 * @method static Builder<static>|Interaction whereAgentResponse($value)
 * @method static Builder<static>|Interaction whereCreatedAt($value)
 * @method static Builder<static>|Interaction whereId($value)
 * @method static Builder<static>|Interaction whereUpdatedAt($value)
 * @method static Builder<static>|Interaction whereUserInput($value)
 * @mixin Eloquent
 */
class Interaction extends Model
{
    /** @use HasFactory<InteractionFactory> */
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class);
    }
}
