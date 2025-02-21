<?php

namespace App\Models;

use Database\Factories\KnowledgeBaseFactory;
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
 * @property string $content_type
 * @property string $content
 * @property string|null $meta
 * @property string|null $vector_embedding
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static KnowledgeBaseFactory factory($count = null, $state = [])
 * @method static Builder<static>|KnowledgeBase newModelQuery()
 * @method static Builder<static>|KnowledgeBase newQuery()
 * @method static Builder<static>|KnowledgeBase query()
 * @method static Builder<static>|KnowledgeBase whereAgentId($value)
 * @method static Builder<static>|KnowledgeBase whereContent($value)
 * @method static Builder<static>|KnowledgeBase whereContentType($value)
 * @method static Builder<static>|KnowledgeBase whereCreatedAt($value)
 * @method static Builder<static>|KnowledgeBase whereId($value)
 * @method static Builder<static>|KnowledgeBase whereMeta($value)
 * @method static Builder<static>|KnowledgeBase whereUpdatedAt($value)
 * @method static Builder<static>|KnowledgeBase whereVectorEmbedding($value)
 * @mixin Eloquent
 */
class KnowledgeBase extends Model
{
    /** @use HasFactory<KnowledgeBaseFactory> */
    use HasFactory;

    protected $casts = [
        'meta' => 'array',
    ];

    /**
     * @return BelongsTo
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class);
    }
}
