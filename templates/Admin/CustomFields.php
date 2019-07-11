<?php

namespace Templates\Admin;

class CustomFields {

	static function getCountryMetaBox( $country ){
       
       $countryName = get_post_meta($country->ID, 'country_name', true);
       $topLevelDomain = get_post_meta($country->ID, 'top_level_domain', true);
       $alpha2Code = get_post_meta($country->ID, 'alpha2_code',true);
       $alpha3Code = get_post_meta($country->ID, 'alpha3_code',true);
       $callingCodes = get_post_meta($country->ID, 'calling_codes',true);
       $timezones = get_post_meta($country->ID, 'timezones',true);
       $currencies = get_post_meta($country->ID, 'currencies',true);
       $countryFlag = get_post_meta($country->ID, 'country_flag',true);
       
       ?>
       <table>
        <tr>
            <td style="width: 100%">Country Name</td>
            <td>
	            <select style="width: 100px" name="country_name" id="countries_list">
	            </select>
            </td>
        </tr>
        <tr>
            <td style="width: 150px">Top Level Domain</td>
            <td>
             <input type="text" value="<?php echo $topLevelDomain ?>" name="top_level_domain" id="top_level_domain" />
            </td>
        </tr>
        <tr>
            <td style="width: 150px">Alpha2 Code</td>
            <td>
             <input type="text" value="<?php echo $alpha2Code ?>" name="alpha2_code" id="alpha2_code" />
            </td>
        </tr>
        <tr>
            <td style="width: 150px">Alpha3 Code</td>
            <td>
             <input type="text" value="<?php echo $alpha3Code ?>" name="alpha3_code" id="alpha3_code" />
            </td>
        </tr>
        <tr>
            <td style="width: 150px">Calling Codes</td>
            <td>
             <input type="text" value="<?php echo $callingCodes ?>" name="calling_codes" id="calling_codes" />
            </td>
        </tr>
        <tr>
            <td style="width: 150px">Timezones</td>
            <td>
             <input type="text" value="<?php echo $timezones ?>" name="timezones" id="timezones" />
            </td>
        </tr>
        <tr>
            <td style="width: 150px">Currencies</td>
            <td>
             <input type="text" value="<?php echo $currencies ?>" name="currencies" id="currencies" />
            </td>
        </tr>
        <tr>
            <td style="width: 150px">Country Flag</td>
            <td>
             <input type="text" value="<?php echo $countryFlag ?>" name="country_flag" id="country_flag" />
            </td>
        </tr>
    </table>
<?php
	}
}
