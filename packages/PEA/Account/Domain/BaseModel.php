<?php

namespace PEA\Account\Domain;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class BaseModel extends
    Model
{

    public function getName()
    {
        return $this->name;
    }

    public function getUrl()
    {
        return null;
    }

    public function scopeWhereLike($q, $field, $value)
    {
        if ($this->isPostgresql()) {
            $q->where($field, 'ILIKE', $value);
        }
        else {
            $q->where($field, 'LIKE', $value);
        }

        return $q;
    }

    public function scopeOrWhereLike($q, $field, $value)
    {
        if ($this->isPostgresql()) {
            $q->orWhere($field, 'ILIKE', $value);
        }
        else {
            $q->orWhere($field, 'LIKE', $value);
        }

        return $q;
    }

    public function scopeHasTranslationWhereLike($q, $value)
    {
        if ($this->isPostgresql()) {
            $q->whereHas('translations', function ($q) use ($value) {
                $q->where('content', 'ILIKE', "%{$value}%");
            });
        }
        else {
            $q->whereHas('translations', function ($q) use ($value) {
                $q->where('content', 'LIKE', "%{$value}%");
            });
        }

        return $q;
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    private function getDriver()
    {
        $connection = $this->getConnectionName();
        if (empty($connection)) {
            $connection = config('database.default');
        }

        $driver = config("database.connections.{$connection}.driver");

        return $driver;
    }

    private function isPostgresql()
    {
        $driver = $this->getDriver();
        return $driver == 'pgsql';
    }
}
