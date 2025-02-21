<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\KnowledgeBaseController;
use App\Http\Controllers\SubscriptionPlanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// authentication endpoints
Route::post('/auth/login', [UserController::class, 'login']);
Route::post('/auth/register', [UserController::class, 'register']);

// agent management endpoints
Route::middleware('auth:sanctum')->prefix('/agents')->group(function () {
    Route::get('/', [AgentController::class, 'userAgents']);
    Route::get('/{agent_id}',  [AgentController::class, 'agentDetails']);
    Route::post('/',  [AgentController::class, 'createAgent']);
    Route::put('/{agent_id}',  [AgentController::class, 'updateAgent']);
    Route::delete('/{agent_id}',  [AgentController::class, 'deleteAgent']);
});

// knowledge base endpoints
Route::middleware('auth:sanctum')->prefix('/agents')->group(function () {
    Route::post('/{agent_id}/knowledge-base/upload', [KnowledgeBaseController::class, 'upload']);
    Route::get('/{agent_id}/knowledge-base/retrieve', [KnowledgeBaseController::class, 'retrieve']);
});

// interaction endpoints
Route::middleware('auth:sanctum')->prefix('/agents')->group(function () {
    Route::post('/{agent_id}/chat', [InteractionController::class, 'chat']);
    Route::post('/{agent_id}/api-key',  [InteractionController::class, 'getApiKey']);
});

// subscription-plans endpoints
Route::get('/subscription-plans', [SubscriptionPlanController::class, 'index']);
Route::post('/subscription-plan/{plan_id}/purchase', [SubscriptionPlanController::class, 'purchase'])
    ->middleware('auth:sanctum');