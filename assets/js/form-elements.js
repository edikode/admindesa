var FormElements = function () {
    //function to initiate jquery.inputlimiter
    var runInputLimiter = function () {
        $('.limited').inputlimiter({            
			remText: 'Kurang %n karakter lagi...',
			remFullText: 'Maaf!',
			limitText: 'Maksimal %n karakter pada inputan ini.'
			//remText: 'You only have %n character%s remaining...',
            //remFullText: 'Stop typing! You\'re not allowed any more characters!',
            //limitText: 'You\'re allowed to input %n character%s into this field.'
        });
    };
    
    //function to initiate Select2
    var runSelect2 = function () {
        $(".search-select").select2({
            placeholder: "Klik Disini Untuk Memilih",
            allowClear: true
        });
    };
    //function to initiate jquery.maskedinput
    
    //function to initiate bootstrap-datepicker
    var runDatePicker = function () {
        $('.date-picker').datepicker({
            autoclose: true
        });
    };
    //function to initiate bootstrap-timepicker
    
    //function to initiate daterangepicker
   
    //function to initiate bootstrap-colorpicker
    
    //function to initiate jquery.tagsinput
    var runTagsInput = function () {
        $('#tag').tagsInput({
            width: 'auto'
        });
    };
    
    return {
        //main function to initiate template pages
        init: function () {
            runInputLimiter();
            runSelect2();
            runDatePicker();
            runTagsInput();          
        }
    };
}();