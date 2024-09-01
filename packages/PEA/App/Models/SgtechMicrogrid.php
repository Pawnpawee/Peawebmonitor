<?php

namespace PEA\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SgtechMicrogrid extends Model
{
    use HasFactory;

    protected $table = 'sgtech_microgrid';

    protected $fillable = [
        'house_no',
        'timestamp',
        'project_id1',
        'current_a_a',
        'current_b_a',
        'current_c_a',
        'current_avg_a',
        'active_power_a_kw',
        'active_power_b_kw',
        'active_power_c_kw',
        'active_power_kw',
        'reactive_power_a_kvar',
        'reactive_power_b_kvar',
        'reactive_power_c_kvar',
        'reactive_power_kvar',
        'voltage_an_v',
        'voltage_bn_v',
        'voltage_cn_v',
        'voltage_ln_avg_v',
        'apparent_power_a_kva',
        'apparent_power_b_kva',
        'apparent_power_c_kva',
        'apparent_power_kva',
        'power_factor_a',
        'power_factor_b',
        'power_factor_c',
        'voltage_unbalance_an_perc',
        'voltage_unbalance_bn_perc',
        'voltage_unbalance_cn_perc',
        'voltage_unbalance_ln_worst_perc',
        'voltage_unbalance_ll_worst_perc',
        'current_unbalance_a_perc',
        'current_unbalance_b_perc',
        'current_unbalance_c_perc',
        'current_unbalance_worst_perc',
        'frequency_hz',
        'power_factor',
        'active_energy_delivery_subt_received_kwh',
        'active_energy_delivery_add_received_kwh',
        'demand_current_avg_a',
        'demand_active_power_kw',
        'active_enery_out_of_the_load_kwh',
        'active_enery_into_the_load_kwh',
        'feeder_no'
    ];

    protected $casts = [
        'timestamp' => 'datetime',
    ];
}
