<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sgtech_microgrid', function (Blueprint $table) {
            $table->id();
            $table->string('house_no', 45)->comment('ชื่อรหัสตัวแทนอาคารโหลด/ระบบ PV/ESS/EV ใน microgrid system');
            $table->timestamp('timestamp')->comment('วันเวลาที่ดึงข้อมูล');
            $table->string('project_id1', 45)->nullable()->comment('รหัส microgrid');
            $table->double('current_a_a')->nullable()->comment('กระแสไฟฟ้า เฟส A');
            $table->double('current_b_a')->nullable()->comment('กระแสไฟฟ้า เฟส B');
            $table->double('current_c_a')->nullable()->comment('กระแสไฟฟ้า เฟส C');
            $table->double('current_avg_a')->nullable()->comment('กระแสไฟฟ้า เฉลี่ย');
            $table->double('active_power_a_kw')->nullable()->comment('กำลังไฟฟ้าจริง เฟส A');
            $table->double('active_power_b_kw')->nullable()->comment('กำลังไฟฟ้าจริง เฟส B');
            $table->double('active_power_c_kw')->nullable()->comment('กำลังไฟฟ้าจริง เฟส C');
            $table->double('active_power_kw')->nullable()->comment('กำลังไฟฟ้าจริง รวม');
            $table->double('reactive_power_a_kvar')->nullable()->comment('กำลังไฟฟ้ารีแอคทีฟ เฟส A');
            $table->double('reactive_power_b_kvar')->nullable()->comment('กำลังไฟฟ้ารีแอคทีฟ เฟส B');
            $table->double('reactive_power_c_kvar')->nullable()->comment('กำลังไฟฟ้ารีแอคทีฟ เฟส C');
            $table->double('reactive_power_kvar')->nullable()->comment('กำลังไฟฟ้ารีแอคทีฟ รวม');
            $table->double('voltage_an_v')->nullable()->comment('แรงดันไฟฟ้า เฟส A วัดเทียบกับ เฟส N (นิวทรอล)');
            $table->double('voltage_bn_v')->nullable()->comment('แรงดันไฟฟ้า เฟส B วัดเทียบกับ เฟส N (นิวทรอล)');
            $table->double('voltage_cn_v')->nullable()->comment('แรงดันไฟฟ้า เฟส C วัดเทียบกับ เฟส N (นิวทรอล)');
            $table->double('voltage_ln_avg_v')->nullable()->comment('แรงดันไฟฟ้าเฉลี่ยวัดระหว่างเฟส (A-N, B-N, C-N)');
            $table->double('apparent_power_a_kva')->nullable()->comment('กําลังไฟฟ้าปรากฏ เฟส A');
            $table->double('apparent_power_b_kva')->nullable()->comment('กําลังไฟฟ้าปรากฏ เฟส B');
            $table->double('apparent_power_c_kva')->nullable()->comment('กําลังไฟฟ้าปรากฏ เฟส C');
            $table->double('apparent_power_kva')->nullable()->comment('กําลังไฟฟ้าปรากฏ รวม');
            $table->double('power_factor_a')->nullable()->comment('ตัวประกอบกำลัง เฟส A');
            $table->double('power_factor_b')->nullable()->comment('ตัวประกอบกำลัง เฟส B');
            $table->double('power_factor_c')->nullable()->comment('ตัวประกอบกำลัง เฟส C');
            $table->double('voltage_unbalance_an_perc')->nullable()->comment('เปอร์เซ็นแรงดันไม่สมดุลระหว่างเฟส A และ เฟส N');
            $table->double('voltage_unbalance_bn_perc')->nullable()->comment('เปอร์เซ็นแรงดันไม่สมดุลระหว่างเฟส B และ เฟส N');
            $table->double('voltage_unbalance_cn_perc')->nullable()->comment('เปอร์เซ็นแรงดันไม่สมดุลระหว่างเฟส C และ เฟส N');
            $table->double('voltage_unbalance_ln_worst_perc')->nullable()->comment('เปอร์เซ็นแรงดันไม่สมดุลสูงสุดระหว่างเฟสต่อนิวทรอล');
            $table->double('voltage_unbalance_ll_worst_perc')->nullable();
            $table->double('current_unbalance_a_perc')->nullable()->comment('เปอร์เซ็นกระแสไม่สมดุล เฟส A');
            $table->double('current_unbalance_b_perc')->nullable()->comment('เปอร์เซ็นกระแสไม่สมดุล เฟส B');
            $table->double('current_unbalance_c_perc')->nullable()->comment('เปอร์เซ็นกระแสไม่สมดุล เฟส C');
            $table->double('current_unbalance_worst_perc')->nullable();
            $table->double('frequency_hz')->nullable()->comment('ความถี่ไฟฟ้า');
            $table->double('power_factor')->nullable()->comment('ตัวประกอบกำลัง เฉลี่ยรวม');
            $table->double('active_energy_delivery_subt_received_kwh')->nullable();
            $table->double('active_energy_delivery_add_received_kwh')->nullable();
            $table->double('demand_current_avg_a')->nullable();
            $table->double('demand_active_power_kw')->nullable();
            $table->double('active_enery_out_of_the_load_kwh')->nullable()->comment('พลังงานไฟฟ้าจริงรวมสะสม ที่ไหลย้อนกลับ');
            $table->double('active_enery_into_the_load_kwh')->nullable()->comment('พลังงานไฟฟ้าจริงรวมสะสม ที่จ่ายให้โหลด');
            $table->string('feeder_no', 45)->comment('รหัส feeder');
            $table->timestamps();

            $table->index(['house_no', 'timestamp'], "house_no_timestamp_index");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sgtech_microgrid');
    }
};
