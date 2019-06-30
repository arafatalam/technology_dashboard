'use strict';



jQuery(document).ready(function() {
    getDataCommonFields();

});

function getDataCommonFields(){

    $.ajax({
        type : 'GET',
        url : './getdatacommonfields',
        dataType : 'JSON',
        success : function(data){
            console.log(data);
            createMarkups(data);
        }
    });

}





function createMarkups(data){

    var rowStart ='<div class="form-group row">';
    var innerElement = '';
    var rowEnd = '</div>';
    var count = 1;

    innerElement = '<div class="col-lg-3">\n' +
                        '<label>##FIELD_NAME## :</label>\n' +
                        '<textarea id="##FIELD_ID##" class="form-control form-control autoresize" rows="1"></textarea>\n' +
                    '</div>';

    innerElement = '<div class="col-lg-3">\n' +
                        '<label>##FIELD_NAME## :</label>\n' +
                        '<input id="##FIELD_ID" type="text" class="form-control  date-picker" readonly id="" />\n' +
                    '</div>';


    innerElement = '<div class="col-lg-4">\n' +
                        '<label>##FIELD_NAME## :</label>\n' +
                        '<select id="##FIELD_ID##" class="form-control kt-select2"  >\n' +
                        '</select>\n' +
                    '</div>';

    console.log(innerElement);

    // $.each(data, function(index, item){
    //     innerElement = innerElement +
    //                     '<div class="col-lg-3">' +
    //                         '<label>' + item.field_name + ' :</label>' +
    //                         '<textarea id="common_field_' + item.id + '" class="form-control form-control autoresize" rows="1"></textarea>' +
    //                     '</div>';
    //
    //     if(count === 4){
    //         var fullRow = rowStart + innerElement + rowEnd;
    //
    //         $('#project_form_body').append(fullRow);
    //
    //         innerElement = '';
    //         count = 0;
    //     }
    //     count++;
    // });
    //
    $('#project_form_body').append(rowStart + innerElement + rowEnd);

    autoResizeTextArea();
    select2dropdown();



}