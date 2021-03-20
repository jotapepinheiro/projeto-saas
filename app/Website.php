<?php

namespace Loja;

use Hyn\Tenancy\Abstracts\SystemModel;
use Hyn\Tenancy\Contracts\Website as WebsiteContract;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Website extends SystemModel implements WebsiteContract
{
    use SoftDeletes;

    /**
     * Get all of the hostnames for the Website.
     *
     * @return HasMany
     */
    public function hostnames(): HasMany
    {
        return $this->hasMany(config('tenancy.models.hostname'));
    }

    /**
     * Get all of the subscriptions for the Website using a custom Subscription model.
     *
     * @return HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, $this->getForeignKey())->orderBy('created_at', 'desc');
    }
}
