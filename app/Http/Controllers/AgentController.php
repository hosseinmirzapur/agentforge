<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAgentRequest;
use App\Models\Agent;
use App\Models\User;
use App\Services\AgentService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function __construct(private readonly AgentService $agentService)
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function userAgents(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();

        $agents = $user->agents;

        return response()->json([
            'agents' => $agents
        ]);
    }

    /**
     * @param Agent $agent
     * @return JsonResponse
     */
    public function agentDetails(Agent $agent): JsonResponse
    {
        return response()->json([
            'agent' => $agent
        ]);
    }

    /**
     * @param CreateAgentRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function createAgent(CreateAgentRequest $request): JsonResponse
    {
        $data = $request->validated();

        return response()->json(
            $this->agentService->create($data),
        );
    }

    /**
     * @param Agent $agent
     * @param CreateAgentRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function updateAgent(Agent $agent, CreateAgentRequest $request): JsonResponse
    {
        $data = $request->validated();

        return response()->json(
            $this->agentService->update($agent, $data)
        );
    }

    /**
     * @param Agent $agent
     * @return JsonResponse
     */
    public function deleteAgent(Agent $agent): JsonResponse
    {
        $agent->delete();
        return response()->json();
    }
}
