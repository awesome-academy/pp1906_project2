<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\React;

class ReactService
{
    /**
     * Store React in database.
     *
     * @param Array $data['user_id', 'type', 'reactable_id', 'reactable_type']
     * @return Boolean | App\Models\React
     */
    public function storeReact($data)
    {
        try {
            $react = React::create($data);
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Find a record by condition in database.
     *
     * @param Array $data['user_id', 'type', 'reactable_id', 'reactable_type']
     * @return null | App\Models\React
     */
    public function findCondition($data)
    {
        $reactData = React::where($data)->first();

        return $reactData;
    }

    /**
     * Update react in database.
     *
     * @param Int $id
     *  @param Array $data['user_id', 'type', 'reactable_id', 'reactable_type']
     * @return Boolean
     */
    public function updateReact($data)
    {
        $reactRecord = $this->findCondition($data);

        if (!$reactRecord) {
            return $this->storeReact($data);
        } else {
            try {
                $reactRecord->delete($data);
            } catch (\Throwable $th) {
                Log::error($th);

                return false;
            }

            return true;
        }
    }
}
