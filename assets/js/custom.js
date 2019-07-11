jQuery(function(){
    var countryDataArr = [];
	jQuery.ajax({
		url:"https://restcountries.eu/rest/v2/all",
		method:"GET",
		dataType:"JSON",
		success: function(data){
			            var countryArr = [];
			            countryDataArr = data;
                        for(var item in data){
                        	var countryOb = {};
                        	    countryOb.id = data[item].name;
                        	    countryOb.text = data[item].name;
                        	countryArr.push(countryOb);
                        }
                        jQuery("#countries_list").select2(
		                        	{ 
		                        		width: "200px",
		                        		data: countryArr 
		                        	}
                        	);

		}
	});	

    jQuery('#countries_list').on('select2:select', function (e) {

    	var selectedId = jQuery(this).find(':selected').data("select2-id");
    	var populateDataObj = countryDataArr[selectedId-1];
        jQuery("#top_level_domain").val(populateDataObj.topLevelDomain[0]);
        jQuery("#alpha2_code").val(populateDataObj.alpha2Code);
        jQuery("#alpha3_code").val(populateDataObj.alpha3Code);
        jQuery("#calling_codes").val(populateDataObj.callingCodes[0]);
        jQuery("#timezones").val(populateDataObj.timezones[0]);
        jQuery("#currencies").val(populateDataObj.currencies[0].code);
        jQuery("#country_flag").val(populateDataObj.flag);
	});

});