
var username = "e409119437db07acf966a9477acdb63c";
var password = "1e52e29144e69c5db37996c8b53970d2";

{{ '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js' | script_tag }}
{{ 'api.jquery.js' | shopify_asset_url | script_tag }}



//$.ajax({url: "https://h2hubwatches.myshopify.com/admin/products.json?limit=1",
//    headers: {
//        "Authorization": "Basic " + btoa("" + ":" + "")
//    },
//    type: 'GET',
//    crossDomain: true,
//    dataType: 'jsonp',
//    error: function () {
//        alert('Failed!');
//    },
//    success: function (result) {
//        console.log(result);
//    }});