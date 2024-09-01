<?php

namespace PEA\MeterSource\Graphql\Services;

use PEA\MeterSource\Graphql\Interfaces\MeterSourceInterface;
use Illuminate\Support\Facades\Http;

class MeterSourceService implements MeterSourceInterface
{
    public function query($date, $hr, $mstart, $mend)
    {
        try {
            $graphqlQuery = 'query Metersource($date: String!, $mstart: String!, $mend: String!, $hr: String!) {
                metersource(date: $date, mstart: $mstart, mend: $mend, hr: $hr) {
                    active_power_a_kw
                    active_power_b_kw
                    current_avg_a
                    house_no
                    timestamp
                    voltage_an_v
                    voltage_bn_v
                    frequency_hz
                    active_power_c_kw
                    active_power_kw
                    apparent_power_a_kva
                    apparent_power_b_kva
                    apparent_power_c_kva
                    apparent_power_kva
                    current_a_a
                    current_b_a
                    current_c_a
                    current_unbalance_a_perc
                    current_unbalance_b_perc
                    current_unbalance_c_perc
                    current_unbalance_worst_perc
                    demand_active_power_kw
                    id
                    power_factor
                    power_factor_a
                    power_factor_b
                    power_factor_c
                    project_id1
                    reactive_power_a_kvar
                    reactive_power_b_kvar
                    reactive_power_c_kvar
                    reactive_power_kvar
                    timestamp1
                    voltage_cn_v
                    voltage_ln_avg_v
                    voltage_unbalance_an_perc
                    voltage_unbalance_bn_perc
                    voltage_unbalance_cn_perc
                    voltage_unbalance_ln_worst_perc
                    feeder_no
                }
            }';
    
            $variables = [
                'date' => $date,
                'hr' => $hr,
                'mstart' => $mstart,
                'mend' => $mend,
            ];

            $response = Http::withHeaders(['Content-Type' => 'application/json'])
            // ->withOptions(["verify"=>false])
            ->post(config('pea.graphql_endpoint'),
                [
                    "query" => $graphqlQuery,
                    "variables" => $variables
                ]
            );

            return $response->json();
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
        }
    }
}
