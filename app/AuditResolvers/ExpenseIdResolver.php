<?php

namespace App\AuditResolvers;

use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Resolver;

class ExpenseIdResolver implements Resolver
{
     /**
     * Resolve the expense ID for the audit.
     *
     * @param  Auditable $auditable
     * @return mixed
     */
    public static function resolve(Auditable $auditable = null)
    {
        // Check if the auditable model is an instance of the Expense model
        if ($auditable instanceof \App\Models\Expense) {
            // Return the expense ID
            return $auditable->id;
        }

        // Return null if the model is not an Expense
        return null;
    }
}
