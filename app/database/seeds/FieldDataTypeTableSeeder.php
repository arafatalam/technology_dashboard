<?php
class FieldDataTypeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('project_field_data_types')->delete();

        FieldDataType::create(array
            (
                'name' => 'Text',
                'html_element' => '<div class="col-lg-3">' .
                                    '<label>##FIELD_NAME## :</label>' .
                                    '<textarea id="##FIELD_ID##" class="form-control form-control autoresize" rows="1"></textarea>' .
                                    '</div>',
                'updated_by' => 1,
                'db_data_type' => 'text'
            )
        );
        FieldDataType::create(array
            (
                'name' => 'Date',
                'html_element' => '<div class="col-lg-3">' .
                                    '<label>##FIELD_NAME## :</label>' .
                                    '<input id="##FIELD_ID" type="text" class="form-control  date-picker" readonly id="" />' .
                                    '</div>' ,
                'updated_by' => 1,
                'db_data_type' => 'date'
            )
        );
        FieldDataType::create(array
            (
                'name' => 'Drop Down',
                'html_element' => '<div class="col-lg-3">' .
                                    '<label>##FIELD_NAME## :</label>' .
                                    '<select id="##FIELD_ID##" class="form-control kt-select2"  >' .
                                    '</select>' .
                                    '</div>' ,
                'updated_by' => 1,
                'db_data_type' => 'text'
            )
        );
    }

}