<?php
class FieldDataTypeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('field_data_types')->delete();

        FieldDataType::create(array
            (
                'name' => 'Text',
                'html_element' => '<div class="col-lg-3">\n' .
                                    '<label>##FIELD_NAME## :</label>\n' .
                                    '<textarea id="##FIELD_ID##" class="form-control form-control autoresize" rows="1"></textarea>\n' .
                                    '</div>',
                'updated_by' => 1
            )
        );
        FieldDataType::create(array
            (
                'name' => 'Date',
                'html_element' => '<div class="col-lg-3">\n' .
                                    '<label>##FIELD_NAME## :</label>\n' .
                                    '<input id="##FIELD_ID" type="text" class="form-control  date-picker" readonly id="" />\n' .
                                    '</div>' ,
                'updated_by' => 1
            )
        );
        FieldDataType::create(array
            (
                'name' => 'Drop Down',
                'html_element' => '<div class="col-lg-3">\n' .
                                    '<label>##FIELD_NAME## :</label>\n' .
                                    '<select id="##FIELD_ID##" class="form-control kt-select2"  >\n' .
                                    '</select>\n' .
                                    '</div>' ,
                'updated_by' => 1
            )
        );
    }

}