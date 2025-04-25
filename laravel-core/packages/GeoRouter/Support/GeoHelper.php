<?php

namespace GeoRouter\Support;

class GeoHelper
{
    public function region()
    {
        return app('region');
    }

    public function country()
    {
        return app('country');
    }

    public function slugUrl(...$segments)
    {
        $prefix = '';
        if ($this->region()) {
            $prefix .= '/' . $this->region()->slug;
        }
        if ($this->country()) {
            $prefix .= '/' . $this->country()->slug;
        }

        return url($prefix . '/' . implode('/', $segments));
    }
}
