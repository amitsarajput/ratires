jQuery(document).ready(function ($) {

    // REMOVE AND ADD CLICK EVENT 
    $(".doAddItem").on("click", function () {
        $(".gridder").data("gridderExpander").gridderAddItem("TEST");
    });

    // Call Gridder
    $(".gridder").gridderExpander({
        scrollOffset: 60,
        scrollTo: "listitem", // "panel" or "listitem"
        animationSpeed: 400,
        animationEasing: "easeInOutExpo",
        showNav: true, // Show Navigation
        nextText: "<span></span>", // Next button text
        prevText: "<span></span>", // Previous button text
        closeText: "", // Close button text
        onStart: function () {
            console.log("Gridder Inititialized");
        },
        onExpanded: function (object) {
            console.log("Gridder Expanded");
        },
        onChanged: function (object) {
            console.log("Gridder Changed");
        },
        onClosed: function () {
            console.log("Gridder Closed");
        }
    });
});