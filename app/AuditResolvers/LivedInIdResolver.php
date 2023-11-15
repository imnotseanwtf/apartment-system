<?php

namespace App\AuditResolvers;

use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Resolver;

class LivedInIdResolver implements Resolver
{
     /**
     * Resolve the lived_in_id for an Expense model audit.
     *
     * @param  Auditable $auditable
     * @return mixed
     */
    public static function resolve(Auditable $auditable)
    {
        // Check if the auditable model is an instance of the Expense model
        if ($auditable instanceof \App\Models\Expense) {
            // If so, return the lived_in_id from the Expense model
            return $auditable->lived_in_id;
        }

        // If the model is not an Expense or doesn't have a lived_in_id, return null
        return null;
    }
}
