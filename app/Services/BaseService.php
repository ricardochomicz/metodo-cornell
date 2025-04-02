<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BaseService
{
    // protected string $modelClass;
    // protected string $viewPath;

    // public function __construct(string $modelClass)
    // {
    //     $this->modelClass = $modelClass;
    // }

    protected function beginTransaction()
    {
        DB::beginTransaction();
    }

    protected function commitTransaction()
    {
        DB::commit();
    }

    protected function rollBackTransaction()
    {
        DB::rollBack();
    }

    protected function executeTransaction(callable $callback)
    {
        try {
            $this->beginTransaction();
            $result = $callback();
            $this->commitTransaction();
            return $result;
        } catch (\Throwable $e) {
            $this->rollBackTransaction();
            throw $e;
        }
    }



    /**
     * Método protegido para manipular dados antes de salvar.
     * Pode ser sobrescrito nas subclasses para adicionar lógica específica.
     */
    protected function handleBeforeSave(array $data): array
    {
        return $data;
    }

    /**
     * Método protegido para manipular dados depois de salvar.
     * Pode ser sobrescrito nas subclasses para adicionar lógica específica.
     */
    protected function afterSave($model, array $data): void
    {
        // Implementação padrão (vazia), pode ser sobrescrita
    }

    /**
     * Método protegido para manipular dados antes do update.
     * Pode ser sobrescrito nas subclasses para adicionar lógica específica.
     */
    protected function handleUpdate(array $data, $model): array
    {
        // Implementação padrão (vazia), pode ser sobrescrita
        return $data;
    }

    /**
     * Método protegido para manipular dados depois do update.
     * Pode ser sobrescrito nas subclasses para adicionar lógica específica.
     */
    protected function afterUpdate($model, array $data): void
    {
        // Implementação padrão (vazia), pode ser sobrescrita
    }

    // protected function getQuery($filter)
    // {
    //     // Implementação padrão, pode ser sobrescrita nas subclasses
    //     return $this->modelClass::where(function ($query) {
    //         $tenantId = auth()->user()->tenant ? auth()->user()->tenant->id : null;
    //         $query->where('tenant_id', $tenantId)->orWhereNull('tenant_id');
    //     })->filter($filter);
    // }

    protected function beforeDestroy($model): void
    {
        // Implementação padrão (vazia), pode ser sobrescrita
    }
}
