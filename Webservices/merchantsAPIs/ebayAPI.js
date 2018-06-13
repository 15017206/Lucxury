
$.ajax({
    type: "GET",
    url: "https://svcs.ebay.com/services/search/FindingService/v1?" + "SECURITY-APPNAME=" + "GlennYeo-Software-PRD-35d705b3d-b15b0374" + "&OPERATION-NAME=" + "findItemsByKeywords" + "&SERVICE-VERSION=" + "1.0.0" + "&RESPONSE-DATA-FORMAT=" + "JSON" + "&keywords=" + search_item + "&paginationInput.entriesPerPage=" + "3" + "&GLOBAL-ID=" + "EBAY-SG" + "&paginationInput.pageNumber=" + "1",
    cache: false,
    dataType: "JSONP",

    // Additional eBay parameters
    //                    data: "SECURITY-APPNAME=" + "GlennYeo-Software-PRD-35d705b3d-b15b0374",
    //                    data: "&OPERATION-NAME=" + "findItemsByKeywords",
    //                    data: "&SERVICE-VERSION=" + "1.0.0",
    //                    data: "&RESPONSE-DATA-FORMAT=" + "JSON",
    //                    data: "&keywords=" + "GlennYeo-handbag",
    //                    data: "&paginationInput.entriesPerPage=" + "2",
    //                    data: "&GLOBAL-ID=" + "EBAY-SG",
    //                    data: "&paginationInput.pageNumber=" + "1",
    //                        $("#debug").text(response2);
    //                            alert(product_name + "\n\n" + imagelink + "\n\n" + category + "\n\n" + condition + "\n" + price_currency + price_amount + "\n\n" + merchant + "\n\n" + link);
    success: function (response) {
        var response2 = JSON.stringify(response);
        var no_of_items = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['@count'];
        var imagelink = "";
        var product_name = "";
        var category = "";
        var brand = "";
        var colour = "";
        var condition = "";
        var price_currency = "";
        var price_amount = "";
        var merchant = "";
        var link = "";
        for (var i = 0; i < no_of_items; i++) {

            try {
                imagelink = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'][i]['galleryURL'][0];
            } catch (response) {
            }

            product_name = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'][i]['title'][0];
            category = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'][i]['primaryCategory'][0]['categoryName'][0];
            condition = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'][i]['condition'][0]['conditionDisplayName'][0];
            price_currency = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'][i]['sellingStatus'][0]['convertedCurrentPrice'][0]['@currencyId'];
            price_amount = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'][i]['sellingStatus'][0]['convertedCurrentPrice'][0]['__value__'];
            merchant = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'][i]['globalId'][0];
            link = response['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'][i]['viewItemURL'][0];
           // $("#some_container").append('<div class="w3-third"><div class="w3"><br/><img id="thumbnail1" src="' + imagelink + '" style="width:250px;"><div class="w3-container" id="product_name"><h6 id="product_nameh6">PRODUCT NAME: ' + product_name + '</h6><h6 style="font-weight: bold">PRICE: ' + price_currency + " " + price_amount + '</h6><h6 id="brand' + i + '">BRAND: ' + brand + '</h6><h6 id="color' + i + '">COLOR: </h6><h6>CONDITION: ' + condition + '</h6><h6>MERCHANT: ' + merchant + '</h6><div>View Count: 99</div><a href="' + link + '"><button class="w3-button w3-block w3-border">More Information</button></a><br/></div></div></div>');
            if ($("#brand" + i).val() === "") {
                $("#brand" + i).hide();
            }
            if ($("#color" + i).val() === "") {
                $("#color" + i).hide();
            }

            //Insert to Item Table
//            $.ajax({
//                type: "POST",
//                url: "http://localhost/Lucxury/Webservices/doAddItem.php",
//                data: {merchant_id: 1, product_name: product_name, price_currency: price_currency, price_amount: price_amount, brand: product_name, color: product_name, condition: condition, category: category, item_more_info_url: link},
//                cache: false,
//                dataType: "JSON",
//                success: function (data, textStatus) {
//                },
//                error: function (obj, textStatus, errorThrown) {
//                    console.log("Error " + textStatus + ": " + errorThrown);
//
//                }
//            });
            //Insert to ItemTemp Table
            $.ajax({
                type: "POST",
                url: "Webservices/doAddItem_itemfilter.php",
                data: {merchant_id: 1, product_name: product_name, price_currency: price_currency, price_amount: price_amount, brand: product_name, color: product_name, condition: condition, category: category, item_more_info_url: link, image_link: imagelink},
                cache: false,
                dataType: "JSON",
                success: function (data, textStatus) {
//                     alert("success");
                },
                error: function (obj, textStatus, errorThrown) {
                    console.log("Error " + textStatus + ": " + errorThrown);
                }
            });
        }
    },
    error: function (obj, textStatus, errorThrown) {
        console.log("Error " + textStatus + ": " + errorThrown);
        alert("fail");
    }
});
