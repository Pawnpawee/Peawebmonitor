<?php

namespace PEA\MeterSource\Graphql\Interfaces;

interface  MeterSourceInterface
{
    public function query($date, $hr, $m_start, $m_end);
}