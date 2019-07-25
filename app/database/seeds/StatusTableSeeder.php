<?php
class StatusTableSeeder extends Seeder {

    public function run()
    {
        DB::table('project_statuses')->delete();

        Status::create(array
            (
                'status' => 'Open',
                'color_code' => '#FFFFFF',
                'updated_by' => 1,
            )
        );
        Status::create(array
            (
                'status' => 'In Pipeline',
                'color_code' => '#5461DB',
                'updated_by' => 1,
            )
        );
        Status::create(array
            (
                'status' => 'Initiated',
                'color_code' => '#85AA71',
                'updated_by' => 1,
            )
        );
        Status::create(array
            (
                'status' => 'Initiated/Slow',
                'color_code' => '#B3B0AC',
                'updated_by' => 1,
            )
        );
        Status::create(array
            (
                'status' => 'In Progress',
                'color_code' => '#4F7949',
                'updated_by' => 1,
            )
        );
        Status::create(array
            (
                'status' => 'In Progress/Slow',
                'color_code' => '#C7DABF',
                'updated_by' => 1,
            )
        );
        Status::create(array
            (
                'status' => 'Halted',
                'color_code' => '#EDC977',
                'updated_by' => 1,
            )
        );
        Status::create(array
            (
                'status' => 'Escalated',
                'color_code' => '#AB534E',
                'updated_by' => 1,
            )
        );
        Status::create(array
            (
                'status' => 'Live/Completed',
                'color_code' => '#57E364',
                'updated_by' => 1,
            )
        );

    }

}