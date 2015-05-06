var OwlNewsProducts = function () {

    return {

        ////Owl Новости
        initOwlNews: function () {
            jQuery(document).ready(function() {
                var owl = jQuery(".owl-news");
                owl.owlCarousel({
                    items: [4],
                    itemsDesktop : [1000,4],
                    itemsDesktopSmall : [900,3],
                    itemsTablet: [600,2],
                    itemsMobile : [479,1],
                    slideSpeed: 1000
                });

                // Custom Navigation Events
                jQuery(".next-news").click(function(){
                    owl.trigger('owl.next');
                })
                jQuery(".prev-news").click(function(){
                    owl.trigger('owl.prev');
                })
            });
        },

        ////Owl Новости
        initOwlProductCategories: function () {
            jQuery(document).ready(function() {
                var owl = jQuery(".owl-product-categories");
                owl.owlCarousel({
                    items: [4],
                    itemsDesktop : [1000,4],
                    itemsDesktopSmall : [900,3],
                    itemsTablet: [600,2],
                    itemsMobile : [479,1],
                    slideSpeed: 1000
                });

                // Custom Navigation Events
                jQuery(".next-product-category").click(function(){
                    owl.trigger('owl.next');
                })
                jQuery(".prev-product-category").click(function(){
                    owl.trigger('owl.prev');
                })
            });
        }

    };

}();