<?php

namespace App\Services;

use App\Models\Agent;
use App\Models\User;
use Exception;

class AgentService
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function create(array $data): array
    {
        $this->validateMeta($data);

        /** @var User $user */
        $user = request()->user();

        $agent = $user->agents()->create($data);

        return [
            'agent' => $agent
        ];
    }

    /**
     * @param Agent $agent
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function update(Agent $agent, array $data): array
    {
        $this->validateMeta($data);

        $agent->update($data);

        return [
            'agent' => $agent
        ];
    }

    /**
     * @param array $data
     * @return void
     * @throws Exception
     */
    private function validateMeta(array $data): void
    {
        $meta = $data['meta'] ?? [];

        if ($data['personality'] === Agent::CUSTOM_PERSONA && !isset($meta['personality'])) {
            throw new Exception('missing_persona', 422);
        }

        if ($data['tone'] === Agent::CUSTOM_TONE && !isset($meta['tone'])) {
            throw new Exception('missing_tone', 422);
        }
    }
}