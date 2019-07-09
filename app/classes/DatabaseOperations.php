<?php

class DatabaseOperations extends BaseController  {

    public function createModuleTable( $tableName ){

        Schema::create($tableName, function($table)
        {
            $table->increments('id');
            $table->integer('status_id');
            $commonFields = CommonField::all();
            foreach ($commonFields as $commonField){
                $fieldDataType = $commonField->fieldDataType->db_data_type;
                $fieldName = $commonField->field_name;

                $table->$fieldDataType($fieldName);
            }

            $table->timestamps();
        });

    }

    public function addModuleFieldColumn($moduleId, $columnName, $dataTypeId){

        $module = Module::find($moduleId);

        $tableName = $module->db_table_name;

        $columnName = Utilities::removeSpecialCharacters($columnName);

        if($dataTypeId == 2){
            self::addDateColumn($tableName, $columnName);
        } else {
            self::addTextColumn($tableName, $columnName);
        }
    }

    public function addDateColumn($tableName, $columnName){

        Schema::table($tableName, function($table) use ($columnName)
        {
            $table->date($columnName)->after('id');
        });

    }

    public function addTextColumn($tableName, $columnName){

        Schema::table($tableName, function($table) use ($columnName)
        {
            $table->string($columnName)->after('id');;
        });
    }


    public function insertData($tableName, $colName, $colValue){

        DB::table($tableName)->insert(
            array( $colName => $colValue)
        );

    }
}